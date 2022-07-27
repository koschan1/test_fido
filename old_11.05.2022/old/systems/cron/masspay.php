<?php
defined('unisitecms') or exit();

if( !$settings["secure_payment_service_name"] ) exit;

$param = paymentParams( $settings["secure_payment_service_name"] );
$payment = findOne("uni_payments","code=?", array( $settings["secure_payment_service_name"] ));

function actionVarPay( $value = [] ){
	global $config,$settings,$param,$payment,$static_msg;
    
    $Main = new Main();

    if(!$value["clients_bank_card"]){
        update("update uni_secure_payments set secure_payments_errors=?, secure_payments_status_pay=? where secure_payments_id=?", [ $static_msg["51"], 2, $value["payments_id"] ]);
        return false;
    }

	if( $settings["secure_payment_service_name"] == "payeer" ){

	    include( $config["basePath"] . "/systems/payment/payeer/cpayeer.php" );

		$accountNumber = $param["account_number"];
		$apiId = $param["id_api"];
		$apiKey = $param["secret_key_masspay"];
		$payeer = new CPayeer($accountNumber, $apiId, $apiKey);

		if ($payeer->isAuth())
		{

   	        $bank_card = decrypt($value["clients_bank_card"]);

   	        if( $Main->getCardType($bank_card) == "Visa" ){
               $ps = 117146509;
   	        }elseif( $Main->getCardType($bank_card) == "Maestro" ){
               $ps = 117653267;
   	        }elseif( $Main->getCardType($bank_card) == "MasterCard" ){
               $ps = 117650874;
   	        }elseif( $Main->getCardType($bank_card) == "Mir" ){
               $ps = 510572988;
   	        }else{
   	           $ps = 117146509;
   	        }
   	  
			$initOutput = $payeer->initOutput(array(
				'ps' => $ps,
				'curIn' => $settings["currency_main"]["code"],
				'sumIn' => round($value["secure_price"],2),
				'curOut' => $settings["currency_main"]["code"],
				'param_ACCOUNT_NUMBER' => $bank_card
			));

			if ($initOutput)
			{
				$historyId = $payeer->output();
				if ($historyId > 0)
				{
					update("update uni_secure_payments set secure_payments_status_pay=?,secure_payments_errors=? where secure_payments_id=?", [ 1, "", $value["payments_id"] ]);

					$profit = calcPercent( $value["amount"], $settings["secure_percent_service"] );

		            if($profit && $value["amount"]){
		               $Main->addOrder( ["id_ad"=>$value["id_ad"],"price"=>$profit,"title"=>$static_msg["52"],"id_user"=>$value["id_user"],"status_pay"=>1, "user_name" => $value["user_name"], "id_hash_user" => $value["id_hash_user"], "action_name" => "secure"] );
		            }

				}
				else
				{
					$error = $payeer->getErrors();
					update("update uni_secure_payments set secure_payments_errors=?,secure_payments_status_pay=? where secure_payments_id=?", [ json_encode($error), 2 , $value["payments_id"] ]);
				}
			}
			else
			{
				$error = $payeer->getErrors();
				update("update uni_secure_payments set secure_payments_errors=?,secure_payments_status_pay=? where secure_payments_id=?", [ json_encode($error), 2 , $value["payments_id"] ]);
			}

		}


	}elseif( $settings["secure_payment_service_name"] == "liqpay" ){

		include("{$config["basePath"]}/systems/payment/liqpay/LiqPay.php");

	    $bank_card = decrypt($value["clients_bank_card"]);

		$liqpay = new LiqPay(trim($param["public_key"]), trim($param["private_key"]));
		$result = $liqpay->api("request", array(
		'action'         => 'p2pcredit',
		'version'        => '3',
		'amount'         => round($value["secure_price"],2),
		'currency'       => $settings["currency_main"]["code"],
		'description'    => $value["secure_desc"],
		'order_id'       => $value["secure_id_order"],
		'receiver_card'  => $bank_card,
		'receiver_last_name'  => $value["user_name"]
		));
        
        $result = json_decode( json_encode($result) , true);

		if ( $result["result"] == "ok" && $result["status"] == "success" )
		{
			update("update uni_secure_payments set secure_payments_status_pay=?,secure_payments_errors=? where secure_payments_id=?", [ 1, "", $value["payments_id"] ]);

			$profit = calcPercent( $value["amount"], $payment["secure_percent_service"] );

            if($profit && $value["amount"]){
               $Main->addOrder( ["id_ad"=>$value["id_ad"],"price"=>$profit,"title"=>$static_msg["52"],"id_user"=>$value["id_user"],"status_pay"=>1, "user_name" => $value["user_name"], "id_hash_user" => $value["id_hash_user"], "action_name" => "secure"] );
            }
		}
		else
		{
			update("update uni_secure_payments set secure_payments_errors=?,secure_payments_status_pay=? where secure_payments_id=?", [ $result["err_description"], 2 , $value["payments_id"] ]);
		}      

	}



}


    
$getSecurePayments = getAll("select * from uni_secure_payments where secure_payments_status_pay=?", [0]);

if( count($getSecurePayments) ){

   foreach ($getSecurePayments as $key => $value) {

   	    $secure = findOne("uni_secure", "secure_id_order=?", [$value["secure_payments_id_order"]]);

   	    if($secure){
		
			$user_buyer = findOne("uni_clients", "clients_id=?", [$secure["secure_id_user_buyer"]]);
			$user_seller = findOne("uni_clients", "clients_id=?", [$secure["secure_id_user_seller"]]);

			$disputes = findOne("uni_secure_disputes", "secure_disputes_id_secure=?", [$secure["secure_id"]]);

			if($disputes){
				if($disputes["secure_disputes_status"] == 0){

					actionVarPay( [ "clients_bank_card"=>$user_seller["clients_bank_card"],"secure_price"=>$value["secure_payments_amount"] - calcPercent( $value["secure_payments_amount"], $payment["secure_percent_service"] ),"secure_id"=>$secure["secure_id"],"secure_id_order"=>$secure["secure_id_order"],"payments_id"=>$value["secure_payments_id"], "amount" => $value["secure_payments_amount"], "id_ad" => $secure["secure_id_ad"], "id_user" => $user_seller["clients_id"], "user_name" => $user_seller["clients_name"], "id_hash_user" => $user_seller["clients_id_hash"], "secure_desc" => $static_msg["53"] ] );

				}elseif($disputes["secure_disputes_status"] == 1){

					actionVarPay( [ "clients_bank_card"=>$user_buyer["clients_bank_card"],"secure_price"=>$value["secure_payments_amount"],"secure_id"=>$secure["secure_id"],"secure_id_order"=>$secure["secure_id_order"],"payments_id"=>$value["secure_payments_id"], "secure_desc" => $static_msg["54"] ] );

				}elseif($disputes["secure_disputes_status"] == 2){

					$value["secure_payments_amount"] = $value["secure_payments_amount"] / 2;
					
					actionVarPay( [ "clients_bank_card"=>$user_seller["clients_bank_card"],"secure_price"=>$value["secure_payments_amount"] - calcPercent( $value["secure_payments_amount"], $payment["secure_percent_service"] ),"secure_id"=>$secure["secure_id"],"secure_id_order"=>$secure["secure_id_order"],"payments_id"=>$value["secure_payments_id"], "amount" => $value["secure_payments_amount"], "id_ad" => $secure["secure_id_ad"], "id_user" => $user_seller["clients_id"], "user_name" => $user_seller["clients_name"], "id_hash_user" => $user_seller["clients_id_hash"], "secure_desc" => $static_msg["53"] ] );

					actionVarPay( [ "clients_bank_card"=>$user_buyer["clients_bank_card"],"secure_price"=>$value["secure_payments_amount"],"secure_id"=>$secure["secure_id"],"secure_id_order"=>$secure["secure_id_order"],"payments_id"=>$value["secure_payments_id"], "secure_desc" => $static_msg["55"] ] );

				}
			}else{

				actionVarPay( [ "clients_bank_card"=>$user_seller["clients_bank_card"],"secure_price"=>$value["secure_payments_amount"] - calcPercent( $value["secure_payments_amount"], $payment["secure_percent_service"] ),"secure_id"=>$secure["secure_id"],"secure_id_order"=>$secure["secure_id_order"],"payments_id"=>$value["secure_payments_id"], "amount" => $value["secure_payments_amount"], "id_ad" => $secure["secure_id_ad"], "id_user" => $user_seller["clients_id"], "user_name" => $user_seller["clients_name"], "id_hash_user" => $user_seller["clients_id_hash"], "secure_desc" => $static_msg["53"] ] );

			}

	    }

   }

}

?>
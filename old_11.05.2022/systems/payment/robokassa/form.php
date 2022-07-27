<?php
if($param["test"] == 1){
   $param["pass1"] = $param["test_pass1"];
}

$mrh_login = $param["id_shop"];
$mrh_pass1 = $param["pass1"];

$inv_id    = $paramForm["id_order"]; 

$inv_desc  = urlencode($paramForm["title"]); 
$out_summ  = number_format($paramForm["amount"], 2, ".", "");

$crc = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");

$url = "https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=$mrh_login&OutSum=$out_summ&InvId=$inv_id&Description=$inv_desc&SignatureValue=$crc&IsTest={$param["test"]}";

return ["link"=>$url];

?>
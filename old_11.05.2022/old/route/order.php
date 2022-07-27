<?php

$config = require "./config.php";

$route_name = "order";
$visible_footer = true;

$Main = new Main();
$settings = $Main->settings();

if( !$_SESSION["profile"]["id"] ){
	header( "Location: " . _link("auth") );
}

$data["order"] = findOne("uni_secure", "secure_id_order=? and (secure_id_user_buyer=? or secure_id_user_seller=?)", [intval($id_order), $_SESSION["profile"]["id"],$_SESSION["profile"]["id"]]);

if(!$data["order"]){
	$Main->response(404);
}

$Ads = new Ads();
$Seo = new Seo();
$Geo = new Geo();
$Profile = new Profile();
$CategoryBoard = new CategoryBoard();
$Banners = new Banners();
$ULang = new ULang();

$getCategoryBoard = $CategoryBoard->getCategories("where category_board_visible=1");

$data["ad"] = $Ads->get("ads_id=?", [$data["order"]["secure_id_ad"]]);

if( $data["order"]["secure_id_user_buyer"] == $_SESSION["profile"]["id"] ){

	$data["user"] = findOne("uni_clients", "clients_id=?", [$data["order"]["secure_id_user_seller"]]);
	$data["review"] = findOne("uni_clients_reviews", "clients_reviews_from_id_user=? and clients_reviews_id_user=?", [ $_SESSION["profile"]["id"], $data["order"]["secure_id_user_seller"] ]);

}elseif( $data["order"]["secure_id_user_seller"] == $_SESSION["profile"]["id"] ){
	
	$data["user"] = findOne("uni_clients", "clients_id=?", [$data["order"]["secure_id_user_buyer"]]);
	$data["review"] = findOne("uni_clients_reviews", "clients_reviews_from_id_user=? and clients_reviews_id_user=?", [ $_SESSION["profile"]["id"], $data["order"]["secure_id_user_buyer"] ]);

}

$data["ratings"] = $Profile->outRating( $data["ad"]["clients_id"] );

$data["order"]["commission"] = $Ads->getSecureCommission( $data["order"]["secure_price"] );

$data["order"]["commission_and_price"] = $Ads->secureTotalAmountPercent( $data["order"]["secure_price"] );

$data["disputes"] = getOne("SELECT * FROM uni_secure_disputes INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_secure_disputes`.secure_disputes_id_user where secure_disputes_id_secure=?", [$data["order"]["secure_id"]]);

echo $Main->tpl("order.tpl", compact( 'Seo','Geo','Main','visible_footer','route_name','settings','config','data','Profile','CategoryBoard','Banners','getCategoryBoard','Ads','ULang' ) );

?>
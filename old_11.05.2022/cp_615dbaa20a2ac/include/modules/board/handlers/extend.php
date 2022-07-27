<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_board']) && !(new Admin())->accessAdmin($_SESSION['cp_processing_board']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

 $Elastic = new Elastic();

 $time_current = time();
  
 $period_time = date("Y-m-d H:i:s", $time_current + ($settings["ads_time_publication_default"] * 86400) );

 if( is_array($_POST["id"]) ){
 	 $ids = iteratingArray($_POST["id"], "int");
     update("UPDATE uni_ads SET ads_period_publication='".$period_time."',ads_datetime_add='".date("Y-m-d H:i:s", $time_current)."' WHERE ads_id IN(".implode(",", $ids).")");
     foreach ($_POST["id"] as $key => $value) {
     	$Elastic->update( [ "index" => "uni_ads", "type" => "ad", "id" => $value, "body" => [ "doc" => [ "ads_period_publication" => $period_time, "ads_datetime_add" => date("Y-m-d H:i:s", $time_current) ] ] ] );
     }
 }else{
     update("UPDATE uni_ads SET ads_period_publication='".$period_time."',ads_datetime_add='".date("Y-m-d H:i:s", $time_current)."' WHERE ads_id IN(".intval($_POST["id"]).")");
     $Elastic->update( [ "index" => "uni_ads", "type" => "ad", "id" => intval($_POST["id"]), "body" => [ "doc" => [ "ads_period_publication" => $period_time, "ads_datetime_add" => date("Y-m-d H:i:s", $time_current) ] ] ] );
 }


 $_SESSION["CheckMessage"]["success"] = "Объявления продлены на " . $settings["ads_time_publication_default"] . " " . ending( $settings["ads_time_publication_default"], "день", "дня", "дней" );          
 echo true;

}

?>

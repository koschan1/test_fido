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

 $Ads = new Ads();
 $Elastic = new Elastic();
 $Cache = new Cache();
 
 if( is_array($_POST["id"]) ){

     $ids = iteratingArray($_POST["id"], "int");

     $getAds = getAll( "select * from uni_ads where ads_id IN(".implode(",", $ids).")" );

     if( count($getAds) ){
         foreach ($getAds as $value) {

              $time = date("Y-m-d H:i:s");

              $period = $Ads->adPeriodPub( $value["ads_period_day"] );

              update("UPDATE uni_ads SET ads_status='".intval($_POST["status"])."',ads_period_publication='".$period["date"]."',ads_datetime_add='".$time."',ads_period_day='".$period["days"]."' WHERE ads_id='".$value["ads_id"]."'");

              $fieldsUpdate["ads_status"] = intval($_POST["status"]);
              $fieldsUpdate["ads_period_publication"] = $period["date"];
              $fieldsUpdate["ads_period_day"] = $period["days"];
              $fieldsUpdate["ads_datetime_add"] = $time;

              $Elastic->update( [ "index" => "uni_ads", "type" => "ad", "id" => $value["ads_id"], "body" => [ "doc" => $fieldsUpdate ] ] );
              
              if($_POST["status"] == 1){

                $getUser = findOne( "uni_clients", "clients_id=?", [ $value["ads_id_user"] ] );
                 
                $data = array("{AD_TITLE}"=>$value["ads_title"],
                               "{AD_LINK}"=>$Ads->alias($value),
                               "{USER_NAME}"=>$getUser["clients_name"],                          
                               "{UNSUBSCRIBE}"=>"",                          
                               "{EMAIL_TO}"=>$getUser["clients_email"]
                               );

                email_notification( array( "variable" => $data, "code" => "AD_MODERATION_PUBLISHED" ) );

              }

              $Ads->changeStatus( $value["ads_id"], intval($_POST["status"]) );

         }
     }

     if($_POST["status"] == 1) $Ads->serviceActivation( ["id_ad"=>implode(",", $ids),"status"=>$_POST["status"]] );

 }else{
     
     $time = date("Y-m-d H:i:s");

     $getAd = $Ads->get("ads_id=?",[intval($_POST["id"])]);

     $period = $Ads->adPeriodPub( $getAd["ads_period_day"] );

     update("UPDATE uni_ads SET ads_status='".intval($_POST["status"])."',ads_period_publication='".$period["date"]."',ads_datetime_add='".$time."',ads_period_day='".$period["days"]."' WHERE ads_id='".intval($_POST["id"])."'");

     $fieldsUpdate["ads_status"] = intval($_POST["status"]);
     $fieldsUpdate["ads_period_publication"] = $period["date"];
     $fieldsUpdate["ads_period_day"] = $period["days"];
     $fieldsUpdate["ads_datetime_add"] = $time;

     $Elastic->update( [ "index" => "uni_ads", "type" => "ad", "id" => intval($_POST["id"]), "body" => [ "doc" => $fieldsUpdate ] ] );

     if($_POST["status"] == 1){

         $Ads->serviceActivation( ["id_ad"=>intval($_POST["id"]),"status"=>$_POST["status"]] );

         $data = array("{AD_TITLE}"=>$getAd["ads_title"],
                       "{AD_LINK}"=>$Ads->alias($getAd),
                       "{USER_NAME}"=>$getAd["clients_name"],                          
                       "{UNSUBSCRIBE}"=>"",                          
                       "{EMAIL_TO}"=>$getAd["clients_email"]
                       );

         email_notification( array( "variable" => $data, "code" => "AD_MODERATION_PUBLISHED" ) );

     }

     $Ads->changeStatus( intval($_POST["id"]), intval($_POST["status"]) );

 }


 $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";          
 echo true;

 $Cache->update( "uni_ads" );

}

?>
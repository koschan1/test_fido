<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_city']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

$cache = new Cache();

$id = intval($_POST["id"]);
$status = intval($_POST["status"]);
$country = clear($_POST["country"]);
$desc = clear($_POST["desc"]);

$alias = translite($_POST["alias"]);

if(!$alias){
	$alias = translite($country);
}

 $error = array();
 
 if(empty($country)){$error[] = 'Укажите название страны';}

    if (count($error) == 0) {
           
          update("UPDATE uni_country SET country_name=?, country_status = ?, country_alias=?, country_desc=? WHERE country_id=?", array($country,$status,$alias,$desc,$id));  
          $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";
          echo true;

          $cache->update("cityDefault");
                  
      } else {
                $_SESSION["CheckMessage"]["warning"] = implode("<br/>", $error);        
             }

}  
?>
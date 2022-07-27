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

$Cache = new Cache();

$status = intval($_POST["status"]);
$country = clear($_POST["country"]);
$desc = clear($_POST["desc"]);
$alias = translite($_POST["alias"]);

if(!$alias){
	$alias = translite($country);
}

 $error = array();
 
 if(empty($country)){$error[] = 'Укажите название страны';}
 if(empty($alias)){$error[] = 'Укажите алиас';}

    if (count($error) == 0) {

      insert("INSERT INTO uni_country(country_name, country_status, country_alias, country_desc)VALUES(?,?,?,?)", array($country,$status,$alias,$desc));             
      $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";
      echo true;            

      $Cache->update( "cityDefault" );
        
      } else {
               $_SESSION["CheckMessage"]["warning"] = implode("<br/>", $error);        
             }
   
}    
?>
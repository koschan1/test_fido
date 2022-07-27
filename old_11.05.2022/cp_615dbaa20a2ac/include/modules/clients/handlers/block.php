<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_clients']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){
 
if(clear($_POST["text"])){

   update("UPDATE uni_clients SET clients_status='2',clients_note='".clear($_POST["text"])."' WHERE clients_id IN(".intval($_POST["id_user"]).")");

   $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";          
   echo true;

}else{
   $_SESSION["CheckMessage"]["error"] = "Пожалуйста, укажите причину жалобы";
}


}

?>

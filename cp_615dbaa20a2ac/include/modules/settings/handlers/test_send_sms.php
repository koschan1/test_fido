<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_settings']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

	if($settings["phone_alert"]){

	echo $settings["phone_alert"].': ';
	echo sms($settings["phone_alert"],"Сообщение пришло! Урааааа!",$settings["sms_service_method_send"]);

	}else{ $_SESSION["CheckMessage"]["error"] = "Укажите телефон в разделе оповещения"; } 

}     
?>
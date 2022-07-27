<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_seo']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

    $id = (int)$_POST["id"];
    if ($id){
           update("DELETE FROM uni_seo_filters WHERE seo_filters_id=?", array($id));                 
           $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";          
           echo true;
    }

}  
?>
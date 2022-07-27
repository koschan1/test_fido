<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");

if( !(new Admin())->accessAdmin($_SESSION['cp_control_settings']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

$id = (int)$_POST['id'];

if($id){
   update('delete from uni_ads_keywords where ads_keywords_id=?', [$id]);
}


$_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!"; 

}
?>
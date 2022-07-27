<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_page']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

  $id = intval($_POST["id"]);
  $status = intval($_POST["status"]);

  update("update uni_pages set visible=? where id=?", array($status,$id));

  $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";
  echo true;

}
?>
<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_tpl']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

    $pos_new = 1;
    if(count($_POST['arrays'])>0){
        foreach($_POST['arrays'] as $item){
            $item = (int)substr($item,4,strlen($item));
        	update("UPDATE uni_sliders SET `sliders_sort`=? WHERE `sliders_id`=?", array($pos_new,$item));
        	$pos_new++;
        }
        $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";
    }

}  

?>

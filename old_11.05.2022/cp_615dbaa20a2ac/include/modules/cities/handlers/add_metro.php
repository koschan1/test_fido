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

$id = intval($_POST["id"]);
$color = $_POST["color"];
$name = $_POST["name"];

 $error = array();
 
 if(empty($id)){$error[] = "Пожалуйста, выберите город";}
 if(empty($color)){$error[] = 'Пожалуйста, укажите цвет ветки';}
 if(empty($name)){$error[] = 'Пожалуйста, укажите название ветки';}

    if (count($error) == 0) {

      $insert = insert("INSERT INTO uni_metro(name, color, city_id)VALUES(?,?,?)", array($name,$color,$id));        
                
          if($insert){
                $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";
                echo true;
                $Cache->update( "cityDefault" );
          }                 
        
      } else {
               $_SESSION["CheckMessage"]["warning"] = implode("<br/>", $error);        
             }

}
?>
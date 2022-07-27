<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");

if( !(new Admin())->accessAdmin($_SESSION['cp_control_tpl']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

$arrayFiles = getTplFiles();

$area_tpl = trim($_POST["area_tpl"]);
$file = $_POST["file"];
$type = $_POST["type"];
   
if( $type != "css" ){
  if( $settings["demo_view"] || $settings["demo_installment"] ){
    $_SESSION["CheckMessage"]["warning"] = "Шаблонизатор ограничен!";
    exit;   
  }
}

if( $arrayFiles[ $file ] && $type ){
 
   if($type == "file"){
      $dir = $config["basePath"]."/templates/".str_replace('/', '', $file);
   }elseif($type == "css"){
      $dir = $config["basePath"]."/templates/css/".str_replace('/', '', $file);
   }elseif($type == "js"){
      $dir = $config["basePath"]."/templates/js/".str_replace('/', '', $file);
   }
     
  if(file_exists($dir)){  
    $fp = @fopen($dir, "w");
    $write = @fwrite($fp, $area_tpl);
    @fclose($fp);
    if($write){
      $_SESSION["CheckMessage"]["success"] = 'Файл "'.$file.'" успешно изменен!';
    }else{
      $_SESSION["CheckMessage"]["error"] = "Недостаточно прав на запись. Измените права на 777 для папки templates";
    }

    echo true;
  }else{
    $_SESSION["CheckMessage"]["error"] = "Файл не найден!";
  } 

}else{
  $_SESSION["CheckMessage"]["warning"] = "Выберите шаблон для редактирования";
}

}
?>
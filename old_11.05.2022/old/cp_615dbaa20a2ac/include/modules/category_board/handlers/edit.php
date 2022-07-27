<?php

define('unisitecms', true);
session_start();

$config = require "../../../../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php");
include_once( $config["basePath"] . "/" . $config["folder_admin"] . "/lang/" . $settings["lang_admin_default"].".php" );

if( !(new Admin())->accessAdmin($_SESSION['cp_control_board']) ){
   $_SESSION["CheckMessage"]["warning"] = "Ограничение прав доступа!";
   exit;
}

if(isAjax() == true){

$CategoryBoard = new CategoryBoard();
$Main = new Main();
$Cache = new Cache();

$id = (int)$_POST["id"];
$error = array();

$getCategory = findOne("uni_category_board", "category_board_id =?", [$id]);

if(!$_POST["paid"]){
    $_POST["price"] = 0;
    $_POST["count_free"] = 0;
}

if(!$_POST["display_price"]){
    $_POST["variant_price"] = 0;
    $_POST["measure_price"] = 0;
    $_POST["auction"] = 0;
}

if( $_POST["variant_price"] != 0 && $_POST["variant_price"] !=2 ){
    $_POST["auction"] = 0;
    $_POST["secure"] = 0;
}

if( $_POST["variant_price"] == 1 || $_POST["variant_price"] == 2 ){
    $_POST["online_view"] = 0;
}

if($_POST["paid"]){
  if(!$_POST["price"]){
     $error[] = "Укажите стоимость размещения";
  }
}

if(!$_POST["name"]){$error[] = "Укажите название категории";}
 if($_POST["auto_title"]){
    if(!$_POST["auto_title_template"]){
        $error[] = "Укажите шаблон заголовка";
    }
 }

if(!$_POST["title"]){
    $_POST["title"] = $_POST["name"];
}

if(!$_POST["h1"]){
    $_POST["h1"] = $_POST["title"];
}

if(empty($_POST["alias"])){
   $alias = translite($_POST["name"]);         
}else{
   $alias = translite($_POST["alias"]);
}

if($_POST["id_cat"] == $id){
    $parent = "";
}else{
    $idsBuild = idsBuildJoin( $CategoryBoard->idsBuild($id, $CategoryBoard->getCategories()), $id );
    if(!$idsBuild){
         $parent = ",category_board_id_parent='".intval($_POST["id_cat"])."'";
      }else{
         $explode = explode(",",$idsBuild);
         if(!in_array($_POST["id_cat"], $explode)){
            $parent = ",category_board_id_parent='".intval($_POST["id_cat"])."'";
         }
      }
}     

if( !$_POST["image_delete"] ){

  if(count($error) == 0){
      $image = $Main->uploadedImage( ["files"=>$_FILES["image"], "path"=>$config["media"]["other"], "prefix_name"=>"category"] );
      if($image["error"]){
          $error = array_merge($error,$image["error"]);
      }else{
          if($image["name"]) $getCategory["category_board_image"] = $image["name"];
      }    
  }

}else{

  $getCategory["category_board_image"] = "";

}

if (count($error) == 0) {
    
  update("UPDATE uni_category_board SET category_board_name='".clear($_POST["name"])."',category_board_title='".clear($_POST["title"])."',category_board_alias='$alias',category_board_text='".urlencode($_POST["text"])."',category_board_description='".clear($_POST["desc"])."',category_board_visible='".intval($_POST["visible"])."',category_board_price='".round($_POST["price"],2)."',category_board_count_free='".intval($_POST["count_free"])."',category_board_status_paid='".intval($_POST["paid"])."',category_board_display_price='".intval($_POST["display_price"])."',category_board_variant_price='".intval($_POST["variant_price"])."',category_board_measure_price='".intval($_POST["measure_price"])."',category_board_auction='".intval($_POST["auction"])."',category_board_secure='".intval($_POST["secure"])."',category_board_image='".$getCategory["category_board_image"]."',category_board_online_view='".intval($_POST["online_view"])."',category_board_h1='".clear($_POST["h1"])."',category_board_auto_title='".intval($_POST["auto_title"])."',category_board_auto_title_template='".clear($_POST["auto_title_template"])."',category_board_show_index='".intval($_POST["show_index"])."' $parent WHERE category_board_id='$id'"); 

  if($_POST["subcategories"]){

     $nested_cat_ids = $CategoryBoard->idsBuild($id, $CategoryBoard->getCategories() );
     if($nested_cat_ids){
       update("UPDATE uni_category_board SET category_board_price='".round($_POST["price"],2)."', category_board_count_free='".intval($_POST["count_free"])."', category_board_status_paid='".intval($_POST["paid"])."', category_board_display_price='".intval($_POST["display_price"])."',category_board_variant_price='".intval($_POST["variant_price"])."',category_board_measure_price='".intval($_POST["measure_price"])."',category_board_auction='".intval($_POST["auction"])."',category_board_secure='".intval($_POST["secure"])."',category_board_online_view='".intval($_POST["online_view"])."' WHERE category_board_id IN(".$nested_cat_ids.")");
     }

  }
                 
  $_SESSION["CheckMessage"]["success"] = "Действие успешно выполнено!";
  echo true;

  $Cache->update( "uni_category_board" );
            
                
  } else {
           $_SESSION["CheckMessage"]["warning"] = implode("<br/>", $error);        
         }

}
?>
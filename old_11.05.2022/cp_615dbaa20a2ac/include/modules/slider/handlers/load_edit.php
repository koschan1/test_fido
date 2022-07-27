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

$data = findOne( "uni_sliders", "sliders_id=?", [ intval($_POST["id"]) ] );

   ?>

    <div class="form-group row d-flex align-items-center mb-5">
      <label class="col-lg-3 form-control-label">Изображение</label>
      <div class="col-lg-9">
           <input type="file" name="image">
      </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
      <label class="col-lg-3 form-control-label">Цвет фона</label>
      <div class="col-lg-9">
           <input type="text" id="swatches" name="color" class="form-control minicolors-edit" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#bcaaa4|#eeeeee|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e" value="<?php echo $data["sliders_color_bg"]; ?>">
      </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
      <label class="col-lg-3 form-control-label">Основной заголовок</label>
      <div class="col-lg-9">
           <input type="text" class="form-control" value="<?php echo $data["sliders_title1"]; ?>" name="title1" >
      </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
      <label class="col-lg-3 form-control-label">Подзаголовок</label>
      <div class="col-lg-9">
           <input type="text" class="form-control" value="<?php echo $data["sliders_title2"]; ?>" name="title2" >
      </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
    <label class="col-lg-3 form-control-label">Ссылка</label>
    <div class="col-lg-9">
    <div class="input-group">
      <input type="text" class="form-control" value="<?php echo $data["sliders_link"]; ?>" name="link" >
      <div class="input-group-append">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Промо страница</button>
        <div class="dropdown-menu">
          
          <?php
          $getPages = getAll("select * from uni_promo_pages where promo_pages_visible=?",[1]);
          if( count($getPages) ){
              foreach ($getPages as $key => $value) {
                 ?>
                 <a class="dropdown-item dropdown-item-page" href="#" data-alias="promo/<?php echo $value["promo_pages_alias"]; ?>" ><?php echo $value["promo_pages_title"]; ?></a>
                 <?php
              }
              ?>
              <div role="separator" class="dropdown-divider"></div>
              <?php
          }
          ?>
          
          <a class="dropdown-item" target="_blank" href="?route=promo_pages">Добавить страницу</a>
        </div>
      </div>
    </div>
    </div>
    </div>


    <input type="hidden" name="id" value="<?php echo $_POST["id"]; ?>" >

   <?php

}
?>
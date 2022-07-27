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

 $id = (int)$_POST["id"];
 $get = findOne("uni_country","country_id=?", array($id));
  
?>

 <form id="form-data-country-edit" >

    <div class="form-group row d-flex align-items-center mb-5">
      <label class="col-lg-3 form-control-label">Статус видимости</label>
      <div class="col-lg-9">
          <label>
            <input class="toggle-checkbox-sm toolbat-toggle" type="checkbox" name="status" <?php if(!empty($get->country_status)) echo 'checked=""'; ?> value="1" >
            <span><span></span></span>
          </label>
      </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
      <label class="col-lg-3 form-control-label">Название</label>
      <div class="col-lg-9">
           <input type="text" class="form-control" value="<?php echo $get->country_name; ?>" name="country" >
      </div>
    </div>
	
    <div class="form-group row d-flex align-items-center mb-5">
      <label class="col-lg-3 form-control-label">Алиас</label>
      <div class="col-lg-9">
           <input type="text" class="form-control" value="<?php echo $get->country_alias; ?>" name="alias" >
      </div>
    </div>

    <div class="form-group row d-flex align-items-center mb-5">
      <label class="col-lg-3 form-control-label">Описание</label>
      <div class="col-lg-9">
           <textarea name="desc" class="form-control" ><?php echo $get->country_desc; ?></textarea>
      </div>
    </div>
  
    <input type="hidden" name="id" value="<?php echo $id; ?>" />                                                              
 </form>
 
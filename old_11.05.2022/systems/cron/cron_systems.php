<?php

session_start();
define('unisitecms', true);

$config = require "./../../config.php";
$static_msg = require $config["basePath"] . "/static/msg.php";

if( !$_GET["key"] || $_GET["key"] != $config["cron_key"] ){ exit; }

include_once( $config["basePath"] . "/systems/classes/UniSite.php" );

update("update uni_settings set value=? where name=?", [1, "cron_systems_status"]);

$Ads = new Ads();
$Profile = new Profile();
$Main = new Main();
$Filters = new Filters();
$CategoryBoard = new CategoryBoard();
$Blog = new Blog();
$Cache = new Cache();
$Geo = new Geo();
$Shop = new Shop();

$getCron = getAll("select * from uni_crontab");

foreach ($getCron as $key => $value) {
	if( $value["crontab_update_count"] >= $value["crontab_time_count"]  ){
	  update("update uni_crontab set crontab_update_count=1 where crontab_id=?", [ $value["crontab_id"] ]);	
      
      @include("{$value["crontab_name"]}.php");
	  
    }else{
      update("update uni_crontab set crontab_update_count=crontab_update_count+1 where crontab_id=?", [ $value["crontab_id"] ]);
    }
}

update("UPDATE uni_settings SET value=? WHERE name=?", array( date("Y-m-d H:i:s") ,'cron_datetime_update'));
?>
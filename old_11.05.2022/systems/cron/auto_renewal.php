<?php
defined('unisitecms') or exit();

$period = date("Y-m-d H:i:s", time() + ($settings["ads_time_publication_default"] * 86400) );

$getAds = getAll("select * from uni_ads where ads_auto_renewal=? and ads_period_publication < now() limit 1000", [1]);

if(count($getAds)){
	foreach ($getAds as $key => $value) {
		update("UPDATE uni_ads SET ads_period_publication=?,ads_datetime_add=?,ads_period_day=? WHERE ads_id=?", [$period,date("Y-m-d H:i:s"),$settings["ads_time_publication_default"],$value["ads_id"]], true);
	}
}

?>
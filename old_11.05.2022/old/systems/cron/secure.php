<?php
defined('unisitecms') or exit();

$getAll = getAll("select * from uni_secure where secure_status='0' and unix_timestamp(secure_date)+10*60 < unix_timestamp(NOW())");

if(count($getAll)){
   foreach ($getAll as $key => $value) {
       $getAd = findOne("uni_ads", "ads_id=?", [ $value["secure_id_ad"] ]);
       if( $getAd["ads_status"] == 4 ){
          update("update uni_ads set ads_status=? where ads_id=?", [1, $value["secure_id_ad"] ], true);
          update("delete from uni_secure where secure_id=?", [$value["secure_id"] ]);
       }
   }
}

?>
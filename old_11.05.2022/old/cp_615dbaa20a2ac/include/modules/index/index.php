<?php 
if( !defined('unisitecms') ) exit;

$Ads = new Ads();
$Profile = new Profile();
$Geo = new Geo();

if($_GET["statistics_variant"]){
    if(intval($_GET["statistics_variant"]) == 1){
       $statistics_variant = 1;
    }elseif(intval($_GET["statistics_variant"]) == 2){
       $statistics_variant = 2;
    }else{
       $statistics_variant = 1;
    }
    update("update uni_settings set value=? where name=?", array( $statistics_variant, "statistics_variant" ) );
}else{
   $statistics_variant = $settings["statistics_variant"];
}


if( file_exists( $config["basePath"] . "/installment.php" ) ){
   include $config["basePath"] . "/installment.php";
}
?>    

<div class="text-right" >
  <div class="custom-link-dropdown" >
    Статистика: <a href="?route=index&statistics_variant=1" <?php if($statistics_variant == 1){ echo 'class="active"'; } ?> >За все время</a> <a href="?route=index&statistics_variant=2" <?php if($statistics_variant == 2){ echo 'class="active"'; } ?> >За сегодня</a>
  </div>
</div>

<div class="row flex-row">

   <div class="col-xl-3">
      <div class="widget widget-06 has-shadow widget-and-stat">
         <div class="widget-body">

            <h1 class="clients-chart-count" ></h1>
            <p>Пользователей</p>

         </div>
         <div class="widget-body p-0">
            <div id="clients-gain-chart" ></div>
         </div>         
      </div>
   </div>

   <div class="col-xl-3">
      <div class="widget widget-06 has-shadow widget-and-stat">
         <div class="widget-body">

            <h1 class="subscribe-chart-count" ></h1>
            <p>Подписчиков</p>

         </div>
         <div class="widget-body p-0">
            <div id="subscribe-gain-chart" ></div>
         </div>         
      </div>
   </div>

   <div class="col-xl-3">
      <div class="widget widget-06 has-shadow widget-and-stat">
         <div class="widget-body">

            <h1 class="ads-chart-count" ></h1>
            <p>Объявлений</p>

         </div>
         <div class="widget-body p-0">
            <div id="ads-gain-chart" ></div>
         </div>         
      </div>
   </div>

   <div class="col-xl-3">
      <div class="widget widget-06 has-shadow widget-and-stat">
         <div class="widget-body">

            <h1 class="orders-chart-count" ></h1>
            <p>Сумма продаж</p>

         </div>
         <div class="widget-body p-0">
            <div id="orders-gain-chart" ></div>
         </div>         
      </div>
   </div>

</div>

<div class="row">

   <div class="col-xl-4">
      <div class="widget widget-06 has-shadow widget-and-stat">
         <div class="widget-body">

            <h1 class="traffic-chart-count" ></h1>
            <p>Посетителей сегодня</p>

         </div>
         <div class="widget-body p-0">
            <div id="traffic-gain-chart" ></div>
         </div>         
      </div>
   </div>

   <div class="col-xl-4">
      <div class="widget widget-06 has-shadow widget-custom">
         <div class="widget-body data-list-ads">

         </div>         
      </div>
   </div>

   <div class="col-xl-4">
      <div class="widget widget-06 has-shadow widget-custom">
         <div class="widget-body data-list-users">

         </div>         
      </div>
   </div>


</div>

<div class="row" >
  <div class="col-lg-12" >

    <div class="widget widget-06 has-shadow">
       <div class="widget-body">

            <div class="table-responsive data-list-traffic">

            </div>

       </div>         
    </div>

  </div>
</div>


<div class="modal-metrics-route" >
   <i class="la la-times"></i>
   <div class="modal-metrics-route-content" >

   </div>
</div>


<input type="hidden" name="page" value="<?php echo intval($_GET["page"]); ?>" >

  
<script type="text/javascript" src="include/modules/index/script.js"></script>
          
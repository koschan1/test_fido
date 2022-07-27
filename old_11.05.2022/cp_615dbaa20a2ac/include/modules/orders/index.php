<?php
if( !defined('unisitecms') ) exit;

if(!$_SESSION["cp_control_orders"]){
    header("Location: ?route=index");
}

$LINK = '?route=orders';   
$_GET["page"] = empty($_GET["page"]) ? 1 : intval($_GET["page"]);

$Main = new Main();
$Profile = new Profile();
$Ads = new Ads();
$Geo = new Geo();
      
$salesOrders = $Admin->salesOrders();
$areaOrders = $Admin->areaOrders();

if( getCount("uni_orders") ){

?>   

<div class="row">
   <div class="page-header">
      <div class="d-flex align-items-center">
         <h2 class="page-header-title">Статистика продаж</h2>
      </div>
   </div>
</div>

<div class="row" >
<div class="col-lg-8">
   <div class="widget has-shadow">

      <div class="widget-body" style="min-height: 390px;" >

      <div class="d-flex justify-content-start">
          <div style="margin-right: 30px;" >
              <p class="mb-50 text-bold-600">Общая сумма продаж</p>
              <h2 class="text-bold-400">
                  <span class="text-success"><?php echo $salesOrders["all"]; ?></span>
              </h2>
          </div>
          <div style="margin-right: 30px;" >
              <p class="mb-50 text-bold-600">Сумма продаж сегодня</p>
              <h2 class="text-bold-400">
                  <span><?php echo $salesOrders["now"]; ?></span>
              </h2>
          </div>
          <div>
              <p class="mb-50 text-bold-600">За текущий месяц</p>
              <h2 class="text-bold-400">
                  <span><?php echo $salesOrders["month"]; ?></span>
              </h2>
          </div>
      </div>

         <div id="order-area" ></div>

      </div>

   </div>
</div> 

<div class="col-lg-4">
   <div class="widget has-shadow">

      <div class="widget-body" style="height: 390px; overflow: auto;" >

            <div class="table-responsive">

              <div class="order-list-summary" >

                <?php
                $countAllBuyUsers = getAll(" select * from uni_orders where orders_status_pay=? group by orders_id_user", [1] );
                $countAllBackBuyUsers = getAll(" select * from uni_orders where orders_status_pay=? group by orders_id_user having count(orders_id)>1", [1] );
                $countAllOrders = getOne(" select count(*) as total from uni_orders where orders_status_pay=?", [1] );
                ?>

                <span> Количество покупателей <i class="la la-question-circle" data-tippy-placement="top" title="Общее количество уникальных покупателей" ></i> <strong><?php echo count($countAllBuyUsers); ?></strong> </span>
                <span> Вернувшихся покупателей <i class="la la-question-circle" data-tippy-placement="top" title="Покупатели которые сделали больше одной покупки" ></i> <strong><?php echo count($countAllBackBuyUsers); ?></strong> </span>
                <span> Общее количество транзакций <strong><?php echo (int)$countAllOrders["total"]; ?></strong> </span>

              </div>

              <hr>

              <div class="order-list-summary-slider" >
                 <div class="order-list-summary-slider-item" >

                   <span class="order-list-summary-slider-item-icon" ><i class="la la-credit-card"></i></span>

                   <h5>Пополнение баланса</h5>

                   <?php
                      $summary_balance = getOne(" select count(*) as count, sum(orders_price) as total from uni_orders where orders_status_pay=? and orders_action_name=?", [1,'balance'] );
                   ?>
                   
                   <div class="row" >
                   <div class="col-lg-6" >
                     <strong>Количество</strong> <br> <span><?php echo (int)$summary_balance["count"]; ?></span>
                   </div>
                   <div class="col-lg-6" >
                     <strong>Сумма</strong> <br> <span><?php echo $Main->price($summary_balance["total"]); ?></span>
                   </div>
                   </div>
                    
                 </div>
                 <div class="order-list-summary-slider-item" >

                   <span class="order-list-summary-slider-item-icon" ><i class="la la-money" ></i></span>

                   <h5>Услуги</h5>
                   
                   <?php
                      $summary_services = getOne(" select count(*) as count, sum(orders_price) as total from uni_orders where orders_status_pay=? and orders_action_name=?", [1,'services'] );
                   ?>
                   
                   <div class="row" >
                   <div class="col-lg-6" >
                     <strong>Количество</strong> <br> <span><?php echo (int)$summary_services["count"]; ?></span>
                   </div>
                   <div class="col-lg-6" >
                     <strong>Сумма</strong> <br> <span><?php echo $Main->price($summary_services["total"]); ?></span>
                   </div>
                   </div>
                    
                 </div>
                 <div class="order-list-summary-slider-item" >

                   <span class="order-list-summary-slider-item-icon" ><i class="la la-shopping-cart"></i></span>

                   <h5>Магазины</h5>
                   
                   <?php
                      $summary_shops = getOne(" select count(*) as count, sum(orders_price) as total from uni_orders where orders_status_pay=? and orders_action_name=?", [1,'shop'] );
                   ?>
                   
                   <div class="row" >
                   <div class="col-lg-6" >
                     <strong>Количество</strong> <br> <span><?php echo (int)$summary_shops["count"]; ?></span>
                   </div>
                   <div class="col-lg-6" >
                     <strong>Сумма</strong> <br> <span><?php echo $Main->price($summary_shops["total"]); ?></span>
                   </div>
                   </div>
                    
                 </div>
                 <div class="order-list-summary-slider-item" >

                   <span class="order-list-summary-slider-item-icon" ><i class="la la-money" ></i></span>

                   <h5>Платные объявления</h5>
                   
                   <?php
                      $summary_category = getOne(" select count(*) as count, sum(orders_price) as total from uni_orders where orders_status_pay=? and orders_action_name=?", [1,'category'] );
                   ?>
                   
                   <div class="row" >
                   <div class="col-lg-6" >
                     <strong>Количество</strong> <br> <span><?php echo (int)$summary_category["count"]; ?></span>
                   </div>
                   <div class="col-lg-6" >
                     <strong>Сумма</strong> <br> <span><?php echo $Main->price($summary_category["total"]); ?></span>
                   </div>
                   </div>
                    
                 </div> 
                 <div class="order-list-summary-slider-item" >

                   <span class="order-list-summary-slider-item-icon" ><i class="la la-shield" ></i></span>

                   <h5>Безопасные сделки</h5>
                   
                   <?php
                      $summary_secure = getOne(" select count(*) as count, sum(orders_price) as total from uni_orders where orders_status_pay=? and orders_action_name=?", [1,'secure'] );
                   ?>
                   
                   <div class="row" >
                   <div class="col-lg-6" >
                     <strong>Количество</strong> <br> <span><?php echo (int)$summary_secure["count"]; ?></span>
                   </div>
                   <div class="col-lg-6" >
                     <strong>Сумма</strong> <br> <span><?php echo $Main->price($summary_secure["total"]); ?></span>
                   </div>
                   </div>
                    
                 </div>                                                                   
              </div>


            </div>

      </div>

   </div>
</div>


</div>

<div class="row">
  <div class="col-lg-12">

    <div class="widget widget-06 has-shadow">
       <div class="widget-body">

            <div class="table-responsive">

                 <?php

                    $count = getOne("SELECT count(*) as total FROM uni_orders")["total"];

                    $get = getAll("SELECT * FROM uni_orders LEFT JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_orders`.orders_id_user order by orders_id desc".navigation_offset( array( "count"=>$count, "output"=>$_SESSION["ByShow"], "page"=>$_GET["page"] ) ));     

                     if(count($get) > 0){   

                     ?>
                     <table class="table mb-0">
                        <thead>
                           <tr>
                            <th>№</th>
                            <th>Наименование</th>
                            <th>Сумма</th>
                            <th>Дата заказа</th>
                            <th>Статус оплаты</th>
                            <th style="text-align: right;" ></th>
                           </tr>
                        </thead>
                        <tbody>                     
                     <?php

                        foreach($get AS $value){

                        $getAd = $Ads->get("ads_id=".$value["orders_id_ad"]);
 
                        ?>

                         <tr >
                             <td><?php echo $value["orders_uid"]; ?></td>
                             <td>
                              <?php 
                              echo $value["orders_title"]; 
                              ?>
                              <div>
                              <?
                              if($getAd){
                                ?>
                                <a href="<?php echo $Ads->alias($getAd); ?>" target="_blank" ><?php echo $getAd["ads_title"]; ?></a>
                                <i class="la la-user"></i> <a href="?route=client_view&id=<?php echo $getAd["clients_id"]; ?>" target="_blank" ><?php echo $Profile->name($getAd); ?></a>
                                <?php
                              }elseif($value["orders_id_user"]){

                                $getUser = findOne("uni_clients", "clients_id=?", [ $value["orders_id_user"] ]);
                                if($getUser){
                                ?>
                                <i class="la la-user"></i> <a href="?route=client_view&id=<?php echo $value["orders_id_user"]; ?>" target="_blank" ><?php echo $Profile->name($getUser); ?></a>
                                <?php
                                }else{
                                   ?>
                                   <i class="la la-user"></i> Пользователь удален
                                   <?php
                                }  

                              }                            
                              ?> 
                              </div>
                             </td>
                             <td><?php echo $Main->price($value["orders_price"]); ?></td>
                             <td><?php echo datetime_format_cp($value["orders_date"]); ?></td>
                             <td>
                               <div class="dropdown">

                                <?php if($value["orders_status_pay"] == 1){ ?>

                                  <button class="btn btn-success btn-sm" >
                                    Оплачен
                                  </button>

                                <?php }else{ ?>

                                  <button class="btn btn-danger dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Не оплачен
                                  </button> 

                                  <div class="dropdown-menu">
                                    <a class="dropdown-item change-status-order" data-id="<?php echo $value["orders_id"]; ?>" data-status="1" href="#">Оплачен</a>
                                  </div>

                                <?php } ?>

                                </div>                               
                             </td> 
                             <td class="td-actions" style="text-align: right;" ><a href="#" class="delete-order" data-id="<?php echo $value["orders_id"]; ?>" ><i class="la la-close delete"></i></a></td> 
                         </tr> 

                         <?php                                         
                        } 

                        ?>

                           </tbody>
                        </table>

                        <?php               
                     }                  
                  ?>

            </div>

       </div>         
    </div>

  </div>
</div>


<ul class="pagination">  
 <?php echo out_navigation( array("count"=>$count, "output"=>$_SESSION["ByShow"], "url"=>$LINK, "prev"=>'<i class="la la-long-arrow-left"></i>', "next"=>'<i class="la la-arrow-right"></i>', "page_count" => $_GET["page"], "page_variable" => "page") );?>
</ul>

<script type="text/javascript" src="include/modules/orders/script.js"></script>

<script type="text/javascript">

var $primary = '#7367F0';
var $success = '#28C76F';
var $danger = '#EA5455';
var $warning = '#FF9F43';
var $info = '#00cfe8';
var $primary_light = '#A9A2F6';
var $danger_light = '#f29292';
var $success_light = '#55DD92';
var $warning_light = '#ffc085';
var $info_light = '#1fcadb';
var $strok_color = '#b9c3cd';
var $label_color = '#e7e7e7';
var $white = '#fff';

var revenueChartoptions = {
    chart: {
      height: 270,
      toolbar: { show: false },
      type: 'line',
    },
    stroke: {
      curve: 'smooth',
      dashArray: [0, 8],
      width: [4, 2],
    },
    grid: {
      borderColor: $label_color,
    },
    legend: {
      show: false,
    },
    colors: [$danger_light, $strok_color],

    fill: {
      type: 'gradient',
      gradient: {
        shade: 'dark',
        inverseColors: false,
        gradientToColors: [$primary, $strok_color],
        shadeIntensity: 1,
        type: 'horizontal',
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100, 100, 100]
      },
    },
    markers: {
      size: 0,
      hover: {
        size: 5
      }
    },
    xaxis: {
      labels: {
        style: {
          colors: $strok_color,
        }
      },
      axisTicks: {
        show: false,
      },
      categories: <?php echo $areaOrders["date"]; ?>,
      axisBorder: {
        show: false,
      },
      tickPlacement: 'on',
    },
    yaxis: {
      tickAmount: 5,
      labels: {
        style: {
          color: $strok_color,
        },
        formatter: function (val) {
            return val + $("body").data("currency");
        }
      }
    },
    tooltip: {
      x: { show: false }
    },
    series: [{
      name: "Сумма продаж",
      data: <?php echo $areaOrders["data"]; ?>
    }
    ],

  }

  var revenueChart = new ApexCharts(
    document.querySelector("#order-area"),
    revenueChartoptions
  );

  revenueChart.render();

</script> 

<?php
}else{
  ?>
  <div class="circle-img-icon" >
     <img src="<?php echo $settings["path_admin_image"]; ?>/admin-statistics.png">
     <h3 class="mt10" > <strong>Статистика продаж пока пуста</strong> </h3>
     <p>Как только появится информация о продажах - она тут отобразится</p>
  </div>
  <?php
}
?>

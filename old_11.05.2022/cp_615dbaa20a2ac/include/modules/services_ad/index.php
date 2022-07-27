<?php 
if( !defined('unisitecms') ) exit;

$LINK = '?route=services_ad';   
$_GET["page"] = empty($_GET["page"]) ? 1 : intval($_GET["page"]);

$Main = new Main();
?>

<div class="row">
   <div class="page-header">
      <div class="d-flex align-items-center">
         <h2 class="page-header-title">Услуги</h2>
      </div>
   </div>
</div>  


<div class="row" >
   <div class="col-lg-12" >
      <div class="widget has-shadow">
         <div class="widget-body">
            <div class="table-responsive">

                 <?php
                    $get = getAll("SELECT * FROM uni_services_ads order by services_ads_id_position asc");     

                     if(count($get) > 0){   

                     ?>
                     <table class="table mb-0">
                        <thead>
                           <tr>
                            <th></th>
                            <th>Название</th>
                            <th>Цена</th>
                            <th style="text-align: right;" ></th>
                           </tr>
                        </thead>
                        <tbody class="sort-container" >                     
                     <?php

                        foreach($get AS $value){

                        ?>

                         <tr id="item<?php echo $value["services_ads_id"]; ?>" >
                             <td><span class="icon-move move-sort" ><i class="la la-arrows-v"></i></span></td>
                             <td>

                              <?php echo $value["services_ads_name"]; ?>
                                
                             </td>

                             <td>

                               <?php echo $Main->outPrices( array("new_price"=> array("price"=>$value["services_ads_new_price"], "tpl"=>'<span class="span_newPrice" >{price}</span>'), "price"=>array("price"=>$value["services_ads_price"], "tpl"=>'<span class="span_oldPrice" >{price}</span>') ) ); ?>

                             </td>

                             <td class="td-actions" style="text-align: right;" >
                              <a class="load_edit_services" data-id="<?php echo $value["services_ads_id"]; ?>" ><i class="la la-edit edit"></i></a>
                             </td>                          
                         </tr> 
                 
                       
                         <?php                                         
                        } 

                        ?>

                           </tbody>
                        </table>

                        <?php               
                     }else{
                         
                         ?>
                            <div class="plug" >
                               <i class="la la-exclamation-triangle"></i>
                               <p>Услуг нет</p>
                            </div>
                         <?php

                     }                  
                  ?>

            </div>
         </div>
      </div>
   </div>
</div>

<div id="modal-services-edit" class="modal fade">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Редактирование услуги</h4>
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
            <span class="sr-only">close</span>
            </button>
         </div>
         <div class="modal-body">
            
               <form method="post" class="form-services-edit" >
               </form>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-shadow" data-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary board-edit-services">Сохранить</button>
         </div>
      </div>
   </div>
</div>
  
<script type="text/javascript" src="include/modules/services_ad/script.js"></script>
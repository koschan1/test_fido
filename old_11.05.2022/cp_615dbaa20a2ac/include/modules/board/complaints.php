<?php 
if( !defined('unisitecms') ) exit;

$LINK = '?route=complaints';   
$_GET["page"] = empty($_GET["page"]) ? 1 : intval($_GET["page"]);

$Ads = new Ads();
$Main = new Main();

?>

<div class="row">
   <div class="page-header">
      <div class="d-flex align-items-center">
         <h2 class="page-header-title">Жалобы</h2>
         <div>
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="?route=board">Объявления</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>  

<div class="row" >
   <div class="col-lg-12" >
      <div class="widget has-shadow">

         <div class="widget-body">
            <div class="table-responsive">

                 <?php

                    $count = getOne("SELECT count(*) as total FROM uni_ads_complain")["total"];

                    $get = getAll("SELECT * FROM uni_ads_complain order by ads_complain_id desc ".navigation_offset( array( "count"=>$count, "output"=>$_SESSION["ByShow"], "page"=>$_GET["page"] ) ));     

                     if(count($get) > 0){   

                     ?>
                     <table class="table mb-0">
                        <thead>
                           <tr>
                            <th>Обращение</th>
                            <th>Заявитель</th>
                            <th>Дата обращения</th>
                            <th>Действие</th>
                           </tr>
                        </thead>
                        <tbody class="sort-container" >                     
                     <?php

                        foreach($get AS $value){

                        $getAd = $Ads->get("ads_id=? ", array($value["ads_complain_id_ad"]) );
                        $getUser = findOne("uni_clients", "clients_id=?", array($value["ads_complain_id_user"]));
 
                        ?>

                         <tr>
                             <td style="max-width: 350px;" >
                               <?php echo $value["ads_complain_text"]; ?>
                               <div>
                                 <i class="la la-arrow-right"></i> <a style="color: #4d69f9;" target="_blank"  href="<?php echo $Ads->alias($getAd); ?>"><?php echo $getAd["ads_title"]; ?></a>
                               </div>
                             </td> 
                             <td><a href="?route=client_view&id=<?php echo $value["ads_complain_id_user"]; ?>"><?php echo $getUser["clients_name"]; ?></a></td>
                             <td><?php echo datetime_format_cp($value["ads_complain_date"]); ?></td>
                             <td>
                              
                                <div class="dropdown">

                                <button class="btn btn-danger dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Выберите действие
                                </button>                                 
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <?php if($getAd["ads_status"] != 3 && $getAd["ads_status"] != 8){ ?>
                                  <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_complain_id_ad"]; ?>" now-status="<?php echo $value["ads_status"] ?>" data-status="3" href="#">Заблокировать объявление</a>
                                  <?php } ?>
                                  <a class="dropdown-item delete-complaint" data-id="<?php echo $value["ads_complain_id"]; ?>" href="#">Удалить жалобу</a>
                                </div>

                                </div>


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
                               <p>Жалоб нет</p>
                            </div>
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

<div id="modal-block-ads" class="modal fade">
   <div class="modal-dialog" style="max-width: 600px;" >
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Заблокировать объявление</h4>
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
            <span class="sr-only">close</span>
            </button>
         </div>
         <div class="modal-body">
            
               <form method="post" class="form-block-ads" >

                  <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-4 form-control-label">Выберите причину</label>
                    <div class="col-lg-8">
                          <select name="text" class="selectpicker" title="Не выбрано" >
                             <option value="Запрещенный товар" >Запрещенный товар</option>
                             <option value="Непристойное содержание" >Непристойное содержание</option>
                             <option value="Мошенничество" >Мошенничество</option>
                             <option value="Спам" >Спам</option>
                             <option value="Нарушение правил сайта" >Нарушение правил сайта</option>
                          </select>
                    </div>
                  </div>
                  
                  <input type="hidden" name="id_ad" value="0" >
  
               </form>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-shadow" data-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-danger action-block-ads">Заблокировать</button>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript" src="include/modules/board/script.js"></script>


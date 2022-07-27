<header class="header-wow d-none d-lg-block" >
   
   <div class="container" >


       </div>
   </div>

   <div class="header-wow-sticky-static" >
       
       <div class="header-wow-sticky" >
       <div class="container" >
         
           <div class="row" >
               <div class="col-lg-1 text-right" >
                  <a class="h-logo" href="<?php echo _link(); ?>" title="<?php echo $ULang->t($settings["title"]); ?>" >
                      <img src="<?php echo $settings["logotip-mobile"]; ?>" data-inv="<?php echo $settings["logo_color_inversion"]; ?>" alt="<?php echo $ULang->t($settings["title"]); ?>">
                  </a>
               </div>

               <div class="col-lg-2 col-md-2 col-sm-2" >
                  <span class="header-wow-sticky-menu btn-color-blue open-big-menu" > <i class="las la-bars"></i> <i class="las la-times"></i> <?php echo $ULang->t('Разделы'); ?></span>
               </div>
               <div class="<?php if($settings["marketplace_status"] && $settings["visible_lang_site"]){ echo 'col-lg-5'; }else{ echo 'col-lg-7'; } ?> col-md-5 col-sm-5" >
                  <form class="form-ajax-live-search" method="get" action="<?php echo $_SESSION["geo"]["alias"] ? _link($_SESSION["geo"]["alias"]) : _link($settings["country_default"]); ?>" >
                  <div class="header-wow-sticky-search" >
                      
                      <input type="text" name="search" class="ajax-live-search" autocomplete="off" placeholder="<?php echo $ULang->t("Поиск по объявлениям"); ?>" value="<?php echo clear($_GET["search"]); ?>" >

                      <div class="main-search-results" ></div>

                      <button class="header-wow-sticky-search-action" ><i class="las la-search"></i></button>

                  </div>
                  </form>
               </div>
               <div class="<?php if($settings["marketplace_status"] && $settings["visible_lang_site"]){ echo 'col-lg-5'; }else{ echo 'col-lg-2'; } ?> col-md-5 col-sm-5 text-right header-wow-sticky-list" >
                   <?php if($settings["visible_lang_site"]){ ?>
                    <div class="toolbar-dropdown dropdown-click">
                      <span class="toolbar-dropdown-image-circle" ><img class="image-autofocus" src="<?php echo Exists( $config["media"]["other"],$_SESSION["langSite"]["image"],$config["media"]["no_image"] ); ?>"></span>
                      <div class="toolbar-dropdown-box width-180 right-0 no-padding toolbar-dropdown-js">

                           <div class="dropdown-box-list-link dropdown-lang-list">

                              <?php
                                $getLang = getAll("select * from uni_languages where status=?", [1]);
                                if(count($getLang)){
                                   foreach ($getLang as $key => $value) {
                                      ?>
                                      <a href="<?php echo trim($config["urlPath"] . "/" . $value["iso"] . "/" . REQUEST_URI, "/"); ?>"> <img src="<?php echo Exists( $config["media"]["other"],$value["image"],$config["media"]["no_image"] ); ?>"> <span><?php echo $value["name"]; ?></span> </a>
                                      <?php
                                   }
                                }
                              ?>

                           </div>

                      </div>
                    </div>
                    <?php } ?>
                    
                    
                    <?php if( $settings["marketplace_status"] ){ ?>
                    <div class="toolbar-link toolbar-link-cart" >
                        <span class="label-count-cart cart-item-counter" style="display: none;" ></span>

                        <?php if($settings["marketplace_view_cart"] == 'modal'){ ?>
                            <a class="toolbar-link-icon open-modal" data-id-modal="modal-cart" ><i class="las la-shopping-bag"></i></a>
                        <?php }elseif($settings["marketplace_view_cart"] == 'sidebar'){ ?>
                            <a class="toolbar-link-icon sidebar-cart-open" ><i class="las la-shopping-bag"></i></a>
                        <?php }elseif($settings["marketplace_view_cart"] == 'page'){ ?>
                            <a class="toolbar-link-icon" href="<?php echo _link('cart'); ?>" ><i class="las la-shopping-bag"></i></a>
                        <?php } ?>

                    </div>
                    <?php } ?>

                    <div class="toolbar-link toolbar-link-profile" ><?php echo $Profile->headerUserMenu(false); ?></div>

                    <div class="toolbar-link" ><a href="<?php echo _link("ad/create"); ?>" class="header-wow-sticky-add btn-color-light" > <i class="las la-plus"></i></a></div>

               </div>

           </div>

        </div>
        </div>

   </div>

</header>

<header class="header-wow-mobile d-block d-lg-none" >
   
   <div class="header-wow-top-geo-mobile" >
      <div class="container" >
         <div class="row" >
             <div class="col-2" >
                <a class="h-logo-mobile" href="<?php echo _link(); ?>" title="<?php echo $ULang->t($settings["title"]); ?>" >
                    <img src="<?php echo $settings["logotip-mobile"]; ?>" data-inv="<?php echo $settings["logo_color_inversion"]; ?>" alt="<?php echo $ULang->t($settings["title"]); ?>">
                </a>
             </div>   
             <div class="col-5" >
                <div class="toolbar-link" > <span <?php if(!$settings["city_id"]){ ?> class="open-modal" data-id-modal="modal-geo" <?php } ?> ><i class="las la-map-marker-alt icon-link-middle"></i> <?php if($_SESSION["geo"]["data"]){ echo $ULang->t($Geo->change()["name"], [ "table"=>"geo", "field"=>"geo_name" ] ); }else{ echo $ULang->t('Выберите город'); } ?></span></div>
             </div>       
             <div class="col-5 text-right" >

                <div class="toolbar-link" > <span class="open-menu-mobile mobile-open-big-menu" ><i class="las la-bars mobile-icon-menu-open"></i><i class="las la-times mobile-icon-menu-close"></i> <?php echo $ULang->t('Меню'); ?> </span> </div>

             </div>
         </div>
      </div>
   </div>

   <div class="header-wow-sticky-mobile" >
       
       <div class="container" >
         
           <div class="row" >
               
               <div class="col-12 col-lg-12 text-right" >


                <?php if($settings["visible_lang_site"]){ ?>
                <div class="toolbar-dropdown dropdown-click mr15">
                  <span class="toolbar-dropdown-image-circle" ><img class="image-autofocus" src="<?php echo Exists( $config["media"]["other"],$_SESSION["langSite"]["image"],$config["media"]["no_image"] ); ?>"></span>
                  <div class="toolbar-dropdown-box no-padding toolbar-dropdown-js">

                       <div class="dropdown-box-list-link dropdown-lang-list">

                          <?php
                            $getLang = getAll("select * from uni_languages where status=?", [1]);
                            if(count($getLang)){
                               foreach ($getLang as $key => $value) {
                                  ?>
                                  <a href="<?php echo trim($config["urlPath"] . "/" . $value["iso"] . "/" . REQUEST_URI, "/"); ?>"> <img src="<?php echo Exists( $config["media"]["other"],$value["image"],$config["media"]["no_image"] ); ?>"> <span><?php echo $value["name"]; ?></span> </a>
                                  <?php
                               }
                            }
                          ?>

                       </div>

                  </div>
                </div>
                <?php } ?>
                
                <?php if( $settings["marketplace_status"] ){ ?>
                <div class="toolbar-link toolbar-link-cart mr15" >
                    <span class="label-count-cart cart-item-counter" style="display: none;" ></span>

                    <?php if($settings["marketplace_view_cart"] == 'modal'){ ?>
                        <a class="toolbar-link-icon open-modal" data-id-modal="modal-cart" ><i class="las la-shopping-bag"></i></a>
                    <?php }elseif($settings["marketplace_view_cart"] == 'sidebar'){ ?>
                        <a class="toolbar-link-icon sidebar-cart-open" ><i class="las la-shopping-bag"></i></a>
                    <?php }elseif($settings["marketplace_view_cart"] == 'page'){ ?>
                        <a class="toolbar-link-icon" href="<?php echo _link('cart'); ?>" ><i class="las la-shopping-bag"></i></a>
                    <?php } ?>

                </div>
                <?php } ?>

                <div class="toolbar-link toolbar-link-profile" ><?php echo $Profile->headerUserMenu(false); ?></div>

               </div>

           </div>

       </div>

   </div>

   <div class="header-wow-sticky-mobile-search" >
      
       <div class="container" >
         
            <form class="form-ajax-live-search" method="get" action="<?php echo $_SESSION["geo"]["alias"] ? _link($_SESSION["geo"]["alias"]) : _link($settings["country_default"]); ?>" >
            <div class="header-wow-sticky-search" >
                
                <input type="text" name="search" class="ajax-live-search" autocomplete="off" placeholder="<?php echo $ULang->t("Поиск по объявлениям"); ?>" value="<?php echo clear($_GET["search"]); ?>" >

                <div class="main-search-results" ></div>

                <button class="header-wow-sticky-search-action" ><i class="las la-search"></i></button>

            </div>
            </form>

       </div>

   </div>

</header>

<div class="header-mobile-menu" >

  <div class="mb30" >
    <a class="mobile-footer-menu-item btn-color-green" href="<?php echo _link("ad/create"); ?>" ><i class="las la-plus"></i> <?php echo $ULang->t("Добавить объявление"); ?></a>
  </div>
  
  <?php if( count($settings["frontend_menu"]) ){ ?>
  <h5> <strong><?php echo $ULang->t("Меню"); ?></strong> </h5>
  <?php
      
      foreach ($settings["frontend_menu"] as $key => $value) {
         $link = strpos($value["link"], "http") !== false ? $value["link"] : _link($value["link"]);
         $target = strpos($value["link"], "http") !== false ? 'target="_blank"' : '';
         ?>
         <a href="<?php echo $link; ?>" <?php echo $target; ?> ><?php echo $ULang->t($value["name"]); ?></a>
         <?php
      }
  
  }
  ?>

  <h5> <strong><?php echo $ULang->t("Категории"); ?></strong> </h5>

  <?php
      if(count($getCategoryBoard["category_board_id_parent"][0])){
        foreach ($getCategoryBoard["category_board_id_parent"][0] as $value) {

           ?>
           <a href="<?php echo $CategoryBoard->alias($value["category_board_chain"]); ?>"  ><?php echo $ULang->t( $value["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ); ?> <!--...<?php echo $CategoryBoard->getCountAd( $value["category_board_id"] ); ?>--></a>
           <?php

        }
      }
  ?>
  
</div>

<div  id="element" class="header-big-category-menu init_<?php echo base64_encode($settings["lnc_key"]); ?>" >

    <div class="container overflow" >
        <div class="row no-gutters" >

           <div class="col-lg-3 col-12 col-md-4 col-sm-4" >

              <div class="header-big-category-menu-list js-big-category" >

                  <?php
                      $show_first = true;

                      if(count($getCategoryBoard["category_board_id_parent"][0])){
                        foreach ($getCategoryBoard["category_board_id_parent"][0] as $key => $value) {

                          if( $show_first ){
                              $show = 'style="display: block;"';
                              $active = 'class="active"';
                          }else{ $show = ''; $active = ''; }

                          $show_first = false;

                          ?>
                           <div data-id="<?php echo $value["category_board_id"]; ?>" >

                              <a href="<?php echo $CategoryBoard->alias($value["category_board_chain"]); ?>" <?php echo $active; ?> >
                              <img src="<?php echo Exists($config["media"]["other"],$value["category_board_image"],$config["media"]["no_image"]); ?>" >
                              <span><?php echo $ULang->t( $value["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ); ?> <!--...<?php echo $CategoryBoard->getCountAd( $value["category_board_id"] ); ?>--></span>
                              </a>

                           </div>
                          <?php
                          
                          if($value["category_board_image"]){
                              $category_images .= '
                                   <div class="header-big-category-image" data-id-parent="'.$value["category_board_id"].'" '.$show.' >
                                      <div></div>
                                      <img alt="'.$ULang->t( $value["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ).'" src="'.Exists($config["media"]["other"],$value["category_board_image"],$config["media"]["no_image"]).'" >
                                   </div>
                              ';
                          }

                        }
                      }

                      $show_first = true;

                      if(count($getCategoryBoard["category_board_id_parent"][0])){
                        foreach ($getCategoryBoard["category_board_id_parent"][0] as $value) {


                          if( $getCategoryBoard["category_board_id_parent"][ $value["category_board_id"] ] ){

                              if( $show_first ){
                                  $show = 'style="display: block;"';
                              }else{ $show = ''; }

                              $show_first = false;

                              $subcategory_display1 .= '
                                <div class="header-big-subcategory-menu-list js-big-subcategory1" data-id-parent="'.$value["category_board_id"].'" '.$show.' >
                                <h4>'.$Seo->replace($ULang->t( $value["category_board_h1"], [ "table" => "uni_category_board", "field" => "category_board_h1" ] )).'</h4>
                              ';

                              foreach ($getCategoryBoard["category_board_id_parent"][ $value["category_board_id"] ] as $subvalue1) {

                                  $subcategory_display1 .= '
                                     <div data-id="'.$subvalue1["category_board_id"].'" >
                                       <a href="'.$CategoryBoard->alias($subvalue1["category_board_chain"]).'">'.$ULang->t( $subvalue1["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ).' <!--...'.$CategoryBoard->getCountAd( $subvalue1["category_board_id"] ).'--></a>
                                     </div>
                                  ';

                                  if( $getCategoryBoard["category_board_id_parent"][ $subvalue1["category_board_id"] ] ){
                                      
                                      $subcategory_display2 .= '
                                        <div class="header-big-subcategory-menu-list js-big-subcategory2" data-id-parent="'.$subvalue1["category_board_id"].'" >
                                        <h4>'.$Seo->replace($ULang->t( $subvalue1["category_board_title"], [ "table" => "uni_category_board", "field" => "category_board_title" ] )).'</h4>
                                      ';

                                      foreach ($getCategoryBoard["category_board_id_parent"][ $subvalue1["category_board_id"] ] as $subvalue2) {
                                          $subcategory_display2 .= '
                                             <div>
                                               <a href="'.$CategoryBoard->alias($subvalue2["category_board_chain"]).'">'.$ULang->t( $subvalue2["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ).'<!--...'.$CategoryBoard->getCountAd( $subvalue2["category_board_id"] ).'--></a>
                                             </div>
                                          ';
                                      }

                                      $subcategory_display2 .= '
                                        </div>
                                      '; 

                                  }

                              }

                              $subcategory_display1 .= '
                                </div>
                              ';                              
                          }


                        }
                      }


                  ?>

              </div>

           </div>

           <div class="col-lg-3 col-md-4 col-sm-4 d-none d-md-block" >
             
              <?php echo $subcategory_display1; ?>

           </div>

           <div class="col-lg-3 col-md-4 col-sm-4 d-none d-md-block" >
             
              <?php echo $subcategory_display2; ?>

           </div>

           <div class="col-lg-3 d-none d-lg-block" >
             
              <?php echo $category_images; ?>

           </div>


        </div>
    </div>
  
</div>

<?php
if( $_SESSION['cp_auth'][ $config["private_hash"] ] && $_SESSION["cp_control_tpl"] ){

  ?>

    <div class="modal-custom-bg"  id="modal-edit-site-menu" style="display: none;" >
        <div class="modal-custom animation-modal" style="max-width: 600px;" >

          <span class="modal-custom-close" ><i class="las la-times"></i></span>

          <h4> <strong>Редактирование меню</strong> </h4>

          <div class="mt30" ></div>
          
          <form class="modal-edit-site-menu-form" >
          <div class="modal-edit-site-menu-list" >

             <?php
                if( count($settings["frontend_menu"]) ){
                    foreach ($settings["frontend_menu"] as $key => $value) {

                       $key = uniqid();
                       ?>
                       <div class="modal-edit-site-menu-item" >
                          <div class="row" >
                             <div class="col-lg-6 col-6" >
                                <input type="text" name="menu[<?php echo $key; ?>][name]" class="form-control" placeholder="Название" value="<?php echo $value["name"]; ?>" >
                             </div>
                             <div class="col-lg-5 col-5" >
                                <input type="text" name="menu[<?php echo $key; ?>][link]" class="form-control" placeholder="Ссылка" value="<?php echo $value["link"]; ?>" >
                             </div>
                             <div class="col-lg-1 col-1" >
                                <span class="modal-edit-site-menu-delete" > <i class="las la-trash"></i> </span>
                             </div>                                                
                          </div>
                       </div>                       
                       <?php

                    }
                }
             ?>

          </div>
          
          <div class="mt10" ></div>

          <span class="modal-edit-site-menu-add btn-custom-mini btn-color-light" >Добавить</span>

          </form>

          <div class="mt30" ></div>

          <button class="button-style-custom schema-color-button color-green mb10 width100 modal-edit-site-menu-save" >Сохранить</button>

        </div>
    </div>    

  <?php

}
?>


<?php echo $Banners->out( ["position_name"=>"stretching", "current_id_cat"=>$data["category"]["category_board_id"], "categories"=>$getCategoryBoard] ); ?>
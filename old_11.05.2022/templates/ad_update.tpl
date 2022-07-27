<!doctype html>
<html lang="<?php echo getLang(); ?>">
   <head>
      
      <title><?php echo $data["ads_title"]; ?></title>
      
      <?php include $config["basePath"] . "/templates/head.tpl"; ?>

   </head>
   <body data-prefix="<?php echo $config["urlPrefix"]; ?>" >

     <?php include $config["basePath"] . "/templates/header.tpl"; ?>

      <div class="preload" >
          <div class="spinner-grow mt80 preload-spinner" role="status">
            <span class="sr-only"></span>
          </div>
      </div>

      <div class="ads-create-update-container display-load-page" >
        
           <div class="row" >
              
              <div class="col-lg-12" >
                <h1 class="h1title mt30 mb30" > <?php echo $ULang->t("Редактирование объявления"); ?> </h1>
              </div>

              <div class="col-lg-9" >
                             
                   <form class="ads-form-ajax" >

                      <div class="ads-update-main-data" >
                        
                           <div class="ads-create-main-data-box-item" style="margin-top: 0px; margin-bottom: 25px;" >
                                <p class="ads-create-subtitle" ><?php echo $ULang->t("Категория"); ?></p>
                                
                                <div class="ads-update-category-box" >
                                   <span><?php echo $CategoryBoard->breadcrumb($getCategoryBoard,$data["ads_id_cat"],'{NAME}',' › '); ?></span>
                                   <div class="ads-update-category-list" >
                                      <?php echo $data["list_categories"]; ?>
                                   </div>
                                </div>

                                <div class="msg-error" data-name="c_id" ></div>
                           </div>

                           <div class="ads-create-main-data-title" >
                             
                              <?php
                                  if( !$getCategoryBoard["category_board_id"][$data["ads_id_cat"]]["category_board_auto_title"] ){

                                     ?>

                                        <div class="ads-create-main-data-box-item" style="margin-top: 0px; margin-bottom: 25px;" >
                                            <p class="ads-create-subtitle" ><?php echo $ULang->t("Название"); ?></p>
                                            <input type="text" name="title" class="ads-create-input" value="<?php echo $data["ads_title"]; ?>" >
                                            <p class="create-input-length" ><?php echo $ULang->t("Символов"); ?> <span><?php echo mb_strlen($data["ads_title"], "UTF-8"); ?></span> <?php echo $ULang->t("из"); ?> <?php echo $settings["ad_create_length_title"]; ?></p>
                                            <div class="msg-error" data-name="title" ></div>
                                        </div>

                                     <?php

                                  }
                              ?>

                           </div>
                           
                           <div class="ads-create-main-data-box-item" style="margin-top: 0px;" >
                               <p class="ads-create-subtitle" ><?php echo $ULang->t("Фотографии"); ?></p>
                               <p class="create-info" > <i class="las la-question-circle"></i> <?php echo $ULang->t("Первое фото будет отображаться в результатах поиска, выберите наиболее удачное. Вы можете загрузить до"); ?> <?php echo $settings["count_images_add_ad"]; ?> <?php echo $ULang->t("фотографий в формате JPG или PNG. Максимальный размер фото"); ?> — <?php echo $settings["size_images_add_ad"]; ?>mb.</p>

                               <div id="dropzone" class="dropzone mt20 sortable" id="dropzone" >
                                 
                                   <?php
                                     $gallery = $Ads->getImages($data["ads_images"]);
                                     if(count($gallery)){
                                       foreach ($gallery as $key => $name) {
                                        $uid = uniqid();
                                          ?>
                                            <div class="dz-preview dz-preview-custom">
                                               <div class="dz-image"><img class="image-autofocus" alt="<?php echo $name; ?>" src="<?php echo Exists($config["media"]["big_image_ads"],$name,$config["media"]["no_image"]); ?>?<?php echo $uid; ?>"></div>
                                               <div class="dz-details">
                                                  <div class="dz-size"><span data-dz-size=""><?php echo calcFilesize( filesize( $config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name ) ); ?></span></div>
                                                  <div class="dz-filename"><span data-dz-name="<?php echo $name; ?>"><?php echo $name; ?></span></div>
                                               </div>                                                                             
                                               <div class="dz-dropzone-delete" ><i class="las la-trash-alt"></i></div>
                                               <div class="dz-dropzone-sortable sortable-handle"><i class="las la-arrows-alt"></i></div>
                                               <input type="hidden" name="gallery[<?php echo $uid; ?>]" value="<?php echo $name; ?>" style="display: none;">
                                            </div>                                  
                                          <?php
                                       }
                                     }
                                   ?>

                               </div>
                               <div class="msg-error" data-name="gallery" ></div>
                           </div>
                           
                           <div class="ads-create-main-data-box-item" >
                               <p class="ads-create-subtitle" ><?php echo $ULang->t("Видео"); ?></p>
                               <p class="create-info" > <i class="las la-question-circle"></i> <?php echo $ULang->t("Можно добавить ссылку на видеоролик в Youtube, Rutube или Vimeo"); ?></p>
                               <input type="text" name="video" class="ads-create-input mt20" value="<?php echo $data["ads_video"]; ?>" >
                           </div>
                           
                           <div class="ads-create-main-data-box-item" >
                               <p class="ads-create-subtitle" ><?php echo $ULang->t("Описание"); ?></p>
                               <textarea name="text" class="ads-create-textarea" rows="7" ><?php echo $data["ads_text"]; ?></textarea>  
                               <p class="create-input-length" ><?php echo $ULang->t("Символов"); ?> <span><?php echo mb_strlen($data["ads_text"], "UTF-8"); ?></span> <?php echo $ULang->t("из"); ?> <?php echo $settings["ad_create_length_text"]; ?></p>
                               <div class="msg-error" data-name="text" ></div> 
                           </div> 

                           <?php if( $settings["ad_create_period"] ){ ?>
                           <div class="ads-create-main-data-box-item" >
                                <p class="ads-create-subtitle" ><?php echo $ULang->t("Срок публикации"); ?></p>
                                <div class="row" >
                                  <div class="col-lg-6" >
                                    
                                       <div class="uni-select" data-status="0">

                                           <div class="uni-select-name" data-name="<?php echo $ULang->t("Не выбрано"); ?>"> <span><?php echo $ULang->t("Не выбрано"); ?></span> <i class="la la-angle-down"></i> </div>
                                           <div class="uni-select-list">
                                               
                                                <?php echo $list_period; ?>
                                
                                           </div>
                                          
                                        </div>

                                  </div>
                                </div>
                            </div>
                            <?php } ?>                 

                           <div class="ads-create-main-data-filters" <?php if( $data["filters"] ){ echo 'style="display: block;"'; } ?> >
                                 
                                 <?php echo $data["filters"]; ?>

                           </div>   

                           <div class="ads-create-main-data-price" <?php if( $data["price"] ){ echo 'style="display: block;"'; } ?> >
                             
                                 <?php echo $data["price"]; ?>

                           </div>  

                           <div class="ads-create-main-data-available" <?php if( $data["available"] ){ echo 'style="display: block;"'; } ?> >

                                <?php if( $Cart->modeAvailableCart($getCategoryBoard,$data["ads_id_cat"],$data["ads_id_user"]) ){ ?>
                                  <div class="ads-create-main-data-box-item" >

                                      <p class="ads-create-subtitle" ><?php echo $ULang->t("В наличии"); ?></p>

                                      <div class="row" >
                                        
                                        <div class="col-lg-6" >
                                            <input type="text" name="available" value="<?php echo $data["ads_available"]; ?>" class="ads-create-input inputNumber" maxlength="5" >
                                            <div class="msg-error" data-name="available" ></div>
                                        </div>
                                        
                                        <div class="col-lg-6" >

                                            <div class="custom-control custom-checkbox mt10">
                                                <input type="checkbox" class="custom-control-input" name="available_unlimitedly" <?php if($data["ads_available_unlimitedly"]){ echo 'checked=""'; } ?> id="available_unlimitedly" value="1">
                                                <label class="custom-control-label" for="available_unlimitedly"><?php echo $ULang->t("Неограниченно"); ?></label>
                                            </div>

                                        </div> 

                                      </div>

                                  </div>
                                <?php } ?>

                           </div>

                           <div class="ads-create-main-data-online-view" >
                             
                             <?php
                                  if( $getCategoryBoard["category_board_id"][$data["ads_id_cat"]]["category_board_online_view"] ){

                                     ?>

                                         <div class="ads-create-main-data-box-item" >
                                            <p class="ads-create-subtitle" ><?php echo $ULang->t("Возможен онлайн-показ"); ?></p>
                                            <div class="create-info" ><i class="las la-question-circle"></i> <?php echo $ULang->t("Выберите, если готовы показать товар/объект с помощью видео-звонка — например, через WhatsApp, Viber, Skype или другой сервис"); ?></div>
                                            <div class="custom-control custom-checkbox mt15">
                                                <input type="checkbox" class="custom-control-input" name="online_view" <?php if($data["ads_online_view"]){ echo 'checked=""'; } ?> id="online_view" value="1">
                                                <label class="custom-control-label" for="online_view"><?php echo $ULang->t("Готовы показать онлайн"); ?></label>
                                            </div>
                                         </div>

                                     <?php

                                  }
                             ?>

                           </div>     

                           <div class="ads-create-main-data-box-item" >
                              
                              <p class="ads-create-subtitle" ><?php echo $ULang->t("Город"); ?></p>

                              <div class="container-custom-search" >
                                <input type="text" autocomplete="nope" class="ads-create-input action-input-search-city" value="<?php echo $data["city_name"]; ?>" placeholder="<?php echo $ULang->t("Начните вводить город, а потом выберите его из списка"); ?>" >
                                <div class="custom-results SearchCityResults SearchCityOptions" ></div>
                              </div>

                              <div class="msg-error" data-name="city_id" ></div>
                              <input type="hidden" name="city_id" value="<?php echo $data["ads_city_id"]; ?>" > 

                           </div>

                           <div class="ads-create-main-data-city-options" <?php if( $data["city_options"] ){ echo 'style="display: block;"'; } ?> >
                               
                               <?php echo $data["city_options"]; ?>

                           </div> 

                           <div class="ads-create-main-data-box-item" >
                                
                                <p class="ads-create-subtitle" ><?php echo $ULang->t("Адрес"); ?></p>

                                <div class="boxSearchAddress" >
                                   <input type="text" class="ads-create-input searchMapAddress" id="searchMapAddress" value="<?php echo $data["ads_address"]; ?>" autocomplete="nope" name="address" placeholder="<?php echo $ULang->t("Начните вводить адрес, а потом выберите его из списка"); ?>" >
                                   <div class="custom-results SearchAddressResults" ></div>
                                </div>

                                <div class="msg-error" data-name="address" ></div>

                                <div class="mapAddress" id="mapAddress" ></div>
                                <input type="hidden" name="map_lat" value="<?php echo $data["ads_latitude"]; ?>" >
                                <input type="hidden" name="map_lon" value="<?php echo $data["ads_longitude"]; ?>" >

                           </div>
                           
                           
                           <button class="ads-create-publish btn-color-blue" data-action="ad-update" > <span class="action-load-span-start" > <i class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></i> </span> <?php echo $ULang->t("Сохранить и опубликовать"); ?></button>
                           
                      </div>


                      <input type="hidden" name="currency" value="<?php echo $data["ads_currency"]; ?>" >
                      <input type="hidden" name="c_id" value="<?php echo $data["ads_id_cat"]; ?>"  >
                      <input type="hidden" name="id_ad" value="<?php echo $data["ads_id"]; ?>"  >
                      <input type="hidden" name="var_price" value="<?php if( $data["ads_auction"] ){ echo 'auction'; }else{ echo 'fix'; } ?>"  >

                   </form>
                                  
              </div>

              <div class="col-lg-3" ></div>

           </div>

      </div>


      <div class="mt45" ></div>

      <?php include $config["basePath"] . "/templates/footer.tpl"; ?>

      <script type="text/javascript">
      Dropzone.autoDiscover = false;
      $(document).ready(function() {

        $( ".sortable" ).sortable({ handle: '.sortable-handle', zIndex: 1000 });

        $(document).on('click','.dz-dropzone-delete', function (e) { 
            
            $(this).parent().find("input").remove();
            $(this).parent().remove().hide();

        });

        var myDrop= new Dropzone("#dropzone", {
          paramName: "file",
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },           
          acceptedFiles: "image/jpeg,image/png",
          maxFiles: <?php echo $settings["count_images_add_ad"]; ?>,
          url: $("body").data("prefix") + 'systems/ajax/dropzone.php',
          maxFilesize: <?php echo $settings["size_images_add_ad"]; ?>,
          timeout: 300000,
          dictDefaultMessage: '<?php echo $ULang->t('Выберите или перетащите изображения'); ?>',
          init: function() {
              this.on("addedfile", function(file) {
                  var removeButton = Dropzone.createElement("<div class='dz-dropzone-delete' ><i class='las la-trash-alt'></i></div>");
                  var sortableButton = Dropzone.createElement("<div class='dz-dropzone-sortable sortable-handle' ><i class='las la-arrows-alt'></i></div>");
                  var _this = this;
                  removeButton.addEventListener("click", function(e) {
                      e.preventDefault();
                      e.stopPropagation();
                      _this.removeFile(file);
                  });
                  file.previewElement.appendChild(removeButton);
                  file.previewElement.appendChild(sortableButton);
              });
              this.on('completemultiple', function(file, json) {
              });        
          },
          success: function(file, response){

            var response = jQuery.parseJSON( response );
            file.previewElement.appendChild( Dropzone.createElement(response["input"]) );

            $( file.previewTemplate ).find("img").attr( "src", response["link"] );
            $( file.previewTemplate ).find("img").addClass( "image-autofocus" );
                   
          }
        });
      });
      </script>

      <?php echo $Geo->vendorMap(); ?>

      <?php echo $Ads->mapAdAddress($data["ads_latitude"],$data["ads_longitude"]); ?>

   </body>
</html>
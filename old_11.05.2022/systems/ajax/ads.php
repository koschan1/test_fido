<?php

session_start();
define('unisitecms', true);

$config = require "./../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php" );
$static_msg = require $config["basePath"] . "/static/msg.php";

verify_csrf_token();

$Ads = new Ads();
$Profile = new Profile();
$Main = new Main();
$Admin = new Admin();
$CategoryBoard = new CategoryBoard();
$Geo = new Geo();
$Filters = new Filters();
$Banners = new Banners();
$Elastic = new Elastic();
$ULang = new ULang();
$Watermark = new Watermark();
$Subscription = new Subscription();
$Shop = new Shop();
$Cache = new Cache();
$Cart = new Cart();

if(isAjax() == true){

  if($_POST["action"] == "create_load_category"){

       $id = (int)$_POST["id"];

       $getCategories = $CategoryBoard->getCategories("where category_board_visible=1");

       $filters = $Filters->load_filters_ad( $id );

       if ( $getCategories["category_board_id_parent"][$id] ) {
            
            if( $_POST["var"] == "create" ){

                $lenght = floor(count($getCategories["category_board_id_parent"][$id]) / 2);

                $chunk = array_chunk($getCategories["category_board_id_parent"][$id], $lenght ? $lenght : 1, true);

                foreach ($chunk as $key => $nested) {
                   
                    $parent_list .= '<div class="col-lg-6 col-md-6 col-sm-6 col-12" >';

                    foreach ($nested as $key => $parent_value) {

                        $parent_list .=  '<span data-id="'.$parent_value["category_board_id"].'" >'.$ULang->t($parent_value["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ).'</span>';

                    }

                    $parent_list .= '</div>';

                }

                if( $getCategories["category_board_id"][$id]["category_board_id_parent"] ){
                  $prev = '<span class="ads-create-subcategory-prev" data-id="'.$getCategories["category_board_id"][$id]["category_board_id_parent"].'" ><i class="las la-arrow-left"></i></span>';
                }

                $data = '
                  <p class="ads-create-subtitle mt30" > '.$prev.' '.$ULang->t("Выберите подкатегорию").'</p>

                  <div class="ads-create-subcategory-list" >
                     <div class="row" >' . $parent_list . '</div>
                  </div>
                ';

            }elseif( $_POST["var"] == "update" ){

                foreach ($getCategories["category_board_id_parent"][$id] as $key => $parent_value) {
                   
                    $parent_list .=  '<span data-id="'.$parent_value["category_board_id"].'" data-name="'.$CategoryBoard->breadcrumb($getCategories,$parent_value["category_board_id"],'{NAME}',' &rsaquo; ').'" >'.$ULang->t($parent_value["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ).'</span>';

                }

                if( $id ){
                    $prev = '<span data-id="'.$getCategories["category_board_id"][$id]["category_board_id_parent"].'" ><i class="las la-arrow-left"></i> '.$ULang->t("Назад").'</span>';
                }

                $data = $prev . $parent_list;

            }
            
            echo json_encode( array("subcategory" => true, "data" => $data ) );

       }else{

          $data = [];

          if( !$getCategories["category_board_id"][$id]["category_board_auto_title"] ){

             $data["title"] = '
                <div class="ads-create-main-data-box-item" style="margin-top: 0px; margin-bottom: 25px;" >
                    <p class="ads-create-subtitle" >'.$ULang->t("Название").'</p>
                    <input type="text" name="title" class="ads-create-input" >
                    <p class="create-input-length" >'.$ULang->t("Символов").' <span>0</span> '.$ULang->t("из").' '.$settings["ad_create_length_title"].'</p>
                    <div class="msg-error" data-name="title" ></div>
                </div>
             ';

          }

          if( $getCategories["category_board_id"][$id]["category_board_online_view"] ){

             $data["online_view"] = '
                 <div class="ads-create-main-data-box-item" >
                    <p class="ads-create-subtitle" >'.$ULang->t("Возможен онлайн-показ").'</p>
                    <div class="create-info" ><i class="las la-question-circle"></i> '.$ULang->t("Выберите, если готовы показать товар/объект с помощью видео-звонка — например, через WhatsApp, Viber, Skype или другой сервис").'</div>
                    <div class="custom-control custom-checkbox mt15">
                        <input type="checkbox" class="custom-control-input" name="online_view" id="online_view" value="1">
                        <label class="custom-control-label" for="online_view">'.$ULang->t("Готовы показать онлайн").'</label>
                    </div>
                 </div>
             ';

          }


          if( $Cart->modeAvailableCart($getCategories,$id,$_SESSION["profile"]["id"]) ){

             $data["available"] = '

                  <div class="ads-create-main-data-box-item" >

                      <p class="ads-create-subtitle" >'.$ULang->t("В наличии").'</p>

                      <div class="row" >
                        
                        <div class="col-lg-6" >
                            <input type="text" name="available" placeholder="" class="ads-create-input" maxlength="5" disabled="" >
                            <div class="msg-error" data-name="available" ></div>
                        </div>
                        
                        <div class="col-lg-6" >

                            <div class="custom-control custom-checkbox mt10">
                                <input type="checkbox" class="custom-control-input" name="available_unlimitedly" id="available_unlimitedly" value="1" checked="" >
                                <label class="custom-control-label" for="available_unlimitedly">'.$ULang->t("Неограниченно").'</label>
                            </div>

                        </div> 

                      </div>

                  </div>

             ';

          }

          if( $filters ){

             $getCategory = $Filters->getCategory( ["id_cat" => $id] );
             
             if( $getCategory ){

                 $getFilters = getAll( "select * from uni_ads_filters where ads_filters_id IN(".implode(",", $getCategory).")" );

                 if(count($getFilters)){

                    foreach ( $getFilters as $key => $value) {
                        $list_filters[] = $ULang->t( $value["ads_filters_name"] , [ "table" => "uni_ads_filters", "field" => "ads_filters_name" ] );
                    }

                    $data["filters"] = '
                       <div class="ads-create-main-data-box-item" >
                          <p class="ads-create-subtitle" >'.$ULang->t("Характеристики").'</p>
                          <div class="ads-create-main-data-filters-spoiler" >
                            <div class="ads-create-list-filters-show create-info" ><i class="las la-plus-circle"></i> '.implode(", ", $list_filters).'</div>
                          </div>
                          <div class="ads-create-main-data-filters-list" >
                          <div class="create-info" ><i class="las la-question-circle"></i> '.$ULang->t("Укажите как можно больше параметров - это повысит интерес к объявлению.").'</div>
                          <div class="mb25" ></div>
                          '.$filters.'
                          </div>
                       </div> 
                    ';

                 }

             }

          }

          if( $getCategories["category_board_id"][$id]["category_board_display_price"] ){

              $field_price_name = $Ads->variantPrice( $getCategories["category_board_id"][$id]["category_board_variant_price"] );

              $getShop = $Shop->getUserShop( $_SESSION["profile"]["id"] );

              if($getShop && $getCategories["category_board_id"][$id]["category_board_variant_price"] != 1 && !$getCategories["category_board_id"][$id]["category_board_auction"]){

                 $data["price"] .= '
                    <div class="ads-create-main-data-box-item" >
                        <p class="ads-create-subtitle" >'.$ULang->t("Акция").'</p>
                        <div class="create-info" ><i class="las la-question-circle"></i> '.$ULang->t("Вы можете включить акцию для своего объявления. В каталоге объявлений будет показываться старая и новая цена. Акция работает только при активном магизине.").'</div>
                        <div class="custom-control custom-checkbox mt15">
                            <input type="checkbox" class="custom-control-input" name="stock" id="stock" value="1">
                            <label class="custom-control-label" for="stock">'.$ULang->t("Включить акцию").'</label>
                        </div>
                    </div>
                 ';

              }

              
              $data["price"] .= '
                  <div class="ads-create-main-data-box-item" >
                  <p class="ads-create-subtitle" >'.$field_price_name.'</p>
              ';

              if( $getCategories["category_board_id"][$id]["category_board_auction"] ){
                  
                  $data["price"] .= '
                       <div class="row" >
                           <div class="col-lg-6" >
                              <div data-var="fix" class="ads-create-main-data-price-variant" >
                                 <div >
                                   <i class="las la-money-bill-wave"></i>
                                   <span class="ads-create-main-data-price-variant-name" >'.$ULang->t("Фиксированная").'</span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6" >
                              <div data-var="auction" class="ads-create-main-data-price-variant" >
                                 <div >
                                   <i class="las la-gavel"></i>
                                   <span class="ads-create-main-data-price-variant-name" >'.$ULang->t("Аукцион").'</span>
                                 </div>                          
                              </div>
                           </div>                     
                       </div>
                       <div class="mb25" ></div>
                       <div class="ads-create-main-data-stock-container" ></div>
                       <div class="ads-create-main-data-price-container" ></div>
                  ';

              }else{

                  if(!$settings["ad_create_currency"]){
                    
                    $dropdown_currency = '
                          <div class="input-dropdown-box">
                            <div class="uni-dropdown-align" >
                               <span class="input-dropdown-name-display"> '.$settings["currency_main"]["sign"].' </span>
                            </div>
                          </div>
                    ';

                  }else{

                    $getCurrency = getAll("select * from uni_currency order by id_position asc");
                    if ($getCurrency) {
                      foreach ($getCurrency as $key => $value) {
                         $list_currency .= '<span data-value="'.$value["code"].'" data-name="'.$value["sign"].'" data-input="currency" >'.$value["name"].' ('.$value["sign"].')</span>';
                      }
                    }

                    $dropdown_currency = '
                        <div class="input-dropdown-box">
                          
                            <span class="uni-dropdown-bg">
                             <div class="uni-dropdown uni-dropdown-align" >
                                <span class="uni-dropdown-name" > <span>'.$settings["currency_main"]["sign"].'</span> <i class="las la-angle-down"></i> </span>
                                <div class="uni-dropdown-content" >
                                   '.$list_currency.'
                                </div>
                             </div>
                            </span>

                        </div>
                    ';

                  }

                   $data["price"] .= '
                      <div class="ads-create-main-data-price-container" >
                      <div class="row" >
                        <div class="col-lg-6" >
                        <div class="input-dropdown" >
                           <input type="text" name="price" placeholder="'.$field_price_name.'" class="ads-create-input inputNumber" maxlength="15" > 
                           '.$dropdown_currency.'
                        </div>
                        <div class="msg-error" data-name="price" ></div>
                        </div>
                        ';
                        
                        if( $getCategories["category_board_id"][$id]["category_board_variant_price"] == 0 ){

                            $data["price"] .= '
                            <div class="col-lg-6" >

                                <div class="custom-control custom-checkbox mt10">
                                    <input type="checkbox" class="custom-control-input" name="price_free" id="price_free" value="1">
                                    <label class="custom-control-label" for="price_free">'.$ULang->t("Отдам даром").'</label>
                                </div>

                            </div> 
                            ';

                        }

                   $data["price"] .= '
                      </div>
                      </div>             
                   ';
                        
              }
               
             $data["price"] .= '
                </div>             
             ';               

          }

          echo json_encode( array( "subcategory" => false, "data" => $data ) );

       }

  }

  if($_POST["action"] == "create_load_variant_price"){

      $id = (int)$_POST["id"];
      $variant = clear($_POST["variant"]);
      $data["stock"] = '';

      $getCategories = $CategoryBoard->getCategories("where category_board_visible=1");

      if(!$settings["ad_create_currency"]){
        
        $dropdown_currency = '
              <div class="input-dropdown-box">
                <div class="uni-dropdown-align" >
                   <span class="input-dropdown-name-display"> '.$settings["currency_main"]["sign"].' </span>
                </div>
              </div>
        ';

      }else{

        $getCurrency = getAll("select * from uni_currency order by id_position asc");
        if ($getCurrency) {
          foreach ($getCurrency as $key => $value) {
             $list_currency .= '<span data-value="'.$value["code"].'" data-name="'.$value["sign"].'" data-input="currency" >'.$value["name"].' ('.$value["sign"].')</span>';
          }
        }

        $dropdown_currency = '
            <div class="input-dropdown-box">
              
                <span class="uni-dropdown-bg">
                 <div class="uni-dropdown uni-dropdown-align" >
                    <span class="uni-dropdown-name" > <span>'.$settings["currency_main"]["sign"].'</span> <i class="las la-angle-down"></i> </span>
                    <div class="uni-dropdown-content" >
                       '.$list_currency.'
                    </div>
                 </div>
                </span>

            </div>
        ';

      }

      if( $variant == "fix" ){

           $field_price_name = $Ads->variantPrice( $getCategories["category_board_id"][$id]["category_board_variant_price"] );

           $getShop = $Shop->getUserShop( $_SESSION["profile"]["id"] );

           if($getShop){

             $data["stock"] = '
                <div class="ads-create-main-data-box-item" style="margin-bottom: 25px;" >
                    <p class="ads-create-subtitle" >Акция</p>
                    <div class="create-info" ><i class="las la-question-circle"></i> '.$ULang->t("Вы можете включить акцию для своего объявления. В каталоге объявлений будет показываться старая и новая цена. Акция работает только при активном магизине.").'</div>
                    <div class="custom-control custom-checkbox mt15">
                        <input type="checkbox" class="custom-control-input" name="stock" id="stock" value="1">
                        <label class="custom-control-label" for="stock">'.$ULang->t("Включить акцию").'</label>
                    </div>
                </div>
             ';

           }

           $data["price"] .= '
              <div class="ads-create-main-data-box-item" style="margin-top: 0px;" >
              <div class="row" >

                <div class="col-lg-6" >

                    <div class="input-dropdown" >
                       <input type="text" name="price" placeholder="'.$field_price_name.'" class="ads-create-input inputNumber" maxlength="15" > 
                       '.$dropdown_currency.'
                    </div>
                    <div class="msg-error" data-name="price" ></div>

                </div>
           ';
                
            if( $getCategories["category_board_id"][$id]["category_board_variant_price"] == 0 ){

                $data["price"] .= '
                <div class="col-lg-6" >

                    <div class="custom-control custom-checkbox mt10">
                        <input type="checkbox" class="custom-control-input" name="price_free" id="price_free" value="1">
                        <label class="custom-control-label" for="price_free">'.$ULang->t("Отдам даром").'</label>
                    </div>

                </div> 
                ';

            }

           $data["price"] .= '
              </div> 
              </div>          
           ';

      }elseif( $variant == "auction" ){

           $data["price"] .= '
                
                <div class="ads-create-main-data-box-item" >

                    <p class="ads-create-subtitle" >'.$ULang->t("С какой цены начать торг?").'</p>

                    <div class="row" >
                      <div class="col-lg-6" >
                          <div class="input-dropdown" >
                             <input type="text" name="price" class="ads-create-input inputNumber" maxlength="15" > 
                             '.$dropdown_currency.'
                          </div>
                          <div class="msg-error" data-name="price" ></div>
                      </div>
                    </div>

                </div>

                <div class="ads-create-main-data-box-item" >

                    <p class="ads-create-subtitle" >'.$ULang->t("Цена продажи").'</p>
                    <div class="create-info" ><i class="las la-question-circle"></i> '.$ULang->t("Укажите цену, за которую вы готовы сразу продать товар или оставьте это поле пустым если у аукциона нет ограничений по цене.").'</div>

                    <div class="mt15" ></div>

                    <div class="row" >
                      <div class="col-lg-6" >
                          <div class="input-dropdown" >
                             <input type="text" name="auction_price_sell" class="ads-create-input inputNumber" maxlength="15" > 
                             <div class="input-dropdown-box">
                                <div class="uni-dropdown-align" >
                                   <span class="input-dropdown-name-display static-currency-sign"> '.$settings["currency_main"]["sign"].' </span>
                                </div>
                             </div>
                          </div>
                          <div class="msg-error" data-name="auction_price_sell" ></div>
                      </div>
                    </div>

                </div>

                <div class="ads-create-main-data-box-item" >

                    <p class="ads-create-subtitle" >'.$ULang->t("Длительность торгов").'</p>
                    <div class="create-info" ><i class="las la-question-circle"></i> '.$ULang->t("Укажите срок действия аукциона от 1-го до 30-ти дней.").'</div>

                    <div class="mt15" ></div>

                    <div class="row" >
                      <div class="col-lg-3" >
                          <input type="text" name="auction_duration_day" class="ads-create-input" maxlength="2" value="1" > 
                          <div class="msg-error" data-name="auction_duration_day" ></div>
                      </div>
                    </div>

                </div>

            ';
                           

      }elseif( $variant == "stock" ){

           $data["price"] .= '
           <div class="ads-create-main-data-box-item" style="margin-top: 0px;" >
              <div class="row" >
                <div class="col-lg-6" >

                    <div class="input-dropdown" >
                       <input type="text" name="price" placeholder="'.$ULang->t("Старая цена").'" class="ads-create-input inputNumber" maxlength="15" > 
                       '.$dropdown_currency.'
                    </div>
                    <div class="msg-error" data-name="price" ></div>

                </div>
                <div class="col-lg-6" >

                    <div class="input-dropdown" >
                       <input type="text" name="stock_price" placeholder="'.$ULang->t("Новая цена").'" class="ads-create-input inputNumber" maxlength="15" > 
                       <div class="input-dropdown-box">
                          <div class="uni-dropdown-align" >
                             <span class="input-dropdown-name-display static-currency-sign"> '.$settings["currency_main"]["sign"].' </span>
                          </div>
                       </div>
                    </div>

                </div>                
              </div>
           </div>
           ';
                

      }

      echo json_encode( $data );


  }


  if($_POST["action"] == "ad-update"){
        
        $id_ad = (int)$_POST["id_ad"];

        if(!$_SESSION['cp_auth'][ $config["private_hash"] ] && !$_SESSION['cp_control_board']){

          if($_SESSION["profile"]["id"]){ 
             
             $getAd = $Ads->get("ads_id=? and ads_id_user=?", [$id_ad,intval($_SESSION["profile"]["id"])]);

          }else{

             exit;

          }

        }else{

          $getAd = $Ads->get("ads_id=?", [$id_ad]);

        }
        
        if($_POST["metro"]){
          if(!is_array($_POST["metro"])){
             $_POST["metro"] = [];
          }
        }else{
          $_POST["metro"] = [];
        }

        if($_POST["area"]){
          if(!is_array($_POST["area"])){
             $_POST["area"] = [];
          }else{
             $_POST["area"] = array_slice($_POST["area"], 0,10);
          }
        }else{
          $_POST["area"] = [];
        }
        
        $getCategories = (new CategoryBoard())->getCategories("where category_board_visible=1");

        $error = $Ads->validationAdForm($_POST, ["categories"=>$getCategories] );

        $period = $Ads->adPeriodPub($_POST["period"]);

        if($settings["ad_create_currency"] && $_POST["currency"]){
            
            if($settings["currency_data"][ $_POST["currency"] ]){
               $currency = $_POST["currency"];
            }else{
               $currency = $settings["currency_main"]["code"];
            }

        }else{

            $currency = $settings["currency_main"]["code"];
            
        }

        if( $getCategories["category_board_id"][$_POST["c_id"]]["category_board_auto_title"] ){
            $title = $Ads->autoTitle($_POST["filter"],$getCategories["category_board_id"][$_POST["c_id"]]);
        }else{
            $title = custom_substr(clear($_POST["title"]), $settings["ad_create_length_title"]);
        }

        $text = custom_substr(clear($_POST["text"]), $settings["ad_create_length_text"]);

        $ads_status = $Ads->autoModeration($id_ad, [ "title" => $title, "text" => $text, "video" => videoLink($_POST["video"]) ] );

        $price_sell = 0; $duration_day = 0; $auction = 0; $stock_price = 0; $price = round(preg_replace('/\s/', '', $_POST["price"]),2);

        if( $_POST["var_price"] == "auction" ){

           $price = round(preg_replace('/\s/', '', $_POST["price"]),2);
           $price_sell = round(preg_replace('/\s/', '', $_POST["auction_price_sell"]),2);
           $duration_day = intval($_POST["auction_duration_day"]);

           if(!$price){ $error["price"] = $ULang->t("Начальная ставка не может начинаться с нуля"); }else{
              if($price_sell){
                if($price_sell < $price){
                    $error["auction_price_sell"] = $ULang->t("Цена продажи не может быть меньше начальной ставки");
                }
              }
           }
           
           if( $duration_day < 1 || $duration_day > 30 ){ $error["auction_duration_day"] = $ULang->t("Укажите длительность торгов от 1-го до 30-ти дней"); }
           
           $auction = 1;
           $auction_duration = date("Y-m-d H:i:s", time() + ($duration_day * 86400) );

        }else{

            if( $_POST["stock"] ){

               $getShop = $Shop->getUserShop( $_SESSION["profile"]["id"] );

               if( $getShop ){

                   $price = round(preg_replace('/\s/', '', $_POST["stock_price"]),2); 
                   $stock_price = round(preg_replace('/\s/', '', $_POST["price"]),2);

                   if( $price >= $stock_price ){
                       $error["price"] = $ULang->t("Новая цена должна быть меньше старой цены");
                   }

               }

            }
           
        }

        if(count($_POST["gallery"])>0 && count($error) == 0){

            $path = $config["basePath"] . "/" . $config["media"]["temp_images"];

            foreach(array_slice($_POST["gallery"], 0, $settings["count_images_add_ad"], true) AS $key => $data){
                                 
              if(file_exists($path . "/big_" . $data)){

               $gallery[] = $data;
               
               @copy($path . "/big_" . $data, $config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $data);
               @copy($path . "/small_" . $data, $config["basePath"] . "/" . $config["media"]["small_image_ads"] . "/" . $data);

              }else{

                $gallery[] = $data;

              } 
                   
            }
         
        }
        
        if( !$_POST["map_lat"] && !$_POST["map_lon"] ){
             $_POST["address"] = "";
        }

        if( intval($_POST["available_unlimitedly"]) ){
            $_POST["available"] = 0;
        }

        if( !$Cart->modeAvailableCart($getCategories,$_POST["c_id"],$_SESSION["profile"]["id"]) ){
            $_POST["available"] = 0;
            $_POST["available_unlimitedly"] = 1;
        }

        if($getAd){

          if(count($error) == 0){

            if($settings["city_id"]){
              $getCity = $Geo->getCity($settings["city_id"]);
            }else{
              $getCity = $Geo->getCity($_POST["city_id"]);
            }

            update("UPDATE uni_ads SET ads_title=?,ads_alias=?,ads_text=?,ads_id_cat=?,ads_price=?,ads_city_id=?,ads_region_id=?,ads_country_id=?,ads_address=?,ads_latitude=?,ads_longitude=?,ads_status=?,ads_images=?,ads_metro_ids=?,ads_currency=?,ads_auction=?,ads_auction_duration=?,ads_auction_price_sell=?,ads_auction_day=?,ads_area_ids=?,ads_video=?,ads_online_view=?,ads_price_old=?,ads_filter_tags=?,ads_update=?,ads_period_day=?,ads_period_publication=?,ads_price_free=?,ads_available=?,ads_available_unlimitedly=? WHERE ads_id=?", [$title,translite($title),$text,intval($_POST["c_id"]),$price,$getCity["city_id"],$getCity["region_id"],$getCity["country_id"],clear($_POST["address"]),clear($_POST["map_lat"]),clear($_POST["map_lon"]),$ads_status,json_encode($gallery),implode(",", $_POST["metro"]),$currency,$auction,$auction_duration,$price_sell,$duration_day,implode(",", $_POST["area"]),videoLink($_POST["video"]),intval($_POST["online_view"]),$stock_price,$Filters->buildTags($_POST["filter"]),date("Y-m-d H:i:s"),$period["days"],$period["date"],intval($_POST["price_free"]),abs($_POST["available"]),intval($_POST["available_unlimitedly"]),$id_ad], true);

            $Ads->addMetroVariants($_POST["metro"],$id_ad);
            $Ads->addAreaVariants($_POST["area"],$id_ad);

            $Filters->addVariants($_POST["filter"],$id_ad);

            $Ads->changeStatus( $id_ad, 0, "update" );

            $getAd = $Ads->get("ads_id=".$id_ad);

            echo json_encode( array( "status" => true, "action" => "update" , "id" => $id_ad, "location" => $Ads->alias($getAd) . "?modal=update_ad" ) );

          }else{
            echo json_encode(array("status" => false, "answer" => $error));
          }

        }


  }

  if($_POST["action"] == "ad-create"){

        if(!$_SESSION["profile"]["id"]){
            echo json_encode( [ "status" => false, "auth" => true ] );
            exit;
        }

        if($_POST["metro"]){
          if(!is_array($_POST["metro"])){
             $_POST["metro"] = [];
          }
        }else{
          $_POST["metro"] = [];
        }

        if($_POST["area"]){
          if(!is_array($_POST["area"])){
             $_POST["area"] = [];
          }else{
             $_POST["area"] = array_slice($_POST["area"], 0,10);
          }
        }else{
          $_POST["area"] = [];
        }

        $getCategories = (new CategoryBoard())->getCategories("where category_board_visible=1");

        $error = $Ads->validationAdForm($_POST, ["categories"=>$getCategories] );

        $period = $Ads->adPeriodPub($_POST["period"]);

        if($settings["ad_create_currency"] && $_POST["currency"]){
            
            if($settings["currency_data"][ $_POST["currency"] ]){
               $currency = $_POST["currency"];
            }else{
               $currency = $settings["currency_main"]["code"];
            }

        }else{

            $currency = $settings["currency_main"]["code"];
            
        }

        if( $getCategories["category_board_id"][$_POST["c_id"]]["category_board_auto_title"] ){
            $title = $Ads->autoTitle($_POST["filter"],$getCategories["category_board_id"][$_POST["c_id"]]);
        }else{
            $title = custom_substr(clear($_POST["title"]), $settings["ad_create_length_title"]);
        }

        $text = custom_substr(clear($_POST["text"]), $settings["ad_create_length_text"]);

        $price_sell = 0; $duration_day = 0; $auction = 0; $stock_price = 0; $price = round(preg_replace('/\s/', '', $_POST["price"]),2);

        if( $_POST["var_price"] == "auction" ){

           $price = round(preg_replace('/\s/', '', $_POST["price"]),2);
           $price_sell = round(preg_replace('/\s/', '', $_POST["auction_price_sell"]),2);
           $duration_day = intval($_POST["auction_duration_day"]);

           if(!$price){ $error["price"] = $ULang->t("Начальная ставка не может начинаться с нуля"); }else{
              if($price_sell){
                if($price_sell < $price){
                    $error["auction_price_sell"] = $ULang->t("Цена продажи не может быть меньше начальной ставки");
                }
              }
           }
           
           if( $duration_day < 1 || $duration_day > 30 ){ $error["auction_duration_day"] = $ULang->t("Укажите длительность торгов от 1-го до 30-ти дней"); }
           
           $auction = 1;
           $auction_duration = date("Y-m-d H:i:s", time() + ($duration_day * 86400) );

        }else{

            if( $_POST["stock"] ){

               $getShop = $Shop->getUserShop( $_SESSION["profile"]["id"] );

               if( $getShop ){

                   $price = round(preg_replace('/\s/', '', $_POST["stock_price"]),2); 
                   $stock_price = round(preg_replace('/\s/', '', $_POST["price"]),2);

                   if( $price >= $stock_price ){
                       $error["price"] = $ULang->t("Новая цена должна быть меньше старой цены");
                   }

               }

            }
           
        }
        
        if(count($_POST["gallery"])>0 && count($error) == 0){

            $path = $config["basePath"] . "/" . $config["media"]["temp_images"];

            foreach(array_slice($_POST["gallery"], 0, $settings["count_images_add_ad"], true) AS $key => $data){
                                 
              if(file_exists($path . "/big_" . $data)){

               $gallery[] = $data;

               @copy($path . "/big_" . $data, $config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $data);
               @copy($path . "/small_" . $data, $config["basePath"] . "/" . $config["media"]["small_image_ads"] . "/" . $data);

              } 
                   
            }
         
        }

        if( !$_POST["map_lat"] && !$_POST["map_lon"] ){
             $_POST["address"] = "";
        }
      
        if( intval($_POST["available_unlimitedly"]) ){
            $_POST["available"] = 0;
        }

        if( !$Cart->modeAvailableCart($getCategories,$_POST["c_id"],$_SESSION["profile"]["id"]) ){
            $_POST["available"] = 0;
            $_POST["available_unlimitedly"] = 1;
        }
      
        if(count($error) == 0){

          if( $_SESSION["create-verify-phone"]["phone"] ){
              update( "update uni_clients set clients_phone=? where clients_id=?", [ $_SESSION["create-verify-phone"]["phone"], $_SESSION["profile"]["id"] ] );
          }

          $status = $Ads->statusAd( [ "id_cat"=>$_POST["c_id"], "categories"=>$getCategories, "text" => $text ,"title" => $title ] );

          if($settings["city_id"]){
            $getCity = $Geo->getCity($settings["city_id"]);
          }else{
            $getCity = $Geo->getCity($_POST["city_id"]);
          }

          $insert_id = insert("INSERT INTO uni_ads(ads_title,ads_alias,ads_text,ads_id_cat,ads_id_user,ads_price,ads_city_id,ads_region_id,ads_country_id,ads_address,ads_latitude,ads_longitude,ads_period_publication,ads_status,ads_note,ads_images,ads_metro_ids,ads_currency,ads_period_day,ads_datetime_add,ads_auction,ads_auction_duration,ads_auction_price_sell,ads_auction_day,ads_area_ids,ads_video,ads_online_view,ads_price_old,ads_filter_tags,ads_price_free,ads_available,ads_available_unlimitedly)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array( $title,translite($title),$text,intval($_POST["c_id"]),intval($_SESSION["profile"]["id"]),$price,$getCity["city_id"],$getCity["region_id"],$getCity["country_id"],clear($_POST["address"]),clear($_POST["map_lat"]),clear($_POST["map_lon"]),$period["date"],$status["status"],$status["message"],json_encode($gallery),implode(",", $_POST["metro"]),$currency,$period["days"], date("Y-m-d H:i:s"),$auction,$auction_duration,$price_sell,$duration_day,implode(",",$_POST["area"]),videoLink($_POST["video"]),intval($_POST["online_view"]), $stock_price, $Filters->buildTags($_POST["filter"]),intval($_POST["price_free"]),abs($_POST["available"]),intval($_POST["available_unlimitedly"]) ));

          if( $insert_id ){

              $Ads->addMetroVariants($_POST["metro"],$insert_id);
              $Ads->addAreaVariants($_POST["area"],$insert_id);

              $Filters->addVariants($_POST["filter"],$insert_id);

              $getAd = $Ads->get("ads_id=".$insert_id);
              
              $Elastic->index( [ "index" => "uni_ads", "type" => "ad", "id" => $insert_id, "body" => $Elastic->prepareFields( $getAd ) ] );
              
              if( $status != 7 ){
                notifications("ads", [ "title" => $_POST["title"], "link" => $Ads->alias($getAd), "image" => $gallery[0], "user_name" => $getAd["clients_name"], "id_hash_user" => $getAd["clients_id_hash"] ] );
                $Admin->addNotification("ads");
              }

              if($status == 1 && !$getAd['clients_first_ad_publication'] && $settings["bonus_program"]["ad_publication"]["status"] && $settings["bonus_program"]["ad_publication"]["price"]){
                   $Profile->actionBalance(array("id_user"=>intval($_SESSION["profile"]["id"]),"summa"=>$settings["bonus_program"]["ad_publication"]["price"],"title"=>$settings["bonus_program"]["ad_publication"]["name"],"id_order"=>$config["key_rand"],"email" => $getAd["clients_email"],"name" => $getAd["clients_name"], "note" => $settings["bonus_program"]["ad_publication"]["name"]),"+");   
                   update('update uni_clients set clients_first_ad_publication=? where clients_id=?', [1, intval($_SESSION["profile"]["id"])]);            
              }

              if($status == 6){
                 $location = _link("ad/publish/".$insert_id);
              }else{
                 $location = $Ads->alias($getAd) . "?modal=new_ad";
              }

          }

          echo json_encode( [ "status" => true, "action" => "add" , "id" => $insert_id, "location" => $location ] );

        }else{
          echo json_encode( [ "status" => false, "answer" => $error ] );
        }


  }
  
  if($_POST["action"] == "favorit-ad"){
  
    if($_SESSION['profile']['id']){ 

       $id = (int)$_POST["id"];

       $get = getOne("select * from uni_favorites where favorites_id_ads=? AND favorites_id_user=?", [$id,$_SESSION['profile']['id']]);

       if(count($get) > 0){
          unset($_SESSION['profile']["favorit-ad"][$id]);
          update("DELETE FROM uni_favorites WHERE favorites_id={$get["favorites_id"]}");
       }else{
          $_SESSION['profile']["favorit-ad"][$id] = $id;
          insert("INSERT INTO uni_favorites(favorites_id_ads,favorites_id_user)VALUES(?,?)", [$id,$_SESSION['profile']['id']]);
       }
       echo true;
       
    }else{
       echo false;
    }

  }

  if($_POST["action"] == "complaint"){

    if( $_SESSION["profile"]["id"] ){
    
      $id_ad = (int)$_POST["id_ad"];
      $text = clear($_POST["text"]);

      $error = array();

      $getAd = findOne("uni_ads", "ads_id=?", array($id_ad));

      if(!$getAd){
         $error[] = $ULang->t("Объявление не найдено!");
      }

      if(!$text){
         $error[] = $ULang->t("Пожалуйста, опишите причину жалобы"); 
      }     

      if(count($error)==0){

        $getComplain = findOne("uni_ads_complain", "ads_complain_id_ad=? and ads_complain_id_user=? and ads_complain_status=?", array($id_ad,intval($_SESSION["profile"]["id"]),0));

          if(!$getComplain){

            insert("INSERT INTO uni_ads_complain(ads_complain_id_ad,ads_complain_id_user,ads_complain_text,ads_complain_date)VALUES(?,?,?,?)", array($id_ad,intval($_SESSION["profile"]["id"]),$text,date("Y-m-d H:i:s"))); 

          }   

          echo json_encode(array("status"=>true,"answer"=>$ULang->t("Жалоба принята"),"auth" => true));

          $Admin->addNotification("complaint");
          
      }else{

          echo json_encode(array("status"=>false,"answer"=>implode("\n",$error),"auth" => true));

      }

    }else{
       echo json_encode(array("status"=>false,"answer"=>"","auth" => false));
    }

     
  }


  if($_POST["action"] == "service_activation"){
      
      $id_ad = (int)$_POST["id_ad"];
      $id_s = (int)$_POST["id_s"];
      $pay_v = (int)$_POST["pay_v"];

      $error = [];

      $getService = findOne("uni_services_ads", "services_ads_uid=?", array($id_s)); 
      $getAd = $Ads->get("ads_id=? and ads_id_user=?", [$id_ad,intval($_SESSION['profile']['id'])] );

      if(!$getService){ $error[] = $ULang->t("Пожалуйста, выберите услугу");}
      if(!$getAd){ $error[] = $ULang->t("Товар не найден");}

      if($getService["services_ads_variant"] == 1){
        $services_order_count_day = $getService["services_ads_count_day"];
        $price = $getService["services_ads_new_price"] ? $getService["services_ads_new_price"] : $getService["services_ads_price"];
      }else{
        $services_order_count_day = abs($_POST["service"][$id_s]) ? abs($_POST["service"][$id_s]) : 1;
        $price = $getService["services_ads_new_price"] ? $getService["services_ads_new_price"] * $services_order_count_day : $getService["services_ads_price"] * $services_order_count_day;
      }

      $services_order_time_validity = date( "Y-m-d H:i:s", strtotime("+".$services_order_count_day." days", time()) );
      
      $title = $getService["services_ads_name"] . " " . $ULang->t("на срок") . " " . $services_order_count_day . " " . ending($services_order_count_day, $ULang->t("день"), $ULang->t("дня"), $ULang->t("дней"));

      if(count($error) == 0){

        $getServiceOrder = findOne("uni_services_order", "services_order_id_service=? and services_order_id_ads=?", array($id_s,$id_ad));

        if(!$getServiceOrder){

          $getOrderServiceIds = $Ads->getOrderServiceIds( $id_ad );

           if( in_array(1, $getOrderServiceIds) || in_array(2, $getOrderServiceIds) ){

              if($id_s == 3){
                 echo json_encode( ["status"=>false, "answer"=>$ULang->t("Данная услуга уже подключена к вашему объявлению!")] );
                 exit;
              }

           }elseif( in_array(3, $getOrderServiceIds) ){
               echo json_encode( ["status"=>false, "answer"=>$ULang->t("Данная услуга уже подключена к вашему объявлению!")] );
               exit;
           }


          if( $getAd["clients_balance"] >= $price ){

            insert("INSERT INTO uni_services_order(services_order_id_ads,services_order_time_validity,services_order_id_service,services_order_count_day,services_order_status,services_order_time_create)VALUES('$id_ad','$services_order_time_validity','$id_s','$services_order_count_day','{$getAd["ads_status"]}','".date("Y-m-d H:i:s")."')");

            $Main->addOrder( ["id_ad"=>$id_ad,"price"=>$price,"title"=>$title,"id_user"=>$_SESSION["profile"]["id"],"status_pay"=>1, "link" => $Ads->alias($getAd), "user_name" => $getAd["clients_name"], "id_hash_user" => $getAd["clients_id_hash"], "action_name" => "services"] );


            $Profile->actionBalance(array("id_user"=>$_SESSION['profile']['id'],"summa"=>$price,"title"=>$title,"id_order"=>$config["key_rand"]),"-");

            echo json_encode( ["status"=>true] );

          }else{
            
            echo json_encode( ["status"=>false, "balance"=> $Main->price($getAd["clients_balance"]) ] );

          }



        }elseif( strtotime($getServiceOrder["services_order_time_validity"]) < time() ){
          
          if( $getAd["clients_balance"] >= $price ){

            update("UPDATE uni_services_order SET services_order_time_validity=?,services_order_count_day=?,services_order_status=? WHERE services_order_id=?", array($services_order_time_validity,$services_order_count_day,$getAd["ads_status"],$getServiceOrder["services_order_id"]));

            $Main->addOrder( ["id_ad"=>$id_ad,"price"=>$price,"title"=>$title,"id_user"=>$_SESSION["profile"]["id"],"status_pay"=>1, "link" => $Ads->alias($getAd), "user_name" => $getAd["clients_name"], "id_hash_user" => $getAd["clients_id_hash"], "action_name" => "services"] );

            $Profile->actionBalance(array("id_user"=>$_SESSION['profile']['id'],"summa"=>$price,"title"=>$title,"id_order"=>$config["key_rand"]),"-");

            echo json_encode( ["status"=>true] );

          }else{
            
            echo json_encode( ["status"=>false, "balance" => $Main->price($getAd["clients_balance"]) ] );

          }

        }else{

            echo json_encode( ["status"=>false, "answer"=>$ULang->t("Данная услуга уже подключена к вашему объявлению!")] );

        }


      }else{

        echo json_encode( ["status"=>false, "answer"=>implode("\n", $error)] );

      }

           
  }


  if($_POST["action"] == "show_phone"){

     $id_ad = intval($_POST["id_ad"]);

     if($settings["ad_view_phone"] == 1){
     
         if($_SESSION["profile"]["id"]){

           $findAd = findOne("uni_ads", "ads_id=?", array($id_ad));

           if($_SESSION["ad-phone"][$id_ad] && $findAd){

             $Profile->sendChat( array("id_ad" => $id_ad, "action" => 2, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $findAd["ads_id_user"] ) );

             echo json_encode( array( "auth" => 1, "html" => '<a href="tel:'.$_SESSION["ad-phone"][$id_ad].'" >'.$_SESSION["ad-phone"][$id_ad].'</a>' ) );

           }   

         }else{
            echo json_encode( array("auth" => 0) );
         }

     }else{

        echo json_encode( array( "auth" => 1, "html" => '<a href="tel:'.$_SESSION["ad-phone"][$id_ad].'" >'.$_SESSION["ad-phone"][$id_ad].'</a>' ) );

     }
    
  }

  if($_POST["action"] == "remove_publication"){

     if( !$_SESSION["profile"]["id"] ){ exit; }

     $id_ad = intval($_POST["id_ad"]);

     update( "update uni_ads set ads_status=? where ads_id=? and ads_id_user=?", array(2,$id_ad, intval($_SESSION["profile"]["id"]) ), true );

  }

  if($_POST["action"] == "ads_status_sell"){

     if( !$_SESSION["profile"]["id"] ){ exit; }

     $id_ad = intval($_POST["id_ad"]);

     update( "update uni_ads set ads_status=? where ads_id=? and ads_id_user=?", array(5,$id_ad, intval($_SESSION["profile"]["id"]) ), true );

  }

  if($_POST["action"] == "ads_publication"){

     if( !$_SESSION["profile"]["id"] ){ exit; }

     $id_ad = intval($_POST["id_ad"]);

     $getAd = $Ads->get("ads_id=?",[$id_ad]);

     update( "update uni_ads set ads_status=? where ads_id=? and ads_id_user=?", array(1,$id_ad, intval($_SESSION["profile"]["id"]) ), true );

     echo $Ads->alias($getAd) . "?modal=new_ad";
     
  }

  if($_POST["action"] == "ads_delete"){
     
     if( !$_SESSION["profile"]["id"] ){ exit; }

     $id_ad = intval($_POST["id_ad"]);

     update( "update uni_ads set ads_status=? where ads_id=? and ads_id_user=?", array(8,$id_ad, intval($_SESSION["profile"]["id"]) ), true );

  }

  if($_POST["action"] == "ads_extend"){

     $id_ad = intval($_POST["id_ad"]);

     $period = date("Y-m-d H:i:s", time() + ($settings["ads_time_publication_default"] * 86400) );

     update( "update uni_ads set ads_period_publication=?,ads_datetime_add=? where ads_id=? and ads_id_user=?", array($period,date("Y-m-d H:i:s"),$id_ad,intval($_SESSION["profile"]["id"]) ), true );

  }

  if($_POST["action"] == "pay_category_publication"){
      
      $id_ad = (int)$_POST["id_ad"];

      $getAd = $Ads->get("ads_id=? and ads_id_user=?", [$id_ad,intval($_SESSION['profile']['id'])] );

      if($getAd){

        $getCategoryBoard = $CategoryBoard->getCategories("where category_board_visible=1");

        $price = $getCategoryBoard["category_board_id"][$getAd["ads_id_cat"]]["category_board_price"];
        
        if( $getAd["clients_balance"] >= $price ){
          
          if($settings["ads_publication_moderat"]){
             update("update uni_ads set ads_status=? where ads_id=?", [0,$id_ad], true );
          }else{
             update("update uni_ads set ads_status=? where ads_id=?", [1,$id_ad], true );
          }

          $Main->addOrder( ["id_ad"=>$id_ad,"price"=>$price,"title"=>$static_msg["10"]." - ".$getAd["category_board_name"],"id_user"=>$_SESSION["profile"]["id"],"status_pay"=>1, "link" => $Ads->alias($getAd), "user_name" => $getAd["clients_name"], "id_hash_user" => $getAd["clients_id_hash"], "action_name" => "category"] );

          $Profile->actionBalance(array("id_user"=>$_SESSION['profile']['id'],"summa"=>$price,"title"=>$static_msg["10"]." - ".$getAd["category_board_name"],"id_order"=>$config["key_rand"]),"-");

          echo json_encode( ["status"=>true, "location" => $Ads->alias($getAd)] );

        }else{
          
          echo json_encode( ["status"=>false, "balance"=> $Main->price($getUser["clients_balance"]) ] );

        }

      }
       
  }

  if($_POST["action"] == "load_filters_ads"){

     $filters = $_POST["filter"];
     $id_c = (int)$_POST["id_c"];

     unset($_POST["_"]);
     unset($_POST["page"]);
     unset($_POST["action"]);
     unset($_POST["id_c"]);
     unset($_POST["search"]);

     $getCategories = $CategoryBoard->getCategories("where category_board_visible=1");

     if(count($filters)){
        foreach ($filters as $id_filter => $nested) {

          if( is_array($nested) ){

              foreach ($nested as $key => $value) {
                if($value){
                    $count_change_fl += 1;
                    $id_filter_item = $value;
                } 
              }

          }else{

             $count_change_fl += 1;

          }

        }
     }

     $filters = http_build_query($_POST, 'flags_');

     $filters = $filters ? "?" . $filters : "";
     
     if($id_c){
           
           $params = $CategoryBoard->alias( $getCategories['category_board_id'][$id_c]['category_board_chain'] ) . $filters;
           
     }else{

           if($_SESSION["geo"]["alias"]){
              $params = _link($_SESSION["geo"]["alias"]) . $filters;
           }else{
              $params = _link($settings["country_default"]) . $filters; 
           }

     }

     if($count_change_fl == 1 && $id_c){

        $getAlias = findOne("uni_ads_filters_alias", "ads_filters_alias_id_filter_item=? and ads_filters_alias_id_cat=?", [ intval($id_filter_item),$id_c ]);

        if($getAlias){

            echo json_encode( [ "params" => $Filters->alias( ["category_alias"=>$getCategories['category_board_id'][$id_c]['category_board_chain'], "filter_alias"=>$getAlias["ads_filters_alias_alias"]] ) . $var, "count" => $count_change_fl ] );

        }else{
            echo json_encode( [ "params" => $params, "count" => $count_change_fl ] );
        }

     }else{

        echo json_encode( [ "params" => $params, "count" => $count_change_fl ] );

     }

     
  }

  if($_POST["action"] == "load_catalog_ads"){
    
    $page = (int)$_POST["page"] ? (int)$_POST["page"] : 1;
    $query = clear( $_POST["search"] );

    $param_search = $Elastic->paramAdSearch( $query );
    $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];

    if( $query ){

      $results = $Ads->getAll( array( "query"=>"ads_status='1' and clients_status IN(0,1) and ads_period_publication > now() and " . $Filters->explodeSearch( $query ), "navigation"=>true, "page"=>$page, "param_search" => $param_search ) );
      
    }else{

      $results = $Filters->queryFilter($_POST, ["navigation"=>true, "page"=>$page]);

    }

    if($results["count"]){

      if($page <= getCountPage($results["count"],$settings["catalog_out_content"])){

        if($_SESSION["catalog_ad_view"] == "grid" || !$_SESSION["catalog_ad_view"]){
          foreach ($results["all"] as $key => $value) {
             $ad_not_city_distance[] = $value["ads_city_id"];
             ob_start();
             include $config["basePath"] . "/templates/include/catalog_ad_grid.php";
             $content .= ob_get_clean();
          }
        }elseif($_SESSION["catalog_ad_view"] == "list"){
          foreach ($results["all"] as $key => $value) {
             $ad_not_city_distance[] = $value["ads_city_id"];
             ob_start();
             include $config["basePath"] . "/templates/include/catalog_ad_list.php";
             $content .= ob_get_clean();
          }
        }
        
      }

      $getCityDistance = $Ads->getCityDistance( $_POST, $ad_not_city_distance );

      if($page + 1 <= getCountPage($results["count"],$settings["catalog_out_content"])){

        $found = true;
        
        if( $settings["type_content_loading"] == 1 ){
            $content .= '
              
              <div class="col-lg-12" >
              <div class="action-catalog-load-ads text-center mt20" >
                  <button class="btn-custom btn-color-blue width250 button-inline" > <span class="action-load-span-start" > <span class="spinner-border spinner-border-sm button-ajax-loader" role="status" aria-hidden="true"></span> '.$ULang->t("Загрузка").'</span> <span class="action-load-span-end" >'.$ULang->t("Показать еще").' <i class="la la-angle-down"></i></span> </button>
              </div>
              </div>

            ';
        }else{
            $content .= '
              
              <div class="col-lg-12" >
              <div class="text-center mt20 preload-scroll" >

                  <div class="spinner-grow preload-spinner" role="status">
                    <span class="sr-only"></span>
                  </div>
                  
              </div>
              </div>

            ';           
        }

      }else{

         $content .= '
           <div class="col-lg-12" >
           <p class="text-center mt15" >'.$ULang->t("Измените условия поиска, чтобы увидеть больше объявлений").'</p>
           </div>
         ';

         if( $getCityDistance["count"] ){

             $content .= '
                 <div class="col-lg-12 text-center" >
                 <img src="'.$settings["path_tpl_image"].'/catalog-city-329444.png" width="300" />
                 <h4 class="mt40 mb40" ><strong>'.$ULang->t("Объявления в ближайших городах").'</strong></h4>
                 </div>
             ';

             foreach ($getCityDistance["all"] as $key => $value) {
                 
                 ob_start();
                 include $config["basePath"] . "/templates/include/catalog_ad_grid.php";
                 $content .= ob_get_clean();

             }

         }

      }


    }else{

       $getCityDistance = $Ads->getCityDistance( $_POST );

       $found = false;

       $content = '
           <div class="col-lg-12" >
           <div class="catalog-no-results" >
              <div> <i class="las la-search"></i> </div>
              <h5><strong>'.$ULang->t("Ничего не найдено").'</strong></h5>
              <p>'.$ULang->t("Увы, мы не нашли то, что вы искали. Смягчите условия поиска и попробуйте еще раз.").'</p>
           </div>
           </div>
       ';

       if( $getCityDistance["count"] ){

           $content .= '
               <div class="col-lg-12 text-center" >
               <img src="'.$settings["path_tpl_image"].'/catalog-city-329444.png" width="300" />
               <h4 class="mt40 mb40" ><strong>'.$ULang->t("Объявления в ближайших городах").'</strong></h4>
               </div>
           ';

           foreach ($getCityDistance["all"] as $key => $value) {
               
               ob_start();
               include $config["basePath"] . "/templates/include/catalog_ad_grid.php";
               $content .= ob_get_clean();

           }

       }


    }


    echo json_encode( array("content"=>$content, "found"=>$found) );
  
  }

  if($_POST["action"] == "load_index_ads"){
    
    $page = (int)$_POST["page"] ? (int)$_POST["page"] : 1;

    $param_search = $Elastic->paramAdquery();

    if( $settings["ads_sorting_variant"] == 0 ){
      $sorting = "order by ads_sorting desc, ads_id desc";
      $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];
      $param_search["sort"]["ads_id"] = [ "order" => "desc" ];
    }elseif( $settings["ads_sorting_variant"] == 1 ){ 
      $sorting = "order by ads_sorting desc, ads_id asc";
      $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];
      $param_search["sort"]["ads_id"] = [ "order" => "asc" ];      
    }else{
      $sorting = "order by ads_sorting desc";
      $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];
    }

    $results = $Ads->getAll( ["sort"=>$sorting, "query"=>"ads_status='1' and clients_status IN(0,1) and ads_period_publication > now()", "navigation" => true, "page" => $page, "output" => $settings["index_out_content"], "param_search" => $param_search ] );

    if($results["count"]){

      if($page <= getCountPage($results["count"],$settings["index_out_content"])){

          foreach ($results["all"] as $key => $value) {
             ob_start();
             include $config["basePath"] . "/templates/include/catalog_ad_grid.php";
             $content .= ob_get_clean();
          }

      }

      if($page + 1 <= getCountPage($results["count"],$settings["index_out_content"])){
        
        $found = true;

        if( $settings["type_content_loading"] == 1 ){
            $content .= '
              
              <div class="col-lg-12" >
              <div class="ajax-load-button action-index-load-ads text-center mt20" >
                  <button class="btn-custom btn-color-blue width250 button-inline" > <span class="action-load-span-start" > <span class="spinner-border spinner-border-sm button-ajax-loader" role="status" aria-hidden="true"></span> '.$ULang->t("Загрузка").'</span> <span class="action-load-span-end" >'.$ULang->t("Показать еще").' <i class="la la-angle-down"></i></span> </button>
              </div>
              </div>

            ';
        }else{
            $content .= '
              
              <div class="col-lg-12" >
              <div class="text-center mt20 preload-scroll" >

                  <div class="spinner-grow preload-spinner" role="status">
                    <span class="sr-only"></span>
                  </div>
                  
              </div>
              </div>

            ';         
        }


      }else{

         $found = false;

      }


    }else{

       $found = false;

       $content = '
           <div class="col-lg-12" >
           <div class="catalog-no-results" >
              <div> <i class="las la-search"></i> </div>
              <h5><strong>'.$ULang->t("Объявлений пока нет").'</strong></h5>
           </div>
           </div>
       ';

    }


    echo json_encode( array("content"=>$content, "found"=>$found) );
  
  }

  if($_POST["action"] == "send_chat_message"){
     
     if($_SESSION["profile"]["id"]){

       $id_ad = intval($_POST["id_ad"]);
       $text = clear($_POST["text"]);

       $findAd = findOne("uni_ads", "ads_id=? and ads_status!=?", array($id_ad,8));

       if($text && $findAd){

           $Profile->sendChat( array("id_ad" => $id_ad, "text" => $text, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $findAd["ads_id_user"]) );

           echo $ULang->t('Сообщение успешно отправлено!');
          
       }

     }

  }

  if($_POST["action"] == "catalog_view"){
     
     if( $_POST["view"] == "grid" ){
        $_POST["view"] = "grid";
     }elseif( $_POST["view"] == "list" ){
        $_POST["view"] = "list";
     }else{
        $_POST["view"] = "grid";
     }

     $_SESSION["catalog_ad_view"] = $_POST["view"];

  }

  if($_POST["action"] == "ad_similar"){
      
    $id_cat = (int)$_POST["id_cat"];
    $id_ad = (int)$_POST["id_ad"];
    
    if($id_ad && $id_cat && $settings["ad_similar_count"]){

      $getAd = findOne("uni_ads", "ads_id=?", [$id_ad] );

      if(!$getAd) exit;

      $getShop = findOne( "uni_clients_shops", "clients_shops_time_validity > now() and clients_shops_id_user=?", [ $getAd["ads_id_user"] ] );

      $ids_cat = idsBuildJoin( $CategoryBoard->idsBuild($id_cat, $CategoryBoard->getCategories()), $id_cat );

      $param_search = $Elastic->paramAdquery();

      if( $getShop ){
          $param_search["query"]["bool"]["filter"][]["terms"]["ads_id_user"] = $getAd["ads_id_user"];
          $ads_id_user = "and ads_id_user='{$getAd["ads_id_user"]}'";
      }

      $param_search["query"]["bool"]["filter"][]["terms"]["ads_id_cat"] = explode(",", $ids_cat);
      $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];

      $data["similar"] = $Ads->getAll( [ "query" => "ads_id_cat IN(".$ids_cat.") and clients_status IN(0,1) and ads_status='1' and ads_period_publication > now() and ads_id!=".$id_ad." {$ads_id_user} order by ads_sorting desc limit " . $settings["ad_similar_count"], "param_search" => $param_search, "output" => $settings["ad_similar_count"] ] );

       if($data["similar"]["all"]){
          
          ?>

           <h1 class="h1title mb15 mt35" ><?php if( $getShop ){ echo $ULang->t("Другие объявления продавца"); }else{ echo $ULang->t("Похожие объявления"); } ?></h1>
           
           <div class="row no-gutters gutters10" >
             
               <?php
                  foreach ($data["similar"]["all"] as $key => $value) {
                     include $config["basePath"] . "/templates/include/ad_grid.php";
                  }
               ?>

           </div>

          <?php

       }

     }


  }

  if($_POST["action"] == "auction_rate"){

      $error = [];

      $id = (int)$_POST["id"];
      $rate = round($_POST["rate"]);

      if(!$_SESSION["profile"]["id"]){ echo json_encode(array("status"=>false,"auth" => false)); exit; }

      if(!$id){  $error[] = $ULang->t("Объявление не определено"); }else{
          $getAd = $Ads->get("ads_id=? and ads_auction=?", [$id,1]);
          if($getAd){
            if( strtotime($getAd["ads_auction_duration"]) <= time() ){
               $error[] = $ULang->t("Ставка не принята. Аукцион завершен!");
            }else{
               if( $rate <= $getAd["ads_price"]){
                  $error[] = $ULang->t("Минимальная ставка на данный момент: ") . $Main->price($getAd["ads_price"]) . $ULang->t(". Пожалуйста, повысьте свою ставку!");
               }else{
                  if( $getAd["ads_auction_price_sell"] && $rate > $getAd["ads_auction_price_sell"] ){
                     $error[] = $ULang->t("Вы не можете сделать ставку, превышающую цену \"Купить сейчас\". По цене \"Купить сейчас\" Вы можете купить лот без торга.");
                  }
               }
            }
          }else{
             $error[] = $ULang->t("Для данного товара аукцион не действует!");
          }
      }

      if( count($error) == 0 ){

            insert("INSERT INTO uni_ads_auction(ads_auction_id_ad,ads_auction_price,ads_auction_id_user,ads_auction_date)VALUES(?,?,?,?)", [$id, $rate, $_SESSION["profile"]["id"],date("Y-m-d H:i:s")]);

            update("update uni_ads set ads_price=? where ads_id=?", [$rate , $id ], true);

            $getRate = getOne("select * from uni_ads_auction INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_ads_auction`.ads_auction_id_user where ads_auction_id_ad=? and ads_auction_id_user!=? order by ads_auction_price desc", [$id, intval($_SESSION["profile"]["id"])]);
             
            if($getRate){

               $data = array("{ADS_TITLE}"=>$getAd["ads_title"],
                             "{ADS_LINK}"=>$Ads->alias($getAd),
                             "{USER_NAME}"=>$getRate["clients_name"],                          
                             "{UNSUBSCRIBE}"=>"",                          
                             "{EMAIL_TO}"=>$getRate["clients_email"]
                             );

               email_notification( array( "variable" => $data, "code" => "AUCTION_INTERRUPT" ) );

               $Profile->sendChat( array("id_ad" => $id, "action" => 6, "user_from" => $getAd["ads_id_user"] , "user_to" => $getRate["clients_id"] ) );

            }

            echo json_encode( [ "status"=>true,"auth" => true ] );

      }else{
         echo json_encode( [ "status"=>false, "answer"=> implode("<br>", $error),"auth" => true ] );
      }

  }

  if($_POST["action"] == "auction_cancel_rate"){

      $id = (int)$_POST["id"];

      if(!$_SESSION["profile"]["id"]){ exit; }

        $getAd = $Ads->get("ads_id=? and ads_auction=?", [$id,1]);
        
        if($getAd){

            $getRate = getOne("select * from uni_ads_auction where ads_auction_id_ad=? order by ads_auction_price desc", [$id]);

            update("delete from uni_ads_auction where ads_auction_id_user=? and ads_auction_id_ad=?", [ $getRate["ads_auction_id_user"], $id ]);
            
            $user_winner = getOne("select * from uni_ads_auction INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_ads_auction`.ads_auction_id_user where ads_auction_id_ad=? order by ads_auction_price desc", [$id]);

            if($user_winner){

                update("update uni_ads set ads_price=? where ads_id=?", [ $user_winner["ads_auction_price"] , $id ], true);

                $data = array("{ADS_LINK}"=>$Ads->alias($getAd),
                              "{ADS_TITLE}"=>$getAd["ads_title"],
                              "{USER_NAME}"=>$user_winner["clients_name"],
                              "{UNSUBSCRIBE}"=>"",
                              "{EMAIL_TO}"=>$user_winner["clients_email"]
                              );

                email_notification( array( "variable" => $data, "code" => "AUCTION_USER_WINNER" ) );   

                $Profile->sendChat( array("id_ad" => $id, "action" => 5, "user_from" => $getAd["ads_id_user"] , "user_to" => $user_winner["clients_id"] ) );      
            
            }else{

               update("update uni_ads set ads_status=? where ads_id=?", [2, $id ], true);

            }

        }
 
  }

  if($_POST["action"] == "buy_payment_goods"){

     $id = (int)$_POST["id"];

     if(!$_SESSION["profile"]["id"]){  echo json_encode( ["status" => false] ); exit; }

     $findAd = $Ads->get("ads_id=? and ads_status IN(1,4)", [$id]);

     $getOrder = findOne("uni_secure", "secure_id_ad=? and secure_status!=?", [$findAd["ads_id"],5]);
     
     if($getOrder){

       if( $getOrder["secure_status"] == 0 ){
          if( $getOrder["secure_id_user_buyer"] != $_SESSION["profile"]["id"] ){
              echo json_encode( ["status" => false] ); exit;
          }
       }else{
          echo json_encode( ["status" => false] ); exit; 
       }

       $orderId = $getOrder["secure_id_order"];

     }else{

       $orderId = $config["key_rand"];

     }

     
     if( $findAd && $Ads->getStatusSecure($findAd, true) ){

        if( $findAd["ads_auction"] ){

          if( $findAd["ads_status"] == 1 ){

                if( $findAd["ads_auction_price_sell"] ){
                  $price = $findAd["ads_auction_price_sell"];
                }else{
                  echo json_encode( ["status" => false] ); exit;
                }

          }elseif( $findAd["ads_status"] == 4 ){

                $auction_user_winner = $Ads->getAuctionWinner( $findAd["ads_id"] );

                if( $_SESSION["profile"]["id"] == $auction_user_winner["ads_auction_id_user"] ){
                  $price = $findAd["ads_price"];
                }else{
                  echo json_encode( ["status" => false] ); exit;
                }

          }

        }else{

           $price = $findAd["ads_price"];

        }
        

        if(!$getOrder){
          insert("INSERT INTO uni_secure(secure_id_ad,secure_date,secure_id_user_buyer,secure_id_user_seller,secure_id_order,secure_price)VALUES(?,?,?,?,?,?)", [ $findAd["ads_id"], date("Y-m-d H:i:s"), $_SESSION['profile']['id'], $findAd["ads_id_user"], $orderId, $price ]);

          update("update uni_ads set ads_status=? where ads_id=?", [ 4 , $findAd["ads_id"] ], true);

          $Profile->sendChat( array("id_ad" => $findAd["ads_id"], "action" => 3, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $findAd["ads_id_user"] ) );

          insert("INSERT INTO uni_clients_orders(clients_orders_from_user_id,clients_orders_uniq_id,clients_orders_date,clients_orders_to_user_id,clients_orders_secure)VALUES(?,?,?,?,?)", [intval($_SESSION["profile"]["id"]), $orderId, date('Y-m-d H:i:s'),$findAd["ads_id_user"],1]);
        }

        $html = $Profile->payMethod( $settings["secure_payment_service_name"] , array( "amount" => $price, "id_order" => $orderId, "id_user" => $_SESSION['profile']['id'], "id_user_ad" => $findAd["ads_id_user"], "action" => "secure", "title" => $static_msg["11"]." №".$orderId, "auction" => $findAd["ads_auction"], "id_ad" => $id, "ad_price" => $price, "link_success" => _link("order/".$orderId) ) );

        echo json_encode( array( "status" => true, "redirect" => $html ) );

     }else{

        echo json_encode( ["status" => false] );

     }

  }

  if($_POST["action"] == "confirm_transfer_goods"){
      
      $id = (int)$_POST["id"];

      if(!$_SESSION["profile"]["id"]){  exit; }

      $getOrder = findOne("uni_secure", "secure_id=?", [ $id ]);

      if($getOrder["secure_status"] == 1){

        update("update uni_secure set secure_status=? where secure_id=? and secure_id_user_seller=?", [ 2 , $id, $_SESSION['profile']['id'] ]);

        echo true;

      }else{

        echo false;

      }

  }

  if($_POST["action"] == "confirm_receive_goods"){
      
      $id = (int)$_POST["id"];

      if(!$_SESSION["profile"]["id"]){  exit; }

      $getOrder = findOne("uni_secure", "secure_id=? and secure_id_user_buyer=?", [ $id, $_SESSION['profile']['id'] ]);
      
      if($getOrder){

        update("update uni_secure set secure_status=? where secure_id=?", [ 3 , $id ]);
        update("update uni_ads set ads_status=? where ads_id=?", [ 5 , $getOrder["secure_id_ad"] ], true);

        $payments = findOne("uni_secure_payments", "secure_payments_id_order=? and secure_payments_id_user=?", [$getOrder["secure_id_order"],$getOrder["secure_id_user_seller"]]);

        $user = findOne("uni_clients", "clients_id=?", [$getOrder["secure_id_user_seller"]]);

        if( !$payments && $user ){

          $Ads->addSecurePayments( ["id_order"=>$getOrder["secure_id_order"], "amount"=>$getOrder["secure_price"], "score"=>$user["clients_score"], "id_user"=>$getOrder["secure_id_user_seller"], "status_pay"=>0, "status"=>1, "amount_percent" => $Ads->secureTotalAmountPercent($getOrder["secure_price"])] );

        }

      }

      echo true;

  }

  if($_POST["action"] == "order_cancel_deal"){
      
      $id = (int)$_POST["id"];

      if(!$_SESSION["profile"]["id"]){  exit; }

      $getOrder = findOne("uni_secure", "secure_id=? and secure_id_user_buyer=? and secure_status=?", [ $id, $_SESSION['profile']['id'],1 ]);
      
      if($getOrder){

        update("update uni_secure set secure_status=? where secure_id=?", [ 5 , $id ]);
        update("update uni_ads set ads_status=? where ads_id=?", [ 1 , $getOrder["secure_id_ad"] ], true);

        $payments = findOne("uni_secure_payments", "secure_payments_id_order=? and secure_payments_id_user=?", [$getOrder["secure_id_order"],$getOrder["secure_id_user_buyer"]]);

        $user = findOne("uni_clients", "clients_id=?", [$getOrder["secure_id_user_buyer"]]);

        if( !$payments && $user ){

          $Ads->addSecurePayments( ["id_order"=>$getOrder["secure_id_order"], "amount"=>$getOrder["secure_price"], "score"=>$user["clients_score"], "id_user"=>$getOrder["secure_id_user_buyer"], "status_pay"=>0, "status"=>2, "amount_percent" => $Ads->secureTotalAmountPercent($getOrder["secure_price"], false)] );

        }

      }

      echo true;

  }

  if($_POST["action"] == "order_cancel_deal_marketplace"){
      
      $id = (int)$_POST["id"];

      if(!$_SESSION["profile"]["id"]){  exit; }

      $getOrder = findOne("uni_clients_orders", "clients_orders_id=? and (clients_orders_from_user_id=? or clients_orders_to_user_id=?)", [ $id, $_SESSION['profile']['id'], $_SESSION['profile']['id'] ]);
      
      if($getOrder){
        $Cart->returnAvailable($id);
        update('update uni_clients_orders set clients_orders_status=? where clients_orders_id=?', [2,$id]);
      }
      

      echo true;

  }

  if($_POST["action"] == "order_delete_marketplace"){
      
      $id = (int)$_POST["id"];

      if(!$_SESSION["profile"]["id"]){  exit; }

      $getOrder = findOne("uni_clients_orders", "clients_orders_id=? and (clients_orders_from_user_id=? or clients_orders_to_user_id=?)", [ $id, $_SESSION['profile']['id'], $_SESSION['profile']['id'] ]);

      if($getOrder){
          if($getOrder['clients_orders_status'] != 2){
            $Cart->returnAvailable($id);
          }
          update('delete from uni_clients_orders_ads where clients_orders_ads_order_id=?', [$getOrder['clients_orders_uniq_id']]);
          update('delete from uni_clients_orders where clients_orders_id=?', [$id]);
      }

      echo json_encode(['link'=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/orders" )]);;

  }

  if($_POST["action"] == "order_change_status"){
      
      $id = (int)$_POST["id"];
      $status = (int)$_POST["status"];

      if(!$_SESSION["profile"]["id"]){  exit; }

      $getOrder = findOne("uni_clients_orders", "clients_orders_id=? and (clients_orders_from_user_id=? or clients_orders_to_user_id=?)", [ $id, $_SESSION['profile']['id'], $_SESSION['profile']['id'] ]);
      
      if($getOrder){
        if($status == 2){
            $Cart->returnAvailable($id);
        }
        update('update uni_clients_orders set clients_orders_status=? where clients_orders_id=?', [$status,$id]);
      }
      

      echo true;

  }

  if($_POST["action"] == "add_disputes"){

      if(!$_SESSION["profile"]["id"] || !intval($_POST["id"])){  exit; }
      
      $text = clear( $_POST["text"] );

      $attach = [];

      if( $text ){

         $getSecure = findOne("uni_secure", "secure_id=? and secure_status=?", [intval($_POST["id"]),2]);
         
         if($getSecure){

         $files = normalize_files_array( $_FILES );
         if($files["files"]){
            foreach ( array_slice($files["files"], 0, 5) as $key => $value) {

                $path = $config["basePath"] . "/" . $config["media"]["attach"];
                $max_file_size = 2;
                $extensions = array('jpeg', 'jpg', 'png');
                $ext = strtolower(pathinfo($value['name'], PATHINFO_EXTENSION));
                
                if($value["size"] <= $max_file_size*1024*1024){

                  if (in_array($ext, $extensions))
                  {
                    
                        $uid = md5($_SESSION['profile']['id'] . uniqid());

                        $name = $uid . "." . $ext;
                        
                        if( move_uploaded_file($value["tmp_name"], $path . "/" . $name) ){
                            $attach[] = $name;
                        }
                        
                  }

                }
                 
            }
         }

         insert("INSERT INTO uni_secure_disputes(secure_disputes_id_secure,secure_disputes_text,secure_disputes_date,secure_disputes_id_user,secure_disputes_attach)VALUES(?,?,?,?,?)", [intval($_POST["id"]), $text, date("Y-m-d H:i:s"), $_SESSION['profile']['id'], json_encode($attach)]);

         update("update uni_secure set secure_status=? where secure_id=? and secure_id_user_buyer=?", [ 4 , intval($_POST["id"]), $_SESSION['profile']['id'] ]);

         echo json_encode( ["status"=>true] );

         }

      }else{
         echo json_encode( ["status"=>false, "answer"=>$ULang->t("Пожалуйста, опишите причину спора")] );
      }

  }

  if($_POST["action"] == "feedback"){

     $error = [];

     if(!$_POST["subject"]) $error[] = $ULang->t("Пожалуйста, укажите тему обращения");
     if(!$_POST["text"]) $error[] = $ULang->t("Пожалуйста, укажите текст обращения");
     if(!$_POST["email"]) $error[] = $ULang->t("Пожалуйста, укажите ваш e-mail");

     if(!$_POST["code"] || $_POST["code"] != $_SESSION['captcha']['feedback']) $error[] = $ULang->t("Пожалуйста, укажите корректный код проверки");

     if( count($error) == 0 ){

        $text = '
        <p style="margin-bottom: 0px;" >'.$static_msg["12"].': '.$_POST["subject"].'</p>
        <p style="margin-bottom: 0px;" >'.$static_msg["13"].': '.$_POST["name"].'</p>
        <p>'.$static_msg["14"].': '.$_POST["email"].'</p>
        <hr>
        <p><strong>'.$static_msg["15"].'</strong></p>
        <p>'.$_POST["text"].'</p>
        ';

        mailer($settings["email_alert"],$static_msg["16"]." - " . $settings["site_name"],$text);
        
        echo json_encode( ["status"=>true] );
     }else{
        echo json_encode( ["status"=>false, "answer"=> implode("\n", $error) ] );
     }

  }

  if($_POST["action"] == "user_subscribe"){

     $error = [];

     if(validateEmail( $_POST["email"] ) == false){
          $error[] = $ULang->t("Пожалуйста, укажите корректный e-mail адрес.");
     }

     if( count($error) == 0 ){

        $hash = hash('sha256', $_POST["email"].$config["private_hash"]);
        $subscribe = $config["urlPath"].'/subscribe?hash='.$hash.'&email='.$_POST["email"];

        $data = array("{ACTIVATION_LINK}"=>$subscribe,
                      "{UNSUBSCRIBE}"=>"",
                      "{EMAIL_TO}"=>$_POST["email"]
                      );

        email_notification( array( "variable" => $data, "code" => "SUBSCRIBE_ACTIVATION_EMAIL" ) );
        
        echo json_encode( ["status"=>true] );
     }else{
        echo json_encode( ["status"=>false, "answer"=> implode("\n", $error) ] );
     }

  }

  if($_POST["action"] == "add_comment"){

      if(!$_SESSION['profile']['id']){ echo json_encode( ["status"=>false] ); exit; }

      $id_ad = (int)$_POST["id_ad"];
      $id_msg = (int)$_POST["id_msg"];
      $text = clear($_POST["text"]);

      if($id_msg){
        if( $_POST["token"] != md5($config["private_hash"].$id_msg.$id_ad) ){
            echo json_encode( ["status"=>false] ); exit;
        }
      }

      $getAd = findOne( "uni_ads", "ads_id=?", [ $id_ad ] );

      if( !$getAd ){
           echo json_encode( ["status"=>false] ); exit;
      }

      $locked = $Profile->getUserLocked( $getAd["ads_id_user"], $_SESSION["profile"]["id"] );

      if( $locked ){
        echo json_encode( ["status"=>false] ); exit;
      }

      if($text){

        insert("INSERT INTO uni_ads_comments(ads_comments_id_user,ads_comments_text,ads_comments_date,ads_comments_id_parent,ads_comments_id_ad)VALUES(?,?,?,?,?)", [$_SESSION['profile']['id'],$text,date("Y-m-d H:i:s"),$id_msg,$id_ad]);
        $Profile->sendChat( array("id_ad" => $id_ad, 'text' => 'У Вас новый комментарий! <br> <i>"' . $text .'"</i>', "action" => 7, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $getAd["ads_id_user"] ) );
        mailer($settings["email_alert"], $static_msg["16"]." - " . $settings["site_name"], 'У Вас новый комментарий!');

        echo json_encode( ["status"=>true] );

      }else{
        echo json_encode( ["status"=>false] );
      }

  }

  if($_POST["action"] == "delete_comment"){

     $id = intval($_POST["id"]);

     if( $_SESSION['cp_auth'][ $config["private_hash"] ] ){

         $getMsg = findOne("uni_ads_comments", "ads_comments_id=?", [$id]);

         $nested_ids = idsBuildJoin($Ads->idsComments($id,$Ads->getComments($getMsg["ads_comments_id_ad"])),$id);
        
         if($nested_ids){
            foreach (explode(",", $nested_ids) as $key => $value) {
              
               update( "delete from uni_ads_comments where ads_comments_id=?", array( $value ) );

            }
         }

     }else{
    
         $getMsg = findOne("uni_ads_comments", "ads_comments_id=? and ads_comments_id_user=?", [$id,intval($_SESSION["profile"]["id"])]);
         
         $nested_ids = idsBuildJoin($Ads->idsComments($id,$Ads->getComments($getMsg["ads_comments_id_ad"])),$id);

         if($nested_ids && $getMsg){
            foreach (explode(",", $nested_ids) as $key => $value) {
              
               update( "delete from uni_ads_comments where ads_comments_id=?", array( $value ) );

            }
         }

     }

     echo json_encode( ["status"=>true] );

  }

  if($_POST["action"] == "ads_search"){

      $query = clear( $_POST["search"] );
      $id_user = (int)$_POST["id_u"];
      $id_cat = (int)$_POST["id_c"];

      if(!$query) exit;

        if( $id_user ){

            $subquery = " and ads_id_user='{$id_user}'";

        }else{

            if( $Ads->queryGeo() ){
                $subquery = " and " . $Ads->queryGeo();
            }

            if( $id_cat ){
                $ids_cat = idsBuildJoin( $CategoryBoard->idsBuild($id_cat, $CategoryBoard->getCategories("where category_board_visible=1")), $id_cat );
                $subquery .= " and ads_id_cat IN({$ids_cat})";
            }

        }

        $results = $Ads->getAll( array("navigation"=>false,"output"=>10,"query"=>"ads_status='1' and clients_status IN(0,1) and ads_period_publication > now() {$subquery} and " . $Filters->explodeSearch( $query ), "sort"=>"ORDER By ads_datetime_add DESC limit 10", "param_search" => $Elastic->paramAdSearch( $query, $id_user, $id_cat ) ) );


        if( $results["count"] ){

             foreach ($results["all"] as $key => $value) {
                $image = $Ads->getImages($value["ads_images"]);
                $service = $Ads->adServices($value["ads_id"]);
                //$getShop = findOne( "uni_clients_shops", "clients_shops_time_validity > now() and clients_shops_id_user=?", [ $value["ads_id_user"] ] );
                ?>
                  <a href="<?php echo $Ads->alias($value); ?>" > 
                    <div class="main-search-results-img" ><img src="<?php echo Exists($config["media"]["small_image_ads"],$image[0],$config["media"]["no_image"]); ?>"></div>
                    <div class="main-search-results-cont" >

                      <span class="main-search-results-name" ><?php echo $value["ads_title"]; echo $service[2] || $service[3] ? '<span class="main-search-results-item-vip" >Vip</span>' : ""; ?></span>
                      <span class="main-search-results-category" ><?php echo $value["category_board_name"]; ?></span>

                    </div>
                    <div class="clr" ></div>
                  </a>              
                <?php
             }

        }else{

             if( !$id_user ){

                  ?>
                  <span> <?php echo $ULang->t("По вашему запросу ничего не найдено."); ?> </span>
                  <?php

                   $results = $Ads->getAll( array("navigation"=>false,"output"=>10,"query"=>"ads_status='1' and clients_status IN(0,1) and ads_period_publication > now() and " . $Filters->explodeSearch( $query ), "sort"=>"ORDER By ads_datetime_add DESC limit 10", "param_search" => $Elastic->paramAdSearch( $query ) ) );

                   if( $results["count"] ){

                       ?>
                       <hr >
                       <span class="mb5" > <?php echo $ULang->t("Похожие объявления из других городов и категорий"); ?> </span>
                       <?php

                       foreach ($results["all"] as $key => $value) {
                          $image = $Ads->getImages($value["ads_images"]);
                          $service = $Ads->adServices($value["ads_id"]);
                          ?>
                            <a href="<?php echo $Ads->alias($value); ?>" > 
                              <div class="main-search-results-img" ><img src="<?php echo Exists($config["media"]["small_image_ads"],$image[0],$config["media"]["no_image"]); ?>"></div>
                              <div class="main-search-results-cont" >

                                <span class="main-search-results-name" ><?php echo $value["ads_title"]; echo $service[2] || $service[3] ? '<span class="main-search-results-item-vip" >Vip</span>' : ""; ?></span>
                                <span class="main-search-results-category" ><?php echo $value["category_board_name"]; ?></span>

                              </div>
                              <div class="clr" ></div>
                            </a>              
                          <?php
                       }

                   }                  

             }

        }

  }

  if($_POST["action"] == "load_items_filter"){

      $id_filter = (int)$_POST["id_filter"];
      $id_item = (int)$_POST["id_item"];


      if($_POST["view"] == "catalog"){
         echo $Filters->load_podfilters_catalog($id_filter,$id_item);
      }elseif($_POST["view"] == "modal"){
         echo $Filters->load_podfilters_catalog($id_filter,$id_item,[],"podfilters_modal");
      }elseif($_POST["view"] == "ad"){
         echo $Filters->load_podfilters_ad($id_filter,$id_item);
      }
      
  }

  if($_POST["action"] == "load_offers_map"){
      
      if($_POST["ids"]){

        $ids = iteratingArray( explode(",", $_POST["ids"]) , "int");

        $param_search = $Elastic->paramAdquery();

        $param_search["query"]["bool"]["filter"][]["terms"]["ads_id"] = $ids;

        if( $settings["ads_sorting_variant"] == 0 ){
          $sorting = "order by ads_sorting desc, ads_id desc";
          $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];
          $param_search["sort"]["ads_id"] = [ "order" => "desc" ];
        }elseif( $settings["ads_sorting_variant"] == 1 ){ 
          $sorting = "order by ads_sorting desc, ads_id asc";
          $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];
          $param_search["sort"]["ads_id"] = [ "order" => "asc" ];      
        }else{
          $sorting = "order by ads_sorting desc";
          $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];
        }

        $result = $Ads->getAll( array("query"=>"ads_id IN(".implode(",",$ids).")", "sort"=>$sorting, "navigation"=>true, "page"=>intval($_POST["page"]), "param_search" => $param_search) );
        
        foreach ($result["all"] as $key => $value) {

           $Ads->updateCD($value["ads_id"]);
           
           $service = $Ads->adServices($value["ads_id"]);
           $highlight = $service[2] || $service[3] ? "ads-highlight" : "";
           
           $offers .= '<div class="map-search-offer '.$highlight.'">';
           ob_start();
           include $config["basePath"] . "/templates/include/map_ad_grid.php";
           $offers .= ob_get_clean();
           $offers .= '</div>';

        }

        $info = '<i data-tippy-placement="bottom" title="'.$ULang->t("Объявления без адреса не отображаются на карте. Перейдите в список, чтобы увидеть все объявления.").'" class="las la-question-circle map-search-offers-header-count-info"></i>';

        $navigation = '
            <div>
              <ul class="pagination pagination-map-offers justify-content-center mt15">  
                 '.out_navigation( array("count"=>$result["count"], "output" => $settings["catalog_out_content"], "prev"=>'<i class="la la-long-arrow-left"></i>', "next"=>'<i class="la la-arrow-right"></i>', "page_count" => intval($_POST["page"]), "page_variable" => "page") ).'
              </ul>
            </div>
        ';

        echo json_encode( [ "offers" => $offers . $navigation, "count" => $result["count"], "status" => true, "countHtml" => $result["count"] . " " . ending($result["count"],$ULang->t("объявление"),$ULang->t("объявления"),$ULang->t("объявлений") ) . $info ] );

      }else{

        $offers = '
          <div class="map-no-result" >
          <i class="las la-search-location"></i>
          <h6><strong>'.$ULang->t("К сожалению, нет объявлений в этой области карты").'</strong></h6>
          <p>'.$ULang->t("Попробуйте сменить масштаб или область карты.").'</p>
          </div>
        ';
        
        echo json_encode( [ "offers" => $offers, "count" => 0, "status" => false ] );

      }
 
  }

  if($_POST["action"] == "modal_ads_subscriptions_add"){
      
     $error = [];

     $url = trim($_POST["url"], "/");

     if(validateEmail( $_POST["email"] ) == false){

          $error[] = $ULang->t("Пожалуйста, укажите корректный e-mail адрес.");

     }else{

          $findUrl = findOne("uni_ads_subscriptions", "ads_subscriptions_params=? and ads_subscriptions_email=?", [$url,$_POST["email"]]);
          if($findUrl) $error[] = $ULang->t("Сохраненный поиск с такими параметрами уже существует!");

     }

     if( !count($error) ){
         
         insert("INSERT INTO uni_ads_subscriptions(ads_subscriptions_email,ads_subscriptions_id_user,ads_subscriptions_params,ads_subscriptions_date,ads_subscriptions_period,ads_subscriptions_date_update)VALUES(?,?,?,?,?,?)", [ $_POST["email"],intval($_SESSION['profile']['id']),$url,date("Y-m-d H:i:s"), intval($_POST["period"]),date("Y-m-d H:i:s") ]);
         
         $Subscription->add(array("email"=>$_POST["email"],"user_id"=>intval($_SESSION['profile']['id']),"name"=>$_POST["email"],"status" => 1));

         echo json_encode( [ "status" => true ] );

     }else{

         echo json_encode( [ "status" => false, "answer" => implode("\n", $error) ] );

     }

      

  }

  if($_POST["action"] == "catalog_ads_subscriptions_add"){

      $url = trim($_POST["url"], "/");

      if( $_SESSION["profile"]["id"] ){

          if( $_SESSION["profile"]["data"]["clients_email"] ){

             $findUrl = findOne("uni_ads_subscriptions", "ads_subscriptions_params=? and ads_subscriptions_email=?", [$url,$_SESSION["profile"]["data"]["clients_email"]]);
             
             if(!$findUrl){
                insert("INSERT INTO uni_ads_subscriptions(ads_subscriptions_email,ads_subscriptions_id_user,ads_subscriptions_params,ads_subscriptions_date,ads_subscriptions_period,ads_subscriptions_date_update)VALUES(?,?,?,?,?,?)", [ $_SESSION["profile"]["data"]["clients_email"],intval($_SESSION['profile']['id']),$url,date("Y-m-d H:i:s"), 1, date("Y-m-d H:i:s") ]);
             }

             echo json_encode( [ "status" => true, "auth" => true ] );
          }else{
             echo json_encode( [ "auth" => true, "status" => false ] );
          }

      }else{

         echo json_encode( [ "auth" => false, "status" => false ] );

      }


  }

  if($_POST["action"] == "media_slider_click"){

     update("update uni_sliders set sliders_click=sliders_click+? where sliders_id=?", [1, intval($_POST["id"]) ]);

  }

  if($_POST["action"] == "auction_accept_order_reservation"){

     if( !$_SESSION["profile"]["id"] ) exit;
     
     $id_ad = (int)$_POST["id"];

     $getAd = $Ads->get("ads_id=? and ads_auction=?", [$id_ad,1]);
     
     if( $getAd["ads_auction_price_sell"] ){

         update( "update uni_ads set ads_status=? where ads_id=?", array(4,$id_ad), true );

         insert("INSERT INTO uni_ads_auction(ads_auction_id_ad,ads_auction_price,ads_auction_id_user,ads_auction_date)VALUES(?,?,?,?)", [$id_ad, $getAd["ads_auction_price_sell"], $_SESSION["profile"]["id"], date("Y-m-d H:i:s")]);

         update("update uni_ads set ads_price=? where ads_id=?", [$getAd["ads_auction_price_sell"] , $id_ad ], true);

         $Profile->sendChat( array("id_ad" => $id_ad, "action" => 3, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $getAd["ads_id_user"] ) );

         echo true;

     }

  }

  if($_POST["action"] == "create_accept_phone"){

     $phone = formatPhone( $_POST["phone"] );

     if( !$_SESSION["profile"]["id"] ){
         exit;
     } 

     if($phone){

         if( $_SESSION["create-verify-phone-attempts"]["date"] ){

             if( $_SESSION["create-verify-phone-attempts"]["date"] <= time() ){
                 unset($_SESSION["create-verify-phone-attempts"]);
             }else{
                 $time = date("i ".$ULang->t('мин')." s " . $ULang->t('сек'), mktime(0, 0, $_SESSION["create-verify-phone-attempts"]["date"] - time() ) );
                 echo json_encode( [ "status" => false, "answer" => $ULang->t("Повторно отправить сообщение можно через") . ' ' . $time ] );
                 exit();
             }

         }else{

             if( intval($_SESSION["create-verify-phone-attempts"]["count"]) >= 3 ){
                 $_SESSION["create-verify-phone-attempts"]["date"] = time() + 180;
                 $time = date("i ".$ULang->t('мин')." s " . $ULang->t('сек'), mktime(0, 0, 180 ) );
                 echo json_encode( [ "status" => false, "answer" => $ULang->t("Повторно отправить сообщение можно через") . ' ' . $time ] );
                 exit;
             }

         }
        
        $_SESSION["create-verify-phone-attempts"]["count"]++;
        $_SESSION["create-verify-phone"][$phone]["code"] = mt_rand(1000,9999);
        sms($phone, $settings["sms_prefix_confirmation_code"] . $_SESSION["create-verify-phone"][$phone]["code"] );
        echo json_encode( [ "status" => true ] );

     }else{
        echo json_encode( [ "status" => false, "answer" => $ULang->t("Пожалуйста, укажите номер телефона.") ] );
     }

  }

  if($_POST["action"] == "create_verify_phone"){

     $phone = formatPhone( $_POST["phone"] );
     $code = intval( $_POST["code"] );

     if( $_SESSION["create-verify-phone"][$phone]["code"] && $_SESSION["create-verify-phone"][$phone]["code"] == $code ){
        $_SESSION["create-verify-phone"]["phone"] = $phone;
        echo true;
        unset($_SESSION["create-verify-phone-attempts"]);
     }else{
        echo $ULang->t("Неверный код");
     }

  }

  if($_POST["action"] == "site_color"){

     if( $_POST["color"] == "dark" ){
         $_SESSION["schema-color"] = "dark";
     }else{
         $_SESSION["schema-color"] = "white";
     }

  }




}

?>
<?php
/**
 * UniSite CMS
 *
 * @copyright   2018 Artur Zhur
 * @link    https://unisitecms.ru
 * @author    Artur Zhur
 *
 */

class Main{

    function tpl($template, $variables){

         global $config,$route_name;

	     extract($variables);

	     if(file_exists($config["basePath"]."/templates/".$template)){     
	       ob_start();   
	       require $config["basePath"]."/templates/".$template;
	       $content = ob_get_clean();
	       return $content;
	     }

    }

    function assets( $assets = array() ){
    	global $route_name,$config;

    	if(isset($assets)){
    		foreach ($assets as $key => $link) {
    			if(!is_array($link)){
                    echo str_replace( array("{urlPath}","{lang}"),array($config["urlPath"],getLang()), $link );
    			}else{
    				if($link[$route_name]){
                       echo str_replace( array("{urlPath}","{lang}"), array($config["urlPath"],getLang()), implode("", $link[$route_name]) );
    				}
    			}
    		}
    	}


    }
 
     function price($float=0, $currency_code="", $abbreviation_million=false){
        global $config, $settings;

        $ULang = new ULang();

        if( !$settings["abbreviation_million"] ){
            $abbreviation_million = false;
        }

        if( $currency_code ){
           $currency = $settings["currency_data"][ $currency_code ]["sign"];
        }else{
           $currency = $settings["currency_main"]["sign"];
        }

        $float_format = number_format($float,2,".",",");

        if( $abbreviation_million == false ){

            if( intval(explode(".", $float_format )[1]) == 0 || intval(explode(".", $float_format )[1]) == 00 ){
               return number_format($float,$config["number_format"]["decimals"],$config["number_format"]["dec_point"],$config["number_format"]["thousands_sep"]).' '.$currency;
            }else{
               if( strpos($float_format, ",") === false ){
                  return number_format($float,2,$config["number_format"]["dec_point"],$config["number_format"]["thousands_sep"]).' '.$currency;
               }else{
                  return number_format($float,$config["number_format"]["decimals"],$config["number_format"]["dec_point"],$config["number_format"]["thousands_sep"]).' '.$currency;
               }
            }

        }else{
            
            if( $float >= 1000000 && $float <= 9999999 ){
                
                if( substr($float, 1,1) != 0 ){
                   return substr($float, 0,1).','.substr($float, 1,1).' '.$ULang->t("млн") .' '.$currency;
                }else{
                   return substr($float, 0,1).' '. $ULang->t("млн") .' '.$currency;
                }

            }elseif( $float >= 10000000 && $float <= 99999999 ){
                return substr($float, 0,2).' '. $ULang->t("млн") .' '.$currency;
            }elseif( $float >= 100000000 && $float <= 999999999 ){
                return substr($float, 0,3).' '. $ULang->t("млн") .' '.$currency;
            }else{
                return number_format($float,$config["number_format"]["decimals"],$config["number_format"]["dec_point"],$config["number_format"]["thousands_sep"]).' '.$currency;
            }

        }

    } 

    function walkNumber($array = array()){
        $temp = array();

        if(isset($array)){
            foreach ($array as $key => $value) {
                $temp[] = (int)$value;
            }
        } 

      return $temp;
    }
    
    
     function createDir(){

         global $config;
         
         @mkdir($config["basePath"]."/temp", $config["create_mode"] );
         @mkdir($config["basePath"]."/temp/images", $config["create_mode"] );
         @mkdir($config["basePath"]."/temp/cache", $config["create_mode"] );
         @mkdir($config["basePath"]."/media", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/images_users", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/promo", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/images_blog", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/images_blog/big", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/images_blog/medium", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/images_blog/small", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/images_boards", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/images_boards/big", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/images_boards/small", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/manager", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/attach", $config["create_mode"] );
         @mkdir($config["basePath"]."/media/others", $config["create_mode"] );

         $this->createHtaccessGuard();

    }   

    function createHtaccessGuard(){
         
         global $config;

         $body = '
              RemoveHandler .phtml
              RemoveHandler .php
              RemoveHandler .php3
              RemoveHandler .php4
              RemoveHandler .php5
              RemoveHandler .php6
              RemoveHandler .php7
              RemoveHandler .php8
              RemoveHandler .cgi
              RemoveHandler .exe
              RemoveHandler .pl
              RemoveHandler .asp
              RemoveHandler .aspx
              RemoveHandler .shtml
              RemoveHandler .py
              RemoveHandler .fpl
              RemoveHandler .jsp
              RemoveHandler .htm
              RemoveHandler .html
              RemoveHandler .wml
              RemoveHandler .sh
              RemoveHandler .pcgi
              RemoveHandler .scr

              <Files ~ "\.php|\.phtml|\.cgi|\.exe|\.pl|\.asp|\.aspx|\.shtml|\.py|\.fpl|\.jsp|\.htm|\.html|\.wml|\.sh|\.pcgi|\.scr">
              Order allow,deny
              Deny from all
              </Files>
         ';

         if( !file_exists($config["basePath"]."/temp/images/.htaccess") ){
              file_put_contents( $config["basePath"]."/temp/images/.htaccess" , $body );
         }

         if( !file_exists($config["basePath"]."/media/images_users/.htaccess") ){
              file_put_contents( $config["basePath"]."/media/images_users/.htaccess" , $body );
         }

         if( !file_exists($config["basePath"]."/media/images_boards/big/.htaccess") ){
              file_put_contents( $config["basePath"]."/media/images_boards/big/.htaccess" , $body );
         }

         if( !file_exists($config["basePath"]."/media/images_boards/small/.htaccess") ){
              file_put_contents( $config["basePath"]."/media/images_boards/small/.htaccess" , $body );
         }

         if( !file_exists($config["basePath"]."/media/manager/.htaccess") ){
              file_put_contents( $config["basePath"]."/media/manager/.htaccess" , $body );
         }

         if( !file_exists($config["basePath"]."/media/attach/.htaccess") ){
              file_put_contents( $config["basePath"]."/media/attach/.htaccess" , $body );
         }

         if( !file_exists($config["basePath"]."/media/others/.htaccess") ){
              file_put_contents( $config["basePath"]."/media/others/.htaccess" , $body );
         }


    }


    function outPrices( $array = array() ){

        if($array["new_price"]["price"]){

            return str_replace(array("{price}"),array( $this->price($array["new_price"]["price"]) ),$array["new_price"]["tpl"]).str_replace(array("{price}"),array( $this->price($array["price"]["price"]) ),$array["price"]["tpl"]);

        }else{

            return str_replace(array("{price}"),array( $this->price($array["price"]["price"]) ),$array["new_price"]["tpl"]);

        }

    }

    function share( $data = array() ){
        global $config;
        return '
           <a target="_blank" class="social-icon" href="http://vk.com/share.php?description='.$data["description"].'&image='.$data["image"].'&title='.$data["title"].'&url='.$data["url"].'" >
             <img src="'.$config["urlPath"].'/templates/images/icon-vk.png" height="32" >
           </a>
           <a target="_blank" class="social-icon" href="https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&st.shareUrl='.$data["url"].'&st.title='.$data["title"].'" >
             <img src="'.$config["urlPath"].'/templates/images/icon-ok.png" height="32" >
           </a>
           <a target="_blank" class="social-icon" href="http://www.facebook.com/sharer.php?src='.$data["image"].'&t='.$data["title"].'&u='.$data["url"].'" >
             <img src="'.$config["urlPath"].'/templates/images/icon-fb.png" height="32" >
           </a>
        ';
    }

    function socialLink(){
       global $settings,$config;

       if($settings["social_link_vk"]){ $link .= '
           <a class="social-icon" href="'.$settings["social_link_vk"].'">
             <img src="'.$config["urlPath"].'/templates/images/icon-vk.png" >
           </a>
       '; }
       if($settings["social_link_ok"]){ $link .= '
           <a class="social-icon" href="'.$settings["social_link_ok"].'">
             <img src="'.$config["urlPath"].'/templates/images/icon-ok.png" >
           </a>
       '; }
       if($settings["social_link_fb"]){ $link .= '
           <a class="social-icon" href="'.$settings["social_link_fb"].'">
             <img src="'.$config["urlPath"].'/templates/images/icon-fb.png" >
           </a>
       '; }
       if($settings["social_link_inst"]){ $link .= '
           <a class="social-icon" href="'.$settings["social_link_inst"].'">
             <img src="'.$config["urlPath"].'/templates/images/icon-inst.png" >
           </a>
       '; }
       if($settings["social_link_you"]){ $link .= '
           <a class="social-icon" href="'.$settings["social_link_you"].'">
             <img src="'.$config["urlPath"].'/templates/images/icon-you.png" >
           </a>
       '; }
       if($settings["social_link_telegram"]){ $link .= '
           <a class="social-icon" href="'.$settings["social_link_telegram"].'">
             <img src="'.$config["urlPath"].'/templates/images/icon-telegram.png" >
           </a>
       '; }
       return $link;

    }

    function settings(){
       global $config;

       $get = getAll("select * from uni_settings");
       if(count($get)){        
          foreach ($get as $key => $value) {
              $settings[$value["name"]] = $value["value"];
          }
       }

       $get = getAll("select * from uni_currency");
       if(count($get)){
           foreach ($get as $key => $value) {
              $settings["currency_data"][ $value["code"] ] = $value;
           }
       }

       $get = getAll("select * from uni_languages");
       if(count($get)){
           foreach ($get as $key => $value) {
              $settings["languages_data"][ $value["iso"] ] = $value;
           }
       }       

       $settings["currency_main"] = getOne("select * from uni_currency where main=?", array(1));
       $settings["currency_main"]["sign"] = $config["number_format"]["currency_spacing"] . $settings["currency_main"]["sign"];

       $settings["logotip"] = Exists( $config["media"]["other"], $settings["logo-image"], $config["media"]["no_image"] ); 
       $settings["logotip-mobile"] = Exists( $config["media"]["other"], $settings["logo-image-mobile"], $config["media"]["no_image"] ); 
       $settings["favicon"] = $config["urlPath"] . "/" . $settings["favicon-image"]; 
       $settings["path_tpl_image"] = $config["urlPath"] . "/templates/images"; 
       $settings["path_admin_image"] = $config["urlPath"] . "/" . $config["folder_admin"] . "/files/images"; 
       $settings["bonus_program"] = json_decode($settings["bonus_program"], true); 
       $settings["path_other"] = $config["urlPath"] . "/" . $config["media"]["other"];
       $settings["frontend_menu"] = $settings["site_frontend_menu"] ? json_decode($settings["site_frontend_menu"], true) : [];
       
       if($settings["available_functionality"]){
         foreach (explode(",", $settings["available_functionality"]) as $value) {
           $settings["functionality"][$value] = $value;
         }
       }else{
         $settings["functionality"] = [];
       }
       
       return $settings; 
    }

    function response($code=0){
       global $config, $settings;

       $ULang = new Ulang();

       if($code == 404){
           header('HTTP/1.0 404 Not Found');
           http_response_code(404);  
           require $config["basePath"]."/templates/response/404.php"; 
           exit;      
       }elseif($code == 403){
           require $config["basePath"]."/templates/response/403.php";  
           exit;      
       }

    }

    function setTimeZone(){
        global $settings, $config;
        if($config["timezone"][$settings["main_timezone"]]){

          date_default_timezone_set(  $config["timezone"][$settings["main_timezone"]] );

          try {
              update("SET time_zone = '".$config["timezone"][$settings["main_timezone"]]."'");
          } catch(Exception $e) { }

        }
    }

    function uploadedImage($data = [], $max_file_size = 1){
      global $config;

      $error = [];

        if(!empty($data["files"]['name'])){
                
                $path = $config["basePath"] . "/" . $data["path"] . "/";
                $extensions = array('jpeg', 'jpg', 'png', 'gif', 'svg');
                $ext = strtolower(pathinfo($data["files"]['name'], PATHINFO_EXTENSION));
                
                if($data["files"]["size"] > $max_file_size*1024*1024){
                    $error[] = "Максимальный размер изображения: ".$max_file_size.' mb!';
                }else{
                    if (in_array($ext, $extensions))
                    {
                          
                          if($data["name"]){
                             $name = md5($data["name"]) . '.' . $ext;
                          }elseif($data["prefix_name"]){
                             $name = md5($data["prefix_name"].$data["files"]['name']) . '.' . $ext;
                          }else{
                             $name = md5($data["files"]['name']) . '.' . $ext;
                          }
                          
                          move_uploaded_file( $data["files"]['tmp_name'], $path . $name );
             
                    }else{
                          $error[] = "Допустимые расширения: " . implode(",", $extensions);  
                    }                  
                }

                return [ "error" => $error, "name" => $name ];
                            
        }

    }

    function addOrder( $param = [] ){
      global $config;

      $Admin = new Admin();

      if(!$param["id_order"]) $param["id_order"] = $config["key_rand"];

      insert("INSERT INTO uni_orders(orders_uid,orders_price,orders_title,orders_id_user,orders_status_pay,orders_id_ad,orders_action_name,orders_date)VALUES(?,?,?,?,?,?,?,?)", [ $param["id_order"],round($param["price"],2),$param["title"],$param["id_user"],$param["status_pay"],intval($param["id_ad"]),$param["action_name"], date("Y-m-d H:i:s") ]);

      notifications("buy", array("title" => $param["title"], "price" => $param["price"], "link" => $param["link"], "user_name" => $param["user_name"], "id_hash_user" => $param["id_hash_user"] ));

      $Admin->addNotification("order");

    }

    function modalAuth( $param=[] ){
       if($_SESSION["profile"]["id"]){
          return $param["attr"];
       }else{
          return 'class="open-modal '.$param["class"].'" data-id-modal="modal-auth"';
       }
    }

    function spacePrice( $price=0 ){
      return round(preg_replace('/\s/', '', $price),2);
    }

    function getCardType($number){
    $types = [
            'Maestro' => '/^(50|5[6-9]|6)/',
            'Visa' => '/^4/',
            'MasterCard' => '/^(5[1-5]|(?:222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720))/',
            'Mir' => '/^220[0-4]/',
            'Humo' => '/^9860/',
            'UzCard' => '/^8600/',
        ];
       foreach($types as $type => $regexp){
           if( preg_match($regexp, $number) ){
               return $type;
          }
       }

    }

    function pageMenu( $data = [] ){

      $ULang = new ULang();

        if($data["pages"]){
            foreach ($data["pages"] as $key => $value) {
               ?>
               <a <?php if($value["id"] == $data["page"]["id"]){ echo 'class="active"'; } ?> href="<?php echo _link($value["alias"]); ?>"><?php echo $ULang->t( $value["title"], [ "table"=>"uni_pages", "field"=>"title" ] ); ?></a>
               <?php
            }
        }


    }

    function schemaColor($route_name = ""){
        global $config, $settings;

        if( $route_name == "promo" ) return false;

        if( $_SESSION["schema-color"] == "dark" ) return '<link href="'.$config["urlPath"].'/templates/css/schema_dark.css" rel="stylesheet">';

    }

    function accessSite(){
      global $settings;

      if($settings["access_site"] == "0"){

            if($settings["access_allowed_ip"]){
              $explode = explode(",",$settings["access_allowed_ip"]);
              foreach ($explode as $key => $value) {
                $access_allowed_ip[] = trim($value);
              }
            }else{
              $access_allowed_ip = array();
            }
            
            if($settings["access_action"] == "text"){

               if(!in_array($_SERVER["REMOTE_ADDR"], $access_allowed_ip)){  
                  
                  $this->response(403);

               }

            }elseif($settings["access_action"] == "redirect"){

               if(!in_array($_SERVER["REMOTE_ADDR"], $access_allowed_ip)){  

                   if($settings["access_redirect_link"]) header("Location: ".$settings["access_redirect_link"]);

               }

            }

      }

    }

    function currencyConvert( $param = [] ){
      global $settings;

      $getCurrency = json_decode( $settings["currency_json"], true );

      if($getCurrency){

        if( $param["from"] == "RUB" ){

            $getCurrency = $getCurrency[ $param["from"] ];

            if( $param["to"] == "USD" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "USD");
            }elseif( $param["to"] == "EUR" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "EUR");
            }elseif( $param["to"] == "KZT" ){
              return $this->price( ($getCurrency[$param["to"]]["nominal"] / $getCurrency[$param["to"]]["val"]) * $param["summa"] , "KZT");
            }elseif( $param["to"] == "UAH" ){
              return $this->price( ($getCurrency[$param["to"]]["nominal"] / $getCurrency[$param["to"]]["val"]) * $param["summa"] , "UAH");
            }elseif( $param["to"] == "BYN" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "BYN");
            }

        }elseif( $param["from"] == "KZT" ){

            $getCurrency = $getCurrency[ $param["from"] ];

            if( $param["to"] == "USD" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "USD");
            }elseif( $param["to"] == "EUR" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "EUR");
            }elseif( $param["to"] == "RUB" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "RUB");
            }

        }elseif( $param["from"] == "UAH" ){

            $getCurrency = $getCurrency[ $param["from"] ];

            if( $param["to"] == "USD" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "USD");
            }elseif( $param["to"] == "EUR" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "EUR");
            }elseif( $param["to"] == "RUB" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "RUB");
            }

        }elseif( $param["from"] == "BYN" ){

            $getCurrency = $getCurrency[ $param["from"] ];

            if( $param["to"] == "USD" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "USD");
            }elseif( $param["to"] == "EUR" ){
              return $this->price( $param["summa"] / $getCurrency[$param["to"]]["val"] , "EUR");
            }elseif( $param["to"] == "RUB" ){
              return $this->price( ($getCurrency[$param["to"]]["nominal"] / $getCurrency[$param["to"]]["val"]) * $param["summa"] , "RUB");
            }

        }elseif( $param["from"] == "EUR" ){

            $getCurrency = $getCurrency[ $param["from"] ];

            if( $param["to"] == "RUB" ){
              return $this->price( $param["summa"] * $getCurrency[$param["to"]]["val"] , "RUB");
            }

        }

      }

    }

    function adOutCurrency($price=0, $currency=""){
      global $settings;

      $get = getAll("SELECT * FROM uni_currency WHERE code!=?", [$currency]);

      if($get && $settings["ads_currency_price"] && $settings["currency_json"]){
         
         foreach ($get as $value) {
            $result = $this->currencyConvert( [ "summa" => $price, "from" => $currency, "to" => $value["code"] ] );
            if($result) $span .= '<span>'.$result.'</span>';
         }
         
         if($span){
             return '
              <i class="las la-angle-down"></i> 
              <div class="board-view-price-currency" >
                 '.$span.'
              </div>
            ';
         }

      }

    }

    function searchKeyword(){

       return "";

    }

    function createRobots(){
       global $settings, $config;

       if( file_exists( $config["basePath"] . "/robots.txt" ) ){
         return true;
       }

       $content = "User-agent: *\n";

       if(!$settings["robots_index_site"]){
         $content .= "Disallow: /\n";
       }
       
       $content .= "Host: " . $config["urlPath"] . "\n";
       $content .= "Sitemap: " . $config["urlPath"] . "/sitemap.xml\n";

       $content .= "Disallow: /media/\n";
       $content .= "Disallow: /temp/\n";
       $content .= "Disallow: /templates/\n";

       file_put_contents($config["basePath"] . "/robots.txt", $content);

    }

    function initials( $name ){

        if($name){

            $preg_split = preg_split('/\s+/', $name);

            if( !count($preg_split) || count($preg_split) == 1 ){
                return mb_substr($name, 0,2, "UTF-8");
            }elseif( count($preg_split) >= 2 ){
                return mb_substr($preg_split[0], 0,1, "UTF-8") . mb_substr($preg_split[ count($preg_split)-1 ], 0,1, "UTF-8");
            }else{
                return mb_substr($name, 0,2, "UTF-8");
            }
              
        }

    }

    function sliderLink( $link="" ){

        if($link){

           if( strpos($link, "://") !== false ){
               return $link;
           }else{
               return _link($link);
           }
           
        }

    }

    function viewPromoPage($id = 0){
      if(detectRobots($_SERVER['HTTP_USER_AGENT']) == false){
        if($id){    
            if(!isset($_SESSION["view-promo-page"][$id])){ 
              update("update uni_promo_pages set promo_pages_count_view=promo_pages_count_view+? where promo_pages_id=?", [1,$id]); 
              $_SESSION["view-promo-page"][$id] = 1;
            }  
        }
      }   
    }

    function outFavicon(){
       global $config;

       if( file_exists( $config["basePath"] . '/favicon.ico' ) ){
           echo '<link type="image/x-icon" rel="shortcut icon" href="'.$config["urlPath"].'/favicon.ico">';
       }

       if( file_exists( $config["basePath"] . '/favicon-16x16.png' ) ){
           echo '<link type="image/png" sizes="16x16" rel="icon" href="'.$config["urlPath"].'/favicon-16x16.png">';
       }

       if( file_exists( $config["basePath"] . '/favicon-32x32.png' ) ){
           echo '<link type="image/png" sizes="32x32" rel="icon" href="'.$config["urlPath"].'/favicon-32x32.png">';
       }

       if( file_exists( $config["basePath"] . '/favicon-96x96.png' ) ){
           echo '<link type="image/png" sizes="96x96" rel="icon" href="'.$config["urlPath"].'/favicon-96x96.png">';
       }

       if( file_exists( $config["basePath"] . '/favicon-120x120.png' ) ){
           echo '<link type="image/png" sizes="120x120" rel="icon" href="'.$config["urlPath"].'/favicon-120x120.png">';
       }       

    }

    function clearPHP( $string = "" ){
        return str_replace( array("<?","?>","<?php", "$"),array('', '', '', ''), $string );
    }

    function outSlideAdCategory( $output = 4 ){
        global $config;
        
        $list_ads = [];

        $CategoryBoard = new CategoryBoard();
        $Ads = new Ads();
        $Elastic = new Elastic();
        $Shop = new Shop();
        $ULang = new ULang();
        $getCategoryBoard = $CategoryBoard->getCategories("where category_board_visible=1 and category_board_show_index=1");
        $geo = $Ads->queryGeo() ? " and " . $Ads->queryGeo() : "";
        
        if( count($getCategoryBoard["category_board_id"]) ){
            foreach (array_slice($getCategoryBoard["category_board_id"],0,10,true) as $id_category => $value) {
               
              unset($param_search["query"]["bool"]["filter"]);
              
              $param_search = $Elastic->paramAdquery();
              $list_cats = idsBuildJoin( $CategoryBoard->idsBuild($id_category, $CategoryBoard->getCategories("where category_board_visible=1")), $id_category );
              
              $param_search["query"]["bool"]["filter"][]["term"] = $Ads->arrayGeo();
              $param_search["query"]["bool"]["filter"][]["terms"]["ads_id_cat"] = $list_cats;
              
              $getAds = $Ads->getAll( ["query"=>"ads_status='1' and clients_status IN(0,1) and ads_period_publication > now() and ads_id_cat IN(".$list_cats.") $geo order by ads_id desc limit $output", "param_search" => $param_search, "output" => $output ] );
              if( $getAds["count"] ){
                  
                  foreach ($getAds["all"] as $key => $value) {
   
                      $list_ads[ $id_category ][] = $value;
   
                  }
                  
              }

            }
        }
       
       ksort($list_ads);

       return $list_ads;

    }

    function distance($lat1,$lon1,$lat2,$lon2){

            $lat1=deg2rad($lat1);
            $lon1=deg2rad($lon1);
            $lat2=deg2rad($lat2);
            $lon2=deg2rad($lon2);

            $delta_lat=($lat2 - $lat1);
            $delta_lng=($lon2 - $lon1);

            return round( 6378137/1000 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon1 - $lon2 ) + sin( $lat1 ) * sin( $lat2 ) ),1 );
    }

    function pwa(){

        global $settings, $config;
        
        if( $settings["pwa_status"] ){

          echo "
            
            <script type='text/javascript'>
            if (navigator.serviceWorker.controller) {
                
            } else {
                navigator.serviceWorker.register('".$config["urlPath"]."/sw.js?v=".time()."', {
                    scope: '".$config["urlPrefix"]."'
                }).then(function(reg) {
                    
                });
            }
            </script>
          ";

        }

    }


}


?>
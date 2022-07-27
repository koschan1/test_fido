<?php

/**
 * UniSite CMS
 *
 * @copyright 	2018 Artur Zhur
 * @link 		https://unisitecms.ru
 * @author 		Artur Zhur
 *
 */

function mirror(){
  global $settings;
    $getUrl = parse_url(getenv("HTTP_HOST"));
    $myUrl = parse_url($settings["url"]);
    if($settings["url"] && $getUrl["path"]) if($getUrl["path"] != $myUrl["host"]){ return true; } 
    return false; 
}


function ob_get($content)
{
  ob_start();
  include $content;
  return ob_get_clean();
}

function clear($data)
{
    return trim(htmlspecialchars($data));
}

function resize($filepath, $newfilepath, $width, $height = 0, $quality = 80, $type = '')
{
    $new_image = new picture($filepath);
    $new_image->autoimageresize($width, $height);
    $new_image->imagesave($new_image->image_type, $newfilepath, $quality, $type);
    $new_image->imageout();
}

function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
}

function validateEmail($email){
  if (!preg_match("/^(?:[a-zA-Zа-яА-Я0-9\.]+(?:[-_.]?[a-zA-Zа-яА-Я0-9\_\.\-]+)?@[a-zA-Zа-яА-Я0-9\_\.\-]+(?:\.?[a-zA-Zа-яА-Я0-9]+)?\.[a-zA-Zа-яА-Я]{2,10})$/u",
      trim($email))) {
      return false;
  }else{
      return true;
  }     
}

function validatePhone($string){
  global $config;
  
  if( $string ){
      return true;
  }else{
      return false;
  }

  // $phone = "+" . $string;
  
  // foreach ($config["format_phone"] as $key => $value) {
  //    if( strpos($phone, $value["code"]) !== false ){
  //       if( strlen($string) == $value["length"] ){
  //          return true;
  //       }else{
  //          return false;
  //       }
  //    }
  // }

  // return false;

}

function Exists($dir,$name,$no_image){
   global $config;
   if( !empty($name) && file_exists($config["basePath"] . "/" . $dir . "/" . $name) ){
       return trim($config["urlPath"], "/") . "/" . $dir . "/" . $name;
   }else{
       return trim($config["urlPath"], "/") . "/" . $no_image; 
   } 
}

function img( $param = array() ){
   global $config;

   if( file_exists( $config["basePath"] . "/" . $param["img1"]["path"] ) && !is_dir( $config["basePath"] . "/" . $param["img1"]["path"] ) ){
      return '<img class="'.$param["img1"]["class"].'" src="'.$config["urlPath"] . "/" . $param["img1"]["path"].'" width="'.$param["img1"]["width"].'" >';
   }else{
      if($param["img2"]) return '<img class="'.$param["img2"]["class"].'" src="'.$config["urlPath"] . "/" . $param["img2"]["path"].'" width="'.$param["img2"]["width"].'" >';
   }

}

function out_navigation($param=array()){
  
   if($param["output"] && $param["count"]){ 
   
    $total = getCountPage($param["count"],$param["output"]);
    $page = intval($param["page_count"]);
    
    if($page <= 0) $page = 1;
    if($page > $total) $page = $total;

    if($param["url"]){

      if(substr($param["url"], 0,1) != "?") $variables = '?'.$param["url"].'&'.$param["page_variable"].'='; else $variables = $param["url"].'&'.$param["page_variable"].'=';

    }else{$variables = '?'.$param["page_variable"].'=';}
    
    if($page - 3 > 0) $page3left = '<li class="page-item" ><a data-page="'.($page - 3).'" class="page-link" href="'.$variables.($page - 3).'">'.($page - 3).'</a></li>';
    if($page - 2 > 0) $page2left = '<li class="page-item" ><a data-page="'.($page - 2).'" class="page-link" href="'.$variables.($page - 2).'">'.($page - 2).'</a></li>';
    if($page - 1 > 0) $page1left = '<li class="page-item" ><a data-page="'.($page - 1).'" class="page-link" href="'.$variables.($page - 1).'">'.($page - 1).'</a></li>';
    
    if($page + 3 <= $total) $page3right = '<li class="page-item" ><a data-page="'.($page + 3).'" class="page-link" href="'.$variables.($page + 3).'">'.($page + 3).'</a></li>';
    if($page + 2 <= $total) $page2right = '<li class="page-item" ><a data-page="'.($page + 2).'" class="page-link" href="'.$variables.($page + 2).'">'.($page + 2).'</a></li>';
    if($page + 1 <= $total) $page1right = '<li class="page-item" ><a data-page="'.($page + 1).'" class="page-link" href="'.$variables.($page + 1).'">'.($page + 1).'</a></li>';
    

    if ( ($page + 3) < $total)
    {
        $link_total = '<li class="page-item" ><a data-page="'.$total.'" class="page-link" href="'.$variables.$total.'">'.$total.'</a></li>';
    }

    if ($page > 3)
    {
        $link_first = '<li class="page-item" ><a data-page="1" class="page-link" href="'.$variables.'1">1</a></li>';
    }
    
    if($param["prev"]){
       if($page - 1) $prev = '<li class="page-item pagination-arrow" ><a  data-page="'.($page - 1).'" class="page-link" href="'.$variables.($page - 1).'">'.$param["prev"].'</a></li>'; else $prev = "";
    }
    
    if($param["next"]){
       if( $page < $total ) $next = '<li class="page-item pagination-arrow" ><a  data-page="'.($page + 1).'" class="page-link" href="'.$variables.($page + 1).'">'.$param["next"].'</a></li>'; else $next = ""; 
    }
    
    if($total > 1){ 
       return $prev.$link_first.$page3left.$page2left.$page1left.'<li class="page-item active" ><a  data-page="'.$page.'" class="page-link ripple-effect current-page" href="'.$variables.$page.'" >'.$page.'</a></li>'.$page1right.$page2right.$page3right.$link_total.$next;
    }

   }
           
}

function getCountPage($count,$output){
    $result = ceil($count / $output);
    if(!$result) return 1; else return $result;
}

function navigation_offset( $param = array() ){

    $total = getCountPage($param["count"],$param["output"]);

    if( $param["page"] > $total ) $param["page"] = $total;

    if($param["page"] > 1) $start = ($param["page"] * $param["output"]) - $param["output"]; else $start = 0;      
    return " LIMIT $start, ".$param["output"];
     
}

function pageDisabled($page=0,$count=0,$output=0){
  if(getCountPage($count,$output) == 1){
    return 'disabled=""';
  }elseif(intval($page) >= getCountPage($count,$output)){
    return 'disabled=""';
  }
}


function translite($string = "")
{

    $slugify = new Slugify();
    if($string) return $slugify->slugify( $string );
    
}


function generatePass($number=7){
    
 $arr = array('a','b','c','d','e','f',

              'g','h','i','j','k','l',
            
              'm','n','o','p','r','s',
            
              't','u','v','x','y','z',
            
              'A','B','C','D','E','F',
            
              'G','H','I','J','K','L',
            
              'M','N','O','P','R','S',
            
              'T','U','V','X','Y','Z',
            
              '1','2','3','4','5','6',
            
              '7','8','9','0');

 $pass = "";

 for($i = 0; $i < $number; $i++)
     {        
         $index = rand(0, count($arr) - 1);        
         $pass .= $arr[$index];    
     }

 return $pass;    
}

function datetime_format($string, $time = true) {

 $ULang = new ULang();
 
 if (is_numeric($string)) {
    $string = date( "Y-m-d H:i:s", $string );
 }

 $monn = array(
   '',
   $ULang->t('января'),
   $ULang->t('февраля'),
   $ULang->t('марта'),
   $ULang->t('апреля'),
   $ULang->t('мая'),
   $ULang->t('июня'),
   $ULang->t('июля'),
   $ULang->t('августа'),
   $ULang->t('сентября'),
   $ULang->t('октября'),
   $ULang->t('ноября'),
   $ULang->t('декабря')
 );

 $a = preg_split("/[^\d]/",$string); 
 $today = date('Ymd');
 if(($a[0].$a[1].$a[2])==$today) {

   return($ULang->t("сегодня в")." ".$a[3].":".$a[4]);
   
 } else {
   $b = explode("-",date("Y-m-d"));
   $tom = date("Ymd",mktime(0,0,0,$b[1],$b[2]-1,$b[0]));
   if(($a[0].$a[1].$a[2])==$tom) {
     
     return($ULang->t("вчера в")." ".$a[3].":".$a[4]);
     
   } else {

     $mm = intval($a[1]);
     if($time){
       return($a[2]." ".$monn[$mm]." ".$a[0].", ".$a[3].":".$a[4]);
     }else{
       return($a[2]." ".$monn[$mm]." ".$a[0]); 
     }

   }
 }
}

function datetime_format_cp($string) {
 global $config;

 $static_msg = require $config["basePath"] . "/static/msg.php";

 if (is_numeric($string)) {
    $string = date( "Y-m-d H:i:s", $string );
 }
 
 $monn = array(
   '',
   $static_msg["20"],
   $static_msg["21"],
   $static_msg["22"],
   $static_msg["23"],
   $static_msg["24"],
   $static_msg["25"],
   $static_msg["26"],
   $static_msg["27"],
   $static_msg["28"],
   $static_msg["29"],
   $static_msg["30"],
   $static_msg["31"]
 );

 $a = preg_split("/[^\d]/",$string); 
 $today = date('Ymd');
 if(($a[0].$a[1].$a[2])==$today) {

   return($static_msg["32"]." ".$a[3].":".$a[4]);
   
 } else {
   $b = explode("-",date("Y-m-d"));
   $tom = date("Ymd",mktime(0,0,0,$b[1],$b[2]-1,$b[0]));
   if(($a[0].$a[1].$a[2])==$tom) {

     return($static_msg["33"]." ".$a[3].":".$a[4]);
     
   } else {

     $mm = intval($a[1]);
     return($a[2]." ".$monn[$mm]." ".$a[0].", ".$a[3].":".$a[4]);
   }
 }
}

function file_get_contents_curl($url) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_TIMEOUT, 2);

	$data = curl_exec($ch);
	curl_close($ch);

	return $data;
}


function custom_substr($string, $len, $ellipsis = ""){
  $string = trim(html_entity_decode($string));
  if(mb_strlen( $string ) > $len){
      return mb_substr($string,0,$len).$ellipsis;
  }else{ return $string; }
}

function my_ucfirst($str){
  return mb_strtoupper(mb_substr($str, 0, 1, "UTF-8"), "UTF-8").mb_strtolower(mb_substr($str, 1, mb_strlen($str, "UTF-8"), "UTF-8"), "UTF-8");
}

function textReplace($text){
  global $settings, $config;
  return str_replace(array("{url}", "{site_name}", "{email}", "{phone}"),array($config["urlPath"], $settings["site_name"], $settings["contact_email"], $settings["contact_phone"]),$text);
}

function rotateImage($path){

      if(function_exists('exif_read_data')){
         $exif=exif_read_data($path);
         if( $exif && isset( $exif['Orientation'] ) ){
            $angles=array(3=>180,6=>270,8=>90);
            if(isset($angles[$exif['Orientation']])){

               $info = getimagesize( $path );

               if( $info["mime"] == "image/png" ){

                   $image=imagecreatefrompng($path);

               }elseif( $info["mime"] == "image/jpeg" ){
                
                   $image=imagecreatefromjpeg($path);

               }else{

                   $image=imagecreatefromjpeg($path);
                   
               }

               $image=imagerotate($image,$angles[$exif['Orientation']],0);
               imagejpeg($image,$path,100);
               imagedestroy($image);

            }
         }
      }
        
}

function makrosDefault(){
  global $settings,$config;
  $Main = new Main();
  return array( "{DOMEN}"=>$_SERVER["SERVER_NAME"], "{URL}"=>$config["urlPath"], "{LOGO}"=> $settings["logotip"], "{CONTACT_EMAIL}"=>$settings["contact_email"], "{CONTACT_PHONE}"=>$settings["contact_phone"], "{CONTACT_ADDRESS}"=>$settings["contact_address"], "{SITE_NAME}" => $settings["site_name"], "{ADMIN_LINK}" => $config["urlPath"] . "/" . $config["folder_admin"], "{SITE_TITLE}"=>$settings["title"], "{SOCIAL_LINK}" => '<div class="social" >' . $Main->socialLink() . '</div>', "{IMAGE_OTHER}" => $config["urlPath"] . "/" . $config["media"]["other"], "{LANG}" => $settings["lang_site_default"] );
}

function linkUnsubscribe( $email = "", $type = "user" ){
   global $config,$settings;

   $static_msg = require $config["basePath"] . "/static/msg.php";

   $hash = hash('sha256', $email.$config["private_hash"]);
   $unsubscribe = $config["urlPath"].'/unsubscribe?hash='.$hash.'&email='.$email.'&type='.$type;

   return '<p class="footer-unsubscribe" >'.$static_msg["34"].' '.$settings["site_name"].' <br> <a href="'.$unsubscribe.'">'.$static_msg["35"].'</a> </p>';
}

function email_notification($param = array()){
  global $settings,$config;

  $default = makrosDefault();
  
  foreach ($default as $key => $value) {
     $data[$key] = $value;
  }
  
  if($param["variable"]){
      foreach ($param["variable"] as $key => $value) {
         $data[$key] = $value;
      }
  }

  $get = findOne("uni_email_message", "code = ?", array($param["code"])); 
  if (count($get))
   {
      $text = urldecode($get->text);
      $subject = $get->subject;

      $body = @file_get_contents( $config["basePath"] . "/templates/include/template_mail.php" );
      $text = str_replace("{BODY}", $text, $body);

      if(count($data) != 0){
          foreach($data AS $name => $val){
              $text = str_replace($name, $val, $text);
              $subject = str_replace($name, $val, $subject);
          }
      }

    return mailer($data["{EMAIL_TO}"],$subject,$text);
   }       

}


function replace($array1 = array(),$array2 = array(),$text = ""){
  return str_replace($array1,$array2,$text);
}

function geolocation($ip){
    global $SxGeo;
     $Geo = $SxGeo->getCityFull($ip);
       if($Geo["city"]["name_ru"] || $Geo["region"]["name_ru"]){
          $result[$Geo["city"]["name_ru"]] = $Geo["city"]["name_ru"];
          $result[$Geo["region"]["name_ru"]] = $Geo["region"]["name_ru"];
          if(implode(",",$result) != ','){
              return implode(",",$result);
          }
       }   
}

function ending($number, $one, $two, $five)
{
    $number = $number % 100;

    if ( ($number > 4 && $number < 21) || $number == 0 )
    {
        $ending = $five;
    }
    else
    {
        $last_digit = substr($number, -1);

        if ( $last_digit > 1 && $last_digit < 5 )
            $ending = $two;
        elseif ( $last_digit == 1 )
            $ending = $one;
        else
            $ending = $five;
    }

    return $ending;
}

function detectRobots($user_agent){
  $bots = array(
    'rambler','googlebot','aport','yahoo','msnbot','turtle','mail.ru','omsktele',
    'yetibot','picsearch','sape.bot','sape_context','gigabot','snapbot','alexa.com',
    'megadownload.net','askpeter.info','igde.ru','ask.com','qwartabot','yanga.co.uk',
    'scoutjet','similarpages','oozbot','shrinktheweb.com','aboutusbot','followsite.com',
    'dataparksearch','google-sitemaps','appEngine-google','feedfetcher-google',
    'liveinternet.ru','xml-sitemaps.com','agama','metadatalabs.com','h1.hrn.ru',
    'googlealert.com','seo-rus.com','yaDirectBot','yandeG','yandex',
    'yandexSomething','Copyscape.com','AdsBot-Google','domaintools.com',
    'Nigma.ru','bing.com','dotnetdotcom','bots','robot','AhrefsBot'
  );
  foreach($bots as $bot){
    if(stripos($user_agent, $bot) !== false){
      return true;
    }
  }
 return false;            
}

function getFile($dir){
  if(file_exists($dir)){ 

   $fp = @fopen($dir, 'r' );
    if ($fp) {
        $size = @filesize($dir);
        $content = @fread($fp, $size);
        @fclose ($fp); 
    }

    return trim($content);
  }   
}

function deleteFolder( $path ) {

 if ( file_exists( $path ) AND is_dir( $path ) ) {

    $dir = @opendir($path);
    while ( false !== ( $element = readdir( $dir ) ) ) {

      if ( $element != '.' AND $element != '..' )  {
        $tmp = $path . '/' . $element;
        chmod( $tmp, 0755 );

        if ( is_dir( $tmp ) ) {

          deleteFolder( $tmp );

        } else {
          unlink( $tmp );
       }
     }
   }

    closedir($dir);

   if ( file_exists( $path ) ) {
     rmdir( $path );
   }
 }

}



function notifications($action, $param = array()){
   global $settings,$config;

   $static_msg = require $config["basePath"] . "/static/msg.php";
   
   $Main = new Main();
   $geo = (new Geo())->geoIp( $_SERVER["REMOTE_ADDR"], false );

   if($action == "ads"){
      if($settings["notification_method_new_ads"]){
       $notification_method_new_ads = explode(",",$settings["notification_method_new_ads"]);
           if(in_array("email", $notification_method_new_ads)){
            
             $data = array("{ADS_TITLE}"=>$param["title"],
                           "{ADS_LINK}"=>$param["link"],
                           "{USER_NAME}"=>$param["user_name"],
                           "{USER_LINK}"=>_link( "user/".$param["id_hash_user"]),                           
                           "{ADS_IMAGE_LINK}"=>Exists( $config["media"]["medium_image_ads"],$param["image"],$config["media"]["no_image"] ),
                           "{EMAIL_TO}"=>$settings["email_alert"]
                           );

             email_notification( array( "variable" => $data, "code" => "ADMIN_NEW_ADS" ) );

           }
           if(in_array("telegram", $notification_method_new_ads)){
              telegram( $static_msg["36"].hex2bin('f09f9880')."\n\n".$static_msg["37"]." - ".$settings["site_name"]."\n".$static_msg["38"]." - <a href=\"".$param["link"]."\" >".$param["title"]."</a>\n".$static_msg["39"]." - ". $param["user_name"] ." ".$static_msg["40"]." <a href=\""._link( "user/".$param["id_hash_user"])."\" >".$static_msg["41"]."</a>" );
           }
      }
   }elseif($action == "buy"){

      if($settings["notification_method_new_buy"]){
       $notification_method_new_buy = explode(",",$settings["notification_method_new_buy"]);
           if(in_array("email", $notification_method_new_buy)){
            
             $data = array("{ORDER_TITLE}"=>$param["title"],
                           "{ORDER_PRICE}"=>$Main->price($param["price"]),
                           "{USER_NAME}"=>$param["user_name"],
                           "{USER_LINK}"=>_link( "user/".$param["id_hash_user"]),
                           "{EMAIL_TO}"=>$settings["email_alert"]
                           );

              email_notification( array( "variable" => $data, "code" => "ADMIN_NEW_BUY" ) );

           }
           if(in_array("telegram", $notification_method_new_buy)){
              $status = telegram( $static_msg["42"].hex2bin('f09f9880')."\n\n".$static_msg["37"]." - " . $settings["site_name"] . "\n".$static_msg["43"]." - " . $param["title"] . "\n".$static_msg["44"]." - " . $Main->price($param["price"]) . "\n".$static_msg["45"]." - " . $param["user_name"] . " " . $static_msg["40"] . " <a href=\""._link( "user/".$param["id_hash_user"])."\" >".$static_msg["41"]."</a>" );
           }
      }

   }elseif($action == "user"){

      if($settings["notification_method_new_user"]){
       $notification_method_new_user = explode(",",$settings["notification_method_new_user"]);
           if(in_array("email", $notification_method_new_user)){
            
             $data = array("{USER_NAME}"=>$param["user_name"],
                           "{USER_EMAIL}"=>$param["user_email"],
                           "{USER_PHONE}"=>$param["user_phone"],
                           "{EMAIL_TO}"=>$settings["email_alert"],
                           "{USER_GEO}"=>$geo,
                           );

              email_notification( array( "variable" => $data, "code" => "ADMIN_NEW_USER" ) );

           }
           if(in_array("telegram", $notification_method_new_user)){
              telegram($static_msg["46"].hex2bin('f09f9880')."\n\n".$static_msg["37"]." - ". $settings["site_name"] ."\n".$static_msg["47"]." - ". $param["user_name"] ."\n".$static_msg["14"]." - ". $param["user_email"] ."\n".$static_msg["48"]." - ". $param["user_phone"] ."\n".$static_msg["49"]." - " . $geo);
           }
      }

   }

}

function sms($phone_to="",$text=""){
   global $settings, $config;

   if($settings["sms_service_pass"]){
      $settings["sms_service_pass"] = decrypt($settings["sms_service_pass"]);
   }

   if($settings["sms_service_id"]){
      $settings["sms_service_id"] = decrypt($settings["sms_service_id"]);
   }

   if($settings["sms_service"] == "sms.ru" ){

      return file_get_contents_curl("http://sms.ru/sms/send?api_id=".$settings["sms_service_id"]."&to=".$phone_to."&text=".urlencode($text));

   }elseif($settings["sms_service"] == "iqsms.ru" ){

      return file_get_contents_curl("https://api.iqsms.ru/messages/v2/send/?phone=".$phone_to."&text=".urlencode($text)."&login=".$settings["sms_service_login"]."&password=".$settings["sms_service_pass"]."&sender=".$settings["sms_service_label"]);

   }elseif($settings["sms_service"] == "smsc.ru" ){

      return file_get_contents_curl("https://smsc.ru/sys/send.php?sender=".$settings["sms_service_label"]."&login=".$settings["sms_service_login"]."&psw=".$settings["sms_service_pass"]."&phones=".$phone_to."&mes=".urlencode($text));

   }elseif($settings["sms_service"] == "smsc.kz" ){

      return file_get_contents_curl("https://smsc.kz/sys/send.php?sender=".$settings["sms_service_label"]."&login=".$settings["sms_service_login"]."&psw=".$settings["sms_service_pass"]."&phones=".$phone_to."&mes=".urlencode($text));

   }elseif($settings["sms_service"] == "mobizon.kz" ){

      return file_get_contents_curl("https://api.mobizon.kz/service/message/sendsmsmessage?recipient=".$phone_to."&text=".urlencode($text)."&apiKey=".$settings["sms_service_id"]);

   }elseif($settings["sms_service"] == "turbosms.ua" ){

      return file_get_contents_curl("https://api.turbosms.ua/message/send.json?recipients[0]=".$phone_to."&sms[sender]=".$settings["sms_service_label"]."&sms[text]=".urlencode($text)."&token=".$settings["sms_service_id"]);

   }elseif($settings["sms_service"] == "mobizon.ua" ){

      return file_get_contents_curl("https://api.mobizon.ua/service/message/sendsmsmessage?recipient=".$phone_to."&text=".urlencode($text)."&apiKey=".$settings["sms_service_id"]);

   }elseif($settings["sms_service"] == "sms.by" ){

      return file_get_contents_curl("https://app.sms.by/api/v1/sendQuickSMS?token=".$settings["sms_service_id"]."&message=".urlencode($text)."&phone=".$phone_to);

   }elseif($settings["sms_service"] == "cheapglobalsms.com" ){

      return file_get_contents_curl("http://cheapglobalsms.com/api_v1?sub_account=".$settings["sms_service_login"]."&sub_account_pass=".$settings["sms_service_pass"]."&action=send_sms&sender_id=CGSMS&message=".urlencode($text)."&recipients=" . $phone_to);

   }

}

function telegram($text){
global $settings,$config;

  $token = decrypt($settings["api_id_telegram"]);
  $chat_id = $settings["chat_id_telegram"];
  
  if($token){
    if($chat_id){
      return file_get_contents_curl("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&parse_mode=html&text=". urlencode($text) );
    }else{
      return "No chat_id";
    }
  }else{
     return "No token";
  }


}

function getParam($URI){
   if($URI){
      return explode("/",trim($URI,"/"));
   }else{
      return array();
   }
}


function clearScript($text){
    $cut = array(
      "'<script[^>]*?>.*?</script>'si",
      "'<noscript[^>]*?>.*?</noscript>'si",
      "'<style[^>]*?>.*?</style>'si",
      "'<[\/\!]*?[^<>]*?>'si",
    );
    $to = array(" "," "," "," ");
    return preg_replace($cut, $to, $text);
}

function clearLink($text){
   $re = '@(https?://)?(([a-z0-9.-]+)?[a-z0-9-]+(!?\.[a-z]{2,4}))@';
   preg_match_all($re, $text, $links);
   if(isset($links[0])) return str_replace($links[0], '', $text); else return $text;
}

function clearText($text){
   return clearScript(clearLink($text));
}

function paymentParams($code = ""){
   global $config; 
   if($code){
       $payment = findOne("uni_payments","code=?", array($code));
       if($payment){

          $payment->param = decrypt($payment->param);

          if($payment->param && $payment->param != "[]"){
            return json_decode($payment->param, true);
          }else{
            return [];
          }

       }    
   }else{
     return [];
   }
}


function breadcrumb_count($content, $index = 2){

    preg_match_all ( '/<li.*?>(.*?)<\/li>/i' , $content , $matches); 
    if(count($matches[0]) > 0){
      foreach ($matches[0] as $key => $value) {
        $return .= str_replace(array("{INDEX}"),array($key + $index),$value);
      }
    }

   if($return) return $return; else return $content;

}

function clearSearch($string = "", $len = 150){
   $string = str_replace( array("'","--","#","*","union","select","schema_name"),array('"','-','','','','',''), mb_strtolower( clear($string) , "UTF-8") );
   if($len){
     return custom_substr($string, $len);
   }else{
     return $string;
   }
}

function _link($link="",$url=true){
  global $settings,$config;
  
  if( $settings["visible_lang_site"] ){

    $lang_iso = getLang() ? "/" . getLang() . "/" : "/";

    return trim( $config["urlPath"] . $lang_iso . $link, "/" );

  }else{

    return trim( $config["urlPath"] . "/" . $link, "/" );

  }
   
}

function getLang(){
  global $settings;

  if($_SESSION["langSite"]["iso"]){
     return $_SESSION["langSite"]["iso"];
  }else{
     return $settings["lang_site_default"];
  }

}

function requestUri(){
   global $settings;

   $uri = trim($_SERVER['REQUEST_URI'], "/");

   if( $settings["visible_lang_site"] ){
      
      $uri = explode("/", $uri);
      unset($uri[0]);
      $uri = implode("/", $uri);

   }

   return $uri;
}

function langUri(){
   $uri = trim($_SERVER['REQUEST_URI'], "/");
   if($uri){
     $uri = explode("/", $uri);
     return $uri[0];
   }else{
     return "";
   }
}

function formatPhone($phone = ""){
   $phone = preg_replace('/[^0-9]/', '', $phone);
   if($phone) return trim($phone);
}

function encrypt($plaintext) {
  global $config;
  $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
  $iv = openssl_random_pseudo_bytes($ivlen);
  $ciphertext_raw = openssl_encrypt($plaintext, $cipher, $config["private_hex"], $options=OPENSSL_RAW_DATA, $iv);
  $hmac = hash_hmac('sha256', $ciphertext_raw, $config["private_hex"], $as_binary=true);
  return base64_encode( $iv.$hmac.$ciphertext_raw );
}
 
function decrypt($ciphertext) {
  global $config;
  if($ciphertext){
    $c = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
    $iv = substr($c, 0, $ivlen);
    $hmac = substr($c, $ivlen, $sha2len=32);
    $ciphertext_raw = substr($c, $ivlen+$sha2len);
    $plaintext = openssl_decrypt($ciphertext_raw, $cipher, $config["private_hex"], $options=OPENSSL_RAW_DATA, $iv);
    $calcmac = hash_hmac('sha256', $ciphertext_raw, $config["private_hex"], $as_binary=true);
    if (hash_equals($hmac, $calcmac))
    {
        return $plaintext;
    }
  }
}

function unique_crypt_key($number=32){
    
 $arr = array('a','b','c','d','e','f',
            
              '1','2','3','4','5','6',
            
              '7','8','9','0');

 for($i = 0; $i < $number; $i++)
     {        
         $index = rand(0, count($arr) - 1);        
         $key .= $arr[$index];    
     }

 return $key;    
}

function parseIdAlias($string){

  $alias = explode("-", $string ); 
  $id = (int)end($alias);
  $pop = array_pop($alias);
  $alias = implode("-", $alias );

  return [ "id" => $id, "alias" => $alias];

}

function parseUriAd($string){

  $string = explode("/", $string ); 
  $alias_ad = $string[ count($string) - 1 ];
  unset( $string[ count($string) - 1 ] );

  $alias = explode("-", $alias_ad ); 
  $id = (int)end($alias);
  $pop = array_pop($alias);
  $alias = implode("-", $alias );

  return [ "id" => $id, "alias_ad" => clear($alias), "alias_cat" => clear(implode("/", $string)) ];

}

function parseUriFilter($string){

  $string = explode("/", $string ); 

  $alias_filter = end($string);
  $pop = array_pop($string);
  $alias_cat = implode("/", $string );

  return [ "alias_filter" => clear($alias_filter), "alias_cat" => clear($alias_cat) ];

}

function parseUriBlog($string,$getCategoryBlog=[]){

  $string = explode("/", $string ); 

  if( count($string) == 1 ){
     return [ "id" => 0, "alias_article" => "", "alias_cat" => clear(implode("/", $string)) ];
  }elseif( count($string) == 2 ){

     if( $getCategoryBlog["blog_category_chain"][implode("/", $string)] ){
        return [ "id" => 0, "alias_article" => "", "alias_cat" => clear(implode("/", $string)) ];
     }else{
        $alias_article = explode("-", $string[1] );
        $article_id = (int)end( $alias_article );
        $pop = array_pop( $alias_article );
        if($article_id){
          unset( $string[ count($string)-1 ] );
        }
        return [ "id" => $article_id, "alias_article" => clear(implode("-", $alias_article)), "alias_cat" => clear(implode("/", $string)) ];
     }

  }else{
     return [ "id" => 0, "alias_article" => "", "alias_cat" => clear(implode("/", $string)) ];
  }

}

function generateRandomColor()
{
   global $config;

   if( count($config["icon_colors"]) == 1 ){
      return $config["icon_colors"][0];
   }

   $rand_color = $config["icon_colors"][ mt_rand( 0, count($config["icon_colors"]) - 1 ) ];

   if($rand_color){
      return $rand_color;
   }else{
      return sprintf( '#%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255) );
   }
    
}

function randomColor(){
    return sprintf( '#%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255) );
}

function catalogLocationtUri(){
  
  $params = explode("?", trim( $_SERVER['REQUEST_URI'] , "/") );

  $uri = explode("/", trim( $params[0] , "/") );
  
  if( $params[1] ) $params = "?" . $params[1]; else $params = "";

  unset($uri[0]);

  return _link( $_SESSION["geo"]["alias"] . "/" . implode("/", $uri) . $params );

}

function idsBuildJoin($ids="",$id=0){
   if($ids){
     $ids = explode(",", trim($ids, ",") );
     if($id) $ids[] = $id;
     return implode(",", $ids);     
   }else{
     return $id;
   }
}

function iteratingArray($array=[], $type=""){

   if(count($array)){
       foreach ($array as $key => $value) {
          if($type == "int")
          $result[] = (int)$value;
          else
          $result[] = clear($value);
       }
      return $result;
   }
   
   return [];
}

function calcPercent( $amount = 0, $percent = 0 ){
   if($percent) return (($amount / 100) * $percent); else return 0;
}

function generateOrderId(){
   return mt_rand(100000000,999999999);
}

function normalize_files_array($files = array()) {

    $normalized_array = array();

    foreach($files as $index => $file) {

        if (!is_array($file['name'])) {
            $normalized_array[$index][] = $file;
            continue;
        }

        foreach($file['name'] as $idx => $name) {
            $normalized_array[$index][$idx] = [
                'name' => $name,
                'type' => $file['type'][$idx],
                'tmp_name' => $file['tmp_name'][$idx],
                'error' => $file['error'][$idx],
                'size' => $file['size'][$idx]
            ];
        }

    }

    return $normalized_array;

}

function import_load_image($images="", $count=1, $param){
   global $config, $settings;
   
   $Watermark = new Watermark();

   if(!$count) $count = 1;

   $gallery = [];

   if($images){

      $images = explode(",",$images);

      if(count($images)){

          foreach(array_slice($images, 0, $count) AS $out){

                $data = @file_get_contents_curl($out);

                if($data){
                  
                  $uid = uniqid();
                  $name = $uid.".jpg";
                  
                  file_put_contents($config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name, $data);
                  $size = @filesize($config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name);
                    
                    if($size > $param["min_size_image"]){

                     if($param["watermark"]) $Watermark->create( $config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name, $config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name );

                     resize($config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name, $config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name, $settings["ads_images_big_width"], $settings["ads_images_big_height"], 100, $settings["ad_format_photo"]);

                     resize($config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name, $config["basePath"] . "/" . $config["media"]["small_image_ads"] . "/" . $name, $settings["ads_images_small_width"], $settings["ads_images_small_height"], 100, $settings["ad_format_photo"]);

                     $gallery[] = $uid . "." . $settings["ad_format_photo"];

                    }else{
                      @unlink($config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $name);
                    }

                }  
             
          }

      }

   }

   return $gallery;
}

function import_load_filters($params="",$id_cat=0){

  $Filters = new Filters();
  $return = [];

  if($params){

     $getCategoryFilters = $Filters->getCategory( ["id_cat" => $id_cat] );

     $params = explode("|",$params);

     if(count($params) && $getCategoryFilters){
        foreach($params AS $data){
          $result = explode("=",trim($data));
          if($result){

             $getFilter = getOne("select * from uni_ads_filters where ads_filters_name=? and ads_filters_id IN (".implode(",",$getCategoryFilters).")", [ $result[0] ]);

             if($getFilter){

                 if($getFilter["ads_filters_type"] != "input"){

                     $getFilterItem = findOne("uni_ads_filters_items", "ads_filters_items_id_filter=? and ads_filters_items_value=?", [ $getFilter["ads_filters_id"], $result[1] ]);
                     if($getFilterItem) $return[$getFilter["ads_filters_id"]][] = $getFilterItem["ads_filters_items_id"];

                 }else{

                     $getFilterItem = getAll("select * from uni_ads_filters_items where ads_filters_items_id_filter=?", [ $getFilter["ads_filters_id"] ] );

                     if( round($result[1],2) < $getFilterItem[0]["ads_filters_items_value"] ){
                         $return[$getFilter["ads_filters_id"]][] = $getFilterItem[0]["ads_filters_items_value"];
                     }elseif( round($result[1],2) > $getFilterItem[1]["ads_filters_items_value"] ){
                         $return[$getFilter["ads_filters_id"]][] = $getFilterItem[1]["ads_filters_items_value"];
                     }else{
                         $return[$getFilter["ads_filters_id"]][] = round($result[1],2);
                     }

                 }

             }

          }  
        }
     } 

  }
  
  return $return;

}

function videoLink($link){
    if(!empty($link)){

      if(strpos($link, "youtube.com") !== false || strpos($link, "youtu.be") !== false){

        if(strpos($link, "embed") === false){

            if( strpos($link, "?") !== false ){
                parse_str( explode("?", $link)[1] , $param);
                if($param["v"]){
                   return "https://www.youtube.com/embed/".$param["v"];
                }else{
                   return "";
                }
            }else{
                $param = explode("/", trim($link, "/") );
                if($param[3]){
                   return "https://www.youtube.com/embed/".$param[3];
                }else{
                   return "";
                }
            }
      
        }else{
            return $link;
        }

      }elseif(strpos($link, "rutube.ru") !== false){
        
        $variable = explode("?", $link);
        $link_ = end( explode("/", trim($variable[0], "/") ) );

        return "//rutube.ru/play/embed/".$link_;

      }elseif(strpos($link, "vimeo.com") !== false){
        
        $link_ = end( explode("/", trim($link, "/") ) );

        return "https://player.vimeo.com/video/".$link_;

      }

    }
}

function lang(){
   return "";
}

function getRealIp(){

    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
     
    if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
    else $ip = $remote;
     
    return $ip;
  
}

function calcFilesize($filesize)
{

   if($filesize > 1024)
   {
       $filesize = ($filesize/1024);
       if($filesize > 1024)
       {
            $filesize = ($filesize/1024);
           if($filesize > 1024)
           {
               $filesize = ($filesize/1024);
               $filesize = round($filesize, 1);
               return $filesize." Gb";       
           }
           else
           {
               $filesize = round($filesize, 1);
               return $filesize." Mb";   
           }       
       }
       else
       {
           $filesize = round($filesize, 1);
           return $filesize." Kb";   
       }  
   }
   else
   {
       $filesize = round($filesize, 1);
       return $filesize." byte";   
   }
}

function csrf_token(){

   $key = bin2hex(random_bytes(32));

   $_SESSION['csrf_token'][] = $key;

   return $key;

}

function verify_csrf_token(){

   $headers = mb_strtolower( json_encode(apache_request_headers()), "UTF-8" );

   $headers = json_decode($headers, true);

   if( !$headers['x-csrf-token'] || !$_SESSION['csrf_token'] ){
       exit;
   }

   if( !in_array($headers['x-csrf-token'], $_SESSION['csrf_token']) ){
       exit;
   }

}

function base64_to_image($base64_string, $output_file) {

   if($base64_string){
      $ifp = fopen($output_file, "wb");

      $data = explode(',', $base64_string);

      fwrite($ifp, base64_decode($data[1]));
      fclose($ifp);
   }
   
}

function image_to_base64($path){
	$imageSize = getimagesize($path);
	$imageData = base64_encode(file_get_contents($path));
	return "data:{$imageSize['mime']};base64,{$imageData}";
}

function csvSplitChar($handle) {

  $header = fgets($handle);

  $s = preg_replace('/".+"/isU', '*', $header); 
  $a = [',',';','|'];
  $r;
  $i = -1;
  foreach($a as $c) {
    if(($n = sizeof(explode($c, $s))) > $i) {
      $i = $n;
      $r = $c;
    }
  }
  return $r;

}

function csvToUtf8($path) {

  $get = file_get_contents($path);
  $current_encoding = mb_detect_encoding($get, 'UTF-8', TRUE);

  if( !$current_encoding ){

      $get = iconv("windows-1251", "utf-8", $get);
      file_put_contents($path, $get);

  }
  
}

function removeSlash( $text = "" ){

    return str_replace( "\\", "", stripcslashes($text) );

}

function table_insert($filename)
{

  $templine = '';
  $fp = fopen($filename, 'r');
    
  update("SET NAMES 'utf8'");

  if($fp)
  while(!feof($fp)) {
    $line = fgets($fp);
    if (substr($line, 0, 2) != '--' && $line != '') {
      $templine .= $line;
      if (substr(trim($line), -1, 1) == ';') {
        update($templine);
        $templine = '';
      }
    }
  }
     
  fclose($fp);

}

function getTplFiles(){
    global $settings, $config;

    $arrayFiles = [];

    if(!$settings["demo_view"] && !$settings["demo_installment"]){
        $name = scandir($config["basePath"]."/templates/");
        for($i=2; $i<=(sizeof($name)-1); $i++) {                         
            if(is_file($config["basePath"]."/templates/".$name[$i]) && $name[$i] != '.' && pathinfo($name[$i], PATHINFO_EXTENSION) == 'tpl'){                           
              $arrayFiles[$name[$i]] = $name[$i];
            }
        }

        $name = scandir($config["basePath"]."/templates/js/");
        for($i=2; $i<=(sizeof($name)-1); $i++) {                         
            if(is_file($config["basePath"]."/templates/js/".$name[$i]) && $name[$i] != '.' && pathinfo($name[$i], PATHINFO_EXTENSION) == 'js'){                           
              $arrayFiles[$name[$i]] = $name[$i];
            }
        }
    }

    $name = scandir($config["basePath"]."/templates/css/");
    for($i=2; $i<=(sizeof($name)-1); $i++) {                         
        if(is_file($config["basePath"]."/templates/css/".$name[$i]) && $name[$i] != '.' && pathinfo($name[$i], PATHINFO_EXTENSION) == 'css'){                           
          $arrayFiles[$name[$i]] = $name[$i];
        }
    }

    return $arrayFiles;

}

function debug($message=null){
    global $config;
    
    if (is_array($message)) {
        $content .= var_export($message, true).PHP_EOL;
    } elseif (is_object($message)) {
        $content .= var_export($message, true).PHP_EOL;
    } else {
        $content .= $message.PHP_EOL;
    }

    if(isset($content)) {
        file_put_contents($config["basePath"].'/debug.log', $content, FILE_APPEND);
    }

}

?>
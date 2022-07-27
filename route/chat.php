<?php
$config = require "./config.php";

$route_name = "chat";
$visible_footer = true;

if( !$_SESSION['profile']['id'] ){ header( "Location: " . _link("auth") ); exit; }

$Main = new Main();
$settings = $Main->settings();

$CategoryBoard = new CategoryBoard(); 
$Main = new Main();
$Ads = new Ads();
$Seo = new Seo();
$Geo = new Geo();
$Profile = new Profile();
$Banners = new Banners();
$ULang = new ULang();

$getCategoryBoard = $CategoryBoard->getCategories("where category_board_visible=1");

$user = $Profile->oneUser(" where clients_id=?" , array( intval($_SESSION['profile']['id']) ) );

if( $id_user && $id_ad ){ 
   $interlocutor = $Profile->oneUser(" where clients_id_hash=?" , array( clear($id_user) ) );
   if( $interlocutor ){ 

       if(findOne("uni_ads", "ads_id=? and (ads_id_user=? or ads_id_user=?)", [intval($id_ad),intval($_SESSION['profile']['id']),intval($interlocutor["clients_id"])])){

           $getUserChat = findOne("uni_chat_users", "chat_users_id_ad=? and chat_users_id_user=? and chat_users_id_interlocutor=?", [ intval($id_ad), intval($_SESSION['profile']['id']), $interlocutor["clients_id"] ]);
           if(!$getUserChat){
               $data["id_hash"] = md5( intval($id_ad) . intval($_SESSION['profile']['id']) );
               insert("INSERT INTO uni_chat_users(chat_users_id_ad,chat_users_id_user,chat_users_id_hash,chat_users_id_interlocutor)VALUES(?,?,?,?)", array( intval($id_ad), intval($_SESSION['profile']['id']), $data["id_hash"], $interlocutor["clients_id"] ));
           }else{
               $data["id_hash"] =  $getUserChat["chat_users_id_hash"];
           }

       }
       
   }
}

if(!$user){ $Main->response(404); }

$data["ratings"] = $Profile->outRating( $user["clients_id"] );
$data["share"] = $Main->share( array( "title" => $static_msg["1"] . " ".$settings["site_name"].". ".$static_msg["2"], "image" => $Profile->userAvatar($user["clients_avatar"]), "url" => _link( "user/".$id_user ) ) );

ob_start();
$Profile->chatUsers( $data["id_hash"] );
$list_chat_users = ob_get_clean();

$data["new_messages"] = $Profile->getMessage();

$data["page_name"] = $Profile->menuPageName($action);
$data["menu_links"] = $Profile->arrayMenu();

echo $Main->tpl("chat.tpl", compact( 'Seo','Geo','Main','visible_footer','Ads','route_name','list_services','data','Profile','languages_content','user','list_chat_users','action','list_complaints','settings','getCategoryBoard','CategoryBoard','Banners','ULang' ) );

?>
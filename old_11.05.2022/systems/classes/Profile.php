<?php
/**
 * UniSite CMS
 *
 * @copyright 	2018 Artur Zhur
 * @link 		https://unisitecms.ru
 * @author 		Artur Zhur
 *
 */

class Profile{

    function oneUser($query = "", $param = array()){

        return getOne("SELECT * FROM uni_clients LEFT JOIN `uni_city` ON `uni_city`.city_id = `uni_clients`.clients_city_id $query ",$param);

    }

    function getMessage(){
        $groupBy = [];
        $getAll = getAll("select * from uni_chat_users where chat_users_id_user=?", array( intval($_SESSION["profile"]["id"]) ));
        if(count($getAll)){
           foreach ($getAll as $key => $value) {

              $get = findOne("uni_clients", "clients_id=?", [$value["chat_users_id_interlocutor"]]);
              if( $get ){
                  $groupBy[ $value["chat_users_id_hash"] ] = $value["chat_users_id_hash"];
              }

           }

           if( count($groupBy) ){
               foreach ($groupBy as $id_hash) {
                  
                  $count += (int)getOne("select count(*) as total from uni_chat_messages where chat_messages_id_hash=? and chat_messages_status=? and chat_messages_id_user!=?", array($id_hash,0,intval($_SESSION['profile']['id'])) )["total"];

               }
           }

        }
        return $count;
    }

    function activation(){
      global $config,$settings;

      $Subscription = new Subscription();

      if(!empty($_GET["activation_hash"])){
         $get = findOne("uni_clients_hash_email","clients_hash_email_hash=?",[clear($_GET['activation_hash'])]);
         if($get){

          $getUser = findOne("uni_clients", "clients_id=?", [$get["clients_hash_email_id_user"]]);

          if(!$getUser["clients_email"]){

	           if($settings["bonus_program"]["email"]["status"] && $settings["bonus_program"]["email"]["price"]){
	               $this->actionBalance(array("id_user"=>$get["clients_hash_email_id_user"],"summa"=>$settings["bonus_program"]["email"]["price"],"title"=>$settings["bonus_program"]["email"]["name"],"id_order"=>$config["key_rand"],"email" => $get["clients_hash_email_email"],"name" => $getUser->clients_name, "note" => $settings["bonus_program"]["email"]["name"]),"+");           	
	           }

          }
          
          update("UPDATE uni_clients SET clients_email=? WHERE clients_id=?", [$get["clients_hash_email_email"],$get["clients_hash_email_id_user"]]);
          $Subscription->add(array("email"=>$get["clients_hash_email_email"],"user_id"=>$get["clients_hash_email_id_user"],"name"=>$getUser["clients_name"],"status" => 1));

          update("delete from uni_clients_hash_email where clients_hash_email_hash=?", [clear($_GET['activation_hash'])]);
           
         }
      }

    }

    function checkAuth(){
      
      if($_SESSION['profile']['id']){

         $get = findOne("uni_clients", "clients_id=?", [$_SESSION['profile']['id']]);

         if($get["clients_status"] == 2 || $get["clients_status"] == 3){
           unset($_COOKIE['rememberme']);  unset($_SESSION['profile']);
         }else{
           $_SESSION["profile"]["data"] = getOne("select clients_balance,clients_id_hash,clients_avatar,clients_name,clients_surname,clients_id,clients_email,clients_phone from uni_clients where clients_id=?", [$_SESSION['profile']['id']]);
         }

      }

    }

    function chatDialog($id_hash = 0){
      global $config, $settings;

      $Ads = new Ads();
      $Profile = new Profile();
      $Main = new Main();
      $ULang = new ULang();

      if($id_hash){

        $getChatUser = getOne("select * from uni_chat_users where chat_users_id_hash=? and chat_users_id_user=?", array($id_hash,intval($_SESSION['profile']['id'])) );
        $getAd = $Ads->get("ads_id=".$getChatUser["chat_users_id_ad"] );
        $getAd["ads_images"] = $Ads->getImages($getAd["ads_images"]);

        if( $id_hash == md5( $getChatUser["chat_users_id_ad"] . $getChatUser["chat_users_id_interlocutor"] ) || $id_hash == md5( $getChatUser["chat_users_id_ad"] . $getChatUser["chat_users_id_user"] ) ){

          update("update uni_chat_messages set chat_messages_status=? where chat_messages_id_hash=? and chat_messages_id_user!=?", array(1,$id_hash,$_SESSION['profile']['id']));

          $getDialog = getAll("select * from uni_chat_messages where chat_messages_id_hash=? order by chat_messages_date asc", array($id_hash) );

          $getLocked = findOne( "uni_chat_locked", "chat_locked_user_id=? and chat_locked_user_id_locked=?", array(intval($_SESSION['profile']['id']),$getChatUser["chat_users_id_interlocutor"]) );

          $getMyLocked = findOne( "uni_chat_locked", "chat_locked_user_id=? and chat_locked_user_id_locked=?", array( $getChatUser["chat_users_id_interlocutor"],intval($_SESSION['profile']['id'])) );

          ob_start();
          require $config["basePath"] . "/templates/include/chat_dialog.php";
          $list_dialog = ob_get_clean();

          return $list_dialog;

        }

      }else{

         $get = getOne("select count(*) as total from uni_chat_users where chat_users_id_user=? group by chat_users_id_hash", array(intval($_SESSION['profile']['id'])) );

         if($get["total"]){
           return '
            <div class="chat-dialog-empty" >
                <i class="las la-comment"></i>
                <p>'.$ULang->t("Выберите чат для общения").'</p>
            </div>
           ';
         }else{
           return '
            <div class="chat-dialog-empty" >
                <i class="las la-comment"></i>
                <p>'.$ULang->t("У вас пока нет диалогов").'</p>
            </div>
           ';
         }


      }      

    }

    function getUserLocked( $user_id=0, $locked_id=0 ){
       return findOne( "uni_chat_locked", "chat_locked_user_id=? and chat_locked_user_id_locked=?", array($user_id,$locked_id) );
    }

    function getCountFavorites($id_ad=0){
       return (int)getOne( "select count(*) as total from uni_favorites where favorites_id_ad=?", array($id_ad) )["total"];
    }

    function sendChat($param = array()){

       global $config;

       $Ads = new Ads();

       $getUserLocked = $this->getUserLocked($param["user_to"],$param["user_from"]);

       if(!$getUserLocked){

           if($param["text"]) $encrypt_text = encrypt($param["text"]);
           
           $getAd = $Ads->get("ads_id=".intval($param["id_ad"]) );

           if(!$param["id_hash"]){
               
               $param["id_hash"] = md5( $param["id_ad"] . $param["user_from"] );

           }else{

               if( $param["id_hash"] != md5( $param["id_ad"] . $param["user_from"] ) && $param["id_hash"] != md5( $param["id_ad"] . $param["user_to"] ) ){
                  exit;
               }

           }

             
           if(!$param["action"]){
           insert("INSERT INTO uni_chat_users(chat_users_id_ad,chat_users_id_user,chat_users_id_hash,chat_users_id_interlocutor)VALUES(?,?,?,?)", array( $param["id_ad"],$param["user_from"], $param["id_hash"], $param["user_to"] ));
           }
           
           insert("INSERT INTO uni_chat_users(chat_users_id_ad,chat_users_id_user,chat_users_id_hash,chat_users_id_interlocutor)VALUES(?,?,?,?)", array($param["id_ad"],$param["user_to"], $param["id_hash"], $param["user_from"]));

           insert("INSERT INTO uni_chat_messages(chat_messages_text,chat_messages_date,chat_messages_id_hash,chat_messages_id_user,chat_messages_action)VALUES(?,?,?,?,?)", array($encrypt_text, date("Y-m-d H:i:s"),$param["id_hash"],$param["user_from"],intval($param["action"])));
  
       }

    }

   function setMode(){
     if($_SESSION['profile']['id']){
        update("UPDATE uni_clients SET clients_datetime_view=NOW() WHERE clients_id=?", array( intval($_SESSION['profile']['id']) ));
     }  
   }

   function chatUsers( $chat_users_id_hash = "" ){
       global $config;

       $Ads = new Ads();
       $ULang = new ULang();

       $listUsers = [];

       $get = getAll("select * from uni_chat_users where chat_users_id_user='".intval($_SESSION['profile']['id'])."' order by chat_users_id desc");

       if( count($get) ){
           foreach ($get as $key => $value) {
              $listUsers[ $value["chat_users_id_hash"] ] = $value;
           }
       }

       if(count($listUsers)){
          foreach ($listUsers as $key => $value) {

             $getAd = $Ads->get("ads_id=".$value["chat_users_id_ad"] );

             if($getAd){

             $getMsg = getOne("select * from uni_chat_messages where chat_messages_id_hash=? order by chat_messages_date desc", array($value["chat_users_id_hash"]));

             $getMsg["chat_messages_text"] = decrypt($getMsg["chat_messages_text"]);

             $getAd["ads_images"] = $Ads->getImages($getAd["ads_images"]);

             if( $chat_users_id_hash == $value["chat_users_id_hash"] ){
                $active_user = 'class="active"';
             }else{
                $active_user = '';
             }

             if($value["chat_users_id_interlocutor"] == $_SESSION['profile']['id']){

                 ?>
                   <div data-id="<?php echo $value["chat_users_id_hash"]; ?>" <?php echo $active_user; ?> >

                      <div class="module-chat-users-img" >
                        <img src="<?php echo Exists($config["media"]["small_image_ads"],$getAd["ads_images"][0],$config["media"]["no_image"]); ?>" >
                      </div>
                      <div class="module-chat-users-info" >
                         <span class="module-chat-users-info-date" ><?php echo datetime_format($getMsg["chat_messages_date"], false); ?></span>
                         <p class="module-chat-users-info-client" ><?php echo custom_substr($this->name($getAd),10, "..."); ?></p>
                         <p class="module-chat-users-info-title" ><?php echo custom_substr($getAd["ads_title"],20, "..."); ?></p>
                         <p class="module-chat-users-info-msg" >
                          <?php 
                          
                          if($getMsg["chat_messages_action"] == 0){

                              if($getMsg["chat_messages_id_user"] == $value["chat_users_id_user"]){ echo 'Вы: '; }
                              echo custom_substr($getMsg["chat_messages_text"], 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 1 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Покупатель добавил объявление в избранное"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 2 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Ваш номер просмотрели"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 3 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Оформление заказа"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 4 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("У вас новый отзыв"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 5 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Вы победили в аукционе"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 6 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Ваша ставка перебита"), 20, "...");

                          }
                          
                          ?>
                         </p>
                         <?php if($getMsg["chat_messages_status"]){ ?>
                         <span class="module-chat-users-info-view" ><svg width="16" height="16" viewBox="0 0 16 16"><path fill="#77c226" fill-rule="evenodd" d="M11.226 3.5l.748.664-6.924 8.164L-.022 8.27l.644-.82 4.328 3.486L11.226 3.5zm4 0l.748.664-6.924 8.164-.776-.643.676-.749L15.226 3.5z"></path></svg></span>
                         <?php }else{

                            echo $this->countChatMessages($value["chat_users_id_hash"]);

                         } ?>
                      </div>

                      <div class="clr" ></div>
                    
                   </div>
                 <?php

             }else{

              $get = findOne("uni_clients", "clients_id=?", [$value["chat_users_id_interlocutor"]]);

              if( $get ){

                 ?>
                   <div data-id="<?php echo $value["chat_users_id_hash"]; ?>" <?php echo $active_user; ?> >

                      <div class="module-chat-users-img" >
                        <img src="<?php echo Exists($config["media"]["small_image_ads"],$getAd["ads_images"][0],$config["media"]["no_image"]); ?>" >
                      </div>
                      <div class="module-chat-users-info" >
                         <span class="module-chat-users-info-date" ><?php echo datetime_format($getMsg["chat_messages_date"], false); ?></span>
                         <p class="module-chat-users-info-client" ><?php echo custom_substr($this->name($get),10, "..."); ?></p>
                         <p class="module-chat-users-info-title" ><?php echo custom_substr($getAd["ads_title"],20, "..."); ?></p>
                         <p class="module-chat-users-info-msg" >
                          <?php 
                          
                          if($getMsg["chat_messages_action"] == 0){

                              if($getMsg["chat_messages_id_user"] == $value["chat_users_id_user"]){ echo 'Вы: '; }
                              echo custom_substr($getMsg["chat_messages_text"], 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 1 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Покупатель добавил объявление в избранное"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 2 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Ваш номер просмотрели"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 3 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Оформление заказа"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 4 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("У вас новый отзыв"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 5 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Вы победили в аукционе"), 20, "...");

                          }elseif($getMsg["chat_messages_action"] == 6 && intval($_SESSION['profile']['id']) != $getMsg["chat_messages_id_user"]){

                              echo custom_substr($ULang->t("Ваша ставка перебита"), 20, "...");

                          }
                          
                          ?>
                         </p>
                         <?php if($getMsg["chat_messages_status"]){ ?>
                         <span class="module-chat-users-info-view" ><svg width="16" height="16" viewBox="0 0 16 16"><path fill="#77c226" fill-rule="evenodd" d="M11.226 3.5l.748.664-6.924 8.164L-.022 8.27l.644-.82 4.328 3.486L11.226 3.5zm4 0l.748.664-6.924 8.164-.776-.643.676-.749L15.226 3.5z"></path></svg></span>
                         <?php }else{

                            echo $this->countChatMessages($value["chat_users_id_hash"]);

                         } ?>
                      </div>

                      <div class="clr" ></div>

                   </div>
                 <?php 
                 }             

             }

             }
 
          }
       }

   }

   function countChatMessages($id_hash = ""){

      $countMessage = getOne("select count(*) as total from uni_chat_messages where chat_messages_id_hash=? and chat_messages_status=? and chat_messages_id_user!=?", array($id_hash,0,intval($_SESSION['profile']['id'])) );
      if($countMessage["total"]){
         return '<span class="module-chat-users-count-msg label-count" >'.$countMessage["total"].'</span>';
      }

   }


   function auth_reg($array=array()){
    global $settings,$config;

    $Admin = new Admin();
    $Subscription = new Subscription();
    $ULang = new ULang();

    if($array["method_auth"]){ $method_auth = $array["method_auth"]; }else{ $method_auth = $settings["authorization_option"]; }
    
    $notifications = '{"messages":"1","answer_comments":"1","services":"1"}';
    
    if($method_auth == 1){

       $getUser = findOne("uni_clients", "clients_phone=?", [$array["phone"]]);

       if(!$getUser){

           $clients_id_hash = md5($array["phone"]);

           if(empty($array["pass"])){ $pass = generatePass(10); }else{ $pass = $array["pass"]; }
           $password_hash =  password_hash($pass.$config["private_hash"], PASSWORD_DEFAULT);

           $insert_id = insert( "INSERT INTO uni_clients(clients_pass,clients_email,clients_phone,clients_name,clients_surname,clients_ip,clients_id_hash,clients_datetime_add,clients_notifications,clients_social_identity,clients_avatar)VALUES(?,?,?,?,?,?,?,?,?,?,?)", array( $password_hash,$array["email"],$array["phone"],$array["name"],$array["surname"],clear($_SERVER["REMOTE_ADDR"]),$clients_id_hash,date("Y-m-d H:i:s"),$notifications,$array["social_link"],$array["avatar"] ) );  

           $_SESSION['profile']['id'] = $insert_id;

           if($settings["bonus_program"]["register"]["status"] && $settings["bonus_program"]["register"]["price"]){
               $this->actionBalance(array("id_user"=>$insert_id,"summa"=>$settings["bonus_program"]["register"]["price"],"title"=>$settings["bonus_program"]["register"]["name"],"id_order"=>$config["key_rand"],"email" => $array["email"],"name" => $array["name"], "note" => $settings["bonus_program"]["register"]["name"]),"+");           	
           }

           notifications("user", array("user_name" => $array["name"], "user_email" => $array["email"], "user_phone" => $array["phone"]));
           $Admin->addNotification("user");

           return array( "status" => true, "data" => findOne("uni_clients", "clients_id=?", [$insert_id]) );           

       }else{


           if($getUser->clients_status == 2 || $getUser->clients_status == 3){
                 
               return array( "status" => false, "status_user" => $getUser->clients_status );

           }else{
           
               $_SESSION['profile']['id'] = $getUser->clients_id;
               return array( "status" => true, "reg" => 1, "data" => $getUser );

           }


       }

    }elseif($method_auth == 2){
       
       $getUser = findOne("uni_clients", "clients_email=? or clients_phone=?", [$array["email"],$array["phone"]]);

       if(!$getUser){
             
             if(!$array["name"]){
                if($array["email"]){
                   $array["name"] = explode("@", $array["email"])[0];
                }else{
                   $array["name"] = $array["phone"];
                }
             }
             
             $clients_id_hash = md5($array["email"] ? $array["email"] : $array["phone"]);

             if(empty($array["pass"])){ $pass = generatePass(10); }else{ $pass = $array["pass"]; }
             $password_hash =  password_hash($pass.$config["private_hash"], PASSWORD_DEFAULT);

             $insert_id = insert( "INSERT INTO uni_clients(clients_pass,clients_email,clients_phone,clients_name,clients_surname,clients_ip,clients_id_hash,clients_status,clients_datetime_add,clients_notifications,clients_social_identity,clients_avatar)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)", array( $password_hash,$array["email"],$array["phone"],$array["name"],$array["surname"],clear($_SERVER["REMOTE_ADDR"]),$clients_id_hash,intval($array["activation"]), date("Y-m-d H:i:s"), $notifications,$array["social_link"],$array["avatar"] ) ); 

             $_SESSION['profile']['id'] = $insert_id;

             if($settings["bonus_program"]["register"]["status"] && $settings["bonus_program"]["register"]["price"]){
                 $this->actionBalance(array("id_user"=>$insert_id,"summa"=>$settings["bonus_program"]["register"]["price"],"title"=>$settings["bonus_program"]["register"]["name"],"id_order"=>$config["key_rand"],"email" => $array["email"],"name" => $array["name"], "note" => $settings["bonus_program"]["register"]["name"]),"+");           	
             }

             notifications("user", array("user_name" => $array["name"], "user_email" => $array["email"], "user_phone" => $array["phone"]));
             $Admin->addNotification("user");   

             $Subscription->add(array("email"=>$array["email"],"user_id"=>$insert_id,"name"=>$array["name"],"status" => 1));

             return array( "status" => true, "data" => findOne("uni_clients", "clients_id=?", [$insert_id]) );

       }else{

             if($getUser->clients_status == 2 || $getUser->clients_status == 3){
                   
                 return array( "status" => false, "status_user" => $getUser->clients_status );

             }else{

                 if($array["network"]){

                     $_SESSION['profile']['id'] = $getUser->clients_id;

                     return array( "status" => true, "reg" => 1, "data" => $getUser );

                 }else{

                     if (password_verify($array["pass"].$config["private_hash"], $getUser->clients_pass)) {  
                        
                          $_SESSION['profile']['id'] = $getUser->clients_id;

                          return array( "status" => true, "reg" => 1, "data" => $getUser );
                        
                     }else{

                          return array( "status" => false, "answer" => $ULang->t("Неверный логин и(или) пароль!") );

                     }

                 }
             
             }           

       }

    }elseif($method_auth == 3){
       
       $getUser = findOne("uni_clients", "clients_email=?", [$array["email"]]);

       if(!$getUser){
             
             if(!$array["name"]){
                $array["name"] = explode("@", $array["email"])[0];
             }
             
             $clients_id_hash = md5($array["email"]);

             if(empty($array["pass"])){ $pass = generatePass(10); }else{ $pass = $array["pass"]; }
             $password_hash =  password_hash($pass.$config["private_hash"], PASSWORD_DEFAULT);

             $insert_id = insert( "INSERT INTO uni_clients(clients_pass,clients_email,clients_phone,clients_name,clients_surname,clients_ip,clients_id_hash,clients_status,clients_datetime_add,clients_notifications,clients_social_identity,clients_avatar)VALUES(?,?,?,?,?,?,?,?,?,?,?,?)", array( $password_hash,$array["email"],$array["phone"],$array["name"],$array["surname"],clear($_SERVER["REMOTE_ADDR"]),$clients_id_hash,intval($array["activation"]), date("Y-m-d H:i:s"), $notifications,$array["social_link"],$array["avatar"] ) );  
             $_SESSION['profile']['id'] = $insert_id;

             if($settings["bonus_program"]["register"]["status"] && $settings["bonus_program"]["register"]["price"]){
                 $this->actionBalance(array("id_user"=>$insert_id,"summa"=>$settings["bonus_program"]["register"]["price"],"title"=>$settings["bonus_program"]["register"]["name"],"id_order"=>$config["key_rand"],"email" => $array["email"],"name" => $array["name"], "note" => $settings["bonus_program"]["register"]["name"]),"+");             
             }

             notifications("user", array("user_name" => $array["name"], "user_email" => $array["email"], "user_phone" => $array["phone"]));
             $Admin->addNotification("user");   

             $Subscription->add(array("email"=>$array["email"],"user_id"=>$insert_id,"name"=>$array["name"],"status" => 1));

             return array( "status" => true, "data" => findOne("uni_clients", "clients_id=?", [$insert_id]) );

       }else{

             if($getUser->clients_status == 2 || $getUser->clients_status == 3){
                   
                 return array( "status" => false, "status_user" => $getUser->clients_status );

             }else{

                 if($array["network"]){

                     $_SESSION['profile']['id'] = $getUser->clients_id;

                     return array( "status" => true, "reg" => 1, "data" => $getUser );

                 }else{

                     if (password_verify($array["pass"].$config["private_hash"], $getUser->clients_pass)) {  
                        
                          $_SESSION['profile']['id'] = $getUser->clients_id;

                          return array( "status" => true, "reg" => 1, "data" => $getUser );
                        
                     }else{

                          return array( "status" => false, "answer" => $ULang->t("Неверный логин и(или) пароль!") );

                     }

                 }
             
             }           

       }

    }


   }


    function actionBalance($array=array(),$action=""){
    global $settings;   

    $Main = new Main();

      if($array["note"]){
        $note = '<p>'.$array["note"].'</p>';
      }

       if(!empty($array["id_user"])){
        if($action == "+"){
          $check = getOne("select * from uni_history_balance where id_order={$array["id_order"]} AND id_user='{$array["id_user"]}'");  
          if(count($check) == 0){

              update("UPDATE uni_clients SET clients_balance=clients_balance+{$array["summa"]} WHERE clients_id='{$array["id_user"]}'"); 

              $this->profileAddHistoryBalance($array,"+");

               $param      = array("{USER_NAME}"=>$array["name"],
                                   "{USER_EMAIL}"=>$array["email"],
                                   "{SUMMA}"=>$Main->price($array["summa"]),
                                   "{NOTE}"=>$note,
                                   "{UNSUBCRIBE}"=>"",
                                   "{EMAIL_TO}"=>$array["email"]); 

               email_notification( array( "variable" => $param, "code" => "BALANCE" ) );

              return true;

          }else{ return false; }   
        }else{
                
                update("UPDATE uni_clients SET clients_balance=clients_balance-{$array["summa"]} WHERE clients_id='{$array["id_user"]}'"); 

                $this->profileAddHistoryBalance($array,"-");

                return true;
            
        } 
       }else{ return false; }  

    }
    
    function profileAddHistoryBalance($array=array(),$action=""){
        insert("INSERT INTO uni_history_balance(id_user,summa,method,name,action,datetime)VALUES(?,?,?,?,?,?)", array($array["id_user"],$array["summa"],$array["method"],$array["title"],$action,date("Y-m-d H:i:s"))); 
    }
    
    function name( $data = array() ){
        
       if( $data["clients_type_person"] == "company" ){

          return $data["clients_name_company"];

       }else{

          if($data["clients_surname"]){
             $clients_surname = mb_strtoupper(mb_substr( $data["clients_surname"] , 0,1, "UTF-8" ) ,"UTF-8") . ".";
          }

          return $data["clients_name"] . ' ' . $clients_surname;

       }

    }    
    
    function userAvatar($img){
      global $config;  
        if(preg_match('/^(http|https|ftp):[\/]{2}/i', urldecode($img))){
            return urldecode($img);       
              }else{
            return Exists($config["media"]["avatar"],$img,$config["media"]["no_avatar"]);
        }        
    }

    function downAvatar($link = "", $id = 0){
       global $config;
       $path = $config["basePath"] . "/" . $config["media"]["avatar"];
       if($link && $id){
         $link = file_get_contents_curl(urldecode($link));
         if($link){
            file_put_contents($path . "/" . md5($id) . ".jpg", $link);
            update("UPDATE uni_clients SET clients_avatar=? WHERE clients_id=?", array( md5($id) . ".jpg" ,$id));
         }
       }
    }
    
   function outRating($id_user=0,$rating=0){

      if($id_user) $rating = $this->ratingBalls($id_user);

      if($rating == 1){
      return '
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
      ';
      }elseif($rating == 2){
      return '
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
      ';
      }elseif($rating == 3){
      return '
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
      ';
      }elseif($rating == 4){
      return '
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star-outline" ></span>
      ';            
      }elseif($rating == 5){
       return '
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
             <span class="ion-ios-star" ></span>
      ';            
      }else{
        return '
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
             <span class="ion-ios-star-outline" ></span>
      ';
      }

   }

  function ratingBalls($id_user){

    $getReviews = getAll("select * from uni_clients_reviews where clients_reviews_status = '1' and clients_reviews_id_user = '".intval($id_user)."'");

      if(count($getReviews)){
         foreach ($getReviews as $key => $value) {

             $array["total_rating"] += $value["clients_reviews_rating"];

             $array["rating_".$value["clients_reviews_rating"]] += $value["clients_reviews_rating"]; 
            
         }
      }

      if($array["total_rating"]){
        $result = ($array["rating_1"]*1+$array["rating_2"]*2+$array["rating_3"]*3+$array["rating_4"]*4+$array["rating_5"]*5)/$array["total_rating"];
      }else{
        $result = 0;
      }

      if($result <= 5){
         return number_format($result, 0, '.', '');
      }else{
         return number_format(5, 0, '.', '');
      }


  }


  function arrayMenu(){
     
     $ULang = new ULang();

     return [
        "balance"=>[ "link"=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/balance" ), "name"=> $ULang->t("Кошелек"), "icon" => '<i class="las la-wallet"></i>' ],
        "ad"=>[ "link"=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/ad" ), "name" => $ULang->t("Мои объявления"), "icon" => '<i class="las la-list-ul"></i>' ],
        "shop"=>[ "link"=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/shop" ), "name" => $ULang->t("Магазин") . '<span class="menu-label-news" >'.$ULang->t("новое").'</span>', "icon" => '<i class="las la-store"></i>' ],
        "orders"=>[ "link"=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/orders" ), "name" => $ULang->t("Мои заказы"), "icon" => '<i class="las la-shopping-basket"></i>' ],
        "chat"=>[ "link"=>_link( "chat" ), "name" => $ULang->t("Мои Сообщения"), "icon" => '<i class="las la-comments"></i>' ],
        "favorites"=>[ "link"=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/favorites" ), "name" => $ULang->t("Избранное"), "icon" => '<i class="lab la-gratipay"></i>' ],
        "settings"=>[ "link"=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/settings" ), "name" => $ULang->t("Настройки"), "icon" => '<i class="las la-sliders-h"></i>' ],
        "subscriptions"=>[ "link"=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/subscriptions" ), "name" => $ULang->t("Мои подписки"), "icon" => '<i class="las la-at"></i>' ],
        "logout"=>[ "link"=>_link( "user/" . $_SESSION["profile"]["data"]["clients_id_hash"] . "/?logout=1" ), "name" => $ULang->t("Выход"), "icon" => '<i class="las la-sign-out-alt"></i>' ],
     ];
     
  }

  function menuPageName( $action = "" ){
      
      $ULang = new ULang();

      if($action == "ad"){
        return $ULang->t("Мои объявления");
      }elseif($action == "orders"){
        return $ULang->t("Заказы");
      }elseif($action == "favorites"){
        return $ULang->t("Избранное");
      }elseif($action == "settings"){
        return $ULang->t("Настройки");
      }elseif($action == "balance"){
        return $ULang->t("Кошелек");
      }elseif($action == "history"){
        return $ULang->t("История платежей");
      }elseif($action == "reviews"){
        return $ULang->t("Отзывы");
      }elseif($action == "subscriptions"){
        return $ULang->t("Мои подписки");
      }elseif($action == "shop"){
        return $ULang->t("Магазин");
      }else{
        return $ULang->t("Мои объявления");
      }

  }

  function headerUserMenu( $name = true ){

    $ULang = new ULang();
    $Main = new Main();
    $menu = $this->arrayMenu();

      if($_SESSION["profile"]["id"]){

         foreach ($menu as $key => $value) {
             
             if($key == "balance"){
                $links .= '<a href="'.$value["link"].'" >'.$value["icon"].' '.$value["name"].' '.$Main->price($_SESSION["profile"]["data"]["clients_balance"]).'</a>';
             }elseif($key == "chat"){
                $links .= '<a href="'.$value["link"].'" >'.$value["icon"].' '.$value["name"].'</a>';
             }else{
                $links .= '<a href="'.$value["link"].'" >'.$value["icon"].' '.$value["name"].'</a>';
             }
             
         }

         if($name){
            $user_name = '<span class="mini-avatar-name" >'.$this->name($_SESSION["profile"]["data"]).'</span>';
         }

         return '
         <div class="toolbar-dropdown dropdown-click">
              <span> <span class="mini-avatar" > <span class="mini-avatar-img" ><img src="'. $this->userAvatar($_SESSION["profile"]["data"]["clients_avatar"]).'" /></span> </span> '.$user_name.'</span>
              <div class="toolbar-dropdown-box toolbar-dropdown-js width-250 right-0 no-padding" >

                   <div class="dropdown-box-list-link" >
                      '.$links.'
                   </div>

              </div>
          </div>
         ';
      }else{
         return '
         <a class="toolbar-link-icon" href="'._link("auth").'" title="'.$ULang->t("Войти в личный кабинет").'" ><i class="las la-sign-in-alt"></i></a>
         ';
      }
  }

  function sessionsFavorites(){
     if($_SESSION['profile']['id']){
        $get = getAll("select * from uni_favorites where favorites_id_user=?", array($_SESSION['profile']['id']));
        if(count($get)){
            foreach ($get as $key => $value) {
               $_SESSION['profile']["favorite"][$value["favorites_id_ad"]] = $value["favorites_id_ad"];
            }
        }
     }
  }

  function cardUser($data = array()){
    global $settings, $config;

    $ULang = new ULang();
    $Shop = new Shop();
    
    $countReviews = (int)getOne("select count(*) as total from uni_clients_reviews where clients_reviews_id_user=?", [$data["ad"]["clients_id"]])["total"];
    $getShop = findOne( "uni_clients_shops", "clients_shops_time_validity > now() and clients_shops_id_user=?", [ $data["ad"]["ads_id_user"] ] );

    if( (strtotime($data["ad"]["clients_datetime_view"]) + 180) > time() ){
      $status = '<span class="online badge-pulse-green-small" data-tippy-placement="top" title="'.$ULang->t("Пользователь online").'"  ></span>';
    }else{
      $status = '<span class="online badge-pulse-red-small" data-tippy-placement="top" title="'.$ULang->t("Был(а) в сети:").' '.datetime_format($data["ad"]["clients_datetime_view"]).'" ></span>';
    }
    
    if( $getShop ){
        $avatar = '<img src="'.Exists($config["media"]["other"], $getShop["clients_shops_logo"], $config["media"]["no_image"]).'">';
        $link = '<div class="board-view-user-label-shop" ><span>'.$ULang->t("Магазин").'</span></div> <a href="'.$Shop->link($getShop["clients_shops_id_hash"]).'"  >'.$getShop["clients_shops_title"].'</a>';
    }else{
        $avatar = '<img src="'.$this->userAvatar($data["ad"]["clients_avatar"]).'">';
        $link = '<a href="'._link( "user/" . $data["ad"]["clients_id_hash"] ).'"  >'.$this->name($data["ad"]).'</a>';
    }

    return '

      <div class="board-view-user-left" >
        '.$status.'
        <div class="board-view-user-avatar" >
        '.$avatar.'
        </div>
      </div>

      <div class="board-view-user-right" >

        '.$link.'

        <span class="board-view-user-date" >'.$ULang->t("На").' '.$settings["site_name"].' '.$ULang->t("с").' '. date("d.m.Y", strtotime($data["ad"]["clients_datetime_add"])).'</span>

         <div class="board-view-stars">
             
           '.$data["ratings"].' <a href="'._link( "user/" . $data["ad"]["clients_id_hash"] . "/reviews" ).'" >('.$countReviews.')</a>
           <div class="clr"></div>   

         </div>

      </div>

      <div class="clr" ></div>

    ';

  }

  function cardUserOrder($data = array()){
    global $settings, $config;

    $ULang = new ULang();
    $Shop = new Shop();

    $getShop = findOne( "uni_clients_shops", "clients_shops_time_validity > now() and clients_shops_id_user=?", [ $data["user"]["clients_id"] ] );

    if( (strtotime($data["user"]["clients_datetime_view"]) + 180) > time() ){
      $status = '<span class="online badge-pulse-green-small" data-tippy-placement="top" title="'.$ULang->t("Пользователь online").'"  ></span>';
    }else{
      $status = '<span class="online badge-pulse-red-small" data-tippy-placement="top" title="'.$ULang->t("Был в сети:").' '.datetime_format($data["user"]["clients_datetime_view"]).'" ></span>';
    }

    if( $getShop ){
        $avatar = '<img src="'.Exists($config["media"]["other"], $getShop["clients_shops_logo"], $config["media"]["no_image"]).'">';
        $link = '<a href="'.$Shop->link($getShop["clients_shops_id_hash"]).'"  >'.$getShop["clients_shops_title"].'</a>';
    }else{
        $avatar = '<img src="'.$this->userAvatar($data["user"]["clients_avatar"]).'">';
        $link = '<a href="'._link( "user/" . $data["user"]["clients_id_hash"] ).'"  >'.$this->name($data["user"]).'</a>';
    }

    return '

      <div class="board-view-user-left" >
        '.$status.'
        <div class="board-view-user-avatar" >
          '.$avatar.'
        </div>
      </div>

      <div class="board-view-user-right" >

        '.$link.'

        <span class="board-view-user-date" >'.$ULang->t("На").' '.$settings["site_name"].' '.$ULang->t("с").' '. date("d.m.Y", strtotime($data["user"]["clients_datetime_add"])).'</span>

         <div class="board-view-stars">
             
           '.$data["ratings"].'
           <div class="clr"></div>   

         </div>

      </div>

      <div class="clr" ></div>

    ';

  }

    function payMethod($payment="", $paramForm = array()){
       global $config;
       $param = paymentParams($payment);

       if(file_exists( $config["basePath"] . "/systems/payment/".$payment."/form.php" )){

         insert("INSERT INTO uni_orders_parameters(orders_parameters_param,orders_parameters_id_uniq,orders_parameters_date)VALUES(?,?,?)", [ json_encode($paramForm), $paramForm["id_order"], date("Y-m-d H:i:s") ]);

         return include $config["basePath"] . "/systems/payment/".$payment."/form.php";

       }

    }

    function payCallBack( $id_uniq = "" ){
      global $settings,$config;

      $static_msg = require $config["basePath"] . "/static/msg.php";
      
      $Main = new Main();
      $Ads = new Ads();

      $getOrderParam = findOne("uni_orders_parameters","orders_parameters_id_uniq=? and orders_parameters_status=?", [$id_uniq,0]);

      if($getOrderParam){

      update("update uni_orders_parameters set orders_parameters_status=? where orders_parameters_id_uniq=?", [ 1 , $id_uniq ]);

      $output_param = json_decode($getOrderParam["orders_parameters_param"], true);
      
      $user = findOne("uni_clients", "clients_id=?", [ intval($output_param["id_user"]) ]);

          if($output_param["action"] == "balance"){

             $this->actionBalance(array("id_user"=>$output_param["id_user"],"summa"=>$output_param["amount"],"title"=>$output_param["title"],"id_order"=>generateOrderId(),"email" => $user["clients_email"],"name" => $user["clients_name"], "note" => $output_param["title"]),"+");

             if($settings["bonus_program"]["balance"]["status"] && $settings["bonus_program"]["balance"]["price"]){
                 $bonus = $this->calcBonus($output_param["amount"]);
                 $this->actionBalance(array("id_user"=>$output_param["id_user"],"summa"=>$bonus,"title"=>$settings["bonus_program"]["balance"]["name"],"id_order"=>generateOrderId(),"email" => $user["clients_email"],"name" => $user["clients_name"], "note" => $settings["bonus_program"]["balance"]["name"]),"+");             
             }

             $Main->addOrder( ["id_order" => $id_uniq,"id_ad"=>0,"price"=>$output_param["amount"],"title"=>$output_param["title"],"id_user"=>$output_param["id_user"],"status_pay"=>1, "user_name" => $user["clients_name"], "id_hash_user" => $user["clients_id_hash"]] );

          }elseif($output_param["action"] == "secure"){

             if($output_param["auction"] == 1){

               insert("INSERT INTO uni_ads_auction(ads_auction_id_ad,ads_auction_price,ads_auction_id_user)VALUES(?,?,?)", [$output_param["id_ad"], $output_param["ad_price"], $output_param["id_user"]]);

               update("update uni_ads set ads_price=? where ads_id=?", [ $output_param["ad_price"] , $output_param["id_ad"] ], true);

             }

             update("update uni_secure set secure_status=? where secure_id_order=?", [ 1 , $output_param["id_order"] ]);

             $Ads->addSecurePayments( ["id_order"=>$output_param["id_order"], "amount"=>$output_param["amount"], "card"=>"", "id_user"=>$output_param["id_user"], "status_pay"=>1, "status"=>0, "amount_percent"=>$output_param["amount"]] );

             $getAd = $Ads->get("ads_id=?", [ $output_param["id_ad"] ]);

             $param      = array("{USER_NAME}"=>$getAd["clients_name"],
                                 "{USER_EMAIL}"=>$getAd["clients_email"],
                                 "{ADS_TITLE}"=>$getAd["ads_title"],
                                 "{ADS_LINK}"=>$Ads->alias($getAd),
                                 "{PROFILE_LINK_ORDER}"=>$output_param["link_success"],
                                 "{UNSUBCRIBE}"=>"",
                                 "{EMAIL_TO}"=>$getAd["clients_email"]); 

             $this->userNotification( [ "mail"=>["params"=>$param, "code"=>"USER_NEW_BUY", "email"=>$getAd["clients_email"]], "sms"=>["phone"=>$getAd["clients_phone"],"text"=>$static_msg["8"]." «{$getAd["ads_title"]}» " . $static_msg["9"] . " " . $config["urlPath"]],"method"=>2 ] );

          }

      }

    }

    function countOnline(){
      return (int)getOne("select count(*) as total from uni_clients where unix_timestamp(clients_datetime_view)+3*60 > unix_timestamp(NOW())")["total"];
    }

    function calcBonus($price){
       global $settings;
       return (($price / 100) * $settings["bonus_program"]["balance"]["price"]);
    }

    function paramNotifications($json=""){

       if($json){
          return json_decode($json, true);
       }else{
          return [];
       }

    }

    function userNotification( $data = [] ){
      
      if($data["method"] == 1){   
         if($data["mail"]["email"]){
              email_notification( array( "variable" => $data["mail"]["params"], "code" => $data["mail"]["code"] ) );
         }
      }elseif($data["method"] == 2){   
         if($data["mail"]["email"]){
              email_notification( array( "variable" => $data["mail"]["params"], "code" => $data["mail"]["code"] ) );
         }elseif($data["sms"]["phone"]){
              sms($data["sms"]["phone"], $data["sms"]["text"] );
         }
      }

    }

    function authLink($name=""){
        global $settings, $config;

        $social_auth_params = json_decode(decrypt($settings["social_auth_params"]), true);

        if($name == "vk"){

            $params = array(
              'client_id'     => $social_auth_params["vk"]["id_app"],
              'redirect_uri'  => $config["urlPath"] . "/systems/ajax/oauth.php?network=vk",
              'scope'         => 'email',
              'response_type' => 'code',
              'state'         => $config["urlPath"] . "/auth",
            );
             
            return 'https://oauth.vk.com/authorize?' . urldecode(http_build_query($params));

        }elseif($name == "fb"){

            $params = array(
              'client_id'     => $social_auth_params["fb"]["id_app"],
              'scope'         => 'email',
              'redirect_uri'  => $config["urlPath"] . "/systems/ajax/oauth.php?network=fb",
              'response_type' => 'code',
            );
             
            return 'https://www.facebook.com/dialog/oauth?' . urldecode(http_build_query($params));

        }
    }

    function socialAuth(){
        global $settings;
        $authorization_social_list = explode(",", $settings["authorization_social"]);

        if( in_array( "tg" , $authorization_social_list ) ){
           ?>
           <script async src="https://telegram.org/js/telegram-widget.js?15" data-telegram-login="tataxon_support_bot" data-size="large" data-auth-url=" https://ttxon.uz/systems/ajax/oauth.php?network=tg" data-request-access="write"></script>                          
           <?php  
        }
        if( in_array( "vk" , $authorization_social_list ) ){
           ?><br>
           <a class="auth-vk" href="<?php echo $this->authLink("vk"); ?>" >
              <i class="lab la-vk"></i> ВКонтакте
           </a>                           
           <?php
        }
        if( in_array( "fb" , $authorization_social_list ) ){
           ?>
           <a class="auth-fb" href="<?php echo $this->authLink("fb"); ?>" >
              <i class="lab la-facebook-square"></i> FaceBook
           </a>                           
           <?php  
        } 

                                                      
                          
    }

    function getMessagesOrder($order_id=0){
        global $config;
        $ULang = new ULang();
        $getMessages = getAll('select * from uni_clients_orders_messages where clients_orders_messages_id_order=? order by clients_orders_messages_date asc', [$order_id]);
        if(count($getMessages)){
            foreach ($getMessages as $key => $value) {

                $attach = '';

                if($_SESSION['profile']['id'] == $value['clients_orders_messages_from_id_user']){
                    $getUser = findOne('uni_clients', 'clients_id=?', [$value['clients_orders_messages_from_id_user']]);
                    $name = '<a href="'._link( "user/" . $getUser["clients_id_hash"] ).'" class="order-messages-item-name" >'.$ULang->t('Вы:').'</a>';
                    $class = 'order-messages-from';
                }else{
                    $getUser = findOne('uni_clients', 'clients_id=?', [$value['clients_orders_messages_to_id_user']]);
                    $name = '<a href="'._link( "user/" . $getUser["clients_id_hash"] ).'" class="order-messages-item-name" >'.$getUser['clients_name'].':</a>';
                    $class = 'order-messages-to';
                }

                if($value['clients_orders_messages_files']){
                    $attach = '<div class="order-message-item-attach lightgallery" >';
                    foreach (explode(',', $value['clients_orders_messages_files']) as $file_name) {
                        if( file_exists( $config["basePath"] . "/" . $config["media"]["users"] . "/" . $file_name ) ){
                            $attach .= '<a href="'.$config["urlPath"] . "/" . $config["media"]["users"] . "/" . $file_name.'"><img class="image-autofocus" src="'.$config["urlPath"] . "/" . $config["media"]["users"] . "/" . $file_name.'" ></a>';
                        }                        
                    }
                    $attach .= '</div>';
                }

                $items .= '
                    <div>
                        <div class="order-messages-item '.$class.'" >
                            <div>
                            '.$name.'
                            <span class="order-messages-item-date" >'.datetime_format($value['clients_orders_messages_date']).'</span>
                            <div class="clr" ></div>
                            </div>
                            <span class="order-messages-item-message" >'.nl2br(decrypt($value['clients_orders_messages_message'])).'</span>
                            '.$attach.'
                        </div>
                    </div>
                ';

            }
            return $items;
        }
    }




         
}


?>
<?php

session_start();
define('unisitecms', true);

$config = require "./../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php" );
$static_msg = require $config["basePath"] . "/static/msg.php";

verify_csrf_token();

(new Profile())->checkAuth();

$Ads = new Ads();
$Profile = new Profile();
$Main = new Main();
$Admin = new Admin();
$ULang = new ULang();

if(isAjax() == true){

   if($_POST["action"] == "load_chat"){
      
      if($_SESSION["profile"]["id"]){

        $id_hash = clear($_POST["id"]);

        echo json_encode( array( "dialog"=> $Profile->chatDialog($id_hash), "count_msg" => $Profile->getMessage() ) );

      }

   }

   if($_POST["action"] == "delete_chat"){
      
      if($_SESSION["profile"]["id"]){

        $id_hash = clear($_POST["id"]);

        update("DELETE FROM uni_chat_users WHERE chat_users_id_hash=? and chat_users_id_user=?", array( $id_hash, intval($_SESSION["profile"]["id"]) ) );

        $get = getOne("select count(*) as total from uni_chat_users where chat_users_id_user=? group by chat_users_id_hash", array(intval($_SESSION['profile']['id'])) );
        
        echo json_encode( array( "dialog"=> $Profile->chatDialog(0), "count_chat_users" => $get["total"] ) );

      }

   }

   if($_POST["action"] == "send_chat"){

    if($_SESSION["profile"]["id"]){

        $id_hash = clear($_POST["id"]);
        $text = clear( urldecode($_POST["text"]) );
        
        $getUser = getOne("select * from uni_chat_users where chat_users_id_hash=? and chat_users_id_user=?", array($id_hash,intval($_SESSION["profile"]["id"])) ); 

        if($text){

           $Profile->sendChat( array( "id_ad" => $getUser["chat_users_id_ad"], "id_hash" => $id_hash, "text" => $text, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $getUser["chat_users_id_interlocutor"] ) );

        }

        echo json_encode( array( "dialog"=> $Profile->chatDialog($id_hash) ) );

    }
        
   }

   if($_POST["action"] == "check_auth_login"){
      
      $error = array();

      $user_login = clear( $_POST["user_login"] );
      $user_pass = $_POST["user_pass"];

      if($settings["authorization_option"] == 1){

          $user_phone = formatPhone( $_POST["user_login"] );

          if( !validatePhone($user_phone) ){
              $error["user_login"] = $ULang->t("Пожалуйста, укажите корректный номер телефона.");
          }

      }elseif($settings["authorization_option"] == 2){
        
          if(!$user_login){
              $error["user_login"] = $ULang->t("Пожалуйста, укажите телефон или электронную почту.");
          }else{
              if( strpos($user_login, "@") !== false ){

                if(validateEmail( $user_login ) == false){
                    $error["user_login"] = $ULang->t("Пожалуйста, укажите корректный e-mail адрес.");
                }else{
                    $user_email = $user_login; 
                }

              }else{

                $user_phone = formatPhone( $_POST["user_login"] );

                if( !validatePhone($user_phone) ){
                    $error["user_login"] = $ULang->t("Пожалуйста, укажите корректный номер телефона.");
                }

              }         
          }

      }elseif($settings["authorization_option"] == 3){
        
          if(validateEmail( $user_login ) == false){
              $error["user_login"] = $ULang->t("Пожалуйста, укажите корректный e-mail адрес.");
          }else{
              $user_email = $user_login; 
          }

      }

      if( mb_strlen($user_pass, "UTF-8") < 6 || mb_strlen($user_pass, "UTF-8") > 25 ){
          $error["user_pass"] = $ULang->t("Пожалуйста, укажите пароль от 6-ти до 25 символов.");
      }

      if($_SESSION["auth_captcha"]["status"]){
          if(!$_POST["captcha"]){
            $error["captcha"] = $ULang->t("Пожалуйста, укажите код с картинки");
          }elseif($_POST["captcha"] != $_SESSION["captcha"]["auth"]){
            $error["captcha"] = $ULang->t("Неверный код с картинки");
          }
      }

      if( count( $error ) == 0 ){
         
         if($user_email){
            $getUser = findOne("uni_clients","clients_email = ?", array( $user_email ));
         }elseif($user_phone){
            $getUser = findOne("uni_clients","clients_phone = ?", array( $user_phone ));
         }
         
         if($getUser){

               $_SESSION["auth_captcha"]["count"]++;
               if($_SESSION["auth_captcha"]["count"] >= 3){ $_SESSION["auth_captcha"]["status"] = true; }

               if($getUser->clients_status == 2 || $getUser->clients_status == 3){
                     
                 echo json_encode( array( "status" => false, "status_user" => $getUser->clients_status, "captcha"=>$_SESSION["auth_captcha"]["status"] ) );

               }else{
               
                 if (password_verify($user_pass.$config["private_hash"], $getUser->clients_pass)) {  
                    
                      $_SESSION['profile']['id'] = $getUser->clients_id;

                      echo json_encode( array( "status"=>true, "reg" => 1, "location" => _link( "user/".$getUser["clients_id_hash"] ) ) );

                      unset($_SESSION["auth_captcha"]);
                    
                 }else{

                      echo json_encode( array( "status" => false, "answer" => array("user_pass"=>$ULang->t("Неверный логин и(или) пароль!")), "captcha"=>$_SESSION["auth_captcha"]["status"] ) );

                 }

               }

         }else{
               
               if( $_SESSION["verify_login"]["time"] ){
                   if( $_SESSION["verify_login"]["time"] < time() ){
                       unset($_SESSION["verify_login"]["count"]);
                       unset($_SESSION["verify_login"]["time"]);
                   }
               }

               if( intval($_SESSION["verify_login"]["count"]) < 5 ){
                   
                   $_SESSION["verify_login"][$user_login]["code"] = mt_rand(10000,99999);

                   if($user_email){

                     $data = array("{USER_EMAIL}"=>$user_email,
                                   "{CODE}"=>$_SESSION["verify_login"][$user_login]["code"],
                                   "{EMAIL_TO}"=>$user_email
                                   );

                     email_notification( array( "variable" => $data, "code" => "SEND_EMAIL_CODE" ) );

                   }elseif($user_phone){

                     sms($user_phone, $settings["sms_prefix_confirmation_code"] . $_SESSION["verify_login"][$user_login]["code"] );

                   }
                   
                   echo json_encode( array( "status"=>true, "reg" => 0 ) );
                   
                   $_SESSION["verify_login"]["count"]++;
                   
               }else{
                   
                   if(!$_SESSION["verify_login"]["time"]) $_SESSION["verify_login"]["time"] = time() + 300;

                   echo json_encode( array( "status"=>false, "answer" => array( "user_pass" => $ULang->t("Достигнут лимит отправки сообщений. Попробуйте чуть позже") ) ) );

               }

               
         }

      }else{

         echo json_encode( array( "status" => false, "answer" => $error ) );

      }

   }

   if($_POST["action"] == "verify_login"){

      $user_login = clear( $_POST["user_login"] );
      $code_login = (int)$_POST["user_code_login"];

      if($code_login){

         if($_SESSION["verify_login"][$user_login]["code"] && $_SESSION["verify_login"][$user_login]["code"] == $code_login){
           
             echo json_encode( array( "status"=>true ) );

         }else{
             echo json_encode( array( "status"=>false, "answer" => $ULang->t("Неверный код") ) );
         }

      }else{

         echo json_encode( array( "status"=>false, "answer" => $ULang->t("Пожалуйста, укажите код из сообщения") ) );

      }

      
   }

   if($_POST["action"] == "reg_login_finish"){

      $user_login = clear( $_POST["user_login"] );
      $user_name = clear( $_POST["user_name"] );
      $user_code_login = (int)$_POST["user_code_login"];
      $user_pass = clear( $_POST["user_pass"] );

      if($settings["authorization_option"] == 1){

          $user_phone = formatPhone( $_POST["user_login"] );

          if( !validatePhone($user_phone) ){
              $error["user_login"] = $ULang->t("Пожалуйста, укажите корректный номер телефона.");
          }

      }elseif($settings["authorization_option"] == 2){
        
          if(!$user_login){
              $error["user_login"] = $ULang->t("Пожалуйста, укажите телефон или электронную почту.");
          }else{
              if( strpos($user_login, "@") !== false ){

                if(validateEmail( $user_login ) == false){
                    $error["user_login"] = $ULang->t("Пожалуйста, укажите корректный e-mail адрес.");
                }else{
                    $user_email = $user_login; 
                }

              }else{

                $user_phone = formatPhone( $_POST["user_login"] );

                if( !validatePhone($user_phone) ){
                    $error["user_login"] = $ULang->t("Пожалуйста, укажите корректный номер телефона.");
                }

              }         
          }

      }elseif($settings["authorization_option"] == 3){
        
          if(validateEmail( $user_login ) == false){
              $error["user_login"] = $ULang->t("Пожалуйста, укажите корректный e-mail адрес.");
          }else{
              $user_email = $user_login; 
          }

      }

      if(!$user_code_login){
         $error[] = $ULang->t("Пожалуйста, укажите код из сообщения");
      }

      if( mb_strlen($user_pass, "UTF-8") < 6 || mb_strlen($user_pass, "UTF-8") > 25 ){
         $error[] = $ULang->t("Пожалуйста, укажите пароль от 6-ти до 25 символов.");
      }

      if(!$user_name){
         $error[] = $ULang->t("Пожалуйста, укажите Ваше имя");
      }

      if( count($error) == 0 ){

         if($_SESSION["verify_login"][$user_login]["code"] && $_SESSION["verify_login"][$user_login]["code"] == $user_code_login){
           
             $result = $Profile->auth_reg( array( "email"=>$user_email,"phone"=>$user_phone,"name"=>$user_name, "activation" => 1, "pass" => $user_pass ) );

             echo json_encode( array( "status"=>$result["status"],"answer" => $result["answer"], "reg" => 1, "location" => _link( "user/".$result["data"]["clients_id_hash"] ) ) );

             unset($_SESSION["verify_login"]);

         }else{
             echo json_encode( array( "status"=>false, "answer" => $ULang->t("Неверный проверочный код") ) );
         }

      }else{

         echo json_encode( array( "status"=>false, "answer" => implode("<br>", $error) ) );

      }

      
   }

   if($_POST["action"] == "forgot"){

      $error = array();

      $user_login = clear( $_POST["login"] );
           
      if(!$user_login){
          $error[] = $ULang->t("Пожалуйста, укажите телефон или электронную почту.");
      }else{
          if( strpos($user_login, "@") !== false ){

            if(validateEmail( $user_login ) == false){
                $error[] = $ULang->t("Пожалуйста, укажите корректный e-mail адрес.");
            }else{
                $user_email = $user_login; 
            }

          }else{

            $user_phone = formatPhone( $_POST["login"] );

            if(!$user_phone){
               $error[] = $ULang->t("Пожалуйста, укажите корректный номер телефона.");
            }

          }         
      }

      if ( count($error) == 0 ) {
         
         if($user_email){
           $getUser = findOne("uni_clients","clients_email = ?", array($user_email));
         }elseif($user_phone){
           $getUser = findOne("uni_clients","clients_phone = ?", array($user_phone));
         }
           
           if ($getUser) { 

               $pass =  generatePass(10);
               $password_hash =  password_hash($pass.$config["private_hash"], PASSWORD_DEFAULT);

               update("UPDATE uni_clients SET clients_pass=? WHERE clients_id=?", [$password_hash,$getUser->clients_id]);

               if($user_email){

                 $data = array("{USER_NAME}"=>$getUser->clients_name,
                               "{USER_EMAIL}"=>$getUser->clients_email,
                               "{USER_PASS}"=>$pass,
                               "{UNSUBSCRIBE}"=>"",
                               "{EMAIL_TO}"=>$getUser->clients_email
                               );

                 email_notification( array( "variable" => $data, "code" => "AUTH_FORGOT" ) );

                 echo json_encode(array("status"=>true, "answer"=>$ULang->t("Пароль успешно выслан на Ваш e-mail.")));

               }elseif($user_phone){

                 sms($user_phone, $settings["sms_prefix_password"] . $pass );

                 echo json_encode(array("status"=>true, "answer"=>$ULang->t("Пароль успешно выслан на Ваш номер телефона.") ));

               }


           }else{
               echo json_encode(array("status"=>false, "answer"=> $ULang->t("Пользователь не найден!") ));
           }

      } else {
          echo json_encode(array("status"=>false, "answer"=>implode("<br>", $error)));
      }


   }


   if($_POST["action"] == "user-avatar"){

      $error = array();
      
      if($_SESSION['profile']['id']){

        $result = $Main->uploadedImage( ["files"=>$_FILES["image"], "path"=>$config["media"]["avatar"], "name"=>$_SESSION['profile']['id']] );

        if($result["error"]){
            echo json_encode( ["error"=>implode("\n", $result["error"])] );
        }else{
            update("UPDATE uni_clients SET clients_avatar=? WHERE clients_id=?", array($result["name"],$_SESSION['profile']['id'])); 
            echo json_encode(array("img"=>Exists($config["media"]["avatar"],$result["name"],$config["media"]["no_avatar"]).'?'.mt_rand(100, 1000)));            
        }

     }

   }


   if($_POST["action"] == "favorite"){

       $id_ad = intval($_POST["id_ad"]);

       if($_SESSION['profile']['id']){

           $findAd = findOne("uni_ads", "ads_id=?", array($id_ad));
           
           if($findAd){

             $find = findOne("uni_favorites", "favorites_id_ad=? and favorites_id_user=?", array($id_ad,$_SESSION['profile']['id']));
             if($find){

                update("DELETE FROM uni_favorites WHERE favorites_id=?", array($find->favorites_id));
                unset($_SESSION['profile']["favorite"][$id_ad]);
                echo json_encode( array( "auth"=>1, "html" => $ULang->t("Добавить в избранное"), "status" => 0 ) );

             }else{
                
                insert("INSERT INTO uni_favorites(favorites_id_ad,favorites_id_user)VALUES('".$id_ad."','".intval($_SESSION['profile']['id'])."')");
                $_SESSION['profile']["favorite"][$id_ad] = $id_ad;
                $Profile->sendChat( array("id_ad" => $id_ad, "action" => 1, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $findAd["ads_id_user"] ) );
                echo json_encode( array( "auth"=>1, "html" => $ULang->t("Удалить из избранного"), "status" => 1 ) );

             }

           }
          
       }else{

           echo json_encode( array( "auth"=>0 ) );

       }

   }


  if($_POST["action"] == "chat_user_locked"){

     $id_hash = clear($_POST["id"]);

     if($_SESSION['profile']['id']){
     
     $getUser = getOne("select * from uni_chat_users where chat_users_id_hash=? and chat_users_id_user=?", array( $id_hash,intval($_SESSION['profile']['id']) ) );
        
     if($getUser){

       $getLocked = findOne("uni_chat_locked", "chat_locked_user_id = ? and chat_locked_user_id_locked = ?", array(intval($_SESSION['profile']['id']),$getUser["chat_users_id_interlocutor"]));
       if($getLocked){
          update("DELETE FROM uni_chat_locked WHERE chat_locked_id=?", array($getLocked->chat_locked_id));
       }else{
          insert("INSERT INTO uni_chat_locked(chat_locked_user_id,chat_locked_user_id_locked)VALUES('".intval($_SESSION['profile']['id'])."','".$getUser["chat_users_id_interlocutor"]."')");
       }

     }

     echo json_encode( array( "dialog"=> $Profile->chatDialog($id_hash) ) );

     }

     
  }

  if($_POST["action"] == "profile_user_locked"){

     $id_user = (int)$_POST["id"];

     if($_SESSION['profile']['id']){
     
       $getLocked = findOne("uni_chat_locked", "chat_locked_user_id = ? and chat_locked_user_id_locked = ?", array(intval($_SESSION['profile']['id']),$id_user));
       if($getLocked){
          update("DELETE FROM uni_chat_locked WHERE chat_locked_id=?", array($getLocked->chat_locked_id));
       }else{
          insert("INSERT INTO uni_chat_locked(chat_locked_user_id,chat_locked_user_id_locked)VALUES('".intval($_SESSION['profile']['id'])."','".$id_user."')");
       }

       echo json_encode( array( "status"=> true ) );

     }

     
  }

  if($_POST["action"] == "balance_payment"){
    
    if(!$_SESSION['profile']['id']){ exit; }

    $error = [];

    $getUser = findOne("uni_clients", "clients_id=?", [$_SESSION['profile']['id']]);

    $amount = round($_POST["amount"],2) ? round($_POST["amount"],2) : round($_POST["change_amount"],2);

    if(!$_POST["payment"]){
       $error[] = $ULang->t("Пожалуйста, выберите способ оплаты");
    }

    if(!$amount){
       $error[] = $ULang->t("Пожалуйста, укажите сумму оплаты");
    }else{

        if( $amount < round($settings["min_deposit_balance"], 2) ){
           $error[] = $ULang->t("Минимальная сумма пополнения") . " " . $Main->price($settings["min_deposit_balance"]);
        }elseif( $amount > round($settings["max_deposit_balance"], 2) ){
           $error[] = $ULang->t("Максимальная сумма пополнения") . " " . $Main->price($settings["max_deposit_balance"]);
        }

    }

    if( count($error) == 0 ){

     $answer = $Profile->payMethod( $_POST["payment"], array( "amount" => $amount, "name" => $getUser["clients_name"], "email" => $getUser["clients_email"], "phone" => $getUser["clients_phone"], "id_order" => $config["key_rand"], "id_user" => $_SESSION['profile']['id'], "action" => "balance", "title" => $static_msg["19"] . " - " . $settings["site_name"] ) );

      echo json_encode( array( "status" => true, "redirect" => $answer ) );

    }else{

      echo json_encode( array( "status" => false, "answer" => implode("\n", $error) ) );

    }

  
  }

  if($_POST["action"] == "user_edit"){
     
     $error = [];
     $status = ["user", "company"];

     if(!$_SESSION["profile"]["id"]){ echo json_encode( ["status"=>false] ); exit; }

         if( $_POST["status"] == "user" ) $_POST["name_company"] = "";

         if( !in_array($_POST["status"], $status) ){
            $error["status"] = $ULang->t("Пожалуйста, укажите статус");
         }else{
            if(!$_POST["name_company"] && $_POST["status"] == "company"){
               $error["name_company"] = $ULang->t("Пожалуйста, укажите название компании");
            }
         }

         if( !$_POST["user_name"] ){
            $error["user_name"] = $ULang->t("Пожалуйста, укажите имя");
         }

         if( !translite($_POST["id_hash"]) ){
            $error["id_hash"] = $ULang->t("Пожалуйста, укажите короткое имя");
         }else{
            if( findOne("uni_clients", "clients_id_hash=? and clients_id!=?", [translite($_POST["id_hash"]),$_SESSION["profile"]["id"]]) ){
               $error["id_hash"] = $ULang->t("Указанное имя уже используется");
            }
         }

         if(count($error) == 0){

            insert("update uni_clients set clients_name=?,clients_surname=?,clients_type_person=?,clients_name_company=?,clients_city_id=?,clients_id_hash=?,clients_comments=?,clients_secure=?,clients_view_phone=? where clients_id=?", [clear($_POST["user_name"]), clear($_POST["user_surname"]), $_POST["status"], clear($_POST["name_company"]), intval($_POST["city_id"]), translite($_POST["id_hash"]),intval($_POST["comments"]),intval($_POST["secure"]),intval($_POST["view_phone"]), $_SESSION["profile"]["id"] ]);

            echo json_encode( ["status"=>true, "answer"=>$ULang->t("Данные успешно сохранены"), "location"=>_link("user/".translite($_POST["id_hash"])."/settings") ] );

         }else{
            echo json_encode( ["status"=>false, "answer"=>$error] );
         }

  }

  if($_POST["action"] == "user_edit_pass"){
     
      if(!$_SESSION["profile"]["id"]){ exit; } 

       $error = [];

       $getUser = findOne("uni_clients", "clients_id=?", [$_SESSION["profile"]["id"]]);

       if( !$_POST["user_current_pass"] ){ $error[] = $ULang->t("Пожалуйста, укажите текущий пароль"); }else{

          if (!password_verify($_POST["user_current_pass"].$config["private_hash"], $getUser["clients_pass"])) {
             $error[] = $ULang->t("Неверный текущий пароль");
          }

       }

       if( mb_strlen($_POST["user_new_pass"], "UTF-8") < 6 || mb_strlen($_POST["user_new_pass"], "UTF-8") > 25 ){
          $error[] = $ULang->t("Пожалуйста, укажите новый пароль от 6-ти до 25 символов.");
       }

       $password_hash =  password_hash($_POST["user_new_pass"].$config["private_hash"], PASSWORD_DEFAULT);

       if(count($error) == 0){

          update("update uni_clients set clients_pass=? where clients_id=?", [ $password_hash, $_SESSION["profile"]["id"] ]);

          echo json_encode( ["status"=>true] );

       }else{
          echo json_encode( ["status"=>false, "answer"=>implode("\n", $error)] );
       }

  }

  if($_POST["action"] == "user_edit_email"){

     $error = [];

     if(!$_SESSION["profile"]["id"]){ exit; }

        if(validateEmail($_POST["user_email"]) == false){
           $error[] = $ULang->t("Пожалуйста, укажите корректный e-mail");
        }else{
           if( findOne("uni_clients", "clients_email=?", [ clear($_POST["user_email"]) ]) ){
              $error[] = $ULang->t("Указанный e-mail уже используется в системе");
           }
        }

        if( count($error) == 0 ){

           $getUser = findOne("uni_clients", "clients_id=?", [$_SESSION["profile"]["id"]]);

           $hash = hash('sha256', $getUser["clients_id"].$config["private_hash"]);

           $getHash = findOne("uni_clients_hash_email","clients_hash_email_email=?",[clear($_POST["user_email"])]);
           if($getHash){
               update("delete from uni_clients_hash_email where clients_hash_email_id=?", [$getHash["clients_hash_email_id"]]);
           }

           insert("INSERT INTO uni_clients_hash_email(clients_hash_email_id_user,clients_hash_email_email,clients_hash_email_hash)VALUES('".$getUser["clients_id"]."','".clear($_POST["user_email"])."','".$hash."')");
           
           $data = array("{USER_EMAIL}"=>$_POST["user_email"],
                         "{ACTIVATION_LINK}"=>_link("user/".$getUser["clients_id_hash"]."/settings")."?activation_hash=$hash",
                         "{EMAIL_TO}"=>$_POST["user_email"]
                         );

           email_notification( array( "variable" => $data, "code" => "ACTIVATION_EMAIL" ) );

           echo json_encode( ["status"=>true, "answer"=>$ULang->t("Мы вам отправили письмо для подтверждения почты") ] );

        }else{
           echo json_encode( ["status"=>false, "answer"=>implode("\n", $error)] );
        }


  }

  if($_POST["action"] == "user_edit_phone_send"){
    
    if(!$_SESSION["profile"]["id"]){ exit; }

    $phone = formatPhone( $_POST["phone"] );

      if( validatePhone($phone) ){

         $_SESSION["verify_sms"][$phone]["code"] = mt_rand(10000,99999);
         sms($phone, $settings["sms_prefix_confirmation_code"] . $_SESSION["verify_sms"][$phone]["code"] );

         echo json_encode( ["status"=>true] );

      }else{
         echo json_encode( ["status"=>false, "answer"=>$ULang->t("Пожалуйста, укажите корректный номер телефона") ] );
      }

  }

  if($_POST["action"] == "user_edit_phone_save"){
    
    if(!$_SESSION["profile"]["id"]){ exit; }

    $phone = formatPhone( $_POST["phone"] );
    $code = $_POST["code"];
    
    if( validatePhone($phone) ){

        if( $settings["confirmation_phone"] ){

            if($_SESSION["verify_sms"][$phone]["code"] == $code && $code){
               update("update uni_clients set clients_phone=? where clients_id=?", [$phone,$_SESSION["profile"]["id"]]);
               echo json_encode( ["status"=>true] );
            }else{
               echo json_encode( ["status"=>false, "answer"=>$ULang->t("Неверный код из смс") ] );
            }

        }else{

           update("update uni_clients set clients_phone=? where clients_id=?", [$phone,$_SESSION["profile"]["id"]]);
           echo json_encode( ["status"=>true] );

        }
        
    }else{
      echo json_encode( ["status"=>false, "answer"=>$ULang->t("Пожалуйста, укажите корректный номер телефона") ] );
    }

  }

  if($_POST["action"] == "user_edit_notifications"){
    
    if(!$_SESSION["profile"]["id"]){ exit; }

    update("update uni_clients set clients_notifications=? where clients_id=?", [json_encode($_POST["notifications"]),$_SESSION["profile"]["id"]]);

  }

  if($_POST["action"] == "user_edit_bank_card"){
    
    if(!$_SESSION["profile"]["id"]){ exit; }

    if($_POST["bank_card"]){
      $bank_card = encrypt($_POST["bank_card"]);
      update("update uni_clients set clients_bank_card=? where clients_id=?", [$bank_card,$_SESSION["profile"]["id"]]);
      echo json_encode( ["status"=>true] );
    }else{
      echo json_encode( ["status"=>false, "answer"=>$ULang->t("Пожалуйста, укажите номер карты") ] );
    }

  }

  if($_POST["action"] == "add_review"){
    
    if(!$_SESSION["profile"]["id"]){ exit; }

    $error = [];

    if( !intval($_POST["rating"]) ){ $error[] = $ULang->t("Пожалуйста, поставьте оценку"); }
    if( !$_POST["text"] ){ $error[] = $ULang->t("Пожалуйста, напишите отзыв"); }

    if( count($error) == 0 ){

        $getSecure = findOne("uni_secure", "secure_id=? and (secure_id_user_buyer=? or secure_id_user_seller=?)", [ intval($_POST["id"]),$_SESSION["profile"]["id"],$_SESSION["profile"]["id"] ]);

        if($getSecure){

           if( $getSecure["secure_id_user_buyer"] == $_SESSION["profile"]["id"] ){

             $getReview = findOne("uni_clients_reviews", "clients_reviews_from_id_user=? and clients_reviews_id_user=?", [ $_SESSION["profile"]["id"], $getSecure["secure_id_user_seller"] ]);

             $clients_reviews_id_user = $getSecure["secure_id_user_seller"];

           }elseif( $getSecure["secure_id_user_seller"] == $_SESSION["profile"]["id"] ){
      
             $getReview = findOne("uni_clients_reviews", "clients_reviews_from_id_user=? and clients_reviews_id_user=?", [ $_SESSION["profile"]["id"], $getSecure["secure_id_user_buyer"] ]);

             $clients_reviews_id_user = $getSecure["secure_id_user_buyer"];

           }

           $getUser = findOne("uni_clients", "clients_id=?", [$clients_reviews_id_user]);

           if(!$getReview && $getUser){

              insert("INSERT INTO uni_clients_reviews(clients_reviews_id_user,clients_reviews_text,clients_reviews_from_id_user,clients_reviews_rating,clients_reviews_id_ad,clients_reviews_date)VALUES(?,?,?,?,?,?)", [$clients_reviews_id_user,clear($_POST["text"]),$_SESSION["profile"]["id"],intval($_POST["rating"]),$getSecure["secure_id_ad"],date("Y-m-d H:i:s")]);

              $Profile->sendChat( array( "id_ad" => $getSecure["secure_id_ad"], "action" => 4, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $clients_reviews_id_user ) );

              echo json_encode( ["status"=>true, "redirect"=>_link("user/".$getUser["clients_id_hash"]."/reviews") ] );

           }

        }

    }else{
       echo json_encode( ["status"=>false, "answer"=> implode("\n", $error) ] );
    }

  }

  if($_POST["action"] == "add_review_user"){
    
    if(!$_SESSION["profile"]["id"]){ exit; }

    $error = [];

    $id_ad = (int)$_POST["id_ad"];
    $status_result = (int)$_POST["status_result"];
    $attach = $_POST["attach"] ? array_slice($_POST["attach"],0, 10) : [];

    if( !intval($_POST["rating"]) ){ $error[] = $ULang->t("Пожалуйста, поставьте оценку"); }
    if( !$_POST["text"] ){ $error[] = $ULang->t("Пожалуйста, напишите отзыв"); }

    if( count($error) == 0 ){

           $getAd = findOne("uni_ads", "ads_id=?", [ $id_ad ]);

           $status_publication_review = findOne("uni_clients_reviews", "clients_reviews_from_id_user=? and clients_reviews_id_user=?", [ intval($_SESSION['profile']['id']), $getAd["ads_id_user"] ]);

           if($getAd && !$status_publication_review){

              insert("INSERT INTO uni_clients_reviews(clients_reviews_id_user,clients_reviews_text,clients_reviews_from_id_user,clients_reviews_rating,clients_reviews_id_ad,clients_reviews_status_result,clients_reviews_files,clients_reviews_date)VALUES(?,?,?,?,?,?,?,?)", [ $getAd["ads_id_user"],clear($_POST["text"]),$_SESSION["profile"]["id"],intval($_POST["rating"]),$id_ad,$status_result,implode(",",$attach), date("Y-m-d H:i:s") ]);

              $Profile->sendChat( array("id_ad" => $id_ad, "action" => 4, "user_from" => intval($_SESSION["profile"]["id"]), "user_to" => $getAd["ads_id_user"] ) );
              
              if( count($attach) ){

                  foreach ($attach as $name) {
                      @copy( $config["basePath"] . "/" . $config["media"]["temp_images"] . "/" . $name , $config["basePath"] . "/" . $config["media"]["users"] . "/" . $name );
                  }
                  
              }

              echo json_encode( ["status"=>true] );

           }

    }else{
       echo json_encode( ["status"=>false, "answer"=> implode("\n", $error) ] );
    }

  }

  if($_POST["action"] == "load_reviews_attach_files"){


    if(count($_FILES) > 0){

      $count_images_add = 10;
      $max_file_size = 10;

      foreach (array_slice($_FILES, 0, $count_images_add) as $key => $value) {

          $path = $config["basePath"] . "/" . $config["media"]["temp_images"];

          $extensions = array('jpeg', 'jpg', 'png');
          $ext = strtolower(pathinfo($value["name"], PATHINFO_EXTENSION));
          
          if($value['size'] > $max_file_size*1024*1024){

            echo false;

          }else{

            if (in_array($ext, $extensions))
            {
                  
                  $uid = uniqid();
                  $name = "attach_" . $uid . ".jpg";
                  
                  if (move_uploaded_file($value["tmp_name"], $path."/".$name))
                  {
                    
                     rotateImage( $path . "/" . $name );
                     resize($path . "/" . $name, $path . "/" . $name, 1024, 0);
                    
                     ?>

                       <div class="id<?php echo $uid; ?> attach-files-preview" ><img class="image-autofocus" src="<?php echo $config["urlPath"] . "/" . $config["media"]["temp_images"] . "/" . $name; ?>" /><input type="hidden" name="attach[<?php echo $uid; ?>]" value="<?php echo $name; ?>" /> <span class="attach-files-delete" ><i class="las la-trash-alt"></i></span> </div>

                     <?php

                  }
                  
            }else{

               echo false;

            }

          }

      }

    }

  
  }

  if($_POST["action"] == "delete_review"){

     if( $_SESSION['cp_auth'][ $config["private_hash"] ] && $_SESSION['cp_control_board'] ){

         $getReview = findOne("uni_clients_reviews", "clients_reviews_id=?", [intval($_POST["id"])]);

         update("delete from uni_clients_reviews where clients_reviews_id=?", [intval($_POST["id"])]);

     }else{

         $getReview = findOne("uni_clients_reviews", "clients_reviews_id=? and clients_reviews_from_id_user=?", [intval($_POST["id"]),intval($_SESSION["profile"]["id"])] );

         update("delete from uni_clients_reviews where clients_reviews_id=? and clients_reviews_from_id_user=?", [intval($_POST["id"]),intval($_SESSION["profile"]["id"])]);

     }

     if($getReview["clients_reviews_files"]){
        $files = explode(",", $getReview["clients_reviews_files"]);
        if($files){
           foreach ($files as $name) {
               @unlink( $config["basePath"] . "/" . $config["media"]["users"] . "/" . $name );
           }
        }
     }

  }

  if($_POST["action"] == "delete_ads_subscriptions"){

     $getUser = findOne("uni_clients", "clients_id=?", [ intval($_SESSION['profile']['id']) ] );

     if(!$getUser) exit;

     update("delete from uni_ads_subscriptions where (ads_subscriptions_id_user=? or ads_subscriptions_email=?) and ads_subscriptions_id=?", [intval($_SESSION["profile"]["id"]),$getUser["clients_email"],intval($_POST["id"])]);

  }

  if($_POST["action"] == "period_ads_subscriptions"){

     $getUser = findOne("uni_clients", "clients_id=?", [ intval($_SESSION['profile']['id']) ] );

     if(!$getUser) exit;

     update("update uni_ads_subscriptions set ads_subscriptions_period=?,ads_subscriptions_date_update=? where (ads_subscriptions_id_user=? or ads_subscriptions_email=?) and ads_subscriptions_id=?", [intval($_POST["period"]),date("Y-m-d H:i:s"),intval($_SESSION["profile"]["id"]),$getUser["clients_email"],intval($_POST["id"])]);

  }

  if($_POST["action"] == "delete_shop_subscriptions"){

     if(!$_SESSION["profile"]["id"]) exit;

     update("delete from uni_clients_subscriptions where clients_subscriptions_id_user_from=? and clients_subscriptions_id=?", [intval($_SESSION["profile"]["id"]),intval($_POST["id"])]);

  }

  if($_POST["action"] == "update_user_chat"){

     if(!$_SESSION["profile"]["id"]) exit;

     $count = $Profile->getMessage();
     
     if( $count ){

      $getAll = getAll("select * from uni_chat_users where chat_users_id_user=?", array( intval($_SESSION["profile"]["id"]) ));
      if(count($getAll)){
         foreach ($getAll as $key => $value) {

            $get = findOne("uni_clients", "clients_id=?", [$value["chat_users_id_interlocutor"]]);
            if( $get ){
                $groupBy[ $value["chat_users_id_hash"] ] = "'" . $value["chat_users_id_hash"] . "'";
            }

         }

         if( count($groupBy) ){
             
             $getMessage = getOne("select * from uni_chat_messages where chat_messages_id_hash IN(".implode(",",$groupBy).") and chat_messages_status=0 and chat_messages_id_user!=".$_SESSION['profile']['id']." order by chat_messages_date desc", [] );
             $getUser = findOne("uni_clients", "clients_id=?", [$getMessage["chat_messages_id_user"]]);
      
         }

      }

      if( $getUser && $getMessage ){
         $message = '
            <strong>'.$getUser["clients_name"].'</strong>
            <p>'.custom_substr(decrypt($getMessage["chat_messages_text"]), 100, "...").'</p>
         ';
      }
      
     }

     echo json_encode( [ "count" => $count , "text" => $message ] );

  }


}

?>
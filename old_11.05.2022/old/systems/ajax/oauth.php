<?php

session_start();
define('unisitecms', true);

$config = require "./../../config.php";
include_once( $config["basePath"] . "/systems/classes/UniSite.php" );

$Ads = new Ads();
$Main = new Main();
$Geo = new Geo();
$Profile = new Profile();

$social_auth_params = json_decode(decrypt($settings["social_auth_params"]), true);
$user_data = [];

if($_GET["network"] == "vk"){

	if (!empty($_GET['code'])) {

		$params = array(
			'client_id'     => $social_auth_params["vk"]["id_app"],
			'client_secret' => $social_auth_params["vk"]["key"],
			'redirect_uri'  => $config["urlPath"] . "/systems/ajax/oauth.php?network=vk",
			'code'          => $_GET['code']
		);
		
		$data = file_get_contents('https://oauth.vk.com/access_token?' . urldecode(http_build_query($params)));
		$data = json_decode($data, true);
		if (!empty($data['access_token'])) {

			$params = array(
				'v'            => '5.52',
				'uids'         => $data['user_id'],
				'access_token' => $data['access_token'],
				'fields'       => 'uid,first_name,last_name,screen_name,photo_big',
			);
	 
			$get = file_get_contents('https://api.vk.com/method/users.get?' . urldecode(http_build_query($params)));
			$result = json_decode($get, true);	

			$info = $result["response"][0];

			$user_data["email"] = $data['email'];
			$user_data["name"] = $info['first_name'];
			$user_data["surname"] = $info['last_name'];
			$user_data["link"] = "https://vk.com/" . $info["screen_name"];
			$user_data["photo"] = $info['photo_big'];

		}else{
			header("Location: " . _link("auth") );
		}

	}

}elseif($_GET["network"] == "fb"){


	if (!empty($_GET['code'])) {

		$params = array(
			'client_id'     => $social_auth_params["fb"]["id_app"],
			'client_secret' => $social_auth_params["fb"]["key"],
			'redirect_uri'  => $config["urlPath"] . "/systems/ajax/oauth.php?network=fb",
			'code'          => $_GET['code']
		);
		
		$data = file_get_contents('https://graph.facebook.com/oauth/access_token?' . urldecode(http_build_query($params)));
		$data = json_decode($data, true);
	 
		if (!empty($data['access_token'])) {
			$params = array(
				'access_token' => $data['access_token'],
				'fields'       => 'id,email,first_name,last_name,picture,link'
			);
	 
			$info = file_get_contents('https://graph.facebook.com/me?' . urldecode(http_build_query($params)));
			$info = json_decode($info, true);

			$user_data["email"] = $info['email'];
			$user_data["name"] = $info['first_name'];
			$user_data["surname"] = $info['last_name'];
			$user_data["link"] = $info["link"];
			$user_data["photo"] = $info['picture']['data']['url'];

		}else{
			header("Location: " . _link("auth") );
		}

	}


}

if($user_data){
	if($user_data["email"]){

	   if( !file_get_contents($user_data["photo"]) ){
            $user_data["photo"] = "";
	   }

	   $result = $Profile->auth_reg( array( "method_auth"=>2,"network"=>true,"email"=>$user_data["email"],"name"=>$user_data["name"],"surname"=>$user_data["surname"], "activation" => 1, "social_link" => $user_data["link"], "avatar" => $user_data["photo"] ) );

	   if($result["status"] == true){
	      header("Location: " . _link("user/" . $result["data"]["clients_id_hash"] ) );
	   }else{
	      if($result["status_user"]){
		   $content = '
		       <h4 class="mt50" ><strong>Ваш аккаунт заблокирован или удален</strong></h4> 
		       <p>Если вы не согласны с нашим решением — напишите в службу поддержки</p> 
		       <br>
		       <a class="btn-custom btn-color-blue" style="display: inline-block;" href="'._link("feedback").'">Написать в поддержку</a>
		   ';
	        include $config["basePath"] . "/templates/oauth.tpl";
	      }
	   }

	}else{
	   $content = '
	       <h4 class="mt50" ><strong>Для регистрации требуется e-mail адрес!</strong></h4> 
	       <p>Для авторизации/регистрации на нашем сайте перейдите на страницу входа и укажите данные</p> 
	       <br>
	       <a class="btn-custom btn-color-blue" style="display: inline-block;" href="'._link("auth").'">Перейти на страницу входа</a>
	   ';
	   include $config["basePath"] . "/templates/oauth.tpl";
	}
}else{
	header("Location: " . _link("auth") );
}
?>
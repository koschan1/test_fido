<?php
/**
 * UniSite CMS
 *
 * @copyright 	2020 Artur Zhur
 * @link 		http://unisitecms.ru
 * @author 		Artur Zhur
 *
 */

class Ads{
   
   function get($query = "", $param = array() ){

        if($query) $query = " where " . $query;
        
        return getOne("SELECT * FROM `uni_ads` 
        INNER JOIN `uni_city` ON `uni_city`.city_id = `uni_ads`.ads_city_id
        INNER JOIN `uni_region` ON `uni_region`.region_id = `uni_ads`.ads_region_id
        INNER JOIN `uni_country` ON `uni_country`.country_id = `uni_ads`.ads_country_id
        INNER JOIN `uni_category_board` ON `uni_category_board`.category_board_id = `uni_ads`.ads_id_cat
        INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_ads`.ads_id_user $query", $param);

   }

   function getCount($query = "", $param = array() ){

      $Cache = new Cache();

      $getCache = $Cache->get( [ "table" => "uni_ads", "key" => $query ] );

      if( $getCache !== false ){

         return (int)$getCache;

      }else{
         
         $result = (int)getOne("SELECT count(*) as total FROM `uni_ads` 
        INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_ads`.ads_id_user where $query", $param)["total"];

         $Cache->set( [ "table" => "uni_ads", "key" => $query, "data" => $result ] );

         return $result;

      }
        
        

   }

   function getAll( $array = array(), $param = array()){
      global $settings,$config;

      $Elastic = new Elastic();

      if(!$array["output"]) $array["output"] = $settings["catalog_out_content"];
      
        if($array["param_search"] && $config["elasticsearch"]["status"]){

            if($array["navigation"]){
               $from = $Elastic->navigationOffset( $array["page"], $array["output"] );
            }else{
               $from = 0;
            }

            $results = $Elastic->search( [ "index" => "uni_ads", "type" => "ad", "from" => $from, "size" => $array["output"], "body" => $array["param_search"] ] );

            if($results){

              return array("count"=>intval($results['hits']['total']['value']), "all"=>$Elastic->array_map( $results['hits']['hits'] ));

            }

        }

        if($array["query"]) 
          $array["query"] = " where " . $array["query"] . " " . $array["sort"];
        else
          $array["query"] = $array["sort"];

        $inner = "
        INNER JOIN `uni_city` ON `uni_city`.city_id = `uni_ads`.ads_city_id
        INNER JOIN `uni_region` ON `uni_region`.region_id = `uni_ads`.ads_region_id
        INNER JOIN `uni_country` ON `uni_country`.country_id = `uni_ads`.ads_country_id
        INNER JOIN `uni_category_board` ON `uni_category_board`.category_board_id = `uni_ads`.ads_id_cat
        INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_ads`.ads_id_user
        ";

         $getOne = getOne("select count(*) as total from uni_ads $inner {$array["query"]}",$param);

         if($array["navigation"]){ 
            $getAll = getAll("select * from uni_ads $inner {$array["query"]} ".navigation_offset( array( "count"=>$getOne["total"], "output"=>$array["output"], "page"=>$array["page"] ) ),$param);
         }else{
            $getAll = getAll("select * from uni_ads $inner {$array["query"]} ",$param);
         }

         return array("count"=>$getOne["total"], "all"=>$getAll);

   }

   function getImages($json = ""){
       if($json && $json != "[]"){
          return json_decode(urldecode($json), true);
       }else{
          return array();
       }
   }


   function outSorting(){
     global $config;

     $ULang = new ULang();

     $explode_request = explode("?", trim($_SERVER['REQUEST_URI'], "/") );

     parse_str( $explode_request[1] , $query_params);

     unset($query_params["filter"]["sort"]);

     $params = http_build_query($query_params, 'flags_');

     if( $params ){
        $link = $config["urlPath"] . "/" . $explode_request[0] . "?" . $params . "&";
     }else{
        $link = $config["urlPath"] . "/" . $explode_request[0] .  "?";
     }

     if($_GET["filter"]["sort"] == "default"){
        $title = $ULang->t("По умолчанию");
     }elseif($_GET["filter"]["sort"] == "news"){
        $title = $ULang->t("По новизне");
     }elseif($_GET["filter"]["sort"] == "price"){
        $title = $ULang->t("По стоимости");
     }else{
        $title = $ULang->t("По умолчанию");
     }

        return '
             <div class="uni-dropdown uni-dropdown-align" >
                <span class="uni-dropdown-name" > <span>'.$title.'</span> <i class="las la-angle-down"></i> </span>
                <div class="uni-dropdown-content" >
                   <a href="'.$link.'filter[sort]=default" >'.$ULang->t("По умолчанию").'</a>
                   <a href="'.$link.'filter[sort]=news" >'.$ULang->t("По новизне").'</a>
                   <a href="'.$link.'filter[sort]=price" >'.$ULang->t("По стоимости").'</a>
                </div>
             </div>        
        ';
        
   }

   function viewAds($id = 0){
      if(detectRobots($_SERVER['HTTP_USER_AGENT']) == false){
        if($id){    
            if(!isset($_SESSION["view-ads"][$id])){ 
              insert("INSERT INTO uni_ads_views(ads_views_id_ad,ads_views_date)VALUES(?,?)", array($id,date("Y-m-d H:i:s"))); 
              $_SESSION["view-ads"][$id] = 1;
            }  
        }
      }   
   }

   function getCountView($id = 0, $date = ""){
      $date = $date ? "and date(ads_views_date) = '$date'" : "";
      return (int)getOne("select count(*) as total from uni_ads_views where ads_views_id_ad=? $date", [$id])["total"];
   }

   function getDisplayView($id = 0, $date = ""){
      $date = $date ? "and date(ads_views_display_date) = '$date'" : "";
      return (int)getOne("select count(*) as total from uni_ads_views_display where ads_views_display_id_ad=? $date", [$id])["total"];    
   }

   function alias($array=array()){   
      return _link($array["city_alias"]."/".$array["category_board_alias"]."/".$array["ads_alias"]."-".$array["ads_id"]);
   }  

   function statusCount($status){
    
    if($status == 1){
      return $this->getCount( "ads_status='0' and clients_status='1'" );
    }elseif($status == 2){
      return $this->getCount( "ads_period_publication > now() and ads_status='1' and clients_status='1'" ); 
    }elseif($status == 3){
      return $this->getCount( "(ads_status = '3' or clients_status='2') and clients_status!='3' and ads_status!='8'" );
    }elseif($status == 4){
      return $this->getCount( "ads_period_publication < now() and ads_status='1' and clients_status='1'" );
    }elseif($status == 5){
      return $this->getCount( "ads_status = '4' and clients_status='1'" );
    }elseif($status == 6){
      return $this->getCount( "ads_status = '5' and clients_status='1'" );
    }elseif($status == 7){
      return $this->getCount( "ads_status = '6' and clients_status='1'" );
    }elseif($status == 8){
      return $this->getCount( "ads_status = '7' and clients_status='1'" ); 
    }elseif($status == 9){
      return $this->getCount( "(ads_images='' or ads_images='null' or ads_images='[]') and clients_status!='3' and ads_status!='8'" ); 
    }elseif($status == 11){
      return $this->getCount( "ads_status='8'" ); 
    }

        
   }
   
  function validationAdForm($array = [], $extra = []){
    global $settings;

        $Filters = new Filters();
        $ULang = new Ulang();

        $error = array();

        if(!intval($array["c_id"])){ $error["c_id"] = $ULang->t("Пожалуйста, выберите категорию"); }else{
           if(!isset($extra["categories"]["category_board_id"][$array["c_id"]]) || isset($extra["categories"]["category_board_id_parent"][$array["c_id"]])){
              $error["c_id"] = $ULang->t("Пожалуйста, выберите категорию");
           }
        }
        
        if( !$extra["categories"]["category_board_id"][$array["c_id"]]["category_board_auto_title"] ){
            if(empty($array["title"])){ $error["title"] = $ULang->t("Пожалуйста, укажите заголовок объявления"); }
        }
        
        if( $settings["ad_create_always_image"] ){
            if(count($_POST["gallery"]) == 0){
              $error["gallery"] = $ULang->t("Загрузите хотя бы одну фотографию");
            }
        }

        if(empty($array["text"])){ $error["text"] = $ULang->t("Пожалуйста, укажите описание объявления"); }

        if(count($array["always"])>0){
          foreach($array["always"] AS $alw_id=>$alw_name){
             if(empty($array["filter"][$alw_id]) || $array["filter"][$alw_id][0] == ""){
                $error["filter".$alw_id] = $ULang->t("Обязательно для заполнения");
             }else{
                $value = $Filters->getInputValue($alw_id);
                if($value){
                   if( $array["filter"][$alw_id][0] < $value["min"] || $array["filter"][$alw_id][0] > $value["max"] ){
                      $error["filter".$alw_id] = $ULang->t("Укажите значение от") . " " . $value["min"] . " " . $ULang->t("до") . " " . $value["max"];
                   }
                }
             }
          }
        }

        if(!$settings["city_id"]){
          if(empty($array["city_id"])){ $error["city_id"] = $ULang->t("Пожалуйста, укажите город"); }else{
            $getCity = findOne("uni_city","city_id=?", array(intval($array["city_id"])));
            if(count($getCity) == 0){
              $error["city_id"] = $ULang->t("Пожалуйста, укажите город");
            }
          }
        }

        if( $extra["categories"]["category_board_id"][$array["c_id"]]["category_board_variant_price"] == 1 ){
            if( !$_POST["price"] ){
                 $error["price"] = $ULang->t("Пожалуйста, укажите зарплату");
            }
        }
        
        if( $array["action"] == "ad-create" ){

            if( $settings["ad_create_phone"] ){
                if( $_SESSION["profile"]["id"] ){
                    if( !$_SESSION["profile"]["data"]["clients_phone"] ){
                         if( !$_SESSION["create-verify-phone"]["phone"] ){
                              $error["phone"] = $ULang->t("Пожалуйста, подтвердите номер телефона");
                         }
                    }
                }else{

                }
            }
        
        }

        if(count($error) == 0){
          return array();
        }else{
          return $error;
        }

  }

  function mapAdAddress($lat = 0, $lon = 0){
    global $settings;

    if(!$lat) $lat = $settings["country_lat"];
    if(!$lon) $lon = $settings["country_lng"];

     if($settings["map_vendor"] == "yandex"){

      ?>
      <script type="text/javascript">
      var myMap;
      var search_result = [];

      ymaps.ready(function () {

          myMap = new ymaps.Map("mapAddress", {
              center: [<?php echo $lat; ?>, <?php echo $lon; ?>],
              zoom: 12,
              behaviors: ['default', 'scrollZoom']
          });
          myMap.controls.add('zoomControl');

      });


      $(document).ready(function(){

       $(document).on('input click','.searchMapAddress', function () {
       
         search_result = [];

              $.getJSON('https://geocode-maps.yandex.ru/1.x/?apikey=<?php echo $settings["map_yandex_key"]; ?>&format=json&geocode='+$(this).val(), function(data) {

                  $(".SearchAddressResults").html('').hide();

                  for(var i = 0; i < data.response.GeoObjectCollection.featureMember.length; i++) {

                     if(data.response.GeoObjectCollection.featureMember[i].GeoObject.description !== undefined && data.response.GeoObjectCollection.featureMember[i].GeoObject.name !== undefined){

                        var name = data.response.GeoObjectCollection.featureMember[i].GeoObject.name + ', ' + data.response.GeoObjectCollection.featureMember[i].GeoObject.description;

                        var address = '<strong>'+data.response.GeoObjectCollection.featureMember[i].GeoObject.name+'</strong>'+data.response.GeoObjectCollection.featureMember[i].GeoObject.description;
                        
                     }else if(data.response.GeoObjectCollection.featureMember[i].GeoObject.description !== undefined){

                        var name = data.response.GeoObjectCollection.featureMember[i].GeoObject.description;
                        var address = '<strong>'+data.response.GeoObjectCollection.featureMember[i].GeoObject.description+'</strong>';

                     }else if(data.response.GeoObjectCollection.featureMember[i].GeoObject.name !== undefined){

                        var name = data.response.GeoObjectCollection.featureMember[i].GeoObject.name;
                        var address = '<strong>'+data.response.GeoObjectCollection.featureMember[i].GeoObject.name+'</strong>';
                      
                     }

                     if(name){
                      $(".SearchAddressResults").append('<div class="item-city" data-country="'+data.response.GeoObjectCollection.featureMember[i].GeoObject.description+'" data-address="'+data.response.GeoObjectCollection.featureMember[i].GeoObject.name+'" data-name="'+name+'" longlat="'+data.response.GeoObjectCollection.featureMember[i].GeoObject.Point.pos+'" >'+address+'</div>').show();
                     }

                  }

              });


       });

       $(document).on('click','.SearchAddressResults .item-city', function () {    
       
              var longlat = $(this).attr("longlat").split(" ");
              var data_name = $(this).attr("data-name");

              var myPlacemark = new ymaps.Placemark([longlat[1], longlat[0]]);

              $(".searchMapAddress").val(data_name);

              $('input[name="map_lat"]').val(longlat[1]);
              $('input[name="map_lon"]').val(longlat[0]);
              
              myMap.geoObjects.remove();
              myMap.geoObjects.add(myPlacemark);

              myMap.events.add('click', function (e) {
                  var coords = e.get('coords');

                  myPlacemark.geometry.setCoordinates(e.get("coords"));

                  ymaps.geocode(coords).then(function(res) {
                      var first = res.geoObjects.get(0);
                      $(".searchMapAddress").val(first.properties.get('text'));
                      $('input[name="map_lat"]').val(coords[0]);
                      $('input[name="map_lon"]').val(coords[1]);                            
                  });
              });

              myMap.setCenter([longlat[1], longlat[0]], 13);
         
         $(".SearchAddressResults").hide();

       }); 

      });
      </script>
      <?php

     }elseif($settings["map_vendor"] == "google"){

       ?>

       <script type="text/javascript">

        var a,lat,long;

        function initialize() {

            var searchBox = document.getElementById('searchMapAddress');

            var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>);

            var myOptions = {
                zoom: 12,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                animation:google.maps.Animation.BOUNCE
            };
            map = new google.maps.Map(document.getElementById("mapAddress"), myOptions);

            var marker = new google.maps.Marker({
                draggable: true,
                position: myLatlng,
                map: map
            });

            google.maps.event.addListener(marker, 'dragend', function (event) {

                $("input[name=map_lat]").val(event.latLng.lat());
                $("input[name=map_lon]").val(event.latLng.lng());

                geocoder.geocode({
                  'latLng': event.latLng
                }, function(results, status) {

                  if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                      $(".searchMapAddress").val(results[0].formatted_address);
                    }
                  }

                });

            });

            var geocoder = new google.maps.Geocoder();

            google.maps.event.addListener(map, 'click', function(event) {

              marker.setPosition(event.latLng);

              $("input[name=map_lat]").val(event.latLng.lat());
              $("input[name=map_lon]").val(event.latLng.lng());

              geocoder.geocode({
                'latLng': event.latLng
              }, function(results, status) {

                if (status == google.maps.GeocoderStatus.OK) {
                  if (results[0]) {
                    $(".searchMapAddress").val(results[0].formatted_address);
                  }
                }

              });

            });

            var defaultBounds = new google.maps.LatLngBounds(new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>));

            var input = document.getElementById('searchMapAddress');
            var autocomplete = new google.maps.places.Autocomplete(searchBox,defaultBounds);
          
            google.maps.event.addListener(autocomplete, 'place_changed', function () {

              var place = autocomplete.getPlace();

              marker.setPosition(place.geometry.location);

              a = place.formatted_address;
              lat = place.geometry.location.lat();
              long = place.geometry.location.lng();
             
              $("input[name=map_lat]").val(lat);
              $("input[name=map_lon]").val(long);

            });
             
        };

        google.maps.event.addDomListener(window, 'load', initialize);

       </script>

       <?php

     }elseif($settings["map_vendor"] == "openstreetmap"){

       ?>

       <script type="text/javascript">
          
          $(document).ready(function () {

          var search_result = [];
          var searchTimeout = null; 
          var listSearch = []; 
          var collationListSearch = []; 

          function shortName(data){

             listName = [];

             if( data.address.city != undefined ){

                  if( listName.indexOf( data.address.city ) == -1 )
                  {  
                      listName.push( data.address.city );
                  }

             }

             if( data.address.road != undefined ){

                  if( listName.indexOf( data.address.road ) == -1 )
                  {  
                      listName.push( data.address.road );
                  }

             }

             if( data.address.house_number != undefined ){

                  if( listName.indexOf( data.address.house_number ) == -1 )
                  {  
                      listName.push( data.address.house_number );
                  }

             }

             if( data.address.state != undefined ){

                  if( listName.indexOf( data.address.state ) == -1 )
                  {  
                      listName.push( data.address.state );
                  }

             }

             if( data.address.suburb != undefined ){

                  if( listName.indexOf( data.address.suburb ) == -1 )
                  {  
                      listName.push( data.address.suburb );
                  }

             }

             if( data.address.country != undefined ){

                  if( listName.indexOf( data.address.country ) == -1 )
                  {  
                      listName.push( data.address.country );
                  }

             }

             return listName.join(', ');

          }

          $(document).on('input click','.searchMapAddress', function () { 

            var searchString = $(this).val();
            var listSearch = [];
            var collationListSearch = [];

            if( !searchString ){ $(".SearchAddressResults").html('').hide(); return false; } 
       
            if (searchTimeout != null) {
              clearTimeout(searchTimeout);
            }

            searchTimeout = setTimeout(function() {
              searchTimeout = null;  

                  $.getJSON('https://nominatim.openstreetmap.org/search?q='+searchString+'&format=json&polygon=1&addressdetails=1', function(data) {

                    $(".SearchAddressResults").html('').hide();

                    for(var i = 0; i < data.length; i++) {

                       var item = '<div class="item-city" data-lonlat="'+data[i].lon+' '+data[i].lat+'" >'+shortName(data[i])+'</div>';

                       if( collationListSearch.indexOf( shortName(data[i]) ) == -1 )
                       {  
                           listSearch.push( item );
                           collationListSearch.push( shortName(data[i]) );
                       }

                    }
                    
                    if( listSearch.join('') ){

                        $(".SearchAddressResults").html(listSearch.join('')).show();

                    }else{

                        $(".SearchAddressResults").html('').hide();

                    }

              });

            }, 300);  

          });
          
          var map = null;
          var marker = null;
          var markersList = [];

          map = L.map('mapAddress').setView([<?php echo $lat; ?>, <?php echo $lon; ?>], 12);

          L.tileLayer('https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token=<?php echo $settings["map_openstreetmap_key"]; ?>', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          function centerLeafletMapOnMarker(map, marker) {
            var latLngs = [ marker.getLatLng() ];
            var markerBounds = L.latLngBounds(latLngs);
            map.fitBounds(markerBounds);
            map.setZoom(14);
          }

          function addMarker(lat, lng){

              if( markersList.length ){

                  $.each(markersList,function(index,value){

                      map.removeLayer(marker);

                  });

              }

              var geojsonFeature = {

                  "type": "Feature",
                  "properties": {},
                  "geometry": {
                          "type": "Point",
                          "coordinates": [lat, lng]
                  }
              }

              L.geoJson(geojsonFeature, {

                  pointToLayer: function(feature, latlng){

                      marker = L.marker( { 'lat': lat, 'lng': lng } , {

                          //title: "",
                          riseOnHover: true,
                          draggable: false,

                      });

                      markersList.push( marker );

                      return marker;
                  }

              }).addTo(map);

              return marker;

          }

          $(document).on('click','.SearchAddressResults .item-city', function () {    
           
                  var lonlat = $(this).data("lonlat").split(" ");

                  $(".searchMapAddress").val( $(this).html() );

                  $('input[name="map_lon"]').val(lonlat[0]);
                  $('input[name="map_lat"]').val(lonlat[1]);

                  getMarker = addMarker(lonlat[1], lonlat[0]);

                  centerLeafletMapOnMarker(map, getMarker);

                  $(".SearchAddressResults").hide();

          });

          map.on('click', function(e) {
              
              addMarker(e.latlng.lat, e.latlng.lng);

              $.getJSON('https://nominatim.openstreetmap.org/reverse?format=json&lat='+e.latlng.lat+'&lon='+e.latlng.lng+'&addressdetails=1', function(data) {
                   $('.searchMapAddress').val( shortName(data) );
              });

          });

          function mapUpdate(){

              map.invalidateSize();
              map._onResize(); 

          }

          $(document).on('click','.create-tab-continue[data-step="5"]', function () { 

            setTimeout( mapUpdate , 500);

          });

          $(window).load(function() { 
            
             setTimeout( mapUpdate , 500);

          });

          });

       </script>

       <?php

     }

  }


  function getMetro($ids = ""){
     if($ids){
        $get = getAll("select * from uni_metro where id IN(".$ids.")");

        if(count($get)) {
           foreach ($get as $key => $value) {
              $getMetroParent = getOne("select * from uni_metro where id=?", array(intval($value["parent_id"]))); 
              $metro[] = array("station"=>$value["name"], "metro_name"=>$getMetroParent["name"], "metro_color"=>$getMetroParent["color"]);
           }
        }
         
        return $metro;     
     }else{
        return array();
     }
  }

  function bonusBanners(){
        $key_banner = 0;
        $bonus = getAll("select * from uni_bonus_program where status=? and img!=?", array(1,"") ); 
        if(count($bonus)){
          foreach ($bonus as $key => $value) {

            if($value["action"] == "register_profile"){
              $bonus_array[$key_banner] = '<div class="d-none d-lg-block" ><a href="'._link("add_ad").'"><img style="width: 100%" src="'.urldecode($value["img"]).'"></a></div>';
              $key_banner++;
            }
            
            if($value["action"] == "balance_profile"){
              $bonus_array[$key_banner] = '<div class="d-none d-lg-block" ><a href="'._link("profile").'?tab=balance"><img style="width: 100%" src="'.urldecode($value["img"]).'"></a></div>';
              $key_banner++;
            }
           
          }
        }

        if(count($bonus_array)) return $bonus_array[mt_rand(0, count($bonus_array) - 1 )];    
  }

  function addMetroVariants($array = array(),$ads_id=0){
    $query = array();

    $Filters = new Filters();
    
    update("DELETE FROM uni_metro_variants WHERE ads_id=?", array($ads_id));

      if( $Filters->getEmpty($array) ){       
          foreach($array AS $key=>$val){
             if($val != "null" && !empty($val)) { $query[] = "('".intval($ads_id)."','".intval($val)."')"; }        
          }
          if(count($query) > 0){

            insert("INSERT INTO uni_metro_variants(ads_id,metro_id)VALUES ".implode(",", $query));

          }
        $query = array();                      
      }

  }

  function addAreaVariants($array = array(),$ads_id=0){
    $query = array();

    $Filters = new Filters();
    
    update("DELETE FROM uni_city_area_variants WHERE city_area_variants_id_ad=?", array($ads_id));

      if( $Filters->getEmpty($array) ){       
          foreach(array_slice($array, 0,10) AS $key=>$val){
             if($val != "null" && !empty($val)) { $query[] = "('".intval($ads_id)."','".intval($val)."')"; }        
          }
          if(count($query) > 0){

            insert("INSERT INTO uni_city_area_variants(city_area_variants_id_ad,city_area_variants_id_area)VALUES ".implode(",", $query));

          }
        $query = array();                      
      }

  }

  function status($status=0){

    $ULang = new ULang();

     if($status == 0){
        return $ULang->t("На модерации");
     }elseif($status == 1){
        return $ULang->t("Активно");
     }elseif($status == 2){
        return $ULang->t("Снято с публикации");
     }elseif($status == 3){
        return $ULang->t("Заблокировано");
     }elseif($status == 4){
        return $ULang->t("Зарезервировано");
     }elseif($status == 5){
        return $ULang->t("Продано");
     }elseif($status == 6){
        return $ULang->t("Ждет оплаты");
     }elseif($status == 7){
        return $ULang->t("Отклонено");
     }elseif($status == 8){
        return $ULang->t("Удалено");
     }

  }

  function arrayStatus(){

    $ULang = new ULang();

    return [0=>$ULang->t("На модерации"), 1=>$ULang->t("Активные"), 2=>$ULang->t("Снятые с публикации"), 3=>$ULang->t("Заблокированные"), 4=>$ULang->t("Зарезервированные"), 5=>$ULang->t("Проданные"), 6=>$ULang->t("Ждут оплаты"), 7=>$ULang->t("Отклоненные"), 8=>$ULang->t("Удаленные")];

  }

  function adminAdStatus($value){

     if($value["ads_status"] == 3 || $value["clients_status"] == 2){

        if($value["clients_status"] == 1){
          ?>

            <button class="btn btn-danger dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Заблокировано
            </button>
            
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="1" href="#">Опубликовать</a>
            </div>

          <?php
        }else{

          ?>
            <div class="btn btn-danger btn-sm">
              Заблокировано
            </div>                                      
          <?php

        }



     }else{

       if($value["ads_status"] == 0){

         ?>
          <button class="btn btn-warning dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            На модерации
          </button>          
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="1" href="#">Опубликовать</a>
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="7" href="#">Отклонить</a>
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="3" href="#">Заблокировать</a>                                            
          </div>                                                 
         <?php

       }elseif($value["ads_status"] == 1){
        
         if(strtotime($value["ads_period_publication"]) > time()){

             ?>

              <button class="btn btn-success dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Активен
              </button>
              
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="2" href="#">Снять с публикации</a>
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="7" href="#">Отклонить</a>
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="3" href="#">Заблокировать</a>
              </div>

             <?php

         }else{
             ?>
              <button class="btn btn-warning dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Истек срок
              </button> 
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="1" href="#">Опубликовать</a>
                  <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="7" href="#">Отклонить</a>
                  <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="3" href="#">Заблокировать</a>                                            
              </div>                                                                             
             <?php
         }

       }elseif($value["ads_status"] == 2){
        
         ?>
          <button class="btn btn-alert dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Снято с публикации
          </button>
          
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="1" href="#">Опубликовать</a>
          <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="7" href="#">Отклонить</a>
          <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="3" href="#">Заблокировать</a>
          </div>

         <?php

       }elseif($value["ads_status"] == 4){
        
         ?>
          <div class="btn btn-warning btn-sm">
            Зарезервировано
          </div>                                       
         <?php

       }elseif($value["ads_status"] == 5){
        
         ?>
          <div class="btn btn-info btn-sm">
            Продано
          </div>                                       
         <?php

       }elseif($value["ads_status"] == 6){
        
         ?>
          <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Ждет оплаты
          </button>          
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="1" href="#">Опубликовать</a>
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="7" href="#">Отклонить</a>
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="3" href="#">Заблокировать</a>                                            
          </div>                                                 
         <?php

       }elseif($value["ads_status"] == 7){
        
         ?>
          <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Отклонено
          </button>           
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="1" href="#">Опубликовать</a>
              <a class="dropdown-item change-status-ads" data-id="<?php echo $value["ads_id"]; ?>" data-status="3" href="#">Заблокировать</a>                                            
          </div>                                                
         <?php

       }elseif($value["ads_status"] == 8){
        
         ?>
          <div class="btn btn-dark btn-sm">
            Удалено
          </div>                                                 
         <?php

       }

     }

  }

  function adActionButton($data=[]){

    $ULang = new ULang();

    if( $data["ad"]["ads_status"] == 3 ){

       ?>

        <span class="btn-custom btn-color-danger mb5 open-modal" data-id="<?php echo $data["ad"]["ads_id"]; ?>" data-id-modal="modal-delete-ads" >
          <span><?php echo $ULang->t("Удалить объявление"); ?></span>
        </span>

       <?php

    }elseif( $data["ad"]["ads_status"] == 1 ){

          if( strtotime($data["ad"]["ads_period_publication"]) < time() ){

              ?>
              <div class="btn-custom btn-color-green mb5 ads-extend schema-color-button" data-id="<?php echo $data["ad"]["ads_id"]; ?>" >
                <span><?php echo $ULang->t("Продлить объявление на месяц"); ?></span>
              </div>

              <a href="<?php echo _link("ad/update/".$data["ad"]["ads_id"]); ?>" class="btn-custom btn-color-light mb5" >
                <span><?php echo $ULang->t("Редактировать"); ?></span>
              </a>            
              <?php

          }else{

              if($data["services_ads"]){
              ?>
                <div class="btn-custom btn-color-green mb5 open-modal schema-color-button" data-id-modal="modal-order-service">
                  <span><?php echo $ULang->t("Продать быстрее"); ?></span> <?php if(findOne("uni_services_ads", "services_ads_new_price!=?", [0])){ echo '<span class="label-sale-mini" >'.$ULang->t("акция").'!</span>'; } ?>
                </div> 
              <?php 
              } 
              ?>

              <div class="btn-custom btn-color-light mb5 open-modal" data-id-modal="modal-remove-publication" >
                <span><?php echo $ULang->t("Снять с публикации"); ?></span>
              </div> 

              <a href="<?php echo _link("ad/update/".$data["ad"]["ads_id"]); ?>" class="btn-custom btn-color-light mb5" >
                <span><?php echo $ULang->t("Редактировать"); ?></span>
              </a>
              <?php

          }          
          
    }elseif( $data["ad"]["ads_status"] == 2 ){
          
          if( !$data["ad"]["ads_auction"] ){
          ?>

          <div class="btn-custom btn-color-light mb5 ads-publication" data-id="<?php echo $data["ad"]["ads_id"]; ?>" >
            <span><?php echo $ULang->t("Опубликовать"); ?></span>
          </div>

          <?php 
          }
          ?>

          <a href="<?php echo _link("ad/update/".$data["ad"]["ads_id"]); ?>" class="btn-custom btn-color-light mb5" >
            <span><?php echo $ULang->t("Редактировать"); ?></span>
          </a>

          <span class="btn-custom btn-color-danger mb5 open-modal" data-id="<?php echo $data["ad"]["ads_id"]; ?>" data-id-modal="modal-delete-ads" >
            <span><?php echo $ULang->t("Удалить объявление"); ?></span>
          </span>

           <?php

    }elseif( $data["ad"]["ads_status"] == 5 ){

           ?>
          <span class="btn-custom btn-color-danger mb5 open-modal" data-id="<?php echo $data["ad"]["ads_id"]; ?>" data-id-modal="modal-delete-ads" >
            <span><?php echo $ULang->t("Удалить объявление"); ?></span>
          </span>
           <?php

    }elseif( $data["ad"]["ads_status"] == 0 || $data["ad"]["ads_status"] == 7 ){

           ?>

          <a href="<?php echo _link("ad/update/".$data["ad"]["ads_id"]); ?>" class="btn-custom btn-color-light mb5" >
            <span><?php echo $ULang->t("Редактировать"); ?></span>
          </a>

          <span class="btn-custom btn-color-danger mb5 open-modal" data-id="<?php echo $data["ad"]["ads_id"]; ?>" data-id-modal="modal-delete-ads" >
            <span><?php echo $ULang->t("Удалить объявление"); ?></span>
          </span>

           <?php

    }


  }

  function adActionFavorite($data=[], $page="", $class=""){
    
    $Main = new Main();

    if( $data["ads_id_user"] == $_SESSION['profile']['id'] ){
        return false;
    }

    if($page == "ad"){

          $return .= '<div '.$Main->modalAuth( ["attr"=>'class="'.$class.' toggle-favorite" data-id="'.$data["ads_id"].'"', "class"=>$class] ).'  >';
          
          if( isset($_SESSION['profile']["favorite"][$data["ads_id"]]) ){
            $return .= '<i class="ion-ios-heart"></i>'; 
          }else{
            $return .= '<i class="ion-ios-heart-outline"></i>';
          }

          $return .= '</div>';
      
    }elseif($page == "catalog"){

          $return .= '<div '.$Main->modalAuth( ["attr"=>'class="'.$class.' toggle-favorite" data-id="'.$data["ads_id"].'"', "class"=>$class] ).' >';
          
          if( isset($_SESSION['profile']["favorite"][$data["ads_id"]]) ){
            $return .= '<i class="ion-ios-heart"></i>'; 
          }else{
            $return .= '<i class="ion-ios-heart-outline"></i>';
          }

          $return .= '</div>';

    }elseif($page == "map"){

          $return .= '<div '.$Main->modalAuth( ["attr"=>'class="'.$class.' toggle-favorite" data-id="'.$data["ads_id"].'"', "class"=>$class] ).' >';
          
          if( isset($_SESSION['profile']["favorite"][$data["ads_id"]]) ){
            $return .= '<i class="ion-ios-heart"></i>'; 
          }else{
            $return .= '<i class="ion-ios-heart-outline"></i>';
          }

          $return .= '</div>';

    }

    return $return;

  }

  function serviceActivation( $param=[] ){

    $getServiceOrder = getAll("select * from uni_services_order where services_order_id_ads IN(".$param["id_ad"].") and services_order_status='0'");

    if(count($getServiceOrder)){

      foreach ($getServiceOrder as $key => $value) {
        $services_order_time_validity = date( "Y-m-d H:i:s", strtotime("+".$value["services_order_count_day"]." days", time()) );
        update("UPDATE uni_services_order SET services_order_time_validity=?,services_order_status=? WHERE services_order_id=?", array($services_order_time_validity,1,$value["services_order_id"]));
      }

    }


  }

  function dateDiff( $time = "" ){

      $day = date_diff(new DateTime(), new DateTime($time))->days;

      $interval = date_diff( date_create() , date_create($time) );

      $day = $interval->format('%a');
      $hour = $interval->format('%h');
      $min = $interval->format('%i');
      $sec = $interval->format('%s');

      return [ "day" => $day, "hour" => $hour, "min" => $min, "sec" => $sec ];

  }

  function auctionTime( $time = "" ){

    $ULang = new ULang();

    $strTime = [];
     
      if( strtotime($time) > time() ){

        $diff = $this->dateDiff( $time );

        if($diff["day"]){

           $strTime[] = $diff["day"] . ' ' . ending( $diff["day"], $ULang->t("день"), $ULang->t("дня"), $ULang->t("дней"));

           if($diff["hour"]){
              $strTime[] = $diff["hour"] . ' ' . ending( $diff["hour"], $ULang->t("час"), $ULang->t("часа"), $ULang->t("часов"));
           }

           if($diff["min"]){
              $strTime[] = $diff["min"] . ' ' . ending( $diff["min"], $ULang->t("минута"), $ULang->t("минуты"), $ULang->t("минут"));
           }

           echo implode(" ", $strTime);

        }else{

           if($diff["hour"]){

             $strTime[] = $diff["hour"] . ' ' . ending( $diff["hour"], $ULang->t("час"), $ULang->t("часа"), $ULang->t("часов"));

             if($diff["min"]){
                $strTime[] = $diff["min"] . ' ' . ending( $diff["min"], $ULang->t("минута"), $ULang->t("минуты"), $ULang->t("минут"));
             }

             echo implode(" ", $strTime); 

           }elseif($diff["min"]){

               $strTime[] = $diff["min"] . ' ' . ending( $diff["min"], $ULang->t("минута"), $ULang->t("минуты"), $ULang->t("минут"));

               if($diff["sec"]){
                  $strTime[] = $diff["sec"] . ' ' . ending( $diff["sec"], $ULang->t("секунда"), $ULang->t("секунды"), $ULang->t("секунд"));
               }

               echo implode(" ", $strTime); 

           }else{

               echo $diff["sec"] . ' ' . ending( $diff["sec"], $ULang->t("секунда"), $ULang->t("секунды"), $ULang->t("секунд"));

           }

        }

      }else{

        echo $ULang->t('Аукцион завершен');

      }

  }

  function auctionTimeCompletion( $time = "", $class = "" ){
      
      if( strtotime($time) > time() ){

        $diff = $this->dateDiff( $time );

        if(!$diff["day"] && !$diff["hour"] && $diff["min"]){
           if( $diff["min"] <= 30 ){
              return 'class="'.$class.'" data-date="'.date("Y/m/d H:i:s", strtotime( $time ) ).'" data-countdown="true"';
           }
        }

      }

  }

  function outServicesAd($data = []){

    $strTime = [];
    $ULang = new ULang();

     if($data["services_order"]){

        foreach ($data["services_order"] as $key => $value) {

            $strTime = [];
            
            if($value["services_order_status"]){

              $diff = $this->dateDiff( $value["services_order_time_validity"] );

              $progress = ((time() - strtotime($value["services_order_time_create"])) / (strtotime($value["services_order_time_validity"]) - strtotime($value["services_order_time_create"]))) * 100;

            }

           ?>

           <div class="board-view-service" >

              <h5><?php echo $ULang->t( $value["services_ads_name"], [ "table"=>"uni_services_ads", "field"=>"services_ads_name" ] ); ?></h5>

              <?php if($value["services_order_status"]){ ?>
              <p> <?php echo $ULang->t("Осталось:"); ?> 
              <?php

              if($diff["day"]){ 

                   $strTime[] = $diff["day"] . ' ' . ending( $diff["day"], $ULang->t("день"), $ULang->t("дня"), $ULang->t("дней"));

                   if($diff["hour"]){
                      $strTime[] = $diff["hour"] . ' ' . ending( $diff["hour"], $ULang->t("час"), $ULang->t("часа"), $ULang->t("часов"));
                   }

                   echo implode(" ", $strTime);

              }else{

                 if($diff["hour"]){

                     $strTime[] = $diff["hour"] . ' ' . ending( $diff["hour"], $ULang->t("час"), $ULang->t("часа"), $ULang->t("часов"));

                     if($diff["min"]){
                        $strTime[] = $diff["min"] . ' ' . ending( $diff["min"], $ULang->t("минута"), $ULang->t("минуты"), $ULang->t("минут"));
                     }

                     echo implode(" ", $strTime);  

                 }else{

                     echo $diff["min"] . ' ' . ending( $diff["min"], $ULang->t("минута"), $ULang->t("минуты"), $ULang->t("минут"));

                 }

              } 
 
              ?></p>
              <?php }else{ ?>
              <p><?php echo $ULang->t("Идет активация"); ?></p>
              <?php } ?>

              <div class="progress" style="height: 0.4rem!important;" >
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $progress; ?>%" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div> 

           </div>

           <?php
        }

     }

  }

  function getOrderServiceIds( $id ){

     $ids = [];

     $get = getAll( "select services_order_id_service from uni_services_order where services_order_id_ads=? and services_order_time_validity > now()", array($id) );

     if(count($get)){
        foreach ($get as $key => $value) {
           $ids[$value["services_order_id_service"]] = $value["services_order_id_service"];
        }
     }

     return $ids;

  }

  function statusAd( $param = [] ){
    global $config,$settings;
      
      if( $settings["ad_black_list_words"] ){

          $words = explode(",", $settings["ad_black_list_words"]);
          foreach ($words as $key => $value) {
              if ( @strpos($param["text"] . " " . $param["title"], trim($value) ) !== false ){
                  return [ "status" => 7, "message" => "" ];
              }
          }

      }

      if( $settings["ads_publication_auto_moderat"] ){

          if(preg_match('/([A-Za-z0-9_\-]+\.)*[A-Za-z0-9_\-]+@([A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9]\.)+[A-Za-z]{2,4}/u',$param["text"] . " " . $param["title"])){
              return [ "status" => 7, "message" => "Нельзя указывать контактные данные в описании" ];
          }

          if( @strpos($param["text"] . " " . $param["title"], "://") !== false || @strpos($text . " " . $title, "www.") !== false ){
              return [ "status" => 7, "message" => "Нельзя указывать контактные данные в описании" ];
          }
          
          if( !$param["categories"]["category_board_id"][$param["id_cat"]]["category_board_auto_title"] ){
            if( mb_strlen( $param["title"], "UTF-8" ) < 3 ){
                return [ "status" => 7, "message" => "Некорректный заголовок" ];
            }
          }        

      }

      if( $param["categories"]["category_board_id"][$param["id_cat"]]["category_board_status_paid"] ){

        $getCountCatFree = (int)getOne("select count(*) as total from uni_ads where ads_id_cat=? and ads_id_user=?", [ $param["id_cat"], $_SESSION["profile"]["id"] ] )["total"];

        if($getCountCatFree >= $param["categories"]["category_board_id"][$param["id_cat"]]["category_board_count_free"]){
           return [ "status" => 6, "message" => "" ];
        }

      }

      return [ "status" => $settings["ads_publication_moderat"] ? 0 : 1 , "message" => "" ];

  }  

  function changeStatus( $id_ad=0, $status = 0, $action="", $note="" ){
      insert("INSERT INTO uni_ads_change(ads_change_id_ad,ads_change_action,ads_change_status,ads_change_note,ads_change_date)VALUES ('".$id_ad."','".$action."','".$status."','".$note."','".date("Y-m-d H:i:s")."')");
  }

  function adAuctionSidebar( $data = [] ){

    global $settings;

    $Main = new Main();
    $Profile = new Profile();
    $ULang = new ULang();

    if($data["ad"]["ads_auction"] && in_array($data["ad"]["ads_status"], [1,2,4,5])){
      
      ?>
      <div class="box-auction" >
      <?php

      if($data["ad"]["ads_status"] == 1){

       if( strtotime($data["ad"]["ads_auction_duration"]) > time() ){
          ?>

            <p class="auction-title" ><?php echo $ULang->t("До завершения аукциона:"); ?></p>

            <div class="auction-strong" > <span <?php echo $this->auctionTimeCompletion( $data["ad"]["ads_auction_duration"], "pulse-time" ); ?> ><?php echo $this->auctionTime( $data["ad"]["ads_auction_duration"] ); ?></span> </div>

          <?php
       }else{
          ?>

            <p class="auction-title" ><?php echo $ULang->t("До завершения аукциона:"); ?></p>

            <div class="auction-strong" > <span><?php echo $this->auctionTime( $data["ad"]["ads_auction_duration"] ); ?></span> </div>

          <?php
       }
      
      if( $_SESSION["profile"]["id"] ){

         if( strtotime($data["ad"]["ads_auction_duration"]) > time() ){

                if($_SESSION["profile"]["id"] != $data["ad"]["ads_id_user"]){
                ?>

                  <div class="btn-custom btn-color-light mb5 open-modal mt20" data-id-modal="modal-auction" >
                    <span><?php echo $ULang->t("Сделать ставку"); ?></span>
                  </div> 

                  <div class="btn-custom btn-color-light mb5 open-modal" data-id-modal="modal-auction-users" >
                    <span><?php echo $ULang->t("Ставки"); ?> (<?php echo count($data["auction_users"]); ?>)</span>
                  </div>
                  
                  <?php 
                  if($data["ad"]["ads_auction_price_sell"]){ 
                      
                      if( $this->getStatusSecure($data["ad"]) ){
                      ?>
                        <a class="btn-custom btn-color-danger mb15"  href="<?php echo _link("buy/".$data["ad"]["ads_id"]); ?>" >
                          <span><?php echo $ULang->t("Купить сейчас за"); ?> <?php echo $Main->price($data["ad"]["ads_auction_price_sell"]); ?></span>
                        </a>
                      <?php
                      }else{
                      ?>
                        <button class="btn-custom btn-color-danger mb15 open-modal width100" data-id-modal="modal-confirm-buy" >
                          <span><?php echo $ULang->t("Купить сейчас за"); ?> <?php echo $Main->price($data["ad"]["ads_auction_price_sell"]); ?></span>
                        </button>
                      <?php                        
                      }

                  } 
                  ?>

                <?php 
                }else{ 
                ?>

                  <div class="btn-custom btn-color-light mb5 open-modal mt20" data-id-modal="modal-auction-users" >
                    <span><?php echo $ULang->t("Ставки"); ?> (<?php echo count($data["auction_users"]); ?>)</span>
                  </div>

                <?php 
                }

         }else{
           ?>

              <div class="btn-custom btn-color-light mb5 open-modal mt20" data-id-modal="modal-auction-users" >
                <span><?php echo $ULang->t("Ставки"); ?> (<?php echo count($data["auction_users"]); ?>)</span>
              </div>

           <?php
         }

      }else{

         ?>
         <p class="mt15 ads-status-info" ><?php echo $ULang->t("Аторизуйтесь на сайте, чтобы сделать ставку."); ?></p>
         <?php

      }

     ?>
     <hr>
     <?php

    }elseif($_SESSION["profile"]["id"]){
      
          if($_SESSION["profile"]["id"] == $data["ad"]["ads_id_user"]){

                if($data["auction_user_winner"]){ ?>

                  <div class="ads-status-info mt10 mb15" >
                    <strong><?php echo $ULang->t("Аукцион завершен"); ?></strong><br>
                    <?php echo $ULang->t("Победитель:"); ?> <a href="<?php echo _link("user/".$data["auction_user_winner"]["clients_id_hash"]); ?>"><?php echo $Profile->name($data["auction_user_winner"]); ?></a>
                  </div>
                  
                  <?php 
                  if($data["ad"]["ads_status"] == 4){

                      if( $this->getStatusSecure($data["ad"]) ){
                  ?>

                      <div class="btn-custom btn-color-danger mb5 open-modal" data-id-modal="modal-auction-cancel" >
                        <span><?php echo $ULang->t("Отказ от покупки"); ?></span>
                      </div>

                      <hr>

                  <?php }else{ ?>

                      <div class="btn-custom btn-color-blue mb5 open-modal ads-status-sell" data-id="<?php echo $data["ad"]["ads_id"]; ?>" data-id-modal="modal-change-user-review" >
                        <span><?php echo $ULang->t("Подтвердить продажу"); ?></span>
                      </div>
                      
                      <div class="btn-custom btn-color-danger mb5 open-modal" data-id-modal="modal-auction-cancel" >
                        <span><?php echo $ULang->t("Отказ от покупки"); ?></span>
                      </div>

                      <hr>

                  <?php }    

                  } 

                }else{ ?>
                  <div class="mb15" ></div>
                <?php }

          }else{ 

                  if($data["auction_user_winner"]){ ?>

                  <div class="ads-status-info mt10 mb15" >
                    <strong><?php echo $ULang->t("Аукцион завершен"); ?></strong><br>
                    <?php echo $ULang->t("Победитель:"); ?> <a href="<?php echo _link("user/".$data["auction_user_winner"]["clients_id_hash"]); ?>"><?php echo $Profile->name($data["auction_user_winner"]); ?></a>
                    <?php
                     if($data["auction_user_winner"]["clients_id"] == $_SESSION["profile"]["id"]){

                        if($data["ad"]["ads_status"] == 4 && !$data["order_secure"]){
                            
                            if( $this->getStatusSecure($data["ad"]) ){

                            ?>
                              <div class="mt10" ></div>
                              <a class="btn-custom btn-color-danger" href="<?php echo _link("buy/".$data["ad"]["ads_id"]); ?>" >
                                <span><?php echo $ULang->t("Оплатить"); ?> <?php echo $Main->price($data["ad"]["ads_price"]); ?></span>
                              </a> 
                              <hr>                   
                            <?php

                            }else{
                               ?>
                               <div class="mt10" ></div>
                               <?php
                               echo $ULang->t("Договоритесь с продавцом в чате или по телефону о способе передачи и оплате товара.");
                               
                            }

                        }

                     }
                    ?>
                  </div>


                  <?php   
                  }else{
                     ?>
                     <div class="mb15" ></div>
                     <?php
                  } 
                  

          } 


        ?>

        <div class="btn-custom btn-color-light mb5 open-modal" data-id-modal="modal-auction-users" >
          <span><?php echo $ULang->t("Ставки"); ?> (<?php echo count($data["auction_users"]); ?>)</span>
        </div>

      <?php

     }

     ?>

     </div>

     <?php

   }

  }

  function adSidebar( $data = [] ){
    global $settings;

    $Profile = new Profile();
    $Main = new Main();
    $ULang = new ULang();

    if($_SESSION["profile"]["id"] == $data["ad"]["ads_id_user"]){
        
        if( $data["ad"]["ads_status"] == 3 ){

            ?>
            <div class="ads-status-info" >
              <?php echo $ULang->t("Объявление заблокировано."); ?>
            </div>
            <?php

        }elseif( $data["ad"]["ads_status"] == 0 ){

            ?>
            <div class="ads-status-info" >
              <?php echo $ULang->t("Объявление на модерации."); ?>
            </div>
            <?php

        }elseif( $data["ad"]["ads_status"] == 6 ){
            
            ?>
            <div class="ads-status-info" >
            <?php

            if( $data["ad"]["category_board_count_free"] != 0 ){
              echo $ULang->t("Ваше объявление перемещено в архив. В категории"); ?> <strong>«<?php echo $data["ad"]["category_board_name"]; ?>»</strong> <?php echo $ULang->t("вы уже публиковали"); ?> <?php echo $data["ad"]["category_board_count_free"]; ?> <?php echo $ULang->t("объявление бесплатно"); ?>. <?php echo $ULang->t("Стоимость размещения в данную категорию"); ?> <?php echo $Main->price($data["ad"]["category_board_price"]); 
            }else{
              echo $ULang->t("Ваше объявление перемещено в архив.") . " " . $ULang->t("Стоимость размещения в данную категорию"); ?> <?php echo $Main->price($data["ad"]["category_board_price"]);
            }
            ?>

            <div class="btn-custom btn-color-green mb5 ads-cat-pay-publication mt10 schema-color-button" data-id="<?php echo $data["ad"]["ads_id"]; ?>" >
              <span><?php echo $ULang->t("Опубликовать за"); ?> <?php echo $Main->price($data["ad"]["category_board_price"]); ?></span>
            </div>

            </div>

            <span class="btn-custom btn-color-danger mb5 open-modal" data-id="<?php echo $data["ad"]["ads_id"]; ?>" data-id-modal="modal-delete-ads" >
              <span><?php echo $ULang->t("Удалить объявление"); ?></span>
            </span>

            <?php

        }elseif( $data["ad"]["ads_status"] == 7 ){

            ?>
            <div class="ads-status-info" >
              <strong><?php echo $ULang->t("Объявление отклонено."); ?></strong>
              <br>
              <?php if($data["ad"]["ads_note"]) echo $ULang->t("По причине:") . " " . $ULang->t($data["ad"]["ads_note"]) . ". " . $ULang->t("Отредактируйте объявление и опубликуйте снова."); else echo $ULang->t("По причине:") . " " . $ULang->t("Нарушение правил сайта") . ". " . $ULang->t("Отредактируйте объявление и опубликуйте снова."); ?>
            </div>
            <?php

        }elseif( $data["ad"]["ads_status"] == 2 ){

            ?>
            <div class="ads-status-info" >
              <?php echo $ULang->t("Объявление было снято с публикации и помещено в архив. Если объявление по-прежнему актуально, то опубликуйте его повторно."); ?>
            </div>
            <?php

        }else{

            if( strtotime($data["ad"]["ads_period_publication"]) < time() && !$data["ad"]["ads_auction"] ){

              ?>
              <div class="ads-status-info" >
                <?php echo $ULang->t("Срок размещения вашего объявления истек. Если объявление по-прежнему актуально, обновите в нем информацию или опубликуйте повторно."); ?>
              </div>
              <?php 

            }

        }

        ?>

         <div class="board-view-button">
            
            <?php
              if( $data["ad"]["ads_status"] == 4 ){

                  if( $data["order_secure"] ){

                     if( $data["order_secure"]["secure_id_user_buyer"] == $_SESSION["profile"]["id"] ){
                     ?>
                      <a class="btn-custom btn-color-light" href="<?php echo _link("order/".$data["order_secure"]["secure_id_order"]); ?>"  >
                          <span><?php echo $ULang->t("Перейти к заказу"); ?></span><br>
                      </a>
                     <?php
                     }elseif( $data["order_secure"]["secure_id_user_seller"] == $_SESSION["profile"]["id"] ){
                     ?>
                      <a class="btn-custom btn-color-light" href="<?php echo _link("order/".$data["order_secure"]["secure_id_order"]); ?>"  >
                          <span><?php echo $ULang->t("Перейти к заказу"); ?></span><br>
                      </a>
                     <?php                      
                     }

                  }

              }
            ?>

            <?php echo $this->adActionButton($data); ?>
            
         </div> 
         
         <?php 
         if( $data["ad"]["ads_status"] == 1 ){
            echo $this->outServicesAd($data); 
         }
         ?>

    <?php }else{ ?>
        
        
        <div class="board-view-button">
            
            <?php
            if( $data["ad"]["ads_status"] == 4 ){

                if( $data["order_secure"] ){

                   if( $data["order_secure"]["secure_id_user_buyer"] == $_SESSION["profile"]["id"] ){
                   ?>
                    <a class="btn-custom btn-color-light mb5" href="<?php echo _link("order/".$data["order_secure"]["secure_id_order"]); ?>"  >
                        <span><?php echo $ULang->t("Перейти к заказу"); ?></span><br>
                    </a>
                    <hr>
                   <?php
                   }elseif( $data["order_secure"]["secure_id_user_seller"] == $_SESSION["profile"]["id"] ){
                   ?>
                    <a class="btn-custom btn-color-light mb5" href="<?php echo _link("order/".$data["order_secure"]["secure_id_order"]); ?>"  >
                        <span><?php echo $ULang->t("Перейти к заказу"); ?></span><br>
                    </a>
                    <hr>
                   <?php                      
                   }

                }

            }
            ?>

            <?php 
            if($data["ad"]["clients_phone"]){ 
              if($data["ad"]["clients_view_phone"]){      
              ?>
                  <div class="btn-custom btn-color-green schema-color-button show-phone mb5" data-id="<?php echo $data["ad"]["ads_id"]; ?>" >
                    <span><?php echo $ULang->t("Показать номер телефона"); ?></span>
                  </div>
              <?php 
              }else{
              ?>
                  <div class="info-not-phone mb5">
                    <strong><?php echo $ULang->t("Номер скрыт"); ?></strong><br>
                    <?php echo $ULang->t("Пользователь предпочитает сообщения"); ?>
                  </div>
              <?php                
              } 
            }
            ?>
            
            <?php if(!$data["locked"]){ ?>

                <div <?php echo $Main->modalAuth( ["attr"=>'class="btn-custom btn-color-light open-modal mb5" data-id-modal="modal-message"', "class"=>"btn-custom btn-color-light mb5"] ); ?>  >
                  <span><?php echo $ULang->t("Написать продавцу"); ?></span>
                </div>

                <?php
                if(!$data["ad"]["ads_auction"] && $this->getStatusSecure($data["ad"])){ 

                  if( !$data["order_secure"] ){
                     ?>
                        <hr>
                        <a <?php echo $Main->modalAuth( ["attr"=>'class="btn-custom btn-color-gradient"  href="'._link("buy/".$data["ad"]["ads_id"]).'"', "class"=>"btn-custom btn-color-gradient"] ); ?>  >
                            <span ><?php echo $ULang->t("Купить онлайн"); ?></span><br>
                        </a>
                        <p class="ad-view-secure-label" > <i class="las la-shield-alt"></i> <?php echo $ULang->t("Покупать на"); ?> <?php echo $ULang->t($settings["site_name"]); ?> <?php echo $ULang->t("безопасно!"); ?> </p>
                     <?php
                  }

                } 
                ?>

            <?php } ?> 
                            
         </div>
          
         <div class="board-view-user" >

              <?php echo $Profile->cardUser($data); ?>

         </div>

         <?php

    }    

  }

  function adServices($id_id=0){

      $get = getAll("select * from uni_services_order INNER JOIN `uni_services_ads` ON `uni_services_ads`.services_ads_uid = `uni_services_order`.services_order_id_service where services_order_time_validity > now() and services_order_id_ads=? and services_order_status=?", [$id_id,1] );
      
      if($get){
        foreach ($get as $key => $value) {
           $data[$value["services_order_id_service"]] = $value["services_order_id_service"];
        }
      }

    return $data;

  }

  function delete($data = []){
    global $config, $settings;

    $Elastic = new Elastic();

      if($data["id"]){
          $get = getAll("SELECT ads_images,ads_id,ads_id_user FROM uni_ads WHERE ads_id IN(".$data["id"].")");
      }elseif($data["id_user"]){
          $get = getAll("SELECT ads_images,ads_id,ads_id_user FROM uni_ads WHERE ads_id_user=?", array($data["id_user"]));
      }


       if(count($get)){

          foreach ($get as $ad_key => $ad_value) {

              $images = $this->getImages($ad_value["ads_images"]);

              if(count($images) > 0){
                 foreach ($images as $key => $value) {

                    @unlink( $config["basePath"] . "/" . $config["media"]["big_image_ads"] . "/" . $value);
                    @unlink( $config["basePath"] . "/" . $config["media"]["small_image_ads"] . "/" . $value);
                   
                 }
              }

            update("delete from uni_ads where ads_id=?", array($ad_value["ads_id"]));
            update("delete from uni_ads_filters_variants where ads_filters_variants_product_id=?", array($ad_value["ads_id"]));
            update("delete from uni_ads_complain where ads_complain_id_ad=?", array($ad_value["ads_id"]));
            update("delete from uni_services_order where services_order_id_ads=?", array($ad_value["ads_id"]));
            update("delete from uni_favorites where favorites_id_ad=?", array($ad_value["ads_id"]));
            update("delete from uni_ads_change where ads_change_id_ad=?", array($ad_value["ads_id"]));          
            update("delete from uni_chat_users where chat_users_id_ad=?", array($ad_value["ads_id"]));          
            update("delete from uni_orders where orders_id_ad=?", array($ad_value["ads_id"]));          
            update("delete from uni_ads_views where ads_views_id_ad=?", array($ad_value["ads_id"]));          
            update("delete from uni_ads_views_display where ads_views_display_id_ad=?", array($ad_value["ads_id"])); 
            update("delete from uni_ads_comments where ads_comments_id_ad=?", array($ad_value["ads_id"]));         
                
            $getSecure = findOne("uni_secure", "secure_id_ad=?", array($ad_value["ads_id"]));      
            
            if($getSecure){
              update("delete from uni_secure_disputes where secure_disputes_id_secure=?", array($getSecure["secure_id"]));
              update("delete from uni_secure_payments where secure_payments_id_order=?", array($getSecure["secure_id_order"]));
              update("delete from uni_secure where secure_id_ad=?", array($ad_value["ads_id"]));
            }

            $Elastic->delete( [ "index" => "uni_ads", "type" => "ad", "id" => $ad_value["ads_id"] ] );

          }

       }


  }

  function queryGeo(){
     if($_SESSION["geo"]["data"]){

        if($_SESSION["geo"]["data"]["city_id"]){

          return "ads_city_id='".$_SESSION["geo"]["data"]["city_id"]."'";

        }elseif($_SESSION["geo"]["data"]["region_id"]){

          return "ads_region_id='".$_SESSION["geo"]["data"]["region_id"]."'";
          
        }elseif($_SESSION["geo"]["data"]["country_id"]){

          return "ads_country_id='".$_SESSION["geo"]["data"]["country_id"]."'";
          
        }

     }
  }

  function arrayGeo(){
     if($_SESSION["geo"]["data"]){

        if($_SESSION["geo"]["data"]["city_id"]){

          return [ "ads_city_id" => $_SESSION["geo"]["data"]["city_id"] ];

        }elseif($_SESSION["geo"]["data"]["region_id"]){

          return [ "ads_region_id" => $_SESSION["geo"]["data"]["region_id"] ];
          
        }elseif($_SESSION["geo"]["data"]["country_id"]){

          return [ "ads_country_id" => $_SESSION["geo"]["data"]["country_id"] ];
          
        }

     }
  }

  function updateCD($id_ad=0){
     insert("INSERT INTO uni_ads_views_display(ads_views_display_id_ad,ads_views_display_date)VALUES(?,?)", array($id_ad,date("Y-m-d H:i:s")));
     update("update uni_ads set ads_count_display=ads_count_display+1 where ads_id=?", [ $id_ad ], true);
  }

  function buttonViewsUp(){
     $Main = new Main();
     $ULang = new Ulang();
     $get = findOne("uni_services_ads", "services_ads_uid=?", [1]);
     $count = $get["services_ads_variant"] == 1 ? $get["services_ads_count_day"] : 1;
     $price = $get["services_ads_new_price"] ? $get["services_ads_new_price"] : $get["services_ads_price"];
     return  $ULang->t('Поднять на') . ' ' . $count . ' ' . ending($count, $ULang->t("день"), $ULang->t("дня"), $ULang->t("дней")) . ' ' . $ULang->t('за') . ' ' . $Main->price($price);
  }

  function adModalJs($data=[]){
    
    if( $data["ad"]["ads_status"] != 0 || $data["ad"]["ads_status"] != 1 ){
        return false;
    }
    ?>

      <script type="text/javascript">
      $(document).ready(function () {

        <?php 
        if($_GET["modal"] == "update_ad" && $data["services_ads"] && $_SESSION["profile"]["id"] == $data["ad"]["ads_id_user"] && strtotime($data["ad"]["ads_period_publication"]) > time() && $data["ad"]["ads_price"]){ ?>
        $(window).load(function() { 
           $( "#modal-ad-new" ).show();
           $("body").css("overflow", "hidden");
        });
        <?php 
        }elseif($_GET["modal"] == "top_ad" && !$data["order_service_ids"] && $_SESSION["profile"]["id"] == $data["ad"]["ads_id_user"] && strtotime($data["ad"]["ads_period_publication"]) > time() && $data["ad"]["ads_price"]){
        ?>
        $(window).load(function() { 
           $( "#modal-top-views" ).show();
           $("body").css("overflow", "hidden");
        });
        <?php
        }
        ?>


      });
      </script>

    <?php

  }

  function autoModeration($id_ad=0, $param=[]){
     
     global $settings;

     if($settings["ads_publication_moderat"]){

       $getAd = findOne("uni_ads", "ads_id=?", [$id_ad]);

       if( $getAd["ads_status"] == 7 ){
           return 0;
       }

       if( $settings["ad_black_list_words"] ){

          $words = explode(",", $settings["ad_black_list_words"]);
          foreach ($words as $key => $value) {
              if ( @strpos($param["text"] . " " . $param["title"], trim($value) ) !== false ){
                  return 0;
              }
          }

       }

       if( $getAd["ads_title"] != $param["title"] ){
          return 0;
       }

       $similar_text = similar_text($getAd["ads_text"], $param["text"], $perc);

       if( intval($perc) != 100 ){
          return 0;
       }

       if( $getAd["ads_video"] != $param["video"] ){
          return 0;
       }

       $images = $this->getImages($getAd["ads_images"]);

       if( $_POST["gallery"] ){
          foreach ($_POST["gallery"] as $key => $value) {
              if(!in_array($value, $images)){
                 return 0;
              }             
          }
       }

       return !$getAd["ads_status"] ? 0 : 1;
     
     }else{

        return 1;

     } 
     

  }

  function getAuctionWinner( $id_ad = 0 ){
    return getOne("select * from uni_ads_auction INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_ads_auction`.ads_auction_id_user where ads_auction_id_ad=? order by ads_auction_price desc", [$id_ad]);
  }
  
  function getSecureCommission( $amount = 0 ){
     global $settings;

     return $amount - $this->secureTotalAmountPercent( $amount );
         
  }

  function secureTotalAmountPercent( $amount = 0, $services_commission = true ){
     global $settings;

     if( $settings["secure_payment_service_name"] ) $payment = findOne("uni_payments","code=?", array( $settings["secure_payment_service_name"] ));

     if( !$payment ){ return 0; }

     if($payment["secure_percent_service"] && $services_commission){
        $amount = $amount - calcPercent( $amount, $payment["secure_percent_service"] );
     }

     if($payment["secure_other_payment"]){
        $amount = $amount - round($payment["secure_other_payment"], 2);
     }

     if($payment["secure_percent_payment"]){
        return $amount - calcPercent( $amount, $payment["secure_percent_payment"] );
     }elseif($payment["secure_percent_service"] && $services_commission){
        return round($amount, 2); 
     }elseif($payment["secure_other_payment"]){
        return $amount - round($payment["secure_other_payment"], 2); 
     }else{
        return round($amount, 2);
     }
         
  } 

  function getStatusSecure( $data = [] ){
     global $settings;

     if( $settings["secure_payment_service_name"] ) $payment = findOne("uni_payments","code=?", array( $settings["secure_payment_service_name"] ));

     if( !$payment ){ return 0; }
     
     if( $data["clients_secure"] && $settings["secure_status"] && $data["category_board_secure"] && ( $data["ads_price"] >= $payment["secure_min_amount_payment"] && $data["ads_price"] <= $payment["secure_max_amount_payment"] ) ){
          return 1;
     }else{
          return 0;
     }

  }

  function cardAdOrder($data = array()){
    global $config;

    $image = $this->getImages($data["ad"]["ads_images"]);

    return '

      <div class="board-view-ads-left" >
        <div class="board-view-ads-img" >
          <img src="'.Exists($config["media"]["big_image_ads"],$image[0],$config["media"]["no_image"]).'">
        </div>
      </div>

      <div class="board-view-ads-right" >

        <a href="'.$this->alias($data["ad"]).'"  >'.$data["ad"]["ads_title"].'</a>
        <br>
        <span>'.$data["ad"]["city_name"].'</span>

      </div>

      <div class="clr" ></div>

    ';

  }

  function timeSecureReservation( $time="" ){

     if( time() < strtotime("+10 minutes", strtotime($time)) ){
         $diff = $this->dateDiff( date("Y-m-d H:i:s",strtotime("+10 minutes", strtotime($time))) );
         return $diff["min"] . ' мин.';       
     }else{
         return '0 мин.';
     }

  }

  function secureStatusLabel( $data = [] ){

    $ULang = new ULang();

    if($data["secure_status"] == 0){ 

      return $ULang->t('Ожидается оплата');

    }elseif($data["secure_status"] == 1){

          return $ULang->t('Заказ оплачен');

    }elseif($data["secure_status"] == 2){

          if( $data["secure_id_user_buyer"] == $_SESSION["profile"]["id"] ){

             return $ULang->t('Подтвердите получение.');

          }elseif( $data["secure_id_user_seller"] == $_SESSION["profile"]["id"] ){
            
             return $ULang->t('Ожидаем подтверждение покупателя.');

          }

    }elseif($data["secure_status"] == 3){

          return $ULang->t('Заказ завершён.');

    }elseif($data["secure_status"] == 4){

          return $ULang->t('Открыт спор.');

    }elseif($data["secure_status"] == 5){

          return $ULang->t('Заказ отменен.');

    }


  }

  function addSecurePayments( $data = [] ){

     insert("INSERT INTO uni_secure_payments(secure_payments_date,secure_payments_id_order,secure_payments_bank_card,secure_payments_amount,secure_payments_status_pay,secure_payments_id_user,secure_payments_status,secure_payments_amount_percent)VALUES(?,?,?,?,?,?,?,?)", [ date("Y-m-d H:i:s"), $data["id_order"], $data["card"], $data["amount"], $data["status_pay"], $data["id_user"], $data["status"], $data["amount_percent"] ]);

  }

  function secureResultPay( $data = [] ){
    
    $Main = new Main();
    $ULang = new ULang();

    $getPayment = findOne("uni_secure_payments", "secure_payments_id_user=? and secure_payments_id_order=? and secure_payments_status!=?", [ $data["id_user"], $data["id_order"], 0 ]);

    $getPayment["secure_payments_bank_card"] = decrypt($getPayment["secure_payments_bank_card"]);

    if($getPayment){
        if($getPayment["secure_payments_status_pay"] == 0){

          ?>
          <p class="mt10"><?php echo $Main->price( $getPayment["secure_payments_amount_percent"] ); ?> <?php echo $ULang->t("будут зачислены на вашу карту в течении 24 часа."); ?></p>
          <?php

        }elseif($getPayment["secure_payments_status_pay"] == 1){
          
          ?>
          <p class="mt10"><?php echo $Main->price( $getPayment["secure_payments_amount_percent"] ); ?> <?php echo $ULang->t("зачислены на вашу карту"); ?> <?php echo "xxxx" . substr($getPayment["secure_payments_bank_card"], strlen($getPayment["secure_payments_bank_card"]) - 4, strlen($getPayment["secure_payments_bank_card"]) ); ?>.</p>
          <?php

        }elseif($getPayment["secure_payments_status_pay"] == 2){

          $getUser = findOne("uni_clients", "clients_id=?", [$data["id_user"]]);
          
          ?>
          <p class="mt10"><?php echo $ULang->t("Не удалось перевести деньги на банковскую карту."); ?></p>
           
          <a class="btn-custom-mini btn-color-blue mt5 mb5" href="<?php echo _link("user/".$getUser["clients_id_hash"]."/settings"); ?>" > <span><?php echo $ULang->t("Указать другую карту"); ?></span> </a>

          <p class="mt10" ><?php echo $ULang->t("При возникновении трудностей с зачислением средств"); ?>, <a href="<?php echo _link("feedback"); ?>"><?php echo $ULang->t("напишите в службу поддержки"); ?></a></p> 
          <?php

        }
    }

  }

  function publicationAndStatus( $data = [] ){
    $ULang = new ULang();

      if(!$data["ads_status"]){
          return '<span class="ad-status-label ad-status-label-'.$data["ads_status"].'" >' . $this->status($data["ads_status"]) . '</span>';
      }elseif(strtotime($data["ads_period_publication"]) > time()){
          return '<span class="ad-status-label ad-status-label-'.$data["ads_status"].'" >' . $this->status($data["ads_status"]) . '</span>';
      }else{
          return '<span class="ad-status-label ad-status-label-0" >'.$ULang->t("Истек срок").'</span>';
      }

  }

  function getCountChangeOptionsCity( $data = [] ){

      if($data["param_filter"]["filter"]["area"]){
        $count += count($data["param_filter"]["filter"]["area"]);
      }

      if($data["param_filter"]["filter"]["metro"]){
        $count += count($data["param_filter"]["filter"]["metro"]);
      }

      return (int)$count;      
  }

  function getComments( $id_ad = 0 ){
      $array = array();
    
      $get = getAll("SELECT * FROM uni_ads_comments INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_ads_comments`.ads_comments_id_user WHERE ads_comments_id_ad=? ORDER By ads_comments_id desc", [$id_ad]);

      if (count($get)) { 
                        
            foreach($get AS $result){

                $array['ads_comments_id_parent'][$result['ads_comments_id_parent']][$result['ads_comments_id']] =  $result;

            }  

      }            

      return $array;
         
  }

  function outComments($id_parent = 0, $getComments=[]) {
    global $config;

    $Profile = new Profile();
    $ULang = new ULang();
      
      if (isset($getComments["ads_comments_id_parent"][$id_parent])) {
          foreach ($getComments["ads_comments_id_parent"][$id_parent] as $value) {

              ?>

                  <div <?php if($id_parent != 0){ echo 'style="margin-left: 60px;"'; } ?> >
                     <div class="module-comments-avatar" >
                       <img src="<?php echo $Profile->userAvatar($value["clients_avatar"]); ?>">
                     </div>
                     <div class="module-comments-content" >
                       
                       <?php if( $_SESSION['cp_auth'][ $config["private_hash"] ] || intval($_SESSION["profile"]["id"]) == $value["ads_comments_id_user"] ){ ?>
                       <span class="module-comments-delete" data-id="<?php echo $value["ads_comments_id"]; ?>" > <i class="las la-trash"></i> <?php echo $ULang->t("Удалить"); ?> </span>
                       <?php } ?>

                       <p> <strong> <?php echo $Profile->name($value); ?> </strong> <span><?php echo datetime_format($value["ads_comments_date"]); ?></span> </p>

                       <?php
                       if($value["ads_comments_id_parent"]!=0){
                          $getMsg = getOne("SELECT * FROM uni_ads_comments INNER JOIN `uni_clients` ON `uni_clients`.clients_id = `uni_ads_comments`.ads_comments_id_user WHERE ads_comments_id=?", [$value["ads_comments_id_parent"]]);
                          ?>
                          <strong><i class="las la-share"></i> <?php echo $Profile->name($getMsg); ?></strong>,
                          <?php
                       }
                       ?>
                       
                       <?php echo $value["ads_comments_text"]; ?>

                       <?php if( intval($_SESSION["profile"]["id"]) != $value["ads_comments_id_user"] && $_SESSION['profile']['id'] ){ ?>

                       <div><span class="module-comments-otvet" data-id="<?php echo $value["ads_comments_id"]; ?>" ><?php echo $ULang->t("Ответить"); ?></span></div>

                       <?php } ?>

                       <div class="module-comments-form-otvet" >
                         <form class="module-comments-form" >
                         <textarea name="text" ></textarea>
                         <button class="module-comments-form-send" ><i class="las la-arrow-right"></i></button>
                         <input type="hidden" name="id_ad" value="<?php echo $value["ads_comments_id_ad"]; ?>" >
                         <input type="hidden" name="id_msg" value="<?php echo $value["ads_comments_id"]; ?>" >
                         <input type="hidden" name="token" value="<?php echo md5($config["private_hash"].$value["ads_comments_id"].$value["ads_comments_id_ad"]); ?>" >
                         </form>
                       </div>

                     </div>
                     <div class="clr" ></div>
                  </div>

              <?php

              $this->outComments($value["ads_comments_id"], $getComments);

          }
      }
  }

  function idsComments($parent_id=0, $getComments=[]){
      
      if(isset($getComments['ads_comments_id_parent'][$parent_id])){

            foreach($getComments['ads_comments_id_parent'][$parent_id] as $value){
              
              $ids[] = $value['ads_comments_id'];
              
              if( $getComments['ads_comments_id_parent'][$value['ads_comments_id']] ){
                $ids[] = $this->idsComments($value['ads_comments_id'],$getComments);
              }
                                                                  
            }

      }

      return implode(",", $ids);

  }

  function adPeriodPub($period=30){
      global $settings;

      if($settings["ad_create_period"]){

         $ad_create_period_list = explode(",", $settings["ad_create_period_list"]);

         if( in_array( $period , $ad_create_period_list) ){
             $ad_period = date("Y-m-d H:i:s", time() + (intval($period) * 86400) );
             $ad_period_day = (int)$period;
         }else{
             $ad_period = date("Y-m-d H:i:s", time() + ($settings["ads_time_publication_default"] * 86400) );
             $ad_period_day = $settings["ads_time_publication_default"];
         }

      }else{
         $ad_period = date("Y-m-d H:i:s", time() + ($settings["ads_time_publication_default"] * 86400) );
         $ad_period_day = $settings["ads_time_publication_default"];
      }

      return ["date"=>$ad_period, "days"=>$ad_period_day];

  }

  function linkMap( $data = [] ){

     $vars = [];

     unset( $data["param_filter"]["filter"]["sort"] );

     if($data["param_filter"]) $vars[] = http_build_query($data["param_filter"]);

     if($data["category"]["category_board_id"]) $vars[] = "id_c=" . $data["category"]["category_board_id"];

     if( count($vars) ){
         $vars_params = "?" . implode("&", $vars);
     }

     return _link( "map/" . $_SESSION["geo"]["alias"] . $vars_params );

  }

  function buildNameSubscribe($url=""){
    
    $CategoryBoard = new CategoryBoard();
    $Geo = new Geo();
    $ULang = new ULang();

    $getCategoryBoard = $CategoryBoard->getCategories("where category_board_visible=1");

      if($url){

           $url_vars = explode("?", $url);
           $url_parse = explode("/", $url_vars[0]);

           if( $url_vars[1] ){
               
               if( strpos($url_vars[1], "filter") !== false ){
                 parse_str($url_vars[1], $param_filter);

                 if(count($param_filter["filter"])){
                    $param_filter = " &bull; " . $ULang->t("Фильтров") . " " . count($param_filter["filter"]);
                 }
               }

           }

           if( $url_parse[0] ){
               $getGeoName = $ULang->t( $Geo->aliasOneOf($url_parse[0])["name"], [ "table" => "geo", "field" => "geo_name" ] );
           }

           if( $url_parse[1] ){

               unset($url_parse[0]);
               $alias = implode("/", $url_parse);
               
               if($getCategoryBoard["category_board_chain"][$alias]["category_board_name"]){
                  return $ULang->t( $getCategoryBoard["category_board_chain"][$alias]["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ) . " &bull; " . $getGeoName . $param_filter;
               }else{
                  return $getGeoName . $param_filter;
               }

           }else{

               return $getGeoName . $param_filter;

           }
                   
      }    

  }

  function buildUrlCatalog( $data = [] ){
       
       if( count($data["param_filter"]) ){
           return trim( $_SESSION["geo"]["alias"] . "/" . $data["category"]["category_board_chain"], "/" ) . "?" . http_build_query($data["param_filter"]);
       }else{
           return trim( $_SESSION["geo"]["alias"] . "/" . $data["category"]["category_board_chain"], "/" );
       }
       
  }

  function outPrice( $param = [] ){
       
    $ULang = new ULang();
    $Main = new Main();
    
    if( $param["data"]["ads_price_old"] ){
        if(!$param["shop"]) $param["data"]["ads_price_old"] = 0;
    }
    
    if( $param["data"]["ads_price_old"] ){
      $html = '<span class="'.$param["class_price"].'" >' . $Main->price($param["data"]["ads_price"], $param["data"]["ads_currency"], $param["abbreviation_million"]) . '</span>';
      $html .= '<span class="'.$param["class_price_old"].'" >' . $Main->price($param["data"]["ads_price_old"], $param["data"]["ads_currency"], $param["abbreviation_million"]) . '</span>';
    }elseif( $param["data"]["ads_price"] ){
      $html = '<span class="'.$param["class_price"].'" >'.$Main->price($param["data"]["ads_price"], $param["data"]["ads_currency"], $param["abbreviation_million"]).'</span>';
    }else{

       if( $param["data"]["ads_price_free"] ){
           $html = '<span class="'.$param["class_price"].'" >'.$ULang->t("Даром").'</span>';
       }else{ 
           $html = '<span class="'.$param["class_price"].'" >'.$ULang->t("Цена не указана").'</span>';
       }

    }

    return $html;

  }

  function outAdViewPrice( $param = [] ){
       
    $ULang = new ULang();
    $Main = new Main();
    $Shop = new Shop();

    if( $param["data"]["ads_price_old"] ){
        $getShop = $Shop->getUserShop( $param["data"]["ads_id_user"] );
        if(!$getShop) $param["data"]["ads_price_old"] = 0;
    }

    if( $param["data"]["ads_price_old"] ){

      return '
        <div class="board-view-old-price" >
          '.$Main->price($param["data"]["ads_price_old"], $param["data"]["ads_currency"]).'
        </div>      
        <div class="board-view-price price-currency" >
          '.$Main->price($param["data"]["ads_price"],$param["data"]["ads_currency"]).'
          '.$Main->adOutCurrency($param["data"]["ads_price"], $param["data"]["ads_currency"]).'
        </div>
      ';

    }elseif( $param["data"]["ads_price"] ){

      return '
        <div class="board-view-price price-currency" >
          '.$Main->price($param["data"]["ads_price"],$param["data"]["ads_currency"]).'
          '.$Main->adOutCurrency($param["data"]["ads_price"], $param["data"]["ads_currency"]).'
        </div>
      ';

    }else{
       
       if( $param["data"]["ads_price_free"] ){
           return '<div class="board-view-price" >'.$ULang->t("Даром").'</div>';
       }else{
           return '<div class="board-view-price" >'.$ULang->t("Цена не указана").'</div>'; 
       }
       

    }


  }

  function outStatus( $service = [], $value = [] ){

    $ULang = new ULang();
    $Ads = new Ads();

    if( $service[1] && $service[2] ){
        $html = '<div data-tippy-placement="top" title="'.$ULang->t("Поднятие в ленте").'" class="item-service-top" > <i class="las la-angle-double-up"></i> </div>';
        $html .= '<div data-tippy-placement="top" title="'.$ULang->t("Вип объявление").'" class="item-vip" > <i class="las la-crown"></i> </div>';
    }elseif( $service[1] ){
        $html = '<div data-tippy-placement="top" title="'.$ULang->t("Поднятие в ленте").'" class="item-service-top" > <i class="las la-angle-double-up"></i> </div>';
    }elseif( $service[2] ){
        $html = '<div data-tippy-placement="top" title="'.$ULang->t("Вип объявление").'" class="item-vip" > <i class="las la-crown"></i> </div>';
    }elseif( $service[3] ){
        $html = '<div data-tippy-placement="top" title="'.$ULang->t("Турбо продажа").'" class="item-service-turbo" > <i class="las la-rocket"></i> </div>';
    }

    if($this->getStatusSecure($value)){
      $html .= '<div class="item-secure" data-tippy-placement="top" title="'.$ULang->t("Доступна безопасная сделка").'" > <i class="las la-shield-alt"></i> </div>';           
    }

    if($value["ads_auction"]){
      $html .= '<div class="item-auction" data-tippy-placement="top" title="'.$ULang->t("Аукцион").'" > <i class="las la-gavel"></i> </div>';
    } 
    
    return $html;

  }

  function variantPrice( $key = 0 ){

    $ULang = new ULang();

       if( $key == 1 ){
          return $ULang->t('Зарплата');
       }elseif( $key == 2 ){
          return $ULang->t('Стоимость услуги');
       }elseif( $key == 3 ){
          return $ULang->t('Арендная плата в месяц');
       }elseif( $key == 4 ){
          return $ULang->t('Арендная плата за сутки');
       }else{
          return $ULang->t('Цена');
       }    

  }

  function outGallery( $data = [] ){
     global $config,$settings;

     $Ads = new Ads();
     $Shop = new Shop();
     $Profile = new Profile();
     $ULang = new ULang();

     if( $data["ad"]["clients_type_person"] == "company" ){
        $type_person = $ULang->t("Компания");
     }else{
        $type_person = $ULang->t("Частное лицо");
     }

     if( count($data["image"]) ){

         $return .= '<div class="photo-mobile-slider"  style="height:'.$data["height"].'px" >';

         foreach ( array_slice($data["image"], 0, 4) as $key => $name ) {
             
              $return .= '
              <a style="height:'.$data["height"].'px" href="'.$Ads->alias($data["ad"]).'" title="'.$data["ad"]["ads_title"].'" >
                <img class="image-autofocus" alt="'.$data["ad"]["ads_title"].'" src="'.Exists($config["media"]["small_image_ads"],$name,$config["media"]["no_image"]).'"  >
              </a>
              ';

         }

         if( $data["shop"] ){

           $return .= '
               <a class="ads-item-user-card" style="height:'.$data["height"].'px" href="'.$Shop->link($data["shop"]["clients_shops_id_hash"]).'" title="'.$data["shop"]["clients_shops_title"].'" >
                    <div class="ads-item-user-card-avatar" >
                         <img class="image-autofocus" src="'.Exists($config["media"]["other"], $data["shop"]["clients_shops_logo"], $config["media"]["no_image"]).'">
                    </div>          
                    <span class="ads-item-user-card-name" >'.custom_substr($data["shop"]["clients_shops_title"], 20, "...").'</span>
                    <span class="ads-item-user-card-person" >'.$ULang->t("Магазин").'</span>
               </a>
           ';

         }else{
           
           $return .= '
               <a class="ads-item-user-card" style="height:'.$data["height"].'px" href="'._link( "user/" . $data["ad"]["clients_id_hash"] ).'" >
                    <div class="ads-item-user-card-avatar" >
                         <img class="image-autofocus" src="'.$Profile->userAvatar($data["ad"]["clients_avatar"]).'">
                    </div>         
                    <span class="ads-item-user-card-name" >'.custom_substr($Profile->name($data["ad"]), 20, "...").'</span>
                    <span class="ads-item-user-card-person" >'.$type_person.'</span>
               </a>
           ';

         }

         $return .= '
           </div>
         ';


     }else{
        
         if( $data["shop"] ){

           $return .= '
               <a class="ads-item-user-card" style="height:'.$data["height"].'px;" href="'.$Ads->alias($data["ad"]).'" title="'.$data["shop"]["clients_shops_title"].'" >
                    <div class="ads-item-user-card-avatar" >
                         <img class="image-autofocus" src="'.Exists($config["media"]["other"], $data["shop"]["clients_shops_logo"], $config["media"]["no_image"]).'">
                    </div>          
                    <span class="ads-item-user-card-name" >'.custom_substr($data["shop"]["clients_shops_title"], 20, "...").'</span>
                    <span class="ads-item-user-card-person" >'.$ULang->t("Магазин").'</span>
               </a>
           ';

         }else{
           
           $return .= '
               <a class="ads-item-user-card" style="height:'.$data["height"].'px;" href="'.$Ads->alias($data["ad"]).'" >
                    <div class="ads-item-user-card-avatar" >
                         <img class="image-autofocus" src="'.$Profile->userAvatar($data["ad"]["clients_avatar"]).'">
                    </div>            
                    <span class="ads-item-user-card-name" >'.custom_substr($Profile->name($data["ad"]), 20, "...").'</span>
                    <span class="ads-item-user-card-person" >'.$type_person.'</span>
               </a>
           ';

         }

     }

     return $return;

  }

  function autoTitle( $filters = [], $category = [] ){

     $title = [];
     $items = [];
     
     if( !$category["category_board_auto_title_template"] ){
         return $category["category_board_name"];
     }

     $template = explode(",", $category["category_board_auto_title_template"]);

     if( $filters ){

          foreach($filters AS $id_filter=>$array){
              
              $getFilter = findOne( "uni_ads_filters", "ads_filters_id=?", [ intval($id_filter) ] );
              
              if( $getFilter->ads_filters_type != "input" ){
                  $getItem = findOne( "uni_ads_filters_items", "ads_filters_items_id=?", [ intval($array[0]) ] );
                  $items[ $getFilter["ads_filters_alias"] ] = $getItem->ads_filters_items_value;
              }else{
                  $items[ $getFilter["ads_filters_alias"] ] = trim( clear($array[0]) );
              }
  
          } 

     } 

     if( $template ){
         foreach ($template as $value) {
            if( strpos($value, "{") !== false ){
                
                if( $items ){
                    
                    preg_match('/\{.*?}/',$value,$result);

                    $str_replace = trim( str_replace( [ "{", "}" ] , '', $result[0] ) );
                    
                    if( $items[ $str_replace ] ){
                        $title[] = trim( str_replace( $result[0] , $items[ $str_replace ], $value ) ); 
                    }

                }               

            }else{

                if( trim($value) ) $title[] = trim($value);

            }
         }
     }
     
     if( count($title) ){
        return implode(", ", $title);
     }else{
        return $category["category_board_name"];
     }

  }

  function getCityDistance( $post = [], $ad_not_city_distance = [] ){
      global $settings;
      
      $Filters = new Filters();
      
      $ids_city = [];

      if( $_SESSION["geo"]["data"]["city_id"] ){

          $getСityDistance = getAll( "select * from uni_city_distance where (city_distance_id_city_from=".$_SESSION["geo"]["data"]["city_id"]." or city_distance_id_city_to=".$_SESSION["geo"]["data"]["city_id"].") and city_distance_km <= ".$settings["catalog_city_distance"], [] );
          if( count($getСityDistance) ){
              foreach ($getСityDistance as $key => $value) {
                  if( count($ad_not_city_distance) ){
                      if( !in_array( $value["city_distance_id_city_to"] , $ad_not_city_distance ) ){
                           $ids_city[$value["city_distance_id_city_to"]] = $value["city_distance_id_city_to"];
                      }
                      if( !in_array( $value["city_distance_id_city_from"] , $ad_not_city_distance ) ){
                        $ids_city[$value["city_distance_id_city_from"]] = $value["city_distance_id_city_from"];
                      }                     
                  }else{
                      $ids_city[$value["city_distance_id_city_to"]] = $value["city_distance_id_city_to"];
                      $ids_city[$value["city_distance_id_city_from"]] = $value["city_distance_id_city_from"];
                  }
              }
          }
          
          if( count($ids_city) ){
              return $Filters->queryFilter($post, ["navigation"=>false, "page"=>1, "disable_query_geo" => true, "extra_query" => " and ads_city_id IN(".implode(",", $ids_city).")"]);
          }

      }     

  }

  function getCountAd( $id = 0 ){

      $Cache = new Cache();

      $getCache = $Cache->get( [ "table" => "count_ads", "key" => "count_ads" ] );

      if( $getCache !== false ){
         
         if( $_SESSION["geo"]["data"]["city_id"] ){
             return (int)$getCache[ $id ][ $_SESSION["geo"]["data"]["city_id"] ];
         }elseif( $_SESSION["geo"]["data"]["region_id"] ){
             return (int)$getCache[ $id ][ $_SESSION["geo"]["data"]["region_id"] ];
         }elseif( $_SESSION["geo"]["data"]["country_id"] ){
             return (int)$getCache[ $id ][ $_SESSION["geo"]["data"]["country_id"] ];
         }

      }

      return 0;

  }


      
}




?>
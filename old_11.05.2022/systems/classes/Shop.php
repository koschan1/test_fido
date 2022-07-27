<?php
/**
 * UniSite CMS
 *
 * @copyright 	2018 Artur Zhur
 * @link 		https://unisitecms.ru
 * @author 		Artur Zhur
 *
 */

class Shop{

    function priceMonth( $month = 1 ){
        global $settings;

        $price = $settings["user_shop_price_month"] * $month;

        if( $settings["user_shop_discount_month"] ){
            
            if( $month >= $settings["user_shop_discount_month"] ){
                return $price - (($price * $settings["user_shop_discount_percent"]) / 100);
            }else{
                return $price;
            }
            
        }else{
            return $price;
        }

    }

    function viewShop( $id = 0 ){

      if(detectRobots($_SERVER['HTTP_USER_AGENT']) == false){
        if($id){    
            if(!isset($_SESSION["view-shop"][$id])){ 
              update("update uni_clients_shops set clients_shops_count_view=clients_shops_count_view+1 where clients_shops_id=?", [$id]);
              $_SESSION["view-shop"][$id] = 1;
            }  
        }
      }       

    }

    function link( $id_hash = "" ){
        if($id_hash) return _link( "shop/" . $id_hash );
    }

    function aliasCategory( $id_hash = "", $chain_category = "" ){
        return _link( "shop/" . $id_hash . "/" . $chain_category );
    }

    function aliasPage( $id_hash = "", $alias_page = "" ){
        return _link( "shop/" . $id_hash . "/" . $alias_page );
    }

    function buildCategories($getCategories=array(),$id=0){

      if($getCategories){

        if($getCategories["category_board_id"][$id]['category_board_id_parent']!=0){
            $return[] = $this->buildCategories($getCategories,$getCategories["category_board_id"][$id]['category_board_id_parent']);  
        }

        $return[] = $id;

        return implode(",", $return);

      } 
               
    }

    function adCategories( $id_user = 0 ){

        $groupBy = [];
        $list_ids = [];

        $getCategories = (new CategoryBoard())->getCategories("where category_board_visible=1");
        
        $getAds = $this->getAdsUser( [ "id_user" => $id_user ] );

        if( $getAds["count"] ){
            foreach ($getAds["all"] as $key => $value) {

               if( !in_array( $value["ads_id_cat"], $groupBy ) ){
                   
                    $buildCategories = $this->buildCategories( $getCategories, $value["ads_id_cat"] );

                    if($buildCategories){

                        foreach ( explode(",", $buildCategories) as $id_cat) {
                            $list_ids[ $id_cat ] = $id_cat;
                        }

                    }

                  $groupBy[ $value["ads_id_cat"] ] = $value["ads_id_cat"];
               }

            }
        }

        if( count($list_ids) ){
            return (new CategoryBoard())->getCategories("where category_board_id IN(".implode(",", $list_ids).")");
        }
        
        return [];

    }

    function outCategories($getCategories = [], $id_parent = 0, $id_hash, $current_id_category = 0){

        $ULang = new ULang();
        
        if (isset($getCategories["category_board_id_parent"][$id_parent])) {
        $tree = '<ul>';

            foreach($getCategories["category_board_id_parent"][$id_parent] as $value){
                
                $activeLink = '';

                if( $current_id_category == $value['category_board_id'] ){
                    $activeLink = 'class="active"';
                }

                $tree .= '<li> <a '.$activeLink.' href="'.$this->aliasCategory( $id_hash, $value['category_board_chain'] ).'" >'.$ULang->t( $value["category_board_name"], [ "table" => "uni_category_board", "field" => "category_board_name" ] ).' <i class="las la-check"></i></a> ';
                $tree .=  $this->outCategories($getCategories,$value['category_board_id'],$id_hash,$current_id_category);
                $tree .= '</li>';
            }

        $tree .= '</ul>';
        }

        return $tree;
    }

    function getAdsUser( $param = [] ){

        $Elastic = new Elastic();
        $Ads = new Ads();

        $param_search = $Elastic->paramAdquery();
        $param_search["query"]["bool"]["filter"][]["term"]["ads_id_user"] = $param["id_user"];
        $param_search["sort"]["ads_sorting"] = [ "order" => "desc" ];
        $param_search["sort"]["ads_id"] = [ "order" => "desc" ];

        if( $param["limit"] ){
            return $Ads->getAll( ["query"=>"ads_status='1' and clients_status IN(0,1) and ads_period_publication > now() and ads_id_user='{$param["id_user"]}'", "sort" => "order by ads_sorting desc, ads_id desc limit {$param["limit"]}", "param_search" => $param_search, "output" => $param["limit"] ] );
        }else{
            return $Ads->getAll( ["query"=>"ads_status='1' and clients_status IN(0,1) and ads_period_publication > now() and ads_id_user='{$param["id_user"]}'", "sort" => "order by ads_sorting desc, ads_id desc", "navigation" => $param["navigation"], "param_search" => $param_search ] );
        }


    }

    function getUserShop( $id_user = 0 ){
       if( $id_user ){
           return findOne( "uni_clients_shops", "clients_shops_time_validity > now() and clients_shops_id_user=?", [ intval($id_user) ] );
       }
    }
       
}

?>
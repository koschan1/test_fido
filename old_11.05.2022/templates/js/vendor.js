$(document).ready(function () {
   
   var url_path = $("body").data("prefix");
   var currentCountPage = 1;
   var loadingAdScroll = false;
   
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
   
   $('.inputNumber').inputNumber({ thousandSep: ' ' });

   if($(".phone-mask").length){

      $.mask.definitions['9'] = false;
      $.mask.definitions['x'] = "[0-9]";
      
      if($(".phone-mask").data("format")){

        $(".phone-mask").mask( $(".phone-mask").data("format") );

      }

   }
   
   function auctionTime(){
      $('[data-countdown="true"]').each(function (index, element) {
          $(element).countdown( $(element).attr("data-date") )
          .on('update.countdown', function(event) {
            var format = '%M '+$(".lang-js-2").html()+' %S '+$(".lang-js-3").html();
            $(element).html(event.strftime(format));
          })
          .on('finish.countdown', function(event) {
              $(element).removeClass("pulse-time").html( $(".lang-js-1").html() );
          });

      });
   }

   function tippyLoad(){
        tippy('[data-tippy-placement]', {
          delay: 100,
          arrow: true,
          arrowType: 'sharp',
          size: 'regular',
          duration: 200,
          animation: 'shift-away',
          animateFill: true,
          theme: 'dark',
          distance: 10,
        });
   }

   tippyLoad();
   auctionTime();

   $(document).on('click','.captcha-update', function () { 
     
     $(this).attr("src", $(this).attr("src") + "&r="+ Math.random());

   });

   $(document).on('click','.toolbar-dropdown-toggle > span', function (e) { 

		$(".toolbar-dropdown-toggle > span").attr("data-toggle", 0).removeClass("toolbar-dropdown-active");
		$(".toolbar-dropdown-toggle .toolbar-dropdown-box").hide();

    if($(this).attr("data-toggle") == 0){
        $(this).addClass("toolbar-dropdown-active"); 
        $(this).next().show();
    	$(this).attr("data-toggle", 1);
    }else{
        $(this).removeClass("toolbar-dropdown-active"); 
        $(this).next().hide();
    }

	});

	 $(document).mouseup(function (e) {
	    var container = $(".toolbar-dropdown-box");
	    if (container.has(e.target).length === 0){
			$(".toolbar-dropdown-toggle > span").attr("data-toggle", 0).removeClass("toolbar-dropdown-active");
			$(".toolbar-dropdown-toggle .toolbar-dropdown-box").hide();
	    }
	 });


   $(document).on('click','.modal-custom-close', function (e) { 

		$(this).parent().parent().hide();
		$("body").css("overflow", "auto");

   });

   $(document).on('click','.button-click-close', function (e) { 

    $(this).closest(".modal-custom-bg").hide();
    $("body").css("overflow", "auto");

   });

   $(document).on('click','.bg-click-close', function (e) { 

      if (!$(e.target).closest(".modal-custom").length) {
         $(this).hide();
         $("body").css("overflow", "auto");
      }
      e.stopPropagation();

   });

   $(document).on('click','.open-modal', function (e) { 
        
      var id_modal = "#" + $(this).data("id-modal");

      $(".modal-custom-bg").hide();
		  $( id_modal ).show();
		  $("body").css("overflow", "hidden");

   });

   $(document).on('input click','.action-input-search-city', function () {     
      var myThis = $(this); 
      $.ajax({type: "POST",url: url_path + "systems/ajax/geo.php",data: "q="+myThis.val()+"&action=search-city",dataType: "html",cache: false,success: function (data) { if(data != false){ myThis.next().html(data).show(); }else{ myThis.next().html('').hide() }  }});
   });

   $(document).on('click','.SearchCityResults .item-city', function () {      
      $('.SearchCityResults').hide();
      $('input[name="city_id"]').val( $(this).attr("id-city") );
      $(this).parent().parent().find("input").val( $(this).attr("data-city") );
   });

   $(document).on('click', function(e) {
      if (!$(e.target).closest(".action-input-search-city").length && !$(e.target).closest(".modal-geo-search").length && !$(e.target).closest(".custom-results").length) {
        $('.custom-results').hide();
      }
      e.stopPropagation();
   });

   $(document).on('click','.dropdown-click', function () {  

      if( $('.header-wow').css('display') == 'none' ){
          if( $('.header-wow-sticky-mobile-active').length ){
              $(".toolbar-dropdown-box").css( 'top', $('.header-wow-sticky-mobile-active').height() );
          }else{
              $(".toolbar-dropdown-box").css( 'top', $('.header-wow-mobile').height() );
          }
      }else{
          if( $('.header-wow-sticky-active').length ){
              $(".toolbar-dropdown-box").css( 'top', $('.header-wow-sticky-active').height() + 10 );
          }else{
              $(".toolbar-dropdown-box").css( 'top', $('.header-wow-sticky').height() + 10 );
          }        
      }
      
      $(this).find(".toolbar-dropdown-box").toggle();

   });

   $(document).on('click', function(e) {
      if ( !$(e.target).closest(".toolbar-dropdown-js").length && !$(e.target).closest(".dropdown-click").length ) {
        $('.toolbar-dropdown-js').hide();
      }
      e.stopPropagation();
   });

   $(document).on('click','.toggle-favorite', function () {    
      var _this = $(this); 
      $.ajax({type: "POST",url: url_path + "systems/ajax/profile.php",data: "id_ad=" + _this.data("id") + "&action=favorite",dataType: "json",cache: false,success: function (data) { 

         if(data["auth"]){
           if(data["status"]){
             $(".toggle-favorite[data-id="+_this.data("id")+"]").find("i").attr("class","ion-ios-heart");
           }else{
             $(".toggle-favorite[data-id="+_this.data("id")+"]").find("i").attr("class","ion-ios-heart-outline");
           }
         }else{
           $("#modal-auth").show();
           $("body").css("overflow", "hidden");
         }

      }});
   });   

   $(document).on('input click','.modal-geo-search', function () {     
      var myThis = $(this); 
      $.ajax({type: "POST",url: url_path + "systems/ajax/geo.php",data: "q="+myThis.val()+"&action=search-city-region",dataType: "html",cache: false,success: function (data) { if(data != false){ myThis.next().html(data).show(); }else{ myThis.next().html("").hide() }  }});
   });

   $(document).on('click','.modal-geo-change-city .item-city', function () {      

      $.ajax({type: "POST",url: url_path + "systems/ajax/geo.php",data: "city_id="+$(this).attr("id-city")+"&region_id="+$(this).attr("id-region")+"&country_id="+$(this).attr("id-country")+"&action=change-city",dataType: "html",cache: false,success: function (data) { 
         location.reload();
      }});

   });

   $(document).on('click','.cities-alphabet span', function () {      

      var data_id = $(this).data("id");

      $('html, body').animate({ scrollTop: $("#"+data_id).offset().top-70 }, 500);

   });

   $(document).on('click', function(e) {
      if (!$(e.target).closest(".uni-dropdown").length) {
        $('.uni-dropdown-content').hide();
      }
      e.stopPropagation();
   });

   $(document).on('click','.uni-dropdown-name', function () {
      $(this).next().show();
   });

   $(document).on('click','.uni-dropdown-content span', function () {
      $(this).parent().parent().find(".uni-dropdown-name span").html( $(this).data("name") );
      $("input[name="+$(this).data("input")+"]").val( $(this).data("value") );
      $('.uni-dropdown-content').hide();
      if( $(this).data("input") == "currency" ){
          $(".static-currency-sign").html( $(this).data("name") );
      }
   });

   $(document).on('click','.ads-cat-pay-publication', function () {     
      $(".ads-cat-pay-publication").prop('disabled', true);
      $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "id_ad="+$(this).data("id")+"&action=pay_category_publication",dataType: "json",cache: false,success: function (data) { 
         if(data["status"] == true){

            location.href = data["location"];

         }else{
               
            $("#modal-balance").show();
            $(".modal-balance-summa").html( data["balance"] );
            $("body").css("overflow", "hidden");

            $(".ads-cat-pay-publication").prop('disabled', false);
         }
      }});
   });

   $(document).on('click','.buy-payment-goods', function (e) { 
      
      var id = $(this).data("id");

      $(".buy-payment-goods").prop('disabled', true);

        $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "id="+id+"&action=buy_payment_goods",dataType: "json",cache: false,success: function (data) { 
            if( data["status"] == true ){

                if( data["redirect"]["link"] ){
                   location.href = data["redirect"]["link"];
                }else{
                   if(data["redirect"]["form"]){
                        $(".redirect-form-pay").html(data["redirect"]["form"]);
                        $(".form-pay .pay-trans").click();  
                   }else{
                        alert('Uncorrected payment system');
                   }   
                   $(".buy-payment-goods").prop('disabled', false);          
                }

            }else{
               location.reload();
            }
        }});

      e.preventDefault();
   });

   $(document).on('click','.confirm-transfer-goods', function (e) { 
      
      var id = $(this).data("id");

      $(".confirm-transfer-goods").prop('disabled', true);

        $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "id="+id+"&action=confirm_transfer_goods",dataType: "html",cache: false,success: function (data) { 
            location.reload();
        }});

      e.preventDefault();
   });

   $(document).on('click','.confirm-receive-goods', function (e) { 
      
      var id = $(this).data("id");

      $(".confirm-receive-goods").prop('disabled', true);

        $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "id="+id+"&action=confirm_receive_goods",dataType: "html",cache: false,success: function (data) { 
            location.reload();
        }});

      e.preventDefault();
   });

   $(document).on('click','.confirm-cancel-order', function (e) { 
      
      var id = $(this).data("id");

      $(".confirm-cancel-order").prop('disabled', true);

        $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "id="+id+"&action=order_cancel_deal",dataType: "html",cache: false,success: function (data) { 
            location.reload();
        }});

      e.preventDefault();
   });

    var $star_rating = $('.star-rating-js span');
    var SetRatingStar = function() {
        return $star_rating.each(function() {
            if (parseInt($("input[name=rating]").val()) >= parseInt($(this).data('rating'))) {
                return $(this).removeClass('ion-ios-star-outline').addClass('ion-ios-star');
            } else {
                return $(this).removeClass('ion-ios-star').addClass('ion-ios-star-outline');
            }
        });
    };
    $(document).on("click", ".star-rating-js span", function(e) {
        var rating = $(this).data('rating');
        $("input[name=rating]").val(rating);
        return SetRatingStar();
    });
    SetRatingStar();


   $(document).on('submit','.form-dispute-secure', function (e) { 

      $(".form-dispute-secure button").prop('disabled', true);

        var data_form = new FormData($(this)[0]);
        data_form.append('action', 'add_disputes'); 

        $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: data_form,dataType: "json",cache: false,contentType: false,processData: false,                        
            success: function (data){
                if( data["status"] == true ){
                   location.reload();
                }else{
                   alert( data["answer"] );
                   $(".form-dispute-secure button").prop('disabled', false);
                }                                            
            }
        });

      e.preventDefault();
   });

   $('.dispute-secure-attach').click(function (e) { $('.file-dispute-attach').click(); });

   $('.file-dispute-attach').on('change', function(){ 

      if(this.files.length != 0){
         $(".dispute-secure-attach").html( $(".lang-js-4").html() + " (" + this.files.length + ")" );
      }else{
         $(".dispute-secure-attach").html( $(".lang-js-5").html() );
      }        

   });

   $(document).on('click','.feedback-answers-questions', function () { 

       $(this).find("div").toggle();

   });

   $(document).on('submit','.feedback', function (e) { 

      $(".feedback-form button").prop('disabled', true);

        $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: $(this).serialize() + "&action=feedback",dataType: "json",cache: false,                        
            success: function (data){
                if( data["status"] == true ){
                   $(".feedback-success").show();
                   $(".feedback").hide();
                }else{
                   alert( data["answer"] );
                   $(".feedback-form button").prop('disabled', false);
                }                                            
            }
        });

      e.preventDefault();
   });

   $(document).on('click','.modal-geo-options-tab > div', function () { 
       
       $(".modal-geo-options-tab div").removeClass("active");
       $(this).addClass("active");
       $(".modal-geo-options-tab-content > div").hide();
       $(".modal-geo-options-tab-content [data-tab="+$(this).data("id")+"]").show();

   });

   $(document).on('submit','.form-user-subscribe', function (e) { 

      $(".form-user-subscribe button").prop('disabled', true);

        $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: $(this).serialize() + "&action=user_subscribe",dataType: "json",cache: false,                        
            success: function (data){
                if( data["status"] == true ){
                   $(".user-subscribe-success").show();
                   $(".form-user-subscribe").hide();
                }else{
                   alert( data["answer"] );
                   $(".form-user-subscribe button").prop('disabled', false);
                }                                            
            }
        });

      e.preventDefault();
   });

    var adSearchTimeout = null;  
    $('.ajax-live-search').keyup(function() { 
 
      var form = $(this).parents( ".form-ajax-live-search" );
      var results = $(this).parents( ".form-ajax-live-search" ).find( ".main-search-results" );

      if (adSearchTimeout != null) {
        clearTimeout(adSearchTimeout);
      }
      adSearchTimeout = setTimeout(function() {
        adSearchTimeout = null;  

          $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: form.serialize() + "&action=ads_search",dataType: "html",cache: false,                        
              success: function (data){
                  if(data){
                     results.html(data).show(); 
                  }else{
                     results.html("").hide();
                  }                                      
              }
          });

      }, 200);  
    }); 

   $(document).on('click','.ajax-live-search', function (e) { 
       
       var results = $(this).parents( ".form-ajax-live-search" ).find( ".main-search-results" );
       
       if( results.html() != "" ){
           results.show();
       }

   });

   $(document).on('click', function(e) { 

      if (!$(e.target).closest(".main-search-results").length && !$(e.target).closest(".ajax-live-search").length) {
         $(".main-search-results").hide();
      }
      e.stopPropagation();

   });


   var cookieOptions = {expires: 3, path: '/'};

    $(document).on("click", ".block-cookies span", function(e) {
        $(".block-cookies").fadeOut(200, function(){
            $.cookie("cookie-policy", "hide", cookieOptions);
        });
    });

    if($.cookie("cookie-policy") != "hide"){
       setTimeout('$(".block-cookies").show();', 2000);
    }

   $(document).on('click','.catalog-more-filter-show', function (e) { 

       $(".catalog-more-filter").removeClass("catalog-more-filter-action");
       $(".catalog-more-filter-show").hide();
       $(".catalog-more-filter-hide").show();

   });

   $(document).on('click','.catalog-more-filter-hide', function (e) { 

       $(".catalog-more-filter").addClass("catalog-more-filter-action");
       $(".catalog-more-filter-show").show();
       $(".catalog-more-filter-hide").hide();

   });

   $(document).on('click','.item-country-hover', function (e) { 

        var element = $(this);

        $.ajax({type: "POST",url: url_path + "systems/ajax/geo.php",data: "alias=" + $(this).data("alias") + "&action=load_country_city",dataType: "html",cache: false,                        
            success: function (data){
                $('.item-country-hover').removeClass("active");
                element.addClass("active");
                element.parent().parent().parent().parent().find(".modal-country-container").html( data );                                      
            }
        });

   });
   
   $(document).on('click','.modal-ads-subscriptions-add', function (e) { 

       $(".modal-ads-subscriptions-add").prop('disabled', true);

         $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: $(".modal-ads-subscriptions-form").serialize()+"&action=modal_ads_subscriptions_add",dataType: "json",cache: false,success: function (data) { 
             if( data["status"] == true ){
                $(".modal-ads-subscriptions-block-1").hide();
                $(".modal-ads-subscriptions-block-2").show();
             }else{
                alert( data["answer"] );
                $(".modal-ads-subscriptions-add").prop('disabled', false);
             }
         }});

       e.preventDefault();
   });

   $(document).on('click','.catalog-ads-subscriptions-add', function (e) { 

         $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: $(".modal-ads-subscriptions-form").serialize() + "&action=catalog_ads_subscriptions_add",dataType: "json",cache: false,success: function (data) { 
             if( data["status"] == true ){
                 if( data["auth"] == true ){
                   $("#modal-ads-subscriptions").show();
                   $("body").css("overflow", "hidden");
                   $(".modal-ads-subscriptions-block-1").hide();
                   $(".modal-ads-subscriptions-block-2").show();                   
                 }else{
                   $("#modal-ads-subscriptions").show();
                   $("body").css("overflow", "hidden");
                   $(".modal-ads-subscriptions-block-1").show();
                   $(".modal-ads-subscriptions-block-2").hide();                   
                 }
             }else{
                 $("#modal-ads-subscriptions").show();
                 $("body").css("overflow", "hidden");
                 $(".modal-ads-subscriptions-block-1").show();
                 $(".modal-ads-subscriptions-block-2").hide();
             }
         }});

       e.preventDefault();
   });

   $(".js-big-category > div").on("mouseover", function () {
        var id = $(this).data("id");
        $(".header-big-subcategory-menu-list").hide();
        $(".header-big-category-image").hide();
        $(".header-big-category-menu-list a").removeClass("active");
        $(".header-big-subcategory-menu-list a").removeClass("active");
        $(this).find("a").addClass("active");
        $('.header-big-subcategory-menu-list[data-id-parent="'+id+'"]').show();
        $('.header-big-category-image[data-id-parent="'+id+'"]').show();
   });

   $(".js-big-subcategory1 > div").on("mouseover", function () {
        var id = $(this).data("id");
        $(".js-big-subcategory2").hide();
        $(".header-big-subcategory-menu-list a").removeClass("active");
        $(this).find("a").addClass("active");
        $('.header-big-subcategory-menu-list[data-id-parent="'+id+'"]').show();
   });

   $(".js-big-subcategory2 > div").on("mouseover", function () {
        $(".js-big-subcategory2 a").removeClass("active");
        $(this).find("a").addClass("active");
   });

   $(document).on('click','.open-big-menu', function (e) {

        if( $('.header-wow-sticky-active').length ){
            $(".header-big-category-menu").css( 'top', $('.header-wow-sticky-active').height() );
            $(".header-big-category-menu").css( 'height', 'calc( 100% - '+$('.header-wow-sticky-active').height()+'px )' );
        }else{
            $(".header-big-category-menu").css( 'top', $('.header-wow').height() );
            $(".header-big-category-menu").css( 'height', 'calc( 100% - '+$('.header-wow').height()+'px )' );
        }

        $(".header-big-category-menu").toggle();
        $(".header-wow-sticky-menu .la-bars").toggle();
        $(".header-wow-sticky-menu .la-times").toggle();       
        $("body").toggleClass("overflow-hidden"); 
   });

   $(document).on('click','.mobile-open-big-menu', function (e) {

        if( $('.header-wow-sticky-mobile-active').length ){
            $(".header-mobile-menu").css( 'top', $('.header-wow-sticky-mobile-active').height() );
            $(".header-mobile-menu").css( 'height', 'calc( 100% - '+$('.header-wow-sticky-mobile-active').height()+'px )' );
        }else{
            $(".header-mobile-menu").css( 'top', $('.header-wow-mobile').height() );
            $(".header-mobile-menu").css( 'height', 'calc( 100% - '+$('.header-wow-mobile').height()+'px )' );
        }

        $(".header-mobile-menu").toggle();
        $(".mobile-icon-menu-close").toggle();
        $(".mobile-icon-menu-open").toggle();
        $("body").toggleClass("overflow-hidden"); 
        $(".mobile-footer-menu").toggle();
   });


   header_wow_sticky( $(document).scrollTop() );

   function header_wow_sticky(scroll){

        if( $("body").data( "header-sticky" ) == true ){
            if ( scroll >= $('.header-wow-top').height() + 20 && !$('.header-wow-sticky').hasClass('header-wow-sticky-active') ) {
              $('.header-wow-sticky').addClass('header-wow-sticky-active');
             } else if ( scroll <= $('.header-wow-top').height() + 20 ) {
              $('.header-wow-sticky').removeClass('header-wow-sticky-active');
            }
        }
        
   }

    $(window).scroll(function () {
       header_wow_sticky( $(this).scrollTop() );
    });

   $(document).on('click','.site-color-change', function (e) {
     
         $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "color=" + $(this).data("color") + "&action=site_color",dataType: "html",cache: false,success: function (data) { 
             location.reload();
         }});

   });

   $(document).on('click','.modal-edit-site-menu-save', function (e) {
     
         $.ajax({type: "POST",url: url_path + "systems/ajax/admin.php",data: $(".modal-edit-site-menu-form").serialize() + "&action=save_menu",dataType: "html",cache: false,success: function (data) { 
             location.reload();
         }});

   });


   $(document).on('click','.modal-edit-site-menu-add', function (e) {
         
         var key = Math.random();

         $(".modal-edit-site-menu-list").append( `
               <div>
                  <div class="row" >
                     <div class="col-lg-6 col-6" >
                        <input type="text" name="menu[`+key+`][name]" class="form-control" placeholder="Название" >
                     </div>
                     <div class="col-lg-5 col-5" >
                        <input type="text" name="menu[`+key+`][link]" class="form-control" placeholder="Ссылка" >
                     </div>
                     <div class="col-lg-1 col-1" >
                        <span class="modal-edit-site-menu-delete" > <i class="las la-trash"></i> </span>
                     </div>                                                
                  </div>
               </div>
          ` );

   });

   $(document).on('click','.modal-edit-site-menu-delete', function (e) {
     
         $(this).parent().parent().parent().remove().hide();

   });

   $(document).on('click','.floating-menu-catalog, .floating-menu-shops', function (e) {
     
      e.preventDefault();

   });

   var countNewMessage = 0;

   function updateUserChat(){

      if( $(".floating-menu-message").length ){

       $.ajax({type: "POST",url: url_path + "systems/ajax/profile.php",data: "action=update_user_chat",dataType: "json",cache: false,success: function (data) { 
           if( parseInt(data["count"]) ){
               
               $(".floating-menu-message-count").show();
               $(".floating-menu-message-count span").html( data["count"] );

               if( countNewMessage != data["count"] ){

                  countNewMessage = data["count"];

                  $(".floating-menu-message-fragment").removeClass("animated fadeOutDown fadeInRight floating-menu-message-fragment-show");
                  $(".floating-menu-message-fragment").addClass("animated fadeInRight floating-menu-message-fragment-show");
                  $(".floating-menu-message-fragment").html( data["text"] );   

                  setTimeout(function() {
                     $(".floating-menu-message-fragment").addClass("animated fadeOutDown");
                  }, 5000);

               } 

           }else{
                $(".floating-menu-message-count").hide();
                $(".floating-menu-message-fragment").removeClass("animated fadeOutDown fadeInRight floating-menu-message-fragment-show");
           }
       }}); 

      }    

   }

   setInterval(function() {
      updateUserChat();
   }, 3000);

   updateUserChat();

});


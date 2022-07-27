$(document).ready(function () {

var url_path = $("body").data("prefix");

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

dragula([document.getElementById('dragula')]);

$(document).on('change','.ads-create-main-data-filters input[type=radio]', function (e) { 

    var id_filter = $(this).closest(".filter-items").attr("id-filter");
    var id_parent = $(this).closest(".filter-items").attr("main-id-filter");
    var id_item = $(this).val();
    var element = $(this);

    if($(this).closest(".filter-items").attr("data-ids") != undefined){
       var ids = $(this).closest(".filter-items").attr("data-ids").split(",");
    }

    if(ids){

      $.each(ids,function(index,value){

        $('div[id-filter="'+value+'"]').remove();

      });

    }

    if($(this).val() != "null"){ 

      $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "id_filter="+id_filter+"&id_item="+id_item+"&view=ad&action=load_items_filter",dataType: "html",cache: false,success: function (data) {

          element.closest(".filter-items").after(data);

      }}); 

    }

    e.preventDefault();
});

 $(document).on('click','.SearchMetroResults div', function (e) { 

    var color = $(this).data("color");
    var name = $(this).data("name");
    var id = $(this).data("id");

    if( !$(".ads-container-metro-station").find("input[value="+id+"]").length ){
    
    $(".ads-container-metro-station").append('<span><i style="background-color:'+color+';"></i>'+name+' <i class="las la-times ads-metro-delete"></i><input type="hidden" value="'+id+'" name="metro[]"></span>');
    
    }

    $(".SearchMetroResults").hide();
    $(".action-input-search-metro").val("");

 });

 $(document).on('click','.ads-metro-delete', function (e) { 

    $(this).parent().remove();

 });

$(document).on('input click', '.action-input-search-metro', function (e) {
  $.ajax({
    type: "POST",
    url: url_path + "systems/ajax/geo.php",
    data: "city_id=" + $("input[name=city_id]").val() + "&search=" + $(this).val() + "&action=search_metro",
    dataType: "html",
    cache: false,
    success: function (data) {
      if (data != false) {
        $(".SearchMetroResults").html(data).show();
      } else {
        $(".SearchMetroResults").html("").hide();
      }
    }
  });
});

$(document).on('click', '.SearchCityOptions .item-city', function () {
  $.ajax({
    type: "POST",
    url: url_path + "systems/ajax/geo.php",
    data: "id=" + $(this).attr("id-city") + "&action=city-options",
    dataType: "html",
    cache: false,
    success: function (data) {

      $(".ads-create-main-data-city-options").html( data ).show();

    }
  });
});

$(document).on('click','.ads-create-publish', function (e) { 
    
    $(".msg-error").hide();

    var element = $(this);
    var element_index = [];

    element.prop('disabled', true);
    $(".action-load-span-start").show();
    
    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: $(".ads-form-ajax").serialize()+"&action="+$(this).data("action"),dataType: "json",cache: false,success: function (data) { 

        if(data["status"] == true){

            location.href = data["location"];

        }else{

            element.prop('disabled', false);
            $(".action-load-span-start").hide();

            if( data["answer"] ){

                $(".ads-create-main-data-filters-list").show();
                $(".ads-create-main-data-filters-spoiler").hide();

                $.each( data["answer"] ,function(index,value){
                  
                  $(".msg-error[data-name="+index+"]").html(value).show();
                  element_index.push( index );

                });
                
                if( $(".msg-error[data-name="+element_index[0]+"]").length ){
                    $('html, body').animate({ scrollTop: $(".msg-error[data-name="+element_index[0]+"]").offset().top-200 }, 500);
                }

                element.prop('disabled', false);

            }else if( data["auth"] ){

                location.reload();               

            }

        }


    }});
  
  e.preventDefault();
     
});

function categoryParam(paramJson){

    if( paramJson["data"]["title"] ){
        $(".ads-create-main-data-title").html( paramJson["data"]["title"] ).show();
    }else{
        $(".ads-create-main-data-title").html( '' ).hide();
    }

    if( paramJson["data"]["filters"] ){
        $(".ads-create-main-data-filters").html( paramJson["data"]["filters"] ).show();
    }else{
        $(".ads-create-main-data-filters").html( '' ).hide();
    }

    if( paramJson["data"]["price"] ){
        $(".ads-create-main-data-price").html( paramJson["data"]["price"] ).show();
    }else{
        $(".ads-create-main-data-price").html( '' ).hide();
    }

    if( paramJson["data"]["online_view"] ){
        $(".ads-create-main-data-online-view").html( paramJson["data"]["online_view"] ).show();
    }else{
        $(".ads-create-main-data-online-view").html( '' ).hide();
    }


}


$(document).on('click','.ads-create-main-category-list-item', function (e) { 
    
    var el = $(this);

    el.parents(".ads-create-main-category").addClass("ads-create-category-bg-selected");
    $(".ads-create-main-category-list-item").removeClass("ads-create-main-category-change");
    el.addClass("ads-create-main-category-change");

    $("input[name=c_id]").val($(this).attr("data-id"));

    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "var=create&id="+$(this).attr("data-id")+"&action=create_load_category",dataType: "json",cache: false,success: function (data) {  
       
       if(data["subcategory"] == true){

          $(".ads-create-subcategory").html( data["data"] ).show();
          $(".ads-create-main-data").hide();

          $('html, body').animate({
          scrollTop: $('.ads-create-subcategory').offset().top-100
          }, 500, 'linear');

       }else{
          categoryParam( data );
          $(".ads-create-main-data").show();

          $('html, body').animate({
          scrollTop: $('.ads-create-main-data').offset().top-100
          }, 500, 'linear');

       }

       $('.inputNumber').inputNumber({ thousandSep: ' ' });
       

    }});


});

$(document).on('click','.ads-create-subcategory-list span', function (e) { 
    
    $(".ads-create-subcategory-list span").removeClass("ads-create-subcategory-change");
    $(this).addClass("ads-create-subcategory-change");
    
    $("input[name=c_id]").val($(this).attr("data-id"));

    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "var=create&id="+$(this).attr("data-id")+"&action=create_load_category",dataType: "json",cache: false,success: function (data) {  
       
       if(data["subcategory"] == true){

          $(".ads-create-subcategory").html( data["data"] ).show();
          $(".ads-create-main-data").hide();

          $('html, body').animate({
          scrollTop: $('.ads-create-subcategory').offset().top-100
          }, 500, 'linear');

       }else{

          categoryParam( data );
          $(".ads-create-main-data").show();

          $('html, body').animate({
          scrollTop: $('.ads-create-main-data').offset().top-100
          }, 500, 'linear');

       }

       $('.inputNumber').inputNumber({ thousandSep: ' ' });

    }});


});

$(document).on('click','.ads-create-subcategory-prev', function (e) { 
    
    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "var=create&id="+$(this).attr("data-id")+"&action=create_load_category",dataType: "json",cache: false,success: function (data) {  
       
          $(".ads-create-subcategory").html( data["data"] ).show();

    }});


});

$(document).on('input','input[name=title], textarea[name=text]', function (e) { 
    
    $(this).next().find('span').html( $(this).val().length );

});

$(document).on('click','.ads-create-main-data-filters-spoiler', function (e) { 
    
    $(this).hide();
    $(".ads-create-main-data-filters-list").show();

});

$(document).on('change','input[name=price_free]', function (e) { 
    
    if( $(this).prop("checked") == true ){
        $('input[name=price]').prop("disabled", true);
    }else{
        $('input[name=price]').prop("disabled", false);
    }

});

$(document).on('click','.ads-create-main-data-price-variant', function (e) { 
    
    $(".ads-create-main-data-price-variant").removeClass("ads-create-main-data-price-variant-active");
    $(this).addClass("ads-create-main-data-price-variant-active");

    $("input[name=var_price]").val( $(this).data("var") );

    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "variant=" + $(this).data("var") + "&id="+$("input[name=c_id]").val()+"&action=create_load_variant_price",dataType: "json",cache: false,success: function (data) {  
       
       $(".ads-create-main-data-price-container").html( data["price"] );
       $(".ads-create-main-data-stock-container").html( data["stock"] );

       $('.inputNumber').inputNumber({ thousandSep: ' ' });
       
    }});


});

$(document).on('change','input[name=stock]', function (e) { 
    
    if( $(this).prop("checked") == true ){
        var variant = 'stock';
    }else{
        var variant = 'fix';
    }

    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "variant=" + variant + "&id="+$("input[name=c_id]").val()+"&action=create_load_variant_price",dataType: "json",cache: false,success: function (data) {  
       
       $(".ads-create-main-data-price-container").html( data["price"] );

       $('.inputNumber').inputNumber({ thousandSep: ' ' });
       
    }});    

});

$(document).on('click','.create-accept-phone', function (e) { 
    
    $(".ads-create-main-data-user-options-phone-1 .msg-error, .ads-create-main-data-user-options-phone-2 .msg-error").hide();

    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "phone=" + $(".create-phone").val() + "&action=create_accept_phone",dataType: "json",cache: false,success: function (data) {  
       
       if( data["status"] == true ){
           $(".ads-create-main-data-user-options-phone-1").hide();
           $(".ads-create-main-data-user-options-phone-2").show();
       }else{
           $(".msg-error[data-name=phone]").html(data["answer"]).show();
       }
       
    }});

  e.preventDefault();    

});

$(document).on('click','.create-cancel-phone', function (e) { 
    
  $(".ads-create-main-data-user-options-phone-2").hide();
  $(".ads-create-main-data-user-options-phone-1").show();

  $(".ads-create-main-data-user-options-phone-1 .msg-error, .ads-create-main-data-user-options-phone-2 .msg-error").hide();

  $('.create-verify-phone').prop( "disabled", false );

  e.preventDefault();    

});

$(document).on('input','.create-verify-phone', function (e) { 
    
    $(".ads-create-main-data-user-options-phone-1 .msg-error, .ads-create-main-data-user-options-phone-2 .msg-error").hide();

    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "phone=" + $(".create-phone").val() + "&code=" + $(this).val() + "&action=create_verify_phone",dataType: "html",cache: false,success: function (data) {  
       
       if( data == true ){
           $('.create-verify-phone').prop( "disabled", true );
       }else{
           $(".msg-error[data-name=verify-code]").html(data).show();
       }
       
    }});

  e.preventDefault();    

});

$(document).on('click','.ads-update-category-list > span', function (e) { 
    
    var el = $(this);

    $.ajax({type: "POST",url: url_path + "systems/ajax/ads.php",data: "var=update&id="+$(this).attr("data-id")+"&action=create_load_category",dataType: "json",cache: false,success: function (data) {  
      
       if(data["subcategory"] == true){

          $(".ads-update-category-list").html( data["data"] ).show();

       }else{
          
          $('.ads-update-category-box > span').html( el.attr("data-name") );
          categoryParam( data );
          $(".ads-update-category-list").hide();
          $("input[name=c_id]").val( el.attr("data-id") );

       }

       $('.inputNumber').inputNumber({ thousandSep: ' ' });
       

    }});


});

$(document).on('click','.ads-update-category-box > span', function (e) { 

    $(".ads-update-category-list").toggle();

    $(".ads-update-category-list").css( 'top', $( '.ads-update-category-box' ).height() + 20 );

});

$(document).on('click', function(e) {
  if (!$(e.target).closest(".ads-update-category-box > span").length && !$(e.target).closest(".ads-update-category-list").length) {
       $(".ads-update-category-list").hide();
  }
  e.stopPropagation();
});



});

$(window).load(function() { 

    $(".display-load-page").show();
    $(".preload").hide();

});

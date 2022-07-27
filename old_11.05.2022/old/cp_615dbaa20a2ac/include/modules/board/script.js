$(document).ready(function() {
    $.getScript('files/js/javascript.js');


    $(document).on('click','.delete-ads', function () {    
     var uid = $(this).attr("data-id");
     
           swal({
              title: "Вы действительно хотите выполнить удаление?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: "Да",
              cancelButtonText: "Нет"
            }).then((result) => {
              if (result.value) {
                  $('.proccess_load').show();
                  $.ajax({
                      type: "POST",url: "include/modules/board/handlers/delete.php",data: "id="+uid,dataType: "html",cache: false,
                      success: function (data) {
                        location.reload();
                      }
                  });                 
              }
            })

        return false;         
    });

    $(document).on('click','.delete-complaint', function () {    
     var uid = $(this).attr("data-id");
     
           swal({
              title: "Вы действительно хотите выполнить удаление?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: "Да",
              cancelButtonText: "Нет"
            }).then((result) => {
              if (result.value) {
                  $('.proccess_load').show();
                  $.ajax({
                      type: "POST",url: "include/modules/board/handlers/delete_complaint.php",data: "id="+uid,dataType: "html",cache: false,
                      success: function (data) {
                        location.reload();
                      }
                  });                 
              }
            })

        return false;         
    });

    $(document).on('change','.checkbox_prop', function (e) { 
        if($(this).prop("checked") == false){ $(".form-data input.input_prop_id").prop("checked", false); $(".action_group_block").hide(); } else { $(".form-data input.input_prop_id").prop("checked", true); $(".action_group_block").show(); }
    });    

    $(document).on('change','.form-data input.input_prop_id', function (e) {
        if($(this).prop("checked") == false){ if($(".form-data input.input_prop_id:checked").length == 0) $(".action_group_block").hide(); } else { $(".action_group_block").show(); }
    });


    $(document).on('click','.action_group', function () {  

        var ids = $(".form-data input.input_prop_id").serialize();
        var action = $(this).data("action");

        if(action == "publication"){

          $('.proccess_load').show();
          $.ajax({
              type: "POST",url: "include/modules/board/handlers/status.php",data: ids + "&status=1",dataType: "html",cache: false,
              success: function (data) {
                location.reload();
              }
          });

        }else if(action == "not_publication"){

          $('.proccess_load').show();
          $.ajax({
              type: "POST",url: "include/modules/board/handlers/status.php",data: ids + "&status=2",dataType: "html",cache: false,
              success: function (data) {
                location.reload();
              }
          });

        }else if(action == "extend"){
          
          $('.proccess_load').show();
          $.ajax({
              type: "POST",url: "include/modules/board/handlers/extend.php",data: ids,dataType: "html",cache: false,
              success: function (data) {
                location.reload();
              }
          });

        }else if(action == "delete"){
          
           swal({
              title: "Вы действительно хотите выполнить удаление?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: "Да",
              cancelButtonText: "Нет"
            }).then((result) => {
              if (result.value) {
                  $('.proccess_load').show();
                  $.ajax({
                      type: "POST",url: "include/modules/board/handlers/delete.php",data: ids,dataType: "html",cache: false,
                      success: function (data) {
                        location.reload();
                      }
                  });                 
              }
            })

        }

        
        return false;         
    });


    $(document).on('click','.action-block-ads', function () {  
      $('.proccess_load').show();
      $.ajax({
          type: "POST",url: "include/modules/board/handlers/block.php",data: $(".form-block-ads").serialize(),dataType: "html",cache: false,
          success: function (data) {
            if(data == true){
              location.reload();                    
            }else{
              $('.proccess_load').hide();
              notification();                          
            }
          }
      });  

    });

    $(document).on('click','.action-refused-ads', function () {  
      $('.proccess_load').show();
      $.ajax({
          type: "POST",url: "include/modules/board/handlers/refused.php",data: $(".form-refused-ads").serialize(),dataType: "html",cache: false,
          success: function (data) {
            if(data == true){
              location.reload();                    
            }else{
              $('.proccess_load').hide();
              notification();                          
            }
          }
      });  

    });

    $(document).on('click','.change-status-ads', function () {  

     var id = $(this).data("id");
     var status = $(this).data("status");

         if(status == 3){

          $("#modal-block-ads").modal("show");
          $(".form-block-ads input[name=id_ad]").val(id);

         }else if(status == 7){

          $("#modal-refused-ads").modal("show");
          $(".form-refused-ads input[name=id_ad]").val(id);

         }else{

              $('.proccess_load').show();
              $.ajax({
                  type: "POST",url: "include/modules/board/handlers/status.php",data: "id="+id+"&status="+status,dataType: "html",cache: false,
                  success: function (data) {
                     location.reload();
                  }
              });

         }
     
        return false;         
    });

    $(document).on('click','.feed-toggle-param', function () {  
       
        $(".feed-toggle-param-text").toggle();  

    });

    $(document).on('change','.form-refused-ads select', function () {  
       
        if( $(this).val() == "" ){
           $(".refused-ads-comment").show();
        }else{
           $(".refused-ads-comment").hide();
           $(".refused-ads-comment textarea").val("");
        }  

    });

    $(document).on('change','.form-block-ads select', function () {  
       
        if( $(this).val() == "" ){
           $(".block-ads-comment").show();
        }else{
           $(".block-ads-comment").hide();
           $(".block-ads-comment textarea").val("");
        }  

    });


}); 
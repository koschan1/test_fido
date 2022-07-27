$(document).ready(function() {
    $.getScript('files/js/javascript.js');

    $('.load_edit_services').click(function (e) {  
    var data_id = $(this).attr("data-id");    
        $('.proccess_load').show(); 
        $.ajax({
            type: "POST",url: "include/modules/services_ad/handlers/load_edit.php",data: "id="+data_id,dataType: "html",cache: false,                                                
            success: function (data) {
                $('.proccess_load').hide();
                $(".form-services-edit").html(data);
                $("#modal-services-edit").modal("show");              
            }
        });
        e.preventDefault();
    });     


    var fixHelper = function(e, ui) {
        ui.children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    };

    $('.sort-container').sortable({ 
        axis: 'y',
        opacity: 0.5,
        cursor: "move",
        helper: fixHelper,
        containment:'.sort-container',
        handle:'.move-sort',
        stop: function(){
            var arr = $('.sort-container').sortable("toArray");
            $.ajax({url: "include/modules/services_ad/handlers/sorting.php",type: 'POST',data: {arrays:arr},
                success: function(data){
                   notification();
                }
            });
        }           
    });

    $('.board-edit-services').click(function (e) {
        var data_form = new FormData($('.form-services-edit')[0]);     
        $('.proccess_load').show(); 
        $.ajax({
            type: "POST",url: "include/modules/services_ad/handlers/edit.php",data: data_form,dataType: "html",cache: false,contentType: false,processData: false,                                                
            success: function (data) {
                $('.proccess_load').hide();
                notification();              
            }
        });
        e.preventDefault();
    });

    $(document).on('change','#rad-1', function (e) { $(".box-variant-services1").show(); $(".box-variant-services2").hide(); });
    $(document).on('change','#rad-2', function (e) { $(".box-variant-services2").show(); $(".box-variant-services1").hide(); });

});
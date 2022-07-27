<?php if($_SESSION["cp_control_settings"]){ ?>
<div id="modal-exclamation" class="modal fade">
   <div class="modal-dialog" style="max-width: 750px;" >
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Предупреждения</h4>
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
            <span class="sr-only">close</span>
            </button>
         </div>
         <div class="modal-body">
            
               <?php echo $getWarning["html"]; ?>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-shadow" data-dismiss="modal">Закрыть</button>
         </div>
      </div>
   </div>
</div>
<?php } ?>
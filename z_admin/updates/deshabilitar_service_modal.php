
<div class="modal fade" id="desactivar_service<?php echo $row_services_reveal['id_services']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
      <h5 class="modal-title text-secondary" id="exampleModalLabel">
        </h5>
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      Service<b>&nbsp;<?php echo $row_services_reveal['name_producto'];?>&nbsp;</b> will change to not available. 
</div> <!-- cierre modal body -->

<form method="post">

      <div class="modal-footer"> 

    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

    <input name="name_del_cambiante" type="hidden" value="<?php echo $row_services_reveal['name_producto']; ?>">

    <button type="submit" name="no_service" class="btn btn-secondary"
    value="<?php echo $row_services_reveal['id_services']; ?>" >Change Service</button>

      </div>


  </form>


      
      </div>
      </div> 
</div>
<!-- cierre modal de desactivar --> 







<div class="modal fade" id="activar_service<?php echo $row_services_reveal['id_services']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
      <h5 class="modal-title text-success" id="exampleModalLabel">
        </h5>
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
Service<b>&nbsp;<?php echo $row_services_reveal['name_producto'];?>&nbsp;</b> will change to available. 
</div> <!-- cierre modal body -->
     
    
<form method="post">

      <div class="modal-footer"> 

    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

    <input name="name_del_cambiante" type="hidden" value="<?php echo $row_services_reveal['name_producto']; ?>">

    <button type="submit" name="with_service" class="btn btn-success"
    value="<?php echo $row_services_reveal['id_services']; ?>" >Change Service</button>

      </div>


  </form>












    
      </div>
      </div>     
</div>
<!-- cierre modal de desactivar --> 

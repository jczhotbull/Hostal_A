
<!-- ini modal eliminar -->

<div class="modal fade" id="delete_service<?php echo $row_usuarios_services_listos['id_guests_services_check_in']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">
        <i class="fas fa-exclamation-triangle fa-lg"></i> &nbsp;Alert!!!</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Service<b>&nbsp;"&nbsp;<?php echo $row_usuarios_services_listos['name_producto'];?> "&nbsp;</b> will be removed. 
      </div>
      <div class="modal-footer">

  <form method="post">

  <input name="product_name" type="hidden" value="<?php echo $row_usuarios_services_listos['name_producto']; ?>">

    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrar_service_serv" class="btn btn-danger"
     value="<?php echo $row_usuarios_services_listos['id_guests_services_check_in']; ?>" >
          <i class="fa-regular fa-trash-can"></i></button>  

  </form>


      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->  
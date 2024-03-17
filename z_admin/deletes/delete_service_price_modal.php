
<!-- ini modal eliminar -->

<div class="modal fade" id="delete_service_price<?php echo $row_services_serv_current['id_services_prices']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
      Last price set on<b>&nbsp;"&nbsp;<?php echo $row_services_serv_count['name_producto'];?> "&nbsp;</b> will be deleted. 
      </div>
      <div class="modal-footer">

  <form method="post">

  

    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrar_price" class="btn btn-danger"
    value="<?php echo $row_services_serv_current['id_services_prices']; ?>" >
          <i class="fa-regular fa-trash-can"></i></button>  

  </form>


      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->  

<!-- ini modal eliminar -->

<div class="modal fade" id="delete_b_inc<?php echo $row_rooms_reveal_inc['id_reporte_incidencias_b']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
      Incident<b>&nbsp;"&nbsp;<?php echo $row_rooms_reveal_inc['name_incidents_beds'];?> "&nbsp;</b> will be deleted. 
      </div>
      <div class="modal-footer">

  <form method="post">

  <input name="room_inc" type="hidden" value="<?php echo $row_rooms_reveal_inc['name_incidents_beds']; ?>">

    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrar_inc_b" class="btn btn-danger"
     value="<?php echo $row_rooms_reveal_inc['id_reporte_incidencias_b']; ?>" >
          <i class="fa-regular fa-trash-can"></i></button>  

  </form>


      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->  
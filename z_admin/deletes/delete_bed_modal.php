
<!-- ini modal eliminar -->

<div class="modal fade" id="delete_cama<?php echo $row_rooms_details['id_rooms_beds']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
      Bed<b>&nbsp;"&nbsp;<?php echo $row_rooms_details['name_bed_number'];?> "&nbsp;</b> will be deleted. 
      </div>
      <div class="modal-footer">

  <form method="post">

  <input name="bed_name_or_n" type="hidden" value="<?php echo $row_rooms_details['name_bed_number']; ?>">

    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrar_bed" class="btn btn-danger" value="<?php echo $row_rooms_details['id_rooms_beds']; ?>" >
          <i class="fa-regular fa-trash-can"></i></button>  

  </form>


      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->  
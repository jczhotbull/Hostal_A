
<!-- ini modal eliminar -->

<div class="modal fade" id="borrar<?php echo $row_hostels['id_hostel']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
         <b>&nbsp;"&nbsp;<?php echo $row_hostels['name_hostel'];?> "&nbsp;</b> will be deleted. 
      </div>
      <div class="modal-footer">

  <form method="post">

    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrar_hostel" class="btn btn-danger" value="<?php echo $row_hostels['id_hostel']; ?>" >
          <i class="fa-regular fa-trash-can"></i></button>  

  </form>


      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->  
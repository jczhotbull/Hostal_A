



<!-- ini modal eliminar logo -->

<div class="modal fade" id="borrar_logo<?php echo $row_hostels['id_hostel']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">
        <i class="fas fa-exclamation-triangle fa-lg"></i></h5>


      </div>
      <div class="modal-body">
        <?php echo $row_hostels['name_hostel'];?> <b>logo</b> will be deleted. 
      </div>
      <div class="modal-footer">

  <form method="post" name="delete_logoX"> 

    <input type="hidden" id="update_numX" name="update_numX"
    value="<?php echo $row_hostels['code_hostel']; ?>">  


     <input type="hidden" id="id_plantRR" name="id_plantRR"
    value="<?php echo $row_hostels['id_hostel']; ?>">  



    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrarXX" id="borrarXX" class="btn btn-danger" >
          <i class="fa-solid fa-trash-can"></i></button>   <!--  -->    

  </form>







      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->
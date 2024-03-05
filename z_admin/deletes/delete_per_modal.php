
<!-- ini modal eliminar -->

<div class="modal fade" id="borrar<?php echo $row_usuarios['id_per']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
         <b>&nbsp;"&nbsp;<?php echo $row_usuarios['p_surname_per'];?> 
                                     <?php echo $row_usuarios['p_name_per'];?> 
                             "&nbsp;</b> will be deleted.
      </div>
      <div class="modal-footer">

  <form method="post">

<input type="hidden" id="id_addrexx"   name="id_addrexx"   value="<?php echo $row_usuarios['id_address']; ?>">
<input type="hidden" id="id_dataxx"    name="id_dataxx"   value="<?php echo $row_usuarios['id_data_per']; ?>">

    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrar_per" class="btn btn-danger" value="<?php echo $row_usuarios['id_per']; ?>" >
          <i class="fa-regular fa-trash-can"></i></button>  

  </form>


      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->  
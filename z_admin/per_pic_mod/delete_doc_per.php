



<!-- ini modal eliminar logo -->

<div class="modal fade" id="borrar_doc_per<?php echo $row_usuarios['id_per']; ?>" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">
        <i class="fas fa-exclamation-triangle fa-lg"></i></h5>


      </div>
      <div class="modal-body">
        <?php echo $row_usuarios['p_surname_per'];?>, <?php echo $row_usuarios['p_name_per'];?> <b>Doc or Id</b> will be deleted. 
      </div>
      <div class="modal-footer">

  <form method="post" name="delete_pic_per"> 

    <input type="hidden" id="update_docX" name="update_docX"
    value="<?php echo $row_usuarios['doc_per']; ?>">  


     <input type="hidden" id="id_per_RR" name="id_per_RR"
    value="<?php echo $row_usuarios['id_per']; ?>">  


         <input type="hidden" id="id_data_per_RR" name="id_data_per_RR"
    value="<?php echo $row_usuarios['id_data_per']; ?>">  



    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrarXX_doc_per" id="borrarXX_doc_per" class="btn btn-danger" >
          <i class="fa-solid fa-trash-can"></i></button>   <!--  -->    

  </form>







      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->
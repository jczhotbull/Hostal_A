<!-- ini modal retirar --> 
<div class="modal fade" id="desactivar<?php echo $row_usuarios['id_per']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        
      <h5 class="modal-title text-secondary" id="exampleModalLabel">
        <i class="far fa-bell-slash fa-lg"></i> - Registered for the first time on
 <?php $fecha_de_primer_registro_formateada = date('d-m-Y', strtotime($row_usuarios['creado_el']));
 echo $fecha_de_primer_registro_formateada;
 ?>, by &nbsp;<b><?php echo $row_usuarios_whoL['p_surname_per'];?></b>&nbsp;<?php echo $row_usuarios_whoL['p_name_per'];?>.
  </h5>
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="post">
      <div class="modal-body">

      <?php

$id_del_reg = $row_usuarios['id_per'];      
include ("../conectar.php");    // me da la info si existe de la tabla quien y cuando per

$queryFHL_status_changes = "SELECT * FROM quien_y_cuando_per, tb_personal                    
WHERE  quien_y_cuando_per.id_quien_act_o_desact = tb_personal.id_per        
and  quien_y_cuando_per.id_per_act_o_desact = '$id_del_reg' 
order by fecha_act_o_desact DESC";

$usuarios_status_changes = mysqli_query($enlace, $queryFHL_status_changes) or die(mysqli_error());
$row_usuarios_status_changes = mysqli_fetch_assoc($usuarios_status_changes);
$totalRows_usuarios_status_changes = mysqli_num_rows($usuarios_status_changes);

mysqli_close($enlace);

?>



<table class="table table-hover mt-3" <?php if ( $totalRows_usuarios_status_changes == '0' ){?>style="display:none"<?php } ?>  >
  <thead>
   
    <tr>
      <th colspan="4"><b>Historical:</b></th>
      
    </tr>
   
  
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">By</th>
      <th scope="col">Observations</th>
    </tr>


  </thead>


  <tbody>

  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


    <tr>
      <td><?php

$fecha_formateada = date('d-m-Y', strtotime($row_usuarios_status_changes['fecha_act_o_desact']));

echo $fecha_formateada; ?></td>

     
     
     <td><?php
      
$statuto_cc = $row_usuarios_status_changes['historial_status'];


if ($statuto_cc == '0') { $el_esta_asi = 'Inactive'; }

else {$el_esta_asi = 'Active';}
            
      echo $el_esta_asi; ?></td>


      <td> <b><?php
    

      $id_del_responsable = $row_usuarios_status_changes['id_quien_act_o_desact'];      
      include ("../conectar.php");    // me da la info si existe de la tabla quien y cuando per
      
      $queryFHL_fue = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal                    
      WHERE  id_per = '$id_del_responsable' limit 1";
      
      $usuarios_fue = mysqli_query($enlace, $queryFHL_fue) or die(mysqli_error());
      $row_usuarios_fue = mysqli_fetch_assoc($usuarios_fue);
      $totalRows_usuarios_fue = mysqli_num_rows($usuarios_fue);
      
      mysqli_close($enlace);              
      
      echo $row_usuarios_fue['p_name_per']; ?></b> <?php echo $row_usuarios_fue['p_surname_per']; ?>.</td>

      
      <td><?php echo $row_usuarios_status_changes['text_act_o_desact']; ?></td>


    </tr>
    
 <?php } while ($row_usuarios_status_changes = mysqli_fetch_assoc($usuarios_status_changes)); ?>

  </tbody>
</table>




<div class="form-row mt-5">
  <div class="input-group col-md-8 mt-2 mb-1 text-muted ">
   <b>Add Obs:</b>
  </div>
  </div>


  <div class="form-row ">
  <div class="col-md-11">    

  <textarea maxlength="109" class="form-control" id="nota_text<?php echo $row_usuarios['id_per']; ?>"
   name="nota_text" rows="1" required></textarea>

  </div>

  <div class="col-md-1">    
  <span id="chars<?php echo $row_usuarios['id_per']; ?>">109</span>.
  </div>


  </div> <!-- cierre row  de nota -->


  <script type="text/javascript">
  
var maxLength = 109;
$('#nota_text<?php echo $row_usuarios['id_per']; ?>').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength-length;
  $('#chars<?php echo $row_usuarios['id_per']; ?>').text(length);
});

</script>



</div> <!-- cierre modal body -->


      <div class="modal-footer"> 

    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

<input name="desactivado_by" type="hidden" value="<?php echo $_SESSION['id_per']; ?>">

<input name="name_del_cambiante" type="hidden" value="<?php echo $row_usuarios_whoL['p_name_per']; ?>">
<input name="apellido_del_cambiante" type="hidden" value="<?php echo $row_usuarios_whoL['p_surname_per']; ?>">

    <button type="submit" name="inactive_personal" class="btn btn-secondary"
    value="<?php echo $row_usuarios['id_per']; ?>" >Pass To Inactive</button>

      </div>


</form>




    </div>  <!-- cierre div modal content --> 
  </div>
</div>
<!-- cierre modal de desactivar --> 











<!-- ini modal activar --> 
<div class="modal fade" id="activar<?php echo $row_usuarios['id_per']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        
      <h5 class="modal-title text-success" id="exampleModalLabel">
        <i class="far fa-bell fa-lg"></i> - Registered for the first time on
 <?php $fecha_de_primer_registro_formateada = date('d-m-Y', strtotime($row_usuarios['creado_el']));
 echo $fecha_de_primer_registro_formateada;
 ?>, by &nbsp;<b><?php echo $row_usuarios_whoL['p_surname_per'];?></b>&nbsp;<?php echo $row_usuarios_whoL['p_name_per'];?>.
  </h5>
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="post">
      <div class="modal-body">

      <?php

$id_del_reg = $row_usuarios['id_per'];      
include ("../conectar.php");    // me da la info si existe de la tabla quien y cuando per

$queryFHL_status_changes = "SELECT * FROM quien_y_cuando_per, tb_personal                    
WHERE  quien_y_cuando_per.id_quien_act_o_desact = tb_personal.id_per        
and  quien_y_cuando_per.id_per_act_o_desact = '$id_del_reg' 
order by fecha_act_o_desact DESC";

$usuarios_status_changes = mysqli_query($enlace, $queryFHL_status_changes) or die(mysqli_error());
$row_usuarios_status_changes = mysqli_fetch_assoc($usuarios_status_changes);
$totalRows_usuarios_status_changes = mysqli_num_rows($usuarios_status_changes);

mysqli_close($enlace);

?>



<table class="table table-hover mt-3" <?php if ( $totalRows_usuarios_status_changes == '0' ){?>style="display:none"<?php } ?>  >
  <thead>
   
    <tr>
      <th colspan="4"><b>Historical:</b></th>
      
    </tr>
   
  
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">By</th>
      <th scope="col">Observations</th>
    </tr>


  </thead>


  <tbody>

  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


    <tr>
      <td><?php

$fecha_formateada = date('d-m-Y', strtotime($row_usuarios_status_changes['fecha_act_o_desact']));

echo $fecha_formateada; ?></td>

     
     
     <td><?php
      
$statuto_cc = $row_usuarios_status_changes['historial_status'];


if ($statuto_cc == '0') { $el_esta_asi = 'Inactive'; }

else {$el_esta_asi = 'Active';}
            
      echo $el_esta_asi; ?></td>


      <td> <b><?php
    

      $id_del_responsable = $row_usuarios_status_changes['id_quien_act_o_desact'];      
      include ("../conectar.php");    // me da la info si existe de la tabla quien y cuando per
      
      $queryFHL_fue = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal                    
      WHERE  id_per = '$id_del_responsable' limit 1";
      
      $usuarios_fue = mysqli_query($enlace, $queryFHL_fue) or die(mysqli_error());
      $row_usuarios_fue = mysqli_fetch_assoc($usuarios_fue);
      $totalRows_usuarios_fue = mysqli_num_rows($usuarios_fue);
      
      mysqli_close($enlace);              
      
      echo $row_usuarios_fue['p_name_per']; ?></b> <?php echo $row_usuarios_fue['p_surname_per']; ?>.</td>

      
      <td><?php echo $row_usuarios_status_changes['text_act_o_desact']; ?></td>


    </tr>
    
 <?php } while ($row_usuarios_status_changes = mysqli_fetch_assoc($usuarios_status_changes)); ?>

  </tbody>
</table>




<div class="form-row mt-5">
  <div class="input-group col-md-8 mt-2 mb-1 text-success ">
   <b>Add Obs:</b>
  </div>
  </div>


  <div class="form-row ">
  <div class="col-md-11">    

  <textarea maxlength="109" class="form-control" id="nota_text_2"<?php echo $row_usuarios['id_per']; ?>"
   name="nota_text_2" rows="1" required></textarea>

  </div>

  <div class="col-md-1">    
  <!-- <span id="chars_2<?php echo $row_usuarios['id_per']; ?>">109</span>. -->
  </div>


  </div> <!-- cierre row  de nota -->


  <script type="text/javascript">
  
var maxLength_2 = 109;
$('#nota_text_2<?php echo $row_usuarios['id_per']; ?>').keyup(function() {
  var length_2 = $(this).val().length_2;
  var length_2 = maxLength_2-length_2;
  $('#chars_2<?php echo $row_usuarios['id_per']; ?>').text(length_2);
});

</script>



</div> <!-- cierre modal body -->


      <div class="modal-footer"> 

    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Cancel</button>

<input name="desactivado_by" type="hidden" value="<?php echo $_SESSION['id_per']; ?>">

<input name="name_del_cambiante" type="hidden" value="<?php echo $row_usuarios_whoL['p_name_per']; ?>">
<input name="apellido_del_cambiante" type="hidden" value="<?php echo $row_usuarios_whoL['p_surname_per']; ?>">

    <button type="submit" name="active_personal" class="btn btn-success"
    value="<?php echo $row_usuarios['id_per']; ?>" >Pass To Active</button>

      </div>


</form>




    </div>  <!-- cierre div modal content --> 
  </div>
</div>
<!-- cierre modal de activar --> 
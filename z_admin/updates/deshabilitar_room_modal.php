
<div class="modal fade" id="desactivar_room<?php echo $row_rooms_reveal['id_room']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        
      <h5 class="modal-title text-secondary" id="exampleModalLabel">
        <i class="far fa-bell-slash fa-lg"></i> - Room was originally created on
 <?php $fecha_de_primer_registro_formateada = date('d-m-Y', strtotime($row_rooms_reveal['room_date']));
 echo $fecha_de_primer_registro_formateada;
 ?>, by &nbsp;<b><?php echo $row_usuarios_whoL['p_surname_per'];?></b>&nbsp;<?php echo $row_usuarios_whoL['p_name_per'];?>.
  </h5>
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>











    
      <div class="modal-body">

<?php

$id_del_reg = $row_rooms_reveal['id_room'];      
include ("../conectar.php");    // me da la info si existe de la tabla quien y cuando per

$queryFHL_status_changes = "SELECT * FROM quien_y_cuando_room, tb_personal                    
WHERE  quien_y_cuando_room.id_quien_permite_o_no = tb_personal.id_per        
and  quien_y_cuando_room.id_room_activ_or_deac = '$id_del_reg' 
order by fecha_perm_o_no DESC";

$room_status_changes = mysqli_query($enlace, $queryFHL_status_changes) or die(mysqli_error());
$row_room_status_changes = mysqli_fetch_assoc($room_status_changes);
$totalRows_room_status_changes = mysqli_num_rows($room_status_changes);

mysqli_close($enlace);

?>



<table class="table table-hover mt-3" <?php if ( $totalRows_room_status_changes == '0' ){?>style="display:none"<?php } ?>  >
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

$fecha_formateada = date('d-m-Y', strtotime($row_room_status_changes['fecha_perm_o_no']));

echo $fecha_formateada; ?></td>

   
   
   <td><?php
    
$statuto_cc = $row_room_status_changes['historico_de_status'];


if ($statuto_cc == '0') { $el_esta_asi = 'Close'; }

else {$el_esta_asi = 'Open';}
          
    echo $el_esta_asi; ?></td>


    <td> <b><?php
  

    $id_del_responsable = $row_room_status_changes['id_quien_permite_o_no'];      
    include ("../conectar.php");    // me da la info si existe de la tabla quien y cuando per
    
    $queryFHL_fue = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal                    
    WHERE  id_per = '$id_del_responsable' limit 1";
    
    $usuarios_fue = mysqli_query($enlace, $queryFHL_fue) or die(mysqli_error());
    $row_usuarios_fue = mysqli_fetch_assoc($usuarios_fue);
    $totalRows_usuarios_fue = mysqli_num_rows($usuarios_fue);
    
    mysqli_close($enlace);              
    
    echo $row_usuarios_fue['p_name_per']; ?></b> <?php echo $row_usuarios_fue['p_surname_per']; ?>.</td>

    
    <td><?php echo $row_room_status_changes['text_perm_o_no']; ?></td>


  </tr>

  
  
<?php } while ($row_room_status_changes = mysqli_fetch_assoc($room_status_changes)); ?>

</tbody>

</table>












<form method="post">


<div class="form-row mt-5">
  <div class="input-group col-md-8 mt-2 mb-1 text-muted ">
   <b>Add Obs:</b>
  </div>
  </div>


  <div class="form-row ">
  <div class="col-md-11">    

  <textarea maxlength="109" class="form-control" id="nota_text<?php echo $row_rooms_reveal['id_room']; ?>"
   name="nota_text" rows="1" required></textarea>

  </div>

  <div class="col-md-1">    
  <span id="chars<?php echo $row_rooms_reveal['id_room']; ?>">109</span>.
  </div>


  </div> <!-- cierre row  de nota -->


  <script type="text/javascript">
  
var maxLength = 109;
$('#nota_text<?php echo $row_rooms_reveal['id_room']; ?>').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength-length;
  $('#chars<?php echo $row_rooms_reveal['id_room']; ?>').text(length);
});

</script>



</div> <!-- cierre modal body -->


      <div class="modal-footer"> 

    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

<input name="desactivado_by" type="hidden" value="<?php echo $_SESSION['id_per']; ?>">

<input name="name_del_cambiante" type="hidden" value="<?php echo $row_rooms_reveal['name_room_number']; ?>">


    <button type="submit" name="close_room" class="btn btn-secondary"
    value="<?php echo $row_rooms_reveal['id_room']; ?>" >Close Room</button>

      </div>


  </form>




    




    </div>  <!-- cierre div modal content --> 
  </div>
</div>
<!-- cierre modal de desactivar --> 


















<!--  modal de activar --> 


<div class="modal fade" id="activar_room<?php echo $row_rooms_reveal['id_room']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        
      <h5 class="modal-title text-success" id="exampleModalLabel">
        <i class="far fa-bell-slash fa-lg"></i> - Room was originally created on
 <?php $fecha_de_primer_registro_formateada = date('d-m-Y', strtotime($row_rooms_reveal['room_date']));
 echo $fecha_de_primer_registro_formateada;
 ?>, by &nbsp;<b><?php echo $row_usuarios_whoL['p_surname_per'];?></b>&nbsp;<?php echo $row_usuarios_whoL['p_name_per'];?>.
  </h5>
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>











    
      <div class="modal-body">

<?php

$id_del_reg = $row_rooms_reveal['id_room'];      
include ("../conectar.php");    // me da la info si existe de la tabla quien y cuando per

$queryFHL_status_changes = "SELECT * FROM quien_y_cuando_room, tb_personal                    
WHERE  quien_y_cuando_room.id_quien_permite_o_no = tb_personal.id_per        
and  quien_y_cuando_room.id_room_activ_or_deac = '$id_del_reg' 
order by fecha_perm_o_no DESC";

$room_status_changes = mysqli_query($enlace, $queryFHL_status_changes) or die(mysqli_error());
$row_room_status_changes = mysqli_fetch_assoc($room_status_changes);
$totalRows_room_status_changes = mysqli_num_rows($room_status_changes);

mysqli_close($enlace);

?>



<table class="table table-hover mt-3" <?php if ( $totalRows_room_status_changes == '0' ){?>style="display:none"<?php } ?>  >
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

$fecha_formateada = date('d-m-Y', strtotime($row_room_status_changes['fecha_perm_o_no']));

echo $fecha_formateada; ?></td>

   
   
   <td><?php
    
$statuto_cc = $row_room_status_changes['historico_de_status'];


if ($statuto_cc == '0') { $el_esta_asi = 'Close'; }

else {$el_esta_asi = 'Open';}
          
    echo $el_esta_asi; ?></td>


    <td> <b><?php
  

    $id_del_responsable = $row_room_status_changes['id_quien_permite_o_no'];      
    include ("../conectar.php");    // me da la info si existe de la tabla quien y cuando per
    
    $queryFHL_fue = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal                    
    WHERE  id_per = '$id_del_responsable' limit 1";
    
    $usuarios_fue = mysqli_query($enlace, $queryFHL_fue) or die(mysqli_error());
    $row_usuarios_fue = mysqli_fetch_assoc($usuarios_fue);
    $totalRows_usuarios_fue = mysqli_num_rows($usuarios_fue);
    
    mysqli_close($enlace);              
    
    echo $row_usuarios_fue['p_name_per']; ?></b> <?php echo $row_usuarios_fue['p_surname_per']; ?>.</td>

    
    <td><?php echo $row_room_status_changes['text_perm_o_no']; ?></td>


  </tr>

  
  
<?php } while ($row_room_status_changes = mysqli_fetch_assoc($room_status_changes)); ?>

</tbody>

</table>












<form method="post">


<div class="form-row mt-5">
  <div class="input-group col-md-8 mt-2 mb-1 text-muted ">
   <b>Add Obs:</b>
  </div>
  </div>


  <div class="form-row ">
  <div class="col-md-11">    

  <textarea maxlength="109" class="form-control" id="nota_text<?php echo $row_rooms_reveal['id_room']; ?>"
   name="nota_text" rows="1" required></textarea>

  </div>




  </div> <!-- cierre row  de nota -->


  <script type="text/javascript">
  
var maxLength = 109;
$('#nota_text<?php echo $row_rooms_reveal['id_room']; ?>').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength-length;
  $('#chars<?php echo $row_rooms_reveal['id_room']; ?>').text(length);
});

</script>



</div> <!-- cierre modal body -->


      <div class="modal-footer"> 

    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

<input name="desactivado_by" type="hidden" value="<?php echo $_SESSION['id_per']; ?>">

<input name="name_del_cambiante" type="hidden" value="<?php echo $row_rooms_reveal['name_room_number']; ?>">


    <button type="submit" name="open_room" class="btn btn-success"
    value="<?php echo $row_rooms_reveal['id_room']; ?>" >Open Room</button>

      </div>


  </form>




    




    </div>  <!-- cierre div modal content --> 
  </div>
</div>
<!-- cierre modal de desactivar --> 

























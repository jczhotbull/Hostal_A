
<!-- ini modal editar -->

<div class="modal fade" id="add_cama<?php echo $row_rooms_reveal['id_room']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">  
        <h5 class="modal-title text-success" id="exampleModalLabel">
        <i class="fa-solid fa-bed-pulse fa-lg"></i> </h5>  

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>

      <form method="post">
      <div class="modal-body">




<div class="form-row margencito"> 


<table class="table table-sm " class="table table-hover">
 
  <tbody>

  <thead>
    <tr>    
      <th width="30%" scope="col">Bed Kind</th>
      <th width="30%" scope="col">Bed Id or N°</th>
      <th width="40%" scope="col">Characteristics</th>
      
    </tr>
  </thead>



    <tr>


    <td>   
    <select class="form-control form-control-sm importantex" id="bed_kind_1" name="bed_kind_1" required>
    <option selected disabled value=""></option>

    <?php
include("../conectar.php"); 

$query_bed_kind = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind = mysqli_query($enlace, $query_bed_kind) or die(mysqli_error());
$row_datos_bed_kind = mysqli_fetch_assoc($datos_bed_kind);
mysqli_close($enlace);  

?>

    <?php do{?>











<option value="<?php echo $row_datos_bed_kind['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind = mysqli_fetch_assoc($datos_bed_kind)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm importantex" id="bed_number_1" name="bed_number_1" required>
      <option selected disabled value=""></option>



      <?php
include("../conectar.php"); 
$query_bed_number = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number = mysqli_query($enlace, $query_bed_number) or die(mysqli_error());
$row_datos_bed_number = mysqli_fetch_assoc($datos_bed_number);
mysqli_close($enlace);  

?>


       <?php do{?>
<option value="<?php echo $row_datos_bed_number['id_bed_number']; ?>"><?php echo $row_datos_bed_number['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number = mysqli_fetch_assoc($datos_bed_number)); ?> 
      </select> 
      </td>

      <td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_1" name="nota_1">    

<input name="id_del_tipo_cuarto" type="hidden" value="<?php echo $row_rooms_reveal['id_room_kind']; ?>">








</td>

   </tr>
   







  
  </tbody>
</table>

















  

 </div>









      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="add_bed_to_room" class="btn btn-success" value="<?php echo $row_rooms_reveal['id_room']; ?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button>   

      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
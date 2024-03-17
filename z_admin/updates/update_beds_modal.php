
<!-- ini modal editar -->

<div class="modal fade" id="edit_cama<?php echo $row_rooms_details['id_rooms_beds']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">
        <i class="fa-solid fa-bed-pulse fa-lg"></i> </h5>   

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>

      <form method="post">
      <div class="modal-body">


      


      <table class="table table-sm " class="table table-hover">
 
 <tbody>

 <thead>
   <tr>
     <th width="25%" scope="col">Name or N°</th>      
     <th width="25%" scope="col">Bed Kind</th>
     <th width="50%" scope="col">Characteristics</th>
   
  
     
   </tr>
 </thead>




   <tr>
     <td>

     <select class="form-control form-control-sm importantex" id="name_the_bed" name="name_the_bed" required>

     <option selected value="<?php echo $row_rooms_details['id_bed_number']; ?>">
     <?php echo $row_rooms_details['name_bed_number']; ?></option>
<option style="background-color: #00000;" disabled></option>



<?php

include("../conectar.php");

$query_hostel_bed_number_mod = "SELECT * FROM bed_number ORDER BY name_bed_number ASC";

$datos_hostel_bed_number_mod = mysqli_query($enlace, $query_hostel_bed_number_mod) or die(mysqli_error());

$row_datos_hostel_bed_number_mod = mysqli_fetch_assoc($datos_hostel_bed_number_mod);

mysqli_close($enlace);

?> 

                               <?php do{?>                                

<option value="<?php echo $row_datos_hostel_bed_number_mod['id_bed_number']; ?>">
<?php echo $row_datos_hostel_bed_number_mod['name_bed_number']; ?></option>

       

<?php } while ($row_datos_hostel_bed_number_mod = mysqli_fetch_assoc($datos_hostel_bed_number_mod)); ?> 

                        
                                        </select>

<input name="name_editado_a" type="hidden" value="<?php echo $row_rooms_details['name_bed_number']; ?>">

     </td>

   <td>   
   <select class="form-control form-control-sm importantex" id="bed_kind" name="bed_kind" required>
  
   <option selected value="<?php echo $row_rooms_details['id_bed_kind']; ?>">
     <?php echo $row_rooms_details['name_bed_kind']; ?></option>
<option style="background-color: #00000;" disabled></option>



<?php

include("../conectar.php");

$query_hostel_bed_kind_mod = "SELECT * FROM bed_kind ORDER BY name_bed_kind ASC";

$datos_hostel_bed_kind_mod = mysqli_query($enlace, $query_hostel_bed_kind_mod) or die(mysqli_error());

$row_datos_hostel_bed_kind_mod = mysqli_fetch_assoc($datos_hostel_bed_kind_mod);

mysqli_close($enlace);

?> 

                               <?php do{?>                                

<option value="<?php echo $row_datos_hostel_bed_kind_mod['id_bed_kind']; ?>">
<?php echo $row_datos_hostel_bed_kind_mod['name_bed_kind']; ?></option>

       

<?php } while ($row_datos_hostel_bed_kind_mod = mysqli_fetch_assoc($datos_hostel_bed_kind_mod)); ?> 

                         
                                        </select>
  



   </td>
   

     <td>

<input type="text" maxlength="110" class="form-control form-control-sm" id="bed_observ" name="bed_observ"
 aria-label="bed_observ" aria-describedby="basic-addon1" value="<?php echo $row_rooms_details['note']; ?>" >    
   
</td>





  </tr>
  






 
 </tbody>
</table>


      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

        <button type="submit" name="editar_the_bed" class="btn btn-info "
         value="<?php echo$row_rooms_details['id_rooms_beds']; ?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button> 


      </div>

      </form>
      

    </div>
  </div>
</div>


<!-- cierre modal de editar -->

<div class="modal fade" id="add_inci_room<?php echo $row_rooms_details['id_rooms_beds']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        
<h5 class="modal-title text-secondary" id="exampleModalLabel">
<i class="fa-regular fa-face-frown-open fa-lg"></i>
</h5>
  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-body">

<form method="post">

<div class="form-row mt-1">
  <div class="input-group col-md-8 mt-2 mb-1 text-dark ">
Add Incident in Bed &nbsp; <b><?php echo $row_rooms_details['name_bed_number']; ?></b>:
  </div>
</div>

  <div class="form-row ">
  <div class="col-md-12">    

  <select class="form-control form-control-sm importantex" id="name_incident" name="name_incident" required>

<option selected value="" disabled>Select Incident:</option>
<option style="background-color: #00000;" disabled></option>



<?php

include("../conectar.php");

$query_hostel_inc_r = "SELECT * FROM incidents_beds ORDER BY name_incidents_beds ASC";

$datos_hostel_inc_r = mysqli_query($enlace, $query_hostel_inc_r) or die(mysqli_error());

$row_datos_hostel_inc_r = mysqli_fetch_assoc($datos_hostel_inc_r);

mysqli_close($enlace);

?> 

                          <?php do{?>                                

<option value="<?php echo $row_datos_hostel_inc_r['id_incidents_beds']; ?>">
<?php echo $row_datos_hostel_inc_r['name_incidents_beds']; ?></option>

  

<?php } while ($row_datos_hostel_inc_r = mysqli_fetch_assoc($datos_hostel_inc_r)); ?> 

                   
                                   </select>





  </div>
  </div> <!-- cierre row  de nota -->




</div> <!-- cierre modal body -->


      <div class="modal-footer"> 

    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>

<input name="agendado_by" type="hidden" value="<?php echo $_SESSION['id_per']; ?>">

<input name="name_del_cambiante" type="hidden" value="<?php echo $row_rooms_details['name_bed_number']; ?>">


    <button type="submit" name="add_inc_bed" class="btn btn-secondary"
    value="<?php echo $row_rooms_details['id_rooms_beds']; ?>" >Add</button>

      </div>

  </form>
 

    </div>  <!-- cierre div modal content --> 
  </div>
</div>
<!-- cierre modal de desactivar --> 















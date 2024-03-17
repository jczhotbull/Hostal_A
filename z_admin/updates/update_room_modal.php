
<!-- ini modal editar -->

<div class="modal fade" id="modificar<?php echo $row_rooms_reveal['id_room']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">
        <i class="fa-regular fa-solid fa-people-roof fa-lg"></i> </h5>  

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>

      <form method="post">
      <div class="modal-body">




<div class="form-row margencito"> 


<div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-swatchbook fa-lg"></i></span>  
                                        </div> 


<select class="form-control importantex" id="type_room" name="type_room" required>
 
                                                        
<option selected value="<?php echo $row_rooms_reveal['id_room_kind']; ?>"><?php echo $row_rooms_reveal['name_room_kind']; ?></option>
<option style="background-color: #00000;" disabled></option>



<?php

include("../conectar.php");

$query_room_kind = "SELECT * FROM room_kind ORDER BY name_room_kind ASC";

$datos_room_kind = mysqli_query($enlace, $query_room_kind) or die(mysqli_error());

$row_datos_room_kind = mysqli_fetch_assoc($datos_room_kind);

mysqli_close($enlace);

?> 



                               <?php do{?>                                

<option value="<?php echo $row_datos_room_kind['id_room_kind']; ?>"><?php echo $row_datos_room_kind['name_room_kind']; ?></option>

                                <?php } while ($row_datos_room_kind = mysqli_fetch_assoc($datos_room_kind)); ?> 
                         
                                        </select>
  
                              </div>     
                              
                              



                              <div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-arrow-up-9-1 fa-lg"></i></span>  
                                        </div> 


                     <select class="form-control importantex" id="room_number" name="room_number" required>
                                                        
                     <option selected value="<?php echo $row_rooms_reveal['id_room_number']; ?>">
                     <?php echo $row_rooms_reveal['name_room_number']; ?></option>
<option style="background-color: #00000;" disabled></option>


<?php

include("../conectar.php");

$query_room_number = "SELECT * FROM room_number ORDER BY name_room_number ASC";

$datos_room_number = mysqli_query($enlace, $query_room_number) or die(mysqli_error());

$row_datos_room_number = mysqli_fetch_assoc($datos_room_number);

mysqli_close($enlace);

?> 



                               <?php do{?>                                

<option value="<?php echo $row_datos_room_number['id_room_number']; ?>"><?php echo $row_datos_room_number['name_room_number']; ?></option>

                                <?php } while ($row_datos_room_number = mysqli_fetch_assoc($datos_room_number)); ?> 
                         
                                        </select>
  
                              </div>  



<input name="name_editado" type="hidden" value="<?php echo $row_rooms_reveal['name_room_number']; ?>">






                              <div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-hotel fa-lg"></i></span>  
                                        </div>   


                     <select class="form-control importantex" id="floors" name="floors" required>
                                                        
<option selected value="<?php echo $row_rooms_reveal['id_floors']; ?>"><?php echo $row_rooms_reveal['name_floors']; ?></option>
<option style="background-color: #00000;" disabled></option>


<?php

include("../conectar.php");

$query_floors = "SELECT * FROM floors ORDER BY name_floors ASC";

$datos_floors = mysqli_query($enlace, $query_floors) or die(mysqli_error());

$row_datos_floors = mysqli_fetch_assoc($datos_floors);

mysqli_close($enlace);

?> 







                               <?php do{?>                                

<option value="<?php echo $row_datos_floors['id_floors']; ?>"><?php echo $row_datos_floors['name_floors']; ?></option>

                                <?php } while ($row_datos_floors = mysqli_fetch_assoc($datos_floors)); ?> 
                         
                                        </select>
  
                              </div> 






                              <div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-map fa-lg"></i></span>  
                                        </div>   
                                        

                     <select class="form-control importantex" id="the_area" name="the_area" required>
                                                        
                     <option selected value="<?php echo $row_rooms_reveal['id_hostel_area']; ?>"><?php echo $row_rooms_reveal['name_hostel_area']; ?></option>
<option style="background-color: #00000;" disabled></option>


<?php

include("../conectar.php");

$query_hostel_area = "SELECT * FROM hostel_area ORDER BY name_hostel_area ASC";

$datos_hostel_area = mysqli_query($enlace, $query_hostel_area) or die(mysqli_error());

$row_datos_hostel_area = mysqli_fetch_assoc($datos_hostel_area);

mysqli_close($enlace);

?> 





                               <?php do{?>                                

<option value="<?php echo $row_datos_hostel_area['id_hostel_area']; ?>"><?php echo $row_datos_hostel_area['name_hostel_area']; ?></option>

                                <?php } while ($row_datos_hostel_area = mysqli_fetch_assoc($datos_hostel_area)); ?> 
                         
                                        </select>
  
                              </div> 






<div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2">  
<div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Characteristics:</span>  
</div>
<input type="text" maxlength="110" class="form-control" id="room_observ" name="room_observ"
 aria-label="room_observ" aria-describedby="basic-addon1" value="<?php echo $row_rooms_reveal['room_observ']; ?>" >    
</div>




  

 </div>









      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editar_the_room" class="btn btn-info" value="<?php echo $row_rooms_reveal['id_room']; ?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button>   

      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
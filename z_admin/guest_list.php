





<div class="card-header mt-3">
<b><i class="fa fa-table"></i> List:</b>
</div>




<div class="card-body border border-info mb-2" <?php if ( $totalRows_usuarios == '0' ){?>style="display:none"<?php } ?> >

          <div class="table-responsive">

            <table class="table table-bordered stricolor table-sm" id="dataTable" width="100%" cellspacing="0">
             
              <thead>
                <tr>                  
                  
                    <th><i class="fa-solid fa-signature fa-lg"></i></th>

                    <th><i class="fas fa-camera-retro fa-lg"></i></th>
                    <th><i class="fa-solid fa-gear fa-lg"></i></th> 

                    <th><i class="fa-solid fa-passport fa-lg"></i></th>
                    <th><i class="fa-solid fa-gears fa-lg"></i></th>

   <th><i class="fa-solid fa-suitcase-rolling fa-lg"></i> </th> 

<th><i class="fa-solid fa-quote-left fa-lg"></i> / <i class="fa-solid fa-phone fa-lg"></i> / <i class="fa-solid fa-at fa-lg"></i></th> 
                    
                    <th><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th> 

            
                </tr>

                </thead>
               <tbody>

               <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->            

               <tr>

<?php

include ("../conectar.php");

$este_lo_registro = $row_usuarios['guests_register_by'];

$queryFH_whoL = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro' limit 1";

$usuarios_whoL = mysqli_query($enlace, $queryFH_whoL) or die(mysqli_error());

$row_usuarios_whoL = mysqli_fetch_assoc($usuarios_whoL);

mysqli_close($enlace);

?>


<td class="align-middle" align="center">

<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >

    <b><?php echo $row_usuarios['guests_doc_id']; ?></b> <br>
    <?php echo $row_usuarios['p_name_g'];?>, <?php echo $row_usuarios['p_surname_g']; ?>.
</div>    
    

<span style="color: #417FD5;"><b><?php echo $row_usuarios['name_nationality']; ?></b>.</span> 



<div data-toggle="tooltip" data-placement="top" title="<?php echo $row_usuarios['name_behaviors']; ?>" >

    <button class="button"
data-toggle="modal" data-target="#edit_status_guest<?php echo $row_usuarios["id_guests"]; ?>"

style="border:0px; background-color: <?php echo $row_usuarios["color_back"]; ?>;
color: <?php echo$row_usuarios["color_text"]; ?>" >
    
    <i class="fa-lg"><?php echo $row_usuarios["icon_behaviors"]; ?></i></button>

</div>



<?php include("updates/update_guest_status_modal.php"); ?>










</td>



<td class="align-middle" align="center">

<img id="myImg" src="<?php echo $row_usuarios['guests_pic']; ?>?nocache=<?php echo time(); ?>"
                  alt="Not Available"  onerror="this.src='guests/pic_g/000.jpg';" width="80px" /> 

</td>

<td class="align-middle" align="center">

<div class="upload-btn-wrapper">

<div data-toggle="tooltip" data-placement="top" title="Update Pic." >
      <button class="btn btn-outline-info btn-sm" ><i class="fas fa-camera-retro"></i></button>

      <input class="center-block punterodd" type="file" accept="image/*"
         name="upload_image_pic_per<?php echo $row_usuarios['id_guests']; ?>" id="upload_image_pic_per<?php echo $row_usuarios['id_guests']; ?>"
         onchange="return fileValidation<?php echo $row_usuarios['id_guests']; ?>()" /> 
</div>
        </div>



<?php include ("per_pic_mod/update_pic_guest.php"); ?> 





<div data-toggle="tooltip" data-placement="top" title="Delete Pic." >

      <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
       data-target="#borrar_pic_per<?php echo $row_usuarios['id_guests']; ?>"> <i class="fas fa-camera-retro"></i></button>

</div>


<?php include ("per_pic_mod/delete_pic_guest.php"); ?> 

</td>



<td class="align-middle" align="center">

                   <img id="myImg" src="<?php echo $row_usuarios['guests_doc_id_pic']; ?>?nocache=<?php echo time(); ?>"
                  alt="Not Available"  onerror="this.src='guests/doc_id_g/doc_vacio.jpg';" width="65px" />

</td>

<td class="align-middle" align="center">



<div class="upload-btn-wrapper">

<div data-toggle="tooltip" data-placement="top" title="Update Doc." >  
      <button class="btn btn-outline-info btn-sm" ><i class="fa-solid fa-passport"></i></button>

      <input class="center-block punterodd" type="file" accept="image/*"
         name="upload_image_passport_per<?php echo $row_usuarios['id_guests']; ?>" id="upload_image_passport_per<?php echo $row_usuarios['id_guests']; ?>"
         onchange="return fileValidation_passport_per<?php echo $row_usuarios['id_guests']; ?>()" /> 
</div>

</div>

<?php include ("per_pic_mod/update_passport_guest.php"); ?> 




<div data-toggle="tooltip" data-placement="top" title="Delete Doc." >

      <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
       data-target="#borrar_passport_per<?php echo $row_usuarios['id_guests']; ?>"> <i class="fa-solid fa-passport"></i></button>

</div>



<?php include ("per_pic_mod/delete_passport_guest.php"); ?> 

</td>










<td class="align-middle" align="center">


<b>Room:</b><?php          

$book= '';

include ("../conectar.php");

$y_rom = $row_usuarios['id_room_number'];
$y_rom_type = $row_usuarios['id_room_kind']; 
$y_floor = $row_usuarios['id_floors'];
$y_bed = $row_usuarios['id_room_bed'];

$y_noches = $row_usuarios['nights'];

$y_status = $row_usuarios['booking_status'];

if ($y_status == '1') {
  $book = 'Reserved';
}

if ($y_status == '2') {
  $book = 'In Use';
}



$queryFH_room = "SELECT * FROM room_number
WHERE id_room_number = '$y_rom'
 limit 1";
$usuarios_room = mysqli_query($enlace, $queryFH_room) or die(mysqli_error());
$row_usuarios_room = mysqli_fetch_assoc($usuarios_room);


$queryFH_room_type = "SELECT * FROM room_kind
WHERE id_room_kind = '$y_rom_type'
 limit 1";
$usuarios_room_type = mysqli_query($enlace, $queryFH_room_type) or die(mysqli_error());
$row_usuarios_room_type = mysqli_fetch_assoc($usuarios_room_type);



$queryFH_floor = "SELECT * FROM floors 
WHERE id_floors = '$y_floor' limit 1";
$usuarios_floor = mysqli_query($enlace, $queryFH_floor) or die(mysqli_error());
$row_usuarios_floor = mysqli_fetch_assoc($usuarios_floor);


$query_rb = "SELECT * FROM bed_booking, tb_rooms_beds, bed_number
WHERE bed_booking.id_room_bed = tb_rooms_beds.id_rooms_beds
and tb_rooms_beds.id_bed_number = bed_number.id_bed_number
and tb_rooms_beds.id_rooms_beds = '$y_bed' limit 1";
$usuarios_rb = mysqli_query($enlace, $query_rb) or die(mysqli_error());
$row_usuarios_rb = mysqli_fetch_assoc($usuarios_rb);



mysqli_close($enlace);

echo $row_usuarios_room['name_room_number'];?>,<br><?php echo $row_usuarios_room_type['name_room_kind'];?> <br>
<b style="color:orange;"><?php echo $row_usuarios_floor['name_floors'];?></b>.<br>
<b>Bed:</b> <?php echo $row_usuarios_rb['name_bed_number'];?>, Lv:<?php echo $row_usuarios_rb['id_bunk_level'];?>. <br>

<b style="color:purple; font-size:10px;"><?php echo $row_usuarios['date_range'];?></b>


</td>





<td class="align-middle" align="center">

<b style="font-size:12px;"><?php echo $row_usuarios['guests_observ'];?></b><br>


<?php echo $row_usuarios['guests_phone']; ?><br>
                  <span style="color: #9961cd;"><?php echo $row_usuarios['guests_email']; ?></span> 
<div class="mb-3"></div>

</td>



<td class="align-middle" align="center">

<?php

$id_pga = $row_usuarios['id_payment_huesped'];

include ("../conectar.php");

$query_url = "SELECT id_payment_hospedaje, link_payment FROM tb_payment_hospedaje 
WHERE id_payment_hospedaje = '$id_pga' limit 1";
$usuarios_url = mysqli_query($enlace, $query_url) or die(mysqli_error());
$row_usuarios_url = mysqli_fetch_assoc($usuarios_url);

mysqli_close($enlace);



 $url_pre =  isset($_SERVER['HTTPS']) &&                                      //almaceno la variable del host para completar el link
        $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";   
     
        $url_pre .= $_SERVER['HTTP_HOST']; 




?>


<span>

<form method="POST" action="<?php echo $url_pre; ?><?php echo $row_usuarios_url['link_payment']; ?>">


<div data-toggle="tooltip" data-placement="top"
title="Payments & Services" >

<button type="submit" class="btn btn-success btn-sm mb-1"> 
                                                                       
<i class="fa-solid fa-circle-dollar-to-slot fa-lg"></i></button> 

</div>

</form> 











<span data-toggle="tooltip" data-placement="top" title="Manage Services" >

<button type="submit" data-toggle="modal"
 data-target="#servicios<?php echo $row_usuarios['id_bed_booking']; ?>" class="btn btn-primary btn-sm mb-1"> 
                                                                       
<i class="fa-solid fa-boxes-stacked fa-lg"></i></button> 

</span>

  <?php include("updates/admin_services_guests_p.php"); ?>















<button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_usuarios['id_guests']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fas fa-edit"></i></button>    




<?php include("updates/update_guest_modal.php"); ?>





<button type="button" class="btn btn-outline-dark btn-sm mb-1" data-toggle="modal"
                  data-target="#password<?php echo $row_usuarios['id_guests']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fa-solid fa-key"></i></button>    




<?php include("updates/update_pass_guest_modal.php"); ?>





  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_usuarios['id_guests']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></button>                 


                  <?php include("deletes/delete_guest_modal.php"); ?>

              


</td>


               </tr>


               <?php } while ($row_usuarios = mysqli_fetch_assoc($usuarios)); ?>
                

                </tbody>
  
  
  
              </table> <!-- cierre tabla -->
  
            </div> <!-- cierre div tabla responsiva -->
  
          </div> <!-- cierre card body -->
<?php


include("00_identificador.php");


$alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.


    $logo_success="";
    $logo_danger="";
    $logo_info="1";

    $direcc_success=""; // notificador del proceso de insercion de direccion
    $direcc_danger="";  // notificador del proceso de insercion de direccion

    $datos_success="";
    $datos_danger="";


    $hostel_success="";  // notificador del proceso de insercion de informacion del usuario
    $hostel_danger="";


    $conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores


    $mi_hostel_select = $_SESSION['hostel_activo'];




// lo siguiente confirma la actualizacion de la foto personal

if(isset($_POST['update_pic_per']))
    {
$alerta_principal = "2";

$pic_per_esta ="0";

$update_pic_perdU = $_POST['update_pic_per'];

$update_doc_perdU = $_POST['update_doc_per'];

$id_update_perU = $_POST['id_update_per'];

$id_data_update_perU = $_POST['id_data_update_per'];


clearstatcache();
$filenameUP = "00_croppie/pic_per_".$id_update_perU."_".$update_doc_perdU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $pic_per_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "guests/pic_g/".$update_pic_perdU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../conectar.php");   

          $query_fotoU = "UPDATE tb_guests SET guests_pic = '$newfilenameU' WHERE id_guests = '$update_pic_perdU' LIMIT 1 ";
          

          if (!mysqli_query($enlace,$query_fotoU))      // si no ha logrado ingresar la foto
                   {

           $errorZ.="- Error. ";

                unlink($newfilenameU);
                        
              mysqli_close($enlace);

                   }

          else {
          
          $exitoZ .= "- Done. ";
          mysqli_close($enlace);  

            }   

             
      }

            else{
            
            $errorZ.="- File Error. ";

              unlink($filenameUP);
                         
              mysqli_close($enlace);


            }
                

                 }  // cierre de que no hay foto..

              
                 if ($pic_per_esta =="0") {

$alerta_principal = "2";
 $errorZ="- File not available. ";  

            }


            if ($errorZ!="")     //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                             
                          }     


                if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. "  ";            
 
                           }
    
    }








// borrar passport del personal

if(isset($_POST['borrarXX_passport_per']))
    {

$alerta_principal = "2";

include("../conectar.php");

$queryKKC = "SELECT * FROM tb_data_guests WHERE id_data_guests = '$_POST[id_data_per_RR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$pic_a_borrar = $filaKK["guests_doc_id_pic"];

                      if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                         
                            unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_data_guests SET guests_doc_id_pic = '' WHERE id_data_guests = '$_POST[id_data_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i>";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }





























// lo siguiente confirma la actualizacion del passport del personal

if(isset($_POST['update_passport_per_passport']))
    {
$alerta_principal = "2";

$passport_per_esta ="0";


$update_pic_perdU = $_POST['update_passport_per_passport'];

$update_doc_perdU = $_POST['update_doc_per2'];

$id_update_perU = $_POST['update_passport_per_passport'];

$id_data_update_perU = $_POST['id_data_update_per'];






clearstatcache();
$filenameUP = "00_croppie/passport_per_".$id_update_perU."_".$update_doc_perdU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $passport_per_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "guests/doc_id_g/".$id_update_perU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../conectar.php");   

          $query_fotoU = "UPDATE tb_data_guests SET guests_doc_id_pic = '$newfilenameU' WHERE id_data_guests = '$id_data_update_perU' LIMIT 1 ";
          

          if (!mysqli_query($enlace,$query_fotoU))      // si no ha logrado ingresar la foto
                   {

           $errorZ.="- Error. ";

                unlink($newfilenameU);
                        
              mysqli_close($enlace);

                   }

          else {
          
          $exitoZ .= "- Done. ";
          mysqli_close($enlace);  

            }   

             
      }

            else{
            
            $errorZ.="- File Error. ";

              unlink($filenameUP);
                         
              mysqli_close($enlace);


            }
                

                 }  // cierre de que no hay foto..

              
                 if ($passport_per_esta =="0") {

$alerta_principal = "2";
 $errorZ="- File not available. ";  

            }


            if ($errorZ!="")     //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                             
                          }     


                if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. "  ";            
 
                           }
    
    }





























// borrar pic del huesped

if(isset($_POST['borrarXX_pic_per']))
    {

$alerta_principal = "2";

include("../conectar.php");

$queryKKC = "SELECT * FROM tb_guests WHERE id_guests = '$_POST[id_per_RR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$pic_a_borrar = $filaKK["guests_pic"];

                      if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                         
                            unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_guests SET guests_pic = '' WHERE id_guests = '$_POST[id_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i>";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }

















    include ("../conectar.php");   // para saber cuantas rooms ay
    
    $query_String_roomsMM = "SELECT COUNT(*) AS total_roomsMM FROM tb_room
                            where id_hostel = '$mi_hostel_select'";
    $query_roomsMM = mysqli_query($enlace, $query_String_roomsMM);
    $row_roomsMM = mysqli_fetch_object($query_roomsMM);
    
    mysqli_close($enlace);




 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row">

<div class="col-md-1 col-lg-1" >  
 <button type="button" class="btn btn-dark btn-lg btn-block" style="margin-top:1px;"  onClick="javascript:history.go(-1)" ><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal fa-lg"></i></button>
</div>

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
<i class="fa-solid fa-bed fa-lg "></i> &nbsp; &nbsp; Next Month Guests:
                </div>

 

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-8 col-lg-8 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-8 col-lg-8 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
            </div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->


















<h4 class="glowwhite mt-4" <?php if ( $row_roomsMM->total_roomsMM =='0'  ){?>style="display:none"<?php } ?> >View By Room Type:</h4>



<!-- Icon Cards-->
     
<div class="row" <?php if ( $row_roomsMM->total_roomsMM =='0' ){?>style="display:none"<?php } ?> >



<?php

include ("../conectar.php");

$queryFHL_tipos = "SELECT id_hostel, id_room_kind FROM tb_room
where id_hostel = '$mi_hostel_select'
group BY id_room_kind ASC";


$rooms_tipes = mysqli_query($enlace, $queryFHL_tipos) or die(mysqli_error());
$row_rooms_tipes = mysqli_fetch_assoc($rooms_tipes);
$totalRows_rooms_tipes = mysqli_num_rows($rooms_tipes);

mysqli_close($enlace);

$background = '534463';

?>


<?php  do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->      







<?php

$este_id_kind = $row_rooms_tipes['id_room_kind'];

include ("../conectar.php");

$queryFHL_nombre = "SELECT * FROM room_kind where id_room_kind = '$este_id_kind' limit 1";
$rooms_reveal_name_tipes = mysqli_query($enlace, $queryFHL_nombre) or die(mysqli_error());
$row_rooms_reveal_name_tipes = mysqli_fetch_assoc($rooms_reveal_name_tipes);
$totalRows_rooms_reveal_name_tipes = mysqli_num_rows($rooms_reveal_name_tipes);



$queryFHL_conteo_t = "SELECT id_room_kind FROM tb_room
where id_room_kind = '$este_id_kind'
and id_hostel = '$mi_hostel_select' order by id_room_kind asc ";

$rooms_conteo_t = mysqli_query($enlace, $queryFHL_conteo_t) or die(mysqli_error());
$row_rooms_conteo_t = mysqli_fetch_assoc($rooms_conteo_t);
$totalRows_rooms_conteo_t = mysqli_num_rows($rooms_conteo_t);







$queryFHL_currencys_prim = "SELECT * FROM exchange_rates, currency
 where exchange_rates.id_hostel = '$mi_hostel_select'
 and exchange_rates.id_hostel_currency = currency.id_currency
 order BY exchange_rates.all_set_this_time DESC limit 1";

$the_currencys_prim = mysqli_query($enlace, $queryFHL_currencys_prim) or die(mysqli_error());
$row_the_currencys_prim = mysqli_fetch_assoc($the_currencys_prim);
$totalRows_the_currencys_prim = mysqli_num_rows($the_currencys_prim);




$queryFHL_pp = "SELECT * FROM tb_prices_rooms, discounts  
WHERE tb_prices_rooms.id_hostel = '$mi_hostel_select' 
and   tb_prices_rooms.id_room_kind = '$este_id_kind'
and tb_prices_rooms.discount_room = discounts.id_discounts
ORDER BY tb_prices_rooms.set_prices_date desc limit 1";

$room_pp = mysqli_query($enlace, $queryFHL_pp) or die(mysqli_error());
$row_room_pp = mysqli_fetch_assoc($room_pp);
$totalRows_room_pp = mysqli_num_rows($room_pp);


$queryFHL_pp_dos = "SELECT * FROM tb_prices_rooms
WHERE id_hostel = '$mi_hostel_select' 
and   id_room_kind = '$este_id_kind'
ORDER BY set_prices_date desc limit 1,2";

$room_pp_dos = mysqli_query($enlace, $queryFHL_pp_dos) or die(mysqli_error());
$row_room_pp_dos = mysqli_fetch_assoc($room_pp_dos);
$totalRows_room_pp_dos = mysqli_num_rows($room_pp_dos);

$off = '';
$discc = '';
$symbc = '';


if ($totalRows_room_pp != '0') {

if ($row_room_pp['name_discounts'] !='0') {
  $off = 'Off';
  $discc = $row_room_pp['name_discounts'];
  $symbc = '%';
}

}










$queryFHL_pp_b = "SELECT * FROM tb_prices_beds, discounts 
WHERE tb_prices_beds.id_hostel = '$mi_hostel_select' 
and   tb_prices_beds.id_room_kind = '$este_id_kind'
and   tb_prices_beds.discount_beds = discounts.id_discounts
ORDER BY tb_prices_beds.set_prices_date_b desc limit 1";

$room_pp_b = mysqli_query($enlace, $queryFHL_pp_b) or die(mysqli_error());
$row_room_pp_b = mysqli_fetch_assoc($room_pp_b);
$totalRows_room_pp_b = mysqli_num_rows($room_pp_b);


$queryFHL_pp_dos_b = "SELECT * FROM tb_prices_beds 
WHERE id_hostel = '$mi_hostel_select' 
and   id_room_kind = '$este_id_kind'
ORDER BY set_prices_date_b desc limit 1,2";

$room_pp_dos_b = mysqli_query($enlace, $queryFHL_pp_dos_b) or die(mysqli_error());
$row_room_pp_dos_b = mysqli_fetch_assoc($room_pp_dos_b);
$totalRows_room_pp_dos_b = mysqli_num_rows($room_pp_dos_b);


$off_b = '';
$discc_b = '';
$symbc_b = '';


if ($totalRows_room_pp_b != '0') {

if ($row_room_pp_b['name_discounts'] !='0') {
  $off_b = 'Off';
  $discc_b = $row_room_pp_b['name_discounts'];
  $symbc_b = '%';
}

}





mysqli_close($enlace);

?>





<div class="col-xl-3 col-sm-6 col-6 mb-3"  >
         <div class="card text-white o-hidden h-100"
         style="background:#<?php  echo $background; $background = $background + '1200';  ?>">
           <div class="card-body">
             <div class="card-body-icon">
<?php  echo $totalRows_rooms_conteo_t; ?>          
             </div>
             <div class="mr-5 cantidadzzz"></div>

             <div class="infozzz">
<?php
$mi_name_kind = $row_rooms_reveal_name_tipes['name_room_kind'];
echo $row_rooms_reveal_name_tipes['name_room_kind']; ?> </div>







           </div>

          <a class=" card-footer card-footerz text-white clearfix small z-1"        

           
href="">  

             <span class="float-left">View</span>
             <span class="float-right">
               <i class="fa fa-angle-right"></i>
             </span>
           </a> 
         </div>
</div>



<?php  } while ($row_rooms_tipes = mysqli_fetch_assoc($rooms_tipes)); ?>



</div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->












     

<?php

$date_hoy = date('Y-m', strtotime('+1 month'));

include ("../conectar.php");


$queryFHL = "SELECT * FROM tb_guests, bed_booking, tb_data_guests, sex, nationality, behaviors, tb_room
WHERE tb_guests.id_guests = bed_booking.id_guests
and tb_guests.id_guests = tb_data_guests.id_guests 
and tb_guests.guests_sex = sex.id_sex
and tb_data_guests.id_nation_g = nationality.id_nationality
and tb_data_guests.guests_behaviors = behaviors.id_behaviors
and bed_booking.id_room = tb_room.id_room
and bed_booking.id_hostel = '$mi_hostel_select'
and bed_booking.booking_status = '2'
and bed_booking.arreglo_d LIKE '%".$date_hoy."%'


ORDER BY tb_guests.guests_doc_id ASC";

$usuarios = mysqli_query($enlace, $queryFHL) or die(mysqli_error());

$row_usuarios = mysqli_fetch_assoc($usuarios);

$totalRows_usuarios = mysqli_num_rows($usuarios);

mysqli_close($enlace);



?>



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
style="background-color: <?php echo $row_usuarios["color_back"]; ?>;
color: <?php echo$row_usuarios["color_text"]; ?>" disabled>
    
    <i class="fa-2x"><?php echo $row_usuarios["icon_behaviors"]; ?></i></button> 
</div>


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
<b>Bed:</b> <?php echo $row_usuarios_rb['name_bed_number'];?>, Lv:<?php echo $row_usuarios_rb['id_bunk_level'];?>. 




</td>





<td class="align-middle" align="center">

<b><?php echo $row_usuarios['guests_observ'];?></b><br>


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


?>

<form method="POST" action="<?php echo $row_usuarios_url['link_payment']; ?>">
<button type="submit" class="btn btn-success btn-sm mb-1">
                                                                       
<i class="fa-solid fa-circle-dollar-to-slot fa-lg"></i></button> 


</form> 














<button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_usuarios['id_guests']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fas fa-edit"></i></button>    




<?php /* include("updates/update_personal_modal.php"); */ ?>





<button type="button" class="btn btn-outline-dark btn-sm mb-1" data-toggle="modal"
                  data-target="#password<?php echo $row_usuarios['id_guests']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fa-solid fa-key"></i></button>    




<?php /* include("updates/update_pass_personal_modal.php"); */?>





  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_usuarios['id_guests']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></button>                 


                  <?php /* include("deletes/delete_per_modal.php"); */ ?>






</td>


               </tr>


               <?php } while ($row_usuarios = mysqli_fetch_assoc($usuarios)); ?>
                

                </tbody>
  
  
  
              </table> <!-- cierre tabla -->
  
            </div> <!-- cierre div tabla responsiva -->
  
          </div> <!-- cierre card body -->



























                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

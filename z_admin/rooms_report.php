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








 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-regular fa-face-frown-open fa-lg "></i> &nbsp; &nbsp; Room Incident.
                </div> 

 

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-9 col-lg-9 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-9 col-lg-9 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
            </div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->



            <?php



include ("../conectar.php");

$query_rooms = "SELECT * FROM room_kind, tb_room, floors, hostel_area, room_number
where room_kind.id_room_kind = tb_room.id_room_kind
and floors.id_floors = tb_room.id_floors
and hostel_area.id_hostel_area = tb_room.id_hostel_area
and tb_room.id_room_number = room_number.id_room_number
and tb_room.id_hostel = '$mi_hostel_select'
order by tb_room.id_room_number asc";

$query_rooms_all = mysqli_query($enlace, $query_rooms) or die(mysqli_error());
$row_rooms_reveal = mysqli_fetch_assoc($query_rooms_all);
$totalRows_rooms_reveal = mysqli_num_rows($query_rooms_all);

mysqli_close($enlace);

?>








<div class="card-body border border-info mb-2" <?php if ( $totalRows_rooms_reveal == '0' ){?>style="display:none"<?php } ?> >

<div class="table-responsive">

  <table class="table table-bordered stricolor table-sm" id="dataTable" width="100%" cellspacing="0">
   
    <thead>
      <tr>                  
        
          <th width="10%">R. Name or N°</th>  <!-- chequear el status -->
          <th width="20%">Observations</th>  <!-- chequear el status -->
             <th width="10%">Floor</th>
             <th width="10%">Area</th>
             <th width="10%"><i class="fa-solid fa-toolbox fa-lg"></i></th> 
             <th width="30%">Bed(s) N° - Kind - Notes</th>

        <th width="10%"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th> 


      </tr>
    </thead>


 



     <tbody>


     







     <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


 <tr   >


 <?php

include ("../conectar.php");
$este_lo_registro = $row_rooms_reveal['creada_por'];
$queryFH_whoL = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro' limit 1";
$usuarios_whoL = mysqli_query($enlace, $queryFH_whoL) or die(mysqli_error());
$row_usuarios_whoL = mysqli_fetch_assoc($usuarios_whoL);


mysqli_close($enlace);

?>










<td class="align-middle" align="center">



<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >

<?php echo $row_rooms_reveal['name_room_number']; ?>

</div>

</td>


<td class="align-middle" align="center">
<span style="color: blue;"><?php echo $row_rooms_reveal['room_observ']; ?></span>
</td>



<td class="align-middle" align="center">

<?php echo $row_rooms_reveal['name_floors']; ?>

</td>


<td class="align-middle" align="center">  

<?php echo $row_rooms_reveal['name_hostel_area']; ?>

</td>






<?php

$id_del_room = $row_rooms_reveal['id_room'];

include ("../conectar.php");

$query_details = "SELECT * FROM tb_rooms_beds, bed_kind, bed_number
where tb_rooms_beds.id_room = '$id_del_room'
and tb_rooms_beds.id_bed_kind = bed_kind.id_bed_kind
and tb_rooms_beds.id_bed_number = bed_number.id_bed_number
order by bed_number.name_bed_number asc";

$query_rooms_details = mysqli_query($enlace, $query_details) or die(mysqli_error());
$row_rooms_details = mysqli_fetch_assoc($query_rooms_details);
$totalRows_rooms_details = mysqli_num_rows($query_rooms_details);


$query_details_alt = "SELECT * FROM tb_rooms_beds, bed_kind, bed_number
where tb_rooms_beds.id_room = '$id_del_room'
and tb_rooms_beds.id_bed_kind = bed_kind.id_bed_kind
and tb_rooms_beds.id_bed_number = bed_number.id_bed_number
order by bed_number.name_bed_number asc";

$query_rooms_details_alt = mysqli_query($enlace, $query_details_alt) or die(mysqli_error());
$row_rooms_details_alt = mysqli_fetch_assoc($query_rooms_details_alt);
$totalRows_rooms_details_alt = mysqli_num_rows($query_rooms_details_alt);



mysqli_close($enlace);

?>


<td class="align-middle" align="center">  

<div data-toggle="tooltip" data-placement="top" title="Mod Room." >
<button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_rooms_reveal['id_room']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fas fa-edit"></i></button>    
</div>

<?php include("updates/update_room_modal.php"); ?>









  <?php if ($row_rooms_reveal['room_status']=='1') { ?>
                   
  <span data-toggle="tooltip" data-placement="top" title="Room: Open"> 
  <button type="submit" name="cambio_status_room" class="btn btn-outline-success btn-sm mb-1" data-toggle="modal"
  data-target="#desactivar_room<?php echo $row_rooms_reveal['id_room']; ?>" >       
  <i class="fa-solid fa-door-open"></i></button>  
  </span> 

   <?php   }?>     



  <?php if ($row_rooms_reveal['room_status']=='0') { ?>
                   
  <span data-toggle="tooltip" data-placement="top" title="Room: Close">
  <button type="submit" name="cambio_status_room" class="btn btn-outline-secondary btn-sm mb-1"
  data-toggle="modal" data-target="#activar_room<?php echo $row_rooms_reveal['id_room']; ?>" >       
  <i class="fa-solid fa-door-closed"></i></button>  
  </span>   

                   <?php   }?>   


<?php include("updates/deshabilitar_room_modal.php"); ?>















<div data-toggle="tooltip" data-placement="top" title="Delete Room." >
  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_rooms_reveal['id_room']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></button>      
</div>


</td>

<?php include("deletes/delete_room_modal.php"); ?>













<td class="align-middle" align="left">

<?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


    <b class="ml-2"><?php echo $row_rooms_details['name_bed_number']; ?></b> - "<?php echo $row_rooms_details['name_bed_kind']; ?>":&nbsp;
    <span style="color: blue;"><?php echo $row_rooms_details['note']; ?></span> <br>


<?php } while ($row_rooms_details = mysqli_fetch_assoc($query_rooms_details)); ?>


</td>







<td class="align-middle" align="center">

<?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->  
  

  <span data-toggle="tooltip" data-placement="top" title="Mod Bed - <?php echo $row_rooms_details_alt['name_bed_number']; ?>" >
  <a href="" class="btn-primary mb-1"
  data-toggle="modal"
data-target="#edit_cama<?php echo $row_rooms_details_alt['id_rooms_beds']; ?>"
  
  ><i class="fa-solid fa-wrench"></i></a></span>



  <?php include("updates/update_beds_modal.php"); ?>




  
  <span data-toggle="tooltip" data-placement="top" title="Delete Bed - <?php echo $row_rooms_details_alt['name_bed_number']; ?>"" >
  <a href="" class="btn-danger mb-1"
  data-toggle="modal"
 data-target="#delete_cama<?php echo $row_rooms_details_alt['id_rooms_beds']; ?>"
  
  ><i class="fa-solid fa-eraser"></i></a></span><br>

 

  <?php include("deletes/delete_bed_modal.php"); ?>








<?php } while ($row_rooms_details_alt = mysqli_fetch_assoc($query_rooms_details_alt)); ?>
           


</td>





     </tr>


     <?php } while ($row_rooms_reveal = mysqli_fetch_assoc($query_rooms_all)); ?>
        

    </tbody>



  </table> <!-- cierre tabla -->

      
  </div> <!-- cierre div tabla responsiva -->

</div> <!-- cierre card body  aqui -->










                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

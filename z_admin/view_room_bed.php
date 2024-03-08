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


    $ttitulo = $_GET['ttitulo'];
    $idtbla = $_GET['idtabla'];
    























 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-people-line fa-lg "></i> &nbsp; &nbsp;  <i> All <b><?php echo $ttitulo ?></b> Rooms.</i>
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




      





<div class="card-body border border-info mb-2"  >

<div class="table-responsive">

  <table class="table table-bordered stricolor table-sm" id="dataTable" width="100%" cellspacing="0">
   
    <thead>
      <tr>                  
        
          <th>Room Number</th>  <!-- chequear el status -->
          <th>Observations</th>  <!-- chequear el status -->
             <th>Floor</th>
             <th>Area</th>
             <th>Bed(s) N° - Kind - Notes</th>

        <th><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th> 
      </tr>
    </thead>


 



     <tbody>

<?php

$este_id_kind = $idtbla;

include ("../conectar.php");

$query_rooms = "SELECT * FROM room_kind, tb_room, floors, hostel_area
where room_kind.id_room_kind = '$este_id_kind'
and room_kind.id_room_kind = tb_room.id_room_kind
and floors.id_floors = tb_room.id_floors
and hostel_area.id_hostel_area = tb_room.id_hostel_area
order by tb_room.id_room_number asc";

$query_rooms_all = mysqli_query($enlace, $query_rooms) or die(mysqli_error());
$row_rooms_reveal = mysqli_fetch_assoc($query_rooms_all);
$totalRows_rooms_reveal = mysqli_num_rows($query_rooms_all);

mysqli_close($enlace);

?>
     







     <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


 <tr>





<td class="align-middle" align="center">

<?php echo $row_rooms_reveal['id_room_number']; ?>

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
order by tb_rooms_beds.id_bed_kind asc";

$query_rooms_details = mysqli_query($enlace, $query_details) or die(mysqli_error());
$row_rooms_details = mysqli_fetch_assoc($query_rooms_details);
$totalRows_rooms_details = mysqli_num_rows($query_rooms_details);

mysqli_close($enlace);

?>


<td class="align-middle" align="left">

<?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


    <b class="ml-2"><?php echo $row_rooms_details['name_bed_number']; ?></b> - "<?php echo $row_rooms_details['name_bed_kind']; ?>":&nbsp;
    <span style="color: blue;"><?php echo $row_rooms_details['note']; ?></span> <br>


<?php } while ($row_rooms_details = mysqli_fetch_assoc($query_rooms_details)); ?>


</td>



<td class="align-middle" align="center">


<button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_rooms_reveal['id_room']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fas fa-edit"></i></button>    


<?php // include("updates/update_personal_modal.php"); ?>


  
<?php //aqui va el de habilitar y deshabiliar ?>



  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_rooms_reveal['id_room']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></button>                 


    </td>


<?php // include("deletes/delete_per_modal.php"); ?>


     </tr>


     <?php } while ($row_rooms_reveal = mysqli_fetch_assoc($query_rooms_all)); ?>
        

    </tbody>



  </table> <!-- cierre tabla -->

</div> <!-- cierre div tabla responsiva -->

</div> <!-- cierre card body  aqui -->























                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

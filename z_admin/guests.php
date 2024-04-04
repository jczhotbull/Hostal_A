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
                    <i class="fa-solid fa-person-walking-luggage fa-lg "></i> &nbsp; &nbsp; Guests
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




      


 <!-- Icon Cards-->
      
      <div class="row">




<?php

$date_hoy = date('Y-m-d');

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












      <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-bolt o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-solid fa-bed fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzpe">Today (<?php echo $totalRows_usuarios; ?>)</div>
              <div class="infozzz">Current</div>
              <div class="infozzz">Guests</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="current_guests.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 


<?php

$date_hoy_m = date('Y-m');

include ("../conectar.php");

$queryFHL_m = "SELECT * FROM tb_guests, bed_booking, tb_data_guests, sex, nationality, behaviors, tb_room
WHERE tb_guests.id_guests = bed_booking.id_guests
and tb_guests.id_guests = tb_data_guests.id_guests 
and tb_guests.guests_sex = sex.id_sex
and tb_data_guests.id_nation_g = nationality.id_nationality
and tb_data_guests.guests_behaviors = behaviors.id_behaviors
and bed_booking.id_room = tb_room.id_room
and bed_booking.id_hostel = '$mi_hostel_select'
and bed_booking.booking_status = '2'
and bed_booking.arreglo_d LIKE '%".$date_hoy_m."%'

ORDER BY tb_guests.guests_doc_id ASC";

$usuarios_m = mysqli_query($enlace, $queryFHL_m) or die(mysqli_error());

$row_usuarios_m = mysqli_fetch_assoc($usuarios_m);

$totalRows_usuarios_m = mysqli_num_rows($usuarios_m);

mysqli_close($enlace);

?>








        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-fresa o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-regular fa-calendar-days fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzpe">Month (<?php echo $totalRows_usuarios_m; ?>)</div>
              <div class="infozzz">Current</div>
              <div class="infozzz">Guests</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="current_guests_month.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 





<?php

$date_hoy_n = date('Y-m', strtotime('+1 month'));

include ("../conectar.php");

$queryFHL_n = "SELECT * FROM tb_guests, bed_booking, tb_data_guests, sex, nationality, behaviors, tb_room
WHERE tb_guests.id_guests = bed_booking.id_guests
and tb_guests.id_guests = tb_data_guests.id_guests 
and tb_guests.guests_sex = sex.id_sex
and tb_data_guests.id_nation_g = nationality.id_nationality
and tb_data_guests.guests_behaviors = behaviors.id_behaviors
and bed_booking.id_room = tb_room.id_room
and bed_booking.id_hostel = '$mi_hostel_select'
and bed_booking.booking_status = '2'
and bed_booking.arreglo_d LIKE '%".$date_hoy_n."%'

ORDER BY tb_guests.guests_doc_id ASC";

$usuarios_n = mysqli_query($enlace, $queryFHL_n) or die(mysqli_error());

$row_usuarios_n = mysqli_fetch_assoc($usuarios_n);

$totalRows_usuarios_n = mysqli_num_rows($usuarios_n);

mysqli_close($enlace);

?>








        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-grama o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-solid fa-calendar-plus fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzpe">Next Month (<?php echo $totalRows_usuarios_n; ?>)</div>
              <div class="infozzz">Guests</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="current_guests_month_next.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 



        <?php

$date_hoy_rr = date('Y-m');

include ("../conectar.php");

$queryFHL_rr = "SELECT * FROM tb_guests, bed_booking, tb_data_guests, sex, nationality, behaviors, tb_room
WHERE tb_guests.id_guests = bed_booking.id_guests
and tb_guests.id_guests = tb_data_guests.id_guests 
and tb_guests.guests_sex = sex.id_sex
and tb_data_guests.id_nation_g = nationality.id_nationality
and tb_data_guests.guests_behaviors = behaviors.id_behaviors
and bed_booking.id_room = tb_room.id_room
and bed_booking.id_hostel = '$mi_hostel_select'
and bed_booking.booking_status = '1'
and bed_booking.arreglo_d LIKE '%".$date_hoy_rr."%'

ORDER BY tb_guests.guests_doc_id ASC";

$usuarios_rr = mysqli_query($enlace, $queryFHL_rr) or die(mysqli_error());

$row_usuarios_rr = mysqli_fetch_assoc($usuarios_rr);

$totalRows_usuarios_rr = mysqli_num_rows($usuarios_rr);

mysqli_close($enlace);

?>





        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-ocean o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-solid fa-calendar-day fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzpe">Month (<?php echo $totalRows_usuarios_rr; ?>)</div>
              <div class="infozzz">Reservations</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="current_guests_month_rr.php">
              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 







      </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->











                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

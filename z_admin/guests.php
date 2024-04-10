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









    if(isset($_POST['buscalo_doc']))
    {

if (strlen($_POST['buscar_doc2']) <=4 )  // no sea mayor a 40 caracteres
    {   $errorZ .= "- Insert more than 5 characters. "; }


else { 

  $busqueda = $_POST['buscar_doc2'];

  header('Location: current_guests_doc.php?doc_s='.$busqueda.'');
  die();


}   /* cierre donde procede si el documento tiene 5 o mas caracteres */

    } /* cierre if buscar doc  */





    if(isset($_POST['buscalo_name']))
    {

if (strlen($_POST['buscar_name2']) <=2 )  // no sea mayor a 40 caracteres
    {   $errorZ .= "- Insert more than 3 characters. "; }


else { 

  $busqueda = $_POST['buscar_name2'];

  header('Location: current_guests_name.php?name_s='.$busqueda.'');
  die();


}   /* cierre donde procede si el documento tiene 5 o mas caracteres */

    } /* cierre if buscar doc  */







    if(isset($_POST['buscalo_ape']))
    {

if (strlen($_POST['buscar_ape2']) <=2 )  // no sea mayor a 40 caracteres
    {   $errorZ .= "- Insert more than 3 characters. "; }


else { 

  $busqueda = $_POST['buscar_ape2'];

  header('Location: current_guests_ape.php?ape_s='.$busqueda.'');
  die();


}   /* cierre donde procede si el documento tiene 5 o mas caracteres */

    } /* cierre if buscar doc  */












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

      <div class="col-xl-3 col-sm-6 mb-3" >
          <div class="card text-white relleno-purpplight o-hidden h-100">

            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-search"></i>
              </div>

            <div class="col-lg-9 col-md-12" style="margin-left: -25px; margin-top: -10px;">

              <span class="" style="font-size: 18px;">Search by:</span>

  <script type="text/javascript" src="00_auto/jquery-1.12.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="00_auto/jquery-ui.css">
  <script type="text/javascript" src="00_auto/jquery-ui.js"></script>
  <script type="text/javascript" src="00_auto/jquery.ui.autocomplete.scroll.min.js"></script> 




  <form method="POST">

           <div class="input-group input-group-sm mb-1" style="margin-top: 10px;">
            
            <input type="text" class="form-control" id="buscar_doc2" name="buscar_doc2" name="buscar_doc" placeholder="Doc...">




            <?php

include("../conectar.php");

      $query_bus_doc = "SELECT * FROM  tb_guests
        
        WHERE  guests_status = 1 group by guests_doc_id ";

$datos_plantilla_bus_doc = mysqli_query($enlace, $query_bus_doc) or die(mysqli_error());
$totalRows_datos_plantilla_bus_doc = mysqli_num_rows($datos_plantilla_bus_doc); 


$el_listado_doc = array();

while ($row_doc = mysqli_fetch_array($datos_plantilla_bus_doc)) {
        /*  $estudiantesNN = $row['nombre_estu'].' '.$row['apellidos_estu']; */
          $estudiantes_doc = $row_doc['guests_doc_id'];
          array_push ($el_listado_doc, $estudiantes_doc );          
}
mysqli_close($enlace);
?>

<script type="text/javascript">

    $(document).ready(function () {
      var items_doc = <?= json_encode($el_listado_doc);  ?>

$("#buscar_doc2").autocomplete({
  source: items_doc,
  minLength: 3,
  autoFocus: true,
  maxShowItems: 5
});
        });

  </script>



<div class="input-group-append">
<button type="submit" name="buscalo_doc" class="btn btn-light"><i style="color:#855995;"><i class="fa-regular fa-circle-right fa-lg "></i></i></button>
            </div>

          </div>
          </form>













 <form method="POST">

           <div class="input-group input-group-sm mb-1">
            
            <input type="text" class="form-control" id="buscar_name2" name="buscar_name2" placeholder="Name...">

<?php

include("../conectar.php");

      $query_bus_name = "SELECT * FROM  tb_guests
        
        WHERE  guests_status = 1 group by p_name_g ";

$datos_plantilla_bus_name = mysqli_query($enlace, $query_bus_name) or die(mysqli_error());
$totalRows_datos_plantilla_bus_name = mysqli_num_rows($datos_plantilla_bus_name); 


$el_listado_name = array();

while ($row_name = mysqli_fetch_array($datos_plantilla_bus_name)) {
        /*  $estudiantesNN = $row['nombre_estu'].' '.$row['apellidos_estu']; */
          $estudiantes_name = $row_name['p_name_g'];
          array_push ($el_listado_name, $estudiantes_name );          
}
mysqli_close($enlace);
?>

<script type="text/javascript">

    $(document).ready(function () {
      var items_name = <?= json_encode($el_listado_name);  ?>

$("#buscar_name2").autocomplete({
  source: items_name,
  minLength: 3,
  autoFocus: true,
  maxShowItems: 5
});
        });

  </script>



            <div class="input-group-append">
            <button type="submit" name="buscalo_name" class="btn btn-light"><i style="color:#855995;"><i class="fa-regular fa-circle-right fa-lg "></i></i></button>
            </div>
          </div>
 </form>





 <form method="POST">

           <div class="input-group input-group-sm mb-1">
            
            <input type="text" class="form-control" id="buscar_ape2" name="buscar_ape2" placeholder="Surname...">


<?php

include("../conectar.php");

      $query_bus_ape = "SELECT * FROM  tb_guests
        
      WHERE  guests_status = 1 group by p_surname_g ";

$datos_plantilla_bus_ape = mysqli_query($enlace, $query_bus_ape) or die(mysqli_error());
$totalRows_datos_plantilla_bus_ape = mysqli_num_rows($datos_plantilla_bus_ape); 


$el_listado_ape = array();

while ($row_ape = mysqli_fetch_array($datos_plantilla_bus_ape)) {
        /*  $estudiantesNN = $row['nombre_estu'].' '.$row['apellidos_estu']; */
          $estudiantes_ape = $row_ape['p_surname_g'];
          array_push ($el_listado_ape, $estudiantes_ape );          
}
mysqli_close($enlace);
?>

<script type="text/javascript">

    $(document).ready(function () {
      var items_ape = <?= json_encode($el_listado_ape);  ?>

$("#buscar_ape2").autocomplete({
  source: items_ape,
  minLength: 3,
  autoFocus: true,
  maxShowItems: 5
});
        });

  </script>


            <div class="input-group-append">
            <button type="submit" name="buscalo_ape" class="btn btn-light"><i style="color:#855995;"><i class="fa-regular fa-circle-right fa-lg "></i></i></button>
            </div>
          </div>
 </form>




            </div>              
            </div>   

          </div>
      </div>












































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
and (bed_booking.arreglo_d LIKE '%".$date_hoy."%' OR bed_booking.date_in LIKE '%".$date_hoy."%' OR bed_booking.date_out LIKE '%".$date_hoy."%' )



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
              <div class="mr-5 cantidadzzzpe"></div>
              <div class="cantidadzzzpe mt-5">(<?php echo $totalRows_usuarios; ?>)</div>
              <div class="infozzz">Current Guests</div>
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
and (bed_booking.arreglo_d LIKE '%".$date_hoy_m."%' OR bed_booking.date_in LIKE '%".$date_hoy_m."%' OR bed_booking.date_out LIKE '%".$date_hoy_m."%' )

ORDER BY tb_guests.guests_doc_id ASC";

$usuarios_m = mysqli_query($enlace, $queryFHL_m) or die(mysqli_error());

$row_usuarios_m = mysqli_fetch_assoc($usuarios_m);

$totalRows_usuarios_m = mysqli_num_rows($usuarios_m);

mysqli_close($enlace);

?>








        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-ocean o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-regular fa-calendar-days fa-xs"> </i>
              </div>

              <div class="mr-5 cantidadzzzpe"></div>
              <div class="cantidadzzzpe mt-5">(<?php echo $totalRows_usuarios_m; ?>)</div>
              <div class="infozzz">This Month</div>



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

$date_hoy_n = date('Y-m');

$date22 = strtotime($date_hoy_n);

$current = strtotime("+1 month", $date22);  // para dejar por fuera la fecha de check in

$dates = date('Y-m', $current);


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
and (bed_booking.arreglo_d LIKE '%".$dates."%' OR bed_booking.date_in LIKE '%".$dates."%' OR bed_booking.date_out LIKE '%".$dates."%' )

ORDER BY tb_guests.guests_doc_id ASC";

$usuarios_n = mysqli_query($enlace, $queryFHL_n) or die(mysqli_error());

$row_usuarios_n = mysqli_fetch_assoc($usuarios_n);

$totalRows_usuarios_n = mysqli_num_rows($usuarios_n);

mysqli_close($enlace);

?>








        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-vino o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-solid fa-calendar-plus fa-xs"> </i>
              </div>

              <div class="mr-5 cantidadzzzpe"></div>
              <div class="cantidadzzzpe mt-5">(<?php echo $totalRows_usuarios_n; ?>) </div>
              <div class="infozzz">Next Month</div>


            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="current_guests_month_next.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 



   







      </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->



 <!-- Icon Cards-->
      
 <div class="row">




 <?php

$date_hoy = date('Y-m-d');

include ("../conectar.php");

$queryFHL_hoy = "SELECT * FROM tb_guests, bed_booking, tb_data_guests, sex, nationality, behaviors, tb_room
WHERE tb_guests.id_guests = bed_booking.id_guests
and tb_guests.id_guests = tb_data_guests.id_guests 
and tb_guests.guests_sex = sex.id_sex
and tb_data_guests.id_nation_g = nationality.id_nationality
and tb_data_guests.guests_behaviors = behaviors.id_behaviors
and bed_booking.id_room = tb_room.id_room
and bed_booking.id_hostel = '$mi_hostel_select'
and bed_booking.booking_status = '2'
and bed_booking.date_in LIKE '%".$date_hoy."%' 

ORDER BY tb_guests.guests_doc_id ASC";

$usuarios_hoy = mysqli_query($enlace, $queryFHL_hoy) or die(mysqli_error());

$row_usuarios_hoy = mysqli_fetch_assoc($usuarios_hoy);

$totalRows_usuarios_hoy = mysqli_num_rows($usuarios_hoy);

mysqli_close($enlace);

?>












      <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-grama o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-solid fa-person-walking-arrow-right fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzpe"></div>
              <div class="cantidadzzzpe mt-5">(<?php echo $totalRows_usuarios_hoy; ?>)</div>
              <div class="infozzz">Enter Today</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="current_guests_today.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 









        
 <?php

$date_hoy = date('Y-m-d');

include ("../conectar.php");

$queryFHL_hoy_l = "SELECT * FROM tb_guests, bed_booking, tb_data_guests, sex, nationality, behaviors, tb_room
WHERE tb_guests.id_guests = bed_booking.id_guests
and tb_guests.id_guests = tb_data_guests.id_guests 
and tb_guests.guests_sex = sex.id_sex
and tb_data_guests.id_nation_g = nationality.id_nationality
and tb_data_guests.guests_behaviors = behaviors.id_behaviors
and bed_booking.id_room = tb_room.id_room
and bed_booking.id_hostel = '$mi_hostel_select'
and bed_booking.booking_status = '2'
and bed_booking.date_out LIKE '%".$date_hoy."%' 

ORDER BY tb_guests.guests_doc_id ASC";

$usuarios_hoy_l = mysqli_query($enlace, $queryFHL_hoy_l) or die(mysqli_error());

$row_usuarios_hoy_l = mysqli_fetch_assoc($usuarios_hoy_l);

$totalRows_usuarios_hoy_l = mysqli_num_rows($usuarios_hoy_l);

mysqli_close($enlace);

?>






      <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-fresa o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-solid fa-person-walking-dashed-line-arrow-right fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzpe"></div>
              <div class="cantidadzzzpe mt-5">(<?php echo $totalRows_usuarios_hoy_l; ?>)</div>
              <div class="infozzz">Leave Today</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="current_guests_leave.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 










 </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->







 <!-- Icon Cards-->
      
 <div class="row">


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
and (bed_booking.arreglo_d LIKE '%".$date_hoy_rr."%' OR bed_booking.date_in LIKE '%".$date_hoy_rr."%' OR bed_booking.date_out LIKE '%".$date_hoy_rr."%' )

ORDER BY tb_guests.guests_doc_id ASC";

$usuarios_rr = mysqli_query($enlace, $queryFHL_rr) or die(mysqli_error());

$row_usuarios_rr = mysqli_fetch_assoc($usuarios_rr);

$totalRows_usuarios_rr = mysqli_num_rows($usuarios_rr);

mysqli_close($enlace);

?>





        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-yellow o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-regular fa-calendar-xmark fa-xs"> </i>
              </div>

              <div class="mr-5 cantidadzzzpe"></div>
              <div class="cantidadzzzpe mt-5">(<?php echo $totalRows_usuarios_rr; ?>)</div>
              <div class="infozzz">Incomplete</div>


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

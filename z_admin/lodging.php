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
                    <i class="fa-solid fa-cart-flatbed-suitcase fa-lg "></i> &nbsp; &nbsp; Reception
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
include("../conectar.php");

$queryHost = "SELECT id_hostel,id_currency FROM z_hostel where id_hostel = '$mi_hostel_select' LIMIT 1";
$datos_queryHost = mysqli_query($enlace, $queryHost) or die(mysqli_error());
$row_datos_queryHost = mysqli_fetch_array($datos_queryHost); 

$id_verificado_host = $row_datos_queryHost['id_hostel'];
$id_currency_del_host = $row_datos_queryHost['id_currency'];




$queryFHL_currencys_out = "SELECT * FROM exchange_rates
 where id_hostel = '$mi_hostel_select'
 order BY all_set_this_time DESC limit 1";

$the_currencys_out = mysqli_query($enlace, $queryFHL_currencys_out) or die(mysqli_error());
$row_the_currencys_out = mysqli_fetch_assoc($the_currencys_out);
$totalRows_the_currencys_out = mysqli_num_rows($the_currencys_out);


$query_String_roomsMM = "SELECT COUNT(*) AS total_roomsMM FROM tb_room
where id_hostel = '$mi_hostel_select'";
$query_roomsMM = mysqli_query($enlace, $query_String_roomsMM);
$row_roomsMM = mysqli_fetch_object($query_roomsMM);



mysqli_close($enlace);
     ?> 




<span <?php if ( $row_roomsMM->total_roomsMM =='0' or $totalRows_the_currencys_out =='0' ){?>style="display:none"<?php } ?>  >






      


 <!-- Icon Cards-->
      
      <div class="row"> 

        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-bolt o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-person-walking-arrow-right fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzpe"></div>
              <div class="infozzz">Walk-In</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="f_check_in_a.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 






      <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-grama o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-file-contract fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzsmall">Check-In</div>
              <div class="infozzz"></div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="check_in.php">
              <span class="float-left">Set</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 




        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-verdeosc o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon">
                <i class="fa-solid fa-file-signature fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzsmall">Mod</div> 
              <div class="cantidadzzzsmall">Check-In</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-browplight_a o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-calendar-check fa-xs"> </i>
              </div> 
              <div class="mr-5 cantidadzzzpe">Extend</div>  
              <div class="infozzz">Stay</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



       


        </div>  <!-- cierre row -->



 <!-- Icon Cards-->
      
 <div class="row">

 <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-fresal o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon"> 
<i class="fa-solid fa-person-walking-dashed-line-arrow-right fa-xs"> </i> 
              </div>
              <div class="mr-5 cantidadzzzsmall">Check-Out</div>
              <div class="infozzz"></div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="">
              <span class="float-left">Set</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

 </div>  <!-- cierre row -->









 <!-- Icon Cards-->
      
 <div class="row">



        <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white relleno-salmon_a o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon">
                <i class="fa-solid fa-business-time fa-xs"> </i>
              </div>
              <div class="mr-5 cantidadzzzsmall">Bookings</div>
              <div class="cantidadzzzsmall"></div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="">
              <span class="float-left">Set</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> 




      








         

      </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->


</span>








                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

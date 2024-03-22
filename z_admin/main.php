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





include ("../conectar.php");      // detecta si el usuario a actualizado sus datos o no.


include ("php_list/main_list.php");


$este_es_el_user = $_SESSION['id_per'];
$queryFHL_now = "SELECT id_per, per_was_mod, pass_was_mod FROM tb_personal
WHERE id_per = '$este_es_el_user' limit 1";

$usuarios_now = mysqli_query($enlace, $queryFHL_now) or die(mysqli_error());
$row_usuarios_now = mysqli_fetch_assoc($usuarios_now);

$was_or_not = $row_usuarios_now['per_was_mod'];
$pass_was_or_not = $row_usuarios_now['pass_was_mod'];




$este_es_el_user = $_SESSION['id_per'];
$este_es_el_rol_del_user = $_SESSION['id_rol_per'] == '1';



$mi_hostel_select = $_SESSION['hostel_activo'];

$queryFHL_currencys_prim = "SELECT * FROM exchange_rates
 where id_hostel = '$mi_hostel_select'
 order BY all_set_this_time DESC limit 1";

$the_currencys_prim = mysqli_query($enlace, $queryFHL_currencys_prim) or die(mysqli_error());
$row_the_currencys_prim = mysqli_fetch_assoc($the_currencys_prim);
$totalRows_the_currencys_prim = mysqli_num_rows($the_currencys_prim);





mysqli_close($enlace);









 include ("a_header.php"); ?>
















        <div class="content-wrapper">
            <div class="container-fluid">




           <div class="form-row">

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fas fa-home fa-lg "></i> &nbsp; &nbsp; Main
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

if ($row_cumplen->total !="0" ) {
      $cumple_img = 'fas fa-birthday-cake fa-beat';
  }

else { 
       $cumple_img = 'fas fa-birthday-cake';
                }

 ?>




<div class="form-row margencito">


<?php
include("../conectar.php");

$queryHost = "SELECT * FROM z_hostel where id_hostel = '$mi_hostel_select' LIMIT 1";
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

if ($totalRows_the_currencys_out >='1') {


$pruebarrA = $row_the_currencys_out['currency_A_value'];
$pruebarrB = $row_the_currencys_out['currency_B_value'];

$la_fechita_es = $row_the_currencys_out['all_set_this_time'];

$format_monetA = number_format("$pruebarrA",2,",",".");
$format_monetB = number_format("$pruebarrB",2,",",".");
}

mysqli_close($enlace);
     ?> 



<style type="text/css">
@font-face {
  font-family: DIGITAL-7;
  src: url(00_vendor/digital-7.ttf);
}

.lcd {background-color:#7D8C76;
color:#343434;
font-family: DIGITAL-7;
font-size: 24px;
text-align: center;
font-weight: 600;
letter-spacing: 3px;
}
</style>











<div class="col-md-6 col-lg-3 mb-3" <?php if ( $totalRows_the_currencys_prim =='0' ){?>style="display:none"<?php } ?>  >  


<?php
    
include ("../conectar.php");

$main_main = $row_the_currencys_out['id_hostel_currency'];;

$queryFHL_currencys_main_mia = "SELECT * FROM currency where id_currency = '$main_main' limit 1";

$the_currencys_main_mia = mysqli_query($enlace, $queryFHL_currencys_main_mia) or die(mysqli_error());
$row_the_currencys_main_mia = mysqli_fetch_assoc($the_currencys_main_mia);
$totalRows_the_currencys_main_mia = mysqli_num_rows($the_currencys_main_mia);






$main_cheA = $row_the_currencys_out['id_currency_A'];

$queryFHL_currencys_mainAC = "SELECT * FROM currency where id_currency = '$main_cheA' limit 1";

$the_currencys_mainAC = mysqli_query($enlace, $queryFHL_currencys_mainAC) or die(mysqli_error());
$row_the_currencys_mainAC = mysqli_fetch_assoc($the_currencys_mainAC);
$totalRows_the_currencys_mainAC = mysqli_num_rows($the_currencys_mainAC);




$main_cheB = $row_the_currencys_out['id_currency_B'];

$queryFHL_currencys_mainBC = "SELECT * FROM currency where id_currency = '$main_cheB' limit 1";

$the_currencys_mainBC = mysqli_query($enlace, $queryFHL_currencys_mainBC) or die(mysqli_error());
$row_the_currencys_mainBC = mysqli_fetch_assoc($the_currencys_mainBC);
$totalRows_the_currencys_mainBC = mysqli_num_rows($the_currencys_mainBC);



mysqli_close($enlace); 
 ?>











  <div class="lcd" style="border: 1px solid #7D8C76; border-radius: 4px; ">
  1 <?php echo $row_the_currencys_mainAC['symbol_currency']; ?> =
  <?php echo $format_monetA; ?> <?php echo $row_the_currencys_main_mia['symbol_currency']; ?></div>

</div>



<div class="col-md-6 col-lg-3 mb-3" <?php if ( $totalRows_the_currencys_prim =='0' ){?>style="display:none"<?php } ?>  >  

  <div class="lcd" style="border: 1px solid #7D8C76; border-radius: 4px; ">
  1 <?php echo $row_the_currencys_mainBC['symbol_currency']; ?> =
  <?php echo $format_monetB; ?> <?php echo $row_the_currencys_main_mia['symbol_currency']; ?></div>

</div>
















</div>














<h4 class="glowwhite mt-4">Info:</h4>









 <!-- Icon Cards-->
      
<div class="row">






        <div class="col-xl-3 col-sm-6 col-6 mb-3" <?php if ( $was_or_not != '0' & $pass_was_or_not !='0' ){?>style="display:none"<?php } ?> >
          <div class="card text-white relleno-fresa o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-triangle-exclamation fa-beat fa-xs"  ></i>  
              </div>
              <div class="mr-5 cantidadzzzpe">Update</div>
              <div class="infozzz">Your info.</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="my_user.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i> 
              </span>
            </a>
          </div>
        </div>




      <div class="col-xl-3 col-sm-6 col-6 mb-3" <?php if ( ($este_es_el_rol_del_user != '1' && $hostel_was_upd == '1') or
      ($este_es_el_rol_del_user != '1' or $hostel_was_upd == '1') ){?>style="display:none"<?php } ?> >

          <div class="card text-white relleno-indigo o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-exclamation fa-beat"  ></i>    
              </div>
              <div class="mr-5 cantidadzzzpe">Update</div>
              <div class="infozzz">Hostel info.</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="hostel.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i> 
              </span>
            </a>
          </div>
        </div>





 <div class="col-xl-3 col-sm-6 col-6 mb-3" <?php if ( $totalRows_the_currencys_prim >='1' OR $este_es_el_rol_del_user != '1' ){?>style="display:none"<?php } ?> >

          <div class="card text-white relleno-grama o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon_pe">
                <i class="fa-solid fa-magnifying-glass-dollar fa-sm fa-beat"  ></i>    
              </div>
              <div class="mr-5 cantidadzzzpe">Set a</div> 
              <div class="infozzz">conversion rate.</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="prices.php">
              <span class="float-left">Set</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i> 
              </span>
            </a>
          </div>
</div>









        <div class="col-xl-3 col-sm-6 col-6 mb-3" <?php if ( $row_cumplen->total =='0' ){?>style="display:none"<?php } ?>  >
          <div class="card text-white relleno-pink o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="<?php echo $cumple_img; ?> fa-xs" style="--fa-beat-scale: 1.1;"></i>
              </div>
              <div class="mr-5 cantidadzzzpe">Today <b><?php echo $row_cumplen->total; ?></b></div>
              <div class="infozzz">Birthdays.</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="cumplen_hoy.php">
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

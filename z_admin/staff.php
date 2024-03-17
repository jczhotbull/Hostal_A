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











    include ("../conectar.php");
    include ("php_list/birth_list.php");















 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row">

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-user-group fa-lg "></i> &nbsp; &nbsp; Staff
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



 <!-- Icon Cards-->
      
      <div class="row">


<div class="col-xl-3 col-sm-6 col-6 mb-3" <?php if ( $row_cumplen->total =='0' ){?>style="display:none"<?php } ?> >
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

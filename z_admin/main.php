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



 <!-- Icon Cards-->
      
<div class="row">






        <div class="col-xl-3 col-sm-6 mb-3" <?php if ( $was_or_not != '0' & $pass_was_or_not !='0' ){?>style="display:none"<?php } ?> >
          <div class="card text-white relleno-fresa o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-triangle-exclamation fa-beat"  ></i>  
              </div>
              <div class="mr-5 cantidadzzzpe">Please update</div>
              <div class="infozzz">password and info.</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="my_user.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i> 
              </span>
            </a>
          </div>
        </div>




      <div class="col-xl-3 col-sm-6 mb-3" <?php if ( ($este_es_el_rol_del_user != '1' && $hostel_was_upd == '1') or
      ($este_es_el_rol_del_user != '1' or $hostel_was_upd == '1') ){?>style="display:none"<?php } ?> >

          <div class="card text-white relleno-indigo o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-exclamation fa-beat"  ></i>    
              </div>
              <div class="mr-5 cantidadzzzpe">Please</div>
              <div class="infozzz">update Hostel info.</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" href="hostel.php">
              <span class="float-left">Go</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i> 
              </span>
            </a>
          </div>
        </div>





        <div class="col-xl-3 col-sm-6 mb-3"  >
          <div class="card text-white relleno-pink o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="<?php echo $cumple_img; ?>" style="--fa-beat-scale: 2.0;"></i>
              </div>
              <div class="mr-5 cantidadzzzpe">Today <b><?php echo $row_cumplen->total; ?></b> co-workers</div>
              <div class="infozzz">turn years old.</div>
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

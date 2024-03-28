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





    include ("../conectar.php");   // para saber cuantas rooms ay
    
    $query_String_servicesMM = "SELECT COUNT(*) AS total_servicesMM FROM tb_services
                            where id_hostal = '$mi_hostel_select'";
    $query_servicesMM = mysqli_query($enlace, $query_String_servicesMM);
    $row_servicesMM = mysqli_fetch_object($query_servicesMM);
    
    mysqli_close($enlace);














 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-store fa-lg "></i> &nbsp; &nbsp; Services
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

      <div class="col-xl-3 col-sm-6 col-6 mb-3" >
  <div class="card text-white relleno-indigo o-hidden h-100">
    <div class="card-body">
      <div class="card-body-icon">
        <i class="fa-solid fa-store fa-xs"  ></i>    
      </div>
      <div class="mr-5 cantidadzzzpe">Set</div>  
      <div class="infozzz">a service.</div>
    </div>
    <a class=" card-footer card-footerz text-white clearfix small z-1" href="set_services.php">
      <span class="float-left">Go</span>
      <span class="float-right">
        <i class="fa fa-angle-right"></i> 
      </span>
    </a>
  </div>
</div>   



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

mysqli_close($enlace);
     ?> 




<div class="col-xl-3 col-sm-6 col-6 mb-3" <?php if ( $row_servicesMM->total_servicesMM =='0' or $totalRows_the_currencys_out =='0' ){?>style="display:none"<?php } ?> >
  <div class="card text-white relleno-grama o-hidden h-100">
    <div class="card-body">
      <div class="card-body-icon">
        <i class="fa-solid fa-cash-register fa-xs"  ></i>  
      </div>
      <div class="mr-5 cantidadzzzpe">Service(s)</div>  
      <div class="infozzz">prices.</div>
    </div>
    <a class=" card-footer card-footerz text-white clearfix small z-1" href="services_prices.php">
      <span class="float-left">Go</span>
      <span class="float-right">
        <i class="fa fa-angle-right"></i> 
      </span>
    </a>
  </div>
</div>

















      </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->









<h4 class="glowwhite mt-4" <?php if ( $row_servicesMM->total_servicesMM =='0' ){?>style="display:none"<?php } ?> >Service(s) Info:</h4>



 <!-- Icon Cards-->
      
 <div class="row" <?php if ( $row_servicesMM->total_servicesMM =='0' ){?>style="display:none"<?php } ?> >



 <?php

include ("../conectar.php");

$queryFHL_tipos = "SELECT id_hostal, id_product_kind FROM tb_services
where id_hostal = '$mi_hostel_select'
group BY id_product_kind ASC";


$services_tipes = mysqli_query($enlace, $queryFHL_tipos) or die(mysqli_error());
$row_services_tipes = mysqli_fetch_assoc($services_tipes);
$totalRows_services_tipes = mysqli_num_rows($services_tipes);

mysqli_close($enlace);

$background = '515463';

?>


<?php  do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->      







<?php

$este_id_kind = $row_services_tipes['id_product_kind'];

include ("../conectar.php");

$queryFHL_nombre = "SELECT * FROM product_kind where id_product_kind = '$este_id_kind' limit 1";
$services_reveal_name_tipes = mysqli_query($enlace, $queryFHL_nombre) or die(mysqli_error());
$row_services_reveal_name_tipes = mysqli_fetch_assoc($services_reveal_name_tipes);
$totalRows_services_reveal_name_tipes = mysqli_num_rows($services_reveal_name_tipes);



$queryFHL_conteo_t = "SELECT id_product_kind FROM tb_services
where id_product_kind = '$este_id_kind'
and id_hostal = '$mi_hostel_select' order by id_product_kind asc ";

$services_conteo_t = mysqli_query($enlace, $queryFHL_conteo_t) or die(mysqli_error());
$row_services_conteo_t = mysqli_fetch_assoc($services_conteo_t);
$totalRows_services_conteo_t = mysqli_num_rows($services_conteo_t);




mysqli_close($enlace);

?>





<div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white o-hidden h-100"
          style="background:#<?php  echo $background; $background = $background + '1200';  ?>">
            <div class="card-body">
              <div class="card-body-icon">
<?php  echo $totalRows_services_conteo_t; ?>          
              </div>
              <div class="mr-5 cantidadzzz"></div>

              <div class="infozzz">
<?php
$mi_name_kind = $row_services_reveal_name_tipes['name_product_kind'];
echo $row_services_reveal_name_tipes['name_product_kind']; ?> </div>
            </div>

            <a class=" card-footer card-footerz text-white clearfix small z-1"        

            
href="view_services.php?idtabla=<?php  echo $este_id_kind; ?>&ttitulo=<?php  echo $mi_name_kind; ?>">  

              <span class="float-left">View/Edit</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
</div>





<?php  } while ($row_services_tipes = mysqli_fetch_assoc($services_tipes)); ?>



      





       







        </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->






















<h4 class="glowwhite mt-4" <?php if ( $row_servicesMM->total_servicesMM =='0' ){?>style="display:none"<?php } ?> >Service(s) Quantities:</h4>



 <!-- Icon Cards-->
      
 <div class="row" <?php if ( $row_servicesMM->total_servicesMM =='0' ){?>style="display:none"<?php } ?> >



 <?php

include ("../conectar.php");

$queryFHL_tipos = "SELECT id_hostal, id_product_kind FROM tb_services
where id_hostal = '$mi_hostel_select'
group BY id_product_kind ASC";


$services_tipes = mysqli_query($enlace, $queryFHL_tipos) or die(mysqli_error());
$row_services_tipes = mysqli_fetch_assoc($services_tipes);
$totalRows_services_tipes = mysqli_num_rows($services_tipes);

mysqli_close($enlace);

$background = '519463';

?>


<?php  do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->      







<?php

$este_id_kind = $row_services_tipes['id_product_kind'];

include ("../conectar.php");

$queryFHL_nombre = "SELECT * FROM product_kind where id_product_kind = '$este_id_kind' limit 1";
$services_reveal_name_tipes = mysqli_query($enlace, $queryFHL_nombre) or die(mysqli_error());
$row_services_reveal_name_tipes = mysqli_fetch_assoc($services_reveal_name_tipes);
$totalRows_services_reveal_name_tipes = mysqli_num_rows($services_reveal_name_tipes);



$queryFHL_conteo_t = "SELECT id_product_kind FROM tb_services
where id_product_kind = '$este_id_kind'
and id_hostal = '$mi_hostel_select' order by id_product_kind asc ";

$services_conteo_t = mysqli_query($enlace, $queryFHL_conteo_t) or die(mysqli_error());
$row_services_conteo_t = mysqli_fetch_assoc($services_conteo_t);
$totalRows_services_conteo_t = mysqli_num_rows($services_conteo_t);




mysqli_close($enlace);

?>





<div class="col-xl-3 col-sm-6 col-6 mb-3"  >
          <div class="card text-white o-hidden h-100"
          style="background:#<?php  echo $background; $background = $background + '1200';  ?>">
            <div class="card-body">
              <div class="card-body-icon">
<?php  echo $totalRows_services_conteo_t; ?>          
              </div>
              <div class="mr-5 cantidadzzz"></div>

              <div class="infozzz">
<?php
$mi_name_kind = $row_services_reveal_name_tipes['name_product_kind'];
echo $row_services_reveal_name_tipes['name_product_kind']; ?> </div>
            </div>

            <a class=" card-footer card-footerz text-white clearfix small z-1"        

            
href="view_services.php?idtabla=<?php  echo $este_id_kind; ?>&ttitulo=<?php  echo $mi_name_kind; ?>">  

              <span class="float-left">View/Edit</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
</div>





<?php  } while ($row_services_tipes = mysqli_fetch_assoc($services_tipes)); ?>



      





       







        </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->
































                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

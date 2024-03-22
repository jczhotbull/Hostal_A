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
    

    $mi_hostel_select = $_SESSION['hostel_activo'];





















 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-people-line fa-lg "></i> &nbsp; &nbsp;  <i> All Beds in Room: <b><?php echo $ttitulo ?></b>.</i>
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

    include ("../conectar.php");   // para saber cuantas rooms ay
    

    $queryFHL_few = "SELECT * FROM tb_rooms_beds, bed_number
    where tb_rooms_beds.id_bed_number = bed_number.id_bed_number
    and tb_rooms_beds.id_hostel = '$mi_hostel_select'
    and tb_rooms_beds.id_room = '$idtbla'
    group BY tb_rooms_beds.id_bed_number ASC";
        
    $rooms_few = mysqli_query($enlace, $queryFHL_few) or die(mysqli_error());
    $row_rooms_few = mysqli_fetch_assoc($rooms_few);
    $totalRows_rooms_few = mysqli_num_rows($rooms_few);

  
    mysqli_close($enlace);

    $background = '625463';
    
    ?>



<h4 class="glowwhite mt-4" <?php if ( $totalRows_rooms_few =='0'  ){?>style="display:none"<?php } ?> >Select a Bed:</h4>

<!-- Icon Cards-->
     
<div class="row" <?php if ( $totalRows_rooms_few =='0'  ){?>style="display:none"<?php } ?> >



<?php  do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->     





    <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
         <div class="card text-white o-hidden h-100"
         style="background:#<?php  echo $background; $background = $background + '1200';  ?>">
           <div class="card-body">
             <div class="card-body-icon">
         
             </div>
             <div class="mr-5 cantidadzzz">
             Bed: <?php
$mi_name_bed = $row_rooms_few['name_bed_number'];

$este_id_bed = $row_rooms_few['id_rooms_beds'];  //id de la cama

$este_id_kind = $row_rooms_few['id_room'];  // id de la rom

echo $row_rooms_few['name_bed_number']; ?>
           

             </div>

             <div class="infozzz">
 </div>    
           </div>

           <a class=" card-footer card-footerz text-white clearfix small z-1"        

           
href="f_check_bed_in_room.php?idtabla=<?php  echo $este_id_kind; ?>
&idbed=<?php  echo$este_id_bed; ?>&ttitulo=<?php  echo $mi_name_bed; ?>">  

             <span class="float-left">Go</span>
             <span class="float-right">
               <i class="fa fa-angle-right"></i>
             </span>
           </a>
         </div>
</div>





<?php  } while ($row_rooms_few = mysqli_fetch_assoc($rooms_few)); ?>






     
</div >

<!-- Icon Cards-->












                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

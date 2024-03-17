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



    $guests_success = "";
    $guests_danger = "";



    $mi_hostel_select = $_SESSION['hostel_activo'];

    $doc_del_g = $_GET['zp'];

    $id_del_g = $_GET['ri'];

    $id_del_data_g = $_GET['da'];








 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-bolt-lightning fa-lg "></i> &nbsp; &nbsp; Fast Check-In "3"
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



            <div class="card mx-auto">
              <div class="card-body">
      
                       
<form  method="POST" data-persist="garlic"  data-expires="360" enctype="multipart/form-data"  name="add_user">                           


                            <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Register Stay: </b>            

                        <?php 
                          if ($guests_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$user_success."</i>"; }
                        ?>

                        <?php 
                          if ($guests_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$user_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->










<div class="form-row margencito">   
      

<div class="input-group input-group-sm  col-sm-12 col-md-4 col-lg-5 mb-2">
     <div class="input-group-prepend">
     <span class="input-group-text" id="basic-addon1">From:</span>  
     </div>
     <input type="date"  class="form-control importantex"
     id="date_ini_g" name="date_ini_g"  aria-label="date_ini_g" aria-describedby="basic-addon1" required> 
</div>


<div class="input-group input-group-sm  col-sm-12 col-md-4 col-lg-5 mb-2">
     <div class="input-group-prepend">
     <span class="input-group-text" id="basic-addon1">To:</span>  
     </div>
     <input type="date"  class="form-control importantex"
     id="date_end_g" name="date_end_g"  aria-label="date_end_g" aria-describedby="basic-addon1" required> 
</div>


<div class="col-sm-12 col-md-4 col-lg-2 mb-2">

<button type="submit" name="add_stay" class="btn btn-sm btn-info btn-block" id='add_stay'>
<i class="fa-solid fa-floppy-disk fa-lg"></i> &nbsp</button> 

</div>


</div>   <!-- cierre margencito-->











                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

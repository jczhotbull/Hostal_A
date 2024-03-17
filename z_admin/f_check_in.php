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






// empieza la insercion del huesped
if(isset($_POST['add_guests']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD 
{
    $alerta_principal = "2";

 //  verifica si doc de Id ya está registrada en la BD...
 include("../conectar.php");  

    $pass_per = mysqli_real_escape_string($enlace,$_POST['doc_guests']);
    $doc = mysqli_real_escape_string($enlace,$_POST['doc_guests']);
      

 $queryC = "SELECT guests_doc_id FROM tb_guests WHERE guests_doc_id ='".mysqli_real_escape_string($enlace,$_POST['doc_guests'])."' LIMIT 1";

 $resultC = mysqli_query($enlace,$queryC);

         if (mysqli_num_rows($resultC)>0)
         {
         $errorZ="- Doc or Id already registered.";
         mysqli_close($enlace); 
         }



         else  // Entra aqui solo si el doc de id no esta registrado previamente 
         {

$quien_lo_registra = $_SESSION['id_per'];

            $query_d = "INSERT INTO tb_guests(guests_doc_id, p_surname_g, guests_pass, guests_register_by ) 

            VALUES (   '".mysqli_real_escape_string($enlace,$_POST['doc_guests'])."'         ,
                       '".mysqli_real_escape_string($enlace,$_POST['p_surname_guests'])."'         ,
                       '$pass_per'         ,
                       '$quien_lo_registra'  )";


if (!mysqli_query($enlace,$query_d))  // si no logro ingresar la direccion...
{
$guests_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc
$errorZ="- Error. ";
mysqli_close($enlace); 
}

else
{       //  guarde la info básica, actualizo el password
  
    $id_del_g = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado.
    $passwordHasheada=md5( md5 ($id_del_g) . $pass_per ) ;

$query_hash = " UPDATE tb_guests SET guests_pass = '$passwordHasheada' WHERE id_guests = '$id_del_g' LIMIT 1 "; 
$sale_y_vale = mysqli_query($enlace, $query_hash) or die(mysqli_error());
mysqli_close($enlace); 

header("Location: f_check_in_dos.php?zv=ve87&pass=6tz@bv&zp=$doc&ri=$id_del_g&mil=57tr@jh", TRUE, 301);
exit();     
 
}
         }

}


 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-bolt-lightning fa-lg "></i> &nbsp; &nbsp; Fast Check-In "1"
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

                                <b class="text-info"> Register Guest: </b>            

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




<style type="text/css">
.punterodd{
	display: block;
	cursor: pointer;
}

</style>





<div class="form-row margencito">   <!-- Pre-Carga Pasaporte-->
      
<div class="input-group col-sm-12 col-md-5 col-lg-4 mb-2">  
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-id-card fa-lg"></i></span>  
    </div>
    <input type="text" maxlength="19" class="form-control importantex"
    id="doc_guests" name="doc_guests" placeholder="Doc or Id Number" aria-label="doc_guests"
    aria-describedby="basic-addon1" required>    
</div>


<div class="input-group col-sm-12 col-md-5 col-lg-4 mb-2">  
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square fa-lg"></i></span>  
    </div>
    <input type="text" maxlength="19" class="form-control "
    id="p_surname_guests" name="p_surname_guests" placeholder="Surname" aria-label="p_surname_guests"
    aria-describedby="basic-addon1">    
</div>

			    
<div class="col-sm-12 col-md-2 col-lg-2 mb-2">

<button type="submit" name="add_guests" class="btn  btn-info btn-block" id='add_guests'>
<i class="fa-solid fa-right-long fa-lg"></i></button> 

</div>		








</div>   <!-- cierre margencito-->











                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

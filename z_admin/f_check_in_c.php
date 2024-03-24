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

    $cuenta_ami = $_GET['cuenta_ami'];

    $guests_success = "";
    $guests_danger = "";


    
    $ttitulo_kind = $_GET['ttitulo_kind'];
    $id_kind = $_GET['id_kind'];


    $mi_hostel_select = $_SESSION['hostel_activo'];
    $ttitulo = $_GET['ttitulo'];

    $rango = $_GET['rr'];

    $la_room_es = $_GET['id_r'];
    $la_room_cama_es = $_GET['id_rb'];

    $compatriota = $_GET['compadre']; // tiene el id del cabeza del grupo



// empieza la insercion del huesped
if(isset($_POST['add_guests']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD 
{
    $alerta_principal = "2";




 //  verifica si doc de Id ya está registrada en la BD...
 include("../conectar.php");  

    $pass_per = mysqli_real_escape_string($enlace,$_POST['doc_guests']);
    $doc = mysqli_real_escape_string($enlace,$_POST['doc_guests']);

    $email_guests = mysqli_real_escape_string($enlace,$_POST['email_guests']);
    $telf_guests = mysqli_real_escape_string($enlace,$_POST['telf_guests']);

    $nationality_g = $_POST['nationality_g'];  


    $date_g = $_POST['date_birth_g']; 
    $sex_g = $_POST['sex_g'];  


    $queryGG = "SELECT id_guests, guests_doc_id, p_name_g, p_surname_g, guests_birth, guests_sex FROM tb_guests
    WHERE guests_doc_id ='".mysqli_real_escape_string($enlace,$_POST['doc_guests'])."' LIMIT 1";
   
    $resultGG = mysqli_query($enlace,$queryGG) or die(mysqli_error());
    $row_guest_info = mysqli_fetch_assoc($resultGG);
   
    $id_found = $row_guest_info['id_guests'];
    $name_found = $row_guest_info['p_name_g'];
    $ape_found = $row_guest_info['p_surname_g'];
    $birth_found = $row_guest_info['guests_birth'];
    $sex_found = $row_guest_info['guests_sex'];
   
    $upd_name = mysqli_real_escape_string($enlace,$_POST['p_name_guests']);
    $upd_ape = mysqli_real_escape_string($enlace,$_POST['p_surname_guests']);
   


   
            if (mysqli_num_rows($resultGG)>0 )    // si ya esta en la bd  actualizar los datos
            { 


              
// verifico que el documento ingresado como acompañante no sea el mismo
// del cabeza de grupo   buscando si el id del cabeza de grupo es el mismo id del usuario a ingresar

if ($id_found == $compatriota ) {

    $errorZ="- Error, the same guest cant be his own companion.";  

    mysqli_close($enlace);
}



else {    // ahora debo chequear  q no se este reintroduciendo un compañero

    $queryGG_booking = "SELECT date_range, id_guests  FROM bed_booking
    WHERE id_guests ='$id_found'
    and date_range = '$rango' LIMIT 1";
    
    $resultGG_booking = mysqli_query($enlace,$queryGG_booking) or die(mysqli_error());
    
    
    
    if (mysqli_num_rows($resultGG_booking)>0  ) {
    
        $errorZ="- Error, guest already have a bed.";  
    
        mysqli_close($enlace);
    }



    else {   // si no era un re ingreso de compañero entonces actualizo


        if ($name_found != $upd_name) {
            $new_name = $upd_name;
          }
          else {
            $new_name = $name_found;
          }
          
          
          
          if ($ape_found != $upd_ape) {
            $new_ape = $upd_ape;
          }
          else {
            $new_ape = $ape_found;
          }
          
          
          
          if ($birth_found != $date_g) {
            $new_date = $date_g;
          }
          else {
            $new_date = $birth_found;
          }
          
          
          
          if ($sex_found != $sex_g) {
            $new_sex = $sex_g;
          }
          else {
            $new_sex = $sex_found;
          }
          
          
          $query_uppdd_nn = " UPDATE tb_guests SET p_name_g = '$new_name',
                                                   p_surname_g = '$new_ape',
                                                   guests_birth = '$new_date',
                                                   guests_sex = '$new_sex'
          
           WHERE id_guests = '$id_found' LIMIT 1 "; 
          $sale_y_vale_nn = mysqli_query($enlace, $query_uppdd_nn) or die(mysqli_error());
          
                   mysqli_close($enlace);
                   
                   header("Location: f_check_in_dos_c.php?zv=ve87&pass=6tz@bv&zp=$doc&ri=$id_found&mil=57tr@jh&em=$email_guests&tf=$telf_guests&na=$nationality_g&ran=$rango&prz=$la_room_es&pbz=$la_room_cama_es&ttitulo_kind=$ttitulo_kind&id_kind=$id_kind&compi=$compatriota&cuenta_ami=$cuenta_ami", TRUE, 301);
                   exit();  




    }








}








  }  /// cierre chequeo si el doc ya esta en la b


else {       // si no esta en la bd entonces lo registro




    $quien_lo_registra = $_SESSION['id_per'];

    $query_d = "INSERT INTO tb_guests(guests_doc_id, p_name_g, p_surname_g, guests_pass, guests_register_by,
    guests_birth, guests_sex ) 

    VALUES (   '".mysqli_real_escape_string($enlace,$_POST['doc_guests'])."'         ,
         '".mysqli_real_escape_string($enlace,$_POST['p_name_guests'])."'         ,
               '".mysqli_real_escape_string($enlace,$_POST['p_surname_guests'])."'         ,
               '$pass_per'         ,
               '$quien_lo_registra',
               '$date_g',
               '$sex_g'  )";


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

header("Location: f_check_in_dos_c.php?zv=ve87&pass=6tz@bv&zp=$doc&ri=$id_del_g&mil=57tr@jh&em=$email_guests&tf=$telf_guests&na=$nationality_g&ran=$rango&prz=$la_room_es&pbz=$la_room_cama_es&ttitulo_kind=$ttitulo_kind&id_kind=$id_kind&compi=$compatriota&cuenta_ami=$cuenta_ami", TRUE, 301);




exit();      }



}










            

} /// cierre principal





include("../conectar.php");  
$query_nacionality = "SELECT * FROM nationality where name_nationality !='.' ORDER BY name_nationality ASC";
$datos_nacionality = mysqli_query($enlace, $query_nacionality) or die(mysqli_error());
$row_datos_nacionality = mysqli_fetch_assoc($datos_nacionality);


$query_sex = "SELECT * FROM sex where name_sex !='.' ORDER BY name_sex ASC";
$datos_sex = mysqli_query($enlace, $query_sex) or die(mysqli_error());
$row_datos_sex = mysqli_fetch_assoc($datos_sex);


mysqli_close($enlace); 









 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-6 col-lg-6 alert-primary" role="alert"> 
                    <i class="fa-solid fa-bolt-lightning fa-lg "></i> &nbsp; &nbsp; Check-In Bed: <b><?php echo $ttitulo ?></b> - <?php echo $rango ?> .   
                </div> 

 

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-6 col-lg-6 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-6 col-lg-6 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
            </div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->



            <div class="card mx-auto">
              <div class="card-body">
      
                       



                          



<form  method="POST" data-persist="garlic"  data-expires="360" enctype="multipart/form-data"  name="add_user">                           

                      




<?php

include ("../conectar.php");   // para saber cuantas rooms ay

$query_compa = "SELECT id_guests, guests_doc_id, p_name_g FROM tb_guests       
 where id_guests = '$compatriota' limit 1";

$the_compa = mysqli_query($enlace, $query_compa) or die(mysqli_error());
$row_compa = mysqli_fetch_assoc($the_compa);
$totalRows_compa = mysqli_num_rows($the_compa);

mysqli_close($enlace);

if ($row_compa['p_name_g'] != '') {
   $nombrecillo = $row_compa['p_name_g'];
   $comilla = ',';
}

else {
    $nombrecillo = '';
    $comilla = '';

}


?>









<div class="form-row margencito">   

<b class="ml-2 mb-2 mt-3 text-info"> Register </b>&nbsp;<b class="mb-2 mt-3 text-primary"><?php  echo $cuenta_ami; ?>°</b>&nbsp;<b class="mb-2 mt-3 text-info"> Companion of </b>
<b class="ml-2 mb-2 mt-3 text-primary"> <?php  echo $nombrecillo; ?>
<?php  echo $comilla; ?></b> <b class="ml-2 mb-2 mt-3 text-info"> Doc:</b> <b class="ml-2 mb-2 mt-3 text-primary">
    <?php  echo $row_compa['guests_doc_id']; ?>.</b>  

</div>


<style type="text/css">
.punterodd{
	display: block;
	cursor: pointer;
}

</style>





<div class="form-row margencito">   <!-- Pre-Carga Pasaporte-->

  

      
<div class="input-group col-sm-12 col-md-6 col-lg-3 mb-2">  
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-id-card fa-lg"></i></span>  
    </div>
    <input type="text" maxlength="19" class="form-control importantex"
    id="doc_guests" name="doc_guests" placeholder="Doc or Id Number" aria-label="doc_guests"
    aria-describedby="basic-addon1" required>    
</div>



<div class="input-group  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-flag fa-lg"></i></span>  
                                        </div>


                                        <select class="form-control importantex" id="nationality_g" name="nationality_g" required>
                                                        
                                                        <option selected disabled value="">Nationality:</option>
                                                        <option disabled></option>


                               <?php do{?>                                

<option value="<?php echo $row_datos_nacionality['id_nationality']; ?>"><?php echo $row_datos_nacionality['name_nationality']; ?></option>

                                <?php } while ($row_datos_nacionality = mysqli_fetch_assoc($datos_nacionality)); ?> 

                           
                                        </select>

                              </div> 



<div class="input-group col-sm-12 col-md-6 col-lg-3 mb-2">  
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-to-square fa-lg"></i></span>  
    </div>
    <input type="text" maxlength="19" class="form-control "
    id="p_name_guests" name="p_name_guests" placeholder="First Name" aria-label="p_name_guests"
    aria-describedby="basic-addon1">    
</div>



<div class="input-group col-sm-12 col-md-6 col-lg-3 mb-2">  
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-pen-to-square fa-lg"></i></span>  
    </div>
    <input type="text" maxlength="19" class="form-control "
    id="p_surname_guests" name="p_surname_guests" placeholder="Surname" aria-label="p_surname_guests"
    aria-describedby="basic-addon1">    
</div>



<div class="input-group col-sm-12 col-md-6 col-lg-3 mb-2">  
    <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone fa-lg"></i></span>  
    </div>
    <input type="text" maxlength="19" class="form-control "
    id="telf_guests" name="telf_guests" placeholder="Phone" aria-label="telf_guests"
    aria-describedby="basic-addon1">    
</div>  


<div class="input-group col-sm-12 col-md-6 col-lg-3 mb-2">  
    <div class="input-group-prepend">  
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at fa-lg"></i></span>  
    </div>
    <input type="email" maxlength="59" class="form-control "
    id="email_guests" name="email_guests" placeholder="Email" aria-label="email_guests"
    aria-describedby="basic-addon1">    
</div>










                              <div class="input-group   col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles fa-lg"></i></span>  
                                        </div>
                                            <input type="date"  class="form-control " id="date_birth_g" name="date_birth_g"  aria-label="date_birth_per" aria-describedby="basic-addon1" > 
                              </div>





                              <div class="input-group   col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars-and-venus-burst fa-lg"></i></span>  
                                        </div>


                                        <select class="form-control" id="sex_g" name="sex_g" >
                                                        
                                                        <option selected value="3">Gender:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_sex['id_sex']; ?>"><?php echo $row_datos_sex['name_sex']; ?></option>

                                <?php } while ($row_datos_sex = mysqli_fetch_assoc($datos_sex)); ?> 

                           



                                        </select>
  
                              </div>  




			    
<div class="col-sm-12 col-md-6 col-lg-12 mb-2">

<button type="submit" name="add_guests" class="btn  btn-info btn-block" id='add_guests'>
<i class="fa-solid fa-right-long fa-lg"></i></button> 

</div>		






</form>



</div>   <!-- cierre margencito-->











                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

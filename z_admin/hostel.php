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



include("../conectar.php");
include ("consultas_add/query_hostel.php"); 


//Turn off all error reporting
//error_reporting(0);



$este_es_el_rol_del_user = $_SESSION['id_rol_per'] == '1';




















// empieza la insercion del hostel
if(isset($_POST['add_hostel']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

    $alerta_principal = "2";


 //  verifica si el codigo del hostel ya está registrada en la BD...
    include("../conectar.php");          


    $queryC = "SELECT code_hostel FROM z_hostel WHERE code_hostel ='".mysqli_real_escape_string($enlace,$_POST['hostel_code'])."' LIMIT 1";

    $resultC = mysqli_query($enlace,$queryC);

            if (mysqli_num_rows($resultC)>0)
            {
            $errorZ="- Hostel Code already registered.";
            mysqli_close($enlace); 
            }

           

            else {  // hostel no registrado, procedo a guardar la direccion del hotel

            
                $hostel_country = $_POST["hostel_country"];  

            // proceso de insercion y creacion del id en la tabla direcciones.

            $query_d = "INSERT INTO tb_address(city_address, id_country, post_code_address, name_address) 

                            VALUES (   '".mysqli_real_escape_string($enlace,$_POST['hostel_city'])."'         ,
                                       '$hostel_country',
                                       '".mysqli_real_escape_string($enlace,$_POST['post_code'])."'    ,
                                       '".mysqli_real_escape_string($enlace,$_POST['hostel_address'])."'        

                                    )";


            if (!mysqli_query($enlace,$query_d))  // si no logro ingresar la direccion...
            {
            $direcc_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc

            $errorZ="- Error. ";

            mysqli_close($enlace); 
            }




            else
            {     // direccion hostel registrada, procedo a guardar los datos del hotel

            $direcc_success="<i class=\"fas fa-check-circle fa-lg\"></i>";  // coloca success al lado de direcc
            $direcc_id = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado direcc.


            $a_phone = mysqli_real_escape_string($enlace,$_POST['a_phone']);
            $b_phone =  mysqli_real_escape_string($enlace,$_POST['b_phone']);
            $c_phone =  mysqli_real_escape_string($enlace,$_POST['c_phone']);

            $a_web = mysqli_real_escape_string($enlace,$_POST['a_web']);
            $b_web =  mysqli_real_escape_string($enlace,$_POST['b_web']);

            $main_email =  mysqli_real_escape_string($enlace,$_POST['main_email']);
            $reserv_email =  mysqli_real_escape_string($enlace,$_POST['reserv_email']);
            $bill_email =  mysqli_real_escape_string($enlace,$_POST['bill_email']);

            $a_number = mysqli_real_escape_string($enlace,$_POST['a_number']);
            $b_number =  mysqli_real_escape_string($enlace,$_POST['b_number']);


           
            $query_p = "INSERT INTO z_data_hostel(a_phone_hostel, b_phone_hostel, c_phone_hostel, a_web_hostel, b_web_hostel,
                                                  reg_number_hostel, ranking_hostel, a_email_hostel, b_email_hostel, c_email_hostel )   

            VALUES ('$a_phone', '$b_phone', '$c_phone', '$a_web', '$b_web', '$a_number', '$b_number', '$main_email', '$reserv_email', '$bill_email' )"; 

            
                        if (!mysqli_query($enlace,$query_p))      // si no ha logrado ingresar los datos del usuario
                        {
                        $datos_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de datos personales. 
                        $errorZ="- Error. ";

                        // secuencia que borra la direccion del usuario en caso de error

                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Not-Clear!!! &nbsp ";}


                         mysqli_close($enlace); 
                        }


                        else
                        {  //  exito al guardar la direccion y los datos ahora guardo al hostel.


                        $datos_success="<i class=\"fas fa-check-circle fa-lg\"></i>";  // coloca success al lado de datos
                        $id_datos_hostel = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_datos_per...
            

                        $hostel_name = $_POST["hostel_name"];
                        $nick_name = $_POST["nick_name"];
                        $hostel_code = $_POST['hostel_code'];
                                             
                        $quien_lo_registra = $_SESSION['id_per'];


                        $query_host = "INSERT INTO z_hostel(name_hostel, nick_name_hostel, code_hostel, id_address, id_data_hostel, hostel_registered_by)   

                        VALUES ('$hostel_name', '$nick_name', '$hostel_code', '$direcc_id', '$id_datos_hostel', '$quien_lo_registra' )"; 


                        if (!mysqli_query($enlace,$query_host))      // si no ha logrado ingresar los datos
                        {
                        $hostel_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de infor personal. 
                        $errorZ="- Error. ";


                       // secuencia que borra la direccion del usuario y los datos del usuario


                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Not-Clear!!! &nbsp ";}


                                            $sqlBBB = "DELETE FROM z_data_hostel WHERE id_data_hostel = '$id_datos_hostel' "; 

                                            if (mysqli_query($enlace,$sqlBBB))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Data Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "2";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Data Not-Clear!!! &nbsp ";}


                        }


                        else  {    // aparentemente finalizo bien


                        if ($conteo_errorAr == '0') {   


                                $exitoZ.="- &nbsp;
                                <i data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Address, data and info saved.\">
                                <i class=\"fa-solid fa-hotel fa-lg\"></i></i> &nbsp ";  
  
                                 $hostel_success="<i class=\"fas fa-check-circle fa-lg\"></i>";  // coloca success al lado de datos de usuario
                                 mysqli_close($enlace); 

                                 }


                                 else  { $errorZ.="- &nbsp; Address, data and info not saved!!! &nbsp ";  }

                        

 
                        }      // cierre aparentemente finalizo bien

                }  

}  // cierre exito al guardar la direccion y los datos ahora guardo al hostel.


  }  // cierre exito al guardar los datos y haber guardado la direccion.


} // cierre tras completar el registro del hostel












// lo siguiente confirma la actualizacion de la foto

if(isset($_POST['update_logoX']))
    {
$alerta_principal = "2";

$logo_esta ="0";

$idU = $_POST['update_logoX'];

$num_codigo_hostelU = $_POST['update_numX'];

$nnn_id = $_POST['id_plantRR'];


clearstatcache();
$filenameUP = "00_croppie/logo_hostel_".$nnn_id."_".$num_codigo_hostelU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $logo_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "img_logo_hostels/".$idU."_".$num_codigo_hostelU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../conectar.php");   

          $query_fotoU = "UPDATE z_hostel SET logo_hostel = '$newfilenameU' WHERE id_hostel = '$idU' LIMIT 1 ";
          

          if (!mysqli_query($enlace,$query_fotoU))      // si no ha logrado ingresar la foto
                   {

           $errorZ.="- Error. ";

                unlink($newfilenameU);
                        
              mysqli_close($enlace);

                   }

          else {
          
          $exitoZ .= "- Done. ";
          mysqli_close($enlace);  

            }   

             
      }

            else{
            
            $errorZ.="- File Error. ";

              unlink($filenameUP);
                         
              mysqli_close($enlace);


            }
                

                 }  // cierre de que no hay foto..

              
                 if ($logo_esta =="0") {

$alerta_principal = "2";
 $errorZ="- File not available. ";  

            }


            if ($errorZ!="")     //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                             
                          }     


                if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. "  ";            
 
                           }
    
    }











// borrar logo hostel

if(isset($_POST['borrarXX']))
    {

$alerta_principal = "2";

include("../conectar.php");

$queryKKC = "SELECT * FROM z_hostel WHERE id_hostel = '$_POST[id_plantRR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$logo_a_borrar = $filaKK["logo_hostel"];

                      if (!empty( $logo_a_borrar )) {   // si hay algo en logo, borra ese archivo
                         
                            unlink($logo_a_borrar);             

$deleteXX = "UPDATE z_hostel SET logo_hostel = '' WHERE id_hostel = '$_POST[id_plantRR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i>";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }















   if(isset($_POST['borrar_hostel']))
    {
$alerta_principal = "2";
          

      include("../conectar.php");  


 $queryC = "SELECT * FROM z_hostel WHERE id_hostel = '$_POST[borrar_hostel]' LIMIT 1";

                      $resultC = mysqli_query($enlace,$queryC);
                      $fila=mysqli_fetch_array($resultC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id de la direccion que esta en la tabla...



                      $logo_a_borrar = $fila["logo_hostel"];
                      $direcc_a_borrar = $fila["id_address"];
                      $data_a_borrar = $fila["id_data_hostel"];
                      $name_a_borrar = $fila["name_hostel"];




// debo detectar si el id del hostel esta en uso antes...  de momento solo lo usan los usuarios




 $querym = "SELECT id_hostel FROM tb_personal WHERE id_hostel = '$_POST[borrar_hostel]'";

                      $howm = mysqli_query($enlace, $querym) or die(mysqli_error());

                      $row_howm = mysqli_fetch_assoc($howm);

                      $totalRows_howm = mysqli_num_rows($howm);


                      if ($totalRows_howm >=1) {                        

                             $errorZ=" <b>" . $name_a_borrar . "</b> - It's in use.";   
                             mysqli_close($enlace);

                      }





else {    // se mete aqui si no esta en uso


                     



          if (file_exists($logo_a_borrar )) {    // de haber un logo entra       
            

                        if (!empty( $logo_a_borrar )) {   // si hay algo en logo, borra ese archivo
                         
                            unlink($logo_a_borrar);
                         }


             }     
                     

                      $queryD = "DELETE FROM z_data_hostel WHERE id_data_hostel = '$data_a_borrar' LIMIT 1";

                      if (!mysqli_query($enlace,$queryD))      // si no ha logrado borrar los datos de la data del hostel
                         {
                          $errorZ=".";
                          }


                          if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error al borrar la data
                          {
                             $errorZ = " <i class=\"fa-solid fa-file-lines fa-lg\"></i> ";
                             mysqli_close($enlace);           
                          }



                          $queryDiss = "DELETE FROM tb_address WHERE id_address = '$direcc_a_borrar' LIMIT 1";

                      if (!mysqli_query($enlace,$queryDiss))      // si no ha logrado borrar los direcc del hostel
                         {
                          $errorZ=".";
                          }


                          if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fa-solid fa-map-location-dot fa-lg\"></i> "; 
                             mysqli_close($enlace); 
                          }



                      else {  

                         $exitoZ = "<b>--&nbsp; " . $fila['name_hostel'] . " &nbsp;--</b> was deleted.";

                      }           // hasta aqui gracias a borrar la data del hostel al estar en cascada se lleva el contenido del hostel.
                      

                      if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. " ";            
                          }

                      mysqli_close($enlace);                      


}

    }












if(isset($_POST['editar_hostel']))
{


       include("../conectar.php");

        $query = "SELECT * FROM z_hostel WHERE id_hostel = $_POST[editar_hostel]";

        $id_selecc = mysqli_query($enlace, $query) or die(mysqli_error());

        $row_id_selecc = mysqli_fetch_assoc($id_selecc);

        $totalRows_id_selecc = mysqli_num_rows($id_selecc);
               

        $code_hostal_ciU = ($row_id_selecc['code_hostel']);      /* consigue lo que requiera del hostel a editar */

        $id_hostal_idU = ($row_id_selecc['id_hostel']);

        $id_address_idU = ($row_id_selecc['id_address']);

        $id_data_idU = ($row_id_selecc['id_data_hostel']);


//  detectar si el codigo del hostel esta en uso....



       $queryE = "SELECT * FROM z_hostel WHERE code_hostel ='".mysqli_real_escape_string($enlace,$_POST['hostel_code_mod'])."' LIMIT 1";

       $resultE = mysqli_query($enlace,$queryE);  // si hay coincidencia almacena el numero total de coincidencias del code

       $filaE=mysqli_fetch_array($resultE);

       /* $fil = ($filaE['id']); */  // esto es para mostrar el id en donde esta 

           if ($filaE['id_hostel'] != $id_hostal_idU AND mysqli_num_rows($resultE)>0) 
// si existe coincidencia y ademas el id de la coincidencia no es el que  intento modificar... 

                                    {
                                         $errorZ="- Hostel <b>code</b> entered is in use."; 

                                    }
                     

                                    if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
                                      {
                                         $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                                         mysqli_close($enlace);             
                    
                                      }
     
            else   // si no hay condicencia en el codigo del hostel ingresado proceso a modificar....
            {


                $sql = "UPDATE z_hostel SET name_hostel = '".mysqli_real_escape_string($enlace,$_POST['hostel_name_mod'])."',
                                       nick_name_hostel = '".mysqli_real_escape_string($enlace,$_POST['nick_name_mod'])."',
                                            code_hostel = '".mysqli_real_escape_string($enlace,$_POST['hostel_code_mod'])."',
                                            hostel_was_mod = '1'


                                                WHERE id_hostel='$_POST[editar_hostel]' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Info. ";
                                    mysqli_close($enlace);
                                  
                                    }

                             else{   // actualizo la direccion



              $id_country_es = $_POST["hostel_country_mod"];    // no esta llegando el id aqui....   

            
                $sql_add = "UPDATE tb_address SET city_address = '".mysqli_real_escape_string($enlace,$_POST['hostel_city_mod'])."',
                     id_country = '$id_country_es',
              post_code_address = '".mysqli_real_escape_string($enlace,$_POST['post_code_mod'])."', 
              name_address = '".mysqli_real_escape_string($enlace,$_POST['hostel_address_mod'])."'


                                                WHERE id_address='$id_address_idU' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql_add))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Address. ";
                                    mysqli_close($enlace);
                                  
                                    }


                                     else{   // actualizo ahora la data





          $sql_data = "UPDATE z_data_hostel SET a_phone_hostel = '".mysqli_real_escape_string($enlace,$_POST['a_phone_mod'])."',
                             b_phone_hostel = '".mysqli_real_escape_string($enlace,$_POST['b_phone_mod'])."',
                             c_phone_hostel = '".mysqli_real_escape_string($enlace,$_POST['c_phone_mod'])."',
                             a_web_hostel = '".mysqli_real_escape_string($enlace,$_POST['a_web_mod'])."',
                             b_web_hostel = '".mysqli_real_escape_string($enlace,$_POST['b_web_mod'])."',
                             reg_number_hostel = '".mysqli_real_escape_string($enlace,$_POST['a_number_mod'])."',
                             ranking_hostel = '".mysqli_real_escape_string($enlace,$_POST['b_number_mod'])."',
                             a_email_hostel = '".mysqli_real_escape_string($enlace,$_POST['main_email_mod'])."',
                             b_email_hostel = '".mysqli_real_escape_string($enlace,$_POST['reserv_email_mod'])."',
                             c_email_hostel = '".mysqli_real_escape_string($enlace,$_POST['bill_email_mod'])."'

                      WHERE id_data_hostel='$id_data_idU' LIMIT 1 ";


                       
                            if (!mysqli_query($enlace,$sql_data))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Data. ";
                                    mysqli_close($enlace);
                                  
                                    }


                                     else{   // actualizo todo


                     $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i>  &nbsp; <b> Updated. </b>"; 
                     mysqli_close($enlace);   


                                        }

 }

                                        }

                                }



               }  



































include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">



            <div class="form-row">

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-hotel fa-lg "></i> &nbsp; &nbsp; Add Hostel:
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
      









                       
<form method="POST" data-persist="garlic"  data-expires="360" enctype="multipart/form-data"  name="add_the_hostel">                           


                            
 <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Info: </b>            

                        <?php 
                          if ($hostel_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$hostel_success."</i>"; }
                        ?>

                        <?php 
                          if ($hostel_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$hostel_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->


                          <div class="form-row margencito"> 



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="49" class="form-control importantex" id="hostel_name" name="hostel_name" placeholder="Name" aria-label="hostel_name" aria-describedby="basic-addon1" required>
                              </div>




                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-pen fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="10" class="form-control" id="nick_name" name="nick_name" placeholder="Nick Name" aria-label="nick_name" aria-describedby="basic-addon1" >
                              </div>  



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-barcode fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control importantex" id="hostel_code" name="hostel_code" placeholder="Hostel Code" aria-label="hostel_code" aria-describedby="basic-addon1" required>   
                              </div>




</div> <!-- cierre margencito -->






<div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos segundarios -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Data: </b>            

                        <?php 
                          if ($datos_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$datos_success."</i>"; }
                        ?>

                        <?php 
                          if ($datos_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$datos_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->


                          <div class="form-row margencito"> 










                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="a_phone" name="a_phone" placeholder="Main Phone" aria-label="a_phone" aria-describedby="basic-addon1">  
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-retro fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="b_phone" name="b_phone" placeholder="Secondary Phone" aria-label="b_phone" aria-describedby="basic-addon1">  
                              </div> 



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="c_phone" name="c_phone" placeholder="Extra Phone" aria-label="c_phone" aria-describedby="basic-addon1">    
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-chrome fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="39" class="form-control" id="a_web" name="a_web" placeholder="Main Web Address" aria-label="a_web" aria-describedby="basic-addon1">    
                              </div> 


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-edge fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="39" class="form-control" id="b_web" name="b_web" placeholder="Secondary Web Address" aria-label="b_web" aria-describedby="basic-addon1">    
                              </div> 



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at fa-lg"></i></span>   
                                        </div>
                                            <input type="email" maxlength="39" class="form-control" id="main_email" name="main_email" placeholder="Main Email" aria-label="main_email" aria-describedby="basic-addon1">    
                              </div> 


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-inbox fa-lg"></i></span>  
                                        </div>
                                            <input type="email" maxlength="39" class="form-control" id="reserv_email" name="reserv_email" placeholder="Reservations Email" aria-label="reserv_email" aria-describedby="basic-addon1">    
                              </div> 


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope-circle-check fa-lg"></i></span>  
                                        </div>
                                            <input type="email" maxlength="39" class="form-control" id="bill_email" name="bill_email" placeholder="Billing Email" aria-label="bill_email" aria-describedby="basic-addon1">   
                              </div> 



                               <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-fingerprint fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="a_number" name="a_number" placeholder="Hostel ID" aria-label="a_number" aria-describedby="basic-addon1">  
                              </div> 



                               <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-ranking-star fa-lg"></i></span>   
                                        </div>
                                            <input type="text" maxlength="8" class="form-control" id="b_number" name="b_number" placeholder="Hostel Ranking" aria-label="b_number" aria-describedby="basic-addon1">    
                              </div> 




</div> <!-- cierre margencito -->






<div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos segundarios -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Address: </b>            

                        <?php 
                          if ($direcc_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$direcc_success."</i>"; }
                        ?>

                        <?php 
                          if ($direcc_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$direcc_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->


                          <div class="form-row margencito"> 






                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tree-city fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control importantex" id="hostel_city" name="hostel_city" placeholder="City" aria-label="hostel_city" aria-describedby="basic-addon1" required>    
                              </div>  



                             <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-earth-americas fa-lg"></i></span>  
                                        </div>

                                         <select class="form-control importantex" id="hostel_country" name="hostel_country" required>
                                                        
                                                        <option selected disabled value="">Country:</option>
                                                        <option disabled></option>


                                <?php do{?>                                

<option value="<?php echo $row_datos_country['id_country']; ?>"><?php echo $row_datos_country['name_country']; ?></option>

                                <?php } while ($row_datos_country = mysqli_fetch_assoc($datos_country)); ?> 


                           
                                        </select>
  
                              </div>  




                            <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot fa-lg"></i></span>  
                                        </div>
                                            <input type="number" maxlength="10" class="form-control" id="post_code" name="post_code" placeholder="Zip Code" aria-label="post_code" aria-describedby="basic-addon1">   
                              </div> 




                           <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-9 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-signs-post fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="109" class="form-control" id="hostel_address" name="hostel_address" placeholder="Hostel Address" aria-label="hostel_address" aria-describedby="basic-addon1">    
                           </div>  




                        <div class="col-md-3 mb-2">

                        <button type="submit" name="add_hostel" class="btn btn-sm btn-info btn-block" id='add_hostel'>
                        <i class="fa-solid fa-floppy-disk fa-lg"></i> &nbsp</button> 
                    
                        </div>




                            </div>


</form>



              </div><!-- cierre card mx-auto -->
              </div><!-- cierre card-body -->
         



<?php

include ("../conectar.php");


$query = "SELECT * FROM z_hostel, tb_address, z_data_hostel, country 
WHERE z_hostel.id_address = tb_address.id_address 
and   z_hostel.id_data_hostel = z_data_hostel.id_data_hostel
and   tb_address.id_country = country.id_country

ORDER BY z_hostel.name_hostel ASC";

$hostels = mysqli_query($enlace, $query) or die(mysqli_error());

$row_hostels = mysqli_fetch_assoc($hostels);

$totalRows_hostels = mysqli_num_rows($hostels);





mysqli_close($enlace);


?>



<div class="card-header mt-3">
<b><i class="fa fa-table"></i> Hostel(s):</b>
</div>



        <div class="card-body border border-info mb-2" <?php if ( $totalRows_hostels == '0' ){?>style="display:none"<?php } ?> >

          <div class="table-responsive">

            <table class="table table-bordered stricolor table-sm" id="dataTable" width="100%" cellspacing="0">
             
              <thead>
                <tr>                  
                  
                    <th><i class="fa-solid fa-file-signature fa-lg"></i></th>  
                       <th><i class="fa-regular fa-font-awesome fa-lg"></i></th>  
                       <th><i class="fa-solid fa-gear fa-lg"></i></th> 

                  <th><i class="fa-solid fa-barcode fa-lg"></i> </th>    

                  <th><i class="fa-solid fa-phone fa-lg"></i> / <i class="fa-solid fa-at fa-lg"></i></th>
              
                  <th><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th> 
                </tr>
              </thead>



  <tbody>

            <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->            

                <tr>


<?php

include ("../conectar.php");

$este_lo_registro = $row_hostels['hostel_registered_by'];

$queryFH_whoL = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro' limit 1";

$usuarios_whoL = mysqli_query($enlace, $queryFH_whoL) or die(mysqli_error());

$row_usuarios_whoL = mysqli_fetch_assoc($usuarios_whoL);


mysqli_close($enlace);

 

if ($este_es_el_rol_del_user == '1' && $hostel_was_upd != '1' && ($row_hostels['id_hostel'] == $mi_hostel_select)  ) {
    
  $update_icon = 'fas fa-edit fa-2x fa-beat';
    
  $text_update1 = 'Update';


}  

else { 
       $update_icon = 'fas fa-edit';

       $text_update1 = '';
      
      }






if ($row_hostels['id_hostel'] == $mi_hostel_select) {
    
     $active_icon = 'fa-solid fa-crown fa-beat';
     $el_hostel_esta_activo = 'Active';
}


else { 

       $active_icon = '';
       $el_hostel_esta_activo = '';
    
      }

 




?>









<td class="align-middle" align="center">


<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >

<span style="color: #fb8e36;"><b><i class="<?php echo $active_icon; ?>"></i></b></span> <b><?php echo $el_hostel_esta_activo;?></b><br>

    <span style="color:grey;"><b><?php echo $row_hostels['name_hostel'];?></b></span>
<br><?php echo $row_hostels['city_address'];?> - <?php echo $row_hostels['name_country'];?>
<br><br><span style="color:#417FD5;"><b><?php echo $row_hostels['a_web_hostel'];?></b></span>
<br><b><span><?php echo $row_hostels['nick_name_hostel'];?></span></b>

</div>


</td>




  <td class="align-middle" align="center">



                  <img id="myImg" src="<?php echo $row_hostels['logo_hostel']; ?>?nocache=<?php echo time(); ?>"
                  alt="Not Available"  onerror="this.src='img_logo_hostels/000.jpg';" width="80px" /> 

<br><span style="color: #fb8e36;"><b><i class="fa-regular fa-star"></i></b></span> : <b><?php echo $row_hostels['ranking_hostel']; ?></b>

                   </td> 






  <td class="align-middle" align="center">

                     <div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Logo." >
                <button class="btn btn-outline-info btn-sm" ><i class="fa-regular fa-font-awesome"></i></button>

                <input class="center-block punterodd" type="file" accept="image/*"
                 name="upload_image<?php echo $row_hostels['id_hostel']; ?>"
                   id="upload_image<?php echo $row_hostels['id_hostel']; ?>"

                   onchange="return fileValidation<?php echo $row_hostels['id_hostel']; ?>()" /> 


          </div>
                  </div>



  <?php include ("logo_mod/update_logo.php"); ?> 






 <div data-toggle="tooltip" data-placement="top" title="Delete." >

                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                 data-target="#borrar_logo<?php echo $row_hostels['id_hostel']; ?>"> <i class="fa-regular fa-font-awesome"></i></button>
        
</div>




<?php include ("logo_mod/delete_logo.php"); ?> 





                   </td>  




















 <td class="align-middle" align="center"><span style="color:grey;"><b><?php echo $row_hostels['code_hostel'];?></b></span></td>



  <td class="align-middle" align="center"><b>Main: </b><?php echo $row_hostels['a_phone_hostel'];?>

                                            <?php 
                                                        if (!$row_hostels['b_phone_hostel'] == "") {       
                                                            echo " <br>" .$row_hostels['b_phone_hostel'];
                                                          } 

                                                         if (!$row_hostels['c_phone_hostel'] == "") {       
                                                            echo " <br>" .$row_hostels['c_phone_hostel'];
                                                          } 
                                               ?>



  <br><br>
                  <b>Main: </b><span style="color: #9961cd;"><?php echo $row_hostels['a_email_hostel']; ?></span>
                  <br> <span style="color: grey;">Reservations:</span> <?php echo $row_hostels['b_email_hostel']; ?>
                  <br> <span style="color: grey;">Billing:</span> <?php echo $row_hostels['c_email_hostel']; ?></td>






 <td class="align-middle" align="center">







       
<button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_hostels['id_hostel']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="<?php echo $update_icon; ?>"></i><br><span style="font-size: 16px;"><?php echo $text_update1; ?></span></button>    





<?php include("updates/update_hostel_modal.php"); ?>












  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_hostels['id_hostel']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></button>                 


    </td>

<?php include("deletes/delete_hostel_modal.php"); ?>




                </tr>


  <?php } while ($row_hostels = mysqli_fetch_assoc($hostels)); ?>
                

              </tbody>











            </table> <!-- cierre tabla -->

        </div>   <!-- cierre tabla responsiva -->
    </div>   <!-- cierre card body -->






                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

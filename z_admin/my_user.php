<?php



include("00_identificador.php");


$alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.


   $foto_success="";       // relacionada a la carga de imagenes
    $foto_danger="";
    $foto_info="1";

    $doc_foto_success="";       // relacionada a la carga de imagenes de doc
    $doc_foto_danger="";
    $doc_foto_info="1";

    $direcc_success=""; // notificador del proceso de insercion de direccion
    $direcc_danger="";  // notificador del proceso de insercion de direccion

    $datos_success="";
    $datos_danger="";


    $user_success="";  // notificador del proceso de insercion de informacion del usuario
    $user_danger="";


    $conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores

























// lo siguiente confirma la actualizacion de la foto personal

if(isset($_POST['update_pic_per']))
    {
$alerta_principal = "2";

$pic_per_esta ="0";

$update_pic_perdU = $_POST['update_pic_per'];

$update_doc_perdU = $_POST['update_doc_per'];

$id_update_perU = $_POST['id_update_per'];

$id_data_update_perU = $_POST['id_data_update_per'];


clearstatcache();
$filenameUP = "00_croppie/pic_per_".$id_update_perU."_".$update_doc_perdU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $pic_per_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "img_per/".$update_pic_perdU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../conectar.php");   

          $query_fotoU = "UPDATE tb_data_personal SET pic_per = '$newfilenameU' WHERE id_data_per = '$id_data_update_perU' LIMIT 1 ";
          

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

              
                 if ($pic_per_esta =="0") {

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















// lo siguiente confirma la actualizacion del doc del personal

if(isset($_POST['update_doc_per_doc']))
    {
$alerta_principal = "2";

$doc_per_esta ="0";

$update_pic_perdU = $_POST['update_doc_per_doc'];

$update_doc_perdU = $_POST['update_doc_per2'];

$id_update_perU = $_POST['update_doc_per_doc'];

$id_data_update_perU = $_POST['id_data_update_per'];


clearstatcache();
$filenameUP = "00_croppie/doc_per_".$id_update_perU."_".$update_doc_perdU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $doc_per_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "img_doc_per/".$update_pic_perdU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../conectar.php");   

          $query_fotoU = "UPDATE tb_data_personal SET pic_doc_per = '$newfilenameU' WHERE id_data_per = '$id_data_update_perU' LIMIT 1 ";
          

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

              
                 if ($doc_per_esta =="0") {

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













// lo siguiente confirma la actualizacion del passport del personal

if(isset($_POST['update_passport_per_passport']))
    {
$alerta_principal = "2";

$passport_per_esta ="0";


$update_pic_perdU = $_POST['update_passport_per_passport'];

$update_doc_perdU = $_POST['update_doc_per2'];

$id_update_perU = $_POST['update_passport_per_passport'];

$id_data_update_perU = $_POST['id_data_update_per'];






clearstatcache();
$filenameUP = "00_croppie/passport_per_".$id_update_perU."_".$update_doc_perdU.".png";



          if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
            $passport_per_esta ="1";

            $extU = 'png';
           
            $newfilenameU = "img_passport_per/".$id_update_perU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../conectar.php");   

          $query_fotoU = "UPDATE tb_data_personal SET pic_passport_per = '$newfilenameU' WHERE id_data_per = '$id_data_update_perU' LIMIT 1 ";
          

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

              
                 if ($passport_per_esta =="0") {

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
















// borrar pic del personal

if(isset($_POST['borrarXX_pic_per']))
    {

$alerta_principal = "2";

include("../conectar.php");

$queryKKC = "SELECT * FROM tb_data_personal WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$pic_a_borrar = $filaKK["pic_per"];

                      if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                         
                            unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_data_personal SET pic_per = '' WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i>";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }











// borrar passport del personal

if(isset($_POST['borrarXX_passport_per']))
    {

$alerta_principal = "2";

include("../conectar.php");

$queryKKC = "SELECT * FROM tb_data_personal WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$pic_a_borrar = $filaKK["pic_passport_per"];

                      if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                         
                            unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_data_personal SET pic_passport_per = '' WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i>";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }











// borrar doc del personal

if(isset($_POST['borrarXX_doc_per']))
    {

$alerta_principal = "2";

include("../conectar.php");

$queryKKC = "SELECT * FROM tb_data_personal WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1";

                      $resultKKC = mysqli_query($enlace,$queryKKC);
                      $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id ...


$pic_a_borrar = $filaKK["pic_doc_per"];

                      if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                         
                            unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_data_personal SET pic_doc_per = '' WHERE id_data_per = '$_POST[id_data_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                        $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i>";

                         }  

                         else {

                            $errorZ="- Nothing to delete. ";
                         }

mysqli_close($enlace); 

 }





if(isset($_POST['editar_password_personal']))
{

 include("../conectar.php");


$pass= mysqli_real_escape_string($enlace,$_POST['pass_per_mod']);  // almaceno el valor de clave limpio
$passwordHasheada=md5( md5 ($_POST['editar_password_personal']) . $pass ) ;


$sql_pp = "UPDATE tb_personal SET password_per = '$passwordHasheada',
                                  pass_was_mod = '1'

                                                WHERE id_per='$_POST[editar_password_personal]' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql_pp))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Info. ";
                                    mysqli_close($enlace);
                                  
                                    }

                             else{   // actualizo el pass

                     $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i>  &nbsp; <b> Pass Updated. </b>"; 
                     mysqli_close($enlace); 

                                }

}













if(isset($_POST['editar_personal']))
{


       include("../conectar.php");

        $query = "SELECT * FROM tb_personal WHERE id_per = $_POST[editar_personal]";

        $id_selecc = mysqli_query($enlace, $query) or die(mysqli_error());

        $row_id_selecc = mysqli_fetch_assoc($id_selecc);

        $totalRows_id_selecc = mysqli_num_rows($id_selecc);
               

        $doc_per_ciU = ($row_id_selecc['doc_per']);      /* consigue lo que requiera del personal a editar */

        $id_per_idU = ($row_id_selecc['id_per']);

        $id_address_idU = ($row_id_selecc['id_address']);

        $id_data_idU = ($row_id_selecc['id_data_per']);


//  detectar si el doc de if del personal esta en uso....



       $queryE = "SELECT * FROM tb_personal WHERE doc_per ='".mysqli_real_escape_string($enlace,$_POST['doc_per_mod'])."' LIMIT 1";

       $resultE = mysqli_query($enlace,$queryE);  // si hay coincidencia almacena el numero total de coincidencias del code

       $filaE=mysqli_fetch_array($resultE);

       /* $fil = ($filaE['id']); */  // esto es para mostrar el id en donde esta 

           if ($filaE['id_per'] != $id_per_idU AND mysqli_num_rows($resultE)>0) 
// si existe coincidencia y ademas el id de la coincidencia no es el que  intento modificar... 

                                    {
                                         $errorZ="- <b>Doc or Id</b> entered is in use."; 

                                    }
                     

                                    if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
                                      {
                                         $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                                         mysqli_close($enlace);             
                    
                                      }
     
            else   // si no hay coincidencia en el doc id del personal ingresado procedo a modificar....
            {


              // agregar luego     password_per = '".mysqli_real_escape_string($enlace,$_POST['pass_per_mod'])."',

$sql = "UPDATE tb_personal SET doc_per = '".mysqli_real_escape_string($enlace,$_POST['doc_per_mod'])."',
               passport_per = '".mysqli_real_escape_string($enlace,$_POST['passport_per_mod'])."',
               p_name_per = '".mysqli_real_escape_string($enlace,$_POST['p_name_per_mod'])."',
               s_name_per = '".mysqli_real_escape_string($enlace,$_POST['s_name_per_mod'])."',
               p_surname_per = '".mysqli_real_escape_string($enlace,$_POST['p_surname_per_mod'])."',
               s_surname_per = '".mysqli_real_escape_string($enlace,$_POST['s_surname_per_mod'])."',

               birth_per = '".mysqli_real_escape_string($enlace,$_POST['date_birth_per_mod'])."',
               id_sex = '".mysqli_real_escape_string($enlace,$_POST['sex_per_mod'])."',
               id_nationality = '".mysqli_real_escape_string($enlace,$_POST['nationality_per_mod'])."',

               id_rol_per = '".mysqli_real_escape_string($enlace,$_POST['hostel_rol_per_mod'])."',
               id_hostel = '".mysqli_real_escape_string($enlace,$_POST['work_for_per_mod'])."',
               per_was_mod = '1'

                                                WHERE id_per='$_POST[editar_personal]' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Info. ";
                                    mysqli_close($enlace);
                                  
                                    }

                             else{   // actualizo la direccion



              $id_country_es = $_POST["country_per_mod"];    // no esta llegando el id aqui....   

            
                $sql_add = "UPDATE tb_address SET city_address = '".mysqli_real_escape_string($enlace,$_POST['city_per_mod'])."',
                     id_country = '$id_country_es',
              post_code_address = '".mysqli_real_escape_string($enlace,$_POST['post_code_per_mod'])."', 
              name_address = '".mysqli_real_escape_string($enlace,$_POST['address_per_mod'])."'


                                                WHERE id_address='$id_address_idU' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql_add))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Address. ";
                                    mysqli_close($enlace);
                                  
                                    }


                                     else{   // actualizo ahora la data





          $sql_data = "UPDATE tb_data_personal SET a_phone_per = '".mysqli_real_escape_string($enlace,$_POST['a_phone_per_mod'])."',
                             b_phone_per = '".mysqli_real_escape_string($enlace,$_POST['b_phone_per_mod'])."',

                             email_per = '".mysqli_real_escape_string($enlace,$_POST['email_per_mod'])."'

                      WHERE id_data_per='$id_data_idU' LIMIT 1 ";


                       
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















$infoZZ = '';




 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">






<?php

include ("../conectar.php");


 $este_es_my_user = $_SESSION['id_per'];


$queryFHL = "SELECT * FROM tb_personal, tb_address, sex, nationality, roles, tb_data_personal 
WHERE tb_personal.id_per = '$este_es_my_user'
and   tb_personal.id_address = tb_address.id_address 
and   tb_personal.id_sex = sex.id_sex
and   tb_personal.id_nationality = nationality.id_nationality
and   tb_personal.id_rol_per = roles.id_rol_per
and   tb_personal.id_data_per = tb_data_personal.id_data_per
limit 1";



$usuarios = mysqli_query($enlace, $queryFHL) or die(mysqli_error());

$row_usuarios = mysqli_fetch_assoc($usuarios);

$totalRows_usuarios = mysqli_num_rows($usuarios);



$was_or_not = $row_usuarios['per_was_mod'];
$pass_was_or_not = $row_usuarios['pass_was_mod'];

 if ($was_or_not == '0' or $pass_was_or_not == '0' )
                {                  
         $infoZZ = " <i class=\"fa-solid fa-triangle-exclamation fa-lg\"></i>  &nbsp; <b> Please update your info or password. </b>"; 
               } 



mysqli_close($enlace);


?>









<div class="form-row">

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-user-pen fa-lg "></i> &nbsp; &nbsp; My User
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




                <?php 
                  if ($infoZZ!="")
                  { echo "<div class=\"alert col-md-9 col-lg-9 alert-info text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$infoZZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
</div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->







      

<div class="card-body border border-info mb-2" <?php if ( $totalRows_usuarios == '0' ){?>style="display:none"<?php } ?> >

          <div class="table-responsive">

            <table class="table table-bordered stricolor table-sm"  width="100%" cellspacing="0">
             
              <thead>
                <tr>                  
                  
                    
                       <th><i class="fas fa-camera-retro fa-lg"></i></th>
                       <th><i class="fa-solid fa-gear fa-lg"></i></th> 

                  <th><i class="fa-solid fa-id-card fa-lg"></i></th>
                    <th><i class="fa-solid fa-crop fa-lg"></i></th>  



                  <th><i class="fa-solid fa-passport fa-lg"></i></th>
                    <th><i class="fa-solid fa-gears fa-lg"></i></th>
                            
                  <th><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th> 
                </tr>
              </thead>


<tr>



  <td class="align-middle" align="center">


                  <img id="myImg" src="<?php echo $row_usuarios['pic_per']; ?>?nocache=<?php echo time(); ?>"
                  alt="Not Available"  onerror="this.src='img_per/000.jpg';" width="80px" /> 



                   </td>



<td class="align-middle" align="center">

                     <div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Pic." >
                <button class="btn btn-outline-info btn-sm" ><i class="fas fa-camera-retro"></i></button>

                <input class="center-block punterodd" type="file" accept="image/*"
                   name="upload_image_pic_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_pic_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>
                  </div>



  <?php include ("per_pic_mod/update_pic_per.php"); ?> 





 <div data-toggle="tooltip" data-placement="top" title="Delete Pic." >

                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                 data-target="#borrar_pic_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fas fa-camera-retro"></i></button>
        
</div>


<?php include ("per_pic_mod/delete_pic_per.php"); ?> 


                   </td>  







<td class="align-middle" align="center"><span class="text-muted"> <?php 
 $id_del_personal = $row_usuarios['id_per']; // necesario para editar o eliminar ?></span>

<br>

                  <img id="myImg" src="<?php echo $row_usuarios['pic_doc_per']; ?>?nocache=<?php echo time(); ?>"
                  alt="Not Available"  onerror="this.src='img_doc_per/000.jpg';" width="105px" />

</td>





<td class="align-middle" align="center">



  <div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Doc or Id." >
                <button class="btn btn-outline-info btn-sm" ><i class="fas fa-id-card"></i></button>

                <input class="center-block punterodd" type="file" accept="image/*"
                   name="upload_image_doc_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_doc_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation_doc_per<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>

  </div>


  <?php include ("per_pic_mod/update_doc_per.php"); ?> 





  <div data-toggle="tooltip" data-placement="top" title="Delete Doc or Id." >

                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                 data-target="#borrar_doc_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fas fa-id-card"></i></button>
        
  </div>



  <?php include ("per_pic_mod/delete_doc_per.php"); ?> 





         </td>  





<td class="align-middle" align="center"><span class="text-muted"><b><?php echo $row_usuarios['passport_per'];  ?></b></span>

<br>

                   <img id="myImg" src="<?php echo $row_usuarios['pic_passport_per']; ?>?nocache=<?php echo time(); ?>"
                  alt="Not Available"  onerror="this.src='img_passport_per/000.jpg';" width="65px" />

</td>



<td class="align-middle" align="center">



  <div class="upload-btn-wrapper">

          <div data-toggle="tooltip" data-placement="top" title="Update Passport." >  
                <button class="btn btn-outline-info btn-sm" ><i class="fa-solid fa-passport"></i></button>

                <input class="center-block punterodd" type="file" accept="image/*"
                   name="upload_image_passport_per<?php echo $row_usuarios['id_per']; ?>" id="upload_image_passport_per<?php echo $row_usuarios['id_per']; ?>"
                   onchange="return fileValidation_passport_per<?php echo $row_usuarios['id_per']; ?>()" /> 
          </div>

  </div>

  <?php include ("per_pic_mod/update_passport_per.php"); ?> 
 



  <div data-toggle="tooltip" data-placement="top" title="Delete Passport." >

                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                 data-target="#borrar_passport_per<?php echo $row_usuarios['id_per']; ?>"> <i class="fa-solid fa-passport"></i></button>
        
  </div>



  <?php include ("per_pic_mod/delete_passport_per.php"); ?> 




</td>  



<td class="align-middle" align="center">
        


<?php   

if ($was_or_not == '0'  ) {
    
  $update_icon = 'fas fa-edit fa-2x fa-beat';
    
  $text_update1 = 'Update';

}

else { 
       $update_icon = 'fas fa-edit';

       $text_update1 = '';
      
          }






if ($pass_was_or_not == '0'  ) {
    
  $update_icon_pass = 'fa-solid fa-key fa-2x fa-beat';
  
  $text_update2 = 'Update';

}

else { 

       $update_icon_pass = 'fa-solid fa-key ';

       $text_update2 = '';
      
          }

 ?>





  <div data-toggle="tooltip" data-placement="top" title="Update My Data." >

<button type="button" class="btn btn-outline-primary btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_usuarios['id_per']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="<?php echo $update_icon; ?>"></i><br><span style="font-size: 16px;"><?php echo $text_update1; ?></span></button>    

  </div>


<?php include("updates/update_personal_modal.php"); ?>




  <div data-toggle="tooltip" data-placement="top" title="Update My Password." >
<button type="button" class="btn btn-outline-dark btn-sm mb-1" data-toggle="modal"
                  data-target="#password<?php echo $row_usuarios['id_per']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="<?php echo $update_icon_pass; ?>"></i><br><span style="font-size: 16px;"><?php echo $text_update2; ?></span></button>    
  </div>



<?php include("updates/update_pass_personal_modal.php"); ?>

              


    </td>












</tr>

            </table>
           
           <div>

<div>








                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

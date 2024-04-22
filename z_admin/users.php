<?php  include("00_identificador.php");


    $alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.


    $foto_success="";       // relacionada a la carga de imagenes
    $foto_danger="";
    $foto_info="1";

    $doc_foto_success="";       // relacionada a la carga de imagenes de doc
    $doc_foto_danger="";
    $doc_foto_info="1";

    $cuenta_de_usos_per = '0';  // para borrar un usuario lleva el conteo si es usado.


    $direcc_success=""; // notificador del proceso de insercion de direccion
    $direcc_danger="";  

    $datos_success=""; // notificador del proceso de insercion de datos del usuario
    $datos_danger="";

    $user_success="";  // notificador del proceso de insercion de informacion del usuario
    $user_danger="";


    $conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores


include("../conectar.php");
include ("consultas_add/query_users.php"); 


//Turn off all error reporting
//error_reporting(0);



// empieza el cambio de status del personal
if(isset($_POST['inactive_personal']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";

    $usuario_afectado_por_este = $_POST['desactivado_by']; 

    $usuario_afectado = $_POST['inactive_personal']; 


   if ($usuario_afectado_por_este == $usuario_afectado ) {
    $errorZ="- You cannot change your own status. ";
   }


   else {
   
    $name_a_cambiar = $_POST['name_del_cambiante']; 
    $surname_a_cambiar = $_POST['apellido_del_cambiante']; 


    include("../conectar.php");                                                

    $query_disable_per = "INSERT INTO quien_y_cuando_per(id_quien_act_o_desact, id_per_act_o_desact,
     text_act_o_desact, historial_status) 

    VALUES (   '$usuario_afectado_por_este',
               '$usuario_afectado',
               '".mysqli_real_escape_string($enlace,$_POST['nota_text'])."'    ,
               '0'

            )";


if (!mysqli_query($enlace,$query_disable_per))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{



  include("../conectar.php");   

  $query_cambiame_U = "UPDATE tb_personal SET status = '0' WHERE id_per = '$usuario_afectado' LIMIT 1 ";
  

  if (!mysqli_query($enlace,$query_cambiame_U))      // si no ha logrado ingresar la foto
           {

   $errorZ.="- Error. ";               
   mysqli_close($enlace);

           }

  else {
  
    $exitoZ = "<b>--&nbsp; ".$surname_a_cambiar." ".$name_a_cambiar." &nbsp;--</b> pass to inactive.";
    mysqli_close($enlace);

    }   

  


}



   }



 }  // cierre cambio status















// empieza el cambio de status del personal
if(isset($_POST['active_personal']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";


    $usuario_afectado_por_este = $_POST['desactivado_by']; 

    $usuario_afectado = $_POST['active_personal']; 
    

    $name_a_cambiar = $_POST['name_del_cambiante']; 
    $surname_a_cambiar = $_POST['apellido_del_cambiante']; 


    include("../conectar.php");                                                

    $query_disable_per = "INSERT INTO quien_y_cuando_per(id_quien_act_o_desact, id_per_act_o_desact,
     text_act_o_desact, historial_status) 

    VALUES (   '$usuario_afectado_por_este',
               '$usuario_afectado',
               '".mysqli_real_escape_string($enlace,$_POST['nota_text_2'])."'    ,
               '1'

            )";


if (!mysqli_query($enlace,$query_disable_per))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{



  include("../conectar.php");   

  $query_cambiame_U = "UPDATE tb_personal SET status = '1' WHERE id_per = '$usuario_afectado' LIMIT 1 ";
  

  if (!mysqli_query($enlace,$query_cambiame_U))      // si no ha logrado ingresar la foto
           {

   $errorZ.="- Error. ";               
   mysqli_close($enlace);

           }

  else {
  
    $exitoZ = "<b>--&nbsp; ".$surname_a_cambiar." ".$name_a_cambiar." &nbsp;--</b> pass to active.";
    mysqli_close($enlace);

    }   

  


}



 }  // cierre cambio status





























// empieza la insercion del usuario
if(isset($_POST['add_user']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

    $alerta_principal = "2";


 //  verifica si doc de Id ya está registrada en la BD...
    include("../conectar.php");          


    $queryC = "SELECT doc_per FROM tb_personal WHERE doc_per ='".mysqli_real_escape_string($enlace,$_POST['doc_per'])."' LIMIT 1";

    $resultC = mysqli_query($enlace,$queryC);

            if (mysqli_num_rows($resultC)>0)
            {
            $errorZ="- Doc or Id already registered.";
            mysqli_close($enlace); 
            }



            else  // Entra aqui solo si el doc de id no esta registrado previamente y guarda la direccion
            {
 
                                                          
            $country_per = $_POST["country_per"];  

            // proceso de insercion y creacion del id en la tabla direcciones.

            $query_d = "INSERT INTO tb_address(city_address, id_country, post_code_address, name_address) 

                            VALUES (   '".mysqli_real_escape_string($enlace,$_POST['city_per'])."'         ,
                                       '$country_per',
                                       '".mysqli_real_escape_string($enlace,$_POST['post_code_per'])."'    ,
                                       '".mysqli_real_escape_string($enlace,$_POST['address_per'])."'

                                    )";


            if (!mysqli_query($enlace,$query_d))  // si no logro ingresar la direccion...
            {
            $direcc_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc

            $errorZ="- Error. ";

            mysqli_close($enlace); 
            }




            else
            {       //  guardo la direccion por tanto ahora guardo los datos personales del usuario...

            $direcc_success="<i class=\"fas fa-check-circle fa-lg\"></i>";  // coloca success al lado de direcc
            $direcc_id = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado direcc.

            $a_phone_per = mysqli_real_escape_string($enlace,$_POST['a_phone_per']);
            $b_phone_per =  mysqli_real_escape_string($enlace,$_POST['b_phone_per']);
            $email_per =  mysqli_real_escape_string($enlace,$_POST['email_per']);
   
           
            $query_p = "INSERT INTO tb_data_personal(a_phone_per, b_phone_per, email_per)   

            VALUES ('$a_phone_per', '$b_phone_per', '$email_per')"; 

            
                        if (!mysqli_query($enlace,$query_p))      // si no ha logrado ingresar los datos del usuario
                        {
                        $datos_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de datos personales. 
                        $errorZ="- Error. ";

                        // secuencia que borra la direccion del usuario en caso de error

                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address User Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Not-Clear!!! &nbsp ";}


                         mysqli_close($enlace); 
                        }


                        else
                        {  //  exito al guardar la direccion y los datos ahora guardo al usuario.


                        $datos_success="<i class=\"fas fa-check-circle fa-lg\"></i>";  // coloca success al lado de datos
                        $id_datos_per = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_datos_per...

                        $sex_per = $_POST["sex_per"];
                        $nationality_per = $_POST["nationality_per"];
                        $work_for_per = $_POST['work_for_per'];
                        $hostel_rol_per = $_POST['hostel_rol_per'];
                        $date_birth_per = $_POST["date_birth_per"];

                        $p_name_per = mysqli_real_escape_string($enlace,$_POST['p_name_per']);
                        $s_name_per =  mysqli_real_escape_string($enlace,$_POST['s_name_per']);
                        $p_surname_per = mysqli_real_escape_string($enlace,$_POST['p_surname_per']);
                        $s_surname_per =  mysqli_real_escape_string($enlace,$_POST['s_surname_per']);
                        $doc_per = mysqli_real_escape_string($enlace,$_POST['doc_per']);
                        $passport_per =  mysqli_real_escape_string($enlace,$_POST['passport_per']);

                        $quien_lo_registra = $_SESSION['id_per'];
                       

                        $pass_per = mysqli_real_escape_string($enlace,$_POST['pass_per']); // almaceno el valor de clave limpio
                        
                        $address_per =  mysqli_real_escape_string($enlace,$_POST['address_per']);
                       

                        $query_per = "INSERT INTO tb_personal(doc_per, passport_per, p_name_per, s_name_per, p_surname_per, s_surname_per, 
                        birth_per,  id_address, id_sex, id_nationality, password_per, id_rol_per, id_hostel, id_data_per, per_registered_by)   

                        VALUES ('$doc_per', '$passport_per', '$p_name_per', '$s_name_per', '$p_surname_per', '$s_surname_per',
                        '$date_birth_per', '$direcc_id', '$sex_per', '$nationality_per', '$pass_per', '$hostel_rol_per', '$work_for_per', '$id_datos_per', '$quien_lo_registra')"; 


                        if (!mysqli_query($enlace,$query_per))      // si no ha logrado ingresar los datos
                        {
                        $user_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de infor personal. 
                        $errorZ="- Error. ";


                       // secuencia que borra la direccion del usuario y los datos del usuario


                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address User Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Not-Clear!!! &nbsp ";}


                                            $sqlBBB = "DELETE FROM tb_data_personal WHERE id_data_per = '$id_datos_per' "; 

                                            if (mysqli_query($enlace,$sqlBBB))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Data User Clear!!! &nbsp ";
                                            $conteo_errorAr = "2";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Data Not-Clear!!! &nbsp ";}


                        }


                       else  {    // aparentemente finalizo bien


                        if ($conteo_errorAr == '0') {   

                            $id_id_del_per = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_del_per...
                            $passwordHasheada=md5( md5 ($id_id_del_per) . $pass_per ) ;

                   $query_hash = " UPDATE tb_personal SET password_per = '$passwordHasheada' WHERE id_per = '$id_id_del_per' LIMIT 1 "; 
                   $result = mysqli_query($enlace,$query_hash);


                                $exitoZ.="- &nbsp;
                                <i data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Address, data and info saved.\">
                                <i class=\"fas fa-user-tie fa-lg\"></i></i> &nbsp ";

                                 $user_success="<i class=\"fas fa-check-circle fa-lg\"></i>";  // coloca success al lado de datos de usuario
                                 mysqli_close($enlace); 

                                 }


                                 else  { $errorZ.="- &nbsp; Address, data and info not saved!!! &nbsp ";  }

                        

 
                        }      // cierre aparentemente finalizo bien





                        }  // exito al guardar la info de usuario tras haber guardado la direccion y los datos.


            } // cierre general de la inserción datos del usuario tras guardar direccion.

    }  // cierre general de la inserción de direccion solamente.

}  // cierre general de la peticion de inserción de usuario.













// los siguientes permiten eliminar un usuario.

    if(isset($_POST['borrar_per']))
    {

$alerta_principal = "2";

            $borrar_id = $_POST['borrar_per'];
            $borrar_address = $_POST['id_addrexx'];  
            $borrar_data = $_POST['id_dataxx'];  

include("../conectar.php");  


$queryC = "SELECT * FROM tb_personal, tb_data_personal WHERE tb_personal.id_per = '$_POST[borrar_per]'
                                                       and  tb_personal.id_data_per = tb_data_personal.id_data_per LIMIT 1";

                      $resultC = mysqli_query($enlace,$queryC);
                      $fila=mysqli_fetch_array($resultC);         // lo anterior me permite tener el nombre del registro
                                                                  // gracias al id de la direccion que esta en la tabla...



                      $pic_a_borrar = $fila["pic_per"];
                      $doc_a_borrar = $fila["pic_doc_per"];
                      $passport_a_borrar = $fila["pic_passport_per"];

                      $direcc_a_borrar = $fila["id_address"];
                      $data_a_borrar = $fila["id_data_per"];
                      $name_a_borrar = $fila["p_name_per"];
                      $surname_a_borrar = $fila["p_surname_per"];

// debo detectar si el id del personal esta en uso antes... usado al registrar usuarios y al registrar hosteles
        

                      $querym = "SELECT hostel_registered_by FROM z_hostel WHERE hostel_registered_by = '$_POST[borrar_per]'";

                      $howm = mysqli_query($enlace, $querym) or die(mysqli_error());

                      $row_howm = mysqli_fetch_assoc($howm);

                      $totalRows_howm = mysqli_num_rows($howm);

                      

                      $querym_per = "SELECT per_registered_by FROM tb_personal WHERE per_registered_by = '$_POST[borrar_per]'";

                      $howm_per = mysqli_query($enlace, $querym_per) or die(mysqli_error());

                      $row_howm_per = mysqli_fetch_assoc($howm_per);

                      $totalRows_howm_per = mysqli_num_rows($howm_per);








                      $cuenta_de_usos_per = $totalRows_howm+$totalRows_howm_per; // me cuenta el total de usos de ese per
                      

                      if ($cuenta_de_usos_per >=1) {                        

                             $errorZ=" <b>" . $name_a_borrar . "</b> - It's in use.";   
                             mysqli_close($enlace);

                      }





                else {  // no esta siendo usado el usuario.... ahora si lo borro

                       if (file_exists($pic_a_borrar )) {    // de haber un pic entra       
                            if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                          unlink($pic_a_borrar);
                         }
                         }

                          if (file_exists($doc_a_borrar )) {    // de haber un doc entra       
                            if (!empty( $doc_a_borrar )) {   // si hay algo en doc, borra ese archivo
                          unlink($doc_a_borrar);
                         }
                         }   


                          if (file_exists($passport_a_borrar )) {    // de haber un passport entra       
                            if (!empty( $passport_a_borrar )) {   // si hay algo en passport, borra ese archivo
                          unlink($passport_a_borrar);
                         }
                         }         



                         $queryD = "DELETE FROM tb_data_personal WHERE id_data_per = '$data_a_borrar' LIMIT 1";

                      if (!mysqli_query($enlace,$queryD))      // si no ha logrado borrar los datos de la data del personal
                         {
                          $errorZ=".";
                          }


                          if ($errorZ!="")  //  si $errorZ es distinto de vacío,  es que ha habido algun error al borrar la data
                          {
                             $errorZ = " <i class=\"fa-solid fa-file-lines fa-lg\"></i> ";
                             mysqli_close($enlace);           
                          }



                           $queryDiss = "DELETE FROM tb_address WHERE id_address = '$direcc_a_borrar' LIMIT 1";

                      if (!mysqli_query($enlace,$queryDiss))      // si no ha logrado borrar los direcc del user
                         {
                          $errorZ=".";
                          }


                          if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fa-solid fa-map-location-dot fa-lg\"></i> "; 
                             mysqli_close($enlace); 
                          }




                          else {  

                            $exitoZ = "<b>--&nbsp; ".$surname_a_borrar." ".$name_a_borrar." &nbsp;--</b> was deleted.";

                      }           // hasta aqui gracias a borrar la data del personal al estar en cascada se lleva el contenido del personal.
                      

                      if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. " ";            
                          }

                      mysqli_close($enlace); 




                    }


                      
    }             
















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
           
            $newfilenameU = "img_personal/pic/".$update_pic_perdU."_".$update_doc_perdU.".".$extU;


             
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
           
            $newfilenameU = "img_personal/doc/".$update_pic_perdU."_".$update_doc_perdU.".".$extU;


             
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
           
            $newfilenameU = "img_personal/passport/".$id_update_perU."_".$update_doc_perdU.".".$extU;


             
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

$el_per_per_id_id = $_POST['editar_password_personal'];

$pass= mysqli_real_escape_string($enlace,$_POST['pass_per_mod']);  // almaceno el valor de clave limpio
$passwordHasheada=md5( md5 ($el_per_per_id_id) . $pass ) ;
 

$sql_pp = "UPDATE tb_personal SET password_per = '$passwordHasheada'

                                                WHERE id_per='$_POST[editar_password_personal]' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql_pp))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Info. ";
                                    mysqli_close($enlace);
                                  
                                    }

                             else{   // actualizo el pass

                     $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i>  &nbsp; <b> Pass Updated.</b>"; 
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
               id_hostel = '".mysqli_real_escape_string($enlace,$_POST['work_for_per_mod'])."'

                                                WHERE id_per='$_POST[editar_personal]' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Info. ";
                                    mysqli_close($enlace);
                                  
                                    }

                             else{   // actualizo la direccion



              $id_country_es = $_POST["country_per_mod"];       

            
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


















include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">


              <div class="form-row">

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-users-line fa-lg "></i> &nbsp; &nbsp; Add User:
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

                                <b class="text-info"> Info: </b>            

                        <?php 
                          if ($user_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$user_success."</i>"; }
                        ?>

                        <?php 
                          if ($user_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$user_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->


                          <div class="form-row margencito"> 


                            <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-id-card fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="29" class="form-control importantex" id="doc_per" name="doc_per" placeholder="Doc or Id Number" aria-label="doc_per" aria-describedby="basic-addon1" required>    
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-passport fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="29" class="form-control " id="passport_per" name="passport_per" placeholder="Passport" aria-label="passport_per" aria-describedby="basic-addon1" >   
                              </div>


                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pencil fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control importantex" id="p_name_per" name="p_name_per" placeholder="First Name" aria-label="p_name_per" aria-describedby="basic-addon1" required>
                              </div>



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-marker fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="s_name_per" name="s_name_per" placeholder="Middle Name" aria-label="s_name_per" aria-describedby="basic-addon1" >
                              </div>




                             <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-fancy fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control importantex" id="p_surname_per" name="p_surname_per" placeholder="Surname" aria-label="p_surname_per" aria-describedby="basic-addon1" required>
                              </div>



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-clip fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="s_surname_per" name="s_surname_per" placeholder="Last Name" aria-label="s_surname_per" aria-describedby="basic-addon1" >
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles fa-lg"></i></span>  
                                        </div>
                                            <input type="date"  class="form-control importantex" id="date_birth_per" name="date_birth_per"  aria-label="date_birth_per" aria-describedby="basic-addon1" required> 
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars-and-venus-burst fa-lg"></i></span>  
                                        </div>


                                        <select class="form-control importantex" id="sex_per" name="sex_per" required>
                                                        
                                                        <option selected disabled value="">Gender:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_sex['id_sex']; ?>"><?php echo $row_datos_sex['name_sex']; ?></option>

                                <?php } while ($row_datos_sex = mysqli_fetch_assoc($datos_sex)); ?> 

                           



                                        </select>
  
                              </div>  




 <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-flag fa-lg"></i></span>  
                                        </div>


                                        <select class="form-control importantex" id="nationality_per" name="nationality_per" required>
                                                        
                                                        <option selected disabled value="">Nationality:</option>
                                                        <option disabled></option>


                               <?php do{?>                                

<option value="<?php echo $row_datos_nacionality['id_nationality']; ?>"><?php echo $row_datos_nacionality['name_nationality']; ?></option>

                                <?php } while ($row_datos_nacionality = mysqli_fetch_assoc($datos_nacionality)); ?> 

                           
                                        </select>

                              </div> 




                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key fa-lg"></i></span>   
                                        </div>
                                            <input type="text" maxlength="16" class="form-control importantex" id="pass_per" name="pass_per" placeholder="Password" aria-label="pass_per" aria-describedby="basic-addon1" required>   
                              </div> 




   <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-user fa-lg"></i></span>  
                                        </div>


                                        <select class="form-control importantex" id="hostel_rol_per" name="hostel_rol_per" required>
                                                        
                                                        <option selected disabled value="">Rol:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_rol['id_rol_per']; ?>"><?php echo $row_datos_rol['name_rol']; ?></option>

                                <?php } while ($row_datos_rol = mysqli_fetch_assoc($datos_rol)); ?> 
                           
                                        </select>

                                          
                              </div>  




                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-clock fa-lg"></i></span>  
                                        </div>

                                        <select class="form-control importantex" id="work_for_per" name="work_for_per" required>
                                                        
                                                        <option selected disabled value="">Hostel:</option>
                                                        <option disabled></option>


                               <?php do{?>                                

<option value="<?php echo $row_datos_hostel['id_hostel']; ?>"><?php echo $row_datos_hostel['name_hostel']; ?></option>

                                <?php } while ($row_datos_hostel = mysqli_fetch_assoc($datos_hostel)); ?> 


                           
                                        </select>

 
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
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen-button fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="39" class="form-control" id="a_phone_per" name="a_phone_per" placeholder="Main Phone" aria-label="a_phone_per" aria-describedby="basic-addon1">    
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="39" class="form-control" id="b_phone_per" name="b_phone_per" placeholder="Extra Phone" aria-label="b_phone_per" aria-describedby="basic-addon1">    
                              </div>






                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at fa-lg"></i></span>   
                                        </div>
                                            <input type="email" maxlength="39" class="form-control importantex" id="email_per" name="email_per" placeholder="Email" aria-label="email_per" aria-describedby="basic-addon1" required>    
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
                             




                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tree-city fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="city_per" name="city_per" placeholder="City where you live" aria-label="city_per" aria-describedby="basic-addon1">    
                              </div>  





                             <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-earth-americas fa-lg"></i></span>  
                                        </div>

                                        <select class="form-control importantex" id="country_per" name="country_per" required>
                                                        
                                                        <option selected disabled value="">Country where you live:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_country['id_country']; ?>"><?php echo $row_datos_country['name_country']; ?></option>

                                <?php } while ($row_datos_country = mysqli_fetch_assoc($datos_country)); ?> 

                       
                                        </select>
   
                              </div>  




                            <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-2 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot fa-lg"></i></span>  
                                        </div>
                                            <input type="number" min="1" maxlength="10" class="form-control" id="post_code_per" name="post_code_per" placeholder="Zip Code" aria-label="post_code_per" aria-describedby="basic-addon1">   
                              </div> 




                           <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-signs-post fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="109" class="form-control" id="address_per" name="address_per" placeholder="Address" aria-label="address_per" aria-describedby="basic-addon1">    
                           </div>  




                        <div class="col-md-1 mb-2">

                        <button type="submit" name="add_user" class="btn btn-sm btn-info btn-block" id='add_user'>
                        <i class="fa-solid fa-floppy-disk fa-lg"></i> &nbsp</button> 
                    
                        </div>




                            </div>


</form>



              </div><!-- cierre card mx-auto -->
              </div><!-- cierre card-body -->





<?php

include ("../conectar.php");


$queryFHL = "SELECT * FROM tb_personal, tb_address, sex, nationality, roles, tb_data_personal 
WHERE tb_personal.id_address = tb_address.id_address 
and   tb_personal.id_sex = sex.id_sex
and   tb_personal.id_nationality = nationality.id_nationality
and   tb_personal.id_rol_per = roles.id_rol_per
and   tb_personal.id_data_per = tb_data_personal.id_data_per

ORDER BY tb_personal.p_surname_per ASC";

$usuarios = mysqli_query($enlace, $queryFHL) or die(mysqli_error());

$row_usuarios = mysqli_fetch_assoc($usuarios);

$totalRows_usuarios = mysqli_num_rows($usuarios);




mysqli_close($enlace);


?>



<div class="card-header mt-3">
<b><i class="fa fa-table"></i> Users:</b>
</div>



        <div class="card-body border border-info mb-2" <?php if ( $totalRows_usuarios == '0' ){?>style="display:none"<?php } ?> >

          <div class="table-responsive">

            <table class="table table-bordered stricolor table-sm" id="dataTable" width="100%" cellspacing="0">
             
              <thead>
                <tr>                  
                  
                    <th><i class="fa-solid fa-signature fa-lg"></i></th>
                       <th><i class="fas fa-camera-retro fa-lg"></i></th>
                       <th><i class="fa-solid fa-gear fa-lg"></i></th> 

                  <th><i class="fa-solid fa-id-card fa-lg"></i></th>
                    <th><i class="fa-solid fa-crop fa-lg"></i></th>  



                  <th><i class="fa-solid fa-passport fa-lg"></i></th>
                    <th><i class="fa-solid fa-gears fa-lg"></i></th>
                                  
                    
                  <th><i class="fa-regular fa-address-book fa-lg"></i></th>
                      
                  <th><i class="fa-solid fa-user-gear fa-lg"></i></th> 
                </tr>
              </thead> 


           



               <tbody>

            <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->            

                <tr>

 <?php

include ("../conectar.php");


$este_lo_registro = $row_usuarios['per_registered_by'];

$queryFH_whoL = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro' limit 1";

$usuarios_whoL = mysqli_query($enlace, $queryFH_whoL) or die(mysqli_error());

$row_usuarios_whoL = mysqli_fetch_assoc($usuarios_whoL);



mysqli_close($enlace);


?>



<td class="align-middle" align="center">

<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >

    <b><?php echo $row_usuarios['p_surname_per'];?>, <?php echo $row_usuarios['s_surname_per'];?></b> <br>
    <?php echo $row_usuarios['p_name_per'];?>, <?php echo $row_usuarios['s_name_per']; ?>.
<br><span style="color: #417FD5;"><b><?php echo $row_usuarios['name_nationality']; ?></b>.</span> 

</div>




 <div class="form-row "> 

                      <div class="col-lg-12 ">


                        <?php if ($row_usuarios['status']=='1') { ?>
                   
                    <span data-toggle="tooltip" data-placement="top" title="User: Active"> 
                    <button type="submit" name="cambio_status" class="btn btn-outline-success btn-sm" data-toggle="modal"
                    data-target="#desactivar<?php echo $row_usuarios['id_per']; ?>" >       
                    <i class="fa-regular fa-face-laugh fa-lg"></i></button>
                    </span> 

                    <?php   }?>  



                    <?php if ($row_usuarios['status']=='0') { ?>
                    
                    <span data-toggle="tooltip" data-placement="top" title="User: Inactive">
                    <button type="submit" name="cambio_status" class="btn btn-outline-secondary btn-sm"
                    data-toggle="modal" data-target="#activar<?php echo $row_usuarios['id_per']; ?>" >       
                      <i class="fa-regular fa-face-frown fa-lg"></i></button>
                    </span> 

                    <?php   }?> 


                      </div>

</div> 




 <?php include ("updates/update_pers_status_modales.php"); ?>  



</td>






  <td class="align-middle" align="center">



                  <img id="myImg" src="<?php echo $row_usuarios['pic_per']; ?>?nocache=<?php echo time(); ?>"
                  alt="Not Available"  onerror="this.src='img_personal/pic/000.jpg';" width="80px" /> 

<br><span style="color: #fb8e36;">"<b><?php echo $row_usuarios['name_rol']; ?></b>"</span>

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















<td class="align-middle" align="center"><span class="text-muted"> <?php echo $row_usuarios['doc_per'];
 $id_del_personal = $row_usuarios['id_per']; // necesario para editar o eliminar ?></span>

<br>

                  <img id="myImg" src="<?php echo $row_usuarios['pic_doc_per']; ?>?nocache=<?php echo time(); ?>"
                  alt="Not Available"  onerror="this.src='img_personal/doc/000.jpg';" width="105px" />

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
                  alt="Not Available"  onerror="this.src='img_personal/passport/000.jpg';" width="65px" />

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


















 <td class="align-middle" align="center"><?php echo $row_usuarios['a_phone_per']; 

                                                        if (!$row_usuarios['b_phone_per'] == "") {       
                                                            echo " <br>" .$row_usuarios['b_phone_per'];
                                                          } 
                  ?><br><br>
                  <span style="color: #9961cd;"><?php echo $row_usuarios['email_per']; ?></span>



 </td>  
   



<!--
<td class="align-middle" align="center">

                  <?php if ($row_usuarios['info_send_per']=='Si') { ?>
                                        
                  <form method="POST"> 
                  <button type="submit" name="enviar" class="btn btn-secondary btn-sm" onclick="document.body.style.cursor='wait'; return true;">Resend</button>
                                        

                  <input name="usuario_id" type="hidden" value="<?php echo $row_usuarios['id_per']; ?>">
                  <input name="se_envia"   type="hidden" value="Si"></form>

                  <?php   }?>



                  <?php if ($row_usuarios['info_send_per']=='No') { ?>

                  <form method="POST">
                  <button type="submit" name="enviar" class="btn btn-warning btn-sm" onclick="document.body.style.cursor='wait'; return true;" >Send &nbsp; <i class="fas fa-level-up-alt"></i></button>
                                        

                  <input name="usuario_id" type="hidden" value="<?php echo $row_usuarios['id_per']; ?>">
                  <input name="se_envia" type="hidden" value="Si"></form>

                  <?php   }?>

</td> -->


    





    <td class="align-middle" align="center">
        


<button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_usuarios['id_per']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fas fa-edit"></i></button>    




<?php include("updates/update_personal_modal.php"); ?>





<button type="button" class="btn btn-outline-dark btn-sm mb-1" data-toggle="modal"
                  data-target="#password<?php echo $row_usuarios['id_per']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fa-solid fa-key"></i></button>    




<?php include("updates/update_pass_personal_modal.php"); ?>





  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_usuarios['id_per']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></button>                 


    </td>


<?php include("deletes/delete_per_modal.php"); ?>

   
           
    
    </tr> 


            <?php } while ($row_usuarios = mysqli_fetch_assoc($usuarios)); ?>
                

              </tbody>



            </table> <!-- cierre tabla -->

          </div> <!-- cierre div tabla responsiva -->

        </div> <!-- cierre card body -->



                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

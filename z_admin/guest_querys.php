<?php 


// empieza el cambio de status del huesped
if(isset($_POST['edit_status_ggg']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";    

    $ahora_cambio_a = $_POST['status_mod'];
    $id_a_ser_modi = $_POST['edit_status_ggg'];


    include("../conectar.php");      
  
    $query_cambiame_state = "UPDATE tb_data_guests SET guests_behaviors = '$ahora_cambio_a'    
     WHERE id_guests = '$id_a_ser_modi' LIMIT 1 "; 


if (!mysqli_query($enlace,$query_cambiame_state))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{  
    $exitoZ = "- Behaviors Updated.";
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
       
        $newfilenameU = "guests/pic_g/".$update_pic_perdU."_".$update_doc_perdU.".".$extU;


         
        if(rename($filenameUP,$newfilenameU))
  {     

  include("../conectar.php");   

      $query_fotoU = "UPDATE tb_guests SET guests_pic = '$newfilenameU' WHERE id_guests = '$update_pic_perdU' LIMIT 1 ";
      

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









if(isset($_POST['editar_guests']))
{


       include("../conectar.php");

        $query = "SELECT * FROM tb_guests WHERE id_guests = $_POST[editar_guests]";

        $id_selecc = mysqli_query($enlace, $query) or die(mysqli_error());

        $row_id_selecc = mysqli_fetch_assoc($id_selecc);

        $totalRows_id_selecc = mysqli_num_rows($id_selecc);                   

        $doc_per_ciU = ($row_id_selecc['guests_doc_id']);      /* consigue lo que requiera del personal a editar */

        $id_per_idU = ($row_id_selecc['id_guests']);
    
        


//  detectar si el doc del  guest ya esta en uso en la bd
    

       $queryE = "SELECT * FROM tb_guests WHERE guests_doc_id ='".mysqli_real_escape_string($enlace,$_POST['doc_g_mod'])."' LIMIT 1";

       $resultE = mysqli_query($enlace,$queryE);  // si hay coincidencia almacena el numero total de coincidencias del code

       $filaE=mysqli_fetch_array($resultE);



           if ($filaE['id_guests'] != $id_per_idU AND mysqli_num_rows($resultE)>0) 
// si existe coincidencia y ademas el id de la coincidencia no es el que  intento modificar... 

                                    {
                                         $errorZ="- <b>Doc or Id</b> entered is in use."; 

                                    }
                     

                                    if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
                                      {
                                         $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                                         mysqli_close($enlace);             
                    
                                      }
     
            else   // si no hay coincidencia en el doc id del guesped ingresado procedo a modificar....
            {




$sql = "UPDATE tb_guests SET guests_doc_id = '".mysqli_real_escape_string($enlace,$_POST['doc_g_mod'])."',
            
p_name_g = '".mysqli_real_escape_string($enlace,$_POST['p_name_g_mod'])."',
s_name_g = '".mysqli_real_escape_string($enlace,$_POST['s_name_g_mod'])."',
p_surname_g = '".mysqli_real_escape_string($enlace,$_POST['p_surname_g_mod'])."',
s_surname_g = '".mysqli_real_escape_string($enlace,$_POST['s_surname_g_mod'])."',

guests_birth = '".mysqli_real_escape_string($enlace,$_POST['date_birth_g_mod'])."',
guests_mod = '1',
guests_sex = '".mysqli_real_escape_string($enlace,$_POST['sex_g_mod'])."'

                                                WHERE id_guests ='$_POST[editar_guests]' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Info. ";
                                    mysqli_close($enlace);
                                  
                                    }

                             else{   // actualizo la direccion


              $id_data_gg = $_POST['id_data_del_g'];
              $id_country_es = $_POST["nationality_g_mod"];     

            






          $sql_data = "UPDATE tb_data_guests SET id_nation_g = '$id_country_es',
                             guests_email = '".mysqli_real_escape_string($enlace,$_POST['email_g_mod'])."',

                             guests_phone = '".mysqli_real_escape_string($enlace,$_POST['a_phone_g_mod'])."',

                             guests_observ = '".mysqli_real_escape_string($enlace,$_POST['obs_g_mod'])."'

                      WHERE id_data_guests = '$id_data_gg' LIMIT 1 ";


                       
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
                                    
                                }   /* entra aqui si no se repite el doc ó es del huesped a modificar */

   
               }  /* cierre if principal */












               if(isset($_POST['editar_password_guest']))
               {
               
                include("../conectar.php");
               
               $el_per_per_id_id = $_POST['editar_password_guest'];
               
               $pass= mysqli_real_escape_string($enlace,$_POST['pass_g_mod']);  // almaceno el valor de clave limpio
               $passwordHasheada=md5( md5 ($el_per_per_id_id) . $pass ) ;
                
               
               $sql_pp = "UPDATE tb_guests SET guests_pass = '$passwordHasheada'
               
                                                               WHERE id_guests = '$_POST[editar_password_guest]' LIMIT 1 ";
               
                                      
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
               
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           // borrar passport del personal
           
           if(isset($_POST['borrarXX_passport_per']))
               {
           
           $alerta_principal = "2";
           
           include("../conectar.php");
           
           $queryKKC = "SELECT * FROM tb_data_guests WHERE id_data_guests = '$_POST[id_data_per_RR]' LIMIT 1";
           
                                 $resultKKC = mysqli_query($enlace,$queryKKC);
                                 $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                                             // gracias al id ...
           
           
           $pic_a_borrar = $filaKK["guests_doc_id_pic"];
           
                                 if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                                    
                                       unlink($pic_a_borrar);             
           
           $deleteXX = "UPDATE tb_data_guests SET guests_doc_id_pic = '' WHERE id_data_guests = '$_POST[id_data_per_RR]' LIMIT 1 ";
           $resultXXC = mysqli_query($enlace,$deleteXX);
           
                                   $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i>";
           
                                    }  
           
                                    else {
           
                                       $errorZ="- Nothing to delete. ";
                                    }
           
           mysqli_close($enlace); 
           
            }
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           // los siguientes permiten eliminar un huesped
           
           if(isset($_POST['borrar_guest']))
           {
           
           $alerta_principal = "2";
           
                   $borrar_id = $_POST['borrar_guest'];
            
                   $borrar_data = $_POST['id_dataxx'];  
           
           include("../conectar.php");  
           
           
           $queryC = "SELECT * FROM tb_guests, tb_data_guests WHERE tb_guests.id_guests = '$_POST[borrar_guest]'
                                                              and  tb_guests.id_guests = tb_data_guests.id_guests LIMIT 1";
           
                             $resultC = mysqli_query($enlace,$queryC);
                             $fila=mysqli_fetch_array($resultC);         // lo anterior me permite tener el nombre del registro
                                          
           
                             $pic_a_borrar = $fila["guests_pic"];                 
                             $passport_a_borrar = $fila["guests_doc_id_pic"];
           
                        
                             $data_a_borrar = $fila["id_data_guests"];
                             $name_a_borrar = $fila["p_name_g"];
                             $surname_a_borrar = $fila["p_surname_g"];
           
           // debo detectar si el id del huesped esta en uso antes... usado principalmente un el pago
               
           
                             $querym = "SELECT booking_status, id_guests FROM bed_booking
                             WHERE id_guests = '$_POST[borrar_guest]'
                             and booking_status != '1' order by id_guests asc ";                          /* los distintos de 1 son los que han usado el hostel */
           
                             $howm = mysqli_query($enlace, $querym) or die(mysqli_error());
           
                             $row_howm = mysqli_fetch_assoc($howm);
           
                             $totalRows_howm = mysqli_num_rows($howm);              
           
           $cuenta_de_usos_guest = $totalRows_howm; // me cuenta el total de veces que el huesped ha usado realmente cualquiera de los hostales
                             
           
                             if ($cuenta_de_usos_guest >=1) {                        
           
                                    $errorZ=" <b>" . $name_a_borrar . "</b> - Is an active guest or has a history of stays.";   
                                    mysqli_close($enlace);
           
                             }
           
           
           
           
           
                       else {  // no ha usado ningun hostel.... ahora si lo borro
           
                              if (file_exists($pic_a_borrar )) {    // de haber un pic entra       
                                   if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                                 unlink($pic_a_borrar);
                                }
                                }
           
                                 if (file_exists($passport_a_borrar )) {    // de haber un passport entra       
                                   if (!empty( $passport_a_borrar )) {   // si hay algo en passport, borra ese archivo
                                 unlink($passport_a_borrar);
                                }
                                }         
           
           
           
                                $queryD = "DELETE FROM tb_data_guests WHERE id_data_guests = '$data_a_borrar' LIMIT 1";
           
                             if (!mysqli_query($enlace,$queryD))      // si no ha logrado borrar los datos de la data 
                                {
                                 $errorZ=".";
                                 }
           
           
                                 if ($errorZ!="")  //  si $errorZ es distinto de vacío,  es que ha habido algun error al borrar la data
                                 {
                                    $errorZ = " <i class=\"fa-solid fa-file-lines fa-lg\"></i> ";
                                    mysqli_close($enlace);           
                                 }
           
           
           
                                 else {  
           
                                   $exitoZ = "<b>--&nbsp; ".$surname_a_borrar." ".$name_a_borrar." &nbsp;--</b> was deleted.";
           
                             }           // hasta aqui gracias a borrar la data del guest, se lleva al guest
                             
           
                             if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                                 {
                                    $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; " . $exitoZ. " ";            
                                 }
           
                             mysqli_close($enlace); 
           
           
           
           
                           }
           
           
                             
           }    














 if(isset($_POST['save_services_admin']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
 {
 
   include("../conectar.php");  
 
   $id_del_servicio_adquirido = $_POST['save_services_admin'];
 
  $echo_por_este = $_SESSION['id_per'];
 
         $qtyyy = $_POST['qtyyy'];   // son 3 inputs   
         $comentariosss = $_POST['comentariosss'];
         $id_serrr = $_POST['id_serrr'];
 
 
 
         foreach ( $qtyyy as $keyyy => $qtyyys) {
 
           if ($qtyyys >= '1') {
 
 
             $query_services_mod = "INSERT INTO tb_historial_servicios_dados(id_guests_services_check_in,
             cantidad_dada, nota_de_entrega, id_quien_entrego, id_del_booking) 
           
            VALUES (   '$id_serrr[$keyyy]',
                       '$qtyyys',                     
                       '$comentariosss[$keyyy]',
                       ' $echo_por_este',
                       '$id_del_servicio_adquirido'               
           
                    )";
           
           $listo_services_mod = mysqli_query($enlace, $query_services_mod) or die(mysqli_error());
 
 
 
 $query_cant_actual_pp = "SELECT id_guests_services_check_in, cant_recibida FROM tb_guests_services_check_in
  WHERE id_guests_services_check_in = '$id_serrr[$keyyy]' limit 1";
 
 $service_cantidad_pp = mysqli_query($enlace, $query_cant_actual_pp) or die(mysqli_error());
 $row_service_cantidad_pp = mysqli_fetch_assoc($service_cantidad_pp);
 
 
 $tengo = $row_service_cantidad_pp['cant_recibida'];
           
 
           
           $newtotal_pp = $tengo + $qtyyys;
 
 
 
           $sumar_del_services = "UPDATE tb_guests_services_check_in SET cant_recibida = '$newtotal_pp' 
           WHERE id_guests_services_check_in = '$id_serrr[$keyyy]' LIMIT 1 ";
           $lista_sumar = mysqli_query($enlace, $sumar_del_services) or die(mysqli_error());
 
 
 
 
 
 
           }  /* cierre if */
 
 
           }  /* cierre for each */
 
 
           $exitoZ = "Updated History.";
 
           mysqli_close($enlace); 
 
 
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
           
            $newfilenameU = "guests/doc_id_g/".$id_update_perU."_".$update_doc_perdU.".".$extU;


             
            if(rename($filenameUP,$newfilenameU))
      {     

      include("../conectar.php");   

          $query_fotoU = "UPDATE tb_data_guests SET guests_doc_id_pic = '$newfilenameU' WHERE id_data_guests = '$id_data_update_perU' LIMIT 1 ";
          

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









    

// borrar pic del huesped

if(isset($_POST['borrarXX_pic_per']))
{

$alerta_principal = "2";

include("../conectar.php");

$queryKKC = "SELECT * FROM tb_guests WHERE id_guests = '$_POST[id_per_RR]' LIMIT 1";

                  $resultKKC = mysqli_query($enlace,$queryKKC);
                  $filaKK=mysqli_fetch_array($resultKKC);         // lo anterior me permite tener el nombre del registro
                                                              // gracias al id ...


$pic_a_borrar = $filaKK["guests_pic"];

                  if (!empty( $pic_a_borrar )) {   // si hay algo en pic, borra ese archivo
                     
                        unlink($pic_a_borrar);             

$deleteXX = "UPDATE tb_guests SET guests_pic = '' WHERE id_guests = '$_POST[id_per_RR]' LIMIT 1 ";
$resultXXC = mysqli_query($enlace,$deleteXX);

                    $exitoZ="<i class=\"fa-regular fa-thumbs-up fa-lg\"></i>";

                     }  

                     else {

                        $errorZ="- Nothing to delete. ";
                     }

mysqli_close($enlace); 

}























?>
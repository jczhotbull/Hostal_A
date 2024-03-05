<?php  





// error_reporting(0);



include("00_identificador.php");




if (!isset($_SERVER['HTTP_REFERER'])){ 
 session_destroy();
 }           // con esto es imposible entrar aqui, tipeando la direccion.







include ("conectar.php");

// verifica si hay o no hay hostales registrados

$query_String_inicio = "SELECT COUNT(*) AS total_inicio FROM z_hostel";
$query_inicio = mysqli_query($enlace, $query_String_inicio);
$row_inicio = mysqli_fetch_object($query_inicio);

mysqli_close($enlace);


$url = 'index.php';

if ($row_inicio->total_inicio >= '1') {
  header( "Location: $url" );
}





$alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.
$conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores



// empieza la insercion del usuario y del hostal inicial

if(isset($_POST['add_user_and_hostel']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

    $alerta_principal = "2";



include("conectar.php");   


    $hostel_country = '1';  

            // proceso de insercion y creacion del id en la tabla direcciones correspondiente al hostel.

            $query_d_hostel = "INSERT INTO tb_address(city_address, id_country) 

                            VALUES (   '".mysqli_real_escape_string($enlace,$_POST['hostel_city'])."'         ,
                                       '$hostel_country'     

                                    )";


            if (!mysqli_query($enlace,$query_d_hostel))  // si no logro ingresar la direccion...
            {
            $direcc_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc

            $errorZ="- Error Hostel Address. ";

            mysqli_close($enlace); 
            }




            else {    // procedo a almacenar la data del hostel
                      

      $direcc_id_hostel = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado direcc hostel.

      $hostel_ranking = '1';

           
            $query_p_hostel = "INSERT INTO z_data_hostel(ranking_hostel)   
            VALUES ('$hostel_ranking' )"; 

            
                        if (!mysqli_query($enlace,$query_p_hostel))      // si no ha logrado ingresar los datos del usuario
                        {
                        $datos_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de datos personales. 
                        $errorZ="- Error Hostel Data. ";

                        // secuencia que borra la direccion del usuario en caso de error

                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id_hostel' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Hostel Not-Clear!!! &nbsp ";}


                         mysqli_close($enlace); 
                        }



                 else {
                         $id_datos_hostel = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_datos_host...
            

                        $hostel_name = $_POST["hostel_name"];
                        
                        $hostel_code = $_POST['hostel_code'];
                                             

                        $query_host = "INSERT INTO z_hostel(name_hostel, code_hostel, id_address, id_data_hostel)   

                        VALUES ('$hostel_name', '$hostel_code', '$direcc_id_hostel', '$id_datos_hostel')"; 


                        if (!mysqli_query($enlace,$query_host))      // si no ha logrado ingresar los datos
                        {
                        $hostel_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de infor personal. 
                        $errorZ="- Error Hostel Info. ";


                       // secuencia que borra la direccion del usuario y los datos del usuario


                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id_hostel' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Hostel Not-Clear!!! &nbsp ";}


                                            $sqlBBB = "DELETE FROM z_data_hostel WHERE id_data_hostel = '$id_datos_hostel' "; 

                                            if (mysqli_query($enlace,$sqlBBB))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Data Hostel Clear!!! &nbsp ";
                                            $conteo_errorAr = "2";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Data Not-Clear!!! &nbsp ";}


                        }


                        else  {    // almaceno todos los datos del hostel, ahora voy con el usuario....
                  

        $id_del_hostel = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_del_host...


                           
    $city_per = '...'; 
    $country_per = '1';  



include("conectar.php");

            // proceso de insercion y creacion de la direccion del usuario

            $query_d = "INSERT INTO tb_address(city_address, id_country) 

                            VALUES (   '.'         ,
                                       '$country_per'                                      

                                    )";


            if (!mysqli_query($enlace,$query_d))  // si no logro ingresar la direccion...
            {
            $direcc_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc

            $errorZ="- Error Address Per. ";

            mysqli_close($enlace); 
            }



            else {    //  proceso de insercion y creacion de la data del usuario
                        


            $direcc_id_personal = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado direcc.
            

            $email_per =  mysqli_real_escape_string($enlace,$_POST['email_per']);
            $query_p = "INSERT INTO tb_data_personal(email_per)   

            VALUES ('$email_per')"; 

            
                        if (!mysqli_query($enlace,$query_p))      // si no ha logrado ingresar los datos del usuario
                        {
                        
                        $errorZ="- Error Data Per. ";

                        // secuencia que borra la direccion del usuario en caso de error

                                            $sqlAAAA = "DELETE FROM tb_address WHERE id_address = '$direcc_id_personal' "; 

                                            if (mysqli_query($enlace,$sqlAAAA))  // si no logro crear los datos del usuario borro la direccion.
                                            {                                      
                                            $errorZ.="- &nbsp; Reg Address User Clear!!! &nbsp ";
                                            $conteo_errorAr = "1";
                                            }
                                            else {$errorZ.="- &nbsp; Reg Address Not-Clear!!! &nbsp ";}


                         mysqli_close($enlace); 
                        }



                        else {  // ahora a registrar al personal como tal



$id_datos_per = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_datos_per...

                        
                        $nationality_per = '1';
                        
                        $hostel_rol_per = '1';
                            
                        
                       
                        $doc_per = mysqli_real_escape_string($enlace,$_POST['doc_per']);
                        $p_name_per = mysqli_real_escape_string($enlace,$_POST['p_name_per']);
                        $p_surname_per = mysqli_real_escape_string($enlace,$_POST['p_surname_per']);
                        $date_birth_per = $_POST["date_birth_per"];
                        $sex_per = $_POST["sex_per"];

                        $pass_per = mysqli_real_escape_string($enlace,$_POST['doc_per']);
                        
                       

                        $query_per = "INSERT INTO tb_personal(doc_per, p_name_per, p_surname_per,  
                        birth_per,  id_address, id_sex, id_nationality, password_per, id_rol_per, id_hostel, id_data_per)   

   VALUES ('$doc_per', '$p_name_per', '$p_surname_per', 
      '$date_birth_per', '$direcc_id_personal', '$sex_per', '$nationality_per', '$pass_per', '$hostel_rol_per',

       '$id_del_hostel', '$id_datos_per')"; 


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




                        else {     // almaceno quien registro al al usuario....

$id_del_personal = mysqli_insert_id($enlace); // almacena el id insertado en el query pasado id_datos_per...

        





          $pass= mysqli_real_escape_string($enlace,$_POST['doc_per']);  // almaceno el valor de clave limpio

              $passwordHasheada= md5(md5(mysqli_insert_id ($enlace)).$pass);

$query_pass = " UPDATE tb_personal SET password_per = '$passwordHasheada' WHERE id_per = ".mysqli_insert_id($enlace). " LIMIT 1 ";

           // he indicado que me haga un hash de un un hash del id concatenado con la clave insertada...       
                mysqli_query ($enlace, $query_pass);  // Ejecuta el query...









              $sql_pp_per = "UPDATE tb_personal SET per_registered_by = '$id_del_personal'

                                                WHERE id_per='$id_del_personal' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql_pp_per))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Who Registered User. ";
                                    mysqli_close($enlace);
                                  
                                    }

                            

                             else {     // almaceno quien registro al hostel....




              $sql_pp_hostel_who = "UPDATE z_hostel SET hostel_registered_by = '$id_del_personal'

                                                WHERE id_hostel='$id_del_hostel' LIMIT 1 ";

                       
                            if (!mysqli_query($enlace,$sql_pp_hostel_who))      // actualiza y si no ha logrado ingresar los datos
                                   {
                                    $errorZ="- Error Who Registered Hostel. ";
                                    mysqli_close($enlace);
                                  
                                    }

                             else{   // actualizo el pass



                     $exitoZ = " <b><i class=\"fa-solid fa-flag-checkered fa-2x\"></i></b><br><br>  

                     Your momentary password<br>is your identification <b>number.</b><br><br>

                                                       <b><a href=\"index.php\">Go Back</a></b>";  
                     mysqli_close($enlace); 








                                }



 }
            
                         }


                         }


                  }





                             }     // en esto almaceno lo relacionado con el usuario.


                  }



                  }



}







include ("a_header.php"); ?>











<body>



<main role="main" class="container">





<div class="form-row col-md-12 col-lg-12" <?php if ( $errorZ == '' && $exitoZ == '' ){?>style="display:none"<?php } ?> >   <!-- inicio bloque superior-->

    <div class="text-center col-md-12 col-lg-12 mb-2 mt-3">

<h3 class="text-dark"> INFO: </h3> 

     </div>


<div class="card mx-auto">
<div class="card-body">

<div class="form-row margencito"> 


 <div class="form-row">  <!-- datos principales del usuario inicial -->

                                <div class="col-md-12 col-lg-12 mb-2">

                              
               <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-12 col-lg-12 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-12 col-lg-12 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->




                                </div>

</div>



</div>   <!-- cierre margencito-->



</div>
</div>
</div>  <!-- cierre bloque superior-->
















<div class="form-row col-md-12 col-lg-12" <?php if ( $errorZ!= '' or $exitoZ != '' ){?>style="display:none"<?php } ?>  >   <!-- inicio bloque inferior-->

    <div class="text-center col-md-12 col-lg-12 mb-2 mt-3">

<h3 class="text-dark"> Register Basic Information: </h3> 

     </div>


<div class="card mx-auto">
<div class="card-body">




<div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales del usuario inicial -->

                                <div class="col-md-12 ml-1 mb-2">

                                <b class="text-info"> Your Info: </b>            

                                </div>

                            </div>

</div>   <!-- cierre margencito-->


<form  method="POST" data-persist="garlic"  data-expires="360" enctype="multipart/form-data"  name="add_user_and_hostel">

                          <div class="form-row margencito"> 






                            <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-5 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-id-card fa-lg"></i></span>  
                                        </div>
            <input type="text" maxlength="12" class="form-control importantex" id="doc_per" name="doc_per" 
            placeholder="Doc / Id N° &nbsp;&nbsp;(It's the momentary pass)"
             aria-label="doc_per" aria-describedby="basic-addon1" required>




                              </div>


                             

                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pencil fa-lg"></i></span>  
                                        </div>
   <input type="text" maxlength="19" class="form-control importantex" id="p_name_per" name="p_name_per" placeholder="First Name" aria-label="p_name_per" aria-describedby="basic-addon1" required>




                              </div>

                            

                             <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-fancy fa-lg"></i></span>  
                                        </div>
<input type="text" maxlength="19" class="form-control importantex" id="p_surname_per" name="p_surname_per" placeholder="Surname" aria-label="p_surname_per" aria-describedby="basic-addon1" required>




                              </div>



                             


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-5 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles fa-lg"></i></span>  
                                        </div>
                                            <input type="date"  class="form-control importantex" id="date_birth_per" name="date_birth_per"  aria-label="date_birth_per" aria-describedby="basic-addon1" required> 
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars-and-venus-burst fa-lg"></i></span>  
                                        </div>


                                        <select class="form-control importantex" id="sex_per" name="sex_per" required>
                                                        
                                                        <option selected disabled value="">Gender:</option>
                                                        <option disabled></option>


<?php

include("conectar.php"); 

    $sex_A = "SELECT * FROM sex  WHERE  name_sex != '.' ORDER BY name_sex ASC";
    $datos_sex_A = mysqli_query($enlace, $sex_A) or die(mysqli_error());
    $row_datos_sex_A = mysqli_fetch_assoc($datos_sex_A);

mysqli_close($enlace); 

?>

                                <?php do{?>                                

<option value="<?php echo $row_datos_sex_A['id_sex']; ?>"><?php echo $row_datos_sex_A['name_sex']; ?></option>

                                <?php } while ($row_datos_sex_A = mysqli_fetch_assoc($datos_sex_A)); ?> 





                                        </select>
  
                              </div>  





                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at fa-lg"></i></span>   
                                        </div>
                                            <input type="email" maxlength="39" class="form-control importantex" id="email_per" name="email_per" placeholder="Email" aria-label="email_per" aria-describedby="basic-addon1" required>    
                              </div> 





                          

</div> <!-- cierre margencito -->








<div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales del hostel inicial -->

                                <div class="col-md-12 mt-5 mb-2">

                                <b class="text-info"> Hostel Info: </b>            

                                </div>

                            </div>

</div>   <!-- cierre margencito-->






 <div class="form-row margencito"> 



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-5 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="49" class="form-control importantex" id="hostel_name" name="hostel_name" placeholder="Name" aria-label="hostel_name" aria-describedby="basic-addon1" required>
                              </div>



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-barcode fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control importantex" id="hostel_code" name="hostel_code" placeholder="Hostel Code" aria-label="hostel_code" aria-describedby="basic-addon1" required>   
                              </div>





                               <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tree-city fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control importantex" id="hostel_city" name="hostel_city" placeholder="City where is located." aria-label="hostel_city" aria-describedby="basic-addon1" required>    
                              </div>  





</div> <!-- cierre margencito -->







 <div class="form-row margencito"> 

                        <div class="col-sm-12 col-md-12 col-lg-12 mt-4 mb-2">

                        <button type="submit" name="add_user_and_hostel" class="btn btn-sm btn-info btn-block" id='add_user_and_hostel'>
                        <i class="fa-regular fa-floppy-disk fa-2x"></i></button>   
                    
                        </div>

</div> <!-- cierre margencito -->



 </form>












</div>
</div>
</div>  <!-- cierre bloque inferior-->




























<?php include ("f_footer_alt.php"); ?>
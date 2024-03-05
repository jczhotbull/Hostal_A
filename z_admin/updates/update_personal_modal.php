
<!-- ini modal editar -->

<div class="modal fade" id="modificar<?php echo $row_usuarios['id_per']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">
        <i class="fa-regular fa-pen-to-square fa-lg"></i> </h5> 

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post">
      <div class="modal-body">


  <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Info: </b>            
                  
                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->





<div class="form-row margencito"> 


                            <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-id-card fa-lg"></i></span>  
                                        </div>
         <input type="text" maxlength="12" class="form-control importantex" id="doc_per_mod" name="doc_per_mod" 
         value="<?php echo $row_usuarios['doc_per']; ?>" aria-label="doc_per_mod" aria-describedby="basic-addon1" required>    
                              </div> 


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-passport fa-lg"></i></span>  
                                        </div>
     <input type="text" maxlength="29" class="form-control " id="passport_per_mod" name="passport_per_mod" 
     value="<?php echo $row_usuarios['passport_per']; ?>" aria-label="passport_per_mod" aria-describedby="basic-addon1" >   
                              </div>


                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pencil fa-lg"></i>
                                            &nbsp;- First Name:</span>  
                                        </div>
   <input type="text" maxlength="19" class="form-control importantex" id="p_name_per_mod" name="p_name_per_mod" 
   value="<?php echo $row_usuarios['p_name_per']; ?>" aria-label="p_name_per_mod" aria-describedby="basic-addon1" required>   
                              </div>



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-marker fa-lg"></i>&nbsp;- Middle Name:</span>  
                                        </div>
<input type="text" maxlength="19" class="form-control" id="s_name_per_mod" name="s_name_per_mod" 
value="<?php echo $row_usuarios['s_name_per']; ?>" aria-label="s_name_per_mod" aria-describedby="basic-addon1" >
                              </div>




                             <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-fancy fa-lg"></i>
                                            &nbsp;- Surname:</span>  
                                        </div>
<input type="text" maxlength="19" class="form-control importantex" id="p_surname_per_mod" name="p_surname_per_mod" value="<?php echo $row_usuarios['p_surname_per']; ?>" aria-label="p_surname_per_mod" aria-describedby="basic-addon1" required>
                              </div>



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-clip fa-lg"></i>
                                            &nbsp;- Last Name:</span>  
                                        </div>
<input type="text" maxlength="19" class="form-control" id="s_surname_per_mod" name="s_surname_per_mod" 
value="<?php echo $row_usuarios['s_surname_per']; ?>" aria-label="s_surname_per_mod" aria-describedby="basic-addon1" >
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles fa-lg"></i></span>  
                                        </div>
<input type="date"  class="form-control importantex" id="date_birth_per_mod" name="date_birth_per_mod"  aria-label="date_birth_per_mod" aria-describedby="basic-addon1" value="<?php echo $row_usuarios['birth_per']; ?>" required> 
                              </div>



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars-and-venus-burst fa-lg"></i></span>  
                                        </div>


        <select class="form-control importantex" id="sex_per_mod" name="sex_per_mod" required>

    <option selected value="<?php echo $row_usuarios['id_sex']; ?>"><?php echo $row_usuarios['name_sex']; ?></option>
                   <option style="background-color: #00000;" disabled></option>                             
                           

<?php

include("../conectar.php"); 

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
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-flag fa-lg"></i></span>  
                                        </div>


              <select class="form-control importantex" id="nationality_per_mod" name="nationality_per_mod" required>
                                                        
    <option selected value="<?php echo $row_usuarios['id_nationality']; ?>"><?php echo $row_usuarios['name_nationality']; ?></option>
                   <option style="background-color: #00000;" disabled></option>                             
                           

<?php

include("../conectar.php"); 

    $nationality_A = "SELECT * FROM nationality  WHERE  name_nationality != '.' ORDER BY name_nationality ASC";
    $datos_nationality_A = mysqli_query($enlace, $nationality_A) or die(mysqli_error());
    $row_datos_nationality_A = mysqli_fetch_assoc($datos_nationality_A);

mysqli_close($enlace); 

?>

                                <?php do{?>                                

<option value="<?php echo $row_datos_nationality_A['id_nationality']; ?>"><?php echo $row_datos_nationality_A['name_nationality']; ?></option>

                                <?php } while ($row_datos_nationality_A = mysqli_fetch_assoc($datos_nationality_A)); ?> 


                            

                           
                                        </select>

                              </div> 




                              




   <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-clipboard-user fa-lg"></i></span>  
                                        </div>


               <select class="form-control importantex" id="hostel_rol_per_mod" name="hostel_rol_per_mod" required>
                                                        
<option selected value="<?php echo $row_usuarios['id_rol_per']; ?>"><?php echo $row_usuarios['name_rol']; ?></option>
                   <option style="background-color: #00000;" disabled></option>                             
                           

<?php

include("../conectar.php"); 

    $rol_A = "SELECT * FROM roles  WHERE  name_rol != '.' ORDER BY name_rol ASC";
    $datos_rol_A = mysqli_query($enlace, $rol_A) or die(mysqli_error());
    $row_datos_rol_A = mysqli_fetch_assoc($datos_rol_A);

mysqli_close($enlace); 

?>

                                <?php do{?>                                

<option value="<?php echo $row_datos_rol_A['id_rol_per']; ?>"><?php echo $row_datos_rol_A['name_rol']; ?></option>

                                <?php } while ($row_datos_rol_A = mysqli_fetch_assoc($datos_rol_A)); ?> 


                               
                           
                                        </select>

                                          
                              </div>  




                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-clock fa-lg"></i>&nbsp;- Work for:</span>  
                                        </div>

       <select class="form-control importantex" id="work_for_per_mod" name="work_for_per_mod" required>
        

<?php

include("../conectar.php"); 

$id_del_host_idU = ($row_usuarios['id_hostel']);


    $hostel_elegido = "SELECT * FROM z_hostel  WHERE  id_hostel = '$id_del_host_idU' limit 1";
    $datos_hostel_elegido = mysqli_query($enlace, $hostel_elegido) or die(mysqli_error());
    $row_datos_hostel_elegido = mysqli_fetch_assoc($datos_hostel_elegido);


$id_name_host_idU = ($row_datos_hostel_elegido['name_hostel']);


mysqli_close($enlace); 

?>


<option selected value="<?php echo $row_usuarios['id_hostel']; ?>"><?php echo $id_name_host_idU; ?></option>
                   <option style="background-color: #00000;" disabled></option>                             
                           

<?php

include("../conectar.php"); 

    $hostel_A = "SELECT * FROM z_hostel  WHERE  name_hostel != '.' ORDER BY name_hostel ASC";
    $datos_hostel_A = mysqli_query($enlace, $hostel_A) or die(mysqli_error());
    $row_datos_hostel_A = mysqli_fetch_assoc($datos_hostel_A);

mysqli_close($enlace); 

?>

                                <?php do{?>                                

<option value="<?php echo $row_datos_hostel_A['id_hostel']; ?>"><?php echo $row_datos_hostel_A['name_hostel']; ?></option>

                                <?php } while ($row_datos_hostel_A = mysqli_fetch_assoc($datos_hostel_A)); ?> 


                              


                           
                                        </select>

 
                              </div>  

</div> <!-- cierre margencito -->






<div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos segundarios -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Data: </b>  

                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->


                          <div class="form-row margencito"> 







                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen-button fa-lg"></i></span>  
                                        </div>
       <input type="text" maxlength="39" class="form-control" id="a_phone_per_mod" name="a_phone_per_mod" value="<?php echo $row_usuarios['a_phone_per']; ?>" aria-label="a_phone_per_mod" aria-describedby="basic-addon1">    
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen fa-lg"></i></span>  
                                        </div>
 <input type="text" maxlength="39" class="form-control" id="b_phone_per_mod" name="b_phone_per_mod" value="<?php echo $row_usuarios['b_phone_per']; ?>" aria-label="b_phone_per_mod" aria-describedby="basic-addon1">    
                              </div>






                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at fa-lg"></i></span>   
                                        </div>
      <input type="email" maxlength="39" class="form-control importantex" id="email_per_mod" name="email_per_mod" value="<?php echo $row_usuarios['email_per']; ?>" aria-label="email_per_mod" aria-describedby="basic-addon1" required>    
                              </div> 


                              


</div> <!-- cierre margencito -->











<div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos segundarios -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Address: </b>  

                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->








                          <div class="form-row margencito"> 
                             




                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tree-city fa-lg"></i>
                                            &nbsp;- City where you live:</span>  
                                        </div>
         <input type="text" maxlength="19" class="form-control" id="city_per_mod" name="city_per_mod" value="<?php echo $row_usuarios['city_address']; ?>" aria-label="city_per_mod" aria-describedby="basic-addon1">    
                              </div>  





                             <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-earth-americas fa-lg"></i></span>  
                                        </div>

                                        <select class="form-control importantex" id="country_per_mod" name="country_per_mod" required>


<?php

include("../conectar.php"); 

$id_del_country = ($row_usuarios['id_country']);


    $country_elegido = "SELECT * FROM country  WHERE  id_country = '$id_del_country' limit 1";
    $datos_country_elegido = mysqli_query($enlace, $country_elegido) or die(mysqli_error());
    $row_datos_country_elegido = mysqli_fetch_assoc($datos_country_elegido);


$id_name_country_idU = ($row_datos_country_elegido['name_country']);


mysqli_close($enlace); 

?>



<option selected value="<?php echo $row_usuarios['id_country']; ?>"><?php echo $id_name_country_idU; ?></option>
                   <option style="background-color: #00000;" disabled></option>                             
                           

<?php

include("../conectar.php"); 

    $country_A = "SELECT * FROM country  WHERE  name_country != '.' ORDER BY name_country ASC";
    $datos_country_A = mysqli_query($enlace, $country_A) or die(mysqli_error());
    $row_datos_country_A = mysqli_fetch_assoc($datos_country_A);

mysqli_close($enlace); 

?>

                                <?php do{?>                                

<option value="<?php echo $row_datos_country_A['id_country']; ?>"><?php echo $row_datos_country_A['name_country']; ?></option>

                                <?php } while ($row_datos_country_A = mysqli_fetch_assoc($datos_country_A)); ?> 

                              

                       
                                        </select>
   
                              </div>  




                            <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-2 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot fa-lg"></i>&nbsp;- Zip:</span>  
                                        </div>
     <input type="number" maxlength="10" class="form-control" id="post_code_per_mod" name="post_code_per_mod" 
     value="<?php echo $row_usuarios['post_code_address']; ?>" aria-label="post_code_per_mod" aria-describedby="basic-addon1">   
                              </div> 




                           <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-signs-post fa-lg"></i>
                                            </span>  
                                        </div>
    <input type="text" maxlength="109" class="form-control" id="address_per_mod" name="address_per_mod" 
    value="<?php echo $row_usuarios['name_address']; ?>" aria-label="address_per_mod" aria-describedby="basic-addon1">    
                           </div>  


  

                            </div>





      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editar_personal" class="btn btn-info" value="<?php echo $row_usuarios['id_per']; ?>">
              <i class="fa-solid fa-upload fa-lg"></i></button>   

      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
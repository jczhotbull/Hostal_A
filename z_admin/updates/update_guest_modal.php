
<!-- ini modal editar -->

<div class="modal fade" id="modificar<?php echo $row_usuarios['id_guests']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
         <input type="text" maxlength="29" class="form-control importantex" id="doc_g_mod" name="doc_g_mod" 
         value="<?php echo $row_usuarios['guests_doc_id']; ?>" aria-label="doc_g_mod" aria-describedby="basic-addon1" required>    
                              </div> 


                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pencil fa-lg"></i>
                                            &nbsp;- First Name:</span>  
                                        </div>
   <input type="text" maxlength="19" class="form-control importantex" id="p_name_g_mod" name="p_name_g_mod" 
   value="<?php echo $row_usuarios['p_name_g']; ?>" aria-label="p_name_g_mod" aria-describedby="basic-addon1" required>   
                              </div>



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-marker fa-lg"></i>&nbsp;- Middle Name:</span>  
                                        </div>
<input type="text" maxlength="19" class="form-control" id="s_name_g_mod" name="s_name_g_mod" 
value="<?php echo $row_usuarios['s_name_g']; ?>" aria-label="s_name_g_mod" aria-describedby="basic-addon1" >
                              </div>



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-fancy fa-lg"></i>
                                            &nbsp;- Surname:</span>  
                                        </div>
<input type="text" maxlength="19" class="form-control importantex" id="p_surname_g_mod" name="p_surname_g_mod" value="<?php echo $row_usuarios['p_surname_g']; ?>" aria-label="p_surname_g_mod" aria-describedby="basic-addon1" required>
                              </div>



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">  
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-pen-clip fa-lg"></i>
                                            &nbsp;- Last Name:</span>  
                                        </div>
<input type="text" maxlength="19" class="form-control" id="s_surname_g_mod" name="s_surname_g_mod" 
value="<?php echo $row_usuarios['s_surname_g']; ?>" aria-label="s_surname_g_mod" aria-describedby="basic-addon1" >
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-cake-candles fa-lg"></i></span>  
                                        </div>
<input type="date"  class="form-control importantex" id="date_birth_g_mod" name="date_birth_g_mod"  aria-label="date_birth_g_mod" aria-describedby="basic-addon1" value="<?php echo $row_usuarios['guests_birth']; ?>" required> 
                              </div>




                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars-and-venus-burst fa-lg"></i></span>  
                                        </div>

        <select class="form-control importantex" id="sex_g_mod" name="sex_g_mod" required>

    <option selected value="<?php
    
   $id_salvado = $row_usuarios['guests_sex'];
   $name_salvado = $row_usuarios['name_sex'];

   $se_puede_selec = '';
    
  if ($id_salvado == '3') {
    $se_puede_selec = 'disabled';
    $name_salvado = 'Gender:' ;
    $id_salvado = '';
  }
    
    echo $id_salvado; ?>"  <?php echo $se_puede_selec; ?> ><?php echo $name_salvado; ?></option>










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

              <select class="form-control importantex" id="nationality_g_mod" name="nationality_g_mod" required>
                                                        
    <option selected value="<?php echo $row_usuarios['id_nation_g']; ?>"><?php echo $row_usuarios['name_nationality']; ?></option>
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

</div>   <!-- cierre margencito-->





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
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen-button fa-lg"></i>
                                            &nbsp;- Phone:</span>  
                                        </div>
       <input type="text" maxlength="39" class="form-control" id="a_phone_g_mod" name="a_phone_g_mod" value="<?php echo $row_usuarios['guests_phone']; ?>" aria-label="a_phone_g_mod" aria-describedby="basic-addon1">    

    </div>



    <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at fa-lg"></i></span>   
                                        </div>
      <input type="email" maxlength="39" class="form-control importantex" id="email_g_mod" name="email_g_mod" value="<?php echo $row_usuarios['guests_email']; ?>" aria-label="email_g_mod" aria-describedby="basic-addon1" required>    
                              </div> 


                       

                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-comments fa-lg"></i>&nbsp;- Obs:</span>  
                                        </div>
     <input type="text"  maxlength="199" class="form-control" id="obs_g_mod" name="obs_g_mod" 
     value="<?php echo $row_usuarios['guests_observ']; ?>" aria-label="obs_g_mod" aria-describedby="basic-addon1">   
                              </div> 






</div>   <!-- cierre margencito-->


<input name="id_data_del_g" type="hidden" value="<?php echo $row_usuarios['id_data_guests']; ?>">




      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editar_guests" class="btn btn-info" value="<?php echo $row_usuarios['id_guests']; ?>">
              <i class="fa-solid fa-upload fa-lg"></i></button>   

      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
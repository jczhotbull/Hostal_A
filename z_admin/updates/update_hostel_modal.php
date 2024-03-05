
<!-- ini modal editar -->

<div class="modal fade" id="modificar<?php echo $row_hostels['id_hostel']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-signature fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="49" class="form-control importantex" id="hostel_name_mod" name="hostel_name_mod" value="<?php echo $row_hostels['name_hostel']; ?>" aria-label="hostel_name_mod" aria-describedby="basic-addon1" required>
                              </div>



                              <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-file-pen fa-lg"></i>  &nbsp;- Nick:</span>  
                                        </div>
                    <input type="text" maxlength="10" class="form-control" id="nick_name_mod" name="nick_name_mod" value="<?php echo $row_hostels['nick_name_hostel']; ?>" aria-label="nick_name_mod" aria-describedby="basic-addon1" >
                              </div>  



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-barcode fa-lg"></i>
                                            &nbsp;- Code:</span>  
                                        </div>
 <input type="text" maxlength="19" class="form-control importantex" id="hostel_code_mod" name="hostel_code_mod" value="<?php echo $row_hostels['code_hostel']; ?>" aria-label="hostel_code_mod" aria-describedby="basic-addon1" required>  
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
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="a_phone_mod" name="a_phone_mod" value="<?php echo $row_hostels['a_phone_hostel']; ?>" aria-label="a_phone_mod" aria-describedby="basic-addon1">  
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-retro fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="b_phone_mod" name="b_phone_mod" value="<?php echo $row_hostels['b_phone_hostel']; ?>" aria-label="b_phone_mod" aria-describedby="basic-addon1">  
                              </div> 



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mobile-screen fa-lg"></i></span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="c_phone_mod" name="c_phone_mod" value="<?php echo $row_hostels['c_phone_hostel']; ?>" aria-label="c_phone_mod" aria-describedby="basic-addon1">    
                              </div>


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-chrome fa-lg"></i></span>  
                                        </div>
<input type="text" maxlength="39" class="form-control" id="a_web_mod" name="a_web_mod" value="<?php echo $row_hostels['a_web_hostel']; ?>" aria-label="a_web_mod" aria-describedby="basic-addon1">    
                              </div> 


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-edge fa-lg"></i></span>  
                                        </div>
<input type="text" maxlength="39" class="form-control" id="b_web_mod" name="b_web_mod" value="<?php echo $row_hostels['b_web_hostel']; ?>" aria-label="b_web_mod" aria-describedby="basic-addon1">    
                              </div> 



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-at fa-lg"></i></span>   
                                        </div>
                    <input type="email" maxlength="39" class="form-control" id="main_email_mod" name="main_email_mod" value="<?php echo $row_hostels['a_email_hostel']; ?>" aria-label="main_email_mod" aria-describedby="basic-addon1">    
                              </div> 


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-inbox fa-lg"></i></span>  
                                        </div>
                    <input type="email" maxlength="39" class="form-control" id="reserv_email_mod" name="reserv_email_mod" value="<?php echo $row_hostels['b_email_hostel']; ?>" aria-label="reserv_email_mod" aria-describedby="basic-addon1">    
                              </div> 


                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope-circle-check fa-lg"></i></span>  
                                        </div>
                    <input type="email" maxlength="39" class="form-control" id="bill_email_mod" name="bill_email_mod" value="<?php echo $row_hostels['c_email_hostel']; ?>" aria-label="bill_email_mod" aria-describedby="basic-addon1">   
                              </div> 



                               <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-fingerprint fa-lg"></i>&nbsp;- Hostel ID:</span>  
                                        </div>
                                            <input type="text" maxlength="19" class="form-control" id="a_number_mod" name="a_number_mod" value="<?php echo $row_hostels['reg_number_hostel']; ?>" aria-label="a_number_mod" aria-describedby="basic-addon1">  
                              </div> 



                               <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-6 mb-2">
                              <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-ranking-star fa-lg"></i> &nbsp;- Ranking:</span>   
                                        </div>
                                            <input type="text" maxlength="8" class="form-control" id="b_number_mod" name="b_number_mod" value="<?php echo $row_hostels['ranking_hostel']; ?>" aria-label="b_number_mod" aria-describedby="basic-addon1">    
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






                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-tree-city fa-lg"></i>
                                            &nbsp;- City:</span>  
                                        </div>
<input type="text" maxlength="19" class="form-control importantex" id="hostel_city_mod" name="hostel_city_mod" value="<?php echo $row_hostels['city_address']; ?>" aria-label="hostel_city_mod" aria-describedby="basic-addon1" required>    
                              </div>  



                             <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-earth-americas fa-lg"></i></span>  
                                        </div>

                                         <select class="form-control importantex" id="hostel_country_mod" name="hostel_country_mod" required>
                                                        
   <option selected value="<?php echo $row_hostels['id_country']; ?>"><?php echo $row_hostels['name_country']; ?></option>
                   <option style="background-color: #00000;" disabled></option>

<?php

include("../conectar.php"); 

    $countrys_A = "SELECT * FROM country  WHERE  name_country != '.' ORDER BY name_country ASC";
    $datos_countrys_A = mysqli_query($enlace, $countrys_A) or die(mysqli_error());
    $row_datos_countrys_A = mysqli_fetch_assoc($datos_countrys_A);

mysqli_close($enlace); 

?>

                                <?php do{?>                                

<option value="<?php echo $row_datos_countrys_A['id_country']; ?>"><?php echo $row_datos_countrys_A['name_country']; ?></option>

                                <?php } while ($row_datos_countrys_A = mysqli_fetch_assoc($datos_countrys_A)); ?> 
                           
                                        </select>
                                </div>  






                            <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-4 mb-2">
                              <div class="input-group-prepend">
                   <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-location-dot fa-lg"></i>
                   &nbsp;- Zip:</span>  
                                        </div>
<input type="number" maxlength="10" class="form-control" id="post_code_mod" name="post_code_mod" value="<?php echo $row_hostels['post_code_address']; ?>" aria-label="post_code_mod" aria-describedby="basic-addon1">   
                              </div> 




                           <div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2">
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-signs-post fa-lg"></i></span>  
                                        </div>
<input type="text" maxlength="109" class="form-control" id="hostel_address_mod" name="hostel_address_mod" value="<?php echo $row_hostels['name_address']; ?>" aria-label="hostel_address_mod" aria-describedby="basic-addon1">    
                           </div>  



                            </div>






      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editar_hostel" class="btn btn-info" value="<?php echo $row_hostels['id_hostel']; ?>">
              <i class="fa-solid fa-upload fa-lg"></i></button>   

      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
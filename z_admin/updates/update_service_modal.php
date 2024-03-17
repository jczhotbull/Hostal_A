
<!-- ini modal editar -->

<div class="modal fade" id="modificar<?php echo $row_services_reveal['id_services']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header"> 
        <h5 class="modal-title text-info" id="exampleModalLabel">
        <i class="fa-solid fa-store fa-lg"></i> </h5>  

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
      </div>

      <form method="post">
      <div class="modal-body">




<div class="form-row margencito"> 



<div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-swatchbook fa-lg"></i></span>  
                                        </div> 
<select class="form-control importantex" id="type_product_mod" name="type_product_mod" required>
                                                        
<option selected value="<?php echo $row_services_reveal['id_product_kind']; ?>">
<?php echo $row_services_reveal['name_product_kind']; ?></option>
<option style="background-color: #00000;" disabled></option>

<?php
include("../conectar.php");
$query_product_kind = "SELECT * FROM product_kind ORDER BY name_product_kind ASC";
$datos_product_kind = mysqli_query($enlace, $query_product_kind) or die(mysqli_error());
$row_datos_product_kind = mysqli_fetch_assoc($datos_product_kind);
mysqli_close($enlace);
?>                               
 <?php do{?>                                
<option value="<?php echo $row_datos_product_kind['id_product_kind']; ?>"><?php echo $row_datos_product_kind['name_product_kind']; ?></option>
                                <?php } while ($row_datos_product_kind = mysqli_fetch_assoc($datos_product_kind)); ?> 
                                                       
                                        </select>  
</div>  






<div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-store fa-lg"></i></span>  
                                        </div> 
<select class="form-control importantex" id="product_name_mod" name="product_name_mod" required>
                                                        
<option selected value="<?php echo $row_services_reveal['id_producto']; ?>">
<?php echo $row_services_reveal['name_producto']; ?></option>
<option style="background-color: #00000;" disabled></option>

<?php
include("../conectar.php");
$query_product_dd = "SELECT * FROM productos ORDER BY name_producto ASC";
$datos_product_dd = mysqli_query($enlace, $query_product_dd) or die(mysqli_error());
$row_datos_product_dd = mysqli_fetch_assoc($datos_product_dd);
mysqli_close($enlace);
?>                               
 <?php do{?>                                
<option value="<?php echo $row_datos_product_dd['id_producto']; ?>"><?php echo $row_datos_product_dd['name_producto']; ?></option>
                                <?php } while ($row_datos_product_dd = mysqli_fetch_assoc($datos_product_dd)); ?> 
                                                       
                                        </select>  
</div>  



<div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-briefcase fa-lg"></i></span>  
                                        </div>  

                     <select class="form-control importantex" id="type_offer_mod" name="type_offer_mod" required>
                                                        
                     <option selected value="<?php echo $row_services_reveal['sale_kind']; ?>">
<?php 

if ($row_services_reveal['sale_kind']=="1") {
  $tipillo = "Sale";
}  else {$tipillo = "Rent"; }

echo $tipillo; ?></option>
<option style="background-color: #00000;" disabled></option>



                                   <option value="1">Sale</option>
                                   <option value="2">Rent</option> 
                             
                         
                                        </select>
  
                              </div>  










<input name="name_editado" type="hidden" value="<?php echo $row_services_reveal['name_producto']; ?>">





<div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2">  
<div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Characteristics:</span>  
</div>
<input type="text" maxlength="110" class="form-control" id="cha_mod" name="cha_mod"
 aria-label="cha_mod" aria-describedby="basic-addon1" value="<?php echo $row_services_reveal['service_charac']; ?>" >    
</div>




  

 </div>









      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
<button type="submit" name="editar_the_service" class="btn btn-info" value="<?php echo $row_services_reveal['id_services']; ?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button>   

      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
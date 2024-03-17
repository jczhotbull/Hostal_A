<div class="form-row margencito"  > 



<?php
include("../conectar.php");

$queryHost = "SELECT * FROM z_hostel where id_hostel = '$mi_hostel_select' LIMIT 1";
$datos_queryHost = mysqli_query($enlace, $queryHost) or die(mysqli_error());
$row_datos_queryHost = mysqli_fetch_array($datos_queryHost); 

$id_verificado_host = $row_datos_queryHost['id_hostel'];
$id_currency_del_host = $row_datos_queryHost['id_currency'];




$queryFHL_currencys_out = "SELECT * FROM exchange_rates
 where id_hostel = '$mi_hostel_select'
 order BY all_set_this_time DESC limit 1";

$the_currencys_out = mysqli_query($enlace, $queryFHL_currencys_out) or die(mysqli_error());
$row_the_currencys_out = mysqli_fetch_assoc($the_currencys_out);
$totalRows_the_currencys_out = mysqli_num_rows($the_currencys_out);


if ($totalRows_the_currencys_out >='1') {


  $pruebarrA = $row_the_currencys_out['currency_A_value'];
  $pruebarrB = $row_the_currencys_out['currency_B_value'];
  
  $la_fechita_es = $row_the_currencys_out['all_set_this_time'];
  
  $format_monetA = number_format("$pruebarrA",2,",",".");
  $format_monetB = number_format("$pruebarrB",2,",",".");
  
  
  }







mysqli_close($enlace);
     ?> 



<style type="text/css">
@font-face {
  font-family: DIGITAL-7;
  src: url(00_vendor/digital-7.ttf);
}

.lcd {background-color:#7D8C76;
color:#343434;
font-family: DIGITAL-7;
font-size: 24px;
text-align: center;
font-weight: 600;
letter-spacing: 3px;
}
</style>






<div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3" <?php if ( $totalRows_the_currencys_prim =='0' ){?>style="display:none"<?php } ?> > 

<button type="button" data-toggle="modal" data-target="#el_dinerillo" class="btn btn-dark btn-block">
 <i class="fa-solid fa-money-bill-trend-up fa-lg"></i>&nbsp;&nbsp;

<?php

if ($totalRows_the_currencys_prim >='1') {

$date = new DateTime($la_fechita_es); echo $date->format('d/m/y'); 

echo $date->format('g:i a');

}

else {

$alertin_set = 'Set New Rate'  ;    echo $alertin_set;

}

    ?>
                    
                   

</button>

</div>










<div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3" <?php if ( $totalRows_the_currencys_prim =='0' ){?>style="display:none"<?php } ?> >  

<?php
    
include ("../conectar.php");

$main_main = $row_the_currencys_out['id_hostel_currency'];

$queryFHL_currencys_main_mia = "SELECT * FROM currency where id_currency = '$main_main' limit 1";

$the_currencys_main_mia = mysqli_query($enlace, $queryFHL_currencys_main_mia) or die(mysqli_error());
$row_the_currencys_main_mia = mysqli_fetch_assoc($the_currencys_main_mia);
$totalRows_the_currencys_main_mia = mysqli_num_rows($the_currencys_main_mia);



$main_cheA = $row_the_currencys_out['id_currency_A'];

$queryFHL_currencys_mainAC = "SELECT * FROM currency where id_currency = '$main_cheA' limit 1";

$the_currencys_mainAC = mysqli_query($enlace, $queryFHL_currencys_mainAC) or die(mysqli_error());
$row_the_currencys_mainAC = mysqli_fetch_assoc($the_currencys_mainAC);
$totalRows_the_currencys_mainAC = mysqli_num_rows($the_currencys_mainAC);




$main_cheB = $row_the_currencys_out['id_currency_B'];

$queryFHL_currencys_mainBC = "SELECT * FROM currency where id_currency = '$main_cheB' limit 1";

$the_currencys_mainBC = mysqli_query($enlace, $queryFHL_currencys_mainBC) or die(mysqli_error());
$row_the_currencys_mainBC = mysqli_fetch_assoc($the_currencys_mainBC);
$totalRows_the_currencys_mainBC = mysqli_num_rows($the_currencys_mainBC);



mysqli_close($enlace); 
 ?>






  <div class="lcd" style="border: 1px solid #7D8C76; border-radius: 4px; ">
  1 <?php echo $row_the_currencys_mainAC['symbol_currency']; ?> =
  <?php echo $format_monetA; ?> <?php echo $row_the_currencys_main_mia['symbol_currency']; ?></div>

</div>






<div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3" <?php if ( $totalRows_the_currencys_prim =='0' ){?>style="display:none"<?php } ?> >  

  <div class="lcd" style="border: 1px solid #7D8C76; border-radius: 4px; ">
  1 <?php echo $row_the_currencys_mainBC['symbol_currency']; ?> =
  <?php echo $format_monetB; ?> <?php echo $row_the_currencys_main_mia['symbol_currency']; ?></div>

</div>





</div> <!-- cierre margencito primario -->





<!-- ini modal--> 
<div class="modal fade" id="el_dinerillo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

     
      <div class="modal-body">





<?php

include ("../conectar.php");

$queryFHL_currencys = "SELECT * FROM exchange_rates
 where id_hostel = '$mi_hostel_select'
 order BY all_set_this_time DESC limit 4";

$the_currencys = mysqli_query($enlace, $queryFHL_currencys) or die(mysqli_error());
$row_the_currencys = mysqli_fetch_assoc($the_currencys);
$totalRows_the_currencys = mysqli_num_rows($the_currencys);

mysqli_close($enlace);


?>


<div class="form-row margencito" <?php if ( $totalRows_the_currencys =='0' ){?>style="display:none"<?php } ?>  > 

<h5>Historical:</h5>

<table class="table table-bordered" style=" overflow: hidden;" >
  <thead>
    <tr>
      <th class="align-middle" align="center">Date</th>
      <th class="align-middle" align="center">Selected</th>

      <th class="align-middle text-success" align="center">Extra</th>

      <th class="align-middle text-info" align="center" >Addi.</th>

      <th class="align-middle" align="center"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th>

    </tr>
  </thead>

  <tbody>

  <?php  do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->

    <tr>

     <td class="align-middle" align="center"><?php echo $row_the_currencys['all_set_this_time']; ?></td>

     <td class="align-middle" align="center">
     
     <?php
    
include ("../conectar.php");



$queryFHL_currencys_idd = "SELECT * FROM z_hostel
 where id_hostel = '$mi_hostel_select'
 limit 1";

$the_currencys_idd = mysqli_query($enlace, $queryFHL_currencys_idd) or die(mysqli_error());
$row_the_currencys_idd = mysqli_fetch_assoc($the_currencys_idd);
$totalRows_the_currencys_idd = mysqli_num_rows($the_currencys_idd);




$main_c = $row_the_currencys_idd['id_currency'];




$queryFHL_currencys_main = "SELECT * FROM currency where id_currency = '$main_c'
limit 1";

$the_currencys_main = mysqli_query($enlace, $queryFHL_currencys_main) or die(mysqli_error());
$row_the_currencys_main = mysqli_fetch_assoc($the_currencys_main);
$totalRows_the_currencys_main = mysqli_num_rows($the_currencys_main);

mysqli_close($enlace); 
     
     echo $row_the_currencys_main['name_currency']; ?> <br>
  <b>1.00<br><?php echo $row_the_currencys_main['symbol_currency']; ?></b>   </td> 






      <td class="align-middle text-success" align="center">
        
      <?php
    
    include ("../conectar.php");
    
    $smain_c = $row_the_currencys['id_currency_A'];
    
    $queryFHL_currencys_smain = "SELECT * FROM currency where id_currency = '$smain_c'
    limit 1";
    
    $the_currencys_smain = mysqli_query($enlace, $queryFHL_currencys_smain) or die(mysqli_error());
    $row_the_currencys_smain = mysqli_fetch_assoc($the_currencys_smain);
    $totalRows_the_currencys_smain = mysqli_num_rows($the_currencys_smain);
    
    mysqli_close($enlace); 
         
         echo $row_the_currencys_smain['name_currency']; ?><br>
         <b><?php echo $row_the_currencys['currency_A_value']; ?><br>
        <?php echo $row_the_currencys_smain['symbol_currency']; ?></b>  
</td>

      

      <td class="align-middle text-info" align="center" >
      
      <?php
    
    include ("../conectar.php");
    
    $emain_c = $row_the_currencys['id_currency_B'];
    
    $queryFHL_currencys_emain = "SELECT * FROM currency where id_currency = '$emain_c'
    limit 1";
    
    $the_currencys_emain = mysqli_query($enlace, $queryFHL_currencys_emain) or die(mysqli_error());
    $row_the_currencys_emain = mysqli_fetch_assoc($the_currencys_emain);
    $totalRows_the_currencys_emain = mysqli_num_rows($the_currencys_emain);
    
    mysqli_close($enlace); 
         
         echo $row_the_currencys_emain['name_currency']; ?><br>
         <b><?php echo $row_the_currencys['currency_B_value']; ?><br>
        <?php echo $row_the_currencys_emain['symbol_currency']; ?></b>        
</td>



      





      <td>

      <form method="post">

      <input name="id_a_exterminar" type="hidden" value="<?php echo $row_the_currencys['id_exchange_rates']; ?>">

      <button type="submit" name="eliminar_dinerillo" class="btn btn-outline-danger btn-sm mb-1"">
                  <i class="far fa-trash-alt"></i></button>
      </form>    

      </td>



    </tr>


    <?php  } while ($row_the_currencys = mysqli_fetch_assoc($the_currencys)); ?>


  </tbody>
</table>


</div> <!-- cierre margencito -->




<h5 class="mt-4">Set New Exchange Rate:</h5>

<form method="post" >     <!-- para cuando ay algo en la tabla --> 

<div class="form-row margencito"  > 



<div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
     <div class="input-group-prepend"> 
     <span class="input-group-text alert-success" id="basic-addon1">Extra</span>  
     </div>
     <select class="form-control " id="extra_currency" name="extra_currency" >

<option selected value="<?php echo $row_the_currencys_mainAC['id_currency']; ?>" >
   <?php echo $row_the_currencys_mainAC['name_currency']; ?>&nbsp;&nbsp;"<b>
    <?php echo $row_the_currencys_mainAC['symbol_currency']; ?></b>"</option>
<option style="background-color: #00000;" disabled></option>



<?php
include("../conectar.php"); 
    $currency_Alt = "SELECT * FROM currency  WHERE  name_currency != '.' ORDER BY name_currency ASC";
    $datos_currency_Alt = mysqli_query($enlace, $currency_Alt) or die(mysqli_error());
    $row_datos_currency_Alt = mysqli_fetch_assoc($datos_currency_Alt);

mysqli_close($enlace); ?>

 <?php do{?>                                

<option value="<?php echo $row_datos_currency_Alt['id_currency']; ?>">
<?php echo $row_datos_currency_Alt['name_currency']; ?>&nbsp;&nbsp;"<b>
  <?php echo $row_datos_currency_Alt['symbol_currency']; ?></b>"</option>

 <?php } while ($row_datos_currency_Alt = mysqli_fetch_assoc($datos_currency_Alt)); ?> 
                           
</select>
</div> 


<div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
<div class="input-group-prepend">
  <span class="input-group-text alert-success" id="basic-addon1">
    Value:</span>  
</div>
<input type="number"  placeholder="0.00" step="0.01" maxlength="19" min="0.00" class="form-control"
 id="extra_value" name="extra_value"
 aria-label="extra_value" aria-describedby="basic-addon1" required>  
</div>








<div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
     <div class="input-group-prepend"> 
     <span class="input-group-text alert-info" id="basic-addon1">Additional</span>  
     </div>
     <select class="form-control " id="additional_currency" name="additional_currency" >

<option selected value="<?php echo $row_the_currencys_mainBC['id_currency']; ?>">
   <?php echo $row_the_currencys_mainBC['name_currency']; ?>&nbsp;&nbsp;"<b>
    <?php echo $row_the_currencys_mainBC['symbol_currency']; ?></b>"</option>
<option style="background-color: #00000;" disabled></option>



<?php
include("../conectar.php"); 
    $currency_Alty = "SELECT * FROM currency  WHERE  name_currency != '.' ORDER BY name_currency ASC";
    $datos_currency_Alty = mysqli_query($enlace, $currency_Alty) or die(mysqli_error());
    $row_datos_currency_Alty = mysqli_fetch_assoc($datos_currency_Alty);

mysqli_close($enlace); ?>

 <?php do{?>                                

<option value="<?php echo $row_datos_currency_Alty['id_currency']; ?>">
<?php echo $row_datos_currency_Alty['name_currency']; ?>&nbsp;&nbsp;"
<b><?php echo $row_datos_currency_Alty['symbol_currency']; ?></b>"</option>

 <?php } while ($row_datos_currency_Alty = mysqli_fetch_assoc($datos_currency_Alty)); ?> 
                           
</select>
</div> 


<div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">
<div class="input-group-prepend">
  <span class="input-group-text alert-info" id="basic-addon1">
    Value:</span>  
</div>
<input type="number" maxlength="19" min="0.00" class="form-control" id="additional_value" name="additional_value"
placeholder="0.00" step="0.01" aria-label="additional_value" aria-describedby="basic-addon1" required>  
</div>




</div> <!-- cierre margencito -->



</div> <!-- cierre modal body -->
   


<div class="modal-footer"> 
     
    <input name="id_del_currency_actual" type="hidden" value="<?php echo $main_c; ?>">

    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

    <button type="submit" name="actualizar_dinerillo" class="btn btn-dark"
    value="actualizar_dinerillo" ><i class="fa-regular fa-floppy-disk fa-lg"></i></button>

      </div>

</form>












       </div>
  </div> <!--cierre modal--> 


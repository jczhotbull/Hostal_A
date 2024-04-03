
<!-- ini modal editar -->

<div class="modal fade" id="services<?php echo $row_huespedes['id_guests'];?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">
        <i class="fa-solid fa-clipboard-list fa-lg"></i> </h5>  

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post">
      <div class="modal-body">




      


      <?php

include ("../conectar.php");

$query_services = "SELECT * FROM tb_services, productos, product_kind
where tb_services.id_producto = productos.id_producto
and tb_services.id_product_kind = product_kind.id_product_kind

and tb_services.id_hostal = '$mi_hostel_select'
and tb_services.service_status = '1'
and (productos.en_check_in = '1'
or productos.en_check_in = '3')

order BY tb_services.id_services ASC";

$services = mysqli_query($enlace, $query_services) or die(mysqli_error());
$row_services = mysqli_fetch_assoc($services);
$totalRows_services = mysqli_num_rows($services);

mysqli_close($enlace);


?>







  <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> All Available Services: </b>            
                  
                                </div>

                            </div>

 </div>   <!-- cierre margencito-->





<div class="form-row margencito"> 



<table class="table table-sm table-hover table-bordered mt-1">
  <thead>
    <tr>

      <th scope="col">Service</th>
      <th scope="col">Cost-Night</th>
      <th scope="col">Discount</th> 
      <th scope="col">Tax</th> 
      <th scope="col">Sub</th> 
      <th scope="col"><i class="fa-solid fa-bars fa-lg"></i></th>

    </tr>
  </thead>
  <tbody>


  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->        
  <tr>

<td class="align-middle" align="center" ><b><?php echo $row_services['name_producto'];?></b><br> For: <span style="color:green;"><?php
 $es_para = $row_services['sale_kind'];
 
 if ($es_para=='1') {
    $tipo_es = 'Sale';
 }

 else {
    $tipo_es = 'Rent';
 }
 
 echo $tipo_es;?></span>.  
 

</td>


<td class="align-middle" align="right">

<?php 

$este_servicio_es = $row_services['id_services'];

include ("../conectar.php");

$query_services_p = "SELECT * FROM tb_services_prices, discounts, taxes
where tb_services_prices.id_services = '$este_servicio_es'
and tb_services_prices.discount_type = discounts.id_discounts
and tb_services_prices.tax_services = taxes.id_taxes
order BY tb_services_prices.set_this_day DESC limit 1";

$services_p = mysqli_query($enlace, $query_services_p) or die(mysqli_error());
$row_services_p = mysqli_fetch_assoc($services_p);
$totalRows_services_p = mysqli_num_rows($services_p);

mysqli_close($enlace);




$mi_price = $row_services_p['the_price'];

$sub_price_serv = ($mi_price * $y_noches);

$english_price_serv = number_format($sub_price_serv, 2, '.', '');

echo $row_services_p['the_price'];?> x <?php echo $y_noches;?><br>
     <b style="font-size:10px;"> ( <?php echo $english_price_serv ;?> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> )</b> 

</td>


<td class="align-middle" align="center">

<?php

if ($row_services_p['name_discounts'] == '0') {

    $por_d = '';
    $disc_d = '';
    $show_d = '0';
    $porcentaje_d = '';
    $palabra_d = '';
    $igual_d = '';
  
    $disc_sub_bed_d = $english_price_serv;
    $english_disc_sub_bed_up_d = $english_price_serv;
    $english_disc_sub_bed_down_d = $english_price_serv;
  
  }
  
  else {
  
    $por_d = 'x';
    $disc_d = $row_services_p['name_discounts'];
    $show_d= '1';
    $porcentaje_d = '%';
    $palabra_d = 'Off';
    $igual_d = '=';
  
    $disc_sub_bed_d = $english_price_serv - ( ($english_price_serv / 100) * $row_services_p['name_discounts'] );
    $english_disc_sub_bed_up_d = number_format($disc_sub_bed_d, 2, '.', '');
    $english_disc_sub_bed_down_d = $english_disc_sub_bed_up_d;
  
   }

?>








<span <?php if ( $show_d =='0' ){?>style="display:none"<?php } ?>  >

      <b><span style="color:orange;" > <?php echo $disc_d;?> <?php echo $porcentaje_d;?> <?php echo $palabra_d;?></span></b>
    <br> <b style="font-size:10px;"  >
    
    ( <?php echo $english_disc_sub_bed_up_d;?> )</b> </span>

</td>

<td class="align-middle" align="center">


<?php


if ($row_services_p['name_taxes'] == '0') {
    $tax_sub_bed_t = '0';
    $cuenta_tax_t = '0';
    $english_tax_t = '0';
  }
  
  else {
    $tax_sub_bed_t = $row_services_p['name_taxes'];
    $cuenta_tax_t = (($english_disc_sub_bed_up_d / 100)*$row_services_p['name_taxes']);
    $english_tax_t = number_format($cuenta_tax_t, 2, '.', '');
   }


?>



<?php echo $tax_sub_bed_t;

// permite detectar si se colocaron más de dos diferentes impuestos que no sean cero


if($tax_sub_bed_t != $tax_cero_serv ) {

  if($tax_sub_bed_t != $tax_encontrado_serv)  { 

$tax_encontrado_serv = $tax_sub_bed_t;

$cuentas_tax_tax_serv = $cuentas_tax_tax_serv + $el_unillo;   // si llega a dos es porque cambio mas de una vez

}

}


if ($cuentas_tax_tax_serv  >= "2") {

echo '<script type="text/javascript">';
 echo 'setTimeout(function () {

  swal({
 title: "",
 type: "error",
 html: "More than two different taxes (other than zero) have been placed. Correct Services Taxes.",
 icon: "error",
});'

;
 echo '}, 1000);</script>';  

} 










?> % <br>


<span style="font-size:10px;" > ( <b style="color:purple;" ><?php echo $english_tax_t;?> </b> )</span>











</td>



<td class="align-middle" align="center" style="font-size:12px;">



<b><?php

$sub_total_beds_services = $english_disc_sub_bed_up_d + $english_tax_t;

echo $sub_total_beds_services;?></b> - <?php echo $row_usuarios_exchange_1['symbol_currency'];?> <br>


<?php

include ("../conectar.php");

$query_exchange_aa = "SELECT * FROM exchange_rates, currency
where exchange_rates.id_hostel = '$mi_hostel_select'
and exchange_rates.id_currency_A = currency.id_currency
order by exchange_rates.all_set_this_time desc limit 1";
$usuarios_exchange_aa = mysqli_query($enlace, $query_exchange_aa) or die(mysqli_error());
$row_usuarios_exchange_aa = mysqli_fetch_assoc($usuarios_exchange_aa);


$query_exchange_bb = "SELECT * FROM exchange_rates, currency
where exchange_rates.id_hostel = '$mi_hostel_select'
and exchange_rates.id_currency_B = currency.id_currency
order by exchange_rates.all_set_this_time desc limit 1";
$usuarios_exchange_bb = mysqli_query($enlace, $query_exchange_bb) or die(mysqli_error());
$row_usuarios_exchange_bb = mysqli_fetch_assoc($usuarios_exchange_bb);


mysqli_close($enlace);


  
$sub_total_beds_currency_a_serv = ($sub_total_beds_services / $row_usuarios_exchange_aa['currency_A_value']);

$sub_total_beds_currency_b_serv = ($sub_total_beds_services / $row_usuarios_exchange_bb['currency_B_value']);

$english_sub_total_aa = number_format($sub_total_beds_currency_a_serv, 2, '.', '');
$english_sub_total_bb = number_format($sub_total_beds_currency_b_serv, 2, '.', '');



  ?> <?php echo $english_sub_total_aa;?> - <b><?php echo $row_usuarios_exchange_aa['symbol_currency'];?></b> <br> 
  <?php echo $english_sub_total_bb;?> - <b><?php echo $row_usuarios_exchange_bb['symbol_currency'];?></b>




</td>


<td class="align-middle" align="center">



<div class="form-check">
  <input class="form-check-input" type="checkbox" value="<?php echo $row_services['id_services'];?>" name="defaultCheck[]" id="defaultCheck">
  <label class="form-check-label" for="defaultCheck">

  </label> 
</div>


</td>







  </tr>

  <?php } while ($row_services = mysqli_fetch_assoc($services)); ?>



</tbody>
</table>



</div> <!-- cierre margencito -->





      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editar_services" class="btn btn-info" value="<?php echo $row_huespedes['id_bed_booking'];?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button>   
             
      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
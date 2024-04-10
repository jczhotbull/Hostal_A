


<!-- ini modal editar -->

<div class="modal fade" id="services<?php echo $row_huespedes['id_guests'];?>" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-xl" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">
        <i class="fa-solid fa-clipboard-list fa-lg"></i> </h5>  

       <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
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


      <th scope="col" style="width: 13%" >Qty</th>
      <th scope="col" style="width: 22%">Service</th>   
      <th scope="col" style="width: 9%">Cost</th>
      <th scope="col" style="width: 8%">Discount</th>   
      <th scope="col" style="width: 6%">Tax</th> 
      <th scope="col" style="width: 11%">Sub</th>         
      <th scope="col" style="width: 31%"><i class="fa-solid fa-comment-dots fa-lg"></i></th>


    </tr>
  </thead>
  <tbody>


  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->        
  <tr>


  <td class="align-middle" align="center" >


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


$mi_price = $row_services_p['the_price'];

$cadena = '' . $row_huespedes['id_guests'] . '' . $row_services['id_services'] . '';


?>






   <span class="input-group"> 
   <input type="number" class="form-control" min="0" onchange="calc<?php echo $cadena;?>()"
   max="<?php echo $row_services['service_qty'];?>" step="1" name="qty[]" id="qty<?php echo $cadena;?>" value="0"> 

  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><b>/ <?php echo $row_services['service_qty'];?></b></span>
  </div>
</span>



  </td>




<script> // realiza los calculos necesarios para visualizarlos segun la cantidad introducida

function calc<?php echo $cadena;?>() {

    var a<?php echo $cadena;?> = parseFloat(document.getElementById("qty<?php echo $cadena;?>").value); // cantidad introducida
    document.getElementById("a<?php echo $cadena;?>").innerHTML = a<?php echo $cadena;?>.toString();  // muestra la cantidad introducida


    var b<?php echo $cadena;?> = <?php echo $mi_price;?>;     // precio de venta por unidad


    var res_completo<?php echo $cadena;?> = a<?php echo $cadena;?> * b<?php echo $cadena;?>;   // multiplica la cantidad por el precio
    var res<?php echo $cadena;?> = res_completo<?php echo $cadena;?>.toFixed(2); // redondea
    document.getElementById("res<?php echo $cadena;?>").innerHTML = res<?php echo $cadena;?>.toString();  // resultado de la multiplicacion

  


    var desc<?php echo $cadena;?> = <?php echo $row_services_p['name_discounts'];?>;     // valor del descuento
var tot_desc_completo<?php echo $cadena;?> = res<?php echo $cadena;?>-(  (res<?php echo $cadena;?> / 100) * desc<?php echo $cadena;?> ); // saca el desc
    var tot_desc<?php echo $cadena;?> = tot_desc_completo<?php echo $cadena;?>.toFixed(2); // redondea
    document.getElementById("tot_desc<?php echo $cadena;?>").innerHTML = tot_desc<?php echo $cadena;?>.toString();  // resultado del descuento


    var tax<?php echo $cadena;?> = <?php echo $row_services_p['name_taxes'];;?>;     // valor del tax
    var tot_tax_completo<?php echo $cadena;?> =   ( (tot_desc<?php echo $cadena;?> / 100) * tax<?php echo $cadena;?> )  ; // saca el tax
    var tot_tax<?php echo $cadena;?> = tot_tax_completo<?php echo $cadena;?>.toFixed(2); // redondea

    document.getElementById("tot_tax<?php echo $cadena;?>").innerHTML = tot_tax<?php echo $cadena;?>.toString();  // resultado del tax


 var tot_todo_completo<?php echo $cadena;?>=(tot_desc_completo<?php echo $cadena;?>+tot_tax_completo<?php echo $cadena;?>)  ;// suma total con desc y tax
    var tot_todo<?php echo $cadena;?> = tot_todo_completo<?php echo $cadena;?>.toFixed(2); // redondea
    document.getElementById("tot_todo<?php echo $cadena;?>").innerHTML = tot_todo<?php echo $cadena;?>.toString();  // resultado del tax


    var exchan_aa<?php echo $cadena;?> = <?php echo $row_usuarios_exchange_aa['currency_A_value'];?>;     // valor moneda extra 1
    var exchan_bb<?php echo $cadena;?> = <?php echo $row_usuarios_exchange_bb['currency_B_value'];?>;     // valor moneda extra 2

    var exc_aa_completo<?php echo $cadena;?> =    (tot_todo_completo<?php echo $cadena;?> / exchan_aa<?php echo $cadena;?>)  ; // cambio 1
    var exc_aa<?php echo $cadena;?> = exc_aa_completo<?php echo $cadena;?>.toFixed(2); // redondea
    document.getElementById("exc_aa<?php echo $cadena;?>").innerHTML = exc_aa<?php echo $cadena;?>.toString();  // resultado 1


    var exc_bb_completo<?php echo $cadena;?> =    (tot_todo_completo<?php echo $cadena;?> / exchan_bb<?php echo $cadena;?>)  ; // cambio 2
    var exc_bb<?php echo $cadena;?> = exc_bb_completo<?php echo $cadena;?>.toFixed(2); // redondea
    document.getElementById("exc_bb<?php echo $cadena;?>").innerHTML = exc_bb<?php echo $cadena;?>.toString();  // resultado 1



}

</script>










<td class="align-middle" align="center" >    

 
  <b><?php echo $row_services['name_producto'];?></b>, 

<span style="font-size:14px;">
For: <span style="color:green;"><?php
 $es_para = $row_services['sale_kind'];
 
 if ($es_para=='1') {
    $tipo_es = 'Sale';
 }

 else {
    $tipo_es = 'Rent';
 }
 
 echo $tipo_es;?></span>.</span> <br><?php echo $row_services['service_charac'];?>
 

</td>





<td class="align-middle" align="right">




<?php 

$sub_price_serv = ($mi_price * $y_noches);

$english_price_serv = number_format($sub_price_serv, 2, '.', '');

echo $row_services_p['the_price'];?> x <p2 id="a<?php echo $cadena;?>"></p2><br>
     <b style="font-size:10px;"> ( <p2 id="res<?php echo $cadena;?>"></p2> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> )</b> 

</td>


<td class="align-middle" align="center">

<?php                                             // algunos de aqui no se usan, antes era una cantidad fija de productos

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
    
    ( <p2 id="tot_desc<?php echo $cadena;?>"></p2> )</b> </span>       

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


<span style="font-size:10px;" > ( <b style="color:purple;" ><p2 id="tot_tax<?php echo $cadena;?>"></p2> </b> )</span>











</td>



<td class="align-middle" align="center" style="font-size:12px;">



<b><?php // no se usa
$sub_total_beds_services = $english_disc_sub_bed_up_d + $english_tax_t;
?>        <p2 id="tot_todo<?php echo $cadena;?>"></p2> </b> - <?php echo $row_usuarios_exchange_1['symbol_currency'];?> <br>


<?php // no se usa

  
$sub_total_beds_currency_a_serv = ($sub_total_beds_services / $row_usuarios_exchange_aa['currency_A_value']);

$sub_total_beds_currency_b_serv = ($sub_total_beds_services / $row_usuarios_exchange_bb['currency_B_value']);

$english_sub_total_aa = number_format($sub_total_beds_currency_a_serv, 2, '.', '');
$english_sub_total_bb = number_format($sub_total_beds_currency_b_serv, 2, '.', '');



  ?> <p2 id="exc_aa<?php echo $cadena;?>"></p2> - <b><?php echo $row_usuarios_exchange_aa['symbol_currency'];?></b> <br> 
  <p2 id="exc_bb<?php echo $cadena;?>"></p2> - <b><?php echo $row_usuarios_exchange_bb['symbol_currency'];?></b>




</td>




<td class="align-middle" align="center" >


<input type="hidden" name="id_price[]" id="id_price<?php echo $cadena;?>"
 value="<?php echo $row_services_p['id_services_prices'];?>" >

<input type="hidden" name="id_ser[]" id="id_ser<?php echo $cadena;?>" value="<?php echo $row_services['id_services'];?>" >



<input type="text" class="form-control" maxlength="249" name="comentarios[]" id="comentarios<?php echo $cadena;?>" placeholder="" >

</td>







  </tr>

  <?php } while ($row_services = mysqli_fetch_assoc($services)); ?>



</tbody>
</table>



</div> <!-- cierre margencito -->





      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="submit" name="nothing" class="btn btn-secondary" value="<?php echo $row_huespedes['id_bed_booking'];?>" >Cancel</button>



        <button type="submit" name="editar_services" class="btn btn-info" value="<?php echo $row_huespedes['id_bed_booking'];?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button>   
             
      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
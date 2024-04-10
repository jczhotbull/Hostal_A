
<!-- ini modal editar -->

<div class="modal fade" id="payme<?php echo $id_pay;?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel">
        <i class="fa-solid fa-cash-register fa-lg"></i> </h5>  

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

   
      <div class="modal-body">




<div class="form-row margencito"> 


<table class="table table-sm table-hover">
  <thead >
    <tr >
      <td style="background-color:white;" class="align-middle" align="center" ><b>N° <br>Guest(s)</b></td>
      <td style="background-color:white;"  class="align-middle" align="center" ><b>Lodging</b> <br><span style="font-size:12px; color:purple;">Tax 0%</span></td>
      <td style="background-color:white;"  class="align-middle" align="center" ><b>Lodging</b> <br><span style="font-size:12px; color:purple;">Tax <?php echo $name_del_tax_no_cero;?>%</span></td>
      <td  style="background-color:white;" class="align-middle" align="center" ><b>Services</b> <br><span style="font-size:12px; color:purple;">Tax 0%</span></td>
      <td style="background-color:white;"  class="align-middle" align="center" ><b>Services</b> <br><span style="font-size:12px; color:purple;">Tax <?php echo $name_del_tax_no_cero;?>%</span></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="background-color:white;" class="align-middle" align="center" ><?php echo $qty;?></td>

      <td style="background-color:white;" class="align-middle" align="right" ><br><br><br><b><?php echo $sub_total_camas_con_tax_a;?></b></td>

      <td style="background-color:white;" class="align-middle" align="right" ><?php echo $sub_total_camas_con_tax_b;?><br>
    
   <span style="font-size:12px; color:purple;"><?php
    
    $tot_ivita = ( ($sub_total_camas_con_tax_b/100)*$name_del_tax_no_cero );
    
    
    echo $tot_ivita;?></span> <br><br>
    
    <b><?php
    
    $tot_con_iva_hospedaje = ($tot_ivita+$sub_total_camas_con_tax_b);
    
    
    echo $tot_con_iva_hospedaje;?></b>
    
    
    
    </td>




      <td style="background-color:white;" class="align-middle" align="right" ><br><br><br> <b><?php echo $sub_total_servicios_con_tax_a;?></b></td>




      <td style="background-color:white;" class="align-middle" align="right" ><?php echo $sub_total_servicios_con_tax_b;?><br>
    
    <span style="font-size:12px; color:purple;"><?php
     
     $tot_ivita_serv = ( ($sub_total_servicios_con_tax_b/100)*$name_del_tax_no_cero );
     
     
     echo $tot_ivita_serv;?></span> <br><br>
     
     <b><?php
     
     $tot_con_iva_hospedaje_serv = ($tot_ivita_serv+$sub_total_servicios_con_tax_b);
     
     
     echo $tot_con_iva_hospedaje_serv;?></b>
    
    
    
    </td>

    </tr>






   <tr>

   <td style="background-color:white;" class="align-middle" align="right" ><b>Total:</b></td>
 
   <td style="background-color:white;" colspan="4" class="align-middle" align="center" ><b><?php echo $total_total;?></b> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> <br>
   <b><?php echo $english_sub_total_a;?></b> <?php echo $row_usuarios_exchange_a['symbol_currency'];?> <br> 
  <b><?php echo $english_sub_total_b;?></b> <?php echo $row_usuarios_exchange_b['symbol_currency'];?>
  
    
  
  </td>

   </tr>






   
  </tbody>
</table>

</div>   <!-- cierre margencito-->








<form method="post">

<input name="tot_hospedaje_tax_cero" type="hidden" value="<?php echo $sub_total_camas_con_tax_a;?>">
<input name="tot_hospedaje_con_tax" type="hidden" value="<?php echo $sub_total_camas_con_tax_b;?>">

<input name="tot_services_tax_cero" type="hidden" value="<?php echo $sub_total_servicios_con_tax_a;?>">
<input name="tot_services_con_tax" type="hidden" value="<?php echo $sub_total_servicios_con_tax_b;?>">

<input name="id_tax_no_cero" type="hidden" value="<?php echo $del_tax_no_cero;?>">

<input name="monto_hospedaje_total" type="hidden" value="<?php echo $total_total;?>">



<div class="form-row margencito"> 
<div class="form-row">

<div class="col-12 ml-1 mb-1">

<b class="text-success"> Payment: </b>          

</div>
</div> 
</div> 





<div class="form-row margencito">
<div class="form-row">


<div class="input-group input-group-sm  col-3 mb-2">
                              <div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><b>1st Pay:</b></span>  
                                        </div>

<input type="number" onchange="findTotal()" maxlength="37" class="form-control fee" id="primer_pago_hospedaje" name="primer_pago_hospedaje" aria-label="primer_pago_hospedaje" min="0.00" max="<?php echo $total_total;?>" step="0.01" placeholder="0.00"  aria-describedby="basic-addon1" required>

                                            
</div>




<script> // realiza una resta del monto total con el monto introducido.

function findTotal() {
  const fees = document.querySelectorAll(".fee");
  const total = document.querySelector("#total_fee");
  let sum = <?php echo $total_total;?>;
  
  fees.forEach(fee => {
     if(fee.valueAsNumber){
     sum -= fee.valueAsNumber;
     }      
  });
  total.value = sum;    
}


</script>





<div class="input-group input-group-sm col-3 mb-2">
                              <div class="input-group-prepend"> 
 <span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-calendar-day fa-lg"></i></span>  
                                        </div>
<input type="date"  class="form-control" id="primer_pago_fecha" name="primer_pago_fecha"  aria-label="primer_pago_fecha" aria-describedby="basic-addon1" required> 

</div>





<div class="input-group input-group-sm  col-3 mb-2"> 
                              <div class="input-group-prepend"> 
<span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg"></i></span>  
                                        </div>


                                        <select class="form-control " id="id_primer_pago_forma" name="id_primer_pago_forma" required>
                                                        
                                                        <option selected disabled value="">Via:</option>
                                                        <option disabled></option>

<?php

include("../conectar.php"); 

    $forma_A = "SELECT * FROM forma_pago  WHERE  name_forma_pago != '.' ORDER BY name_forma_pago ASC";
    $datos_forma_A = mysqli_query($enlace, $forma_A) or die(mysqli_error());
    $row_datos_forma_A = mysqli_fetch_assoc($datos_forma_A);

mysqli_close($enlace); 

?>

                                <?php do{?>                                

<option value="<?php echo $row_datos_forma_A['id_forma_pago']; ?>"><?php echo $row_datos_forma_A['name_forma_pago']; ?></option>

                                <?php } while ($row_datos_forma_A = mysqli_fetch_assoc($datos_forma_A)); ?> 

</select>
  
                              </div>  




<div class="input-group input-group-sm  col-3 mb-2">
<div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-receipt fa-lg"></i></span>  
</div>

<input type="text" maxlength="29" class="form-control " id="primer_pago_recibo" name="primer_pago_recibo" aria-label="primer_pago_recibo" aria-describedby="basic-addon1" placeholder="Transaction N°" required>

</div>




<div class="input-group input-group-sm  col-3 col-lg-3 col-md-3 col-sm-3 mt-2 mb-2"> 
<div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><b>Debt:</b></span>  
</div>

<input type="text" maxlength="199" class="form-control " name="total_fee" id="total_fee"  aria-describedby="basic-addon1" value="" disabled>

</div>









<div class="input-group input-group-sm  col-9 col-lg-9 col-md-9 col-sm-9 mt-2 mb-2"> 
<div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><i class="fa-regular fa-comments fa-lg"></i></span>  
</div>

<input type="text" maxlength="199" class="form-control " id="comentario_hospedaje" name="comentario_hospedaje" aria-label="comentario_hospedaje" aria-describedby="basic-addon1" placeholder="Observations...">

</div>


</div>
</div>











      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editar_payme" class="btn btn-success" value="<?php echo $id_pay;?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button>   
             
      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
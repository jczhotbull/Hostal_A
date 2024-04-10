
<!-- ini modal editar -->

<div class="modal fade" id="payme_resume<?php echo $id_pay;?>" tabindex="-1" role="dialog" aria-hidden="true">
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

      <td style="background-color:white;" class="align-middle" align="right" ><br><br><b><?php echo $sub_total_camas_con_tax_a;?></b></td>

      <td style="background-color:white;" class="align-middle" align="right" ><?php echo $sub_total_camas_con_tax_b;?><br>
    
   <span style="font-size:12px; color:purple;"><?php
    
    $tot_ivita = ( ($sub_total_camas_con_tax_b/100)*$name_del_tax_no_cero );
    
    
    echo $tot_ivita;?></span> <br>
    
    <b><?php
    
    $tot_con_iva_hospedaje = ($tot_ivita+$sub_total_camas_con_tax_b);
    
    
    echo $tot_con_iva_hospedaje;?></b>
    
    
    
    </td>




      <td style="background-color:white;" class="align-middle" align="right" ><br><br><b><?php echo $sub_total_servicios_con_tax_a;?></b></td>




      <td style="background-color:white;" class="align-middle" align="right" ><?php echo $sub_total_servicios_con_tax_b;?><br>
    
    <span style="font-size:12px; color:purple;"><?php
     
     $tot_ivita_serv = ( ($sub_total_servicios_con_tax_b/100)*$name_del_tax_no_cero );
     
     
     echo $tot_ivita_serv;?></span> <br>
     
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



   <tr>

   <td style="background-color:white;" class="align-middle text-success" align="right" ><b>Amount Owed:</b></td>

   <?php
   
   $pago_uno = $row_usuarios_hay_pago['primer_pago_hospedaje'];
   $pago_dos = $row_usuarios_hay_pago['segundo_pago_hospedaje'];
   $pago_tres = $row_usuarios_hay_pago['tercer_pago_hospedaje'];

   $pagos_parciales_suma = $pago_uno + $pago_dos + $pago_tres;
   
   $deuda_total_act = $total_total - $pagos_parciales_suma;
   



   $deuda_total_act_a = ($deuda_total_act / $row_usuarios_exchange_a['currency_A_value'] );

   $deuda_total_act_b = ($deuda_total_act / $row_usuarios_exchange_b['currency_B_value']);
   
$english_sub_total_aaa = number_format($deuda_total_act_a, 2, '.', '');
$english_sub_total_bbb = number_format($deuda_total_act_b, 2, '.', '');
   
   
   ?>


 
   <td style="background-color:white;" colspan="4" class="align-middle text-success" align="right" ><b><?php echo $deuda_total_act;?></b> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> <br>
   <b><?php echo $english_sub_total_aaa;?></b> <?php echo $row_usuarios_exchange_a['symbol_currency'];?> <br> 
  <b><?php echo $english_sub_total_bbb;?></b> <?php echo $row_usuarios_exchange_b['symbol_currency'];?>
  
    
  
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

<input name="monto_primer_pago" type="hidden" value="<?php echo  $row_usuarios_hay_pago['primer_pago_hospedaje'];?>">
<input name="monto_segundo_pago" type="hidden" value="<?php echo  $row_usuarios_hay_pago['segundo_pago_hospedaje'];?>">



<div class="form-row margencito"> 
<div class="form-row">

<div class="col-12 ml-1 mb-1">

<b class="text-success"> Payment History: </b> 

</div>
</div> 
</div> 



<div class="form-row margencito">
<div class="form-row">


<div class="input-group input-group-sm  col-3 mb-2">
                              <div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><b>1st Pay:</b></span>  
                                        </div>

<input type="number" maxlength="37" class="form-control " id="primer_pago_hospedaje" name="primer_pago_hospedaje" aria-label="primer_pago_hospedaje"  placeholder="<?php echo $row_usuarios_hay_pago['primer_pago_hospedaje'];?>"  aria-describedby="basic-addon1" disabled>

                                            
</div> 



<div class="input-group input-group-sm col-3 mb-2">
                              <div class="input-group-prepend"> 
 <span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-calendar-day fa-lg"></i></span>  
                                        </div>
<input type="text"  class="form-control" id="primer_pago_fecha" name="primer_pago_fecha"  aria-label="primer_pago_fecha"
 aria-describedby="basic-addon1" placeholder="<?php echo $row_usuarios_hay_pago['primer_pago_fecha'];?>" disabled> 

</div>



<div class="input-group input-group-sm col-3 mb-2">
                              <div class="input-group-prepend"> 
 <span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg"></i></span>  
                                        </div>
<input type="text"  class="form-control" id="id_primer_pago_forma" name="id_primer_pago_forma"  aria-label="id_primer_pago_forma"
 aria-describedby="basic-addon1" placeholder="<?php echo $row_usuarios_hay_pago['name_forma_pago'];?>" disabled> 

</div>








<div class="input-group input-group-sm  col-3 mb-2">
<div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-receipt fa-lg"></i></span>  
</div>

<input type="text" maxlength="29" class="form-control " id="primer_pago_recibo" name="primer_pago_recibo" aria-label="primer_pago_recibo" aria-describedby="basic-addon1" placeholder="<?php echo $row_usuarios_hay_pago['primer_pago_recibo'];?>" disabled>

</div>











<!-- segundo pago -->


<div class="input-group input-group-sm  col-3 mb-2">
                              <div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><b>2nd Pay:</b></span>  
                                        </div>

<input type="number" maxlength="37" class="form-control " id="segundo_pago_hospedaje" name="segundo_pago_hospedaje" aria-label="segundo_pago_hospedaje"  placeholder="<?php echo $row_usuarios_hay_pago['segundo_pago_hospedaje'];?>"  aria-describedby="basic-addon1" disabled>

                                            
</div> 



<div class="input-group input-group-sm col-3 mb-2">
                              <div class="input-group-prepend"> 
 <span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-calendar-day fa-lg"></i></span>  
                                        </div>
<input type="text"  class="form-control" id="segundo_pago_fecha" name="segundo_pago_fecha"  aria-label="segundo_pago_fecha"
 aria-describedby="basic-addon1" placeholder="<?php echo $row_usuarios_hay_pago['segundo_pago_fecha'];?>" disabled> 

</div>



<div class="input-group input-group-sm col-3 mb-2">
                              <div class="input-group-prepend"> 
 <span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg"></i></span>  
                                        </div>
<input type="text"  class="form-control" id="id_segundo_pago_forma" name="id_segundo_pago_forma"  aria-label="id_segundo_pago_forma"
 aria-describedby="basic-addon1" placeholder="<?php
 
 $pago_dos_id = $row_usuarios_hay_pago['id_segundo_pago_forma'];
 
 include ("../conectar.php");

 $query_pago_dos = "SELECT * FROM forma_pago
where id_forma_pago = '$pago_dos_id' limit 1";
$usuarios_pago_dos = mysqli_query($enlace, $query_pago_dos) or die(mysqli_error());
$row_usuarios_pago_dos = mysqli_fetch_assoc($usuarios_pago_dos);


mysqli_close($enlace);
 
 
 
 echo $row_usuarios_pago_dos['name_forma_pago'];?>" disabled> 

</div>  








<div class="input-group input-group-sm  col-3 mb-2">
<div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-receipt fa-lg"></i></span>  
</div>

<input type="text" maxlength="29" class="form-control " id="segundo_pago_recibo" name="segundo_pago_recibo" aria-label="segundo_pago_recibo" aria-describedby="basic-addon1" placeholder="<?php echo $row_usuarios_hay_pago['segundo_pago_recibo'];?>" disabled>

</div>




<!-- cierre segundo pago -->














<!-- tercer pago -->


<div class="input-group input-group-sm  col-3 mb-2">
                              <div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><b>3rd Pay:</b></span>  
                                        </div>

<input type="number" maxlength="37" class="form-control " id="tercer_pago_hospedaje" name="tercer_pago_hospedaje" aria-label="tercer_pago_hospedaje"  placeholder="<?php echo $row_usuarios_hay_pago['tercer_pago_hospedaje'];?>"  aria-describedby="basic-addon1" disabled>

                                            
</div> 



<div class="input-group input-group-sm col-3 mb-2">
                              <div class="input-group-prepend"> 
 <span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-calendar-day fa-lg"></i></span>  
                                        </div>
<input type="text"  class="form-control" id="tercer_pago_fecha" name="tercer_pago_fecha"  aria-label="tercer_pago_fecha"
 aria-describedby="basic-addon1" placeholder="<?php echo $row_usuarios_hay_pago['tercer_pago_fecha'];?>" disabled> 

</div>



<div class="input-group input-group-sm col-3 mb-2">
                              <div class="input-group-prepend"> 
 <span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-money-check-dollar fa-lg"></i></span>  
                                        </div>
<input type="text"  class="form-control" id="id_tercer_pago_forma" name="id_tercer_pago_forma"  aria-label="id_tercer_pago_forma"
 aria-describedby="basic-addon1" placeholder="<?php
 
 $pago_tres_id = $row_usuarios_hay_pago['id_tercer_pago_forma'];
 
 include ("../conectar.php");

 $query_pago_tres = "SELECT * FROM forma_pago
where id_forma_pago = '$pago_tres_id' limit 1";
$usuarios_pago_tres = mysqli_query($enlace, $query_pago_tres) or die(mysqli_error());
$row_usuarios_pago_tres = mysqli_fetch_assoc($usuarios_pago_tres);


mysqli_close($enlace);
 
 
 
 echo $row_usuarios_pago_tres['name_forma_pago'];?>" disabled> 

</div>  








<div class="input-group input-group-sm  col-3 mb-2">
<div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><i class="fa-solid fa-receipt fa-lg"></i></span>  
</div>

<input type="text" maxlength="29" class="form-control " id="tercer_pago_recibo" name="tercer_pago_recibo" aria-label="tercer_pago_recibo" aria-describedby="basic-addon1" placeholder="<?php echo $row_usuarios_hay_pago['tercer_pago_recibo'];?>" disabled>

</div>




<!-- cierre tercer pago -->














<div class="input-group input-group-sm  col-12 col-lg-12 col-md-12 col-sm-12 mt-2 mb-2"> 
<div class="input-group-prepend">
<span class="input-group-text alert-success" id="basic-addon1"><i class="fa-regular fa-comments fa-lg"></i></span>  
</div>

<input type="text" maxlength="199" class="form-control " id="comentario_hospedaje" name="comentario_hospedaje" aria-label="comentario_hospedaje" aria-describedby="basic-addon1" value="<?php echo $row_usuarios_hay_pago['comentario_hospedaje'];?>" disabled>

</div>


</div>
</div>











      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
     <!--   <button type="submit" name="editar_payme_last" class="btn btn-success" value="<?php echo $id_pay;?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button>   -->
             
      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
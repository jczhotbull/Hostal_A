


<!-- ini modal editar -->

<div class="modal fade" id="servicios<?php echo $row_usuarios['id_bed_booking'];?>" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">   <!-- modal-lg -->
    <div class="modal-content">

   

      <form method="post">
      <div class="modal-body">



<div class="form-row margencito"> 

<div class="form-row">  <!-- datos principales -->

    <div class="col-md-12 ml-1 mb-1">

    <b class="text-info"> Desired Services: </b>            

    </div>

</div>

</div>   <!-- cierre margencito-->



<div class="form-row margencito"> 



<table class="table table-sm table-hover table-bordered mt-1">
  <thead>
    <tr>



      <th scope="col" style="width: 20%" >Service(s)</th>   
      <th scope="col" style="width: 10%" >Given</th>
      <td  style="width: 20%; font-size:12px;" ><b>Withdraw / Remain</b></td>   
     
      <th scope="col" style="width: 50%" >Comment(s)</th>
       



    </tr>
  </thead>
  <tbody>




  <?php

$my_booking_p = $row_usuarios['id_bed_booking'];

include ("../conectar.php");

$services_listos_p = "SELECT * FROM tb_guests_services_check_in, tb_services, productos
WHERE tb_guests_services_check_in.id_del_servicio_check_in = tb_services.id_services
and tb_services.id_producto = productos.id_producto
and tb_guests_services_check_in.id_bed_booking = '$my_booking_p'
order by tb_services.id_services asc";
$query_services_listos_p = mysqli_query($enlace, $services_listos_p) or die(mysqli_error());
$row_usuarios_services_listos_p = mysqli_fetch_assoc($query_services_listos_p);
$totalRows_services_listos_p = mysqli_num_rows($query_services_listos_p);

mysqli_close($enlace);

$new_services_sub_p = '0';


?>




  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   

<tr>



  <td class="align-middle" align="center" >
  
  <?php echo $row_usuarios_services_listos_p['name_producto'];?> <b>x <?php echo $row_usuarios_services_listos_p['cant_adquirida'];?></b>


</td>  



  <td class="align-middle" align="center" > <b> <?php echo $row_usuarios_services_listos_p['cant_recibida'];?></b>  </td>

  <td class="align-middle" align="center" >
    
  <?php
  
  $por_cambiar = $row_usuarios_services_listos_p['cant_adquirida'] - $row_usuarios_services_listos_p['cant_recibida'];
  
  
  ;?>
    
  <span class="input-group"> 
   <input type="number" class="form-control" min="0" 
   max="<?php echo $por_cambiar;?>" step="1" name="qtyyy[]"
   id="qtyyy<?php echo $row_usuarios_services_listos_p['id_guests_services_check_in'];?>" value="0"> 

  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><b>/ <?php echo  $por_cambiar;?></b></span>
  </div>
</span>








</td>

  <td class="align-middle" align="center" >
    

  <input type="text" maxlength="99" class="form-control" name="comentariosss[]" id="comentariosss<?php echo $row_usuarios_services_listos_p['id_guests_services_check_in'];?>" placeholder="" > </td>


  <input type="hidden" name="id_serrr[]" id="id_serrr<?php echo $row_usuarios_services_listos_p['id_guests_services_check_in'];?>" value="<?php echo $row_usuarios_services_listos_p['id_guests_services_check_in'];?>" >



 </tr>

<?php } while ($row_usuarios_services_listos_p = mysqli_fetch_assoc($query_services_listos_p)); ?>














</tbody>
</table>



</div> <!-- cierre margencito -->



<?php

$my_booking_ppp = $row_usuarios['id_bed_booking'];

include ("../conectar.php");

$services_listos_ppp = "SELECT * FROM tb_guests_services_check_in, tb_services, productos, tb_historial_servicios_dados
WHERE tb_guests_services_check_in.id_del_servicio_check_in = tb_services.id_services
and tb_services.id_producto = productos.id_producto
and tb_historial_servicios_dados.id_guests_services_check_in = tb_guests_services_check_in.id_guests_services_check_in
and tb_historial_servicios_dados.id_del_booking = '$my_booking_ppp'
order by tb_historial_servicios_dados.fecha_entrega asc";
$query_services_listos_ppp = mysqli_query($enlace, $services_listos_ppp) or die(mysqli_error());
$row_usuarios_services_listos_ppp = mysqli_fetch_assoc($query_services_listos_ppp);
$totalRows_services_listos_ppp = mysqli_num_rows($query_services_listos_ppp);

mysqli_close($enlace);

?>



<div class="form-row margencito" <?php if ( $totalRows_services_listos_ppp == '0' ){?>style="display:none"<?php } ?>  > 

<div class="form-row">  <!-- datos principales -->

    <div class="col-md-12 ml-1 mb-1">

    <b class="text-info"> Historical: </b>            

    </div>

</div>

</div>   <!-- cierre margencito-->












<table class="table table-sm table-hover table-bordered mt-1"  <?php if ( $totalRows_services_listos_ppp == '0' ){?>style="display:none"<?php } ?> >


<thead>
    <tr>

      <th scope="col" style="width: 20%; font-size:12px;" >Service</th>   
      <th scope="col" style="width: 5%; font-size:12px;" >Withdraw</th>   
      <th scope="col" style="width: 20%; font-size:12px;" >Date</th> 
      <th scope="col" style="width: 40%; font-size:12px;" >Comment(s)</th>
      <td  style="width: 15%; font-size:12px;" ><b>Given By</b></td>
       
    </tr>
  </thead>





  
  <tbody>



  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   

<tr>



<td class="align-middle" align="center" style="font-size:12px;" >
  
<?php echo $row_usuarios_services_listos_ppp['name_producto'];?>

</td>  



<td class="align-middle" align="center" style="font-size:12px;" >
    
<?php echo $row_usuarios_services_listos_ppp['cantidad_dada'];?>


</td>

  

 <td class="align-middle" align="center" style="font-size:12px;" >

 <?php echo $row_usuarios_services_listos_ppp['fecha_entrega'];?>

</td>


<td class="align-middle" align="center" style="font-size:12px;" >

<?php echo $row_usuarios_services_listos_ppp['nota_de_entrega'];?>

</td>




<td class="align-middle" align="center" style="font-size:12px;" >


<?php

include ("../conectar.php");


$este_lo_registro_pp = $row_usuarios_services_listos_ppp['id_quien_entrego'];

$queryFH_whoL_pp = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro_pp' limit 1";

$usuarios_whoL_pp = mysqli_query($enlace, $queryFH_whoL_pp) or die(mysqli_error());

$row_usuarios_whoL_pp = mysqli_fetch_assoc($usuarios_whoL_pp);

mysqli_close($enlace);


?>






<?php echo $row_usuarios_whoL_pp['p_surname_per'];?> <?php echo $row_usuarios_whoL_pp['p_name_per'];?>.

</td>



 </tr>

<?php } while ($row_usuarios_services_listos_ppp = mysqli_fetch_assoc($query_services_listos_ppp)); ?>














</tbody>
</table>





















      </div> <!-- modal body -->
             

      <div class="modal-footer">

      <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>



        <button type="submit" name="save_services_admin" class="btn btn-info" value="<?php echo $row_usuarios['id_bed_booking'];?>">
              <i class="fa-regular fa-floppy-disk fa-lg"></i></button>   
             
      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
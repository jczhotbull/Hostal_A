<?php


include("00_identificador.php");


$alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.


    $logo_success="";
    $logo_danger="";
    $logo_info="1";

    $direcc_success=""; // notificador del proceso de insercion de direccion
    $direcc_danger="";  // notificador del proceso de insercion de direccion

    $datos_success="";
    $datos_danger="";


    $hostel_success="";  // notificador del proceso de insercion de informacion del usuario
    $hostel_danger="";


    $conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores


    $ttitulo = $_GET['ttitulo'];
    $idtbla = $_GET['idtabla'];


    $quien_lo_registra = $_SESSION['id_per'];

    $mi_hostel_select = $_SESSION['hostel_activo'];



    $tax_cero = '0';
    $tax_encontrado = '10000';
    $cuentas_tax = '0';

    $el_unillo = '1';




// editar room
if(isset($_POST['add_price']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

    include("../conectar.php"); 

$id_del_producto_add = $_POST['id_del_producto_add'];
$id_del_service_add = $_POST['id_del_service'];


$el_tax = $_POST['tax'];
$el_discount = $_POST['discount'];
    

    $query_price_room = "INSERT INTO tb_services_prices(id_hostel, id_services, id_product_kind, id_product,
    the_price, tax_services, discount_type, set_by_this_per) 

   VALUES (   '$mi_hostel_select',
              '$id_del_service_add',
              '$idtbla',
              '$id_del_producto_add',
              '".mysqli_real_escape_string($enlace,$_POST['new_price'])."'    ,
              '$el_tax',
              '$el_discount',
              '$quien_lo_registra'


           )";


if (!mysqli_query($enlace,$query_price_room))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{
    $exitoZ="- Service Price Set. ";
    mysqli_close($enlace); 

}


}










    if(isset($_POST['borrar_price']))
    {
$alerta_principal = "2";
          

      include("../conectar.php");  

// debo detectar si el precio ha sido usado

$id_price_borrar = $_POST['borrar_price'];





$queryDiss = "DELETE FROM tb_services_prices WHERE id_services_prices = '$id_price_borrar' LIMIT 1";

if (!mysqli_query($enlace,$queryDiss))      // si no ha logrado borrar los direcc del hostel
   {
    $errorZ = " <i class=\"fa-solid fa-people-line fa-lg\"></i> "; 
    mysqli_close($enlace); 
    }



else {  

   $exitoZ = "Price was deleted.";
   mysqli_close($enlace);  

}           // hasta aqui gracias a borrar la data del hostel al estar en cascada se lleva el contenido del hostel.



}


    

















 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 


              <div class="col-md-1 col-lg-1" >  
 <button type="button" class="btn btn-dark btn-lg btn-block" style="margin-top:1px;"  onClick="javascript:history.go(-1)" ><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal fa-lg"></i></button>
</div>



                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-boxes-packing fa-lg "></i> &nbsp; &nbsp;  <i> <b><?php echo $ttitulo ?></b> Services.</i>
                </div> 

 

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-8 col-lg-8 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-8 col-lg-8 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
            </div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->




       










<?php

include ("../conectar.php");


$queryFHL_currencys_prim = "SELECT * FROM exchange_rates, currency
 where exchange_rates.id_hostel = '$mi_hostel_select'
 and exchange_rates.id_hostel_currency = currency.id_currency
 order BY exchange_rates.all_set_this_time DESC limit 1";

$the_currencys_prim = mysqli_query($enlace, $queryFHL_currencys_prim) or die(mysqli_error());
$row_the_currencys_prim = mysqli_fetch_assoc($the_currencys_prim);
$totalRows_the_currencys_prim = mysqli_num_rows($the_currencys_prim);




$queryFHL_serv_count = "SELECT * FROM tb_services, productos
WHERE tb_services.id_hostal = '$mi_hostel_select' 
and   tb_services.id_product_kind = '$idtbla'
and   tb_services.id_producto = productos.id_producto
order BY tb_services.id_producto asc";

$services_serv_count = mysqli_query($enlace, $queryFHL_serv_count) or die(mysqli_error());
$row_services_serv_count = mysqli_fetch_assoc($services_serv_count);
$totalRows_services_serv_count = mysqli_num_rows($services_serv_count);



mysqli_close($enlace);

?>




            <div class="card mx-auto" <?php if ( $totalRows_services_serv_count =='0' ){?>style="display:none"<?php } ?> >
              <div class="card-body">
      
  




<div class="table-responsive">

<table class="table table-bordered" style="text-align: center; margin-top: 50%;" id="dataTable" width="100%" cellspacing="0" >
 
  <thead>
    <tr>
      <th>Product Name:</th>   
      <th>Price:</th>
      <th>Tax:</th> 
      <th>Discount:</th>
      <th>Add:</th>      
    </tr>
  </thead>
              
  
  <tbody>

 




  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->          


    <tr>
    <td class="align-middle" align="center" >
        
    <b> <span style="color:purple;"> -  <?php echo $row_services_serv_count['name_producto'];
   
   $id_del_producto_para_precios = $row_services_serv_count['id_producto'];
   $id_del_servicio_para_precios = $row_services_serv_count['id_services'];
           
    ?></span></b> - For <span style="color:green;"><b><?php $kind_kind = $row_services_serv_count['sale_kind'];
    
    if ($kind_kind == '1') {
      $es_es = 'Sale';
    }
    else {
      $es_es = 'Rent';
    } 
    
    echo $es_es; ?></b></span>.

<div class="col-sm-12 col-md-12 col-lg-12">

      <?php

include ("../conectar.php");

$queryFHL_serv_current = "SELECT * FROM tb_services_prices, taxes, discounts
where tb_services_prices.id_services = '$id_del_servicio_para_precios'
and   tb_services_prices.tax_services = taxes.id_taxes
and   tb_services_prices.discount_type = discounts.id_discounts
order BY tb_services_prices.set_this_day desc limit 1";

$services_serv_current = mysqli_query($enlace, $queryFHL_serv_current) or die(mysqli_error());
$row_services_serv_current = mysqli_fetch_assoc($services_serv_current);
$totalRows_services_serv_current = mysqli_num_rows($services_serv_current);

mysqli_close($enlace);

?>
   <span style="font-size: 12px;">      <b>Current:</b> <?php
         
         if ($totalRows_services_serv_current >='1') {
            echo $row_services_serv_current['the_price'];
         }
         
          ?> 
         - <?php echo $row_the_currencys_prim['symbol_currency']; ?> </span>
        
        
<span data-toggle="tooltip" data-placement="top" title="Delete Current"" >
  <a href="" class="btn-danger mb-1"
  data-toggle="modal"
 data-target="#delete_service_price<?php echo $row_services_serv_current['id_services_prices']; ?>"
  
  ><i class="fa-regular fa-trash-can"></i></a></span>
        

  <?php include("deletes/delete_service_price_modal.php"); ?>       
        
        
        
        </div>



         <div class="col-sm-12 col-md-12 col-lg-12">

         <span style="font-size: 12px;">  <b>Tax:</b> <?php
   
   if ($totalRows_services_serv_current >='1') {
      echo $row_services_serv_current['name_taxes']; 
                                                               
// requiero generar una alerta para que nadie coloque dos valores diferentes de impuestos distintos de cero

      if($row_services_serv_current['name_taxes'] != $tax_cero ) {

           if($row_services_serv_current['name_taxes'] != $tax_encontrado)  { 

        $tax_encontrado = $row_services_serv_current['name_taxes'];

        $cuentas_tax = $cuentas_tax + $el_unillo;   // si llega a dos es porque cambio mas de una vez

      }

       }
   

   }



   if ($cuentas_tax  >= "2") {

    echo '<script type="text/javascript">';
     echo 'setTimeout(function () {
   
      swal({
     title: "",
     type: "error",
     html: "Verify that no more than two different taxes (other than zero) have been placed.",
     icon: "error",
   });'
   
   ;
     echo '}, 1000);</script>';  
   
   } 












   
    ?> 
   %  -  <b>Discount:</b> <?php
   
   if ($totalRows_services_serv_current >='1') {
      echo $row_services_serv_current['name_discounts'];
   }
   
    ?> 
   % </span>  

</div>

    </td>



    <td class="align-middle" align="center">


<form  method="POST"  name="add_price">  

<input name="id_del_producto_add" type="hidden" value="<?php echo $id_del_producto_para_precios; ?>">

<div class="input-group input-group-sm col-sm-12 col-md-12 col-lg-12">
          
            <input type="number" min="1" maxlength="18" class="form-control importantex"
            id="new_price" name="new_price" step="0.01" min="0.00" placeholder="New Price in <?php echo $row_the_currencys_prim['symbol_currency']; ?>"
            aria-label="new_price" aria-describedby="basic-addon1" required>
          
      </div> 



   </td>


    <td  class="align-middle" align="center">
        
    <div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 "> 
  
          <select class="form-control importantex" id="tax" name="tax" required>
                                                        
                 <option selected disabled value="">Tax %:</option>
                 <option disabled></option>

<?php

include("../conectar.php"); 

    $tax_A = "SELECT * FROM taxes  WHERE  name_taxes != '.' ORDER BY name_taxes ASC";
    $datos_tax_A = mysqli_query($enlace, $tax_A) or die(mysqli_error());
    $row_datos_tax_A = mysqli_fetch_assoc($datos_tax_A);

mysqli_close($enlace); 

?>

<?php do{?>                                

<option value="<?php echo $row_datos_tax_A['id_taxes']; ?>"><?php echo $row_datos_tax_A['name_taxes']; ?></option>
<?php } while ($row_datos_tax_A = mysqli_fetch_assoc($datos_tax_A)); ?> 
       
                                        </select>
  
     </div>  





</td>
    <td class="align-middle" align="center"> 

    <div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12"> 

    <select class="form-control importantex" id="discount" name="discount" required>
                                                        
<option selected disabled value="">Discount %:</option>
<option disabled></option>

<?php

include("../conectar.php"); 

    $dis_A = "SELECT * FROM discounts  WHERE  name_discounts != '.' ORDER BY name_discounts ASC";
    $datos_dis_A = mysqli_query($enlace, $dis_A) or die(mysqli_error());
    $row_datos_dis_A = mysqli_fetch_assoc($datos_dis_A);

mysqli_close($enlace); 

?>                              


<?php do{?>                                

<option value="<?php echo $row_datos_dis_A['id_discounts']; ?>"><?php echo $row_datos_dis_A['name_discounts']; ?></option>
<?php } while ($row_datos_dis_A = mysqli_fetch_assoc($datos_dis_A)); ?>                            

                                        </select>
                                </div>


    </td>




    <td class="align-middle" align="center"> 


    <input name="id_del_service" type="hidden" value="<?php echo $row_services_serv_count['id_services']; ?>">





<button type="submit" name="add_price" class="btn btn-sm btn-info btn-block" id='add_price'>
<i class="fa-solid fa-floppy-disk fa-lg"></i>&nbsp</button> 

</form> 

    </td>  

 
    </tr>
    
    <?php } while ($row_services_serv_count = mysqli_fetch_assoc($services_serv_count)); ?>    

    
  </tbody>

</table>

</div> <!-- cierre tabla responsiva -->



































              
              </div><!-- cierre card-body -->
            </div><!-- cierre card mx-auto -->     





                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

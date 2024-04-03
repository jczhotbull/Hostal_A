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

    $tax = $_POST['tax'];
    $discount = $_POST['discount'];


    $query_price_room = "INSERT INTO tb_prices_beds(id_hostel, id_room_kind, name_prices_beds,
    taxes_beds, discount_beds, prices_set_by_who_b) 

   VALUES (   '$mi_hostel_select',
              '$idtbla',
              '".mysqli_real_escape_string($enlace,$_POST['new_price'])."'    ,
              '$tax',
              '$discount',
              '$quien_lo_registra'

           )";


if (!mysqli_query($enlace,$query_price_room))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{
    $exitoZ="- Price Set. ";
    mysqli_close($enlace); 

}


}










    if(isset($_POST['borrar_price']))
    {
$alerta_principal = "2";
          

      include("../conectar.php");  

// debo detectar si el precio ha sido usado

$id_price_borrar = $_POST['borrar_price'];





$queryDiss = "DELETE FROM tb_prices_beds WHERE id_prices_beds = '$id_price_borrar' LIMIT 1";

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
                    <i class="fa-solid fa-money-bill-trend-up fa-lg "></i> &nbsp; &nbsp;  <i> <b><?php echo $ttitulo ?></b> Beds.</i>
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




            <div class="card mx-auto">
              <div class="card-body">
      
                       
<form  method="POST"  name="add_price">                           


                            <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <span class="text-info"> Set New Price for <b><?php echo $ttitulo ?></b> Beds: </span>            


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->

<?php

include ("../conectar.php");

$queryFHL_currencys_prim = "SELECT * FROM exchange_rates, currency
 where exchange_rates.id_hostel = '$mi_hostel_select'
 and exchange_rates.id_hostel_currency = currency.id_currency
 order BY exchange_rates.all_set_this_time DESC limit 1";

$the_currencys_prim = mysqli_query($enlace, $queryFHL_currencys_prim) or die(mysqli_error());
$row_the_currencys_prim = mysqli_fetch_assoc($the_currencys_prim);
$totalRows_the_currencys_prim = mysqli_num_rows($the_currencys_prim);


mysqli_close($enlace);

?>








      <div class="form-row margencito mb-4"> 

   

      <div class="input-group input-group-sm col-sm-12 col-md-6 col-lg-3 mb-2">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-money-bill-trend-up fa-lg"></i></span>  
            </div>
            <input type="number" min="1" maxlength="18" class="form-control importantex"
            id="new_price" name="new_price" step="0.01" min="0.00" placeholder="New Price"
            aria-label="new_price" aria-describedby="basic-addon1" required>

            <div class="input-group-append">

    <span class="input-group-text" id="basic-addon2"><b><?php echo $row_the_currencys_prim['symbol_currency']; ?></b></span>
  </div>
      </div>






      <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                              %</span>  
                                        </div>


          <select class="form-control importantex" id="tax" name="tax" required>
                                                        
                 <option selected disabled value="">Tax:</option>
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







   <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                              <i class="fa-solid fa-gift fa-lg"></i></span>  
                                        </div>


<select class="form-control importantex" id="discount" name="discount" required>
                                                        
<option selected disabled value="">Discount:</option>
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












<div class="col-md-1 mb-2">

<button type="submit" name="add_price" class="btn btn-sm btn-info btn-block" id='add_price'>
<i class="fa-solid fa-floppy-disk fa-lg"></i> &nbsp</button> 

</div>

</form> 

</div> <!-- cierre margencito -->





<?php

include ("../conectar.php");


$queryFHL_pp = "SELECT * FROM tb_prices_beds, taxes, discounts
WHERE tb_prices_beds.id_hostel = '$mi_hostel_select' 
and   tb_prices_beds.id_room_kind = '$idtbla'
and   tb_prices_beds.taxes_beds = taxes.id_taxes
and   tb_prices_beds.discount_beds = discounts.id_discounts
ORDER BY tb_prices_beds.set_prices_date_b desc limit 5";

$room_pp = mysqli_query($enlace, $queryFHL_pp) or die(mysqli_error());
$row_room_pp = mysqli_fetch_assoc($room_pp);
$totalRows_room_pp = mysqli_num_rows($room_pp);

mysqli_close($enlace);

?>








<div class="form-row margencito" <?php if ( $totalRows_room_pp =='0' ){?>style="display:none"<?php } ?> > 


<div class="card-body border border-info mb-2"  >

<div class="table-responsive">

  <table class="table table-bordered stricolor table-sm" id="" width="100%" cellspacing="0">
   
    <thead>
      <tr>                  
        
        <th width="40">Date</th>  <!-- chequear el status -->
        <th width="30%">Price</th>  <!-- chequear el status -->
        <th width="5%">Tax</th>  <!-- chequear el status -->    
        <th width="5%">Discount</th>  <!-- chequear el status -->                   
        <th width="20%"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th> 

      </tr>
    </thead>

    <tbody>
   
    <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->           

 <tr>


<td class="align-middle" align="center">
<?php echo $row_room_pp['set_prices_date_b']; ?>
</td>


<td class="align-middle" align="center">
<?php echo $row_room_pp['name_prices_beds']; ?> - <?php echo $row_the_currencys_prim['symbol_currency']; ?>
</td>



<td class="align-middle" align="center">
<?php echo $row_room_pp['name_taxes']; ?> %
</td>


<td class="align-middle" align="center">
<?php echo $row_room_pp['name_discounts']; ?> %
</td>









<td class="align-middle" align="center">  

<div data-toggle="tooltip" data-placement="top" title="Delete Price." >
  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_room_pp['id_prices_beds'];  ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></button>      
</div>

</td>

<?php include("deletes/delete_bed_price_modal.php"); ?>


</tr>

<?php } while ($row_room_pp = mysqli_fetch_assoc($room_pp)); ?>     

    </tbody>

  </table> <!-- cierre tabla -->

</div> <!-- cierre div tabla responsiva -->

</div> <!-- cierre card body  aqui -->

                              












</div> <!-- cierre margencito -->














              
              </div><!-- cierre card-body -->
              </div><!-- cierre card mx-auto -->     


































                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

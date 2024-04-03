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

    $repit = "0";

    $guests_success = "";
    $guests_danger = "";



    $mi_hostel_select = $_SESSION['hostel_activo'];

    $book_year = $_GET['book_year'];
    $rango = $_GET['rango'];
    $amist_code = $_GET['amist_code'];

    $la_hora_rey = $_GET['hora_rey'];

    $id_pay = $_GET['id_papa'];




    $tax_cero = '0';
    $tax_encontrado = '10000';
    $cuentas_tax_tax = '0';


    $tax_cero_serv = '0';
    $tax_encontrado_serv = '10000';
    $cuentas_tax_tax_serv = '0';

    $el_unillo = '1';


    $del_tax_no_cero = '1';      // cambiara de valor en caso que se use un tax diferente a cero.
    $name_del_tax_no_cero = '0';      // cambiara de valor en caso que se use un tax diferente a cero.



    if(isset($_POST['editar_payme']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
    {
        $alerta_principal = "2";

        include("../conectar.php");  

        $id_del_registro_pagos = $_POST['editar_payme']; 

        $tot_hospedaje_tax_cero = $_POST['tot_hospedaje_tax_cero'];
        $tot_hospedaje_con_tax = $_POST['tot_hospedaje_con_tax'];  

        $tot_services_tax_cero = $_POST['tot_services_tax_cero'];  
        $tot_services_con_tax = $_POST['tot_services_con_tax'];  

        $id_tax_no_cero = $_POST['id_tax_no_cero'];  
        $monto_hospedaje_total = $_POST['monto_hospedaje_total'];  


        $primer_pago_hospedaje = $_POST['primer_pago_hospedaje']; 

        $deuda_hospedaje = ($monto_hospedaje_total-$primer_pago_hospedaje);

        $primer_pago_fecha = $_POST['primer_pago_fecha']; 
        $id_primer_pago_forma = $_POST['id_primer_pago_forma']; 
        $primer_pago_recibo = $_POST['primer_pago_recibo']; 

        $comentario_hospedaje = $_POST['comentario_hospedaje']; 



        $sql_payment = "UPDATE tb_payment_hospedaje SET tot_hospedaje_tax_cero = '$tot_hospedaje_tax_cero',
                                                        tot_hospedaje_con_tax = '$tot_hospedaje_con_tax',

                                                        tot_services_tax_cero = '$tot_services_tax_cero',
                                                        tot_services_con_tax = '$tot_services_con_tax',

                                                        id_tax_no_cero = '$id_tax_no_cero',
                                                        monto_hospedaje_total = '$monto_hospedaje_total',

                                                        primer_pago_hospedaje = '$primer_pago_hospedaje',
                                                        id_primer_pago_forma = '$id_primer_pago_forma',
                                                        primer_pago_fecha = '$primer_pago_fecha',
                                                        primer_pago_recibo = '$primer_pago_recibo',

                                                        comentario_hospedaje = '$comentario_hospedaje',
                                                        deuda_hospedaje = '$deuda_hospedaje'


                                         WHERE id_payment_hospedaje='$id_del_registro_pagos' LIMIT 1 ";

if (!mysqli_query($enlace,$sql_payment))      // actualiza y si no ha logrado ingresar los datos
{
 $errorZ="- Error Payment. ";
 mysqli_close($enlace);

 }

else{   // actualizo la info del pago

$sql_booking_updt = "UPDATE bed_booking SET booking_status = '2'

WHERE hora_rey= '$la_hora_rey'
and codigo_amistades = '$amist_code'  ";

$book_ck_ck = mysqli_query($enlace, $sql_booking_updt) or die(mysqli_error());





  $exitoZ="- Payment Save. ";
  mysqli_close($enlace);


    }

  }








    if(isset($_POST['editar_services']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
    {
        

        include("../conectar.php");  

        $id_booking = $_POST['editar_services']; 

        $ch_defaultCheck = $_POST['defaultCheck'];   // me da los id de los servicios seleccionados
        
        foreach ($ch_defaultCheck as $key) {

                                            // verificar que no exista un servicio igual ya agendado

                                            $price_A = "SELECT id_services_prices, id_services, set_this_day FROM tb_services_prices
                                            WHERE  id_services = '$key' ORDER BY set_this_day DESC limit 1";
                                            $datos_price_A = mysqli_query($enlace, $price_A) or die(mysqli_error());
                                            $row_datos_price_A = mysqli_fetch_assoc($datos_price_A);
                                  
                                            $find_price = mysqli_query($enlace, $price_A) or die(mysqli_error());
                                  
                                            $aqui_es = $row_datos_price_A['id_services_prices'];



        $query_ck_serv = "SELECT * FROM tb_guests_services_check_in WHERE id_hostel = '$mi_hostel_select'
                                                                    and id_bed_booking = '$id_booking'
                                                                    and id_del_servicio_check_in = '$key'
                                                                    and id_service_price_check_in = '$aqui_es' limit 1";
        $service_ck_ck = mysqli_query($enlace, $query_ck_serv) or die(mysqli_error());
        $row_service_ck_ck = mysqli_fetch_assoc($service_ck_ck);
        $totalRows_service_ck_ck = mysqli_num_rows($service_ck_ck);


        if ($totalRows_service_ck_ck >= '1') {
         
          $repit = $repit + 1;

        }


        else { 


          $query_services_add = "INSERT INTO tb_guests_services_check_in(id_hostel, id_bed_booking,
          id_del_servicio_check_in, id_service_price_check_in) 
     
         VALUES (   '$mi_hostel_select',
                    '$id_booking',
                    '$key',
                    '$aqui_es'                    
     
                 )";

            $listo_services = mysqli_query($enlace, $query_services_add) or die(mysqli_error());


        }




        }

        $exitoZ="- Services Have Been Saved. ";


        mysqli_close($enlace); 


    

    }

$good = '0';
$bad = '0';



    if(isset($_POST['borrar_service_serv']))
    {




$id_a_borrar = $_POST['borrar_service_serv'];

include("../conectar.php");  



$queryD = "DELETE FROM tb_guests_services_check_in WHERE id_guests_services_check_in = '$id_a_borrar' LIMIT 1";

if (!mysqli_query($enlace,$queryD))      // si no ha logrado borrar los datos de la data del hostel
   {
       $bad = $bad +1;
       mysqli_close($enlace); 
    }


    else {
       $good = $good +1;
       mysqli_close($enlace); 

    }

    }




 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-bolt-lightning fa-lg "></i> &nbsp; &nbsp; Check-In "3" - Services.
                </div> 

 

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-9 col-lg-9 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-9 col-lg-9 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
            </div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->



            <div class="card mx-auto">
              <div class="card-body">
      
                       
<form  method="POST" data-persist="garlic"  data-expires="360" enctype="multipart/form-data"  name="add_user">                           


                            <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Guest List: </b>            

                        <?php 
                          if ($guests_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$user_success."</i>"; }
                        ?>

                        <?php 
                          if ($guests_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$user_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->





<?php

include ("../conectar.php");

$queryFHL = "SELECT * FROM tb_guests, bed_booking, tb_room, tb_data_guests
where tb_guests.id_guests = bed_booking.id_guests
and bed_booking.id_room = tb_room.id_room
and tb_guests.id_guests = tb_data_guests.id_guests
and bed_booking.booking_year = '$book_year'
and bed_booking.date_range = '$rango'
and bed_booking.codigo_amistades = '$amist_code'
and bed_booking.hora_rey = '$la_hora_rey'

ORDER BY bed_booking.amistad_rey DESC, tb_room.id_room_kind DESC";

$huespedes = mysqli_query($enlace, $queryFHL) or die(mysqli_error());
$row_huespedes = mysqli_fetch_assoc($huespedes);
$totalRows_huespedes = mysqli_num_rows($huespedes);

mysqli_close($enlace);

$qty = '0';

$sub_total_beds = '0';

$sub_total_beds_services_sub = '0';




$sub_total_camas_con_tax_a = '0';        // almacena el total con descuento de los que no pagan impuesto
$sub_total_camas_con_tax_b = '0';  // de los que si pagan impuesto




$sub_total_servicios_con_tax_a = '0';        // almacena el total con descuento de los que no pagan impuesto
$sub_total_servicios_con_tax_b = '0';  // de los que si pagan impuesto


?>








<div class="form-row margencito">   
      
<table class="table table-sm table-hover table-bordered mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Guest</th>
      <th scope="col">Room/Bed</th>
      <th scope="col">Cost-Night</th>
      <th scope="col">Discount</th> 
      <th scope="col">Tax</th> 
      <th scope="col">Sub</th> 
      <th scope="col">Plus</th>
      <th scope="col"><i class="fa-solid fa-bars fa-lg"></i></th>

    </tr>
  </thead>
  <tbody>


  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->        
    <tr>

    <?php

include ("../conectar.php");


$este_lo_registro = $row_huespedes['guests_register_by'];

$queryFH_whoL = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro' limit 1";

$usuarios_whoL = mysqli_query($enlace, $queryFH_whoL) or die(mysqli_error());

$row_usuarios_whoL = mysqli_fetch_assoc($usuarios_whoL);

mysqli_close($enlace);


?>




      <td class="align-middle" align="center" >
      <?php  $qty=$qty +1; echo $qty;?> 
      </td>


      <td class="align-middle" align="center" >


<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >

    <b style="color:orange;">Doc:</b> <?php echo $row_huespedes['guests_doc_id'];?> <br><?php echo $row_huespedes['p_name_g'];?>
    <br><span style="color:purple;"><?php echo $row_huespedes['guests_email'];?></span>
    <br><i class="fa-solid fa-phone"></i> : <?php echo $row_huespedes['guests_phone'];?>

</div>



      </td>

      <td class="align-middle" align="center" >

<b>Room:</b><?php          

$book= '';

include ("../conectar.php");

$y_rom = $row_huespedes['id_room_number'];
$y_rom_type = $row_huespedes['id_room_kind']; 
$y_floor = $row_huespedes['id_floors'];
$y_bed = $row_huespedes['id_room_bed'];

$y_noches = $row_huespedes['nights'];

$y_status = $row_huespedes['booking_status'];

if ($y_status == '1') {
  $book = 'Reserved';
}

if ($y_status == '2') {
  $book = 'In Use';
}



$queryFH_room = "SELECT * FROM room_number
WHERE id_room_number = '$y_rom'
 limit 1";
$usuarios_room = mysqli_query($enlace, $queryFH_room) or die(mysqli_error());
$row_usuarios_room = mysqli_fetch_assoc($usuarios_room);


$queryFH_room_type = "SELECT * FROM room_kind
WHERE id_room_kind = '$y_rom_type'
 limit 1";
$usuarios_room_type = mysqli_query($enlace, $queryFH_room_type) or die(mysqli_error());
$row_usuarios_room_type = mysqli_fetch_assoc($usuarios_room_type);



$queryFH_floor = "SELECT * FROM floors 
WHERE id_floors = '$y_floor' limit 1";
$usuarios_floor = mysqli_query($enlace, $queryFH_floor) or die(mysqli_error());
$row_usuarios_floor = mysqli_fetch_assoc($usuarios_floor);


$query_rb = "SELECT * FROM bed_booking, tb_rooms_beds, bed_number
WHERE bed_booking.id_room_bed = tb_rooms_beds.id_rooms_beds
and tb_rooms_beds.id_bed_number = bed_number.id_bed_number
and tb_rooms_beds.id_rooms_beds = '$y_bed' limit 1";
$usuarios_rb = mysqli_query($enlace, $query_rb) or die(mysqli_error());
$row_usuarios_rb = mysqli_fetch_assoc($usuarios_rb);




$query_bed_price = "SELECT * FROM tb_prices_beds, taxes, discounts
where tb_prices_beds.id_room_kind = '$y_rom_type'
and tb_prices_beds.taxes_beds = taxes.id_taxes
and tb_prices_beds.discount_beds = discounts.id_discounts
order by tb_prices_beds.set_prices_date_b desc limit 1";
$usuarios_bed_price = mysqli_query($enlace, $query_bed_price) or die(mysqli_error());
$row_usuarios_bed_price = mysqli_fetch_assoc($usuarios_bed_price);


$query_exchange_1 = "SELECT * FROM exchange_rates, currency
where exchange_rates.id_hostel = '$mi_hostel_select'
and exchange_rates.id_hostel_currency = currency.id_currency
order by exchange_rates.all_set_this_time desc limit 1";
$usuarios_exchange_1 = mysqli_query($enlace, $query_exchange_1) or die(mysqli_error());
$row_usuarios_exchange_1 = mysqli_fetch_assoc($usuarios_exchange_1);



$sub_bed = ($row_usuarios_bed_price['name_prices_beds'] * $y_noches);


 if ($row_usuarios_bed_price['name_discounts'] == '0') {

  $por = '';
  $disc = '';
  $show = '0';
  $porcentaje = '';
  $palabra = '';
  $igual = '';

  $disc_sub_bed = $sub_bed;
  $english_disc_sub_bed_up = number_format($disc_sub_bed, 2, '.', '');
  $english_disc_sub_bed_down = $english_disc_sub_bed_up;

}

else {

  $por = 'x';
  $disc = $row_usuarios_bed_price['name_discounts'];
  $show = '1';
  $porcentaje = '%';
  $palabra = 'Off';
  $igual = '=';

  $disc_sub_bed = $sub_bed - ( ($sub_bed / 100)*$row_usuarios_bed_price['name_discounts']);
  $english_disc_sub_bed_up = number_format($disc_sub_bed, 2, '.', '');
  $english_disc_sub_bed_down = $english_disc_sub_bed_up;

 }


 if ($row_usuarios_bed_price['name_taxes'] == '0') {
  $tax_sub_bed = '0';
  $cuenta_tax = '0';
  $english_tax = '0';

  $sub_total_camas_con_tax_a =  $sub_total_camas_con_tax_a + $disc_sub_bed;  // lleva solo la suma de los que no pagan tax

}

else {
  $tax_sub_bed = $row_usuarios_bed_price['name_taxes'];
  $cuenta_tax = (($english_disc_sub_bed_up / 100)*$row_usuarios_bed_price['name_taxes']);
  $english_tax = number_format($cuenta_tax, 2, '.', '');

  $sub_total_camas_con_tax_b =  $sub_total_camas_con_tax_b + $disc_sub_bed; // lleva suma de los q pagan tax


  $del_tax_no_cero = $row_usuarios_bed_price['id_taxes'];
  $name_del_tax_no_cero = $row_usuarios_bed_price['name_taxes'];


 }




 $sub_tax_y_disc_a = ($cuenta_tax + $disc_sub_bed);
 $english_sub_total = number_format($sub_tax_y_disc_a, 2, '.', '');



mysqli_close($enlace);

echo $row_usuarios_room['name_room_number'];?>,<br><?php echo $row_usuarios_room_type['name_room_kind'];?> <br>
<b style="color:orange;"><?php echo $row_usuarios_floor['name_floors'];?></b>.<br>
<b>Bed:</b> <?php echo $row_usuarios_rb['name_bed_number'];?>, Lv:<?php echo $row_usuarios_rb['id_bunk_level'];?>, <br> <b style="color:grey;"><?php echo $book;?></b>. 

      </td>





      <td class="align-middle" align="right" >

      <?php echo $row_usuarios_bed_price['name_prices_beds'];?> x <?php echo $y_noches;?><br>
     <b style="font-size:10px;"> ( <?php echo $sub_bed;?> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> )</b> 





      </td>

      <td class="align-middle" align="right" >

<span <?php if ( $show =='0' ){?>style="display:none"<?php } ?>   > 

      <b><span style="color:orange;" > <?php echo $disc;?> <?php echo $porcentaje;?> <?php echo $palabra;?></span></b>
    <br> <b style="font-size:10px;"  >
    
    ( <?php echo $english_disc_sub_bed_up;?> )</b> </span>

      </td>

      <td class="align-middle" align="center" >

      <?php echo $tax_sub_bed;
      
      // para detectar si existen mas de dos impuestos diferentes que no sean cero.
      
      if($tax_sub_bed != $tax_cero ) {

        if($tax_sub_bed != $tax_encontrado)  { 

     $tax_encontrado = $tax_sub_bed;

     $cuentas_tax_tax = $cuentas_tax_tax + $el_unillo;   // si llega a dos es porque cambio mas de una vez

   }

    }
      
      
    if ($cuentas_tax_tax  >= "2") {

      echo '<script type="text/javascript">';
       echo 'setTimeout(function () {
     
        swal({
       title: "",
       type: "error",
       html: "More than two different taxes (other than zero) have been placed. Correct Room Taxes.",
       icon: "error",
     });'
     
     ;
       echo '}, 1000);</script>';  
     
     } 
      
      
      
      
      
      
      ?> % <br>


        <span style="font-size:10px;" > ( <b style="color:purple;" ><?php echo $english_tax;?> </b> )</span>

      </td>


      
      <td class="align-middle" align="center" >

      <?php

$sub_total_beds = $sub_total_beds + $english_sub_total;

echo $english_sub_total;?><br><?php echo $row_usuarios_exchange_1['symbol_currency'];?> 



      </td>

<?php

$my_booking = $row_huespedes['id_bed_booking'];

include ("../conectar.php");

$services_listos = "SELECT * FROM tb_guests_services_check_in, tb_services, productos
WHERE tb_guests_services_check_in.id_del_servicio_check_in = tb_services.id_services
and tb_services.id_producto = productos.id_producto
and tb_guests_services_check_in.id_bed_booking = '$my_booking'
order by tb_services.id_services asc";
$query_services_listos = mysqli_query($enlace, $services_listos) or die(mysqli_error());
$row_usuarios_services_listos = mysqli_fetch_assoc($query_services_listos);
$totalRows_services_listos = mysqli_num_rows($query_services_listos);

mysqli_close($enlace);

$new_services_sub = '0';


?>






      <td class="align-middle" align="center" style="font-size:12px;" >


<table class="table table-sm table-striped" <?php if ( $totalRows_services_listos == '0' ){?>style="display:none"<?php } ?> >
 
  <tbody>

  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   

    <tr>

    <td>


    <span data-toggle="tooltip" data-placement="top" title="Remove" >
  <a href="" class="btn-danger"
  data-toggle="modal"
 data-target="#delete_service<?php echo $row_usuarios_services_listos['id_guests_services_check_in']; ?>"
  
  ><i class="fa-solid fa-eraser"></i></a></span>

  <?php include("deletes/delete_service_serv.php"); ?>


    </td>

      <td><?php
      
      $productiviris = $row_usuarios_services_listos['id_services'];
    
      include ("../conectar.php");
      
      $query_services_pa = "SELECT * FROM tb_services_prices, discounts, taxes
      where tb_services_prices.id_services = '$productiviris'
      and tb_services_prices.discount_type = discounts.id_discounts
      and tb_services_prices.tax_services = taxes.id_taxes
      order BY tb_services_prices.set_this_day DESC limit 1";
      
      $services_pa = mysqli_query($enlace, $query_services_pa) or die(mysqli_error());
      $row_services_pa = mysqli_fetch_assoc($services_pa);
      $totalRows_services_pa = mysqli_num_rows($services_pa);
      
      mysqli_close($enlace); 
      
      
$mi_price_pa = $row_services_pa['the_price'];

$sub_price_serv_pa = ($mi_price_pa * $y_noches);

$english_price_serv_pa = number_format($sub_price_serv_pa, 2, '.', '');




if ($row_services_pa['name_discounts'] == '0') {

  $por_da = '';
  $disc_da = '';
  $show_da = '0';
  $porcentaje_da = '';
  $palabra_da = '';
  $igual_da = '';

  $disc_sub_bed_da = $english_price_serv_pa;
  $english_disc_sub_bed_up_da = number_format($disc_sub_bed_da, 2, '.', '');
  $english_disc_sub_bed_down_da = $english_price_serv_pa;

}

else {

  $por_da = 'x';
  $disc_da = $row_services_pa['name_discounts'];
  $show_da= '1';
  $porcentaje_da = '%';
  $palabra_da = 'Off';
  $igual_da = '=';

  $disc_sub_bed_da = $english_price_serv_pa - ( ($english_price_serv_pa / 100) * $row_services_pa['name_discounts'] );
  $english_disc_sub_bed_up_da = number_format($disc_sub_bed_da, 2, '.', '');
  $english_disc_sub_bed_down_da = $english_disc_sub_bed_up_da;

 }



 
if ($row_services_pa['name_taxes'] == '0') {
  $tax_sub_bed_ta = '0';
  $cuenta_tax_ta = '0';
  $english_tax_ta = '0';


  $sub_total_servicios_con_tax_a =  $sub_total_servicios_con_tax_a + $english_disc_sub_bed_up_da;  // lleva solo la suma de los que no pagan tax

}

else {
  $tax_sub_bed_ta = $row_services_pa['name_taxes'];
  $cuenta_tax_ta = (($english_disc_sub_bed_up_da / 100)*$row_services_pa['name_taxes']);
  $english_tax_ta = number_format($cuenta_tax_ta, 2, '.', '');

  $sub_total_servicios_con_tax_b =  $sub_total_servicios_con_tax_b + $english_disc_sub_bed_up_da;  // lleva la suma de los que pagan tax

 }


 $sub_total_beds_services_pa = $english_disc_sub_bed_up_da + $english_tax_ta;  
      
      
      
      echo $row_usuarios_services_listos['name_producto'];?></td>
      <td> <?php 
      
      $new_services_sub = $new_services_sub + $sub_total_beds_services_pa;
      
      
      echo $sub_total_beds_services_pa;?> </td>
     </tr>

    <?php } while ($row_usuarios_services_listos = mysqli_fetch_assoc($query_services_listos)); ?>

    <tr>
      <td colspan="2" class="align-middle" align="right"><b>Sub:</b></td>


      <td>

      <?php 
      
      $sub_total_beds_services_sub = $sub_total_beds_services_sub + $new_services_sub;
      
      
      echo $new_services_sub;?>

      </td>




     </tr>


  </tbody>
</table>



      </td>




      <td class="align-middle" align="center" >
        
           
    
      <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                  data-target="#services<?php echo $row_huespedes['id_guests'];?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                                                                        Services</button>    




<?php include("updates/update_services_guests.php"); ?>
    
    
    
    
    
    
    </td>



















    </tr>
   
    <?php } while ($row_huespedes = mysqli_fetch_assoc($huespedes)); ?>


    <tr>

    <td colspan="6" class="align-middle" style="padding-top: 20px; padding-bottom: 20px;" align="right" ><b>Sub-Total:</b></td> 

    <td class="align-middle" align="center" ><b><?php echo $sub_total_beds;?></b> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> <br> 
  
    <?php

include ("../conectar.php");

$query_exchange_a = "SELECT * FROM exchange_rates, currency
where exchange_rates.id_hostel = '$mi_hostel_select'
and exchange_rates.id_currency_A = currency.id_currency
order by exchange_rates.all_set_this_time desc limit 1";
$usuarios_exchange_a = mysqli_query($enlace, $query_exchange_a) or die(mysqli_error());
$row_usuarios_exchange_a = mysqli_fetch_assoc($usuarios_exchange_a);


$query_exchange_b = "SELECT * FROM exchange_rates, currency
where exchange_rates.id_hostel = '$mi_hostel_select'
and exchange_rates.id_currency_B = currency.id_currency
order by exchange_rates.all_set_this_time desc limit 1";
$usuarios_exchange_b = mysqli_query($enlace, $query_exchange_b) or die(mysqli_error());
$row_usuarios_exchange_b = mysqli_fetch_assoc($usuarios_exchange_b);


mysqli_close($enlace);


  
  $sub_total_beds_currency_a = ($sub_total_beds / $row_usuarios_exchange_a['currency_A_value']);

  $sub_total_beds_currency_b = ($sub_total_beds / $row_usuarios_exchange_b['currency_B_value']);

  $english_sub_total_a = number_format($sub_total_beds_currency_a, 2, '.', '');
  $english_sub_total_b = number_format($sub_total_beds_currency_b, 2, '.', '');




    ?> <b><?php echo $english_sub_total_a;?></b> <?php echo $row_usuarios_exchange_a['symbol_currency'];?> <br> 
    <b><?php echo $english_sub_total_b;?></b> <?php echo $row_usuarios_exchange_b['symbol_currency'];?>
  
  
  </td>



    <td  class="align-middle" align="center" >

    <b><?php
    
    
    $sub_total_beds_currency_a_serv = ($sub_total_beds_services_sub / $row_usuarios_exchange_a['currency_A_value']);

    $sub_total_beds_currency_b_serv = ($sub_total_beds_services_sub / $row_usuarios_exchange_b['currency_B_value']);
  
    $english_sub_total_a_serv = number_format($sub_total_beds_currency_a_serv, 2, '.', '');
    $english_sub_total_b_serv = number_format($sub_total_beds_currency_b_serv, 2, '.', '');
    
    
    
    
    echo $sub_total_beds_services_sub;?></b> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> <br>

<b><?php echo $english_sub_total_a_serv;?></b> <?php echo $row_usuarios_exchange_a['symbol_currency'];?> <br> 
    <b><?php echo $english_sub_total_b_serv;?></b> <?php echo $row_usuarios_exchange_b['symbol_currency'];?> 

    </td>



    <td  class="align-middle" align="center" >
    </td>

    </tr>






    <tr>

    <td colspan="6" class="align-middle" style="padding-top: 40px; padding-bottom: 40px;" align="right" ><b>Total:</b></td> 




    <td colspan="2" class="align-middle" align="center" >
      
    



    
    
    
    
    <b><?php
    
    $total_total = $sub_total_beds + $sub_total_beds_services_sub;
    
    
    echo $total_total;?> </b> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> <br> 
  
  <?php

include ("../conectar.php");

$query_exchange_a = "SELECT * FROM exchange_rates, currency
where exchange_rates.id_hostel = '$mi_hostel_select'
and exchange_rates.id_currency_A = currency.id_currency
order by exchange_rates.all_set_this_time desc limit 1";
$usuarios_exchange_a = mysqli_query($enlace, $query_exchange_a) or die(mysqli_error());
$row_usuarios_exchange_a = mysqli_fetch_assoc($usuarios_exchange_a);


$query_exchange_b = "SELECT * FROM exchange_rates, currency
where exchange_rates.id_hostel = '$mi_hostel_select'
and exchange_rates.id_currency_B = currency.id_currency
order by exchange_rates.all_set_this_time desc limit 1";
$usuarios_exchange_b = mysqli_query($enlace, $query_exchange_b) or die(mysqli_error());
$row_usuarios_exchange_b = mysqli_fetch_assoc($usuarios_exchange_b);


mysqli_close($enlace);



$sub_total_beds_currency_a = ($total_total / $row_usuarios_exchange_a['currency_A_value']);

$sub_total_beds_currency_b = ($total_total / $row_usuarios_exchange_b['currency_B_value']);

$english_sub_total_a = number_format($sub_total_beds_currency_a, 2, '.', '');
$english_sub_total_b = number_format($sub_total_beds_currency_b, 2, '.', '');




  ?> <b><?php echo $english_sub_total_a;?></b> <?php echo $row_usuarios_exchange_a['symbol_currency'];?> <br> 
  <b><?php echo $english_sub_total_b;?></b> <?php echo $row_usuarios_exchange_b['symbol_currency'];?>







</td>

<td class="align-middle" align="center">


<span <?php if ( $alerta_principal != '0' ){?>style="display:none"<?php } ?> >  <!-- en caso de agendar un monto oculta el boton -->

<button type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal"
                  data-target="#payme<?php echo $id_pay;?>" >                                                                       
                  <i class="fa-solid fa-cash-register fa-2x"></i></button>    

</span>


<?php include("updates/update_pay_beds_guests.php"); ?>
    

<span <?php if ( $alerta_principal == '0' ){?>style="display:none"<?php } ?> >  <!-- en caso de agendar un monto oculta el boton -->

<button type="button" class="btn btn-success btn-block btn-sm"  >                                                                       
                  View</button>    

</span>



</td>


    </tr>


    
  </tbody>
</table>



</div>   <!-- cierre margencito-->











                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

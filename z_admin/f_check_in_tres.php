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



    $guests_success = "";
    $guests_danger = "";



    $mi_hostel_select = $_SESSION['hostel_activo'];

    $book_year = $_GET['book_year'];
    $rango = $_GET['rango'];
    $amist_code = $_GET['amist_code'];

    $la_hora_rey = $_GET['hora_rey'];








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

ORDER BY bed_booking.amistad_rey DESC";

$huespedes = mysqli_query($enlace, $queryFHL) or die(mysqli_error());
$row_huespedes = mysqli_fetch_assoc($huespedes);
$totalRows_huespedes = mysqli_num_rows($huespedes);

mysqli_close($enlace);

$qty = '0';

$sub_total_beds = '0';

?>








<div class="form-row margencito">   
      
<table class="table table-sm table-hover table-bordered mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Guest - Info</th>
      <th scope="col">Room/Bed - Info</th>
      <th scope="col">Services</th>
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
    <br><i class="fa-solid fa-at"></i>: <span style="color:purple;"><?php echo $row_huespedes['guests_email'];?></span>
    <br><i class="fa-solid fa-phone"></i>: <?php echo $row_huespedes['guests_phone'];?>

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
  $porcentaje = '';
  $palabra = '';
  $igual = '';

  $disc_sub_bed = $sub_bed;
  $english_disc_sub_bed_up = '';
  $english_disc_sub_bed_down = $sub_bed;

}

else {

  $por = 'x';
  $disc = $row_usuarios_bed_price['name_discounts'];
  $porcentaje = '%';
  $palabra = 'Off';
  $igual = '=';

  $disc_sub_bed = $sub_bed - ($sub_bed / $row_usuarios_bed_price['name_discounts']);
  $english_disc_sub_bed_up = number_format($disc_sub_bed, 2, '.', '');
  $english_disc_sub_bed_down = $english_disc_sub_bed_up;

 }


 if ($row_usuarios_bed_price['name_taxes'] == '0') {
  $tax_sub_bed = '0';
  $cuenta_tax = '0';
  $english_tax = '0';
}

else {
  $tax_sub_bed = $row_usuarios_bed_price['name_taxes'];
  $cuenta_tax = ($sub_bed / $row_usuarios_bed_price['name_taxes']);
  $english_tax = number_format($cuenta_tax, 2, '.', '');
 }




 $sub_tax_y_disc_a = ($cuenta_tax + $disc_sub_bed);
 $english_sub_total = number_format($sub_tax_y_disc_a, 2, '.', '');







mysqli_close($enlace);

echo $row_usuarios_room['name_room_number'];?>  - <b>Type:</b> <?php echo $row_usuarios_room_type['name_room_kind'];?> <br>
<b style="color:orange;"><?php echo $row_usuarios_floor['name_floors'];?></b><br>
<b>Bed:</b> <?php echo $row_usuarios_rb['name_bed_number'];?>, Lv:<?php echo $row_usuarios_rb['id_bunk_level'];?>  - <b><?php echo $book;?></b> <br><br>

<?php echo $row_usuarios_bed_price['name_prices_beds'];?> x <?php echo $y_noches;?> Night(s) = <b><?php echo $sub_bed;?></b> 
 <b><?php echo $por;?><span style="color:orange;"> <?php echo $disc;?> <?php echo $porcentaje;?> <?php echo $palabra;?></b></span> <?php echo $igual;?> <b><?php echo $english_disc_sub_bed_up;?></b>

<br><?php echo $english_disc_sub_bed_down;?> + <span style="color:purple;"><b><?php echo $english_tax;?> Tax</b></span> (<?php echo $tax_sub_bed;?>%) = <?php

$sub_total_beds = $sub_total_beds + $english_sub_total;

echo $english_sub_total;?>  <?php echo $row_usuarios_exchange_1['symbol_currency'];?>

      </td>








      <td class="align-middle" align="center" ></td>

      <td class="align-middle" align="center" ><button type="button" class="btn btn-info btn-sm">Add or Mod Services</button></td>

    </tr>
   
    <?php } while ($row_huespedes = mysqli_fetch_assoc($huespedes)); ?>


    <tr>

    <td colspan="2" class="align-middle" style="padding-top: 20px; padding-bottom: 20px;" align="right" ><b>Sub-Total:</b></td> 

    <td class="align-middle" align="center" ><b><?php echo $sub_total_beds;?></b> <?php echo $row_usuarios_exchange_1['symbol_currency'];?> - 
  
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




    ?> <b><?php echo $english_sub_total_a;?></b> <?php echo $row_usuarios_exchange_a['symbol_currency'];?> - 
    <b><?php echo $english_sub_total_b;?></b> <?php echo $row_usuarios_exchange_b['symbol_currency'];?>
  
  
  </td>



    <td class="align-middle" align="center" ></td>
    <td class="align-middle" align="center" ></td>


    </tr>


    
  </tbody>
</table>



</div>   <!-- cierre margencito-->











                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

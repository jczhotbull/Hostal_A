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

        $deuda_hospedaje = ($monto_hospedaje_total-$primer_pago_hospedaje);  // solo estara certero tras cada pago

        $primer_pago_fecha = $_POST['primer_pago_fecha']; 
        $id_primer_pago_forma = $_POST['id_primer_pago_forma']; 
        $primer_pago_recibo = $_POST['primer_pago_recibo']; 

        $comentario_hospedaje = $_POST['comentario_hospedaje']; 


      /*  $url =  isset($_SERVER['HTTPS']) && 
        $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";   
     
        $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  */

        $url = $_SERVER['REQUEST_URI'];    // salvo el link no el host, luego se completa

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
                                                        deuda_hospedaje = '$deuda_hospedaje',
                                                        link_payment = '$url'


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














  if(isset($_POST['editar_payme_dos']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
  {
      $alerta_principal = "2";

      include("../conectar.php");  

      $id_del_registro_pagos = $_POST['editar_payme_dos']; 

      $tot_hospedaje_tax_cero = $_POST['tot_hospedaje_tax_cero'];
      $tot_hospedaje_con_tax = $_POST['tot_hospedaje_con_tax'];  

      $tot_services_tax_cero = $_POST['tot_services_tax_cero'];  
      $tot_services_con_tax = $_POST['tot_services_con_tax'];  

      $id_tax_no_cero = $_POST['id_tax_no_cero'];  
      $monto_hospedaje_total = $_POST['monto_hospedaje_total'];  


      $primer_pago_hospedaje = $_POST['monto_primer_pago']; 

      $segundo_pago_hospedaje = $_POST['segundo_pago_hospedaje']; 
      
      $suma_par = ($primer_pago_hospedaje + $segundo_pago_hospedaje);


      $deuda_hospedaje = ($monto_hospedaje_total-$suma_par);

      $segundo_pago_fecha = $_POST['segundo_pago_fecha']; 
      $id_segundo_pago_forma = $_POST['id_segundo_pago_forma']; 
      $segundo_pago_recibo = $_POST['segundo_pago_recibo']; 

      $comentario_hospedaje = $_POST['comentario_hospedaje']; 




      $sql_payment = "UPDATE tb_payment_hospedaje SET tot_hospedaje_tax_cero = '$tot_hospedaje_tax_cero',
                                                      tot_hospedaje_con_tax = '$tot_hospedaje_con_tax',

                                                      tot_services_tax_cero = '$tot_services_tax_cero',
                                                      tot_services_con_tax = '$tot_services_con_tax',

                                                      id_tax_no_cero = '$id_tax_no_cero',
                                                      monto_hospedaje_total = '$monto_hospedaje_total',

                                                      segundo_pago_hospedaje = '$segundo_pago_hospedaje',
                                                      id_segundo_pago_forma = '$id_segundo_pago_forma',
                                                      segundo_pago_fecha = '$segundo_pago_fecha',
                                                      segundo_pago_recibo = '$segundo_pago_recibo',

                                                      comentario_hospedaje = '$comentario_hospedaje',
                                                      deuda_hospedaje = '$deuda_hospedaje'
                                                    


                                       WHERE id_payment_hospedaje='$id_del_registro_pagos' LIMIT 1 ";

if (!mysqli_query($enlace,$sql_payment))      // actualiza y si no ha logrado ingresar los datos
{
$errorZ="- Error Payment. ";
mysqli_close($enlace);

}

else{   // actualizo la info del pago


$exitoZ="- 2nd Payment Save. ";
mysqli_close($enlace);


  }

}















if(isset($_POST['editar_payme_tres']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";

    include("../conectar.php");  

    $id_del_registro_pagos = $_POST['editar_payme_last']; 

    $tot_hospedaje_tax_cero = $_POST['tot_hospedaje_tax_cero'];
    $tot_hospedaje_con_tax = $_POST['tot_hospedaje_con_tax'];  

    $tot_services_tax_cero = $_POST['tot_services_tax_cero'];  
    $tot_services_con_tax = $_POST['tot_services_con_tax'];  

    $id_tax_no_cero = $_POST['id_tax_no_cero'];  
    $monto_hospedaje_total = $_POST['monto_hospedaje_total'];  


    $primer_pago_hospedaje = $_POST['monto_primer_pago']; 

    $segundo_pago_hospedaje = $_POST['monto_segundo_pago']; 

    $tercer_pago_hospedaje = $_POST['tercer_pago_hospedaje'];
    
    $suma_par = ($primer_pago_hospedaje + $segundo_pago_hospedaje + $tercer_pago_hospedaje);


    $deuda_hospedaje = ($monto_hospedaje_total-$suma_par);

    $tercer_pago_fecha = $_POST['tercer_pago_fecha']; 
    $id_tercer_pago_forma = $_POST['id_tercer_pago_forma']; 
    $tercer_pago_recibo = $_POST['tercer_pago_recibo']; 

    $comentario_hospedaje = $_POST['comentario_hospedaje']; 




    $sql_payment = "UPDATE tb_payment_hospedaje SET tot_hospedaje_tax_cero = '$tot_hospedaje_tax_cero',
                                                    tot_hospedaje_con_tax = '$tot_hospedaje_con_tax',

                                                    tot_services_tax_cero = '$tot_services_tax_cero',
                                                    tot_services_con_tax = '$tot_services_con_tax',

                                                    id_tax_no_cero = '$id_tax_no_cero',
                                                    monto_hospedaje_total = '$monto_hospedaje_total',

                                                    tercer_pago_hospedaje = '$tercer_pago_hospedaje',
                                                    id_tercer_pago_forma = '$id_tercer_pago_forma',
                                                    tercer_pago_fecha = '$tercer_pago_fecha',
                                                    tercer_pago_recibo = '$tercer_pago_recibo',

                                                    comentario_hospedaje = '$comentario_hospedaje',
                                                    deuda_hospedaje = '$deuda_hospedaje'
                                                  


                                     WHERE id_payment_hospedaje='$id_del_registro_pagos' LIMIT 1 ";

if (!mysqli_query($enlace,$sql_payment))      // actualiza y si no ha logrado ingresar los datos
{
$errorZ="- Error Payment. ";
mysqli_close($enlace);

}

else{   // actualizo la info del pago


$exitoZ="- 3rd Payment Save. ";
mysqli_close($enlace);


}

}































if(isset($_POST['nothing']))  // sencillamente para recargar la pagina y borrar las variables
{

  $exitoZ = "";

}



if(isset($_POST['save_services_admin']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

  include("../conectar.php");  

  $id_del_servicio_adquirido = $_POST['save_services_admin'];

 $echo_por_este = $_SESSION['id_per'];

        $qtyyy = $_POST['qtyyy'];   // son 3 inputs   
        $comentariosss = $_POST['comentariosss'];
        $id_serrr = $_POST['id_serrr'];



        foreach ( $qtyyy as $keyyy => $qtyyys) {

          if ($qtyyys >= '1') {


            $query_services_mod = "INSERT INTO tb_historial_servicios_dados(id_guests_services_check_in,
            cantidad_dada, nota_de_entrega, id_quien_entrego, id_del_booking) 
          
           VALUES (   '$id_serrr[$keyyy]',
                      '$qtyyys',                     
                      '$comentariosss[$keyyy]',
                      ' $echo_por_este',
                      '$id_del_servicio_adquirido'               
          
                   )";
          
          $listo_services_mod = mysqli_query($enlace, $query_services_mod) or die(mysqli_error());



$query_cant_actual_pp = "SELECT id_guests_services_check_in, cant_recibida FROM tb_guests_services_check_in
 WHERE id_guests_services_check_in = '$id_serrr[$keyyy]' limit 1";

$service_cantidad_pp = mysqli_query($enlace, $query_cant_actual_pp) or die(mysqli_error());
$row_service_cantidad_pp = mysqli_fetch_assoc($service_cantidad_pp);


$tengo = $row_service_cantidad_pp['cant_recibida'];
          

          
          $newtotal_pp = $tengo + $qtyyys;



          $sumar_del_services = "UPDATE tb_guests_services_check_in SET cant_recibida = '$newtotal_pp' 
          WHERE id_guests_services_check_in = '$id_serrr[$keyyy]' LIMIT 1 ";
          $lista_sumar = mysqli_query($enlace, $sumar_del_services) or die(mysqli_error());






          }  /* cierre if */


          }  /* cierre for each */


          $exitoZ = "Updated History.";

          mysqli_close($enlace); 


}






    if(isset($_POST['editar_services']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
    {
        

        include("../conectar.php");  

        $id_booking = $_POST['editar_services'];    // para relacionarlo con la persona (una adquiere varios)


        $qty = $_POST['qty'];   // son 4 cadenas de inputs   
        $id_price = $_POST['id_price'];
        $id_ser = $_POST['id_ser'];
        $comentarios = $_POST['comentarios'];


        foreach ( $qty  as $key => $qtys) {

          if ($qtys >= '1') {
           
  /* $exitoZ.= '' . $qtys . '-' . $id_price[$key] . '-' . $id_ser[$key] . '-' . $comentarios[$key] . ',';   me permite ver si esta almacenando bien */


                   //  detectar si el servicio ya fue creado  (si fue creado actualizar aumentar total)

                   $query_ck_serv = "SELECT * FROM tb_guests_services_check_in WHERE id_hostel = '$mi_hostel_select'
                   and id_bed_booking = '$id_booking'
                   and id_del_servicio_check_in = '$id_ser[$key]'
                   and id_service_price_check_in = '$id_price[$key]' limit 1";
$service_ck_ck = mysqli_query($enlace, $query_ck_serv) or die(mysqli_error());
$row_service_ck_ck = mysqli_fetch_assoc($service_ck_ck);
$totalRows_service_ck_ck = mysqli_num_rows($service_ck_ck);


if ($totalRows_service_ck_ck >= '1') {

$repit = $repit + 1;

$id_a_actualizarse = $row_service_ck_ck['id_guests_services_check_in'];

$total_corrienteee = $row_service_ck_ck['cant_adquirida'];

$nueva_cuenta = $row_service_ck_ck['cant_adquirida'] + $qtys;


$sumar_del_services_ext = "UPDATE tb_guests_services_check_in SET cant_adquirida = '$nueva_cuenta',
                                                                    service_note = '$comentarios[$key]' 
WHERE id_guests_services_check_in = '$id_a_actualizarse' LIMIT 1 ";
$lista_sumar_ext = mysqli_query($enlace, $sumar_del_services_ext) or die(mysqli_error());


/* actualizar la cantidad disponible del servicio */


$query_cant_actual_vax = "SELECT id_services, service_qty FROM tb_services WHERE id_services = '$id_ser[$key]' limit 1";
$service_cantidad_vax = mysqli_query($enlace, $query_cant_actual_vax) or die(mysqli_error());
$row_service_cantidad_vax = mysqli_fetch_assoc($service_cantidad_vax);


$tenemos_vax = $row_service_cantidad_vax['service_qty'];
$solicitados_vax = $qtys;

$newtotal_vax = $tenemos_vax - $solicitados_vax;



$restar_del_services_vax = "UPDATE tb_services SET service_qty = '$newtotal_vax' WHERE id_services = '$id_ser[$key]' LIMIT 1 ";
$lista_resta_vax = mysqli_query($enlace, $restar_del_services_vax) or die(mysqli_error());




$exitoZ .= "- The Quantity Has Been Updated. ";

}



else  {
       
  $query_services_add = "INSERT INTO tb_guests_services_check_in(id_hostel, id_bed_booking,
  id_del_servicio_check_in, id_service_price_check_in, cant_adquirida, service_note) 

 VALUES (   '$mi_hostel_select',
            '$id_booking',
            '$id_ser[$key]',
            '$id_price[$key]',
            '$qtys',
            '$comentarios[$key]'                

         )";

$listo_services = mysqli_query($enlace, $query_services_add) or die(mysqli_error());



$query_cant_actual = "SELECT id_services, service_qty FROM tb_services WHERE id_services = '$id_ser[$key]' limit 1";
$service_cantidad = mysqli_query($enlace, $query_cant_actual) or die(mysqli_error());
$row_service_cantidad = mysqli_fetch_assoc($service_cantidad);


$tenemos = $row_service_cantidad['service_qty'];
$solicitados = $qtys;

$newtotal = $tenemos - $solicitados;



$restar_del_services = "UPDATE tb_services SET service_qty = '$newtotal' WHERE id_services = '$id_ser[$key]' LIMIT 1 ";
$lista_resta = mysqli_query($enlace, $restar_del_services) or die(mysqli_error());


}


                         }  /* cierre detector de cantidades mayores a 1 */
       

        }   /* cierre del loop */


        $exitoZ .= "- New Services Saved.";

        mysqli_close($enlace); 
    

    }


















$good = '0';
$bad = '0';



    if(isset($_POST['borrar_service_serv']))
    {

      include("../conectar.php");  


$id_a_borrar = $_POST['borrar_service_serv'];


$id_del_servicio_a_borrar = $_POST['service_id'];   // para aumentar stock
$quedan_estos = $_POST['quedan'];   // para aumentar stock




$queryD = "DELETE FROM tb_guests_services_check_in WHERE id_guests_services_check_in = '$id_a_borrar' LIMIT 1";

if (!mysqli_query($enlace,$queryD))      // si no ha logrado borrar los datos de la data del hostel
   {
       $bad = $bad +1;
      
    }


    else {
       $good = $good +1;
      

    }


    $query_cant_actual = "SELECT id_services, service_qty FROM tb_services WHERE id_services = '$id_del_servicio_a_borrar' limit 1";
    $service_cantidad = mysqli_query($enlace, $query_cant_actual) or die(mysqli_error());
    $row_service_cantidad = mysqli_fetch_assoc($service_cantidad);
        
    $tenemos = $row_service_cantidad['service_qty'];
    $newtotal_a = $tenemos + $quedan_estos;

    $aumentar_del_services = "UPDATE tb_services SET service_qty = '$newtotal_a' WHERE id_services = '$id_del_servicio_a_borrar' LIMIT 1 ";
    $lista_aumenta = mysqli_query($enlace, $aumentar_del_services) or die(mysqli_error());



    $exitoZ = "Services Removed.";
    mysqli_close($enlace); 



    }










    if(isset($_POST['borrar_service_serv_restantes']))
    {

      include("../conectar.php");  


$id_a_borrar = $_POST['borrar_service_serv_restantes'];


$id_del_servicio_a_borrar = $_POST['service_id'];   // para aumentar stock
$quedan_estos = $_POST['quedan'];   // para aumentar stock

$disfrutados = $_POST['disfrutados'];   // para restablecer el total deseado


/* debo actualizar la cantidad que realmente desea el huesped, sera lo que ya consumio */

$queryD_update = "UPDATE tb_guests_services_check_in SET cant_adquirida = '$disfrutados'
 WHERE id_guests_services_check_in = '$id_a_borrar' LIMIT 1 ";

if (!mysqli_query($enlace,$queryD_update))      // si no ha logrado borrar los datos de la data del hostel
   {
       $bad = $bad +1;
      
    }

    else {
       $good = $good +1;
      
    }





    $query_cant_actual = "SELECT id_services, service_qty FROM tb_services WHERE id_services = '$id_del_servicio_a_borrar' limit 1";
    $service_cantidad = mysqli_query($enlace, $query_cant_actual) or die(mysqli_error());
    $row_service_cantidad = mysqli_fetch_assoc($service_cantidad);
        
    $tenemos = $row_service_cantidad['service_qty'];
    $newtotal_a = $tenemos + $quedan_estos;

    $aumentar_del_services = "UPDATE tb_services SET service_qty = '$newtotal_a' WHERE id_services = '$id_del_servicio_a_borrar' LIMIT 1 ";
    $lista_aumenta = mysqli_query($enlace, $aumentar_del_services) or die(mysqli_error());



    $exitoZ = "Service Update.";
    mysqli_close($enlace); 



    }












 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">



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
















              <div class="form-row"> 

                <div class="alert col-md-5 col-lg-5 alert-primary" role="alert">
                    <i class="fa-regular fa-rectangle-list fa-lg "></i> &nbsp;<b><?php echo $row_huespedes['nights'];?></b> Night(s), from <b><?php echo $row_huespedes['date_in'];?></b> to <b><?php echo $row_huespedes['date_out'];?></b>.
                </div> 

 

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-7 col-lg-7 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-7 col-lg-7 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
            </div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->









<div class="card-body border border-info mb-2" >
<div class="table-responsive">
      
<table class="table table-sm table-hover table-bordered mt-4">
  <thead>
    <tr>

      <th scope="col">Guest</th>
      <th scope="col">Room/Bed</th>
      <td><b style="font-size:12px;">Cost x Night</b></td>
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

      
<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >

<b> <span style="font-size:10px;">#</span><?php  $qty=$qty +1; echo $qty;?>.</b> <br><br>
 <b style="color:orange;">Doc:</b> <?php echo $row_huespedes['guests_doc_id'];?> <br><?php echo $row_huespedes['p_name_g'];?>
    <br><span style="color:purple; font-size:14px;"><?php echo $row_huespedes['guests_email'];?></span>
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
<span style="font-size:14px;"><b>Bed:</b> <?php echo $row_usuarios_rb['name_bed_number'];?>, Lv:<?php echo $row_usuarios_rb['id_bunk_level'];?></span>, <br> <b style="color:grey;"><?php echo $book;?></b>. 

      </td>





      <td class="align-middle" align="right" >

      <?php echo $row_usuarios_bed_price['name_prices_beds'];?> x<?php echo $y_noches;?><br>
     <b style="font-size:10px;"> <?php echo $sub_bed;?> <?php echo $row_usuarios_exchange_1['symbol_currency'];?></b> 





      </td>

      <td class="align-middle" align="right" >

<span <?php if ( $show =='0' ){?>style="display:none"<?php } ?>   > 

      <b><span style="color:orange;" > <?php echo $disc;?> <?php echo $porcentaje;?> <?php echo $palabra;?></span></b>
    <br> <b style="font-size:10px;"  >
    
    <?php echo $english_disc_sub_bed_up;?></b> </span>

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
      
      
      
      
      
      
      ?>%<br>


        <span style="font-size:10px;" ><b style="color:purple;" ><?php echo $english_tax;?> </b></span>

      </td>


      
      <td class="align-middle" align="center" >

      <?php

$sub_total_beds = $sub_total_beds + $english_sub_total;

echo $english_sub_total;?><br> <span style="font-size:10px;"><b><?php echo $row_usuarios_exchange_1['symbol_currency'];?></b></span>



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






      <td class="align-middle" align="center"  >


<table class="table table-sm table-striped" <?php if ( $totalRows_services_listos == '0' ){?>style="display:none"<?php } ?> >
 
  <tbody>

  <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   

    <tr>

    <td>

   



    <span data-toggle="tooltip" data-placement="top" title="Remove" <?php if ( $row_usuarios_services_listos['cant_recibida'] >= '1' ){?>style="display:none"<?php } ?> >
  <a href="" class="btn-danger"
  data-toggle="modal"
 data-target="#delete_service<?php echo $row_usuarios_services_listos['id_guests_services_check_in']; ?>"
  
  ><i class="fa-solid fa-eraser"></i></a></span>

  <?php include("deletes/delete_service_serv.php"); ?>





  <span data-toggle="tooltip" data-placement="top"
   title="End Service" <?php if ( $row_usuarios_services_listos['cant_recibida'] == '0' or ($row_usuarios_services_listos['cant_adquirida'] == $row_usuarios_services_listos['cant_recibida'] ) ){?>style="display:none"<?php } ?> >






  <a href="" class="btn-danger"
  data-toggle="modal"
 data-target="#delete_service_restantes<?php echo $row_usuarios_services_listos['id_guests_services_check_in']; ?>"
  
  ><i class="fa-solid fa-filter-circle-xmark"></i></a></span> 

  <?php include("deletes/delete_service_serv_restantes.php"); ?>






    </td>

      <td style="font-size:12px;" ><?php
      
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

$sub_price_serv_pa = ($mi_price_pa * $row_usuarios_services_listos['cant_adquirida']);

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

 
 $ojillo = '';
 
 if ($row_usuarios_services_listos['service_note'] != ''  ) {
 
$ojillo = '<i class="fa-regular fa-comment-dots"></i>';

 }


 


      
      echo $row_usuarios_services_listos['name_producto'];?> <b>x <?php echo $row_usuarios_services_listos['cant_adquirida'];?></b>


      
    
      &nbsp;&nbsp;
      <span style="color: blue;">
      
      <span data-toggle="tooltip" data-placement="top" title="Note: <?php echo $row_usuarios_services_listos['service_note'];?>" >
      <?php echo $ojillo;?></span> </span>
    
    
    
    
    
    
    
    
    
    
    
    </td>  


      <td style="font-size:12px;" > <?php 
      
      $new_services_sub = $new_services_sub + $sub_total_beds_services_pa;
      
      
      echo $sub_total_beds_services_pa;?> </td>
     </tr>

    <?php } while ($row_usuarios_services_listos = mysqli_fetch_assoc($query_services_listos)); ?>







    <tr>





    <td class="align-middle" align="left">



    <span data-toggle="tooltip" data-placement="top" title="Manage Services" >
  <a href="" class="btn-primary"
  data-toggle="modal"
 data-target="#servicios<?php echo $row_huespedes['id_bed_booking']; ?>"
  
  ><i class="fa-solid fa-boxes-stacked fa-lg"></i></a> </span>

  <?php include("updates/admin_services_guests.php"); ?>





    </td>




      <td  class="align-middle" align="right" ><b>Sub:</b></td>


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

    <td colspan="5" class="align-middle" style="padding-top: 20px; padding-bottom: 20px;" align="right" ><b>Sub-Total:</b></td> 

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

    <td colspan="5" class="align-middle" style="padding-top: 40px; padding-bottom: 40px;" align="right" ><b>Total:</b></td> 




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





// detectar si en caso dado se agendo un primer pago, se mostrara el boton de editar





$query_hay_pago = "SELECT * FROM tb_payment_hospedaje, forma_pago
where tb_payment_hospedaje.id_payment_hospedaje = '$id_pay'
and tb_payment_hospedaje.id_primer_pago_forma = forma_pago.id_forma_pago  limit 1";
$usuarios_hay_pago = mysqli_query($enlace, $query_hay_pago) or die(mysqli_error());
$row_usuarios_hay_pago = mysqli_fetch_assoc($usuarios_hay_pago);


$tot_prim_pago = $row_usuarios_hay_pago['primer_pago_hospedaje'];

$tot_segun_pago = $row_usuarios_hay_pago['segundo_pago_hospedaje'];

$tot_tercer_pago = $row_usuarios_hay_pago['tercer_pago_hospedaje'];

mysqli_close($enlace);



$sub_total_beds_currency_a = ($total_total / $row_usuarios_exchange_a['currency_A_value']);

$sub_total_beds_currency_b = ($total_total / $row_usuarios_exchange_b['currency_B_value']);

$english_sub_total_a = number_format($sub_total_beds_currency_a, 2, '.', '');
$english_sub_total_b = number_format($sub_total_beds_currency_b, 2, '.', '');




  ?> <b><?php echo $english_sub_total_a;?></b> <?php echo $row_usuarios_exchange_a['symbol_currency'];?> <br> 
  <b><?php echo $english_sub_total_b;?></b> <?php echo $row_usuarios_exchange_b['symbol_currency'];?>







</td>

<td class="align-middle" align="center">


<span <?php if ( $tot_prim_pago >= '1' ){?>style="display:none"<?php } ?> >
  <!-- en caso de agendar un monto oculta el boton -->

<button type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal"
                  data-target="#payme<?php echo $id_pay;?>" >                                                                       
                  <i class="fa-solid fa-cash-register fa-2x"></i></button>    

</span>


<?php include("updates/update_pay_beds_guests.php"); ?>
    





<span <?php if ( $tot_prim_pago == '0' or $tot_segun_pago >= '1' ){?>style="display:none"<?php } ?> > 
 <!-- en caso de agendar un monto oculta el boton -->

<button type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal"
                  data-target="#payme_edit<?php echo $id_pay;?>"  >  

<i class="fa-solid fa-money-bill-transfer fa-2x"></i></button>    

</span>

<?php include("updates/update_pay_edit_beds_guests.php"); ?>






<span <?php if ( $tot_prim_pago == '0' or $tot_segun_pago == '0' or $tot_tercer_pago >= '1'  ){?>style="display:none"<?php } ?> > 
 <!-- en caso de agendar un monto oculta el boton -->

<button type="button" class="btn btn-success btn-block btn-sm" data-toggle="modal"
                  data-target="#payme_edit_last<?php echo $id_pay;?>"  >  

<i class="fa-solid fa-money-bill-1-wave fa-2x"></i></button>     

</span>

<?php include("updates/update_pay_edit_last_beds_guests.php"); ?>







<span <?php if ( $tot_prim_pago == '0' or $tot_segun_pago == '0' or $tot_tercer_pago == '0' ){?>style="display:none"<?php } ?>  > 
 <!-- en caso de no existir ningun pago lo oculta -->

<button type="button" class="btn btn-secondary btn-block mt-2 btn-sm" data-toggle="modal"
                  data-target="#payme_resume<?php echo $id_pay;?>"  >  

<i class="fa-solid fa-chart-line fa-2x"></i></button>     

</span>  

<?php include("updates/update_pay_resume_guests.php"); ?>








</td>


    </tr>


    
  </tbody>
</table>
</div>
</div>





















                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

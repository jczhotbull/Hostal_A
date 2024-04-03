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

    $cuenta_ami = $_GET['cuenta_ami'];


    $ttitulo = $_GET['ttitulo'];
    $idtbla = $_GET['idtabla'];

    $compa = $_GET['compa'];  // lleva el id del padre o cabeza del grupo

    $rango_seteado = $_GET['range'];
    

    $mi_hostel_select = $_SESSION['hostel_activo'];

    $la_hora_rey = $_GET['hora_rey'];


    $id_pay = $_GET['id_papa'];







    include ("../conectar.php");   // para saber cuantas rooms ay
    
    $query_String_roomsMM = "SELECT COUNT(*) AS total_roomsMM FROM tb_room
                            where id_hostel = '$mi_hostel_select'";
    $query_roomsMM = mysqli_query($enlace, $query_String_roomsMM);
    $row_roomsMM = mysqli_fetch_object($query_roomsMM);
    
    mysqli_close($enlace);




 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row">

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
<i class="fa-solid fa-person-walking-arrow-right fa-lg "></i> &nbsp; &nbsp; Walk-In:
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












<?php

include ("../conectar.php");   // para saber cuantas rooms ay

$query_compa = "SELECT id_guests, guests_doc_id, p_name_g FROM tb_guests       
 where id_guests = '$compa' limit 1";

$the_compa = mysqli_query($enlace, $query_compa) or die(mysqli_error());
$row_compa = mysqli_fetch_assoc($the_compa);
$totalRows_compa = mysqli_num_rows($the_compa);

mysqli_close($enlace);

if ($row_compa['p_name_g'] != '') {
   $nombrecillo = $row_compa['p_name_g'];
   $comilla = ',';
}

else {
    $nombrecillo = '';
    $comilla = '';

}


?>








<span class="mt-4" <?php if ( $row_roomsMM->total_roomsMM =='0'  ){?>style="display:none"<?php } ?> >

<span class="glowwhite" style="font-size: 28px;" > 
Room for&nbsp;</span> <span class="glowwhite mt-5" style="font-size: 28px; color:#2A4BBB;"><?php  echo $cuenta_ami; ?>° </span>
<span class="glowwhite" style="font-size: 28px;" >companion of</span> &nbsp;
 <span class="glowwhite mt-5" style="font-size: 28px; color:#2A4BBB;"><?php  echo $nombrecillo; ?>
<?php  echo $comilla; ?></span>
<span class="glowwhite" style="font-size: 28px;"> - Doc: </span> <span class="glowwhite mt-5" style="font-size: 28px; color:#2A4BBB;"><?php  echo $row_compa['guests_doc_id']; ?>.</span>

</span>


<!-- Icon Cards-->
     
<div class="row" <?php if ( $row_roomsMM->total_roomsMM =='0' ){?>style="display:none"<?php } ?> >



<?php

include ("../conectar.php");

$queryFHL_tipos = "SELECT id_hostel, id_room_kind FROM tb_room
where id_hostel = '$mi_hostel_select'
group BY id_room_kind ASC";


$rooms_tipes = mysqli_query($enlace, $queryFHL_tipos) or die(mysqli_error());
$row_rooms_tipes = mysqli_fetch_assoc($rooms_tipes);
$totalRows_rooms_tipes = mysqli_num_rows($rooms_tipes);

mysqli_close($enlace);

$background = '534463';

?>


<?php  do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->      







<?php

$este_id_kind = $row_rooms_tipes['id_room_kind'];

include ("../conectar.php");

$queryFHL_nombre = "SELECT * FROM room_kind where id_room_kind = '$este_id_kind' limit 1";
$rooms_reveal_name_tipes = mysqli_query($enlace, $queryFHL_nombre) or die(mysqli_error());
$row_rooms_reveal_name_tipes = mysqli_fetch_assoc($rooms_reveal_name_tipes);
$totalRows_rooms_reveal_name_tipes = mysqli_num_rows($rooms_reveal_name_tipes);



$queryFHL_conteo_t = "SELECT id_room_kind FROM tb_room
where id_room_kind = '$este_id_kind'
and id_hostel = '$mi_hostel_select' order by id_room_kind asc ";

$rooms_conteo_t = mysqli_query($enlace, $queryFHL_conteo_t) or die(mysqli_error());
$row_rooms_conteo_t = mysqli_fetch_assoc($rooms_conteo_t);
$totalRows_rooms_conteo_t = mysqli_num_rows($rooms_conteo_t);






$queryFHL_currencys_prim = "SELECT * FROM exchange_rates, currency
 where exchange_rates.id_hostel = '$mi_hostel_select'
 and exchange_rates.id_hostel_currency = currency.id_currency
 order BY exchange_rates.all_set_this_time DESC limit 1";

$the_currencys_prim = mysqli_query($enlace, $queryFHL_currencys_prim) or die(mysqli_error());
$row_the_currencys_prim = mysqli_fetch_assoc($the_currencys_prim);
$totalRows_the_currencys_prim = mysqli_num_rows($the_currencys_prim);




$queryFHL_pp = "SELECT * FROM tb_prices_rooms, discounts  
WHERE tb_prices_rooms.id_hostel = '$mi_hostel_select' 
and   tb_prices_rooms.id_room_kind = '$este_id_kind'
and tb_prices_rooms.discount_room = discounts.id_discounts
ORDER BY tb_prices_rooms.set_prices_date desc limit 1";

$room_pp = mysqli_query($enlace, $queryFHL_pp) or die(mysqli_error());
$row_room_pp = mysqli_fetch_assoc($room_pp);
$totalRows_room_pp = mysqli_num_rows($room_pp);


$queryFHL_pp_dos = "SELECT * FROM tb_prices_rooms
WHERE id_hostel = '$mi_hostel_select' 
and   id_room_kind = '$este_id_kind'
ORDER BY set_prices_date desc limit 1,2";

$room_pp_dos = mysqli_query($enlace, $queryFHL_pp_dos) or die(mysqli_error());
$row_room_pp_dos = mysqli_fetch_assoc($room_pp_dos);
$totalRows_room_pp_dos = mysqli_num_rows($room_pp_dos);

$off = '';
$discc = '';
$symbc = '';


if ($totalRows_room_pp != '0') {

if ($row_room_pp['name_discounts'] !='0') {
  $off = 'Off';
  $discc = $row_room_pp['name_discounts'];
  $symbc = '%';
}

}










$queryFHL_pp_b = "SELECT * FROM tb_prices_beds, discounts 
WHERE tb_prices_beds.id_hostel = '$mi_hostel_select' 
and   tb_prices_beds.id_room_kind = '$este_id_kind'
and   tb_prices_beds.discount_beds = discounts.id_discounts
ORDER BY tb_prices_beds.set_prices_date_b desc limit 1";

$room_pp_b = mysqli_query($enlace, $queryFHL_pp_b) or die(mysqli_error());
$row_room_pp_b = mysqli_fetch_assoc($room_pp_b);
$totalRows_room_pp_b = mysqli_num_rows($room_pp_b);


$queryFHL_pp_dos_b = "SELECT * FROM tb_prices_beds 
WHERE id_hostel = '$mi_hostel_select' 
and   id_room_kind = '$este_id_kind'
ORDER BY set_prices_date_b desc limit 1,2";

$room_pp_dos_b = mysqli_query($enlace, $queryFHL_pp_dos_b) or die(mysqli_error());
$row_room_pp_dos_b = mysqli_fetch_assoc($room_pp_dos_b);
$totalRows_room_pp_dos_b = mysqli_num_rows($room_pp_dos_b);


$off_b = '';
$discc_b = '';
$symbc_b = '';


if ($totalRows_room_pp_b != '0') {

if ($row_room_pp_b['name_discounts'] !='0') {
  $off_b = 'Off';
  $discc_b = $row_room_pp_b['name_discounts'];
  $symbc_b = '%';
}

}



mysqli_close($enlace);

?>





<div class="col-xl-3 col-sm-6 col-6 mb-3"  >
         <div class="card text-white o-hidden h-100"
         style="background:#<?php  echo $background; $background = $background + '1200';  ?>">
           <div class="card-body">
             <div class="card-body-icon">
<?php  echo $totalRows_rooms_conteo_t; ?>          
             </div>
             <div class="mr-5 cantidadzzz"></div>

             <div class="infozzz">
<?php
$mi_name_kind = $row_rooms_reveal_name_tipes['name_room_kind'];
echo $row_rooms_reveal_name_tipes['name_room_kind']; ?> </div>







<div class="infozzzsmall mt-2">   <!--   infozzzsmall -->
              Bed(s):&nbsp;&nbsp;<b>
                              
              <?php
              
              if ($totalRows_room_pp_b != '0') {
                echo $row_room_pp_b['name_prices_beds'];
              }
              
              ?>  
            
            </b> - <?php echo $row_the_currencys_prim['symbol_currency']; ?>

            <b><?php echo $discc_b; ?><?php echo $symbc_b; ?> <?php echo $off_b; ?></b>

             </div>







<div class="infozzzsmall mt-2">   <!--   infozzzsmall -->
              Room:&nbsp;&nbsp;<b>
                              
              <?php
              
              if ($totalRows_room_pp != '0') {
                echo $row_room_pp['name_prices_rooms'];
              }
              
              ?>  
            
            </b> - <?php echo $row_the_currencys_prim['symbol_currency']; ?>

            <b><?php echo $discc; ?><?php echo $symbc; ?> <?php echo $off; ?></b>

             </div>











           </div>

           <a class=" card-footer card-footerz text-white clearfix small z-1"        

           
href="f_check_room_bed_c.php?idtabla=<?php  echo $este_id_kind; ?>&ttitulo=<?php  echo $mi_name_kind; ?>&compa=<?php  echo $compa; ?>&range=<?php  echo $rango_seteado; ?>&cuenta_ami=<?php  echo $cuenta_ami; ?>&hora_rey=<?php  echo $la_hora_rey; ?>&id_papa=<?php echo $id_pay; ?>">  

             <span class="float-left">Go</span>
             <span class="float-right">
               <i class="fa fa-angle-right"></i>
             </span>
           </a>
         </div>
</div>





<?php  } while ($row_rooms_tipes = mysqli_fetch_assoc($rooms_tipes)); ?>



     





      







       </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->






















                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

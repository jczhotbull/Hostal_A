<?php


include("00_identificador.php");

$mi_hostel_select = $_SESSION['hostel_activo'];

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


    $build_success = '';
    $build_danger = '';




      $date = date('m/d/Y');
    










    include("../conectar.php");
    include ("consultas_add/query_prices.php");


    include ("../conectar.php");   // para saber cuantas rooms ay
    
    $query_String_roomsMM = "SELECT COUNT(*) AS total_roomsMM FROM tb_room
     where id_hostel = '$mi_hostel_select'";
    $query_roomsMM = mysqli_query($enlace, $query_String_roomsMM);
    $row_roomsMM = mysqli_fetch_object($query_roomsMM);
    
    mysqli_close($enlace);







    if(isset($_POST['actualizar_dinerillo']))
    {        
  
      include("../conectar.php");  
      
      $actual_currency = $_POST['id_del_currency_actual'];

      $extra_currency = $_POST['extra_currency']; 
      $extra_value = mysqli_real_escape_string($enlace,$_POST['extra_value']);

      $additional_currency = $_POST['additional_currency']; 
      $additional_value = mysqli_real_escape_string($enlace,$_POST['additional_value']);

  
      $query_money_new = "INSERT INTO exchange_rates(id_hostel, id_hostel_currency, id_currency_A, currency_A_value,
                         id_currency_B, currency_B_value) 
  
      VALUES (   '$mi_hostel_select',
                 '$actual_currency',
                 '$extra_currency'  ,
                 '$extra_value'     ,
                 '$additional_currency'  ,
                 '$additional_value'    )";
  
  
  if (!mysqli_query($enlace,$query_money_new))  // si no logro ingresar la direccion...
  {  
  $errorZ="- Error. ";
  mysqli_close($enlace); 
  }
  
  else 
  {
    $exitoZ="- All Set. ";
    mysqli_close($enlace); 
  }


    }









    if(isset($_POST['eliminar_dinerillo']))
    {
$alerta_principal = "2";
          

      include("../conectar.php");  

// debo detectar si el id del hostel esta en uso antes...  de momento solo lo usan los clientes

$id_dinerillo_borrar = $_POST['id_a_exterminar'];







$queryDiss = "DELETE FROM exchange_rates WHERE id_exchange_rates = '$id_dinerillo_borrar' LIMIT 1";

if (!mysqli_query($enlace,$queryDiss))      // si no ha logrado borrar los direcc del hostel
   {
    $errorZ = " <i class=\"fa-solid fa-people-line fa-lg\"></i> "; 
    mysqli_close($enlace); 
    }



else {  

   $exitoZ = "<b>--&nbsp; Exchange Rate  &nbsp;--</b> was deleted.";
   mysqli_close($enlace);  

}           // hasta aqui gracias a borrar la data del hostel al estar en cascada se lleva el contenido del hostel.



}


























 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">



            <?php

include ("../conectar.php");

$queryFHL_currencys_prim = "SELECT * FROM exchange_rates
 where id_hostel = '$mi_hostel_select'
 order BY all_set_this_time DESC limit 4";

$the_currencys_prim = mysqli_query($enlace, $queryFHL_currencys_prim) or die(mysqli_error());
$row_the_currencys_prim = mysqli_fetch_assoc($the_currencys_prim);
$totalRows_the_currencys_prim = mysqli_num_rows($the_currencys_prim);

mysqli_close($enlace);


?>





              <div class="form-row" <?php if ( $totalRows_the_currencys_prim =='0' ){?>style="display:none"<?php } ?> > 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-cash-register fa-lg "></i> &nbsp; &nbsp; Room Prices
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


            <?php include ("php_list/calculator.php"); ?>


            </div>







<h4 class="glowwhite mt-4" <?php if ( $row_roomsMM->total_roomsMM =='0' ){?>style="display:none"<?php } ?> >Set By Room Types:</h4>



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



mysqli_close($enlace);

?>  





<div class="col-xl-3 col-sm-6 col-6 mb-3"  >
         <div class="card text-white o-hidden h-100"
         style="background:#<?php  echo $background; $background = $background + '1200';  ?>">
           <div class="card-body">
             <div class="mini_card_icon" style="font-size: 3rem;">
             <i class="fa-solid fa-hand-holding-dollar fa-xs"></i>          
             </div>
             <div class="mr-5 infozzz"><b>
             <?php
$mi_name_kind = $row_rooms_reveal_name_tipes['name_room_kind'];
echo $row_rooms_reveal_name_tipes['name_room_kind']; ?> </b> <?php echo $discc; ?><?php echo $symbc; ?> <?php echo $off; ?>
             </div>

             <div class="infozzzsmall mt-4">   <!--   infozzzsmall -->
              Current:&nbsp;&nbsp;<b>
                              
              <?php
              
              if ($totalRows_room_pp != '0') {
                echo $row_room_pp['name_prices_rooms'];
              }
              
              ?>  
            
            </b> - <?php echo $row_the_currencys_prim['symbol_currency']; ?>

             </div>

             <div class="infozzzsmall mt-1">
             Prior:&nbsp;&nbsp;<b>
                              
              <?php
              
              if ($totalRows_room_pp_dos != '0') {
                echo $row_room_pp_dos['name_prices_rooms'];
              }
              
              ?>  
            
            </b> - <?php echo $row_the_currencys_prim['symbol_currency']; ?>
             </div>



           </div>

           <a class=" card-footer card-footerz text-white clearfix small z-1"
           href="edit_room_money.php?idtabla=<?php  echo $este_id_kind; ?>&ttitulo=<?php  echo $mi_name_kind; ?>&ttitulo=<?php  echo $mi_name_kind; ?>">
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

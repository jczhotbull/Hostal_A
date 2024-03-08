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













    include("../conectar.php");
    include ("consultas_add/query_prices.php");


    include ("../conectar.php");   // para saber cuantas rooms ay
    
    $query_String_roomsMM = "SELECT COUNT(*) AS total_roomsMM FROM tb_room";
    $query_roomsMM = mysqli_query($enlace, $query_String_roomsMM);
    $row_roomsMM = mysqli_fetch_object($query_roomsMM);
    
    mysqli_close($enlace);






 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

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






<div class="form-row margencito"> 



<?php
include("../conectar.php");

$queryHost = "SELECT * FROM z_hostel where id_hostel = '$mi_hostel_select' LIMIT 1";
$datos_queryHost = mysqli_query($enlace, $queryHost) or die(mysqli_error());
$row_datos_queryHost = mysqli_fetch_array($datos_queryHost); 

$id_verificado_host = $row_datos_queryHost['id_hostel'];
$id_currency_del_host = $row_datos_queryHost['id_currency'];

mysqli_close($enlace);
     ?> 










<div class="col-md-3 col-lg-3 mb-3" > 

<button type="button" data-toggle="modal" data-target="#el_dinerillo" class="btn btn-dark btn-block">
<i class="fa-solid fa-hand-point-right fa-lg"></i>&nbsp;&nbsp; Update Exchange Rate
</button>

</div>





<!-- ini modal--> 
<div class="modal fade" id="el_dinerillo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-dark " id="exampleModalLabel">
        <i class="fa-solid fa-triangle-exclamation fa-lg"></i> 
  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">





<?php

include ("../conectar.php");

$queryFHL_currencys = "SELECT * FROM exchange_rates
 where id_hostel = '$mi_hostel_select'
 order BY all_set_this_time DESC limit 3";

$the_currencys = mysqli_query($enlace, $queryFHL_currencys) or die(mysqli_error());
$row_the_currencys = mysqli_fetch_assoc($the_currencys);
$totalRows_the_currencys = mysqli_num_rows($the_currencys);

mysqli_close($enlace);


?>


<div class="form-row margencito" <?php if ( $totalRows_the_currencys =='0' ){?>style="display:none"<?php } ?>  > 

<h5>Historical:</h5>

<table class="table table-bordered">
  <thead>
    <tr>
      <th class="align-middle" align="center">Date</th>
      <th class="align-middle" align="center" style="color:green;">Selected</th>
      <th class="align-middle" align="center" style="color:green;">Value</th>
      <th class="align-middle" align="center">Extra</th>
      <th class="align-middle" align="center">Value</th>
      <th class="align-middle" align="center" style="color:orange;" >Additional</th>
      <th class="align-middle" align="center" style="color:orange;" >Value</th>
      <th class="align-middle" align="center"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th>

    </tr>
  </thead>

  <tbody>

  <?php  do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->

    <tr>

     <td class="align-middle" align="center"><?php echo $row_the_currencys['all_set_this_time']; ?></td>

     <td class="align-middle" align="center" style="color:green;">
     
     <?php
    
include ("../conectar.php");

$main_c = $row_the_currencys['id_hostel_currency'];

$queryFHL_currencys_main = "SELECT * FROM currency where id_currency = '$main_c'
limit 1";

$the_currencys_main = mysqli_query($enlace, $queryFHL_currencys_main) or die(mysqli_error());
$row_the_currencys_main = mysqli_fetch_assoc($the_currencys_main);
$totalRows_the_currencys_main = mysqli_num_rows($the_currencys_main);

mysqli_close($enlace); 
     
     echo $row_the_currencys_main['name_currency']; ?></td> 

      <td class="align-middle" align="center" style="color:green;">
      1.00<br><?php echo $row_the_currencys_main['symbol_currency']; ?></td>

      <td class="align-middle" align="center">
        
      <?php
    
    include ("../conectar.php");
    
    $smain_c = $row_the_currencys['id_currency_A'];
    
    $queryFHL_currencys_smain = "SELECT * FROM currency where id_currency = '$smain_c'
    limit 1";
    
    $the_currencys_smain = mysqli_query($enlace, $queryFHL_currencys_smain) or die(mysqli_error());
    $row_the_currencys_smain = mysqli_fetch_assoc($the_currencys_smain);
    $totalRows_the_currencys_smain = mysqli_num_rows($the_currencys_smain);
    
    mysqli_close($enlace); 
         
         echo $row_the_currencys_smain['name_currency']; ?>    
</td>

      <td class="align-middle" align="center">
        <?php echo $row_the_currencys['currency_A_value']; ?><br><?php echo $row_the_currencys_smain['symbol_currency']; ?></td>

      <td class="align-middle" align="center" style="color:orange;">
      
      <?php
    
    include ("../conectar.php");
    
    $emain_c = $row_the_currencys['id_currency_B'];
    
    $queryFHL_currencys_emain = "SELECT * FROM currency where id_currency = '$emain_c'
    limit 1";
    
    $the_currencys_emain = mysqli_query($enlace, $queryFHL_currencys_emain) or die(mysqli_error());
    $row_the_currencys_emain = mysqli_fetch_assoc($the_currencys_emain);
    $totalRows_the_currencys_emain = mysqli_num_rows($the_currencys_emain);
    
    mysqli_close($enlace); 
         
         echo $row_the_currencys_emain['name_currency']; ?>       
</td>

      <td  class="align-middle" align="center" style="color:orange;">
      <?php echo $row_the_currencys['currency_B_value']; ?><br><?php echo $row_the_currencys_emain['symbol_currency']; ?>  </td>

      





      <td>

      <button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_the_currencys['id_exchange_rates']; ?>">                                                                 
                  <i class="fas fa-edit"></i></button> 

      <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_the_currencys['id_exchange_rates']; ?>">
                  <i class="far fa-trash-alt"></i></button>    
      </td>



    </tr>


    <?php  } while ($row_the_currencys = mysqli_fetch_assoc($the_currencys)); ?>


  </tbody>
</table>


</div> <!-- cierre margencito -->










<form method="post">



<!--

<div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">  
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-id-card fa-lg"></i></span>  
</div>
<input type="text" maxlength="12" class="form-control importantex" id="doc_per" name="doc_per" placeholder="Doc or Id Number" aria-label="doc_per" aria-describedby="basic-addon1" required>    
 </div>  -->






</div> <!-- cierre modal body -->
      <div class="modal-footer"> 
     


    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

    <button type="submit" name="actualizar_dinerillo" class="btn btn-dark"
    value="actualizar_dinerillo" ><i class="fa-regular fa-floppy-disk fa-lg"></i></button>

      </div>

</form>

    </div>
  </div>
</div>  <!--cierre modal--> 






</div><!-- cierre margencito-->





















<h4 class="glowwhite mt-4" <?php if ( $row_roomsMM->total_roomsMM =='0' ){?>style="display:none"<?php } ?> >Set By Room Types:</h4>



<!-- Icon Cards-->
     
<div class="row" <?php if ( $row_roomsMM->total_roomsMM =='0' ){?>style="display:none"<?php } ?> >



<?php

include ("../conectar.php");

$queryFHL_tipos = "SELECT id_room_kind FROM tb_room 
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
echo $row_rooms_reveal_name_tipes['name_room_kind']; ?> </b>
             </div>

             <div class="infozzzpe mt-4">   <!--   infozzzsmall -->
              Current Price:
             </div>

             <div class="infozzzpe mt-1">
             Previous Price:
             </div>



           </div>

           <div class="card-footer card-footerz  clearfix z-1 small" >

<form method="POST">

<div class="input-group mb-3">
  <input type="text" class="form-control" name="dinero" placeholder="New Amount" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-secondary" name="new_price" type="button"><i class="fa-regular fa-floppy-disk fa-lg"></i></button>
  </div>
</div>


 </form>
            </div>

           
         </div>
</div>















<?php  } while ($row_rooms_tipes = mysqli_fetch_assoc($rooms_tipes)); ?>



     





      







       </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->     














                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

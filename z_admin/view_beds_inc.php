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
    

    $mi_hostel_select = $_SESSION['hostel_activo'];









// editar room
if(isset($_POST['borrar_inc_b']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{


  $id_a_borrar_b = $_POST['borrar_inc_b'];
  $incidente = $_POST['room_inc'];
  
  include("../conectar.php"); 
  
  
  $queryDiss = "DELETE FROM reporte_incidencias_b WHERE 	id_reporte_incidencias_b = '$id_a_borrar_b' LIMIT 1";
  
  if (!mysqli_query($enlace,$queryDiss))      // si no ha logrado borrar los direcc del hostel
     {
      $errorZ = " <i class=\"fa-solid fa-people-line fa-lg\"></i> "; 
      mysqli_close($enlace); 
      }
  
  
  
  else {  
  
     $exitoZ = "Incident <b>--&nbsp; " . $incidente . " &nbsp;--</b> was deleted.";
     mysqli_close($enlace);  
  
  }           // hasta aqui gracias a borrar la data del hostel al estar en cascada se lleva el contenido del hostel.
  

} 












// empieza el cambio de status del personal
if(isset($_POST['editar_bed_inc']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";
    
    $mod_by_este = $_SESSION['id_per'];
    $ahora_cambio_a = $_POST['status_mod'];
    $date = date('y-m-d h:i:s');
    $id_a_ser_modi = $_POST['editar_bed_inc'];


    include("../conectar.php");                                                
  
  
    $query_cambiame_state = "UPDATE reporte_incidencias_b SET id_quien_actualizo_b = '$mod_by_este',
                                                      update_fecha_inc_b = '$date',
                                                      id_incidencia_b_status = '$ahora_cambio_a'
    
     WHERE id_reporte_incidencias_b = '$id_a_ser_modi' LIMIT 1 "; 



if (!mysqli_query($enlace,$query_cambiame_state))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{  
    $exitoZ = "Incident Status Updated.";
    mysqli_close($enlace);

    }   


  }











// empieza el cambio de status del personal
if(isset($_POST['add_inc_bed']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";

    $room_afectado_por_este = $_POST['agendado_by']; 

    $room_afectado = $_POST['add_inc_bed']; 
  
    $name_a_cambiar = $_POST['name_del_cambiante']; 
   

    $id_del_incidente = $_POST['name_incident'];


    include("../conectar.php");     
    

    $date_p = date('y-m-d h:i:s');

    $query_add_inc_host = "INSERT INTO reporte_incidencias_b(id_quien_reporto_b, id_de_la_bed_b,
     fecha_incidencia_b, id_de_incidencia_b, id_incidencia_b_status) 

    VALUES (   '$room_afectado_por_este',
               '$room_afectado',
               '$date_p',
               '$id_del_incidente',
               '1'
            )";


if (!mysqli_query($enlace,$query_add_inc_host))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{  
    $exitoZ = "Incident Added To Bed <b>--&nbsp; ".$name_a_cambiar." &nbsp;--</b>.";
    mysqli_close($enlace);

    }   

  
  

 }  // cierre cambio status














 


























    














 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-people-line fa-lg "></i>
                    &nbsp; &nbsp;  <i>Incidents in Beds <b><?php echo $ttitulo; ?></b> Room.</i>
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




 
<div class="row">

<div class="col-xl-3 col-sm-6 col-6 mb-3">

<a class="" href="selecc_zz_color.php?ttabla=incident_b_status&idtabla=id_incident_b_status&nombdato=name_incident_b_status&ttitulo=Beds Incidents Status">     

<div class="card text-white relleno-indigo o-hidden h-100">
           <div class="card-body">
             <div class="mini_card_icon">  
               <i class="fa-regular fa-face-surprise"></i>
             </div>
             <div class="mr-5 cantidadzzz"></div>
             <div class="infozzz">Add New Incident</div>
           </div>  
                      
         </div>

 </a>

</div>




<div class="col-xl-3 col-sm-6 col-6 mb-3">

<a class="" href="selecc_zz_plus_note.php?ttabla=incidents_beds&idtabla=id_incidents_beds&nombdato=name_incidents_beds&ttitulo=Incidents in Beds">     

<div class="card text-white relleno-indigo o-hidden h-100">
           <div class="card-body">
             <div class="mini_card_icon">  
               <i class="fa-solid fa-heart-circle-exclamation"></i>
             </div>
             <div class="mr-5 cantidadzzz"></div>
             <div class="infozzz">Add New Status</div>
           </div>  
                      
         </div>

 </a>

</div>


</div>
     



<style>

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  border-radius: 5px;
  padding: 3px 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 1px 1px;
  cursor: pointer;
}

</style>




<?php

$este_id_kind = $idtbla;

include ("../conectar.php");

$query_rooms = "SELECT * FROM room_kind, tb_room, floors, hostel_area, room_number
where room_kind.id_room_kind = '$este_id_kind'
and room_kind.id_room_kind = tb_room.id_room_kind
and floors.id_floors = tb_room.id_floors
and hostel_area.id_hostel_area = tb_room.id_hostel_area
and tb_room.id_room_number = room_number.id_room_number
and tb_room.id_hostel = '$mi_hostel_select'
order by tb_room.id_room_number asc";

$query_rooms_all = mysqli_query($enlace, $query_rooms) or die(mysqli_error());
$row_rooms_reveal = mysqli_fetch_assoc($query_rooms_all);
$totalRows_rooms_reveal = mysqli_num_rows($query_rooms_all);

mysqli_close($enlace);

?>








<div class="card-body border border-info mb-2" <?php if ( $totalRows_rooms_reveal == '0' ){?>style="display:none"<?php } ?> >

<div class="table-responsive">

  <table class="table table-bordered stricolor table-sm" id="dataTable" width="100%" cellspacing="0">
   
    <thead>
      <tr>                  
        
          <th width="12%">Room:</th>  <!-- chequear el status -->
       
          <th width="88%">
              
           <table class="table table-bordered table-sm">
<tbody>
<thead>
    <tr>
      <th width="11%" class="align-middle" align="left" >Bed:</th>

      <th width="8%" class="align-middle" align="center"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th>




      <th width="81%" class="align-middle" align="center">

<table class="table table-bordered table-sm">
<tbody>
<thead>
    <tr>
      <th width="42%" class="align-middle" align="left" >Incidents</th>
      <th width="15%" class="align-middle" align="center"><i class="fa-solid fa-gear fa-lg"></i></th>

      <th width="26%" class="align-middle" align="center">Created</th>
      <th width="17%" class="align-middle" align="center">By</th>
    </tr>
  </thead>
</tbody>
</table>


      </th>




      
    </tr>
  </thead>
</tbody>
</table>          
            
</th>      
 

      


      </tr>
    </thead>


 



     <tbody>


     







     <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


 <tr   >


 <?php

include ("../conectar.php");
$este_lo_registro = $row_rooms_reveal['creada_por'];
$queryFH_whoL = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro' limit 1";
$usuarios_whoL = mysqli_query($enlace, $queryFH_whoL) or die(mysqli_error());
$row_usuarios_whoL = mysqli_fetch_assoc($usuarios_whoL);


mysqli_close($enlace);

?>










<td class="align-middle" align="center">



<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >
<span >
Room: <b><?php echo $row_rooms_reveal['name_room_number']; ?></b>
<br><b><span style="color:purple;">"<?php echo $row_rooms_reveal['name_floors']; ?>"</span></b><br>
<b>Area:</b> <?php echo $row_rooms_reveal['name_hostel_area']; ?></span>

</div>



</td>






<td class="align-middle" align="left">


<?php

$id_del_room = $row_rooms_reveal['id_room'];

include ("../conectar.php");

$query_details = "SELECT * FROM tb_rooms_beds, bed_kind, bed_number, bunk_level
where tb_rooms_beds.id_room = '$id_del_room'
and tb_rooms_beds.id_bed_kind = bed_kind.id_bed_kind
and tb_rooms_beds.id_bunk_level = bunk_level.id_bunk_level
and tb_rooms_beds.id_bed_number = bed_number.id_bed_number
order by bed_number.name_bed_number asc";

$query_rooms_details = mysqli_query($enlace, $query_details) or die(mysqli_error());
$row_rooms_details = mysqli_fetch_assoc($query_rooms_details);
$totalRows_rooms_details = mysqli_num_rows($query_rooms_details);


mysqli_close($enlace);

?>





<table class="table table-bordered" 
<?php if ( $totalRows_rooms_details == '0' ){?>style="display:none"<?php } ?> >
<tbody>


<?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


  <tr>
      <td width="11%" class="align-middle" align="center">
      "<b><?php echo $row_rooms_details['name_bed_number']; ?></b>"<br>
   <span style ="color:purple;">   <?php echo $row_rooms_details['name_bed_kind']; ?> </span> <br>
   - <?php echo $row_rooms_details['name_bunk_level']; ?>
   </td>



   <td width="8%" class="align-middle" align="left">


<button type="submit" name="add_a_inc" class="btn btn-secondary" data-toggle="modal"
             data-target="#add_inci_room<?php echo $row_rooms_details['id_rooms_beds']; ?>" >       
             <i class="fa-solid fa-file-circle-plus fa-2x"></i>
           </button>   


          <?php include("updates/add_inci_bed_modal.php"); ?>

</td>




<?php

$este_id_room_b = $row_rooms_details['id_rooms_beds'];

include ("../conectar.php");

$query_rooms_inc = "SELECT * FROM reporte_incidencias_b, incidents_beds, incident_b_status
where reporte_incidencias_b.id_de_la_bed_b = '$este_id_room_b'
and reporte_incidencias_b.id_de_incidencia_b = incidents_beds.id_incidents_beds
and reporte_incidencias_b.id_incidencia_b_status = incident_b_status.id_incident_b_status
order by reporte_incidencias_b.fecha_incidencia_b desc limit 5";

$query_rooms_all_inc = mysqli_query($enlace, $query_rooms_inc) or die(mysqli_error());
$row_rooms_reveal_inc = mysqli_fetch_assoc($query_rooms_all_inc);
$totalRows_rooms_reveal_inc = mysqli_num_rows($query_rooms_all_inc);

mysqli_close($enlace);

?>



      <td width="86%" class="align-middle" align="left">

      <table class="table table-bordered" <?php if ( $totalRows_rooms_reveal_inc == '0' ){?>style="display:none"<?php } ?> >
<tbody>


<?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->  

  
    <tr>
      <td width="42%" class="align-middle" align="left">
      -<?php echo $row_rooms_reveal_inc['name_incidents_beds']; ?></td>


      <td width="15%" class="align-middle" align="left">

      <span data-toggle="tooltip" data-placement="top" title="Mod Status" >

<button class="button"
data-toggle="modal" data-target="#edit_status_bed<?php echo $row_rooms_reveal_inc['id_reporte_incidencias_b']; ?>"

style="background-color: <?php echo $row_rooms_reveal_inc["color_back"]; ?>;
color: <?php echo $row_rooms_reveal_inc["color_text"]; ?>">

<?php echo $row_rooms_reveal_inc['name_incident_b_status']; ?></button>

</span>

<?php include("updates/update_bed_inci_status_modal.php"); ?>



<span data-toggle="tooltip" data-placement="top" title="Delete Incident" >
  <a href="" class="btn-danger"
  data-toggle="modal"
 data-target="#delete_b_inc<?php echo $row_rooms_reveal_inc['id_reporte_incidencias_b']; ?>"
  
  ><i class="fa-solid fa-eraser"></i></a></span>

  <?php include("deletes/delete_b_inc_modal.php"); ?>


      </td>





      <td width="25%" class="align-middle" align="left">

 <span style="font-size:12px;">
        <?php echo $row_rooms_reveal_inc['fecha_incidencia_b'];
        
        if ($row_rooms_reveal_inc['update_fecha_inc_b']=='')
        {$pp = '';
        $disp ='none';}

        else {
          $pp = 'Upd.:';
          $disp ='show';
        }
             
        
        
        ?></span><br>
      



<span style="font-size:11px; display:<?php echo $disp; ?>;">
<b><?php echo $pp; ?></b> <?php echo $row_rooms_reveal_inc['update_fecha_inc_b']; ?></span>

</td>



      <td width="17%" class="align-middle" align="left">

      <?php

include ("../conectar.php");
$este_lo_registro_a = $row_rooms_reveal_inc['id_quien_reporto_b'];
$queryFH_whoL_a = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro_a' limit 1";
$usuarios_whoL_a = mysqli_query($enlace, $queryFH_whoL_a) or die(mysqli_error());
$row_usuarios_whoL_a = mysqli_fetch_assoc($usuarios_whoL_a);


$este_lo_registro_upd = $row_rooms_reveal_inc['id_quien_actualizo_b'];
$queryFH_whoL_upd = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro_upd' limit 1";
$usuarios_whoL_upd = mysqli_query($enlace, $queryFH_whoL_upd) or die(mysqli_error());
$row_usuarios_whoL_upd = mysqli_fetch_assoc($usuarios_whoL_upd);


mysqli_close($enlace);  ?>




<span style="font-size:12px;">
<?php  echo $row_usuarios_whoL_a['p_surname_per']; ?> <?php echo $row_usuarios_whoL_a['p_name_per'];?>.</span><br>
      
<span style="font-size:11px; display:<?php echo $disp; ?>;">
<b><?php echo $pp; ?></b> <?php  echo $row_usuarios_whoL_upd['p_surname_per']; ?> <?php echo $row_usuarios_whoL_upd['p_name_per'];?>.</span>









      </td>




</tr>  <!-- cierre tr tercera -->

<?php } while ($row_rooms_reveal_inc = mysqli_fetch_assoc($query_rooms_all_inc)); ?>

</tbody>
</table>


      </td>





























</tr>   <!-- cierre tr segundaria -->


<?php } while ($row_rooms_details = mysqli_fetch_assoc($query_rooms_details)); ?>

</tbody>
</table>




</td>













     </tr>    <!-- cierre tr tabla principal -->


     <?php } while ($row_rooms_reveal = mysqli_fetch_assoc($query_rooms_all)); ?>
        

    </tbody>



  </table> <!-- cierre tabla -->

</div> <!-- cierre div tabla responsiva -->

</div> <!-- cierre card body  aqui -->



























                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

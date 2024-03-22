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
if(isset($_POST['borrar_inc_r']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{


  $id_a_borrar_r = $_POST['borrar_inc_r'];
  $incidente = $_POST['room_inc'];
  
  include("../conectar.php"); 
  
  
  $queryDiss = "DELETE FROM reporte_incidencias_r WHERE 	id_reporte_incidencias_r = '$id_a_borrar_r' LIMIT 1";
  
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












// editar room
if(isset($_POST['editar_the_room']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

// confirmar que no coincida el tipo de room con el numero....
include("../conectar.php"); 

$id_a_editar_es = $_POST['editar_the_room']; 

$room_number = $_POST['room_number'];


$queryCrr = "SELECT * FROM tb_room WHERE id_room !='$id_a_editar_es'
and id_hostel = '$mi_hostel_select'
and id_room_number = '$room_number' LIMIT 1";

$resultCrr = mysqli_query($enlace,$queryCrr);

        if (mysqli_num_rows($resultCrr)>0)
        {
        $errorZ="- Room is already registered.";
        mysqli_close($enlace); 
        }

  else  {


  
    $type_room = $_POST['type_room'];     
    $floors = $_POST['floors']; 
    $the_area = $_POST['the_area']; 
    $room_observ = $_POST['room_observ']; 
  
  
    $query_cambiame_U = "UPDATE tb_room SET id_room_kind = '$type_room',
                                            id_room_number = '$room_number',
                                            id_floors = '$floors',
                                       id_hostel_area = '$the_area',
                                       room_observ = '$room_observ'
    
     WHERE id_room = '$id_a_editar_es' LIMIT 1 ";
    
  
    if (!mysqli_query($enlace,$query_cambiame_U))      // si no ha logrado ingresar la foto
             {
  
     $errorZ.="- Error. ";               
     mysqli_close($enlace);
  
             }
  
    else {
    
      $exitoZ = "<b>--&nbsp; ".$room_number." &nbsp;--</b> was updated.";
      mysqli_close($enlace);
  
      }   






  }


}



// empieza el cambio de status del personal
if(isset($_POST['editar_room_inc']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";
    
    $mod_by_este = $_SESSION['id_per'];
    $ahora_cambio_a = $_POST['status_mod'];
    $date = date('y-m-d h:i:s');
    $id_a_ser_modi = $_POST['editar_room_inc'];


    include("../conectar.php");                                                
  
  
    $query_cambiame_state = "UPDATE reporte_incidencias_r SET id_quien_actualizo_r = '$mod_by_este',
                                                      update_fecha_inc_r = '$date',
                                                      id_incidencia_r_status = '$ahora_cambio_a'
    
     WHERE id_reporte_incidencias_r = '$id_a_ser_modi' LIMIT 1 "; 



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
if(isset($_POST['add_inc_room']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";

    $room_afectado_por_este = $_POST['agendado_by']; 

    $room_afectado = $_POST['add_inc_room']; 
  
    $name_a_cambiar = $_POST['name_del_cambiante']; 
   

    $id_del_incidente = $_POST['name_incident'];


    include("../conectar.php");     
    

    $date_p = date('y-m-d h:i:s');

    $query_add_inc_host = "INSERT INTO reporte_incidencias_r(id_quien_reporto_r, id_de_la_room_r, fecha_incidencia_r,
     id_de_incidencia_r, id_incidencia_r_status) 

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
    $exitoZ = "Incident Added To Room <b>--&nbsp; ".$name_a_cambiar." &nbsp;--</b>.";
    mysqli_close($enlace);

    }   

  
  

 }  // cierre cambio status




 











    if(isset($_POST['borrar_room']))
    {
$alerta_principal = "2";
          

      include("../conectar.php");  

// debo detectar si el id del hostel esta en uso antes...  de momento solo lo usan los clientes

$id_room_borrar = $_POST['borrar_room'];
$id_room_name = $_POST['room_name_or_n'];




$queryDiss = "DELETE FROM tb_room WHERE id_room = '$id_room_borrar' LIMIT 1";

if (!mysqli_query($enlace,$queryDiss))      // si no ha logrado borrar los direcc del hostel
   {
    $errorZ = " <i class=\"fa-solid fa-people-line fa-lg\"></i> "; 
    mysqli_close($enlace); 
    }



else {  

   $exitoZ = "Room <b>--&nbsp; " . $id_room_name . " &nbsp;--</b> was deleted.";
   mysqli_close($enlace);  

}           // hasta aqui gracias a borrar la data del hostel al estar en cascada se lleva el contenido del hostel.



}


    
















 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-5 col-lg-5 alert-primary" role="alert">
                    <i class="fa-solid fa-people-line fa-lg "></i> &nbsp; &nbsp;  
                    <i>Incidents in <?php echo $ttitulo;?> Rooms.</i>
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



<div class="row">

<div class="col-xl-3 col-sm-6 col-6 mb-3">

<a class="" href="selecc_zz_plus_note.php?ttabla=incidents_rooms&idtabla=id_incidents_rooms&nombdato=name_incidents_rooms&ttitulo=Incidents in Rooms">     

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

<a class="" href="selecc_zz_color.php?ttabla=incident_r_status&idtabla=id_incident_r_status&nombdato=name_incident_r_status&ttitulo=Rooms Incidents Status">     

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





<div class="card-body border border-info mb-2" <?php if ( $totalRows_rooms_reveal == '0' ){?>style="display:none"<?php } ?> >

<div class="table-responsive">

  <table class="table table-bordered stricolor table-sm" id="dataTable" width="100%" cellspacing="0">
   
    <thead>
      <tr>                  
        
          <th width="12%" class="align-middle" align="left">Details:</th>  <!-- chequear el status -->

<th width="78%" class="align-middle" align="left">
       
<table class="table table-bordered table-sm">
<tbody>
<thead>
    <tr>
      <th width="46%" class="align-middle" align="left" >Incidents</th>
      <th width="15%" class="align-middle" align="center"><i class="fa-solid fa-gear fa-lg"></i></th>

      <th width="24%" class="align-middle" align="center">Created</th>
      <th width="15%" class="align-middle" align="center">By</th>
    </tr>
  </thead>
</tbody>
</table>

          
</th>  <!-- chequear el status -->






          <th width="10%" class="align-middle" align="left">Add:</th>  <!-- chequear el status -->

                   

      </tr>
    </thead>  



     <tbody>



     <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


 <tr>


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

Room: <b><?php echo $row_rooms_reveal['name_room_number']; ?></b>
<br><b><span style="color:purple;">"<?php echo $row_rooms_reveal['name_floors']; ?>"</span></b><br>
<b>Area:</b> <?php echo $row_rooms_reveal['name_hostel_area']; ?>

</div>

</td>



<?php

$este_id_room_r = $row_rooms_reveal['id_room'];

include ("../conectar.php");

$query_rooms_inc = "SELECT * FROM reporte_incidencias_r, incidents_rooms, incident_r_status
where reporte_incidencias_r.id_de_la_room_r = '$este_id_room_r'
and reporte_incidencias_r.id_de_incidencia_r = incidents_rooms.id_incidents_rooms
and reporte_incidencias_r.id_incidencia_r_status = incident_r_status.id_incident_r_status
order by reporte_incidencias_r.fecha_incidencia_r desc limit 5";

$query_rooms_all_inc = mysqli_query($enlace, $query_rooms_inc) or die(mysqli_error());
$row_rooms_reveal_inc = mysqli_fetch_assoc($query_rooms_all_inc);
$totalRows_rooms_reveal_inc = mysqli_num_rows($query_rooms_all_inc);

mysqli_close($enlace);

?>





<td class="align-middle" align="center"> 

<table class="table table-bordered" <?php if ( $totalRows_rooms_reveal_inc == '0' ){?>style="display:none"<?php } ?> >
<tbody>


<?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->  

  
    <tr>
      <td width="45%" class="align-middle" align="left">-<?php echo $row_rooms_reveal_inc['name_incidents_rooms']; ?></td>


      <td width="15%" class="align-middle" align="center">

<span data-toggle="tooltip" data-placement="top" title="Mod Status" >

      <button class="button"
data-toggle="modal" data-target="#edit_status_room<?php echo $row_rooms_reveal_inc['id_reporte_incidencias_r']; ?>"

style="background-color: <?php echo $row_rooms_reveal_inc["color_back"]; ?>;
color: <?php echo $row_rooms_reveal_inc["color_text"]; ?>">
    
<?php echo $row_rooms_reveal_inc['name_incident_r_status']; ?></button>

</span>

<?php include("updates/update_room_inci_status_modal.php"); ?>



<span data-toggle="tooltip" data-placement="top" title="Delete Incident" >
  <a href="" class="btn-danger"
  data-toggle="modal"
 data-target="#delete_r_inc<?php echo $row_rooms_reveal_inc['id_reporte_incidencias_r']; ?>"
  
  ><i class="fa-solid fa-eraser"></i></a></span>

  <?php include("deletes/delete_r_inc_modal.php"); ?>


</td>





      <td width="24%" class="align-middle" align="center">

<span style="font-size:12px;">
        <?php echo $row_rooms_reveal_inc['fecha_incidencia_r'];
        
        if ($row_rooms_reveal_inc['update_fecha_inc_r']=='')
        {$pp = '';
        $disp ='none';}

        else {
          $pp = 'Upd.:';
          $disp ='show';
        }
             
        
        
        ?></span><br>
      



<span style="font-size:11px; display:<?php echo $disp; ?>;">
<b><?php echo $pp; ?></b> <?php echo $row_rooms_reveal_inc['update_fecha_inc_r']; ?></span>
 
      </td>


      <td width="16%" class="align-middle" align="center">

      <?php

include ("../conectar.php");
$este_lo_registro_a = $row_rooms_reveal_inc['id_quien_reporto_r'];
$queryFH_whoL_a = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro_a' limit 1";
$usuarios_whoL_a = mysqli_query($enlace, $queryFH_whoL_a) or die(mysqli_error());
$row_usuarios_whoL_a = mysqli_fetch_assoc($usuarios_whoL_a);


$este_lo_registro_upd = $row_rooms_reveal_inc['id_quien_actualizo_r'];
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






      </td>
    </tr>
 

  <?php } while ($row_rooms_reveal_inc = mysqli_fetch_assoc($query_rooms_all_inc)); ?>
  

</tbody>
</table>


</td>






<td class="align-middle" align="center">  
                   
                  
                   <button type="submit" name="add_a_inc" class="btn btn-secondary" data-toggle="modal"
                   data-target="#add_inci_room<?php echo $row_rooms_reveal['id_room']; ?>" >       
                   <i class="fa-solid fa-file-circle-plus fa-2x"></i></button>  


                <?php include("updates/add_inci_room_modal.php"); ?>

</td>










     </tr>


     <?php } while ($row_rooms_reveal = mysqli_fetch_assoc($query_rooms_all)); ?>
        

    </tbody>



  </table> <!-- cierre tabla -->

</div> <!-- cierre div tabla responsiva -->

</div> <!-- cierre card body  aqui -->























                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

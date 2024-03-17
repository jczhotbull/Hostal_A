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
if(isset($_POST['add_bed_to_room']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

  include("../conectar.php"); 

  $este_cuarto_aa = $_POST["add_bed_to_room"];    
 
  $este_tipo_cuarto_aa = $_POST["id_del_tipo_cuarto"];

  $bed_kind_1 = $_POST["bed_kind_1"];
  $bed_number_1 = $_POST["bed_number_1"];        
  $nota_1= mysqli_real_escape_string($enlace,$_POST['nota_1']);

   // proceso de insercion y creacion en la tabla room una beds...

$query_bed_1 = "INSERT INTO tb_rooms_beds(id_hostel, id_room, id_room_kind, id_bed_kind, id_bed_number, note) 
VALUES ( '$mi_hostel_select',  '$este_cuarto_aa', '$este_tipo_cuarto_aa', '$bed_kind_1', '$bed_number_1', '$nota_1')";

  $lista_bed_1 = mysqli_query($enlace, $query_bed_1) or die(mysqli_error());

  $exitoZ = "<b>Bed</b> was add.";
  mysqli_close($enlace);


}










// editar room
if(isset($_POST['editar_the_bed']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
  include("../conectar.php"); 

  $id_bed_a_editar_es = $_POST['editar_the_bed']; 

  $name_the_bed_es = $_POST['name_the_bed']; 
  $bed_kind_es = $_POST['bed_kind']; 
  $bed_observ_es = $_POST['bed_observ']; 

  $name_editado_aaaa = $_POST['name_editado_a'];

  $query_cambiame_U_bed = "UPDATE tb_rooms_beds SET 
  id_bed_kind = '$bed_kind_es',
  id_bed_number = '$name_the_bed_es',
      note = '$bed_observ_es'

WHERE id_rooms_beds = '$id_bed_a_editar_es' LIMIT 1 ";


if (!mysqli_query($enlace,$query_cambiame_U_bed))      // si no ha logrado ingresar la foto
{

$errorZ.="- Error. ";               
mysqli_close($enlace);

}

else {

$exitoZ = "<b>--&nbsp; ". $name_editado_aaaa." &nbsp;--</b> was updated.";
mysqli_close($enlace);

}   




  

}





// editar room
if(isset($_POST['editar_the_room']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

// confirmar que no coincida el tipo de room con el numero....
include("../conectar.php"); 

$id_a_editar_es = $_POST['editar_the_room']; 

$room_number = $_POST['room_number'];

$type_room = $_POST['type_room']; 

$nameee_product = $_POST['name_editado'];

$queryCrr = "SELECT * FROM tb_room WHERE id_room !='$id_a_editar_es'
and id_hostel = '$mi_hostel_select'
and id_room_number = '$room_number'
and id_room_kind = '$type_room' LIMIT 1";

$resultCrr = mysqli_query($enlace,$queryCrr);

        if (mysqli_num_rows($resultCrr)>=1)
        {
        $errorZ="- Room is already registered.";
        mysqli_close($enlace); 
        }

  else  {


  
        
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

      $room_kind_update = $type_room;

      $query_cambiame_U_beds = "UPDATE tb_rooms_beds SET id_room_kind = '$room_kind_update'  
      WHERE id_room = '$id_a_editar_es' ";
      $lista_all_beds_U = mysqli_query($enlace, $query_cambiame_U_beds) or die(mysqli_error());

    
      $exitoZ = "<b>--&nbsp; ".$nameee_product." &nbsp;--</b> was updated.";
      mysqli_close($enlace);
  
      }   






  }


}












// empieza el cambio de status del personal
if(isset($_POST['close_room']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";

    $room_afectado_por_este = $_POST['desactivado_by']; 

    $room_afectado = $_POST['close_room']; 


    


    $name_a_cambiar = $_POST['name_del_cambiante']; 
   


    include("../conectar.php");                                                

    $query_disable_host = "INSERT INTO quien_y_cuando_room(id_quien_permite_o_no, id_room_activ_or_deac,
     text_perm_o_no, historico_de_status) 

    VALUES (   '$room_afectado_por_este',
               '$room_afectado',
               '".mysqli_real_escape_string($enlace,$_POST['nota_text'])."'    ,
               '0'

            )";


if (!mysqli_query($enlace,$query_disable_host))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{



  include("../conectar.php");   

  $query_cambiame_U = "UPDATE tb_room SET room_status = '0' WHERE id_room = '$room_afectado' LIMIT 1 ";
  

  if (!mysqli_query($enlace,$query_cambiame_U))      // si no ha logrado ingresar la foto
           {

   $errorZ.="- Error. ";               
   mysqli_close($enlace);

           }

  else {
  
    $exitoZ = "Room <b>--&nbsp; ".$name_a_cambiar." &nbsp;--</b> pass to close.";
    mysqli_close($enlace);

    }   

  


}



  



 }  // cierre cambio status




 









// empieza el cambio de status del personal
if(isset($_POST['open_room']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";

    $room_afectado_por_este = $_POST['desactivado_by']; 

    $room_afectado = $_POST['open_room']; 


    


    $name_a_cambiar = $_POST['name_del_cambiante']; 
   


    include("../conectar.php");                                                

    $query_disable_host = "INSERT INTO quien_y_cuando_room(id_quien_permite_o_no, id_room_activ_or_deac,
     text_perm_o_no, historico_de_status) 

    VALUES (   '$room_afectado_por_este',
               '$room_afectado',
               '".mysqli_real_escape_string($enlace,$_POST['nota_text'])."'    ,
               '1'

            )";


if (!mysqli_query($enlace,$query_disable_host))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}

else 
{



  include("../conectar.php");   

  $query_cambiame_U = "UPDATE tb_room SET room_status = '1' WHERE id_room = '$room_afectado' LIMIT 1 ";
  

  if (!mysqli_query($enlace,$query_cambiame_U))      // si no ha logrado ingresar la foto
           {

   $errorZ.="- Error. ";               
   mysqli_close($enlace);

           }

  else {
  
    $exitoZ = "Room <b>--&nbsp; ".$name_a_cambiar." &nbsp;--</b> pass to open.";
    mysqli_close($enlace);

    }   

  


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


    





if(isset($_POST['borrar_bed']))
{
$alerta_principal = "2";
      

  include("../conectar.php");  

// debo detectar si el id de la bed esta en uso antes...  de momento solo lo usan los clientes

$id_bed_borrar = $_POST['borrar_bed'];
$id_bed_name = $_POST['bed_name_or_n'];




$queryDiss = "DELETE FROM tb_rooms_beds WHERE id_rooms_beds = '$id_bed_borrar' LIMIT 1";

if (!mysqli_query($enlace,$queryDiss))      // si no ha logrado borrar los direcc del hostel
{
$errorZ = " <i class=\"fa-solid fa-people-line fa-lg\"></i> "; 
mysqli_close($enlace); 
}



else {  

$exitoZ = "Bed <b>--&nbsp; " . $id_bed_name . " &nbsp;--</b> was deleted.";
mysqli_close($enlace);  

}           // hasta aqui gracias a borrar la data del hostel al estar en cascada se lleva el contenido del hostel.



}










 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-people-line fa-lg "></i> &nbsp; &nbsp;  <i> All <b><?php echo $ttitulo ?></b> Rooms.</i>
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
        
          <th width="10%">Room</th>  <!-- chequear el status -->
          <th width="25%">Characteristics</th>  <!-- chequear el status -->

             <th width="10%"><i class="fa-solid fa-toolbox fa-lg"></i></th> 
             <th width="55%">
              
             <table class="table table-bordered table-sm">
<tbody>
<thead>
    <tr>
      <th width="15%" class="align-middle" align="left" >Bed(s) N°</th>
      <th width="15%" class="align-middle" align="center">Kind</th>

      <th width="56%" class="align-middle" align="center">Charac.</th>
      <th width="14%" class="align-middle" align="center"><i class="fa-solid fa-ellipsis-vertical fa-lg"></i></th>
      
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

Room: <b><?php echo $row_rooms_reveal['name_room_number']; ?></b>
<br><b><span style="color:purple;">"<?php echo $row_rooms_reveal['name_floors']; ?>"</span></b><br>
<b>Area:</b> <?php echo $row_rooms_reveal['name_hostel_area']; ?>

</div>



</td>


<td class="align-middle" align="center">
<span style="color: blue;"><?php echo $row_rooms_reveal['room_observ']; ?></span>
</td>






<td class="align-middle" align="center">  

<div data-toggle="tooltip" data-placement="top" title="Mod Room." >
<button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
                  data-target="#modificar<?php echo $row_rooms_reveal['id_room']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fas fa-edit"></i></button>    
</div>

<?php include("updates/update_room_modal.php"); ?>





  <?php if ($row_rooms_reveal['room_status']=='1') { ?>
                   
  <span data-toggle="tooltip" data-placement="top" title="Room: Open"> 
  <button type="submit" name="cambio_status_room" class="btn btn-outline-success btn-sm mb-1" data-toggle="modal"
  data-target="#desactivar_room<?php echo $row_rooms_reveal['id_room']; ?>" >       
  <i class="fa-solid fa-door-open"></i></button>  
  </span> 

   <?php   }?>     



  <?php if ($row_rooms_reveal['room_status']=='0') { ?>
                   
  <span data-toggle="tooltip" data-placement="top" title="Room: Close">
  <button type="submit" name="cambio_status_room" class="btn btn-outline-secondary btn-sm mb-1"
  data-toggle="modal" data-target="#activar_room<?php echo $row_rooms_reveal['id_room']; ?>" >       
  <i class="fa-solid fa-door-closed"></i></button>  
  </span>   

                   <?php   }?>   


<?php include("updates/deshabilitar_room_modal.php"); ?>






<div data-toggle="tooltip" data-placement="top" title="Delete Room." >
  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
                  data-target="#borrar<?php echo $row_rooms_reveal['id_room']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                  <i class="far fa-trash-alt"></i></button>      
</div>


</td>

<?php include("deletes/delete_room_modal.php"); ?>







<td class="align-middle" align="left">




<?php

$id_del_room = $row_rooms_reveal['id_room'];

include ("../conectar.php");

$query_details = "SELECT * FROM tb_rooms_beds, bed_kind, bed_number
where tb_rooms_beds.id_room = '$id_del_room'
and tb_rooms_beds.id_bed_kind = bed_kind.id_bed_kind
and tb_rooms_beds.id_bed_number = bed_number.id_bed_number
order by bed_number.name_bed_number asc";

$query_rooms_details = mysqli_query($enlace, $query_details) or die(mysqli_error());
$row_rooms_details = mysqli_fetch_assoc($query_rooms_details);
$totalRows_rooms_details = mysqli_num_rows($query_rooms_details);


mysqli_close($enlace);

?>





<table class="table table-bordered" <?php if ( $totalRows_rooms_details == '0' ){?>style="display:none"<?php } ?> >
<tbody>


<?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


  <tr>
      <td width="15%" class="align-middle" align="left">
      <?php echo $row_rooms_details['name_bed_number']; ?></td>


      <td width="15%" class="align-middle" align="left">
      <?php echo $row_rooms_details['name_bed_kind']; ?>
      </td>

      <td width="55%" class="align-middle" align="left">
    <b><?php echo $row_rooms_details['note']; ?></b>


      </td>

      <td width="15%" class="align-middle" align="left">


      <span data-toggle="tooltip" data-placement="top" title="Mod Bed - <?php echo $row_rooms_details['name_bed_number']; ?>" >
  <a href="" class="btn-primary mb-1"
  data-toggle="modal"
data-target="#edit_cama<?php echo $row_rooms_details['id_rooms_beds']; ?>"><i class="fa-solid fa-wrench"></i></a></span>



  <?php include("updates/update_beds_modal.php"); ?>




  
  <span data-toggle="tooltip" data-placement="top" title="Delete Bed - <?php echo $row_rooms_details['name_bed_number']; ?>"" >
  <a href="" class="btn-danger mb-1"
  data-toggle="modal"
 data-target="#delete_cama<?php echo $row_rooms_details['id_rooms_beds']; ?>"
  
  ><i class="fa-solid fa-eraser"></i></a></span><br>

 

  <?php include("deletes/delete_bed_modal.php"); ?>













      </td>
</tr>


<?php } while ($row_rooms_details = mysqli_fetch_assoc($query_rooms_details)); ?>

</tbody>
</table>


<span data-toggle="tooltip" data-placement="top" title="Add a Bed to Room: <?php echo $row_rooms_reveal['name_room_number']; ?>"" >
  <a href="" class="btn-success"
  data-toggle="modal"
 data-target="#add_cama<?php echo $row_rooms_reveal['id_room']; ?>"
  
  ><i class="fa-solid fa-plus fa-lg"></i></a></span><br>



  <?php include("updates/add_a_bed_room_modal.php"); ?>

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

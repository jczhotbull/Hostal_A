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
if(isset($_POST['editar_the_service']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

// confirmar que no coincida el tipo de room con el numero....
include("../conectar.php"); 

$id_a_editar_es = $_POST['editar_the_service']; 
$the_product = $_POST['product_name_mod'];
$type_product = $_POST['type_product_mod']; 

$ofertado_como = $_POST['type_offer_mod']; 

$nameee_product = $_POST['name_editado'];


$queryCrr = "SELECT * FROM tb_services WHERE id_services !='$id_a_editar_es'
and id_hostal = '$mi_hostel_select'
and id_producto = '$the_product'
and id_product_kind = '$type_product'
and sale_kind = '$ofertado_como' LIMIT 1";

$resultCrr = mysqli_query($enlace,$queryCrr);

        if (mysqli_num_rows($resultCrr)>=1)
        {
        $errorZ="- Service is already registered.";
        mysqli_close($enlace); 
        }

  else  {


    $cha_mod = $_POST['cha_mod']; 
  
  
    $query_cambiame_U = "UPDATE tb_services SET id_product_kind = '$type_product',
                                            id_producto = '$the_product',                             
                                            service_charac = '$cha_mod',
                                            sale_kind = '$ofertado_como'
    
     WHERE id_services = '$id_a_editar_es' LIMIT 1 ";
    
  
    if (!mysqli_query($enlace,$query_cambiame_U))      // si no ha logrado ingresar la foto
             {
  
     $errorZ.="- Error. ";               
     mysqli_close($enlace);
  
             }
  
    else {     

    
      $exitoZ = "<b>--&nbsp; ".$nameee_product." &nbsp;--</b> was updated.";
      mysqli_close($enlace);
  
      }   



  }


}












// empieza el cambio de status del personal
if(isset($_POST['no_service']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";

    $service_afectado = $_POST['no_service']; 

    $name_a_cambiar = $_POST['name_del_cambiante']; 


  include("../conectar.php");   

  $query_cambiame_U = "UPDATE tb_services SET service_status = '0' WHERE id_services = '$service_afectado' LIMIT 1 ";
  

  if (!mysqli_query($enlace,$query_cambiame_U))      // si no ha logrado ingresar la foto
           {

   $errorZ.="- Error. ";               
   mysqli_close($enlace);

           }

  else {
  
    $exitoZ = "Service <b>--&nbsp; ".$name_a_cambiar." &nbsp;--</b> pass to not available.";
    mysqli_close($enlace);

    }   

  


 }  // cierre cambio status




 









// empieza el cambio de status del personal
if(isset($_POST['with_service']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{
    $alerta_principal = "2";

    $service_afectado = $_POST['with_service']; 

    $name_a_cambiar = $_POST['name_del_cambiante']; 


  include("../conectar.php");   

  $query_cambiame_U = "UPDATE tb_services SET service_status = '1' WHERE id_services = '$service_afectado' LIMIT 1 ";
  

  if (!mysqli_query($enlace,$query_cambiame_U))      // si no ha logrado ingresar la foto
           {

   $errorZ.="- Error. ";               
   mysqli_close($enlace);

           }

  else {
  
    $exitoZ = "Service <b>--&nbsp; ".$name_a_cambiar." &nbsp;--</b> pass to available.";
    mysqli_close($enlace);

    }   

  


 }  // cierre cambio status

















    if(isset($_POST['borrar_service']))
    {
$alerta_principal = "2";
          

      include("../conectar.php");  

// debo detectar si el id del hostel esta en uso antes...  de momento solo lo usan los clientes

$id_service_borrar = $_POST['borrar_service'];
$id_service_name = $_POST['service_name_or_n'];




$queryDiss = "DELETE FROM tb_services WHERE id_services = '$id_service_borrar' LIMIT 1";

if (!mysqli_query($enlace,$queryDiss))      // si no ha logrado borrar los direcc del hostel
   {
    $errorZ = " <i class=\"fa-solid fa-people-line fa-lg\"></i> "; 
    mysqli_close($enlace); 
    }



else {  

   $exitoZ = "Service <b>--&nbsp; " . $id_service_name . " &nbsp;--</b> was deleted.";
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

                <div class="alert col-md-4 col-lg-4 alert-primary" role="alert">
                    <i class="fa-solid fa-bag-shopping fa-lg "></i> &nbsp; &nbsp;  <i> All <b><?php echo $ttitulo ?></b> Services.</i>
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




      

<?php

$este_id_kind = $idtbla;

include ("../conectar.php");

$query_services = "SELECT * FROM product_kind, tb_services, productos
where product_kind.id_product_kind = '$este_id_kind'
and product_kind.id_product_kind = tb_services.id_product_kind
and tb_services.id_producto = productos.id_producto
and tb_services.id_hostal = '$mi_hostel_select'
order by tb_services.id_producto asc";

$query_services_all = mysqli_query($enlace, $query_services) or die(mysqli_error());
$row_services_reveal = mysqli_fetch_assoc($query_services_all);
$totalRows_services_reveal = mysqli_num_rows($query_services_all);

mysqli_close($enlace);

?>








<div class="card-body border border-info mb-2" <?php if ( $totalRows_services_reveal == '0' ){?>style="display:none"<?php } ?> >

<div class="table-responsive">

  <table class="table table-bordered stricolor table-sm" id="dataTable" width="100%" cellspacing="0">
   
    <thead>
      <tr>                  
        
          <th width="25%">Product Name</th>  <!-- chequear el status -->
          <th width="60%">characteristics</th>  <!-- chequear el status -->
          <th width="15%"><i class="fa-solid fa-toolbox fa-lg"></i></th> 
           

      </tr>
    </thead>


 



     <tbody>


     <?php do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->   


<tr   >


<?php

include ("../conectar.php");
$este_lo_registro = $row_services_reveal['creado_por_el'];
$queryFH_whoL = "SELECT id_per, p_name_per, p_surname_per FROM tb_personal 
WHERE id_per = '$este_lo_registro' limit 1";
$usuarios_whoL = mysqli_query($enlace, $queryFH_whoL) or die(mysqli_error());
$row_usuarios_whoL = mysqli_fetch_assoc($usuarios_whoL);


mysqli_close($enlace);

?>




<td class="align-middle" align="center">
     
<div data-toggle="tooltip" data-placement="top"
title="Registered by: <?php echo $row_usuarios_whoL['p_surname_per'];?> <?php echo $row_usuarios_whoL['p_name_per'];?>. " >

<?php echo $row_services_reveal['name_producto']; ?><br> <b>For:</b> <span style="color:purple;"><b>

<?php if ($row_services_reveal['sale_kind'] == '1') {
  $tipin ="Sale";
} 

else {
  $tipin ="Rent";
}
echo $tipin; ?></b>


</span>

</div>

</td>

      
<td class="align-middle" align="center">

<span style="color: blue;"><?php echo $row_services_reveal['service_charac']; ?></span>

</td>    





<td class="align-middle" align="center">
     
     
<div data-toggle="tooltip" data-placement="top" title="Mod Service." >
<button type="button" class="btn btn-outline-info btn-sm mb-1" data-toggle="modal"
data-target="#modificar<?php echo $row_services_reveal['id_services']; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->
                  <i class="fas fa-edit"></i></button>    
</div>

<?php include("updates/update_service_modal.php"); ?>



                   <?php if ($row_services_reveal['service_status']=='1') { ?>
                   
                   <span data-toggle="tooltip" data-placement="top" title="Service: Available"> 
                   <button type="submit" name="cambio_status_service" class="btn btn-outline-success btn-sm mb-1"
                   data-toggle="modal"
                   data-target="#desactivar_service<?php echo $row_services_reveal['id_services']; ?>" >       
                   <i class="fa-solid fa-box-open"></i></button>  
                   </span>  



                 
                    <?php   }?>     
                 
                   


                 
                   <?php if ($row_services_reveal['service_status']=='0') { ?>
                                    
                   <span data-toggle="tooltip" data-placement="top" title="Service: Not available">
                   <button type="submit" name="cambio_status_service_a" class="btn btn-outline-secondary btn-sm mb-1"
                   data-toggle="modal" data-target="#activar_service<?php echo $row_services_reveal['id_services']; ?>" >       
                   <i class="fa-solid fa-box"></i></button>  
                   </span>   


                                    <?php   }?>   
                 
                 
 <?php include("updates/deshabilitar_service_modal.php"); ?>




<div data-toggle="tooltip" data-placement="top" title="Delete Service." >
                   <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal"
data-target="#borrar<?php echo $row_services_reveal['id_services']; ?>">
                       <!-- este ultimo identifica cual modal abrir -->
                 
                                   <i class="far fa-trash-alt"></i></button>      
                 </div>


                 <?php include("deletes/delete_service_modal.php"); ?>




</td>








     
</tr>


<?php } while ($row_services_reveal = mysqli_fetch_assoc($query_services_all)); ?>




    </tbody>



  </table> <!-- cierre tabla -->

</div> <!-- cierre div tabla responsiva -->

</div> <!-- cierre card body  aqui -->























                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

<?php

$val = $_POST['val'];

include("../conectar.php");
      $query_bus_doc_aa = "SELECT * FROM  tb_guests, tb_data_guests, behaviors        
        WHERE tb_guests.id_guests = tb_data_guests.id_guests
        and tb_data_guests.guests_behaviors = behaviors.id_behaviors
        and tb_guests.guests_doc_id = '$val'  limit 1 ";

$datos_plantilla_bus_doc_aa = mysqli_query($enlace, $query_bus_doc_aa) or die(mysqli_error());
$row_plantilla_bus_doc_aa = mysqli_fetch_assoc($datos_plantilla_bus_doc_aa);
$totalRows_datos_plantilla_bus_doc_aa = mysqli_num_rows($datos_plantilla_bus_doc_aa); 

$p_name = $row_plantilla_bus_doc_aa['p_name_g'];
$p_surname = $row_plantilla_bus_doc_aa['p_surname_g'];
$id_nation = $row_plantilla_bus_doc_aa['id_nation_g'];

$g_phone = $row_plantilla_bus_doc_aa['guests_phone'];
$g_email = $row_plantilla_bus_doc_aa['guests_email'];

$g_birth = $row_plantilla_bus_doc_aa['guests_birth'];
$g_sex = $row_plantilla_bus_doc_aa['guests_sex'];

$g_observ = $row_plantilla_bus_doc_aa['guests_observ'];

$name_behaviors = $row_plantilla_bus_doc_aa['name_behaviors'];
$color_back = $row_plantilla_bus_doc_aa['color_back'];
$color_text = $row_plantilla_bus_doc_aa['color_text'];
$icon_behaviors = $row_plantilla_bus_doc_aa['icon_behaviors'];


mysqli_close($enlace);


$data = array(
    "p_name" => $p_name,
    "p_surname" =>  $p_surname,
    "id_nation" =>  $id_nation,
    "g_phone" =>  $g_phone,
    "g_email" =>  $g_email,
    "g_birth" =>  $g_birth,
    "g_sex" =>  $g_sex,
    "g_observ" =>  $g_observ,

    "name_behaviors" =>  $name_behaviors,
    "color_back" =>  $color_back,
    "color_text" =>  $color_text,
    "icon_behaviors" =>  $icon_behaviors,
);

echo json_encode($data);


?>
<?php




$query_product_kind = "SELECT * FROM product_kind ORDER BY name_product_kind ASC";

$datos_product_kind = mysqli_query($enlace, $query_product_kind) or die(mysqli_error());

$row_datos_product_kind = mysqli_fetch_assoc($datos_product_kind);





$query_productos = "SELECT * FROM productos ORDER BY name_producto ASC";

$datos_productos = mysqli_query($enlace, $query_productos) or die(mysqli_error());

$row_datos_productos = mysqli_fetch_assoc($datos_productos);
$totalRows_datos_productos = mysqli_num_rows($datos_productos);








$query_floors = "SELECT * FROM floors ORDER BY name_floors ASC";

$datos_floors = mysqli_query($enlace, $query_floors) or die(mysqli_error());

$row_datos_floors = mysqli_fetch_assoc($datos_floors);




$query_hostel_area = "SELECT * FROM hostel_area ORDER BY name_hostel_area ASC";

$datos_hostel_area = mysqli_query($enlace, $query_hostel_area) or die(mysqli_error());

$row_datos_hostel_area = mysqli_fetch_assoc($datos_hostel_area);






$query_bed_kind = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind = mysqli_query($enlace, $query_bed_kind) or die(mysqli_error());
$row_datos_bed_kind = mysqli_fetch_assoc($datos_bed_kind);




$query_bed_number = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number = mysqli_query($enlace, $query_bed_number) or die(mysqli_error());
$row_datos_bed_number = mysqli_fetch_assoc($datos_bed_number);







$query_bed_kind_2 = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind_2 = mysqli_query($enlace, $query_bed_kind_2) or die(mysqli_error());
$row_datos_bed_kind_2 = mysqli_fetch_assoc($datos_bed_kind_2);




$query_bed_number_2 = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number_2 = mysqli_query($enlace, $query_bed_number_2) or die(mysqli_error());
$row_datos_bed_number_2 = mysqli_fetch_assoc($datos_bed_number_2);





$query_bed_kind_3 = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind_3 = mysqli_query($enlace, $query_bed_kind_3) or die(mysqli_error());
$row_datos_bed_kind_3 = mysqli_fetch_assoc($datos_bed_kind_3);




$query_bed_number_3 = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number_3 = mysqli_query($enlace, $query_bed_number_3) or die(mysqli_error());
$row_datos_bed_number_3 = mysqli_fetch_assoc($datos_bed_number_3);




$query_bed_kind_4 = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind_4 = mysqli_query($enlace, $query_bed_kind_4) or die(mysqli_error());
$row_datos_bed_kind_4 = mysqli_fetch_assoc($datos_bed_kind_4);




$query_bed_number_4 = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number_4 = mysqli_query($enlace, $query_bed_number_4) or die(mysqli_error());
$row_datos_bed_number_4 = mysqli_fetch_assoc($datos_bed_number_4);





$query_bed_kind_5 = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind_5 = mysqli_query($enlace, $query_bed_kind_5) or die(mysqli_error());
$row_datos_bed_kind_5 = mysqli_fetch_assoc($datos_bed_kind_5);




$query_bed_number_5 = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number_5 = mysqli_query($enlace, $query_bed_number_5) or die(mysqli_error());
$row_datos_bed_number_5 = mysqli_fetch_assoc($datos_bed_number_5);






$query_bed_kind_6 = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind_6 = mysqli_query($enlace, $query_bed_kind_6) or die(mysqli_error());
$row_datos_bed_kind_6 = mysqli_fetch_assoc($datos_bed_kind_6);




$query_bed_number_6 = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number_6 = mysqli_query($enlace, $query_bed_number_6) or die(mysqli_error());
$row_datos_bed_number_6 = mysqli_fetch_assoc($datos_bed_number_6);





$query_bed_kind_7 = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind_7 = mysqli_query($enlace, $query_bed_kind_7) or die(mysqli_error());
$row_datos_bed_kind_7 = mysqli_fetch_assoc($datos_bed_kind_7);




$query_bed_number_7 = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number_7 = mysqli_query($enlace, $query_bed_number_7) or die(mysqli_error());
$row_datos_bed_number_7 = mysqli_fetch_assoc($datos_bed_number_7);




$query_bed_kind_8 = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind_8 = mysqli_query($enlace, $query_bed_kind_8) or die(mysqli_error());
$row_datos_bed_kind_8 = mysqli_fetch_assoc($datos_bed_kind_8);




$query_bed_number_8 = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number_8 = mysqli_query($enlace, $query_bed_number_8) or die(mysqli_error());
$row_datos_bed_number_8 = mysqli_fetch_assoc($datos_bed_number_8);



$query_bed_kind_9 = "SELECT * FROM bed_kind where name_bed_kind != 'None' ORDER BY name_bed_kind ASC";
$datos_bed_kind_9 = mysqli_query($enlace, $query_bed_kind_9) or die(mysqli_error());
$row_datos_bed_kind_9 = mysqli_fetch_assoc($datos_bed_kind_9);




$query_bed_number_9 = "SELECT * FROM bed_number where name_bed_number != 'None' ORDER BY name_bed_number ASC";
$datos_bed_number_9 = mysqli_query($enlace, $query_bed_number_9) or die(mysqli_error());
$row_datos_bed_number_9 = mysqli_fetch_assoc($datos_bed_number_9);



mysqli_close($enlace);  


?>
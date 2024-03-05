<?php



$query_country = "SELECT * FROM country ORDER BY name_country ASC";

$datos_country = mysqli_query($enlace, $query_country) or die(mysqli_error());

$row_datos_country = mysqli_fetch_assoc($datos_country);





mysqli_close($enlace);  


?>
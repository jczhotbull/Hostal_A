<?php





$query_country = "SELECT * FROM country ORDER BY name_country ASC";

$datos_country = mysqli_query($enlace, $query_country) or die(mysqli_error());

$row_datos_country = mysqli_fetch_assoc($datos_country);





		$query_sex = "SELECT * FROM sex ORDER BY name_sex ASC";

		$datos_sex = mysqli_query($enlace, $query_sex) or die(mysqli_error());

		$row_datos_sex = mysqli_fetch_assoc($datos_sex);





$query_nacionality = "SELECT * FROM nationality ORDER BY name_nationality ASC";

$datos_nacionality = mysqli_query($enlace, $query_nacionality) or die(mysqli_error());

$row_datos_nacionality = mysqli_fetch_assoc($datos_nacionality);




	    $query_hostel = "SELECT * FROM z_hostel ORDER BY name_hostel ASC";

		$datos_hostel = mysqli_query($enlace, $query_hostel) or die(mysqli_error());

		$row_datos_hostel = mysqli_fetch_assoc($datos_hostel);




$query_rol = "SELECT * FROM roles ORDER BY name_rol ASC";

$datos_rol = mysqli_query($enlace, $query_rol) or die(mysqli_error());

$row_datos_rol = mysqli_fetch_assoc($datos_rol);





mysqli_close($enlace);  


?>
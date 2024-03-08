<?php




$query_room_kind = "SELECT * FROM room_kind ORDER BY name_room_kind ASC";

$datos_room_kind = mysqli_query($enlace, $query_room_kind) or die(mysqli_error());

$row_datos_room_kind = mysqli_fetch_assoc($datos_room_kind);








mysqli_close($enlace);  


?>
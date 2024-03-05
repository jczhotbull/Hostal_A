<?php


$query_String_cumplen = "SELECT COUNT(*) AS total FROM tb_personal
WHERE  status ='1'
and day(birth_per)=day(NOW()) 
and month(birth_per)=month(NOW())";

$query_cumplen = mysqli_query($enlace, $query_String_cumplen);

$row_cumplen = mysqli_fetch_object($query_cumplen);  




?>
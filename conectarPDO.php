<?php


include("c_datos.php");



$connect = new PDO("mysql:host=$hostname_enlace;dbname=$database_enlace", "$username_enlace", "$password_enlace");



$acentos = $connect->query("SET NAMES 'utf8'");                    // Necesario para caracteres latinos   


?>


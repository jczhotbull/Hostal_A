<?php


include("c_datos.php");




         $enlace = mysqli_connect($hostname_enlace, $username_enlace, $password_enlace, $database_enlace);
         $acentos = $enlace->query("SET NAMES 'utf8'");                    // Necesario para caracteres latinos
        
        
        	if (mysqli_connect_error())     // chequea si hay error
        		{
          		 die ("Error de conexión en la base de datos");
                }

?>


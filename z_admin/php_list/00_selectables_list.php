<?php


        





$query_String_nacionalitys = "SELECT COUNT(*) AS total_nacionalitys FROM nationality";

$query_nacionalitys = mysqli_query($enlace, $query_String_nacionalitys);

$row_nacionalitys = mysqli_fetch_object($query_nacionalitys);




	    $query_String_sexos = "SELECT COUNT(*) AS total_sexos FROM sex";

        $query_sexos = mysqli_query($enlace, $query_String_sexos);

        $row_sexos = mysqli_fetch_object($query_sexos);




$query_String_paises = "SELECT COUNT(*) AS total_paises FROM country";

$query_paises = mysqli_query($enlace, $query_String_paises);

$row_paises = mysqli_fetch_object($query_paises);




        $query_String_rols = "SELECT COUNT(*) AS total_rols FROM roles";

        $query_rols = mysqli_query($enlace, $query_String_rols);

        $row_rols = mysqli_fetch_object($query_rols);






       
?>

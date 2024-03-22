<?php


session_start();

header("Content-type: text/html;charset=\"utf-8\"");                  // Necesario para caracteres latinos

	$errorZ="";  // acumula los mensajes de error
	$infoZ="";   // acumula los mensajes de información
	$exitoZ="";  // acumula los mensajes de éxito

	
	if ($_SESSION ['id_rol_per'] != '1' && $_SESSION ['id_rol_per'] != '2' && $_SESSION ['id_rol_per'] != '3' &&
	   $_SESSION ['id_rol_per'] != '4'  && $_SESSION ['id_rol_per'] != '5' )

		{

			session_unset();                     // libera todas las variables de sessión
		    setcookie("id_per", "", time()-60*60);   // crea la cookie id_per con el valor vacio y que caduque una hora antes.
		    $_COOKIE ['id_per']="";                  // borra el valor de id_per contenido en el cookie, por medida extra

		    setcookie("id_rol_per", "", time()-60*60);   // crea la cookie rol con el valor vacio y que caduque una hora antes.
		    $_COOKIE ['id_rol_per']="";                  // borra el valor de rol contenido en el cookie, por medida extra

		    header("Location: ../index.php");

		}



if (array_key_exists("id_per",$_SESSION))    // si existe la clave id para mi array session, realizar...
		{

		include("../conectar.php");
		

		$nombre = "SELECT id_per, p_name_per, p_surname_per, id_data_per 
		FROM tb_personal WHERE id_per = ' ".$_SESSION['id_per']." ' limit 1";        

					$resultC = mysqli_query($enlace,$nombre);
					$nnn=mysqli_fetch_array($resultC);                /* antes en select tenia nombres */		




	if ($_SESSION ['id_rol_per'] == '1' )
		{$abrev = "S. Admin:";
		}

		if ($_SESSION ['id_rol_per'] == '2' )
		{$abrev = "Volunteer";
		}

		if ($_SESSION ['id_rol_per'] == '3' )
		{$abrev = "";
		}

		if ($_SESSION ['id_rol_per'] == '4' )
		{$abrev = "";
		}

		if ($_SESSION ['id_rol_per'] == '5' )
		{$abrev = "";
		}

        $el_ideal = $nnn['id_data_per'];


		$foto = "SELECT id_data_per, pic_per FROM tb_data_personal WHERE id_data_per = '$el_ideal' limit 1";        

		$resultC_fot = mysqli_query($enlace,$foto);
		$nnn_fot=mysqli_fetch_array($resultC_fot);      


if ($nnn_fot['pic_per'] != '') {

//	 $infoZ .= "<img src=\" ".$nnn_fot['pic_per']." \" width=\"20px\" style=\"border-radius: 30%; height: auto;\" /> &nbsp; ".$abrev."</i>
 //   &nbsp;" . $nnn['p_surname_per'] . " " . $nnn['p_name_per'] . ".";


	$infoZ .= " <i class=\"textadmin\"><i class=\"far fa-id-badge\"></i>&nbsp; ".$abrev."</i>
    &nbsp;" . $nnn['p_surname_per'] . " " . $nnn['p_name_per'] . ".";


}

else {

    $infoZ .= " <i class=\"textadmin\"><i class=\"far fa-id-badge\"></i>&nbsp; ".$abrev."</i>
    &nbsp;" . $nnn['p_surname_per'] . " " . $nnn['p_name_per'] . ".";
}




		  
		mysqli_close($enlace);

	    }

    else   // si no estan esas dos comprobaciones echas, se manda a autenticar...
    {
    	mysqli_close($enlace);
    	header("Location: ../index.php");
    }









?>
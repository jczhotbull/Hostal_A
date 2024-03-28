<?php  

session_start();        // Necesario para que recuerde si ya habia iniciado sesión, el reanuda una sesion que
                        // se hubiera iniciado anteriormente, o inicia una nueva si no la hubiera.
                        // se debe colocar en todas las paginas del sitio web.


$errorZ="";  // acumula los mensajes de error
$infoZ="";  // acumula los mensajes de información
$exitoZ="";  // acumula los mensajes de éxito


if (!isset($_SERVER['HTTP_REFERER'])){ 
 session_destroy();
 }           // con esto es imposible entrar aqui, tipeando la direccion.


// error_reporting(0);


                        // este parametro solo se usa una vez finalizada la pagina y comprobado
                        // su funcionamiento, con este comando no se mostrara ningun tipo de error
                        // me sirve ya que uso sesiones y suele pasar que si se sale
                        //  sin hacer un cierre correcto, la sesion queda con bug algunas veces
                        // de esta manera en esta pagina inicial, no mostrara nada al pedir el valor de sesion.



header("Content-type: text/html;charset=\"utf-8\"");                  // Necesario para caracteres latinos






if(isset($_POST['comprobar']))  //  chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba

   {

include("conectar.php");




$queryC = "SELECT id_per, p_name_per, p_surname_per, doc_per, id_data_per, status FROM tb_personal WHERE doc_per = '".mysqli_real_escape_string($enlace,$_POST['recuperar_doc'])."' LIMIT 1";

                    $resultC = mysqli_query($enlace,$queryC);
                    $fila=mysqli_fetch_array($resultC);

                 

                 if (isset($fila))   // si tengo algo en la fila significa que existe el doc en la BD, compruebo si tiene acceso
                
                  {    


                          if ($fila['status'] == '1') {


                            // confirmo que el email tambien sea valido

                    $id_de_los_datos = $fila['id_data_per'];


                    $queryCcc = "SELECT id_data_per, email_per FROM tb_data_personal
                     WHERE email_per = '".mysqli_real_escape_string($enlace,$_POST['recuperar_email'])."'
                     and id_data_per = '$id_de_los_datos' LIMIT 1";

                    $resultCcc = mysqli_query($enlace,$queryCcc);
                    $fila_e=mysqli_fetch_array($resultCcc);

                 if (isset($fila_e))   // si tengo algo en la fila_e significa que el email esta en la BD

                            {

                            $_SESSION['id_id_id']=$fila['id_per'];
                            $_SESSION['name_MM']=$fila['p_name_per'];
                            $_SESSION['surname_MM']=$fila['p_surname_per'];  // almaceno algunas variables de session

                                mysqli_close($enlace);
                                header ("Location: recuperar.php");


                            }




                            else {   // email no esta

                                    $errorZ="Invalid username or email2. ";
                                    mysqli_close($enlace);

                                  }









                           }





                           else {   // documento no esta


                                $errorZ="Restricted access. ";
                                mysqli_close($enlace);

                              }








                  }


                  else {   // documento no esta


                    $errorZ="Invalid username or email. ";
                    mysqli_close($enlace);

                  }






   }









include ("a_header.php"); ?>











<body>

<main role="main" class="container">

  <div class="starter-template">


    <form class="form-signin mt-4" method="POST"  >

<div class="text-center mb-4">
        <img class="mb-4" src="img/reset.png" alt="" width="136" height="136">
        <h1 class="h3 mb-3 font-weight-normal">Complete the fields</h1>



  <div id="errorZ"> <?php 
                  if ($errorZ!="")
                         { echo "<div class=\"alert alert-danger\" role=\"alert\" align=\"center\">".$errorZ."</div>"; }
                       ?>
      </div>   <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


        <div id="infoZ"> <?php 
                    if ($infoZ!="")
                           { echo "<div class=\"alert alert-info\" role=\"alert\" align=\"center\">".$infoZ."</div>"; }
                         ?>
        </div>   <!-- SOLO ES VISIBLE SI LA VARIABLE DE INFORMACION TIENE ALGO-->


      <div id="exitoZ"> <?php 
                  if ($exitoZ!="")
                         { echo "<div class=\"alert alert-success\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                       ?>
      </div>   <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


</div>




   

      <div class="form-label-group ">
        <input type="text" maxlength="12" id="recuperar_doc" name="recuperar_doc" class="form-control" placeholder="Doc or Id" required autofocus>
        <label for="recuperar_doc">Username</label>
      </div>



      <div class="form-label-group">
        <input type="email" maxlength="39" id="recuperar_email" name="recuperar_email"  class="form-control" placeholder="Email" required>
        <label for="recuperar_email">Email</label>
      </div>


      <button class="btn btn-lg btn-info btn-block" type="submit" name="comprobar">Continue</button>

</form>




    <p class="" align="center"> <b> <a href="index.php">¡Go Back!</a> </b></p>  












  


</body>

<?php include ("f_footer.php"); ?>
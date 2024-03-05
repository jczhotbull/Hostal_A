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




if ($_SESSION ['id_id_id'] == '' OR $_SESSION ['name_MM'] == '' && $_SESSION ['surname_MM'] == ''  )

        {

            session_unset();                     // libera todas las variables de sessión

            setcookie("id_id_id", "", time()-60*60);   // crea la cookie id_per con el valor vacio y que caduque una hora antes.
            $_COOKIE ['id_id_id']="";                  // borra el valor de id_per contenido en el cookie, por medida extra

            setcookie("name_MM", "", time()-60*60);   // crea la cookie rol con el valor vacio y que caduque una hora antes.
            $_COOKIE ['name_MM']="";                  // borra el valor de rol contenido en el cookie, por medida extra


            setcookie("surname_MM", "", time()-60*60);   // crea la cookie id_per con el valor vacio y que caduque una hora antes.
            $_COOKIE ['surname_MM']="";                  // borra el valor de id_per contenido en el cookie, por medida extra

          

            header("Location: index.php");

        }



                            

// error_reporting(0);


                        // este parametro solo se usa una vez finalizada la pagina y comprobado
                        // su funcionamiento, con este comando no se mostrara ningun tipo de error
                        // me sirve ya que uso sesiones y suele pasar que si se sale
                        //  sin hacer un cierre correcto, la sesion queda con bug algunas veces
                        // de esta manera en esta pagina inicial, no mostrara nada al pedir el valor de sesion.



header("Content-type: text/html;charset=\"utf-8\"");                  // Necesario para caracteres latinos






if(isset($_POST['submit']))  //  chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba

   {

include("conectar.php");


     if ($_POST['new_pass'] != $_POST['new_pass_confirm'] )  // compara ambas claves
                                        {  $errorZ .= "Passwords do not match."; }
                      



                         if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
                            {
                               $infoZ ="";
                               $errorZ = "<p> " . $errorZ. " </p> <b>Try Again</b>";            
                            }
                               

                         else      // Sequencia actualización de Contraseña...
                      
                              {




                                $pass= mysqli_real_escape_string($enlace,$_POST['new_pass']);  // almaceno el valor de clave limpio

                                $passwordHasheada=md5( md5 ($_SESSION['id_id_id']) . $pass ) ;

                                $idM = $_SESSION['id_id_id'];

                                 // almaceno el valor de clave HASHEADA   
                            
                                $query = " UPDATE tb_personal SET password_per = '$passwordHasheada' WHERE id_per = '$idM' LIMIT 1 "; 
                                $result = mysqli_query($enlace,$query);

                                 $infoZ ="";




                           $exitoZ="<p>New Password<b><br>Has BeenSet</b></p><br>
                                      
                                       <b><a href=\"index.php\">Go Back Home!</a></b> ";


                                     session_unset();

                                     mysqli_close($enlace);




                              }







   }









include ("a_header.php"); ?>


<style>
#countdown{ font-weight: bold; font-size: 14px; color: black;}
</style>



<script type="text/javascript">

function start_countdown()
{
 var counter=75;
 myVar= setInterval(function()
 { 
  if(counter>=0)
  {
   document.getElementById("countdown").innerHTML=""+counter+" Sec";
  }
  if(counter==0)
  {
   $.ajax
   ({
     type:'post',
     url:'login-logout.php',
     data:{
      logout:"logout"
     },
     success:function(response) 
     {
      window.location="index.php";
     }
   });
   }
   counter--;
 }, 1000)
}
</script>


















<body>

<main role="main" class="container">

  <div class="starter-template">


    <form class="form-signin mt-4" method="POST"  >

<div class="text-center mb-4">
        <img class="mb-4" src="img/recuperar.png" alt="" width="136" height="136">
        <h3 class="h3 font-weight-normal" <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?>  >
            <?php echo $_SESSION['name_MM']; ?> <?php echo $_SESSION['surname_MM']; ?></h3>  
<h5 class="h5 mb-3" <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?> style="color:dodgerblue;">Set Your New Password</h5>


<script>start_countdown();</script>


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




   

      <div class="form-label-group " <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?> >
        <input type="password" maxlength="12" id="new_pass" name="new_pass" class="form-control" placeholder="New Password" required autofocus>
        <label for="new_pass">New Password</label>  
      </div>



      <div class="form-label-group" <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?>>
        <input type="password" maxlength="39" id="new_pass_confirm" name="new_pass_confirm"  class="form-control" placeholder="Repeat Password" required>
        <label for="new_pass_confirm">Repeat Password</label> 
      </div>


<script src="00_zqueryajax/jquery.min.js"></script>


      <button class="btn btn-lg btn-info btn-block" type="submit"
       name="submit" id='btnReset' <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?> >Save ( <i id="countdown"></i> ) </button>





</form>




    <p class="" align="center" <?php if ( $exitoZ!=""){?>style="display:none"<?php } ?> > <b> <a href="index.php">¡Go Back!</a> </b></p>  





 <!-- no habilita el boton de enviar hasta que los campos esten llenos -->          
<script>
    
$(document).ready(function() {
  validate();
  $('input').on('keyup', validate);
});

function validate() {
  var inputsWithValues = 0;
  
  // get all input fields except for type='submit'
  var myInputs = $("input:not([type='submit'])");

  myInputs.each(function(e) {
    // if it has a value, increment the counter
    if ($(this).val()) {
      inputsWithValues += 1;
    }
  });

  if (inputsWithValues == myInputs.length) {
    $("button[type=submit]").prop("disabled", false);
  } else {
    $("button[type=submit]").prop("disabled", true);
  }
}


</script>   






  


</body>

<?php include ("f_footer.php"); ?>
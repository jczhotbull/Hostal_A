<?php

include("00_identificador.php");

$alerta_principal = "0";


$ttbla = $_GET['ttabla'];

$idtbla = $_GET['idtabla'];

$nombdato = $_GET['nombdato'];


$ttitulo = $_GET['ttitulo'];





//Turn off all error reporting
//error_reporting(0);


// los siguientes permiten eliminar un dato

    if(isset($_POST['borrar_selecc']))
    {

            $borrar_id = $_POST['borrar_selecc'];
           // $errorZ = " <p> <b>" . $borrar_id . " </b> </p>"; // me ayuda a saber si se esta agarrando el id correcto...


include("../conectar.php");  


$alerta_principal = "2";

                      $queryC = "SELECT * FROM ".$ttbla." WHERE ".$idtbla." = '$_POST[borrar_selecc]' LIMIT 1";

                      $resultC = mysqli_query($enlace,$queryC);
                      $fila=mysqli_fetch_array($resultC);         // lo anterior me permite tener el nombre del registro...


                      mysqli_close($enlace);

                     // $queryee = "SET FOREIGN_KEY_CHECKS=0";
                     // $result_do = mysqli_query($enlace,$queryee);
                      include("../conectar.php");
                    
                    
                     
             //  previo a borrarlo debo confirmar que esten o no en uso.... los del selecc_zz son exclusivos del hostal
                     




                $queryD = "DELETE FROM ".$ttbla."  WHERE ".$idtbla." = '$_POST[borrar_selecc]' LIMIT 1";

             if (!mysqli_query($enlace,$queryD))      // si no ha logrado borrar el dato
                {
                 $errorZ="- Error.  ";
                 }

                 if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
                 {
                    $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                    mysqli_close($enlace); 
                 }

             else {  

                $exitoZ = "<b>--&nbsp; " . $fila["$nombdato"] . " &nbsp;--</b> &nbsp;&nbsp; was deleted.";
                mysqli_close($enlace);  

                   }
             
           
                      
                
                      
    }









 




   // lo siguiente permite modificar el nombre de un dato.



 if(isset($_POST['editar_selecc']))
        {

$alerta_principal = "2";
       //    $editar_id = $_POST['editar_selecc'];
       //    $errorZ = " <p> <b>" . $editar_id . "  </b> </p>"; // me ayudan a saber si se esta agarrando el id correcto...

       //   $ingreso = $_POST['dato_selecc'];
       //   $errorZ = " <p> <b>" . $ingreso . " </b> </p>"; // me ayudan a saber si se agarro el texto ingresado...

    


     // tras haber confirmado el correcto relleno del campo
      
        
            include("../conectar.php");

           // $dato = $_POST["nombre_area"];





// y que pasa si es el mismo dato al que le di guardar????



$querydatow = "SELECT ".$idtbla." FROM ".$ttbla." WHERE ".$nombdato." ='".mysqli_real_escape_string($enlace,$_POST['dato_selecc'])."' LIMIT 1";

                  $resultdatow = mysqli_query($enlace,$querydatow);

    if (mysqli_num_rows($resultdatow)>0)
      {
       $errorZ="".$ttitulo." already exists.";
      }


          if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
              {
                 $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                 mysqli_close($enlace);            
              }
     


          else {  



            $visible_en_estoss = $_POST['visible_mod'];


   $sql = "UPDATE ".$ttbla." SET ".$nombdato." = '".mysqli_real_escape_string($enlace,$_POST['dato_selecc'])."',
                           en_check_in = '$visible_en_estoss'
                                                            
                                WHERE ".$idtbla." = '$_POST[editar_selecc]' LIMIT 1 ";

                       
            if (!mysqli_query($enlace,$sql))      // actualiza y si no logra ingresar los datos...
               {
                $errorZ=" Error. ";   // " . $ttbla. "  y  " . $nombdato. " más " . $dsel. " y " . $dedit. "

               }


               if ($errorZ!="")     //  si $errorZ es distinto de vacío,  es que ha habido algun error
                          {
                             $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";
                             mysqli_close($enlace); 
                          }

            else{
                     $exitoZ = "."; 
                }     

                if ($exitoZ!="")            //  si $exitoZ es distinto de vacío,  es que todo ok
                          {
                             $exitoZ = " <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp; ";  
                              mysqli_close($enlace);          
                          }

                       
            }

       
    } // cierre if en caso de actualizar  

         














    // fase para agregar un nuevo dato a la base de datos referente a los seleccionables

if (array_key_exists("submit",$_POST))// chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba

   {
$alerta_principal = "2";

      include("../conectar.php");



      // Sequencia de chequeo, verifica si el dato ya está registrado en la BD...
    
       $querydato = "SELECT ".$idtbla." FROM ".$ttbla." WHERE ".$nombdato." ='".mysqli_real_escape_string($enlace,$_POST['dato_selecc'])."' LIMIT 1";

                  $resultdato = mysqli_query($enlace,$querydato);

    if (mysqli_num_rows($resultdato)>0)
      {
       $errorZ=" ".$ttitulo." already exists.";   
      }


          if ($errorZ!="")            //  si $errorZ es distinto de vacío,  es que ha habido algun error
              {
                 $errorZ = " <i class=\"fas fa-exclamation-triangle fa-lg\"></i> &nbsp; " . $errorZ. " ";            
              }




        else     
       {

        $dato = $_POST["dato_selecc"];
        $se_ve_en = $_POST["observable_en"];


        $query = "INSERT INTO ".$ttbla."(".$nombdato.", en_check_in)
         VALUES ('".mysqli_real_escape_string($enlace,$_POST['dato_selecc'])."',
         '$se_ve_en')";


        if (!mysqli_query($enlace,$query))      // si no ha logrado ingresar los datos
         {
          $errorZ="Error.";
          mysqli_close($enlace);

          }


        else
          {               


               // Etapa final del registro

          $exitoZ=" <i class=\"far fa-thumbs-up fa-lg\"></i> &nbsp;";
          mysqli_close($enlace);

        }

      } // cierre del envio...

  


    }  // cierre if relacionado si se envio algo...
    





?>



<?php include("a_header.php"); ?>

<?php include("../conectar.php"); ?>   <!--   necesario para poder listar -->


<?php

$query = "SELECT * FROM ".$ttbla." WHERE ".$nombdato." != '.' ORDER BY ".$nombdato." ASC";

$datos_selecc = mysqli_query($enlace, $query) or die(mysqli_error());

$row_datos_selecc = mysqli_fetch_assoc($datos_selecc);

$totalRows_datos_selecc = mysqli_num_rows($datos_selecc);

mysqli_close($enlace);   ?>




<?php


if ($alerta_principal  == "0") {



 echo '<script type="text/javascript">';
  echo 'setTimeout(function () {

   swal({
  title: "",
  type: "info",
  html: "Modifying data in use can cause inconsistencies in the system!"
   + "<br><br> Use the edit button only to correct typos.",
  icon: "",
});'

;
  echo '}, 1000);</script>';  


} 

?>










<div class="content-wrapper">
  <div class="container-fluid">

  <div class ="form-row"> 

  <div class="col-md-1 col-lg-1" >  
 <button type="button" class="btn btn-dark btn-lg btn-block" style="margin-top:1px;"  onClick="javascript:history.go(-1)" ><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal fa-lg"></i></button>
</div>


    <div class="col-md-11 col-lg-11 alert alert-primary" role="alert">
      <i><b><?php echo $ttitulo ?>.</b></i> 
    </div>

    </div>



    
    <div class="card  mx-auto mt-3">

      <div class="card-body">

        <form method="POST">


<div class="form-row">
    
    <div class="input-group col-lg-8 mb-1">
    
        <div class="input-group-prepend">
            <span class="input-group-text alert-success" id="basic-addon1"><i class="fas fa-plus fa-lg"></i>&nbsp Add:</span>  
        </div> 
        

        <input type="text" maxlength="19" class="form-control" id="dato_selecc" name="dato_selecc"
         placeholder="Product Name" aria-label="dato_selecc" aria-describedby="basic-addon1" required>

        
  <select class="custom-select" id="inputGroupSelect02" id="observable_en" name="observable_en" required>

  <option selected value="" disabled>Selectable in:</option>
    <option style="background-color: #00000;" disabled></option>   
    <option value="1">Check-In - Only</option>
    <option value="2">Services - Only</option>
    <option value="3">All</option>

  </select>


    

         <div class="input-group-append">
            <button type="submit" name="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i></button>
        </div>


    </div> 


 
  

  <div class="col-lg-4">
  
    
        <?php 
          if ($errorZ!="")
          { echo "<div class=\"input-group-text alert-danger\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
        ?>
                               <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


        <?php 
          if ($exitoZ!="")
          { echo "<div class=\"input-group-text alert-success\" role=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
        ?>
                               <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


  
  </div>


         

</div><!-- cierre form- row -->

        </form>



      </div> <!-- cierre card body -->

    </div>  <!-- cierre card -->
              

                    

    


  <div class="card mb-3 separacionpequena"  <?php if ( $totalRows_datos_selecc == '0' ){?>style="display:none"<?php } ?> >
       

        <div class="card-body">

          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
             
              <thead>
                <tr>
                  <th><i class="fa-solid fa-clipboard-list fa-lg"></i></th>
                  <th><i class="fa-regular fa-square-check fa-lg"></i></th> 
                  <th><i class="fa-solid fa-grip-vertical fa-lg"></i></th>
                  <th><i class="fa-solid fa-grip fa-lg"></i></th> 
                </tr>
              </thead>
                          
              
              <tbody>

                <?php do{?>    <!-- va generarme tantas filas como datos tenga esta BD -->

                <tr>
                  <td><?php echo $row_datos_selecc["$nombdato"]; ?> </td>

                  <td><?php
                  
                  if ($row_datos_selecc["en_check_in"] == '1') {
                    $se_ve_aqui = 'Check-In - Only';
                  }

                  if ($row_datos_selecc["en_check_in"] == '2') {
                    $se_ve_aqui = 'Services - Only';
                  }

                  if ($row_datos_selecc["en_check_in"] == '3') {
                    $se_ve_aqui = 'All';
                  }
                  
                  echo $se_ve_aqui; ?> </td>


<td align="center">

  <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal"
          data-target="#modificar<?php echo $row_datos_selecc["$idtbla"]; ?>">
                                                                        <!-- este ultimo identifica cual modal abrir -->

                     <i class="fas fa-edit"></i>
  </button>    
                    
</td>


<!-- ini modal editar -->

<div class="modal fade" id="modificar<?php echo $row_datos_selecc["$idtbla"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-info" id="exampleModalLabel">
        <i class="fas fa-info fa-lg"></i> &nbsp;Edit !</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post">
      <div class="modal-body">

      

        <div class="form-row mb-3">
        <div class="input-group col-lg-12">


<div class="input-group-prepend">
  <span class="input-group-text alert-info" id="basic-addon1"><i class="fas fa-edit fa-lg"></i></span> 
</div>
  <input type="text" maxlength="19" class="form-control" id="dato_selecc" name="dato_selecc" value="<?php echo $row_datos_selecc["$nombdato"]; ?>">
 
       
        </div>
        </div>




        <div class="form-row mb-3"> 

        <div class="input-group   col-sm-12 col-md-12 col-lg-12 mb-2">
                              <div class="input-group-prepend">
<span class="input-group-text alert-info" id="basic-addon1"><i class="fa-regular fa-square-check fa-lg"></i>&nbsp;- selectable in
:</span>  
                                        </div>

<select class="form-control importantex" id="visible_mod" name="visible_mod" required>

<option selected value="<?php echo $row_datos_selecc["en_check_in"]; ?>">

<?php
                  
                  if ($row_datos_selecc["en_check_in"] == '1') {
                    $se_ve_aqui = 'Check-In - Only';
                  }

                  if ($row_datos_selecc["en_check_in"] == '2') {
                    $se_ve_aqui = 'Services - Only';
                  }

                  if ($row_datos_selecc["en_check_in"] == '3') {
                    $se_ve_aqui = 'All';
                  }
                  
                  echo $se_ve_aqui; ?>

</option>
                   <option style="background-color: #00000;" disabled></option>                             

    <option value="1">Check-In - Only</option>
    <option value="2">Services - Only</option>
    <option value="3">All</option>

</select> 
                              </div>  




        </div>






      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editar_selecc" class="btn btn-info" value="<?php echo $row_datos_selecc["$idtbla"]; ?>">
              <i class="fa-solid fa-floppy-disk"></i></button>  

      </div>
      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->




<td align="center">

  <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
          data-target="#borrar<?php echo $row_datos_selecc["$idtbla"]; ?>">
                                                                       

                     <i class="far fa-trash-alt"></i> 
  </button>                 

</td>  

<!-- ini modal eliminar -->

<div class="modal fade" id="borrar<?php echo $row_datos_selecc["$idtbla"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">
        <i class="fas fa-exclamation-triangle fa-lg"></i> &nbsp;Alert !</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <b>&nbsp;"<?php echo $row_datos_selecc["$nombdato"];?>"&nbsp;</b>will be deleted. 
      </div>
      <div class="modal-footer">

  <form method="post">

    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" name="borrar_selecc" class="btn btn-danger" value="<?php echo $row_datos_selecc["$idtbla"]; ?>" >
          <i class="fa-solid fa-trash-can"></i></button>

  </form>


      </div>
    </div>
  </div>
</div>

<!-- cierre modal de eliminar -->







                  
                </tr>
                


                 <?php } while ($row_datos_selecc = mysqli_fetch_assoc($datos_selecc)); ?>

                
              </tbody>

            </table>

          </div> <!-- cierre tabla responsiva -->

        </div>  <!-- cierre card body -->

        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>  -->

  </div> <!-- cierre card -->
















                           

  </div>   <!-- cierre container fluid -->
</div>  <!-- cierre wrapper -->




<?php include("f_footer.php"); ?>

<?php


include("00_identificador.php");

$mi_hostel_select = $_SESSION['hostel_activo'];


$alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.


    $logo_success="";
    $logo_danger="";
    $logo_info="1";

    $direcc_success=""; // notificador del proceso de insercion de direccion
    $direcc_danger="";  // notificador del proceso de insercion de direccion

    $datos_success="";
    $datos_danger="";


    $hostel_success="";  // notificador del proceso de insercion de informacion del usuario
    $hostel_danger="";


    $conteo_errorAr = "0";   // Si es distinto debe borrar registros incorrectos anteriores

$build_success="";
$build_danger="";

$beds_success="";
$beds_danger="";


$total_beds = '';



    include("../conectar.php");
    include ("consultas_add/query_rooms.php"); 






// empieza la cracion he inserccion del room
if(isset($_POST['add_room']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

    $alerta_principal = "2";

    $type_room = $_POST["type_room"];
    $room_number = $_POST["room_number"];
    $floors = $_POST["floors"];
    $the_area = $_POST["the_area"];  

    $quien_lo_registra = $_SESSION['id_per'];

   
    include("../conectar.php");          


    $queryC_list = "SELECT id_hostel, id_room_kind, id_room_number FROM tb_room
                    WHERE id_hostel ='$mi_hostel_select'
                    and id_room_kind ='$type_room'
                    and id_room_number = '$room_number' LIMIT 1";

    $resultC_list = mysqli_query($enlace,$queryC_list);

            if (mysqli_num_rows($resultC_list)>0)
            {
            $errorZ="- The Room was created previously.";
            mysqli_close($enlace); 
            }



            else  // Entra aqui solo si no existe un cuarto duplicado
            {

              $esta_observ = mysqli_real_escape_string($enlace,$_POST['room_observ']);
             

              // proceso de insercion y creacion del id en la tabla room
          
              $query_d = "INSERT INTO tb_room(id_hostel, id_room_kind, id_room_number, id_floors, id_hostel_area, creada_por, room_observ ) 
          
                              VALUES (   '$mi_hostel_select'         ,
                                         '$type_room'         ,
                                         '$room_number'       ,
                                         '$floors'        ,
                                         '$the_area'          ,
                                         '$quien_lo_registra' ,
                                         '$esta_observ' 
          
                                      )";
          
          
              if (!mysqli_query($enlace,$query_d))  // si no logro ingresar la direccion...
              {
              $build_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc
          
              $errorZ="- Error. ";
          
              mysqli_close($enlace); 
              }
          
          
          
              else { 
          
                  $the_room_id = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado room nueva
                  
          
          
          
                  $bed_kind_1 = $_POST["bed_kind_1"];
                  $bed_number_1 = $_POST["bed_number_1"];        
                  $nota_1= mysqli_real_escape_string($enlace,$_POST['nota_1']);
          
                   // proceso de insercion y creacion en la tabla room_beds primera cama obligatoria...
              $query_bed_1 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
              VALUES (   '$the_room_id', '$bed_kind_1', '$bed_number_1', '$nota_1')";
          
                  $lista_bed_1 = mysqli_query($enlace, $query_bed_1) or die(mysqli_error());
                  $total_beds++;
          
          
          
          
          
          
                  
                if ($_POST["bed_kind_2"] != '3' ) {
                  $bed_kind_2 = $_POST["bed_kind_2"]; $bed_number_2 = $_POST["bed_number_2"];
                  $nota_2= mysqli_real_escape_string($enlace,$_POST['nota_2']);
               
                  $query_bed_2 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
                  VALUES (   '$the_room_id', '$bed_kind_2', '$bed_number_2', '$nota_2')";
              
                      $lista_bed_2 = mysqli_query($enlace, $query_bed_2) or die(mysqli_error());
                      $total_beds++;
                  
                  }
          
          
          
                          
                        if ($_POST["bed_kind_3"] != 3) {
                          $bed_kind_3 = $_POST["bed_kind_3"]; $bed_number_3 = $_POST["bed_number_3"];
                          $nota_3= mysqli_real_escape_string($enlace,$_POST['nota_3']);
                         
                          $query_bed_3 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
                          VALUES (   '$the_room_id', '$bed_kind_3', '$bed_number_3', '$nota_3')";
                      
                              $lista_bed_3 = mysqli_query($enlace, $query_bed_3) or die(mysqli_error());
                              $total_beds++;
                          
                          }
          
          
                          
                                  
                                if ($_POST["bed_kind_4"] != 3) {
                                  $bed_kind_4 = $_POST["bed_kind_4"]; $bed_number_4 = $_POST["bed_number_4"];
                                  $nota_4= mysqli_real_escape_string($enlace,$_POST['nota_4']);
                                 
                                  $query_bed_4 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
                                  VALUES (   '$the_room_id', '$bed_kind_4', '$bed_number_4', '$nota_4')";
                              
                                      $lista_bed_4 = mysqli_query($enlace, $query_bed_4) or die(mysqli_error());
                                      $total_beds++;
                                  
                                  }       
          
          
          
                                  if ($_POST["bed_kind_5"] != 3) {
                                      $bed_kind_5 = $_POST["bed_kind_5"]; $bed_number_5 = $_POST["bed_number_5"];
                                       $nota_5= mysqli_real_escape_string($enlace,$_POST['nota_5']);
                                                             
                                        $query_bed_5 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
                                         VALUES (   '$the_room_id', '$bed_kind_5', '$bed_number_5', '$nota_5')";
                                                          
                                       $lista_bed_5 = mysqli_query($enlace, $query_bed_5) or die(mysqli_error());
                                              $total_beds++;
                                                              
                                                              }  
          
          
                                                              if ($_POST["bed_kind_6"] != 3) {
                                                                  $bed_kind_6 = $_POST["bed_kind_6"]; $bed_number_6 = $_POST["bed_number_6"];
                                                                   $nota_6= mysqli_real_escape_string($enlace,$_POST['nota_6']);
                                                                                         
                                                                    $query_bed_6 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
                                                                     VALUES (   '$the_room_id', '$bed_kind_6', '$bed_number_6', '$nota_6')";
                                                                                      
                                                                   $lista_bed_6 = mysqli_query($enlace, $query_bed_6) or die(mysqli_error());
                                                                          $total_beds++;
                                                                                          
                                                                                          } 
                          
                      if ($_POST["bed_kind_7"] != 3) {
          $bed_kind_7 = $_POST["bed_kind_7"]; $bed_number_7 = $_POST["bed_number_7"];
           $nota_7= mysqli_real_escape_string($enlace,$_POST['nota_7']);
                                 
            $query_bed_7 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
             VALUES (   '$the_room_id', '$bed_kind_7', '$bed_number_7', '$nota_7')";
                              
           $lista_bed_7 = mysqli_query($enlace, $query_bed_7) or die(mysqli_error());
                  $total_beds++;
                                  
                                  }    
          
          
          
                                  if ($_POST["bed_kind_8"] != 3) {
                                      $bed_kind_8 = $_POST["bed_kind_8"]; $bed_number_8 = $_POST["bed_number_8"];
                                       $nota_8= mysqli_real_escape_string($enlace,$_POST['nota_8']);
                                                             
                                        $query_bed_8 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
                                         VALUES (   '$the_room_id', '$bed_kind_8', '$bed_number_8', '$nota_8')";
                                                          
                                       $lista_bed_8 = mysqli_query($enlace, $query_bed_8) or die(mysqli_error());
                                              $total_beds++;
                                                              
                                                              }  
          
          
          
          
          if ($_POST["bed_kind_9"] != 3) {
          $bed_kind_9 = $_POST["bed_kind_9"]; $bed_number_9 = $_POST["bed_number_9"];
           $nota_9= mysqli_real_escape_string($enlace,$_POST['nota_9']);
                                 
            $query_bed_9 = "INSERT INTO tb_rooms_beds(id_room, id_bed_kind, id_bed_number, note) 
             VALUES (   '$the_room_id', '$bed_kind_9', '$bed_number_9', '$nota_9')";
                              
           $lista_bed_9 = mysqli_query($enlace, $query_bed_9) or die(mysqli_error());
                  $total_beds++;
                                  
                                  }   
          
          
          $exitoZ = "--&nbsp; New Room Created and <b> ".$total_beds." bed(s)</b> saved.";
          
          
          
          $build_success="<i class=\"fas fa-check-circle fa-lg\"></i>";  // coloca success al lado de room
          $beds_success="<i class=\"fas fa-check-circle fa-lg\"></i>";  // coloca success al lado de beds
             
          mysqli_close($enlace);
          
          
          
            
              }







            }


}












 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-person-digging fa-lg "></i> &nbsp; &nbsp; Set a Room
                </div>

 

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-9 col-lg-9 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-9 col-lg-9 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
            </div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->




      

            <div class="card mx-auto">
              <div class="card-body">
      
                       
<form  method="POST"  name="add_room">                           


                            <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Room Characteristics: </b>            

                        <?php 
                          if ($build_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$build_success."</i>"; }
                        ?>

                        <?php 
                          if ($build_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$build_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->


                          <div class="form-row margencito"> 

                         

                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-swatchbook fa-lg"></i></span>  
                                        </div> 


                     <select class="form-control importantex" id="type_room" name="type_room" required>
                                                        
                                   <option selected disabled value="">Type of room:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_room_kind['id_room_kind']; ?>"><?php echo $row_datos_room_kind['name_room_kind']; ?></option>

                                <?php } while ($row_datos_room_kind = mysqli_fetch_assoc($datos_room_kind)); ?> 
                         
                                        </select>
  
                              </div>  







                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-arrow-up-9-1 fa-lg"></i></span>  
                                        </div> 


                     <select class="form-control importantex" id="room_number" name="room_number" required>
                                                        
                                   <option selected disabled value="">Room Number:</option> 
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_room_number['id_room_number']; ?>"><?php echo $row_datos_room_number['name_room_number']; ?></option>

                                <?php } while ($row_datos_room_number = mysqli_fetch_assoc($datos_room_number)); ?> 
                         
                                        </select>
  
                              </div>  








                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-hotel fa-lg"></i></span>  
                                        </div>   


                     <select class="form-control importantex" id="floors" name="floors" required>
                                                        
                                   <option selected disabled value="">Floor:</option> 
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_floors['id_floors']; ?>"><?php echo $row_datos_floors['name_floors']; ?></option>

                                <?php } while ($row_datos_floors = mysqli_fetch_assoc($datos_floors)); ?> 
                         
                                        </select>
  
                              </div> 






                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-map fa-lg"></i></span>  
                                        </div>   
                                        

                     <select class="form-control importantex" id="the_area" name="the_area" required>
                                                        
                                   <option selected disabled value="">Area:</option> 
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_hostel_area['id_hostel_area']; ?>"><?php echo $row_datos_hostel_area['name_hostel_area']; ?></option>

                                <?php } while ($row_datos_hostel_area = mysqli_fetch_assoc($datos_hostel_area)); ?> 
                         
                                        </select>
  
                              </div> 


<div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2">  
<div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Observations:</span>  
</div>
<input type="text" maxlength="110" class="form-control" id="room_observ" name="room_observ"
 aria-label="room_observ" aria-describedby="basic-addon1" >    
</div>




 



</div> <!-- cierre margencito -->






<div class="form-row margencito mt-4"> 



                            <div class="form-row">  <!-- datos segundarios -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Set Each Bed: </b>            

                        <?php 
                          if ($beds_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$beds_success."</i>"; }
                        ?>

                        <?php 
                          if ($beds_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$beds_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

</div>   <!-- cierre margencito-->







<div class="form-row margencito"> 




<table class="table table-sm " class="table table-hover">
 
  <tbody>

  <thead>
    <tr>
      <th width="10%" scope="col">How Many?</th>      
      <th width="30%" scope="col">Bed Kind</th>
      <th width="20%" scope="col">Bed Id or N°</th>
      <th width="40%" scope="col">Note</th>
      
    </tr>
  </thead>



    <tr>
      <td>1</td>

    <td>   
    <select class="form-control form-control-sm importantex" id="bed_kind_1" name="bed_kind_1" required>
    <option selected disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind = mysqli_fetch_assoc($datos_bed_kind)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm importantex" id="bed_number_1" name="bed_number_1" required>
      <option selected disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number['id_bed_number']; ?>"><?php echo $row_datos_bed_number['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number = mysqli_fetch_assoc($datos_bed_number)); ?> 
      </select> 
      </td>

      <td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_1" name="nota_1">    
</td>

   </tr>
   




<script type="text/javascript">
$('select[name=bed_number_1]').change(function () {
 if ($(this).val() != '') {$('#hiddenDiv_2').show();
     
 } else { $('#hiddenDiv_2').hide(); }
});	
</script>  

   <tr id="hiddenDiv_2" style="display:none" >
      <td>2</td>

    <td>   
    <select class="form-control form-control-sm" id="bed_kind_2" name="bed_kind_2">
    <option selected value="3">None</option><option disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind_2['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind_2['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind_2 = mysqli_fetch_assoc($datos_bed_kind_2)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm" id="bed_number_2" name="bed_number_2">
      <option selected value="10">None</option><option disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number_2['id_bed_number']; ?>"><?php echo $row_datos_bed_number_2['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number_2 = mysqli_fetch_assoc($datos_bed_number_2)); ?> 
      </select> 
      </td>
      
<td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_2" name="nota_2">    
</td>

   </tr>







   <script type="text/javascript">
$('select[name=bed_number_2]').change(function () {
 if ($(this).val() != '') {$('#hiddenDiv_3').show();
     
 } else { $('#hiddenDiv_3').hide(); }
});	
</script>  

   <tr id="hiddenDiv_3" style="display:none" >
      <td>3</td>

    <td>   
    <select class="form-control form-control-sm" id="bed_kind_3" name="bed_kind_3">
    <option selected value="3">None</option><option disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind_3['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind_3['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind_3 = mysqli_fetch_assoc($datos_bed_kind_3)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm" id="bed_number_3" name="bed_number_3">
      <option selected value="10">None</option><option disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number_3['id_bed_number']; ?>"><?php echo $row_datos_bed_number_3['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number_3 = mysqli_fetch_assoc($datos_bed_number_3)); ?> 
      </select> 
      </td>
      
<td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_3" name="nota_3">    
</td>

   </tr>







   
   <script type="text/javascript">
$('select[name=bed_number_3]').change(function () {
 if ($(this).val() != '') {$('#hiddenDiv_4').show();
     
 } else { $('#hiddenDiv_4').hide(); }
});	
</script>  

   <tr id="hiddenDiv_4" style="display:none" >
      <td>4</td>

    <td>   
    <select class="form-control form-control-sm" id="bed_kind_4" name="bed_kind_4">
    <option selected value="3">None</option><option disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind_4['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind_4['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind_4 = mysqli_fetch_assoc($datos_bed_kind_4)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm" id="bed_number_4" name="bed_number_4">
      <option selected value="10">None</option><option disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number_4['id_bed_number']; ?>"><?php echo $row_datos_bed_number_4['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number_4 = mysqli_fetch_assoc($datos_bed_number_4)); ?> 
      </select> 
      </td>
      
<td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_4" name="nota_4">    
</td>

   </tr>








   
   <script type="text/javascript">
$('select[name=bed_number_4]').change(function () {
 if ($(this).val() != '') {$('#hiddenDiv_5').show();
     
 } else { $('#hiddenDiv_5').hide(); }
});	
</script>  

   <tr id="hiddenDiv_5" style="display:none" >
      <td>5</td>

    <td>   
    <select class="form-control form-control-sm" id="bed_kind_5" name="bed_kind_5">
    <option selected value="3">None</option><option disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind_5['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind_5['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind_5 = mysqli_fetch_assoc($datos_bed_kind_5)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm" id="bed_number_5" name="bed_number_5">
      <option selected value="10">None</option><option disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number_5['id_bed_number']; ?>"><?php echo $row_datos_bed_number_5['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number_5 = mysqli_fetch_assoc($datos_bed_number_5)); ?> 
      </select> 
      </td>
      
<td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_5" name="nota_5">    
</td>

   </tr>






   
   <script type="text/javascript">
$('select[name=bed_number_5]').change(function () {
 if ($(this).val() != '') {$('#hiddenDiv_6').show();
     
 } else { $('#hiddenDiv_6').hide(); }
});	
</script>  

   <tr id="hiddenDiv_6" style="display:none" >
      <td>6</td>

    <td>   
    <select class="form-control form-control-sm" id="bed_kind_6" name="bed_kind_6">
    <option selected value="3">None</option><option disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind_6['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind_6['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind_6 = mysqli_fetch_assoc($datos_bed_kind_6)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm" id="bed_number_6" name="bed_number_6">
      <option selected value="10">None</option><option disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number_6['id_bed_number']; ?>"><?php echo $row_datos_bed_number_6['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number_6 = mysqli_fetch_assoc($datos_bed_number_6)); ?> 
      </select> 
      </td>
      
<td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_6" name="nota_6">    
</td>

   </tr>

 








   
   <script type="text/javascript">
$('select[name=bed_number_6]').change(function () {
 if ($(this).val() != '') {$('#hiddenDiv_7').show();
     
 } else { $('#hiddenDiv_7').hide(); }
});	
</script>  

   <tr id="hiddenDiv_7" style="display:none" >
      <td>7</td>

    <td>   
    <select class="form-control form-control-sm" id="bed_kind_7" name="bed_kind_7">
    <option selected value="3">None</option><option disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind_7['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind_7['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind_7 = mysqli_fetch_assoc($datos_bed_kind_7)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm" id="bed_number_7" name="bed_number_7">
      <option selected value="10">None</option><option disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number_7['id_bed_number']; ?>"><?php echo $row_datos_bed_number_7['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number_7 = mysqli_fetch_assoc($datos_bed_number_7)); ?> 
      </select> 
      </td>
      
<td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_7" name="nota_7">    
</td>

   </tr>





   
   <script type="text/javascript">
$('select[name=bed_number_7]').change(function () {
 if ($(this).val() != '') {$('#hiddenDiv_8').show();
     
 } else { $('#hiddenDiv_8').hide(); }
});	
</script>  

   <tr id="hiddenDiv_8" style="display:none" >
      <td>8</td>

    <td>   
    <select class="form-control form-control-sm" id="bed_kind_8" name="bed_kind_8">
    <option selected value="3">None</option><option disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind_8['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind_8['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind_8 = mysqli_fetch_assoc($datos_bed_kind_8)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm" id="bed_number_8" name="bed_number_8">
      <option selected value="10">None</option><option disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number_8['id_bed_number']; ?>"><?php echo $row_datos_bed_number_8['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number_8 = mysqli_fetch_assoc($datos_bed_number_8)); ?> 
      </select> 
      </td>
      
<td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_8" name="nota_8">    
</td>

   </tr>




   
   <script type="text/javascript">
$('select[name=bed_number_8]').change(function () {
 if ($(this).val() != '') {$('#hiddenDiv_9').show();
     
 } else { $('#hiddenDiv_9').hide(); }
});	
</script>  

   <tr id="hiddenDiv_9" style="display:none" >
      <td>9</td>

    <td>   
    <select class="form-control form-control-sm" id="bed_kind_9" name="bed_kind_9">
    <option selected value="3">None</option><option disabled value=""></option>
    <?php do{?>
<option value="<?php echo $row_datos_bed_kind_9['id_bed_kind']; ?>"><?php echo $row_datos_bed_kind_9['name_bed_kind']; ?></option>
                                <?php } while ($row_datos_bed_kind_9 = mysqli_fetch_assoc($datos_bed_kind_9)); ?> 
    </select>  
    </td>

      <td>
      <select class="form-control form-control-sm" id="bed_number_9" name="bed_number_9">
      <option selected value="10">None</option><option disabled value=""></option>
       <?php do{?>
<option value="<?php echo $row_datos_bed_number_9['id_bed_number']; ?>"><?php echo $row_datos_bed_number_9['name_bed_number']; ?></option>
                                <?php } while ($row_datos_bed_number_9 = mysqli_fetch_assoc($datos_bed_number_9)); ?> 
      </select> 
      </td>
      
<td>
<input type="text" maxlength="69" class="form-control form-control-sm" id="nota_9" name="nota_9">    
</td>

   </tr>



  
  </tbody>
</table>























                           

<div class="col-md-12 mb-2">

<button type="submit" name="add_room" class="btn btn-sm btn-info btn-block" id='add_room'>
<i class="fa-solid fa-floppy-disk fa-lg"></i> &nbsp</button> 

</div>
                              


</div> <!-- cierre margencito -->










</form>



              </div><!-- cierre card mx-auto -->
              </div><!-- cierre card-body -->



































                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

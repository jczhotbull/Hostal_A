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
    include ("consultas_add/query_services.php"); 






// empieza la cracion he inserccion del room
if(isset($_POST['add_service']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

    $alerta_principal = "2";

    $type_product = $_POST["type_product"];
    $product_name = $_POST["product_name"];

    $se_ofrece_como = $_POST["type_offer"];
  
    

    $quien_lo_registra = $_SESSION['id_per'];

   
    include("../conectar.php");          


    $queryC_list = "SELECT id_hostal, id_product_kind, id_producto, sale_kind FROM tb_services
                    WHERE id_hostal ='$mi_hostel_select'
                    and id_product_kind ='$type_product'
                    and id_producto = '$product_name'
                    and sale_kind = '$se_ofrece_como' LIMIT 1";

    $resultC_list = mysqli_query($enlace,$queryC_list);

            if (mysqli_num_rows($resultC_list)>0)
            {
            $errorZ="- The Service was created previously.";
            mysqli_close($enlace); 
            }



            else  // Entra aqui solo si no existe un cuarto duplicado
            {

              $esta_observ = mysqli_real_escape_string($enlace,$_POST['product_cha']);
             

              // proceso de insercion y creacion del id en la tabla room
          
              $query_d = "INSERT INTO tb_services(id_hostal, id_product_kind, id_producto,
               creado_por_el, service_charac, sale_kind ) 
          
                              VALUES (   '$mi_hostel_select'         ,
                                         '$type_product'         ,
                                         '$product_name'       ,
                                         '$quien_lo_registra' ,
                                         '$esta_observ',
                                         '$se_ofrece_como' 
          
                                      )";
          
          
              if (!mysqli_query($enlace,$query_d))  // si no logro ingresar la direccion...
              {
              $build_danger="<i class=\"fas fa-times-circle fa-lg\"></i>";  // coloca danger al lado de direcc
          
              $errorZ="- Error. ";
          
              mysqli_close($enlace); 
              }         
                    
              else { 
          
          $the_room_id = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado room nueva
                         
          $exitoZ = "--&nbsp; New Service Created.";
                          
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
                    <i class="fa-solid fa-shop fa-lg "></i> &nbsp; &nbsp; Set a Service
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



            <div class="row">


<div class="col-xl-3 col-sm-6 col-6 mb-3">

<a class="" href="selecc_zz_dos_p.php?ttabla=productos&idtabla=id_producto&nombdato=name_producto&ttitulo=Products">     

<div class="card text-white relleno-indigo o-hidden h-100">
           <div class="card-body">
             <div class="mini_card_icon">  
               <i class="fa-solid fa-store"></i>
             </div>
             <div class="mr-5 cantidadzzz"></div>
             <div class="infozzz">Add Products</div>
           </div>  
                      
         </div>

 </a>

</div>




</div>





      

            <div class="card mx-auto" <?php if ( $totalRows_datos_productos =='0' ){?>style="display:none"<?php } ?> >
              <div class="card-body">
      
                       
<form  method="POST"  name="add_room">                           


                            <div class="form-row margencito"  > 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Service Characteristics: </b>            

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








                        


<div class="form-row margencito"  > 

                         

                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-swatchbook fa-lg"></i></span>  
                                        </div> 


                     <select class="form-control importantex" id="type_product" name="type_product" required>
                                                        
                                   <option selected disabled value="">Type of product:</option>
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_product_kind['id_product_kind']; ?>"><?php echo $row_datos_product_kind['name_product_kind']; ?></option>

                                <?php } while ($row_datos_product_kind = mysqli_fetch_assoc($datos_product_kind)); ?> 
                         
                                        </select>
  
                              </div>  







                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-bag-shopping fa-lg"></i></span>  
                                        </div>  


                     <select class="form-control importantex" id="product_name" name="product_name" required>
                                                        
                                   <option selected disabled value="">Product Name:</option> 
                                                        <option disabled></option>

                               <?php do{?>                                

<option value="<?php echo $row_datos_productos['id_producto']; ?>"><?php echo $row_datos_productos['name_producto']; ?></option>

                                <?php } while ($row_datos_productos = mysqli_fetch_assoc($datos_productos)); ?> 
                         
                                        </select>
  
                              </div>  



                              <div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2"> 
                              <div class="input-group-prepend">
       <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-briefcase fa-lg"></i></span>  
                                        </div>  


                     <select class="form-control importantex" id="type_offer" name="type_offer" required>
                                                        
                                   <option selected disabled value="">Type Offer:</option> 
                                                        <option disabled></option>
                                   <option value="1">1- Sale </option>
                                   <option value="2">2- Rent</option> 
                             
                         
                                        </select>
  
                              </div>  



<div class="input-group input-group-sm  col-sm-12 col-md-6 col-lg-3 mb-2">  
<div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Characteristics:</span>  
</div>
<input type="text" maxlength="110" class="form-control" id="product_cha" name="product_cha"
 aria-label="product_cha" aria-describedby="basic-addon1" >    
</div>





                           

<div class="col-md-12 mb-2">

<button type="submit" name="add_service" class="btn btn-sm btn-info btn-block" id='add_service'>
<i class="fa-solid fa-floppy-disk fa-lg"></i> &nbsp</button> 

</div>
                              


</div> <!-- cierre margencito -->










</form>



              </div><!-- cierre card mx-auto -->
              </div><!-- cierre card-body -->



































                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

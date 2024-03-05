<?php 

include("00_identificador.php");


    $foto_success="";
    $foto_danger="";
    $foto_info="1";

    $direcc_success=""; // notificador del proceso de insercion de direccion
    $direcc_danger="";  // notificador del proceso de insercion de direccion

    $datos_success="";
    $datos_danger="";

























include("../conectar.php");

include("php_list/00_selectables_list.php");
mysqli_close($enlace); 


include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">





              <div class="form-row">

                <div class="alert col-md-3 col-lg-3 alert-primary ml-1" role="alert">
                    <i class="far fa-check-circle fa-lg "></i> &nbsp; &nbsp; Selectables
                </div>

                
                <div class="col-md-9 col-lg-9 mb-2">
                    

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"input-group-text alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"input-group-text alert-success text-truncate\" role=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->

                </div> 


              
              </div>
      


 <!-- Icon Cards-->
      
      <div class="row">

         
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white relleno-browplight o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-globe"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_nacionalitys->total_nacionalitys; ?></div>
              <div class="infozzz">Nationalitys</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"       

href="selecc_00.php?ttabla=nationality&idtabla=id_nationality&nombdato=name_nationality&ttitulo=Nationalitys">    <!-- el 00 es de personal -->

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


<div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white relleno-pink o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-venus-mars"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_sexos->total_sexos; ?></div>
              <div class="infozzz">Genders</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"        

href="selecc_00.php?ttabla=sex&idtabla=id_sex&nombdato=name_sex&ttitulo=Genders">                <!-- el 00 es de personal -->

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>





        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white relleno-ocean o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-share-alt-square"></i>
              </div>
              <div class="mr-5 cantidadzzzpe"><?php echo $row_rols->total_rols; ?></div>
              <div class="infozzz">Rols</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1" 
            href="selecc_00.php?ttabla=roles&idtabla=id_rol_per&nombdato=name_rol&ttitulo=Rols">          <!-- el 00 es de personal -->

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>




       <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="far fa-flag"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_paises->total_paises; ?></div>
              <div class="infozzz">Countrys</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_01.php?ttabla=country&idtabla=id_country&nombdato=name_country&ttitulo=Countrys">       
           <!-- el 01 esta asociado a la direccion del personal y hostales pero en la misma tabla adress -->

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>









      </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->











                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

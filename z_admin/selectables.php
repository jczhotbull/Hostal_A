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
      




<h4 class="glowwhite">Related to a room:</h4>



 <!-- Icon Cards-->
      
      <div class="row">

         
       <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-lila o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-door-open fa-xs"></i> 
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_room_kind->total_room_kind; ?></div>
              <div class="infozzz">R. Kind</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_0r.php?ttabla=room_kind&idtabla=id_room_kind&nombdato=name_room_kind&ttitulo=Room Kind">       
           <!-- el 0r esta asociado a la estructura de una habitación o cuarto -->

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-crema o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon"> 
                <i class="fa-solid fa-bed-pulse fa-xs"></i>  
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_bed_kind->total_bed_kind; ?></div>
              <div class="infozzz">B. Kind</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_0b.php?ttabla=bed_kind&idtabla=id_bed_kind&nombdato=name_bed_kind&ttitulo=Bed Kind">       
         

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



     



        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-vino o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon_pe">
                <i class="fa-solid fa-arrow-up-1-9 fa-sm"></i> 
              </div>
              <div class="mr-5 infozzz"><?php echo $row_room_number->total_room_number; ?> Room</div>
              <div class="infozzz">Name or N°</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_0r.php?ttabla=room_number&idtabla=id_room_number&nombdato=name_room_number&ttitulo=Room Number">       


              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-purpplight o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-bed fa-xs"></i> 
              </div>
              <div class="mr-5 infozzz"><?php echo $row_bed_number->total_bed_number; ?> Bed</div>
              <div class="infozzzpe">Name</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_0b.php?ttabla=bed_number&idtabla=id_bed_number&nombdato=name_bed_number&ttitulo=Bed Number">       
 <!--   previo a borrarlo debo confirmar que esten o no en uso.... los del selecc_0b son exclusivos de  room+bed  -->      

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-vinolight o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-hotel fa-sm"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_floors->total_floors; ?></div>
              <div class="infozzz">Floors</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"   

           href="selecc_0r.php?ttabla=floors&idtabla=id_floors&nombdato=name_floors&ttitulo=Floors">       


              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>




        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-moraoscuro o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-regular fa-map fa-sm"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_hostel_area->total_hostel_area; ?></div>
              <div class="infozzz">Areas</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_0r.php?ttabla=hostel_area&idtabla=id_hostel_area&nombdato=name_hostel_area&ttitulo=Hostel Area">       
         

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>





       

















       

<!-- 

        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-carne o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-thermometer fa-xs"></i>  
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_room_s->total_room_s; ?></div>
              <div class="infozzz">Room Status</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_zz.php?ttabla=room_status&idtabla=id_room_status&nombdato=name_room_status&ttitulo=Room Status">       
     

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>  --> 


 <!-- 


        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-salmon_a o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-thermometer fa-xs"></i>  
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_bed_s->total_bed_s; ?></div>
              <div class="infozzz">Bed Status</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_zz.php?ttabla=bed_status&idtabla=id_bed_status&nombdato=name_bed_status&ttitulo=Bed Status">       
  

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->  







    

        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-bolt o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-regular fa-face-surprise fa-xs"></i>  
              </div>
              <div class="mr-5 infozzz"><?php echo $row_incidents_rooms->total_incidents_rooms; ?> Rooms</div>
              <div class="infozzz">Incidents.</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

 href="selecc_zz_plus_note.php?ttabla=incidents_rooms&idtabla=id_incidents_rooms&nombdato=name_incidents_rooms&ttitulo=Incidents in Rooms">
  

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>















        
        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-bolt_alt o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-regular fa-face-surprise fa-xs"></i>  
              </div>
              <div class="mr-5 infozzz"><?php echo $row_incidents_beds->total_incidents_beds; ?> Beds</div>
              <div class="infozzz">Incidents.</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

href="selecc_zz_plus_note.php?ttabla=incidents_beds&idtabla=id_incidents_beds&nombdato=name_incidents_beds&ttitulo=Incidents in Beds">
  

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>







        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-gris o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon_pe">
                <i class="fa-solid fa-heart-circle-exclamation fa-xs"></i>  
              </div>
              <div class="mr-5 infozzz"><?php echo $row_incident_r->total_incident_r_status; ?> Rooms</div>
              <div class="infozzz">Incidents Status.</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_zz_color.php?ttabla=incident_r_status&idtabla=id_incident_r_status&nombdato=name_incident_r_status&ttitulo=Rooms Incidents Status">       
 <!--   previo a borrarlo debo confirmar que esten o no en uso.... los del selecc_0b son exclusivos de  room+bed  -->      

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-gris_alt o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon_pe">
                <i class="fa-solid fa-heart-circle-exclamation fa-xs"></i>  
              </div>
              <div class="mr-5 infozzz"><?php echo $row_incident_b->total_incident_b_status; ?> Beds</div>
              <div class="infozzz">Incidents Status.</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

 href="selecc_zz_color.php?ttabla=incident_b_status&idtabla=id_incident_b_status&nombdato=name_incident_b_status&ttitulo=Beds Incidents Status">
  

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>





<!--

        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-yellow o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-stairs fa-xs"></i>  
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_bunk_level->total_bunk_level; ?> Bunk</div>
              <div class="infozzz">Level.</div> 
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

 href="selecc_zz.php?ttabla=bunk_level&idtabla=id_bunk_level&nombdato=name_bunk_level&ttitulo=Bunk Level">
  

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>  -->













      </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->




<h4 class="glowwhite">Sales:</h4>


 <!-- Icon Cards-->
      
 <div class="row">


 <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-indigo o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon">  
                <i class="fa-solid fa-store"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_products->total_products; ?></div>
              <div class="infozzz">Products</div>
            </div>  
            <a class=" card-footer card-footerz text-white clearfix small z-1"        

href="selecc_zz_dos_p.php?ttabla=productos&idtabla=id_producto&nombdato=name_producto&ttitulo=Products">    

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
</div>




<div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-browpdarkx o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-fan fa-sm"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_products_k->total_products_k; ?></div>
              <div class="infozzz">P. Kind</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"        

href="selecc_zz.php?ttabla=product_kind&idtabla=id_product_kind&nombdato=name_product_kind&ttitulo=Product Kind">

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-grama o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon_pe">
                <i class="fa-solid fa-money-bill-transfer"></i> 
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_currency->total_currency; ?></div>
              <div class="infozzz">Currency</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"        

href="selecc_zz_dos.php?ttabla=currency&idtabla=id_currency&nombdato=name_currency&nombextradato=symbol_currency&input_a=Coin Name&input_b=Coin Symbol&ttitulo=Currency">

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>








 <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-moraoscuro o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-percent"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_taxes->total_taxes; ?></div>
              <div class="infozzz">Taxes</div>
            </div>  
            <a class=" card-footer card-footerz text-white clearfix small z-1"        

href="selecc_zz.php?ttabla=taxes&idtabla=id_taxes&nombdato=name_taxes&ttitulo=Taxes">    

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-vino o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fab fa-angellist fa-sm"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_discounts->total_discounts; ?></div>
              <div class="infozzz">Discounts</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"        

href="selecc_zz.php?ttabla=discounts&idtabla=id_discounts&nombdato=name_discounts&ttitulo=Discounts">

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>


















        <div class="col-xl-3 col-sm-6 col-6 mb-3"> 
          <div class="card text-white relleno-green o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-solid fa-sack-dollar"></i>
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_forma_pago->total_forma_pago; ?></div>
              <div class="infozzz">Payment(s)</div>
            </div>  
            <a class=" card-footer card-footerz text-white clearfix small z-1"        

href="selecc_zz.php?ttabla=forma_pago&idtabla=id_forma_pago&nombdato=name_forma_pago&ttitulo=Payment Methods">    

              <span class="float-left">View</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
















 </div>  <!-- cierre row -->

<!-- Cierre Icon Cards-->



<h4 class="glowwhite">Others:</h4>


 <!-- Icon Cards-->
      
 <div class="row">





<div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-browplight o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon_pe">
                <i class="fas fa-globe fa-xs"></i>
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


<div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-pink o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-venus-mars fa-xs"></i>
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





        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-ocean o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fas fa-share-alt-square "></i>
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




       <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="far fa-flag fa-sm"></i>
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




        <div class="col-xl-3 col-sm-6 col-6 mb-3">
          <div class="card text-white relleno-orange o-hidden h-100">
            <div class="card-body">
              <div class="mini_card_icon">
                <i class="fa-regular fa-star-half-stroke"></i> 
              </div>
              <div class="mr-5 cantidadzzz"><?php echo $row_behaviors->total_behaviors; ?></div>
              <div class="infozzz">Behaviors</div>
            </div>
            <a class=" card-footer card-footerz text-white clearfix small z-1"     

           href="selecc_0g_cuatro.php?ttabla=behaviors&idtabla=id_behaviors&nombdato=name_behaviors&ttitulo=Behaviors">       
           <!-- el 0g_cuatro esta asociado a los huespedes -->

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

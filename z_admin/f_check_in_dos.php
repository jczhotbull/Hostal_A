<?php


include("00_identificador.php");


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

    $foto_success = "";
    $foto_danger = "";

    $guests_success = "";
    $guests_danger = "";



    $mi_hostel_select = $_SESSION['hostel_activo'];

    $doc_del_g = $_GET['zp'];

    $id_del_g = $_GET['ri'];





$filename_doc_g = '00_croppie/doc_crop' . $doc_del_g . '.png';

if(isset($_POST['cancel_doc']))
    {
$alerta_principal = "2";

if (file_exists($filename_doc_g )) { 
unlink($filename_doc_g);

    }    

}



if(isset($_POST['delete_doc_guests']))
    {
$alerta_principal = "2";

if (file_exists($filename_doc_g )) { 
unlink($filename_doc_g);

    }    

}















// empieza la insercion de la foto del doc del huesped
if(isset($_POST['add_doc_guests']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD 
{
    $alerta_principal = "2";

    $doc_gg = $doc_del_g;

    $id_gg = $id_del_g;

    clearstatcache();
    $filenameUP = '00_croppie/doc_crop' . $doc_gg . '.png';


    if (file_exists($filenameUP )) {    // de haber una foto le cambia el nombre y la mueve a otro lugar            
        

        $extU = 'png';
       
        $newfilenameU = "guests/doc_id_g/".$id_gg."_".$doc_gg.".".$extU;

         
        if(rename($filenameUP,$newfilenameU))
            {     
            include("../conectar.php");   
          
            $query_fotoU = "INSERT INTO tb_data_guests(id_guests, guests_doc_id_pic)   

            VALUES ('$id_gg', '$newfilenameU')"; 



            if (!mysqli_query($enlace,$query_fotoU))      // si no ha logrado ingresar la foto
                     {
  
             $errorZ="- Error. ";
  
            unlink($newfilenameU);
                          
            mysqli_close($enlace);
  
                     }
  
            else {
            $id_del_data_g = mysqli_insert_id($enlace);  // almacena el id insertado en el query pasado.
              
            mysqli_close($enlace);  

            header("Location: f_check_in_tres.php?zv=ve87&da=$id_del_data_g&pass=6tz@bv&zp=$doc&ri=$id_del_g&mil=57tr@jh", TRUE, 301);
            exit();    

            
              }   

            }

}

}




 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">


              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-bolt-lightning fa-lg "></i> &nbsp; &nbsp; Fast Check-In "2"                </div> 

 

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
      
                       



                        <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-info"> Register Doc Pic: </b>            

                        <?php 
                          if ($foto_success!="")
{ echo "<i class=\"text-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Saved.\">".$user_success."</i>"; }
                        ?>

                        <?php 
                          if ($foto_danger!="")
{ echo "<i class=\"text-danger\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Not Saved.\">".$user_danger."</i>"; }
                        ?>
                            <!-- SOLO ES VISIBLE SI LA VARIABLE TIENE ALGO-->


                                </div>

                            </div>

                        </div>   <!-- cierre margencito-->




<style type="text/css">
.punterodd{
	display: block;
	cursor: pointer;
}

</style>






<div class="form-row"> 

<div class="col-md-4">

    <div class="card border-info divXXhnew">

          
          <div class="col-12 col-md-12 col-lg-12">

              <div class="form-row ">  <!--  -->


              <div class="col-12 col-md-12 col-lg-12 mt-1 verticalXX">

                <div class="upload-btn-wrapper" <?php if ( file_exists($filename_doc_g ) ){?>style="display:none"<?php } ?>>
                  <button class="btnX">&nbsp;Take a Pic&nbsp;&nbsp;<i class="fa-solid fa-camera fa-lg"></i></button>
<input class="item-img_A center-block punterodd" type="file" accept="image/*" capture="environment"  name="file_photo_A" id="file_photo_A" /> 
                 
                </div> 

                <div class="upload-btn-wrapper" <?php if ( file_exists($filename_doc_g ) ){?>style="display:none"<?php } ?>>
                  <button class="btnX">&nbsp;Upload File&nbsp;&nbsp;<i class="fas fa-search fa-lg"></i></button>
<input class="item-img_B center-block punterodd" type="file" accept="image/*"  name="file_photo_B" id="file_photo_B" /> 
                 
                </div>
                


            </div> 

            
            
          
            </div>  <!-- cierre primer row  -->



            <div class="otroXXX">
            <div class="verticalXX">

<img  src="00_croppie/doc_crop<?php echo $doc_del_g; ?>.png?nocache=<?php echo time(); ?>"

class="fotologuitocol img-responsive img-thumbnail"

id=""  onerror="this.src='guests/doc_id_g/doc_vacio.jpg';"/>







</div>
       





</div>




	







        </div>  <!-- cierre col 12 que define todo lo que esta adentro -->



    </div>   <!-- cierre card border  -->



    <form method="POST"  > 

<div class="mt-3 col-sm-12 col-md-12 col-lg-12 mb-2" <?php if ( !file_exists($filename_doc_g ) ){?>style="display:none"<?php } ?> >
<button type="submit" name="add_doc_guests" class="btn  btn-info btn-block" id='add_doc_guests'>
<b>Next</b></button></div>	 


<div class="mt-3 col-sm-12 col-md-12 col-lg-12 mb-2" <?php if ( !file_exists($filename_doc_g ) ){?>style="display:none"<?php } ?> >
<button type="submit" name="delete_doc_guests" class="btn  btn-danger btn-block" id='delete_doc_guests'>
<b>Delete</b></button> </div>	


</form> 


</div>	 

















</div>   <!-- cierre col 3  -->

</div>  <!-- ROW que CIERRA todo -->










<!-- The Modal -->




<div class="modal fade" id="cropImagePop_A" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">




<div class="modal-body">
<div class="form-row">

<div class="col-md-12 mt-1 card border-info divXXheight">



<div class="mt-2">
  <div style=" overflow: hidden;" id="upload-demo_A"></div>
</div>	








<div class="form-row">



<button class="col-md-2 col-lg-2 col-2 rotateRight text-center mt-2 btn btn-sm btn-outline-secondary" id="rotateRight" data-deg="90"><i class="fa-solid fa-rotate-left fa-lg"></i></button> 

<button class="col-md-8 col-lg-8 col-8 text-center mt-2 btn btn-sm btn-success cropImageBtn_A" id="cropImageBtn_A"><i class="fa-solid fa-scissors fa-lg"></i></button>

<button class="col-md-2 col-lg-2 col-2 rotateLeft  text-center mt-2 btn btn-sm btn-outline-secondary" id="rotateLeft" data-deg="-90"><i class="fa-solid fa-rotate-right fa-lg"></i></button>



</div>






<div class="form-row ">  <!-- mensaje q aprece -->

<div class="content1 mt-1 mb-1 col-md-12 text-center" style="display:none">

<b class="text-info"> <i class="fas fa-spinner fa-lg fa-spin"></i></b>

</div>


<div class="content2 mt-1 mb-1 col-md-12 text-center" style="display:none">
</div>



</div>  <!-- cierre form-row -->






</div>
</div>
</div>

<div class="modal-footer">


<form method="POST"  name="actualizar_doc_g"> 

<span class="content2" style="display:none"> 

<button type="submit" name="submit" class="btn btn-success" id="cropImageBtn_AA" disabled><i class="fa-regular fa-thumbs-up fa-2x"></i></button>
<button type="submit" name="cancel_doc" id="cancel_doc" class="btn btn-secondary" ><i class="fa-regular fa-thumbs-down fa-2x"></i></button>  

</span>

</form>
 


</div>
</div>
</div>
</div>

<!-- cierre The Modal -->













<!-- The Modal -->

<div class="modal fade" id="cropImagePop_B" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">

<div class="modal-body">
<div class="form-row">

<div class="col-md-12 mt-1 card border-info divXXheight">


<div class="mt-2">
  <div style=" overflow: hidden;" id="upload-demo_B"></div>
</div>	


<div class="form-row">

<button class="col-md-2 col-lg-2 col-2 rotateRight_B text-center mt-2 btn btn-sm btn-outline-secondary" id="rotateRight_B" data-deg="90"><i class="fa-solid fa-rotate-left fa-lg"></i></button> 
<button class="col-md-8 col-lg-8 col-8 text-center mt-2 btn btn-sm btn-success cropImageBtn_B" id="cropImageBtn_B"><i class="fa-solid fa-scissors fa-lg"></i></button>
<button class="col-md-2 col-lg-2 col-2 rotateLeft_B text-center mt-2 btn btn-sm btn-outline-secondary" id="rotateLeft_B" data-deg="-90"><i class="fa-solid fa-rotate-right fa-lg"></i></button>

</div>


<div class="form-row ">  <!-- mensaje q aprece -->

<div class="content1 mt-1 mb-1 col-md-12 text-center" style="display:none">

<b class="text-info"> <i class="fas fa-spinner fa-lg fa-spin"></i></b>

</div>


<div class="content2 mt-1 mb-1 col-md-12 text-center" style="display:none">
</div>

</div>  <!-- cierre form-row -->


</div>
</div>
</div>

<div class="modal-footer">


<form method="POST"  name="actualizar_doc_g"> 

<span class="content2" style="display:none"> 

<button type="submit" name="submit" class="btn btn-success" id="cropImageBtn_BB" disabled><i class="fa-regular fa-thumbs-up fa-2x"></i></button>
<button type="submit" name="cancel_doc" id="cancel_doc" class="btn btn-secondary" ><i class="fa-regular fa-thumbs-down fa-2x"></i></button>  


</span>

</form>

  

</div>
</div>
</div>
</div>

<!-- cierre The Modal -->


















<script type="text/javascript">


$(document).ready(function() {  


setTimeout(function() {
$(".content1").hide();
}, 0);                     // este numero dice que tan rapido lo esconde....


setTimeout(function() {
$(".content2").hide();
}, 0);                     // este numero dice que tan rapido lo esconde....


$('#cropImageBtn_A').click(function() {
this.disabled = true;
$(".content1").show();
  
setTimeout(function() {
$(".content1").fadeOut(6500);

}, 7500);


});



});


// Start upload preview image

var $uploadCrop_A,
tempFilename_A,
rawImg_A,
imageId_A;	

function readFile_A(input) {	

var fileInput_A = document.getElementById('file_photo_A');
var filePath_A = fileInput_A.value;
var fileSize_A = fileInput_A.files[0].size;
var allowedExtensions_A = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

if(!allowedExtensions_A.exec(filePath_A)){
swal("Alerta!", "Archivo cargado no valido!", "info");

fileInput_A.value = '';
return false;  }

if(fileSize_A > 10485760){
swal("Alerta!", "Tamaño de archivo no valido!", "info");      
return false; 
}


else { 

     if (input.files && input.files[0]) {
      var reader_A = new FileReader();
        reader_A.onload = function (e) {
            $('.upload-demo_A').addClass('ready');
            $('#cropImagePop_A').modal('show');
            rawImg_A = e.target.result;
        }
        reader_A.readAsDataURL(input.files[0]);
    }
    else {
        swal("Sorry - you're browser doesn't support the FileReader API");
    }
}

}

$uploadCrop_A = $('#upload-demo_A').croppie({
    viewport: {
        width: 301,
        height: 421,
        type: 'square'
    },
    boundary: {
        width: 315,
        height: 450
    },
    enableExif: true,



enableOrientation: true
});



$( "#rotateLeft" ).click(function() {
$uploadCrop_A.croppie('rotate', parseInt($(this).data('deg')));
});


$( "#rotateRight" ).click(function() {
$uploadCrop_A.croppie('rotate', parseInt($(this).data('deg')));
});






$('#cropImagePop_A').on('shown.bs.modal', function(){
    // alert('Shown pop');
    $uploadCrop_A.croppie('bind', {
        url: rawImg_A
    }).then(function(){
        console.log('jQuery bind complete');
    });
});

$('.item-img_A').on('change', function () { imageId_A = $(this).data('id'); tempFilename_A = $(this).val();

$('#cancelCropBtn_A').data('id', imageId_A); readFile_A(this); });

$('#cropImageBtn_A').on('click', function (ev) {
    $uploadCrop_A.croppie('result', {
        type: 'canvas',
        format: 'png',
         size: 'viewport'
    }).then(function (response) {	
         $.ajax({
        url:"00_croppie/doc_g.php?namexx=<?php echo $doc_del_g; ?>",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {

            $('#uploaded_image_A').html(data);

$(".content1").hide();


                    $("#rotateRight").hide();
                    $("#cropImageBtn_A").hide();
                    $("#rotateLeft").hide();



$(".content2").show();

document.getElementById("cropImageBtn_AA").disabled = false;


        }
      });
                        
         })


});

// End upload preview image

// chevere cambur yes





















$(document).ready(function() {  



$('#cropImageBtn_B').click(function() {
this.disabled = true;
$(".content1").show();
  
setTimeout(function() {
$(".content1").fadeOut(6500);

}, 7500);


});



});


// Start upload preview image

var $uploadCrop_B,
tempFilename_B,
rawImg_B,
imageId_B;	

function readFile_B(input) {	

var fileInput_B = document.getElementById('file_photo_B');
var filePath_B = fileInput_B.value;
var fileSize_B = fileInput_B.files[0].size;
var allowedExtensions_B = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

if(!allowedExtensions_B.exec(filePath_B)){
swal("Alerta!", "Archivo cargado no valido!", "info");

fileInput_B.value = '';
return false;  }

if(fileSize_B > 10485760){
swal("Alerta!", "Tamaño de archivo no valido!", "info");      
return false; 
}


else { 

     if (input.files && input.files[0]) {
      var reader_B = new FileReader();
        reader_B.onload = function (e) {
            $('.upload-demo_B').addClass('ready');
            $('#cropImagePop_B').modal('show');
            rawImg_B = e.target.result;
        }
        reader_B.readAsDataURL(input.files[0]);
    }
    else {
        swal("Sorry - you're browser doesn't support the FileReader API");
    }B}

}

$uploadCrop_B = $('#upload-demo_B').croppie({
    viewport: {
        width: 301,
        height: 421,
        type: 'square'
    },
    boundary: {
        width: 315,
        height: 450
    },
    enableExif: true,



enableOrientation: true
});



$( "#rotateLeft_B" ).click(function() {
$uploadCrop_B.croppie('rotate', parseInt($(this).data('deg')));
});


$( "#rotateRight_B" ).click(function() {
$uploadCrop_B.croppie('rotate', parseInt($(this).data('deg')));
});






$('#cropImagePop_B').on('shown.bs.modal', function(){
    // alert('Shown pop');
    $uploadCrop_B.croppie('bind', {
        url: rawImg_B
    }).then(function(){
        console.log('jQuery bind complete');
    });
});

$('.item-img_B').on('change', function () { imageId_B = $(this).data('id'); tempFilename_B = $(this).val();

$('#cancelCropBtn_B').data('id', imageId_B); readFile_B(this); });

$('#cropImageBtn_B').on('click', function (ev) {
    $uploadCrop_B.croppie('result', {
        type: 'canvas',
        format: 'png',
         size: 'viewport'
    }).then(function (response) {	
         $.ajax({
        url:"00_croppie/doc_g.php?namexx=<?php echo $doc_del_g; ?>",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {

            $('#uploaded_image_B').html(data);

$(".content1").hide();


                    $("#rotateRight_B").hide();
                    $("#cropImageBtn_B").hide();
                    $("#rotateLeft_B").hide();



$(".content2").show();

document.getElementById("cropImageBtn_BB").disabled = false;


        }
      });
                        
         })


});

// End upload preview image




</script>				         













  
</div>    <!-- cierre card body -->    
</div>   <!-- cierre card mx -->    


                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

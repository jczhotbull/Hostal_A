
<?php

 if(isset($_POST['cancelXX_passport_per']))
    {

$alerta_principal = "2";
$filename_passport_per = '00_croppie/passport_per_' . $row_usuarios['id_per'] . '_' . $row_usuarios['doc_per'] . '.png';

if (file_exists($filename_passport_per )) { 
unlink($filename_passport_per);

    }

}





?>





<!-- The Modal -->

<div class="modal fade" id="mod_passport_per<?php echo $row_usuarios['id_per']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

    <!--   <div class="modal-header">
         <h5 class="modal-title"><i class="fa-solid fa-ruler-combined"></i></h5> 
                
      </div>-->

      <div class="modal-body">
        <div class="form-row">
            <div class="col-md-12">

                <div class="col-md-12 mt-1 card border-info divXXheight">

                    <div class="mt-2">
                          <div style=" overflow: hidden;" id="image_demo_passport_per<?php echo $row_usuarios['id_per']; ?>"></div>
                    </div>                          

                    



<div class="form-row">
<div class="mx-auto col-md-12">  
 

 <button class="rotateRight col-md-1 mt-2 btn btn-outline-secondary" id="rotateRight_passport<?php echo $row_usuarios['id_per']; ?>" data-deg="90"><i class="fa-solid fa-rotate-left fa-lg"></i></button> 



 <button class="col-md-6 mt-2 btn btn-success crop_image_passport_per<?php echo $row_usuarios['id_per']; ?>" id="crop_image_passport_per<?php echo $row_usuarios['id_per']; ?>"><i class="fa-solid fa-scissors fa-lg"></i></button>

                   

<button class="rotateLeft col-md-1 mt-2 btn btn-outline-secondary" id="rotateLeft_passport<?php echo $row_usuarios['id_per']; ?>" data-deg="-90"> <i class="fa-solid fa-rotate-right fa-lg"></i></button>



</div> 
</div>













                     <div class="form-row ">  <!-- mensaje q aprece -->

                     <div class="content_passport_per<?php echo $row_usuarios['id_per']; ?> mt-1 mb-1 col-md-12 text-center" style="display:none">

                     <b class="text-info"> <i class="fas fa-spinner fa-lg fa-spin"></i></b>

                     </div>


                     

                     <div class="content2_passport_per<?php echo $row_usuarios['id_per']; ?> mt-1 mb-1 col-md-12 text-center" style="display:none">

                    </div>






                     </div>  <!-- cierre form-row -->
                                    

                </div>


            </div>
        </div>
      </div>


       <div class="modal-footer">

        <form method="POST"  name="actualizar_passport_per"> 
        

   <input type="hidden" id="update_doc_per2" name="update_doc_per2"
    value="<?php echo $row_usuarios['doc_per']; ?>">         <!-- documento de id del personal -->


  
  

    <input type="hidden" id="id_data_update_per" name="id_data_update_per"
    value="<?php echo $row_usuarios['id_data_per']; ?>"> 





 <span class="content2_passport_per<?php echo $row_usuarios['id_per']; ?>" style="display:none">    
        
      <button type="submit" name="update_passport_per_passport" id="update_passport_per<?php echo $row_usuarios['id_per']; ?>" class="btn btn-primary"
      value="<?php echo $row_usuarios['id_per']; ?>" disabled ><i class="fa-solid fa-floppy-disk fa-lg"></i></button>   <!-- disabled --> 


      <button type="submit" name="cancelXX_passport_per" id="cancelXX_passport_per" class="btn btn-secondary" >Cancel</button> 

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
              $(".content_passport_per<?php echo $row_usuarios['id_per']; ?>").hide();
          }, 0);                     // este numero dice que tan rapido lo esconde....


          setTimeout(function() {
              $(".content2_passport_per<?php echo $row_usuarios['id_per']; ?>").hide();
          }, 0);                     // este numero dice que tan rapido lo esconde....


          $('#crop_image_passport_per<?php echo $row_usuarios['id_per']; ?>').click(function() {
            this.disabled = true;
            $(".content_passport_per<?php echo $row_usuarios['id_per']; ?>").show();
                          
              setTimeout(function() {
                  $(".content_passport_per<?php echo $row_usuarios['id_per']; ?>").fadeOut(6500);
            
              }, 7500);
              

          });
      });












function fileValidation_passport_per<?php echo $row_usuarios['id_per']; ?>(){
    var fileInput = document.getElementById('upload_image_passport_per<?php echo $row_usuarios['id_per']; ?>');
    var filePath = fileInput.value;
    var fileSize = fileInput.files[0].size;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    
    if(!allowedExtensions.exec(filePath)){
      swal("Invalid file!", "info");
        
        fileInput.value = '';
        return false;  }

    if(fileSize > 10485760){
      swal("Invalid Size", "info");      
       return false; 
    }
    


    else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            

            reader.onload = function (event) {

              $('.image_demo_passport_per<?php echo $row_usuarios['id_per']; ?>').addClass('ready');

              $('#mod_passport_per<?php echo $row_usuarios['id_per']; ?>').modal('show');

              rawImg = event.target.result;

            }

              reader.readAsDataURL(fileInput.files[0]);

              }
                  else {
                    swal("Sorry - you're browser doesn't support the FileReader API");
                }
            }

  }




$image_crop_passport_per<?php echo $row_usuarios['id_per']; ?> = $('#image_demo_passport_per<?php echo $row_usuarios['id_per']; ?>').croppie({
  
    enableExif: true,
    viewport: {
        width: 301,
        height: 421,
        type: 'square'
    },
    boundary: {
        width: 315,
        height: 450
    },



enableOrientation: true

    
});




     


  $( "#rotateLeft_passport<?php echo $row_usuarios['id_per']; ?>" ).click(function() {
            $image_crop_passport_per<?php echo $row_usuarios['id_per']; ?>.croppie('rotate', parseInt($(this).data('deg')));
        });


   $( "#rotateRight_passport<?php echo $row_usuarios['id_per']; ?>" ).click(function() {
            $image_crop_passport_per<?php echo $row_usuarios['id_per']; ?>.croppie('rotate', parseInt($(this).data('deg')));
        });







         



$('#mod_passport_per<?php echo $row_usuarios['id_per']; ?>').on('shown.bs.modal', function(){
              // alert('Shown pop');
              $image_crop_passport_per<?php echo $row_usuarios['id_per']; ?>.croppie('bind', {
                    url: rawImg
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
            });







$('.crop_image_passport_per<?php echo $row_usuarios['id_per']; ?>').click(function(event){ 

    $image_crop_passport_per<?php echo $row_usuarios['id_per']; ?>.croppie('result', {
      type: 'canvas',
    format: 'png',
   size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"00_croppie/upload_passport_per.php?doc_per=<?php echo $row_usuarios['doc_per']; ?>&id_per=<?php echo $row_usuarios['id_per']; ?>",
        type: "POST",
        data:{"image_passport_per": response},     
        success:function(data)
        {    

                    $('#upload_image_passport_per<?php echo $row_usuarios['id_per']; ?>').html(data);

                    $(".content_passport_per<?php echo $row_usuarios['id_per']; ?>").hide();



                    $("#rotateRight_passport<?php echo $row_usuarios['id_per']; ?>").hide();
                    $("#crop_image_passport_per<?php echo $row_usuarios['id_per']; ?>").hide();
                    $("#rotateLeft_passport<?php echo $row_usuarios['id_per']; ?>").hide();



                    $(".content2_passport_per<?php echo $row_usuarios['id_per']; ?>").show();
                  
                    document.getElementById("update_passport_per<?php echo $row_usuarios['id_per']; ?>").disabled = false;   

        }
      });


    })
  });

</script> 
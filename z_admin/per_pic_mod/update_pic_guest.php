
<?php

 if(isset($_POST['cancelXX_pic_per']))
    {

$alerta_principal = "2";
$filename_pic_per = '00_croppie/pic_per_' . $row_usuarios['id_guests'] . '_' . $row_usuarios['guests_doc_id'] . '.png';

if (file_exists($filename_pic_per )) { 
unlink($filename_pic_per);

    }

}





?>





<!-- The Modal -->

<div class="modal fade" id="mod_pic_per<?php echo $row_usuarios['id_guests']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
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
                          <div style=" overflow: hidden;" id="image_demo_pic_per<?php echo $row_usuarios['id_guests']; ?>"></div>
                    </div>                          

                    



<div class="form-row">
<div class="mx-auto col-md-12">


 <button class="rotateRight col-md-1 mt-2 btn btn-outline-secondary" id="rotateRight_pic<?php echo $row_usuarios['id_guests']; ?>" data-deg="90"><i class="fa-solid fa-rotate-left fa-lg"></i></button> 



<button class="col-md-6 mt-2 btn btn-success crop_image_pic_per<?php echo $row_usuarios['id_guests']; ?>" id="crop_image_pic_per<?php echo $row_usuarios['id_guests']; ?>"><i class="fa-solid fa-scissors fa-lg"></i></button>

                   

<button class="rotateLeft col-md-1 mt-2 btn btn-outline-secondary" id="rotateLeft_pic<?php echo $row_usuarios['id_guests']; ?>" data-deg="-90"> <i class="fa-solid fa-rotate-right fa-lg"></i></button>



</div> 
</div>













                     <div class="form-row ">  <!-- mensaje q aprece -->

                     <div class="content_pic_per<?php echo $row_usuarios['id_guests']; ?> mt-1 mb-1 col-md-12 text-center" style="display:none">

                     <b class="text-info"> <i class="fas fa-spinner fa-lg fa-spin"></i></b>

                     </div>


                     

                     <div class="content2_pic_per<?php echo $row_usuarios['id_guests']; ?> mt-1 mb-1 col-md-12 text-center" style="display:none">

                    </div>






                     </div>  <!-- cierre form-row -->
                                    

                </div>


            </div>
        </div>
      </div>


       <div class="modal-footer">

        <form method="POST"  name="actualizar_pic_per"> 
        

   <input type="hidden" id="update_doc_per" name="update_doc_per"
    value="<?php echo $row_usuarios['guests_doc_id']; ?>">         <!-- doc del personal -->


     <input type="hidden" id="id_update_per" name="id_update_per"
    value="<?php echo $row_usuarios['id_guests']; ?>">     
  

    <input type="hidden" id="id_data_update_per" name="id_data_update_per"
    value="<?php echo $row_usuarios['id_data_guests']; ?>"> 





 <span class="content2_pic_per<?php echo $row_usuarios['id_guests']; ?>" style="display:none">    
        
      <button type="submit" name="update_pic_per" id="update_pic_per<?php echo $row_usuarios['id_guests']; ?>" class="btn btn-primary"
      value="<?php echo $row_usuarios['id_guests']; ?>" disabled ><i class="fa-solid fa-floppy-disk fa-lg"></i></button>   <!-- disabled --> 


      <button type="submit" name="cancelXX_pic_per" id="cancelXX_pic_per" class="btn btn-secondary" >Cancel</button> 

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
              $(".content_pic_per<?php echo $row_usuarios['id_guests']; ?>").hide();
          }, 0);                     // este numero dice que tan rapido lo esconde....


          setTimeout(function() {
              $(".content2_pic_per<?php echo $row_usuarios['id_guests']; ?>").hide();
          }, 0);                     // este numero dice que tan rapido lo esconde....


          $('#crop_image_pic_per<?php echo $row_usuarios['id_guests']; ?>').click(function() {
            this.disabled = true;
            $(".content_pic_per<?php echo $row_usuarios['id_guests']; ?>").show();
                          
              setTimeout(function() {
                  $(".content_pic_per<?php echo $row_usuarios['id_guests']; ?>").fadeOut(6500);
            
              }, 7500);
              

          });
      });












function fileValidation<?php echo $row_usuarios['id_guests']; ?>(){
    var fileInput = document.getElementById('upload_image_pic_per<?php echo $row_usuarios['id_guests']; ?>');
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

              $('.image_demo_pic_per<?php echo $row_usuarios['id_guests']; ?>').addClass('ready');

              $('#mod_pic_per<?php echo $row_usuarios['id_guests']; ?>').modal('show');

              rawImg = event.target.result;

            }

              reader.readAsDataURL(fileInput.files[0]);

              }
                  else {
                    swal("Sorry - you're browser doesn't support the FileReader API");
                }
            }

  }




$image_crop_pic_per<?php echo $row_usuarios['id_guests']; ?> = $('#image_demo_pic_per<?php echo $row_usuarios['id_guests']; ?>').croppie({
  
    enableExif: true,
    viewport: {
        width: 301,
        height: 401,
        type: 'square'
    },
    boundary: {
        width: 315,
        height: 436
    },



enableOrientation: true

    
});




     


  $( "#rotateLeft_pic<?php echo $row_usuarios['id_guests']; ?>" ).click(function() {
            $image_crop_pic_per<?php echo $row_usuarios['id_guests']; ?>.croppie('rotate', parseInt($(this).data('deg')));
        });


   $( "#rotateRight_pic<?php echo $row_usuarios['id_guests']; ?>" ).click(function() {
            $image_crop_pic_per<?php echo $row_usuarios['id_guests']; ?>.croppie('rotate', parseInt($(this).data('deg')));
        });







         



$('#mod_pic_per<?php echo $row_usuarios['id_guests']; ?>').on('shown.bs.modal', function(){
              // alert('Shown pop');
              $image_crop_pic_per<?php echo $row_usuarios['id_guests']; ?>.croppie('bind', {
                    url: rawImg
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
            });







$('.crop_image_pic_per<?php echo $row_usuarios['id_guests']; ?>').click(function(event){ 

    $image_crop_pic_per<?php echo $row_usuarios['id_guests']; ?>.croppie('result', {
      type: 'canvas',
    format: 'png',
   size: 'viewport'
    }).then(function(response){  
      $.ajax({
        url:"00_croppie/upload_pic_guest.php?doc_per=<?php echo $row_usuarios['guests_doc_id']; ?>&id_per=<?php echo $row_usuarios['id_guests']; ?>",
        type: "POST",
        data:{"image_pic_per": response},     
        success:function(data)
        {    

                    $('#upload_image_pic_per<?php echo $row_usuarios['id_guests']; ?>').html(data);

                    $(".content_pic_per<?php echo $row_usuarios['id_guests']; ?>").hide();




                    $("#rotateRight_pic<?php echo $row_usuarios['id_guests']; ?>").hide();
                    $("#crop_image_pic_per<?php echo $row_usuarios['id_guests']; ?>").hide();
                    $("#rotateLeft_pic<?php echo $row_usuarios['id_guests']; ?>").hide();




                    $(".content2_pic_per<?php echo $row_usuarios['id_guests']; ?>").show();
                  
                    document.getElementById("update_pic_per<?php echo $row_usuarios['id_guests']; ?>").disabled = false;   

        }
      });


    })
  });

</script> 

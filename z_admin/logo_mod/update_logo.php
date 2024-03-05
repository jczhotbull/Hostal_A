
<?php

 if(isset($_POST['cancelXX']))
    {

$alerta_principal = "2";
$filenameAA = '00_croppie/logo_hostel_' . $row_hostels['id_hostel'] . '_' . $row_hostels['code_hostel'] . '.png';

if (file_exists($filenameAA )) { 
unlink($filenameAA);

    }

}





?>





<!-- The Modal -->

<div class="modal fade" id="mod_logo<?php echo $row_hostels['id_hostel']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div  class="modal-dialog modal-lg" role="document">
    <div   class="modal-content">

    <!--   <div class="modal-header">
         <h5 class="modal-title"><i class="fa-solid fa-ruler-combined"></i></h5> 
                
      </div>-->

      <div  class="modal-body">
        <div  class="form-row">
            <div  class="col-md-12">

                <div   class="col-md-12 mt-1 card border-info divXXheight">  

                    <div   class="mt-2" >
                          <div style=" overflow: hidden;"  id="image_demo<?php echo $row_hostels['id_hostel']; ?>"></div>
                    </div>                          

                    
                     <button class="btn btn-success crop_image2<?php echo $row_hostels['id_hostel']; ?>" id="crop_image2<?php echo $row_hostels['id_hostel']; ?>"><i class="fa-solid fa-scissors fa-lg"></i></button>

                     <div class="form-row ">  <!-- mensaje q aprece -->

                     <div class="content<?php echo $row_hostels['id_hostel']; ?> mt-1 mb-1 col-md-12 text-center" style="display:none">

                     <b class="text-info"> <i class="fas fa-spinner fa-lg fa-spin"></i></b>

                     </div>


                     

                     <div class="content2<?php echo $row_hostels['id_hostel']; ?> mt-1 mb-1 col-md-12 text-center" style="display:none">

                    </div>






                     </div>  <!-- cierre form-row -->
                                    

                </div>


            </div>
        </div>
      </div>


       <div  class="modal-footer">

        <form method="POST"  name="actualizar_logoX"> 
        

   <input type="hidden" id="update_numX" name="update_numX"
    value="<?php echo $row_hostels['code_hostel']; ?>">         <!-- codigo del hostel acomodar -->


     <input type="hidden" id="id_plantRR" name="id_plantRR"
    value="<?php echo $row_hostels['id_hostel']; ?>">     
  




 <span class="content2<?php echo $row_hostels['id_hostel']; ?>" style="display:none">    
        
      <button type="submit" name="update_logoX" id="update_logoX<?php echo $row_hostels['id_hostel']; ?>" class="btn btn-primary"
      value="<?php echo $row_hostels['id_hostel']; ?>" disabled ><i class="fa-solid fa-floppy-disk fa-lg"></i></button>   <!-- disabled --> 


      <button type="submit" name="cancelXX" id="cancelXX" class="btn btn-2m btn-secondary" >Cancel</button> 

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
              $(".content<?php echo $row_hostels['id_hostel']; ?>").hide();
          }, 0);                     // este numero dice que tan rapido lo esconde....


          setTimeout(function() {
              $(".content2<?php echo $row_hostels['id_hostel']; ?>").hide();
          }, 0);                     // este numero dice que tan rapido lo esconde....


          $('#crop_image2<?php echo $row_hostels['id_hostel']; ?>').click(function() {
            this.disabled = true;
            $(".content<?php echo $row_hostels['id_hostel']; ?>").show();
                          
              setTimeout(function() {
                  $(".content<?php echo $row_hostels['id_hostel']; ?>").fadeOut(6500);
            
              }, 7500);
              

          });
      });












function fileValidation<?php echo $row_hostels['id_hostel']; ?>(){
    var fileInput = document.getElementById('upload_image<?php echo $row_hostels['id_hostel']; ?>');
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

              $('.image_demo<?php echo $row_hostels['id_hostel']; ?>').addClass('ready');

              $('#mod_logo<?php echo $row_hostels['id_hostel']; ?>').modal('show');

              rawImg = event.target.result;

            }

              reader.readAsDataURL(fileInput.files[0]);

              }
                  else {
                    swal("Sorry - you're browser doesn't support the FileReader API");
                }
            }

  }




$image_crop<?php echo $row_hostels['id_hostel']; ?> = $('#image_demo<?php echo $row_hostels['id_hostel']; ?>').croppie({
  
    enableExif: true,
    viewport: {
        width: 301,
        height: 301,
        type: 'square'
    },
    boundary: {
        width: 315,
        height: 315
    },
    
});


         



$('#mod_logo<?php echo $row_hostels['id_hostel']; ?>').on('shown.bs.modal', function(){
              // alert('Shown pop');
              $image_crop<?php echo $row_hostels['id_hostel']; ?>.croppie('bind', {
                    url: rawImg
                  }).then(function(){
                    console.log('jQuery bind complete');
                  });
            });







$('.crop_image2<?php echo $row_hostels['id_hostel']; ?>').click(function(event){ 

    $image_crop<?php echo $row_hostels['id_hostel']; ?>.croppie('result', {
      type: 'canvas',
    format: 'png',
   size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"00_croppie/upload_logo_hostel.php?namexx=<?php echo $row_hostels['code_hostel']; ?>&idxx=<?php echo $row_hostels['id_hostel']; ?>",
        type: "POST",
        data:{"image2": response},     
        success:function(data)
        {    

                    $('#upload_image<?php echo $row_hostels['id_hostel']; ?>').html(data);  // antes decia uploaded_image

                    $(".content<?php echo $row_hostels['id_hostel']; ?>").hide();

                    $("#crop_image2<?php echo $row_hostels['id_hostel'] ?>").hide();

                    $(".content2<?php echo $row_hostels['id_hostel']; ?>").show();
                  
                    document.getElementById("update_logoX<?php echo $row_hostels['id_hostel']; ?>").disabled = false;   

        }
      });


    })
  });

</script> 
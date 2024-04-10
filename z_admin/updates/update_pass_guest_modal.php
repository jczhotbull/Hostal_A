
<!-- ini modal editar -->

<div class="modal fade" id="password<?php echo $row_usuarios['id_guests']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">   <!-- modal-lg -->
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title text-dark" id="exampleModalLabel">
        <i class="fa-regular fa-solid fa-user-lock fa-lg"></i> </h5>  

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post">
      <div class="modal-body">


  <div class="form-row margencito"> 



                            <div class="form-row">  <!-- datos principales -->

                                <div class="col-md-12 ml-1 mb-1">

                                <b class="text-dark"> New Password: </b>            
                  
                                </div>

                            </div>

 </div>   <!-- cierre margencito-->





<div class="form-row margencito"> 


       <div class="input-group input-group-sm  col-sm-12 col-md-12 col-lg-12 mb-2">
            <div class="input-group-prepend">
                 <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key fa-lg"></i></span>   
            </div>
                  
                  <input type="password" maxlength="16" class="form-control importantex" id="pass_g_mod" name="pass_g_mod" placeholder="New Password" aria-label="pass_g_mod" aria-describedby="basic-addon1" required>   
       
       </div>  


                            
  

 </div>





      </div> <!-- modal body -->
             

      <div class="modal-footer">

        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" name="editar_password_guest" class="btn btn-secondary" value="<?php echo $row_usuarios['id_guests']; ?>">
              <i class="fa-solid fa-upload fa-lg"></i></button>   

      </div>

      </form>
      


    </div>
  </div>
</div>


<!-- cierre modal de editar -->
<!DOCTYPE html> 
<html lang="es">

<head>
	
	<title>Admin</title>
    <meta charset="utf-8">

    
    <link rel="icon" href="../favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   

    <!-- Bootstrap Nucleo CSS -->
    <link href="../00_boot/css/bootstrap.min.css" rel="stylesheet">

    <!-- JQuery-->
    <script src="../00_jquery/jquery.min.js"></script>

    <link rel="stylesheet"  href="00_croppie/croppie.css">
    <script src="00_croppie/croppie.js"></script>




    <!-- Page level plugin CSS-->
    <link href="00_vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  
    <!-- estilos para estas hojas-->
    <link href="01_css/sb-admin.css" rel="stylesheet">
    
    <!-- estilos -->
    <link rel="stylesheet"  href="01_css/estilos.css" />
    <link rel="stylesheet"  href="01_css/reloj2.css" />




 

      
    <script> function goBack()    {window.history.back();     } </script> 
    <!-- ayudan con los botones de ir una pagina alante o atras en el footer -->
    <script> function goForward() {window.history.forward();  } </script>





</head>   


             

 <body class="fixed-nav sticky-footer bg-dark " id="page-top">







  <!-- Navigation   class="hovering"-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">




<?php 

$mi_hostel_select = $_SESSION['hostel_activo'];

include("../conectar.php");

$queryFH_activo = "SELECT id_hostel, name_hostel, hostel_was_mod FROM z_hostel WHERE id_hostel = '$mi_hostel_select' limit 1";

$hostel_activo = mysqli_query($enlace, $queryFH_activo) or die(mysqli_error());

$row_hostel_activo = mysqli_fetch_assoc($hostel_activo);

$hostel_was_upd = $row_hostel_activo['hostel_was_mod'];

mysqli_close($enlace);

?>




</b>
    
      

      <div class="navbar-brand"><b> <i class="text-info"><?php echo $row_hostel_activo['name_hostel'];?></i></b> </div>
     
      <div>
     <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
      </div> <!-- este boton aparece cuando se redimensiona la pantalla -->
 
      
 
  


    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav " id="exampleAccordion">
        
        <li 
        class="nav-item separacionpequenaa hovering" data-toggle="tooltip" data-placement="right" title="Main" >
          <a class="nav-link" style="color:#FFFFFF;" href="main.php">
            <i class="fas fa-home fa-lg"></i>
            <span class="nav-link-text">&nbsp;Main</span>
          </a>
        </li>



        <li 
        class="nav-item separacionpequenaa hovering" data-toggle="tooltip" data-placement="right" title="Staff">
          <a class="nav-link" style="color:#c49674;" href="staff.php">
            <i class="fa-solid fa-user-group fa-lg"></i>  
            <span class="nav-link-text">&nbsp;Staff</span>
          </a>
        </li>




        <li 
        class="nav-item separacionpequenaa hovering" data-toggle="tooltip" data-placement="right" title="Guests">
          <a class="nav-link" style="color:#3c9dc8;" href="guests.php">
            <i class="fa-solid fa-person-walking-luggage fa-lg"></i>  
            <span class="nav-link-text">&nbsp;Guests</span>
          </a>
        </li>



        <li 
        class="nav-item separacionpequenaa hovering" data-toggle="tooltip" data-placement="right" title="Lodging">
          <a class="nav-link" style="color:#FFFFFF;"   href="lodging.php">
            <i class="fa-solid fa-cart-flatbed-suitcase fa-lg"></i>  
            <span class="nav-link-text">&nbsp;Lodging</span> 
          </a>
        </li>



        <li 
        class="nav-item separacionpequenaa hovering" data-toggle="tooltip" data-placement="right" title="Services">
          <a class="nav-link" style="color:#45acb3;" href="services.php">
            <i class="fa-solid fa-store fa-lg"></i>  
            <span class="nav-link-text">&nbsp;Services</span> 
          </a>
        </li>

      




        <li 
         class="nav-item hovering" data-toggle="tooltip" data-placement="right" title="Hostel">
          <a class="nav-link" style="color:#FFFFFF;"    href="hostel.php">
            <i class="fa-solid fa-hotel fa-lg"></i>
            <span class="nav-link-text">&nbsp;Hostel</span>  
          </a>
        </li>
   

        

        <li 
        class="nav-item separacionpequenaa hovering" data-toggle="tooltip" data-placement="right" title="Beds">
          <a class="nav-link" style="color:#3c9dc8;" href="beds.php">
            <i class="fa-solid fa-bed fa-lg"></i>  
            <span class="nav-link-text">&nbsp;Beds</span>
          </a>
        </li>










        <li 
         class="nav-item hovering" data-toggle="tooltip" data-placement="right" title="Rooms">
          <a class="nav-link" style="color:#c49674;"    href="rooms.php">
            <i class="fa-solid fa-door-open fa-lg"></i>
            <span class="nav-link-text">&nbsp;Rooms</span>   <i class=""></i>
          </a>
        </li>



   

        <li 
         class="nav-item hovering" data-toggle="tooltip" data-placement="right" title="Procedures">
          <a class="nav-link" style="color:#45acb3;"    href="procedures.php">
            <i class="fa-solid fa-book-bookmark fa-lg"></i>
            <span class="nav-link-text">&nbsp;Procedures</span>  
          </a>
        </li>

        
   

     


         <li 
          class="nav-item hovering" data-toggle="tooltip" data-placement="right" title="Selectables">
          <a class="nav-link" style="color:#c49674;"  href="selectables.php">
            <i class="far fa-check-circle fa-lg"></i>
            <span class="nav-link-text">&nbsp;Selectables</span>
          </a>
        </li>





        <li  
              class="nav-item separacionpequenaa hovering" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link" style="color:#3c9dc8;"   href="users.php">
             <i class="fa-solid fa-users-line fa-lg"></i>  
            <span class="nav-link-text">&nbsp;Users</span>
          </a>
        </li>


      


        <li 
              class="nav-item separacionpequenaa hovering" data-toggle="tooltip" data-placement="right" title="My User">
          <a class="nav-link" style="color:#FFFFFF;"    href="my_user.php">
             <i class="fa-solid fa-user-pen fa-lg"></i>
            <span class="nav-link-text">&nbsp;My User</span> 
          </a>
        </li>






        



         <li  
         class="nav-item hovering" data-toggle="tooltip" data-placement="right" title="Set-Up">
          <a class="nav-link" style="color:#c49674;" href="zzz_set_up.php">
            <i class="fas fa-cogs fa-lg"></i>
            <span class="nav-link-text">&nbsp;Set-Up</span>
          </a>
        </li>


       
      </ul>

      
      
      


      <ul class="navbar-nav  ml-auto">

        <li class="nav-horaz part1">
        <i class="far fa-calendar-alt fa-lg text-success"></i>&nbsp  
        <i id="diaSemana" class="diaSemana">Martes</i>
        <i id="dia" class="dia">27</i>,        
        <i id="mes" class="mes">Octubre</i>
        <i class="text-success">-</i>
        <i id="year" class="year">2015</i>
        <i class="text-success">/</i> 
        <i id="horas" class="horas">11</i>:<i id="minutos" class="minutos">48</i>:<i id="segundos" class="segundos">12</i>
        <i id="ampm" class="ampm">AM</i>



        </li>



        <li class="nav-item nav-textt part2">  <!-- muestra el tipo de usuario y nombre proviene del identificador -->

            <?php 

             if ($infoZ!="")
             { echo "".$infoZ.""; }   

            ?>
         
        </li>
        

                  
        <li class="nav-item part3">
          <a class="nav-link text-warning" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-sign-out-alt fa-lg "></i> &nbsp; Exit</a>   <!-- Esta en el footer -->
        </li>

        <li class="nav-item">
          .
        </li>

      </ul>


      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>     <!-- este ultimo habilita el esconder el menu izquierdo -->


    </div>





  </nav>


            
                    
          
   

             



            

                

            
        



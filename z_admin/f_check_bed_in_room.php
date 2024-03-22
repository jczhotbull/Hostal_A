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


    $mi_hostel_select = $_SESSION['hostel_activo'];
    $ttitulo = $_GET['ttitulo'];   // nombre de la rom
    $idtbla = $_GET['idtabla'];    // id de la room

    $idbed = $_GET['idbed'];    // id de la bed





// empieza el cambio de status del personal
if(isset($_POST['add_dates']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

 $date_range = $_POST['dates'];  

 $rest_a = substr($date_range, 0, -13);
 $rest_b = substr($date_range, 13, 10);


 function dateDiffInDays($rest_a, $rest_b) { 
    
  // Calculating the difference in timestamps 
  $diff = strtotime($rest_b) - strtotime($rest_a); 

  // 1 day = 24 hours 
  // 24 * 60 * 60 = 86400 seconds 
  return abs(round($diff / 86400)); 
} 


$dateDiff = dateDiffInDays($rest_a, $rest_b); 





$dates = array();

$current = strtotime($rest_a);
      $date22 = strtotime($rest_b);

      $date2  = strtotime("-1 day", $date22);   // para dejar por fuera la fecha de check out

      $stepVal = '+1 day';

while( $current <= $date2 ) {
  $dates[] = date('Y-m-d', $current);
  $current = strtotime($stepVal, $current);
}

$array_s = serialize($dates);




  include("../conectar.php");                                                

  $query_disable_per = "INSERT INTO bed_booking(id_hostel, id_room, id_bed, date_range, booking_status,
                                    date_in, date_out, nights, arreglo_d) 

  VALUES (   '1', '2', '3', '$date_range', '1', '$rest_a', '$rest_b', '$dateDiff', '$array_s' )";


if (!mysqli_query($enlace,$query_disable_per))  // si no logro ingresar la direccion...
{

$errorZ="- Error. ";
mysqli_close($enlace); 
}



else {
  // $exitoZ="- Yes ".$array_s.". ";  muestra el array

  $exitoZ="- Yes ".$array_s.". ";
  mysqli_close($enlace); 
}



}





    include("../conectar.php"); 

    $inc_A = "SELECT * FROM bed_booking  WHERE id_hostel = '1'
    and id_bed = '1'  ORDER BY id_bed_booking ASC";
    $datos_inc_A = mysqli_query($enlace, $inc_A) or die(mysqli_error());
    $row_datos_inc_A = mysqli_fetch_assoc($datos_inc_A);
    
    mysqli_close($enlace);       // idealmente no deberian de repetirse
                                 // rango de fechas, las q estan en la bd no lo hacen.
    
    





 include ("a_header.php"); ?>






        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-6 col-lg-6 alert-primary" role="alert">
<i class="fa-solid fa-calendar-days fa-lg "></i> &nbsp; &nbsp; Check-in Bed: <?php echo $ttitulo ?>.
                </div> 

 

                <?php  
                  if ($errorZ!="")
                  { echo "<div class=\"alert col-md-6 col-lg-6 alert-danger text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\" >".$errorZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ERROR TIENE ALGO-->


                <?php 
                  if ($exitoZ!="")
                  { echo "<div class=\"alert col-md-9 col-lg-9 alert-success text-truncate\" id=\"basic-addon1\" role=\"alert\" align=\"center\">".$exitoZ."</div>"; }
                ?>
                                       <!-- SOLO ES VISIBLE SI LA VARIABLE DE ÉXITO TIENE ALGO-->


                  
            </div>    <!-- CIERRE FORM SUPERIOR INFORMATIVO O DE CABECERA-->







            <script src="02_js/index.umd.min.js"></script>      
   
              <form method="post">

              <div class="mb-2 text-center">
							<input type="hidden"  id="datepicker" name="dates" > 
              </div>
              
              <div class="col-sm-12 col-md-12 col-lg-12 col-12 mb-2 text-center">
							<button type="submit" name="add_dates" class="btn btn-info"> <i class="fa-regular fa-floppy-disk fa-2x"></i></button>
						</div>

            </form>

           





              <script>


const DateTime = easepick.DateTime;
const bookedDates = [   

       


].map(d => {
    if (d instanceof Array) {
      const start = new DateTime(d[0], 'YYYY-MM-DD');
      const end = new DateTime(d[1], 'YYYY-MM-DD');

      return [start, end];
    }

    return new DateTime(d, 'YYYY-MM-DD');
});
const picker = new easepick.create({
  element: document.getElementById('datepicker'),
  css: [
    '01_css/index.css',
    '01_css/demo_hotelcal.css',
  ],

  zIndex: 10,
  grid: 2,
  calendars: 2,
  inline: true,


  plugins: ['RangePlugin', 'LockPlugin'],
  RangePlugin: {
    tooltipNumber(num) {
      return num - 1;
    },
    locale: {
      one: 'night',
      other: 'nights',
    },
  },
  LockPlugin: {
    minDate: new Date(),
    minDays: 2,
    inseparable: true,

    filter(date, picked) {
      if (picked.length === 1) {
        const incl = date.isBefore(picked[0]) ? '[)' : '(]';
        return !picked[0].isSame(date, 'day') && date.inArray(bookedDates, incl);
      }

      return date.inArray(bookedDates, '[)');
    },
  }



});
</script>















                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

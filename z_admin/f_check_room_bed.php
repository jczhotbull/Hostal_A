<?php


include("00_identificador.php");


$alerta_principal = "0";   // usado para que aparezca alguna nota al ingresar en esta pagina.
$alerta_hidezz = "0";

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


    $ttitulo = $_GET['ttitulo'];
    $idtbla = $_GET['idtabla'];
    

    $mi_hostel_select = $_SESSION['hostel_activo'];





// empieza el cambio de status del personal
if(isset($_POST['check_dates']))  // chequea si se ha enviado algo, de ser si --> se conecta a la BD y comprueba
{

  $date_range = $_POST['dates'];


  if ($date_range == '') {
    $errorZ="- <b>Error</b>: Select a Range. ";
  }



else  {     // hay un rango


  $rest_a = substr($date_range, 0, -13);
  $rest_b = substr($date_range, 13, 10);
  $year = substr($date_range, 0, -19);



  function dateDiffInDays($rest_a, $rest_b) { 
    
    // Calculating the difference in timestamps 
    $diff = strtotime($rest_b) - strtotime($rest_a); 
  
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs(round($diff / 86400)); 
  } 

  $dateDiff = dateDiffInDays($rest_a, $rest_b); 


  if ($dateDiff >= '52') {
    $errorZ="- <b>Error</b>: Invalid Range. ";
  }




else {

  $alerta_principal = "2";

  $check_aa = '1000-01-01';
  $check_bb = '1000-01-01';
  $check_cc = '1000-01-01';
  $check_dd = '1000-01-01';
  $check_ee = '1000-01-01';
  $check_ff = '1000-01-01';
  $check_gg = '1000-01-01';
  $check_hh = '1000-01-01';
  $check_ii = '1000-01-01';
  $check_jj = '1000-01-01';   //10

  $check_kk = '1000-01-01';
  $check_ll = '1000-01-01';
  $check_mm = '1000-01-01';
  $check_nn = '1000-01-01';
  $check_oo = '1000-01-01';
  $check_pp = '1000-01-01';
  $check_qq = '1000-01-01';
  $check_rr = '1000-01-01';
  $check_ss = '1000-01-01';
  $check_tt = '1000-01-01';    //20

  $check_uu = '1000-01-01';
  $check_vv = '1000-01-01';
  $check_ww = '1000-01-01';
  $check_xx = '1000-01-01';
  $check_yy = '1000-01-01';
  $check_zz = '1000-01-01';
  $check_27 = '1000-01-01';
  $check_28 = '1000-01-01';
  $check_29 = '1000-01-01';
  $check_30 = '1000-01-01';    //30

  $check_31 = '1000-01-01';
  $check_32 = '1000-01-01';
  $check_33 = '1000-01-01';
  $check_34 = '1000-01-01';
  $check_35 = '1000-01-01';
  $check_36 = '1000-01-01';
  $check_37 = '1000-01-01';
  $check_38 = '1000-01-01';
  $check_39 = '1000-01-01';
  $check_40 = '1000-01-01';    // 40


  $check_41 = '1000-01-01';
  $check_42 = '1000-01-01';
  $check_43 = '1000-01-01';
  $check_44 = '1000-01-01';
  $check_45 = '1000-01-01';
  $check_46 = '1000-01-01';
  $check_47 = '1000-01-01';
  $check_48 = '1000-01-01';
  $check_49 = '1000-01-01';
  $check_50 = '1000-01-01';    // 50 --- debe poder hasta el 52


  if ($dateDiff == 2 ) {
    $date52 = strtotime($rest_b);

    $t_aa = strtotime("-1 day", $date52);
    $check_aa = date('Y-m-d', $t_aa);  
  }


  if ($dateDiff == 3 ) {
    $date52 = strtotime($rest_b);

    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);  
  }



  if ($dateDiff == 4 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);  
  }


  if ($dateDiff == 5 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd);  
  }


  if ($dateDiff == 6 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee); 
  }



  if ($dateDiff == 7 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
  }


  if ($dateDiff == 8 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
  }



  if ($dateDiff == 9 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
  }



  if ($dateDiff == 10 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
  }


  
  if ($dateDiff == 11 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
  }

  if ($dateDiff == 12 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
  }


  if ($dateDiff == 13 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
  }


  if ($dateDiff == 14 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
  }


  if ($dateDiff == 15 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
  }




  if ($dateDiff == 16 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
  }


  if ($dateDiff == 17 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
  }









  if ($dateDiff == 18 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
   


  }




  if ($dateDiff == 19 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
   


  }




  if ($dateDiff == 20 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
   


  }





  if ($dateDiff == 21 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
   

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
   


  }





  if ($dateDiff == 22 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
 


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    


  }





  if ($dateDiff == 23 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
   


  }




  if ($dateDiff == 24 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
  

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
  


  }




  if ($dateDiff == 25 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
  

  }




  if ($dateDiff == 26 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
 


  }




  if ($dateDiff == 27 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
  

  }




  if ($dateDiff == 28 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
   

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
 


  }




  if ($dateDiff == 29 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
   


  }




  if ($dateDiff == 30 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
 


  }




  if ($dateDiff == 31 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
  


  }




  if ($dateDiff == 32 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
  


  }




  if ($dateDiff == 33 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
 


  }




  if ($dateDiff == 34 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
 


  }




  if ($dateDiff == 35 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
   


  }




  if ($dateDiff == 36 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
   

  }




  if ($dateDiff == 37 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
 


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
  


  }




  if ($dateDiff == 38 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);



    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
  


  }




  if ($dateDiff == 39 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
  


  }



  if ($dateDiff == 40 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
  


  }



  if ($dateDiff == 41 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
  

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
   


  }



  if ($dateDiff == 42 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
   

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
  


  }



  if ($dateDiff == 43 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
  

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
   


  }



  if ($dateDiff == 44 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
    $t_43 = strtotime("-43 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
    $check_43 = date('Y-m-d', $t_43);
 


  }




  if ($dateDiff == 45 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
    $t_43 = strtotime("-43 day", $date52);
    $t_44 = strtotime("-44 day", $date52);
   


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
    $check_43 = date('Y-m-d', $t_43);
    $check_44 = date('Y-m-d', $t_44);
   


  }



  if ($dateDiff == 46 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
    $t_43 = strtotime("-43 day", $date52);
    $t_44 = strtotime("-44 day", $date52);
    $t_45 = strtotime("-45 day", $date52);
   

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
    $check_43 = date('Y-m-d', $t_43);
    $check_44 = date('Y-m-d', $t_44);
    $check_45 = date('Y-m-d', $t_45);
  


  }




  if ($dateDiff == 47 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
    $t_43 = strtotime("-43 day", $date52);
    $t_44 = strtotime("-44 day", $date52);
    $t_45 = strtotime("-45 day", $date52);
    $t_46 = strtotime("-46 day", $date52);
  

    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
    $check_43 = date('Y-m-d', $t_43);
    $check_44 = date('Y-m-d', $t_44);
    $check_45 = date('Y-m-d', $t_45);
    $check_46 = date('Y-m-d', $t_46);
 


  }




  if ($dateDiff == 48 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
    $t_43 = strtotime("-43 day", $date52);
    $t_44 = strtotime("-44 day", $date52);
    $t_45 = strtotime("-45 day", $date52);
    $t_46 = strtotime("-46 day", $date52);
    $t_47 = strtotime("-47 day", $date52);
  


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
    $check_43 = date('Y-m-d', $t_43);
    $check_44 = date('Y-m-d', $t_44);
    $check_45 = date('Y-m-d', $t_45);
    $check_46 = date('Y-m-d', $t_46);
    $check_47 = date('Y-m-d', $t_47);
    


  }



  if ($dateDiff == 49 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
    $t_43 = strtotime("-43 day", $date52);
    $t_44 = strtotime("-44 day", $date52);
    $t_45 = strtotime("-45 day", $date52);
    $t_46 = strtotime("-46 day", $date52);
    $t_47 = strtotime("-47 day", $date52);
    $t_48 = strtotime("-48 day", $date52);
 


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
    $check_43 = date('Y-m-d', $t_43);
    $check_44 = date('Y-m-d', $t_44);
    $check_45 = date('Y-m-d', $t_45);
    $check_46 = date('Y-m-d', $t_46);
    $check_47 = date('Y-m-d', $t_47);
    $check_48 = date('Y-m-d', $t_48);
   


  }



  if ($dateDiff == 50 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
    $t_43 = strtotime("-43 day", $date52);
    $t_44 = strtotime("-44 day", $date52);
    $t_45 = strtotime("-45 day", $date52);
    $t_46 = strtotime("-46 day", $date52);
    $t_47 = strtotime("-47 day", $date52);
    $t_48 = strtotime("-48 day", $date52);
    $t_49 = strtotime("-49 day", $date52);
 


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
    $check_43 = date('Y-m-d', $t_43);
    $check_44 = date('Y-m-d', $t_44);
    $check_45 = date('Y-m-d', $t_45);
    $check_46 = date('Y-m-d', $t_46);
    $check_47 = date('Y-m-d', $t_47);
    $check_48 = date('Y-m-d', $t_48);
    $check_49 = date('Y-m-d', $t_49);
   


  }



  if ($dateDiff == 51 ) {
    $date52 = strtotime($rest_b);
    
    $t_aa = strtotime("-1 day", $date52);
    $t_bb = strtotime("-2 day", $date52);
    $t_cc = strtotime("-3 day", $date52);
    $t_dd = strtotime("-4 day", $date52);
    $t_ee = strtotime("-5 day", $date52);
    $t_ff = strtotime("-6 day", $date52);
    $t_gg = strtotime("-7 day", $date52);
    $t_hh = strtotime("-8 day", $date52);
    $t_ii = strtotime("-9 day", $date52);
    $t_jj = strtotime("-10 day", $date52);
    $t_kk = strtotime("-11 day", $date52);
    $t_ll = strtotime("-12 day", $date52);
    $t_mm = strtotime("-13 day", $date52);
    $t_nn = strtotime("-14 day", $date52);
    $t_oo = strtotime("-15 day", $date52);
    $t_pp = strtotime("-16 day", $date52);
    $t_qq = strtotime("-17 day", $date52);
    $t_rr = strtotime("-18 day", $date52);
    $t_ss = strtotime("-19 day", $date52);
    $t_tt = strtotime("-20 day", $date52);
    $t_uu = strtotime("-21 day", $date52);
    $t_vv = strtotime("-22 day", $date52);
    $t_ww = strtotime("-23 day", $date52);
    $t_xx = strtotime("-24 day", $date52);
    $t_yy = strtotime("-25 day", $date52);
    $t_zz = strtotime("-26 day", $date52);
    $t_27 = strtotime("-27 day", $date52);
    $t_28 = strtotime("-28 day", $date52);
    $t_29 = strtotime("-29 day", $date52);
    $t_30 = strtotime("-30 day", $date52);
    $t_31 = strtotime("-31 day", $date52);
    $t_32 = strtotime("-32 day", $date52);
    $t_33 = strtotime("-33 day", $date52);
    $t_34 = strtotime("-34 day", $date52);
    $t_35 = strtotime("-35 day", $date52);
    $t_36 = strtotime("-36 day", $date52);
    $t_37 = strtotime("-37 day", $date52);
    $t_38 = strtotime("-38 day", $date52);
    $t_39 = strtotime("-39 day", $date52);
    $t_40 = strtotime("-40 day", $date52);
    $t_41 = strtotime("-41 day", $date52);
    $t_42 = strtotime("-42 day", $date52);
    $t_43 = strtotime("-43 day", $date52);
    $t_44 = strtotime("-44 day", $date52);
    $t_45 = strtotime("-45 day", $date52);
    $t_46 = strtotime("-46 day", $date52);
    $t_47 = strtotime("-47 day", $date52);
    $t_48 = strtotime("-48 day", $date52);
    $t_49 = strtotime("-49 day", $date52);
    $t_50 = strtotime("-50 day", $date52);


    $check_aa = date('Y-m-d', $t_aa);
    $check_bb = date('Y-m-d', $t_bb);
    $check_cc = date('Y-m-d', $t_cc);
    $check_dd = date('Y-m-d', $t_dd); 
    $check_ee = date('Y-m-d', $t_ee);
    $check_ff = date('Y-m-d', $t_ff);
    $check_gg = date('Y-m-d', $t_gg);
    $check_hh = date('Y-m-d', $t_hh);
    $check_ii = date('Y-m-d', $t_ii);
    $check_jj = date('Y-m-d', $t_jj);
    $check_kk = date('Y-m-d', $t_kk);
    $check_ll = date('Y-m-d', $t_ll);
    $check_mm = date('Y-m-d', $t_mm);
    $check_nn = date('Y-m-d', $t_nn);
    $check_oo = date('Y-m-d', $t_oo);
    $check_pp = date('Y-m-d', $t_pp);
    $check_qq = date('Y-m-d', $t_qq);
    $check_rr = date('Y-m-d', $t_rr);
    $check_ss = date('Y-m-d', $t_ss);
    $check_tt = date('Y-m-d', $t_tt);
    $check_uu = date('Y-m-d', $t_uu);
    $check_vv = date('Y-m-d', $t_vv);
    $check_ww = date('Y-m-d', $t_ww);
    $check_xx = date('Y-m-d', $t_xx);
    $check_yy = date('Y-m-d', $t_yy);
    $check_zz = date('Y-m-d', $t_zz);
    $check_27 = date('Y-m-d', $t_27);
    $check_28 = date('Y-m-d', $t_28);
    $check_29 = date('Y-m-d', $t_29);
    $check_30 = date('Y-m-d', $t_30);
    $check_31 = date('Y-m-d', $t_31);
    $check_32 = date('Y-m-d', $t_32);
    $check_33 = date('Y-m-d', $t_33);
    $check_34 = date('Y-m-d', $t_34);
    $check_35 = date('Y-m-d', $t_35);
    $check_36 = date('Y-m-d', $t_36);
    $check_37 = date('Y-m-d', $t_37);
    $check_38 = date('Y-m-d', $t_38);
    $check_39 = date('Y-m-d', $t_39);
    $check_40 = date('Y-m-d', $t_40);
    $check_41 = date('Y-m-d', $t_41);
    $check_42 = date('Y-m-d', $t_42);
    $check_43 = date('Y-m-d', $t_43);
    $check_44 = date('Y-m-d', $t_44);
    $check_45 = date('Y-m-d', $t_45);
    $check_46 = date('Y-m-d', $t_46);
    $check_47 = date('Y-m-d', $t_47);
    $check_48 = date('Y-m-d', $t_48);
    $check_49 = date('Y-m-d', $t_49);
    $check_50 = date('Y-m-d', $t_50);


  }



















 $exitoZ="- Availability for <b> ".$date_range." </b>.";


} // fin en el cual se ingreso un rango valido  

} // hay un rango 

}  // fin check de rango
















 include ("a_header.php"); ?>


        <div class="content-wrapper">
            <div class="container-fluid">




              <div class="form-row"> 

                <div class="alert col-md-3 col-lg-3 alert-primary" role="alert">
                    <i class="fa-solid fa-people-line fa-lg "></i> &nbsp; &nbsp;  <i> All <b><?php echo $ttitulo ?></b> Rooms.</i>
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


            <h4 class="glowwhite mt-4" >Select Range:</h4>

          
 <script src="02_js/index.umd.min.js"></script>      
   
   <form method="post">

   <div class="form-row col-sm-12 col-md-12 col-lg-12 col-12 mb-2 ">

   <div class="mb-2" style="margin-left:-10px;">
   <input type="text"  id="datepicker" name="dates" > 
   </div>
   
   <div class="col-sm-4 col-md-4 col-lg-2 col-2 mb-2 ">
   <button type="submit"  name="check_dates" class="btn btn-info btn-sm">Check</button>
 </div>


 </div>
 </form>
        





 <script>


const DateTime = easepick.DateTime;
const bookedDates = [   

/* ['2024-03-19', '2024-03-22'],   */      


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
    /* '01_css/customize_sample.css', */
  ],

  zIndex: 10,
  grid: 2,
  calendars: 2,
 // inline: true,


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






<?php

    include ("../conectar.php");   // para saber cuantas rooms ay, activas y disponibles...
    

    $queryFHL_few = "SELECT * FROM tb_room, room_number
    where tb_room.id_room_number = room_number.id_room_number
    and tb_room.id_hostel = '$mi_hostel_select'
    and tb_room.id_room_kind = '$idtbla'
    and tb_room.room_status = '1'
    and tb_room.room_status_temp = '1'
    group BY room_number.name_room_number ASC";
        
    $rooms_few = mysqli_query($enlace, $queryFHL_few) or die(mysqli_error());
    $row_rooms_few = mysqli_fetch_assoc($rooms_few);
    $totalRows_rooms_few = mysqli_num_rows($rooms_few);

  


//me da el del hostel
$queryFHL_currencys_prim = "SELECT * FROM exchange_rates, currency       
 where exchange_rates.id_hostel = '$mi_hostel_select'
 and exchange_rates.id_hostel_currency = currency.id_currency
 order BY exchange_rates.all_set_this_time DESC limit 1";

$the_currencys_prim = mysqli_query($enlace, $queryFHL_currencys_prim) or die(mysqli_error());
$row_the_currencys_prim = mysqli_fetch_assoc($the_currencys_prim);
$totalRows_the_currencys_prim = mysqli_num_rows($the_currencys_prim);


// me da la moneda siguiente
$queryFHL_currencys_second = "SELECT * FROM exchange_rates, currency    
 where exchange_rates.id_hostel = '$mi_hostel_select'
 and exchange_rates.id_currency_A = currency.id_currency
 order BY exchange_rates.all_set_this_time DESC limit 1";

$the_currencys_second = mysqli_query($enlace, $queryFHL_currencys_second) or die(mysqli_error());
$row_the_currencys_second = mysqli_fetch_assoc($the_currencys_second);
$totalRows_the_currencys_second = mysqli_num_rows($the_currencys_second);



// me da la moneda siguiente a la siguiente
$queryFHL_currencys_third = "SELECT * FROM exchange_rates, currency    
 where exchange_rates.id_hostel = '$mi_hostel_select'
 and exchange_rates.id_currency_B = currency.id_currency
 order BY exchange_rates.all_set_this_time DESC limit 1";

$the_currencys_third = mysqli_query($enlace, $queryFHL_currencys_third) or die(mysqli_error());
$row_the_currencys_third = mysqli_fetch_assoc($the_currencys_third);
$totalRows_the_currencys_third = mysqli_num_rows($the_currencys_third);






$queryFHL_pp = "SELECT * FROM tb_prices_beds, discounts 
WHERE tb_prices_beds.id_hostel = '$mi_hostel_select' 
and   tb_prices_beds.id_room_kind = '$idtbla'
and   tb_prices_beds.discount_beds = discounts.id_discounts
ORDER BY tb_prices_beds.set_prices_date_b desc limit 1";

$room_pp = mysqli_query($enlace, $queryFHL_pp) or die(mysqli_error());
$row_room_pp = mysqli_fetch_assoc($room_pp);
$totalRows_room_pp = mysqli_num_rows($room_pp);


$queryFHL_pp_dos = "SELECT * FROM tb_prices_beds 
WHERE id_hostel = '$mi_hostel_select' 
and   id_room_kind = '$idtbla'
ORDER BY set_prices_date_b desc limit 1,2";

$room_pp_dos = mysqli_query($enlace, $queryFHL_pp_dos) or die(mysqli_error());
$row_room_pp_dos = mysqli_fetch_assoc($room_pp_dos);
$totalRows_room_pp_dos = mysqli_num_rows($room_pp_dos);


$off = '';
$discc = '';
$symbc = '';


if ($totalRows_room_pp != '0') {

if ($row_room_pp['name_discounts'] !='0') {
  $off = 'Off';
  $discc = $row_room_pp['name_discounts'];
  $symbc = '%';
}

}













$queryFHL_pp_rr = "SELECT * FROM tb_prices_rooms, discounts  
WHERE tb_prices_rooms.id_hostel = '$mi_hostel_select' 
and   tb_prices_rooms.id_room_kind = '$idtbla'
and tb_prices_rooms.discount_room = discounts.id_discounts
ORDER BY tb_prices_rooms.set_prices_date desc limit 1";

$room_pp_rr = mysqli_query($enlace, $queryFHL_pp_rr) or die(mysqli_error());
$row_room_pp_rr = mysqli_fetch_assoc($room_pp_rr);
$totalRows_room_pp_rr = mysqli_num_rows($room_pp_rr);


$queryFHL_pp_dos_rr = "SELECT * FROM tb_prices_rooms
WHERE id_hostel = '$mi_hostel_select' 
and   id_room_kind = '$idtbla'
ORDER BY set_prices_date desc limit 1,2";

$room_pp_dos_rr = mysqli_query($enlace, $queryFHL_pp_dos_rr) or die(mysqli_error());
$row_room_pp_dos_rr = mysqli_fetch_assoc($room_pp_dos_rr);
$totalRows_room_pp_dos_rr = mysqli_num_rows($room_pp_dos_rr);

$off_rr = '';
$discc_rr = '';
$symbc_rr = '';


if ($totalRows_room_pp_rr != '0') {

if ($row_room_pp_rr['name_discounts'] !='0') {
  $off_rr = 'Off';
  $discc_rr = $row_room_pp_rr['name_discounts'];
  $symbc_rr = '%';
}

}





















    mysqli_close($enlace);

    $background = '225463';
    
    ?>

<div class="alert alert-dark mt-4 col-md-12 col-lg-6 col-12" role="alert" <?php if ( $totalRows_rooms_few =='0' OR $alerta_principal =='0'  ){?>style="display:none"<?php } ?> >

<table class="table table-bordered table-hover" style="font-size: 14px;">
  <thead>
    <tr>
      <th scope="col">Night(s)</th>
      <th scope="col"><?php echo $row_the_currencys_prim['symbol_currency']; ?></th>
      <th scope="col"><?php echo $row_the_currencys_second['symbol_currency']; ?></th>
      <th scope="col"><?php echo $row_the_currencys_third['symbol_currency']; ?></th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row" >Bed per <b>1</b>:</th>
      <td><?php              
              if ($totalRows_room_pp != '0') {
                echo $row_room_pp['name_prices_beds'];
              }              
              ?>  </td>

      <td><?php              
              if ($totalRows_room_pp != '0') {
               
                $act = $row_room_pp['name_prices_beds'];
                $sec = $row_the_currencys_second['currency_A_value'];
                 
                $second = ($act /$sec );
                $english_format_number_d = number_format($second, 2, '.', '');

                echo $english_format_number_d;
              }              
              ?>              </td>

      <td> <?php              
              if ($totalRows_room_pp != '0') {

                $bct = $row_room_pp['name_prices_beds'];
                $bec =$row_the_currencys_second['currency_B_value'];
               
                $third = ($bct / $bec);
                $english_format_number_t = number_format($third, 2, '.', '');

                echo $english_format_number_t;
              }              
              ?>   </td>

    </tr>

    <tr>
      <th scope="row"  >Bed for <b><?php echo $dateDiff; ?></b>:</th>

      <td> <?php              
              if ($totalRows_room_pp != '0') {

                $vaa1 = $row_room_pp['name_prices_beds'];
                $tot = ($vaa1 * $dateDiff);
                $english_format_number_t = number_format($tot, 2, '.', '');
                echo $english_format_number_t;

              }              
              ?>           </td>

      <td><?php              
              if ($totalRows_room_pp != '0') {
               
                $act = $row_room_pp['name_prices_beds'];
                $sec = $row_the_currencys_second['currency_A_value'];
                 
                $second = ($act /$sec )* $dateDiff;
                $english_format_number_d = number_format($second, 2, '.', '');

                echo $english_format_number_d;
              }              
              ?>   </td>

      <td><?php              
              if ($totalRows_room_pp != '0') {

                $bct = $row_room_pp['name_prices_beds'];
                $bec =$row_the_currencys_second['currency_B_value'];
               
                $third = ($bct / $bec)* $dateDiff;
                $english_format_number_t = number_format($third, 2, '.', '');

                echo $english_format_number_t;
              }              
              ?>  </td>

    </tr>

    <tr>
      <th scope="row"  >Room per <b>1</b>:</th>

      <td > <?php
                              
                              if ($totalRows_room_pp_rr != '0') {
                                
                                echo $row_room_pp_rr['name_prices_rooms'];
                              }
                              
                              ?>  </td>

      <td ><?php              
              if ($totalRows_room_pp_rr != '0') {
               
                $act_r = $row_room_pp_rr['name_prices_rooms'];
                $sec_r = $row_the_currencys_second['currency_A_value'];
                 
                $second_r = ($act_r /$sec_r );
                $english_format_number_d_r = number_format($second_r, 2, '.', '');

                echo $english_format_number_d_r;
              }              
              ?> </td>

      <td> <?php              
              if ($totalRows_room_pp_rr != '0') {

                $bct_r = $row_room_pp_rr['name_prices_rooms'];
                $bec_r =$row_the_currencys_second['currency_B_value'];
               
                $third_r = ($bct_r / $bec_r);
                $english_format_number_t_r = number_format($third_r, 2, '.', '');

                echo $english_format_number_t_r;
              }              
              ?>              </td>

    </tr>

    <tr>
      <th scope="row"  >Room for <b><?php echo $dateDiff; ?></b>:</th>

      <td > <?php
                              
                              if ($totalRows_room_pp_rr != '0') {

                                $vaa1_r = $row_room_pp_rr['name_prices_rooms'];
                                $tot_r = ($vaa1_r * $dateDiff);
                                $english_format_number_t_r = number_format($tot_r, 2, '.', '');
                                echo $english_format_number_t_r;

                              }
                              
                              ?>    </td>

      <td >  <?php              
              if ($totalRows_room_pp_rr != '0') {
               
                $act_r = $row_room_pp_rr['name_prices_rooms'];
                $sec_r = $row_the_currencys_second['currency_A_value'];
                 
                $second_r = ($act_r /$sec_r )* $dateDiff;
                $english_format_number_d_r = number_format($second_r, 2, '.', '');

                echo $english_format_number_d_r;
              }              
              ?>    </td>

      <td><?php              
              if ($totalRows_room_pp_rr != '0') {

                $bct_r = $row_room_pp_rr['name_prices_rooms'];
                $bec_r =$row_the_currencys_second['currency_B_value'];
               
                $third_r = ($bct_r / $bec_r)* $dateDiff;
                $english_format_number_t_r = number_format($third_r, 2, '.', '');

                echo $english_format_number_t_r;
              }              
              ?></td>

    </tr>


  </tbody>
</table>


</div>


<h4 class="glowwhite mt-4" <?php if ( $totalRows_rooms_few =='0' OR $alerta_principal =='0'  ){?>style="display:none"<?php } ?> >Select a bed from a room:</h4>

<!-- Icon Cards-->
     
<div class="row" <?php if ( $totalRows_rooms_few =='0' OR $alerta_principal =='0'  ){?>style="display:none"<?php } ?> >



<?php  do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->     


    <?php

$este_id_kind = $row_rooms_few['id_room'];  //conteo camas por cuarto

include ("../conectar.php");

$queryFHL_nombre = "SELECT * FROM tb_rooms_beds where id_room = '$este_id_kind' order by id_room asc";

$rooms_reveal_name_tipes = mysqli_query($enlace, $queryFHL_nombre) or die(mysqli_error());
$row_rooms_reveal_name_tipes = mysqli_fetch_assoc($rooms_reveal_name_tipes);
$totalRows_rooms_reveal_name_tipes = mysqli_num_rows($rooms_reveal_name_tipes);


  // para saber cuantas camas ay


$queryFHL_few_beds = "SELECT * FROM tb_rooms_beds, bed_number
where tb_rooms_beds.id_bed_number = bed_number.id_bed_number
and tb_rooms_beds.id_hostel = '$mi_hostel_select'
and tb_rooms_beds.id_room = '$este_id_kind'
and tb_rooms_beds.bed_status_temp = '1'
order BY bed_number.name_bed_number ASC";
    
$rooms_few_beds = mysqli_query($enlace, $queryFHL_few_beds) or die(mysqli_error());
$row_rooms_few_beds = mysqli_fetch_assoc($rooms_few_beds);
$totalRows_rooms_few_beds = mysqli_num_rows($rooms_few_beds);



mysqli_close($enlace);

?>











    <div class="col-xl-3 col-sm-6 col-6 mb-3"  >
         <div class="card text-white o-hidden h-100"
         style="background:#<?php  echo $background; ?>">
           <div class="card-body">
             <div class="card-body-icon">
         
             </div>
             <div class="mr-5 infozzz">
             Room: <?php
$mi_name_room = $row_rooms_few['name_room_number'];
echo $row_rooms_few['name_room_number']; ?> - <b><?php echo $discc; ?><?php echo $symbc; ?> <?php echo $off; ?></b> <!-- / <?php echo $row_rooms_few['id_room']; ?>   -->
             </div>  

             <div class="infozzz mt-4">   
             </div>

            
             
             


           </div>


<div class="form-row mb-2 ml-2" <?php if ( $totalRows_rooms_few_beds =='0'  ){?>style="display:none"<?php } ?>>



<?php

$conteo = '0';

do{?>  <!-- va a generarme tantas filas como datos tenga esta BD -->  






<?php

$name_bed_b = $row_rooms_few_beds['name_bed_number'];

$id_room_f = $row_rooms_few_beds['id_room'];  // id de la rom
$id_bed_f = $row_rooms_few_beds['id_rooms_beds'];  //id de la cama



include ("../conectar.php");    //confirmo que fecha in no este en otra fecha in
                                //confirmo que fecha out no este en otra fecha out
                                // confirmo que fecha in & fecha out no esten dentro de un rango
                                // los rangos no contienen fecha in    ni    fecha out


  $query_ocupado = "SELECT * FROM bed_booking where id_hostel = '$mi_hostel_select'
  and id_room = '$id_room_f'
  and id_room_bed = '$id_bed_f'
  and booking_year = '$year'
  and ( date_in LIKE '%".$rest_a."%'   

       or arreglo_d LIKE '%".$rest_a."%'

       or arreglo_d LIKE '%".$check_aa."%'
       or arreglo_d LIKE '%".$check_bb."%'
       or arreglo_d LIKE '%".$check_cc."%'
       or arreglo_d LIKE '%".$check_dd."%'
       or arreglo_d LIKE '%".$check_ee."%'
       or arreglo_d LIKE '%".$check_ff."%'
       or arreglo_d LIKE '%".$check_gg."%'
       or arreglo_d LIKE '%".$check_hh."%'
       or arreglo_d LIKE '%".$check_ii."%'
       or arreglo_d LIKE '%".$check_jj."%'
       or arreglo_d LIKE '%".$check_kk."%'
       or arreglo_d LIKE '%".$check_ll."%'
       or arreglo_d LIKE '%".$check_mm."%'
       or arreglo_d LIKE '%".$check_nn."%'
       or arreglo_d LIKE '%".$check_oo."%'
       or arreglo_d LIKE '%".$check_pp."%'
       or arreglo_d LIKE '%".$check_qq."%'
       or arreglo_d LIKE '%".$check_rr."%'
       or arreglo_d LIKE '%".$check_ss."%'
       or arreglo_d LIKE '%".$check_tt."%'
       or arreglo_d LIKE '%".$check_uu."%'
       or arreglo_d LIKE '%".$check_vv."%'
       or arreglo_d LIKE '%".$check_ww."%'
       or arreglo_d LIKE '%".$check_xx."%'
       or arreglo_d LIKE '%".$check_yy."%'
       or arreglo_d LIKE '%".$check_zz."%'

       or arreglo_d LIKE '%".$check_27."%'
       or arreglo_d LIKE '%".$check_28."%'
       or arreglo_d LIKE '%".$check_29."%'
       or arreglo_d LIKE '%".$check_30."%'

       or arreglo_d LIKE '%".$check_31."%'
       or arreglo_d LIKE '%".$check_32."%'
       or arreglo_d LIKE '%".$check_33."%'
       or arreglo_d LIKE '%".$check_34."%'
       or arreglo_d LIKE '%".$check_35."%'
       or arreglo_d LIKE '%".$check_36."%'
       or arreglo_d LIKE '%".$check_37."%'
       or arreglo_d LIKE '%".$check_38."%'
       or arreglo_d LIKE '%".$check_39."%'
       or arreglo_d LIKE '%".$check_40."%'
       or arreglo_d LIKE '%".$check_41."%'
       or arreglo_d LIKE '%".$check_42."%'
       or arreglo_d LIKE '%".$check_43."%'
       or arreglo_d LIKE '%".$check_44."%'
       or arreglo_d LIKE '%".$check_45."%'
       or arreglo_d LIKE '%".$check_46."%'
       or arreglo_d LIKE '%".$check_47."%'
       or arreglo_d LIKE '%".$check_48."%'
       or arreglo_d LIKE '%".$check_49."%'
       or arreglo_d LIKE '%".$check_50."%'
              
       or arreglo_d LIKE '%".$rest_b."%'
       
       or date_out LIKE '%".$rest_b."%'   
       )
  
  ORDER BY id_bed_booking ASC limit 1";





    
$bed_ocupado = mysqli_query($enlace, $query_ocupado) or die(mysqli_error());
$row_bed_ocupado = mysqli_fetch_assoc($bed_ocupado);
$totalRows_bed_ocupado = mysqli_num_rows($bed_ocupado);


mysqli_close($enlace);

if ($totalRows_bed_ocupado =='0') {
$conteo = $conteo + 1;
}



?>


<span <?php if ( $totalRows_bed_ocupado >='1'  ){?>style="display:none"<?php } ?> >



 
<a href="f_check_in.php?ttitulo=<?php echo $name_bed_b; ?>&rr=<?php echo $date_range; ?>&id_r=<?php echo $id_room_f; ?>&id_rb=<?php echo $id_bed_f; ?>&ttitulo_kind=<?php echo $ttitulo; ?>&id_kind=<?php echo $idtbla; ?>"   






class="btn btn-light btn-sm ml-1 mr-1 mb-2"
role="button" style="width: 72px;"   >
<b style="color:#<?php  echo $background; ?>; ">
 <?php echo $row_rooms_few_beds['name_bed_number']; ?></b><br> <span style="font-size:11px">Lv: <?php echo $row_rooms_few_beds['id_bunk_level']; ?></span>
<!-- /  <?php  echo $totalRows_bed_ocupado; ?>  / id:<?php echo $row_rooms_few_beds['id_rooms_beds']; ?> -->

</a>
</span> 
<!--

<?php  echo $check_aa; ?> / <?php  echo $check_bb; ?> / <?php  echo $check_cc; ?>
/ <?php  echo $check_dd; ?> / <?php  echo $check_ee; ?> / <?php  echo $check_ff; ?>
/ <?php  echo $check_gg; ?> / <?php  echo $check_hh; ?> / <?php  echo $check_ii; ?>
/<?php  echo $check_jj; ?>  -->











<?php  } while ($row_rooms_few_beds = mysqli_fetch_assoc($rooms_few_beds)); ?>

  

</div>    
<!--
 <span <?php if ( $conteo != $totalRows_rooms_reveal_name_tipes ){?>style="display:none"<?php } ?>>

<a href="f_check_in_room.php?ttitulo=<?php echo $name_bed_b; ?>&rr=<?php echo $date_range; ?>&id_r=<?php echo $id_room_f; ?>&id_rb=<?php echo $id_bed_f; ?>&ttitulo_kind=<?php echo $ttitulo; ?>&id_kind=<?php echo $idtbla; ?>&total=<?php  echo $totalRows_rooms_reveal_name_tipes; ?>"   



class="btn btn-light btn-sm  mb-2"
role="button" style="margin-left:12px;"   >
<b style="color:#<?php  echo $background; ?>; ">
Rent the Room, all <?php  echo $totalRows_rooms_reveal_name_tipes; ?> beds. 
</b>
</a>  


</span>  -->



<div class="ml-3 mb-2 infozzz"
 >
Have  <?php  echo $conteo; ?> / <?php  echo $totalRows_rooms_reveal_name_tipes; ?> Bed(s).
 </div>  

<?php  $background = $background + '1200';  ?>


         </div>
</div>





<?php  } while ($row_rooms_few = mysqli_fetch_assoc($rooms_few)); ?>



     
</div >

<!-- Icon Cards-->






                           

            </div>   <!-- cierre container fluid -->
        </div>  <!-- cierre wrapper -->




<?php include ("f_footer.php"); ?>

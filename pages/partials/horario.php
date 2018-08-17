<?php

require '../../controller/database.php';  

if (!isset($_COOKIE['user_id'])) {
header('Location: ../login.php');
}  

$query = "SELECT dia1, dia2, dia3, hora1, hora2, hora3 FROM thorarios WHERE email = '".$_COOKIE['user_id']."'";
$consul = mysqli_query($conn, $query) or die(mysqli_error($conn));
$results = mysqli_fetch_array($consul);

$bd['dia1']= $results['dia1'];
$bd['dia2']= $results['dia2'];
$bd['dia3']= $results['dia3'];
$bd['hora1']= $results['hora1'];
$bd['hora2']= $results['hora2'];
$bd['hora3']= $results['hora3'];

$new['dia1']= $_POST['dia1'];
$new['dia2']= $_POST['dia2'];
$new['dia3']= $_POST['dia3'];
$new['hora1']= $_POST['hora1'];
$new['hora2']= $_POST['hora2'];
$new['hora3']= $_POST['hora3'];

# SABER CUANTOS APARICIONES HAY DE CADA DIA
$tlunes=0;
$tmartes=0;
$tmiercoles=0;
$tjueves=0;
$tviernes=0;
$tsabado=0;
$tnada=0;

foreach($new as $value){
  if($value=="tlunes"){
    $lunes+=1;
  }elseif($value=="tmartes"){
    $martes+=1;
  }elseif($value=="tmiercoles"){
    $miercoles+=1;
  }elseif($value=="tjueves"){
    $jueves+=1;
  }elseif($value=="tviernes"){
    $viernes+=1;
  }elseif($value=="tsabado"){
    $sabado+=1;
  }else{
    $nada+=1;
  }
}

/* CRITERIOS PARA MANEJAS EVENTOS DE POST
--------------------------------------------------------------------
1. Solo un día de la semana por día de horario
2. Caso por días
3. Solo hay cambios si POST es diferente a lo que esta en COOKIE
4. N/A para un día/hora, por consiguiente N/A para una hora/día    
-------------------------------------------------------------------- */   

if($tlunes>0){
  if($tlunes==1){
    $mensaje_l="Inscrito Lunes a las".$new['hora1'].".";
  }elseif(!$cupos_lunes>=1){
    $mensaje_l="No hay cupos para el Lunes a las ".$new['hora1'].".";;
  }
  else{
    $mensaje_l="No es posible inscribir mas de una vez el mismo día";
  }

}

echo $tlunes;
echo $tmartes;
echo $tmiercoles;
echo $tjueves;
echo $tviernes;
echo $tsabado;
echo $tnada;

die();


header('Location: header.php?message_h='.$mensaje_l.'');
?>
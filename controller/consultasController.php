<?php
require_once '../modelo/consultasGenerales.php';
$obj=new Consultas();

$response = (isset($_REQUEST['res'])?$_REQUEST['res']:"");
$unidad =  (isset($_REQUEST['unidad'])?$_REQUEST['unidad']:"0");
$unidad =$_REQUEST['unidad'];
 switch($response){
     // Home
    case "tarjetas":
            $data=$obj->vistaAvisos();
            echo  json_encode($data);
        break;
    case "slider":
            $data = $obj->carousel();
            echo  json_encode($data);
        break;
    case "memu":
            $data = $obj->memu();
            echo  json_encode($data);
        break;
    // Pagina Avisos    
    case "avisosPage":
            $data = $obj->avisosAll();
            echo  json_encode($data);
        break;
    case "memuPage":
            $data = $obj->memuAll();
            echo  json_encode($data);
            break; 
             
 }
 
 if($unidad !="0"){
    
    $data = $obj->getDescargas($unidad);
    echo  json_encode($data);
 }
 
$slide =$obj->carousel();


//echo json_encode($memupage);
?>

<?php
require_once '../modelo/consultasGenerales.php';
$obj=new Consultas();

$response = (isset($_REQUEST['res'])?$_REQUEST['res']:"");
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
 
 
$slide =$obj->carousel();
$avisos = $obj->vistaAvisos();
$memu =$obj->memu();
$avpage=$obj->avisosAll();
$memupage = $obj->memuAll();


//echo json_encode($memupage);
?>

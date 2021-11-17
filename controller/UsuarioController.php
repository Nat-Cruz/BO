<?php
require_once '../modelo/modelUsuario.php';
 $obj=new modelUsuario();
 $estado =0;
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $dato=$obj->getUsuarios();
        echo json_encode($dato);
    break;
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'),true);
        $obj->addUser($_POST);
    break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'),true);
        $obj->editUser($_PUT);
    break;
    case 'DELETE':
        $id=$_GET['id'];
        if($id == 1){
            $dato = 'No se puede eliminar al Super-Admin';
        }else{
            $dato=$obj->deleteUser($id);
        }
        
        
    break;
    default:
        echo "no entro a nada";
        break;
}
    $unidad=$obj->getUnidad();
    $tipo=$obj->getTipo();


      
?>
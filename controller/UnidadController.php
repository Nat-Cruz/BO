<?php
require_once '../modelo/modelUnidad.php';

  $obj=new modelUnidad();
 
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $dato=$obj->getUnidades();
        echo json_encode($dato);
    break;
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'),true);
        $obj->addUnidad($_POST);
    break;
    case 'PUT':
        $_PUT = json_decode(file_get_contents('php://input'),true);
        $obj->editUnidad($_PUT);
    break;
    case 'DELETE':
        $id=$_GET['id'];
        $dato=$obj->deleteUnidad($id);
        
    break;
    
}
        $dato=$obj->getUnidades();

?>
<?php
require_once '../modelo/modelDescargas.php';
 $obj=new modelDescargas();
 $estado =0;
 
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $dato=$obj->getDescargas();
        echo json_encode($dato);

    break;
    case 'POST':

         $doc =(isset($_REQUEST['archivo'])?$_REQUEST['archivo']:"0");
         $dir = "../views/archivos/";
         move_uploaded_file($_FILES['archivo']['tmp_name'],$dir.$_FILES['archivo']['name']);
         $file = $_FILES['archivo']['name'];
         $id=$_REQUEST['id'];
         $nombre=$_REQUEST['nombre'];
         $tipo=$_REQUEST['tipo'];
         $fecha=$_REQUEST['fecha'];
         $usuario=$_REQUEST['usuario'];
         if($id == 0){
            $obj->addDescargas($nombre,$file, $tipo,$fecha,$usuario);
            $arr = array('data'=> $nombre); 
            echo json_encode($arr) ;

        }else{
            $obj->editDescargas($id,$nombre,$file, $tipo,$fecha,$usuario);
            $arr = array('data'=> $nombre);
    
             echo json_encode($arr) ;

        }

    break;
   
    case 'DELETE':
        $id=$_GET['id'];
        $dato=$obj->deleteDescargas($id);
        
    break;
    
}
         
?>

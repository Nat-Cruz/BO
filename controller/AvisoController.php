<?php
require_once '../modelo/modelAviso.php';

  $obj=new modelAviso();
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        $id=$_GET['id'];
        if($id>0){
            $dato=$obj->getAviso($id);
            echo json_encode($dato);
        }else if($id == 0){
            $dato=$obj->AvisoAdmin();
            echo json_encode($dato);
        }

    break;
    case 'POST':
        
		$archivo = (isset($_REQUEST['archivo'])?$_REQUEST['archivo']:"0");
        $imagen = (isset($_REQUEST['imagen'])?$_REQUEST['imagen']:"0");
      
        $d=mt_rand(1,500);
        $nombreFile =$d.$_FILES['archivo']['name'];
        if((strpos($nombreFile,"png")||strpos($nombreFile,"jpg")||strpos($nombreFile,"jpeg"))){
            $fileType ="imagen";
            $dir = "../views/images/";
        }
        if((strpos($nombreFile,"docx")||strpos($nombreFile,"doc")||strpos($nombreFile,"pdf"))){
            $fileType ="archivo";
            $dir = "../views/archivos/";
        }
      
        $path= "../views/images/";
        $nombreImage =$d.$_FILES['imagen']['name'];
		move_uploaded_file($_FILES['archivo']['tmp_name'],$dir.$nombreFile);
        move_uploaded_file($_FILES['imagen']['tmp_name'],$path.$nombreImage);
        
            $file = $nombreFile;
            $id=$_REQUEST['id'];
        	$nombre=$_REQUEST['nombre'];
        	$descripcion=$_REQUEST['descripcion'];
        	$estado=$_REQUEST['estado'];
        	$fechaI=$_REQUEST['fechaI'];
        	$fechaF=$_REQUEST['fechaF'];
            $tipo=$_REQUEST['tipo'];
        	$unidad=$_REQUEST['unidad'];
            
            
            if($id == 0){
                $obj->addAviso($nombre,$nombreImage,$nombreFile,$descripcion,$estado,$fechaI,$fechaF,$fileType,$tipo,$unidad);
                $arr = array('data'=> $nombre); 
		echo json_encode($arr) ;
 
            }else{
                $obj->editAviso($id,$nombre,$nombreImage,$nombreFile,$descripcion,$estado,$fechaI,$fechaF,$fileType,$tipo,$unidad);
                $arr = array('data'=> $id);
		
		echo json_encode($arr) ;

            }

    break;
  
    case 'DELETE':
        $id=$_GET['id'];
        $dato=$obj->deleteAviso($id);
        
    break;
    
}	

   
	$aviso=$obj->getAviso($id); 
	$admin=$obj->AvisoAdmin(); 
	$tipo=$obj->getTipo(); 
	$unidad=$obj->getUnidad();
 
?>

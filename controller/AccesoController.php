<?php
require_once '../modelo/modelAcceso.php';

$mensaje= "";
if(isset($_REQUEST['btn'])){
    session_start();// Sesión  
    
    $obj= new modelAcceso();
   
        // Login
        $user = $_POST['usuario'];
        $pass = $_POST['clave'];
        $dato=$obj->login($user,$pass);
            if(!empty($dato)){
                 $_SESSION['nivel'] = $dato[1];
            
                if($_SESSION["nivel"]=='Administrador' || $_SESSION["nivel"]=='Super-Administrador' ){
                
                    $_SESSION["id_unidad"] = $dato[0];
                    $_SESSION["nivel"] = $dato[1];
                    $_SESSION["unidad"] = $dato[2];
		            $_SESSION["id_usuario"] = $dato[3];
                    header("Location:../views/avisosAdmin.php");
                    
                } else if($_SESSION["nivel"]=='Editor'){
                    
                    $_SESSION["id_unidad"] = $dato[0];
                    $_SESSION["nivel"] = $dato[1];
                    $_SESSION["unidad"] = $dato[2];
                    $_SESSION["id_usuario"] = $dato[3];
                    header("Location:../views/avisos.php");
                    
                }
            
            }else{
		header("Location:../page-login.php");
	 } 
    
          
}else if(isset($_REQUEST['cerrar'])){
    session_destroy();
    header("Location:../page-login.php"); 
}
?>

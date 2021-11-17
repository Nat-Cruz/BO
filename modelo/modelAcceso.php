<?php
require '../config/conexion.php';
class modelAcceso {

    public function login($user,$clave){
      $con= new Conexion();
      $conexion=$con->conectar();
      $result=$conexion->query("SELECT u.id_unidad , t.nombre_tipo AS tipo, u.nombre AS unidad, us.id_usuario  FROM usuario us
                                INNER JOIN tipo_usuario t ON us.id_tipo_usuario = t.id_tipo_usuario
                                INNER JOIN unidad u ON us.id_unidad = u.id_unidad
                                WHERE us.nombre ='$user' OR us.correo='$user' AND us.clave='$clave'"); 
      $data = [];
           if($result->num_rows > 0){
            while($row= $result->fetch_assoc()){
                array_push($data,$row['id_unidad'],$row['tipo'],$row['unidad'],$row['id_usuario']);
            } 
           }
           return $data; 
    }
  } 
  
 
?>

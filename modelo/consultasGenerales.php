<?php 
    require '../config/conexion.php';
    class Consultas{

        //CAROUSEL
        function carousel(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT * FROM avisos 
            WHERE estado=1 AND id_tipo_aviso=1 AND fecha_Fin > curdate() ORDER BY  id_aviso DESC 
            LIMIT 3 ");
            $data = [];
           if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                } 
           }
           return $data;
        }

        //AVISOS-HOME
        function vistaAvisos(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT * FROM avisos WHERE
            fecha_Fin >= curdate()  AND id_tipo_aviso=1 ORDER BY  id_aviso DESC
            LIMIT 4");
            $data = [];
           if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                } 
           }
           return $data;
        }
        //MEMU-HOME
        function memu(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT * FROM avisos  WHERE
            fecha_Fin >= curdate()  AND id_tipo_aviso=2 ORDER BY id_aviso DESC
            LIMIT 4 ");
            $data = [];
           if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                } 
           }
           return $data;
        }
	 //AVISOS-PAGE
        function avisosAll(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT * FROM avisos WHERE id_tipo_aviso=1 ORDER BY  id_aviso DESC
            LIMIT 6");
            $data = [];
           if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                }
           }
           return $data;
        }
	  //MEMU-PAGE
        function memuAll(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT * FROM avisos  WHERE
            id_tipo_aviso=2 ORDER BY id_aviso DESC
            LIMIT 6 ");
            $data = [];
           if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                }
           }
           return $data;
        }


    }

?>

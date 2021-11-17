<?php
require_once '../config/conexion.php';

    class modelUsuario {
        public $error="";
         
        //GET USUARIOS
        function getUsuarios(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT  us.id_usuario, us.id_unidad ,us.id_tipo_usuario ,us.nombre , us.correo, u.nombre AS unidad ,t.nombre_tipo AS tipo FROM usuario us
            INNER JOIN tipo_usuario t ON us.id_tipo_usuario = t.id_tipo_usuario
            INNER JOIN unidad u ON us.id_unidad = u.id_unidad WHERE us.id_tipo_usuario=us.id_tipo_usuario;");
            $data = [];
            if($result->num_rows > 0){
                    while($row= $result->fetch_assoc()){
                        array_push($data,$row);
                    } 
            }
            return $data;
        }
        //GET TIPO_USUARIO
        function getTipo(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT * FROM tipo_usuario");
            $data = [];
            if($result->num_rows > 0){
                    while($row= $result->fetch_assoc()){
                        array_push($data,$row);
                    } 
            }
            return $data; 
        }
        //GET UNIDAD
        function getUnidad(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT * FROM unidad");
            $data = [];
            if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                } 
            }
            return $data;     
        }
        //INSERTAR
        function addUser($data){
            try {
                $con= new Conexion();
                $conexion=$con->conectar();
                $sql=$conexion->prepare("insert into usuario(id_usuario,nombre,correo,clave,id_unidad,id_tipo_usuario) 
                values(0,'$data[nombre]','$data[correo]','$data[clave]','$data[unidad]','$data[tipo]')");
                $sql->execute();
                
            } catch (Exception $th) {
                return $th;
            }finally{
                $sql->close();
            }
        }
        //ACTUALIZAR
        function editUser($data){
            try {
                $con= new Conexion();
                $conexion=$con->conectar();
                $sql=$conexion->prepare("update usuario set 
                                            nombre='$data[nombre]',
                                            correo='$data[correo]',
                                            clave='$data[clave]',
                                            id_unidad='$data[unidad]',
                                            id_tipo_usuario='$data[tipo]'
                                            where id_usuario='$data[id]'"); 
                $sql->execute();
                
            } catch (Exception $th) {
                return $th;
            }finally{
                $sql->close();
            }
        }
        //ELIMINAR
        function deleteUser($id){
            try {
                $con= new Conexion();
                $conexion=$con->conectar();
                $sql=$conexion->prepare("delete from usuario where id_usuario='$id' AND id_tipo_usuario !=1"); 
                $sql->execute();           
            } catch (Exception $th) {
                return $th;
            }finally{
                $sql->close();
            }
        }
    }
    
?>

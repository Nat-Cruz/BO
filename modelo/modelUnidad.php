<?php 
    require '../config/conexion.php';
  
    class modelUnidad{
        //GET UNIDADES
        function getUnidades(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("select * from unidad");
            $data = [];
           if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                } 
           }
           return $data;
        }
        //INSERTAR
        function addUnidad($data){
                try {
                    $con= new Conexion();
                    $conexion=$con->conectar();
                    $sql = $conexion->prepare("insert into unidad(id_unidad,nombre,descripcion)
                    values(0,'$data[nombre]','$data[descripcion]')");
                    $sql->execute();

                } catch (Exception $th) {
                    return $th;
                }finally{
                    $conexion->close();
                }
        }   
        //ACTUALIZAR
        function editUnidad($data){
            try {
                $con= new Conexion();
                $conexion=$con->conectar();
                $sql=$conexion->prepare("update unidad set nombre='$data[nombre]',descripcion='$data[descripcion]' where id_unidad='$data[id]'"); 
                $sql->execute();
                
            } catch (Exception $th) {
                return $th;
            }finally{
                $sql->close();
            }
        }

        //ELIMINAR
        function deleteUnidad($id){
            try {
                $con= new Conexion();
                $conexion=$con->conectar();
                $sql=$conexion->prepare("delete from unidad where id_unidad='$id'"); 
                $sql->execute();           
            } catch (Exception $th) {
                return $th;
            }finally{
                $sql->close();
            }
        }
    }
?>
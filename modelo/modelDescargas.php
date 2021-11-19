<?php 
    require '../config/conexion.php';
  
    class modelDescargas{
     
        //GET UNIDADES
        function getDescargas(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("select * from descargas");
            $data = [];
           if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                } 
           }
           return $data;
        }
        
          //INSERTAR
           function addDescargas($nombre,$file,$tipo,$fecha,$usuario){
                try {
                    $con= new Conexion();
                    $conexion=$con->conectar();
                    $sql = $conexion->prepare("insert into descargas
                    (id_descargas,nombre,archivo,tipo,fecha,id_usuario)values
                    (0,'$nombre','$file','$tipo','$fecha','$usuario')");
                    $sql->execute();

                } catch (Exception $th) {
                    return $th;
                }finally{
                $conexion->close();
                }
        }


     
    //ACTUALIZAR
    function editDescargas($id,$nombre,$file,$tipo,$fecha,$usuario){
        try {
            $con= new Conexion();
            $conexion=$con->conectar();
            $sql=$conexion->prepare("update descargas set nombre='$nombre',archivo='$file',tipo='$tipo',fecha='$fecha',id_usuario='$usuario' where id_descargas='$id'"); 
            $sql->execute();
            
        } catch (Exception $th) {
            return $th;
        }finally{
            $sql->close();
        }
    }

    //ELIMINAR
    function deleteDescargas($id){
        try {
            $con= new Conexion();
            $conexion=$con->conectar();
            $sql=$conexion->prepare("delete from descargas where id_descargas='$id'"); 
            $sql->execute();           
        } catch (Exception $th) {
            return $th;
        }finally{
            $sql->close();
        }
    }
    }
?>
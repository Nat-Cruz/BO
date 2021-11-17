<?php
require '../config/conexion.php';

 class modelAviso {
        public $mensaje="";
    
        //GET AVISO
     function AvisoAdmin(){
        
           try {
            $con= new Conexion();
            $conexion=$con->conectar();
            $result =$conexion->query("SELECT av.id_aviso, av.nombre,av.imagen, av.archivo, av.descripcion, av.estado,
            av.fecha_inicio,av.fecha_fin,av.tipoArchivo, av.id_tipo_aviso , av.id_unidad, u.nombre AS unidad 
            FROM avisos av
            INNER JOIN unidad u ON  av.id_unidad = u.id_unidad");
            $data = [];
               if($result->num_rows > 0){
                    while($row= $result->fetch_assoc()){
                        array_push($data,$row);
                    } 
               }else{
                   $mensaje ="No hay datos";
               }
               return $data;
           } catch (\Throwable $th) {
              
               return $th;
           }
    }
    function getAviso($id){
        $con= new Conexion();
        $conexion=$con->conectar();
        $result =$conexion->query("SELECT av.id_aviso, av.nombre, av.imagen,av.archivo, av.descripcion, av.estado,
        av.fecha_inicio,av.fecha_fin,av.tipoArchivo, av.id_tipo_aviso , av.id_unidad, u.nombre AS unidad 
        FROM avisos av
        INNER JOIN unidad u ON  av.id_unidad = u.id_unidad
         WHERE av.id_unidad='$id'");
        $data = [];
           if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                } 
           }
           return $data; 
    }
      //GET TIPO_AVISO
      function getTipo(){
            $con = new Conexion();
            $conexion = $con->conectar();
            $result =$conexion->query("SELECT * FROM tipo_aviso");
            $data = [];
            if($result->num_rows > 0){
                while($row= $result->fetch_assoc()){
                    array_push($data,$row);
                } 
            }
            return $data;   
        }
        //GET Unidades
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
    function addAviso($nombre,$nombreImage,$nombreFile,$descripcion,$estado,$fechaI,$fechaF,$fileType,$tipo,$unidad){
        try {
            $con= new Conexion();
            $conexion=$con->conectar();
            $sql=$conexion->prepare("insert into avisos(id_aviso,nombre,imagen,archivo,descripcion,estado,fecha_inicio,fecha_fin,tipoArchivo,id_tipo_aviso,id_unidad) 
            values(0,'$nombre','$nombreImage','$nombreFile','$descripcion',
            '$estado','$fechaI','$fechaF','$fileType','$tipo','$unidad')");
            $sql->execute();
        } catch (Exception $th) {
            return $th;
        }finally{
            $sql->close();
        }
    }
     
    //ACTUALIZAR
    function editAviso($id,$nombre,$nombreImage,$nombreFile,$descripcion,$estado,$fechaI,$fechaF,$fileType,$tipo,$unidad){
        try {
            $con= new Conexion();
            $conexion=$con->conectar();
            $sql=$conexion->prepare("update avisos set nombre='$nombre',imagen='$nombreImage',archivo='$nombreFile',descripcion='$descripcion',
            estado='$estado',fecha_inicio='$fechaI',fecha_fin='$fechaF',tipoArchivo='$fileType',id_tipo_aviso='$tipo',id_unidad='$unidad' where id_aviso='$id'"); 
            $sql->execute();
        } catch (Exception $th) {
            return $th;
        }finally{
            $sql->close();
        }
    }

    //ELIMINAR
    function deleteAviso($id){
        try {
            $con= new Conexion();
            $conexion=$con->conectar();
            $sql=$conexion->prepare("delete from avisos where id_aviso='$id'"); 
            $sql->execute();           
        } catch (Exception $th) {
            return $th;
        }finally{
           // $sql->close();
        }
    }
    }

?>

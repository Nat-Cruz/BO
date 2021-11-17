<?php

    class  Conexion{
        private $con;
        function conectar(){
            $con=new mysqli('localhost','root','Cult0$1ntr4','intranet');
            $con->set_charset('utf-8');
            return $con;
        }
    }
?>

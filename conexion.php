<?php

    $host = "localhost";
    $user = "root";
    $clave = "";
    $bd = "servicio";
    $port = "3306";

    $conexion = mysqli_connect($host,$user,$clave,$bd, $port);
    if (mysqli_connect_errno()){
        echo "ERROR (No se pudo acceder a la base de datos";
        exit();
    }

    mysqli_select_db($conexion,$bd) or die("La base de datos no se encuentra");

    mysqli_set_charset($conexion,"utf8");


?>


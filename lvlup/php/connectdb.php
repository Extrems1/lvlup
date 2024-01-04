<?php

    $server = "localhost";
    $user = "root";
    $pasw = "";
    $dbname = "dbreservaciones";


    $conexion = mysqli_connect($server,$user,$pasw,$dbname);

    if (!$conexion){
        echo mysqli_connect_errno(). ":" . mysqli_connect_error();
    }


?>

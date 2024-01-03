<?php
session_start();
if (!isset($_SESSION['permisos']) || ($_SESSION['permisos'] != 1 )) {

    session_start();
    
    $_SESSION = array();

    session_destroy();


    header("Location: ../error.php");
}
?>
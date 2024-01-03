<?php
session_start();
if (!isset($_SESSION['permisos']) || ($_SESSION['permisos'] != 1 && $_SESSION['permisos'] != 2 && $_SESSION['permisos'] != 3)) {
    header("Location: ../error.php");
}
?>
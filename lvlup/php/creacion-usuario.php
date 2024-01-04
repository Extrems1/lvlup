<?php
session_start();
require_once('../php/connectdb.php');

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['contrasena'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];

    $sql_check = "SELECT * FROM usuario WHERE correo=?";
    $stmt_check = $conexion->prepare($sql_check);
    $stmt_check->bind_param("s", $correo);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        header("Location: ../register.php?error=1");
    } else {
        $sql = "INSERT INTO usuario (nombre, apellido, correo, telefono, contrasena, permisos) VALUES (?, ?, ?, ?, ?, '3')";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $contrasena);

        if ($stmt->execute()) {
            header("Location: ../registro-exitoso.php");
        } else {
            header("Location: ../register.php?error=2");
        }
    }
} else {
    header("Location: ../register.php?error=3");
}

$conexion->close();
?>

<?php
session_start();
require_once('../php/connectdb.php');

if(isset($_POST['email']) && isset($_POST['contrasena'])){
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];


    $sql = "SELECT id_usuario, nombre, apellido, correo, telefono, permisos FROM usuario WHERE correo = ? AND contrasena = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $email, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['telefono'] = $row['telefono'];
        $_SESSION['permisos'] = $row['permisos'];

        header("Location: ../reservaciones.php");
    } else {
        header("Location: ../login.php?error=1");
    }
    $stmt->close();
} else {
    header("Location: ../login.php");
}
$conexion->close();
?>
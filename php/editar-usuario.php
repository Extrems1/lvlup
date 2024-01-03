<?php
require_once('accesso-1.php');
require_once('connectdb.php');

if (isset($_POST['id_usuario']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['permisos']) && isset($_POST['telefono'])) {
    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $permisos = $_POST['permisos'];
    $telefono = $_POST['telefono'];

    $updateUsuarioQuery = "UPDATE usuario SET nombre = ?, apellido = ?, correo = ?, permisos = ?, telefono = ? WHERE id_usuario = ?";
    $stmt = $conexion->prepare($updateUsuarioQuery);
    $stmt->bind_param("sssssi", $nombre, $apellido, $correo, $permisos, $telefono, $id_usuario);

    if ($stmt->execute()) {
        header("Location: ../usuarios.php");
        exit();
    } else {
        echo "Error al actualizar el usuario: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: ../usuarios.php");
    exit();
}

$conexion->close();
?>




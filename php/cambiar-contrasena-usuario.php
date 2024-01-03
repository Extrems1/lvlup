<?php
require_once('accesso-1.php');
require_once('connectdb.php');

if (isset($_POST['nueva_contrasena']) && isset($_POST['confirmar_contrasena']) && isset($_POST['id_cambioUsuario'])) {
    $nueva_contrasena = $_POST['nueva_contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];
    $id_cambioUsuario = $_POST['id_cambioUsuario'];

    if ($nueva_contrasena === $confirmar_contrasena) {
        $consulta = $conexion->prepare("UPDATE usuario SET contrasena = ? WHERE id_usuario = ?");
        $consulta->bind_param('ss', $nueva_contrasena, $id_cambioUsuario);

        if ($consulta->execute()) {
            $_SESSION['error_message'] = 'Contraseña actualizada correctamente.';
        } else {
            $_SESSION['error_message'] = 'Error al actualizar la contraseña. Inténtalo de nuevo.';
        }

        $consulta->close();
        $conexion->close();
    } else {
        $_SESSION['error_message'] = 'Las contraseñas no coinciden. Intenta de nuevo.';
    }
} else {
    header('Location: ../usuarios.php');
}

header('Location: ../usuarios.php?modal2=true');
exit();
?>
<?php
require_once('accesso-3.php');
require_once('connectdb.php');

if (isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    $eliminarUsuarioReservaQuery = "DELETE FROM usuario_reserva WHERE id_usuario = ?";
    $stmt1 = $conexion->prepare($eliminarUsuarioReservaQuery);
    $stmt1->bind_param("i", $id_usuario);

    if ($stmt1->execute()) {
        $eliminarUsuarioQuery = "DELETE FROM usuario WHERE id_usuario = ?";
        $stmt2 = $conexion->prepare($eliminarUsuarioQuery);
        $stmt2->bind_param("i", $id_usuario);

        if ($stmt2->execute()) {
            header("Location: ../usuarios.php");
            exit();
        } else {
            echo "Error al eliminar el usuario: " . $stmt2->error;
        }

        $stmt2->close();
    } else {
        echo "Error al eliminar el usuario de la tabla de relación usuario_reserva: " . $stmt1->error;
    }

    $stmt1->close();
} else {
    header("Location: ../usuarios.php");
    exit();
}

$conexion->close();
?>
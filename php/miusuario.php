<?php
require_once('accesso-3.php');
require_once('connectdb.php');

if (!isset($_SESSION['id_usuario'])) {
    $_SESSION = array();
    header("Location: ../login.php");
    exit();
}

if (isset($_GET['del'])) {
    $id_usuario = $_SESSION['id_usuario'];

    $eliminarUsuarioReservaQuery = "DELETE FROM usuario_reserva WHERE id_usuario = ?";
    $stmt1 = $conexion->prepare($eliminarUsuarioReservaQuery);
    $stmt1->bind_param("i", $id_usuario);

    if ($stmt1->execute()) {
        $eliminarUsuarioQuery = "DELETE FROM usuario WHERE id_usuario = ?";
        $stmt2 = $conexion->prepare($eliminarUsuarioQuery);
        $stmt2->bind_param("i", $id_usuario);

        if ($stmt2->execute()) {
            $_SESSION = array();
            session_destroy();
            header("Location: ../login.php");
            exit();
        } else {
            echo "Error al eliminar el usuario: " . $stmt2->error;
        }

        $stmt2->close();
    } else {
        echo "Error al eliminar el usuario de la tabla de relación usuario_reserva: " . $stmt1->error;
    }

    $stmt1->close();
}

if (isset($_POST['nombre_editar']) && isset($_POST['apellido_editar']) && isset($_POST['telefono_editar']) && isset($_POST['id_usuario'])) {
    $nombre = $_POST['nombre_editar'];
    $apellido = $_POST['apellido_editar'];
    $telefono = $_POST['telefono_editar'];
    $id_usuario = $_SESSION['id_usuario'];

    $updateUsuarioQuery = "UPDATE usuario SET nombre = ?, apellido = ?, telefono = ? WHERE id_usuario = ?";
    $stmt3 = $conexion->prepare($updateUsuarioQuery);
    $stmt3->bind_param("sssi", $nombre, $apellido, $telefono, $id_usuario);

    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['telefono'] = $telefono;

    if ($stmt3->execute()) {
        if ($_SESSION['pagina'] == "reservaciones") {
            unset($_SESSION['pagina']);
            header("Location: ../reservaciones.php");
        } elseif ($_SESSION['pagina'] == "recepcion") {
            unset($_SESSION['pagina']);
            header("Location: ../recepcion.php");
        } elseif ($_SESSION['pagina'] == "usuarios") {
            unset($_SESSION['pagina']);
            header("Location: ../usuarios.php");
        }
        exit();
    } else {
        echo "Error al actualizar el usuario: " . $stmt3->error;
    }

    $stmt3->close();
} else {
    if ($_SESSION['pagina'] == "reservaciones") {
        unset($_SESSION['pagina']);
        header("Location: ../reservaciones.php?");
    } elseif ($_SESSION['pagina'] == "recepcion") {
        unset($_SESSION['pagina']);
        header("Location: ../recepcion.php?");
    } elseif ($_SESSION['pagina'] == "usuarios") {
        unset($_SESSION['pagina']);
        header("Location: ../usuarios.php?");
    }
    exit();
}

$conexion->close();
?>

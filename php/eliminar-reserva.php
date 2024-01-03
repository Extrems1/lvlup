<?php
require_once('accesso-3.php');
require_once('connectdb.php');

if (isset($_POST['id_reserva']) && !empty($_POST['id_reserva'])) {
    $id_reservacion = $_POST['id_reserva'];
    $r = $_SESSION['pagina'];

    // Utilizar una declaración preparada para prevenir la inyección SQL
    $eliminarUsuarioReservaQuery = "DELETE FROM usuario_reserva WHERE id_reservaciones = ?";
    $stmt1 = $conexion->prepare($eliminarUsuarioReservaQuery);
    $stmt1->bind_param("i", $id_reservacion);

    if ($stmt1->execute()) {
        $eliminarReservaQuery = "DELETE FROM reserva WHERE id_reservaciones = ?";
        $stmt2 = $conexion->prepare($eliminarReservaQuery);
        $stmt2->bind_param("i", $id_reservacion);

        if ($stmt2->execute()) {
            if ($r == "recepcion") {
                header("Location: ../recepcion.php");
            } else {
                header("Location: ../reservaciones.php");
            }
        } else {
            if ($r == "recepcion") {
                header("Location: ../recepcion.php?error=1");
            } else {
                header("Location: ../reservaciones.php?error=1");
            }
        }

        $stmt2->close();
    } else {
        if ($r == "recepcion") {
            header("Location: ../recepcion.php?error=2");
        } else {
            header("Location: ../reservaciones.php?error=2");
        }
    }

    $stmt1->close();
}

$conexion->close();
?>
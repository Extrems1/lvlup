<?php
require_once('accesso-2.php');
require_once('connectdb.php');

if (isset($_POST['id_reservacion']) && isset($_POST['fecha_hora']) && isset($_POST['personas'])) {
    $id_reservacion = $_POST['id_reservacion'];
    $fecha_hora = $_POST['fecha_hora'];
    $personas = $_POST['personas'];

    $updateReservaQuery = "UPDATE reserva SET fecha_hora = ?, personas = ? WHERE id_reservaciones = ?";
    $stmt = $conexion->prepare($updateReservaQuery);
    $stmt->bind_param("ssi", $fecha_hora, $personas, $id_reservacion);

    if ($stmt->execute()) {
        header("Location: ../recepcion.php");
        exit();
    } else {
        echo "Error al actualizar la reserva: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: reservaciones.php");
    exit();
}

$conexion->close();
?>
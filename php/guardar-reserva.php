<?php
require_once('accesso-3.php');
require_once('connectdb.php');

if (isset($_POST['fecha_hora']) && isset($_POST['personas'])) {
    $fecha_hora = $_POST['fecha_hora'];
    $personas = $_POST['personas'];

    $insertReservaQuery = "INSERT INTO reserva (fecha_hora, personas) VALUES (?, ?)";
    $stmt1 = $conexion->prepare($insertReservaQuery);
    $stmt1->bind_param("ss", $fecha_hora, $personas);

    if ($stmt1->execute()) {
        $id_reservacion = $conexion->insert_id;

        $id_usuario = $_SESSION['id_usuario'];

        $usuarioCheckQuery = "SELECT * FROM usuario WHERE id_usuario = ?";
        $stmt2 = $conexion->prepare($usuarioCheckQuery);
        $stmt2->bind_param("i", $id_usuario);
        $stmt2->execute();
        $usuarioCheckResult = $stmt2->get_result();

        if ($usuarioCheckResult->num_rows > 0) {
            $insertUsuarioReservaQuery = "INSERT INTO usuario_reserva (id_usuario, id_reservaciones) VALUES (?, ?)";
            $stmt3 = $conexion->prepare($insertUsuarioReservaQuery);
            $stmt3->bind_param("ii", $id_usuario, $id_reservacion);

            if ($stmt3->execute()) {
                header("Location: ../reservaciones.php");
                exit();
            } else {
                echo "Error: " . $insertUsuarioReservaQuery . "<br>" . $stmt3->error;
            }

            $stmt3->close();
        } else {
            echo "El id_usuario no existe en la tabla usuario.";
        }

        $stmt2->close();
    } else {
        echo "Error: " . $insertReservaQuery . "<br>" . $stmt1->error;
    }

    $stmt1->close();
    $conexion->close();
} else {
    header("Location: reservaciones.php");
    exit();
}
?>
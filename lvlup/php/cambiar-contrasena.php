<?php
require_once('accesso-3.php');
require_once('connectdb.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contrasena_actual = $_POST['contrasena_actual'];
    $nueva_contrasena = $_POST['nueva_contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    if (verificarContraseña($conexion, $contrasena_actual)) {
        if ($nueva_contrasena === $confirmar_contrasena) {
            actualizarContraseña($conexion, $nueva_contrasena);

            header("Location: cerrar-sesion.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Error las contraseñas no coinciden";
            if ($_SESSION[ 'pagina' ] == "reservaciones"){
                unset($_SESSION['pagina']);
                header("Location: ../reservaciones.php?modal=true");
                
            }
            if ($_SESSION['pagina'] == "recepcion"){
                unset($_SESSION['pagina']);
                header("Location: ../recepcion.php?modal=true");
            }
            if ($_SESSION['pagina'] == "usuarios"){
                unset($_SESSION['pagina']);
                header("Location: ../usuarios.php?modal=true");
            }
   

        }
    } else {
        $_SESSION['error_message'] = "Error la contraseña actual no es correcta";
        if ($_SESSION[ 'pagina' ] == "reservaciones"){
            $_SESSION['pagina'] = "";
            header("Location: ../reservaciones.php?modal=true");
        }
        if ($_SESSION[ 'pagina' ] == "recepcion"){
            $_SESSION['pagina'] = "";
            header("Location: ../recepcion.php?modal=true");
        }
        if ($_SESSION[ 'pagina'] == "usuarios"){
            $_SESSION['pagina'] = "";
            header("Location: ../usuarios.php?modal=true");
        }
    }
}

function verificarContraseña($conexion, $contrasena_actual) {
    $contrasena_actual = mysqli_real_escape_string($conexion, $contrasena_actual);

    $userId = $_SESSION['id_usuario']; 
    $query = "SELECT * FROM usuario WHERE id_usuario = $userId AND contrasena = '$contrasena_actual'";
    $result = mysqli_query($conexion, $query);

    return mysqli_num_rows($result) > 0;
}

function actualizarContraseña($conexion, $nueva_contrasena) {
    $nueva_contrasena = mysqli_real_escape_string($conexion, $nueva_contrasena);
    $userId = $_SESSION['id_usuario'];
    $query = "UPDATE usuario SET contrasena = '$nueva_contrasena' WHERE id_usuario = $userId";
    mysqli_query($conexion, $query);
}

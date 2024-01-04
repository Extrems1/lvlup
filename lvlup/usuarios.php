<?php
require_once('php/accesso-1.php');
require_once('php/connectdb.php');

$userId = $_SESSION['id_usuario'];
$sql = "SELECT id_usuario, nombre, apellido, correo, permisos, telefono 
        FROM usuario 
        ORDER BY apellido, nombre";
$result = $conexion->query($sql);
$conexion->close();
$_SESSION['pagina'] = "usuarios";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Level Up Lounge</title>
    <link href="css/normalize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="img/logo.ico">
</head>

<body>

    <section class="h-100 gradient-form login-bg">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">

                <div class="card rounded-3 text-white bg-black">
                    <div class="card-body p-xl-3 mx-md-4">

                        <div class="d-flex justify-content-between mb-3">
                            <button type='submit' class='btn btn-neon-verde textogeneral neon-verde' data-bs-toggle='modal' data-bs-target='#miusuarioeditar'>Mi Cuenta</button>

                            <form method="post" action="php/cerrar-sesion.php">
                                <button type="submit" class="btn btn-neon-rojo textogeneral neon-rojo">Cerrar Sesión</button>
                            </form>
                            <?php
                            if (isset($_SESSION['permisos']) && ($_SESSION['permisos'] == 1 || $_SESSION['permisos'] == 2)) {
                                echo "<form method='post' action='reservaciones.php'>
                                      <button type='submit' class='btn btn-neon-cielo textogeneral neon-cielo'>Mis reservaciones</button>
                                      </form>";
                            }
                            if (isset($_SESSION['permisos']) && $_SESSION['permisos'] == 1) {
                                echo "<form method='post' action='recepcion.php'>
                                <button type='submit' class='btn btn-neon-azul textogeneral neon-azul'>Recepcion</button>
                                </form>";
                            }
                            ?>
                        </div>

                        <div class="text-center">
                            <img src="img/logo.webp" style="width: 185px;" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1 textogeneral neon-rojo">LevelUp Lounge</h4>
                        </div>
                        <p class="textogeneral text-center neon-amarillo">Lista de Usuarios</p>


                        <div class="table-responsive">
                            <table id="tabla_usuarios">
                                <thead>
                                    <tr>
                                        <th class='textogeneral'>ID Usuario</th>
                                        <th class='textogeneral'>Nombre</th>
                                        <th class='textogeneral'>Apellido</th>
                                        <th class='textogeneral'>Correo</th>
                                        <th class='textogeneral'>Permisos</th>
                                        <th class='textogeneral'>Teléfono</th>
                                        <th class='textogeneral'>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        if ($row['id_usuario'] == $_SESSION['id_usuario']) {
                                            continue;
                                        }
                                        echo "<tr>";
                                        echo "<td class='textogeneral align-middle'>" . $row['id_usuario'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>" . $row['nombre'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>" . $row['apellido'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>" . $row['correo'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>" . $row['permisos'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>" . $row['telefono'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>";
                                        echo "<button type='button' class='btn btn-neon-rojo textogeneral mx-3' data-bs-toggle='modal' data-bs-target='#confirmarEliminacion' data-usuario-id='" . $row['id_usuario'] . "'>Eliminar</button>";
                                        echo "<button type='button' class='btn btn-neon-azul  textogeneral neon-azul' data-bs-toggle='modal' data-bs-target='#editarUsuarioModal' data-usuario-id='" . $row['id_usuario'] . "'>Editar</button>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
    </section>

    <!-- Modal Edicion Usuario -->

    <div class="modal fade modal-oscuro text-white" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title textogeneral neon-cielo" id="editarUsuarioModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="php/editar-usuario.php" method="post">
                        <div class="mb-3">
                            <label for="nombre_editar" class="form-label textogeneral">Nombre</label>
                            <input type="text" class="form-control" id="nombre_editar" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido_editar" class="form-label textogeneral">Apellido</label>
                            <input type="text" class="form-control" id="apellido_editar" name="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="correo_editar" class="form-label textogeneral">Correo</label>
                            <input type="email" class="form-control" id="correo_editar" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="permisos_editar" class="form-label textogeneral">Permisos</label>
                            <input type="number" class="form-control" id="permisos_editar" name="permisos" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono_editar" class="form-label textogeneral">Teléfono</label>
                            <input type="text" class="form-control" id="telefono_editar" name="telefono" required>
                        </div>
                        <input type="hidden" id="id_usuario" name="id_usuario" value="">
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-neon-verde mb-3 textogeneral neon-verde">Guardar Cambios</button>
                            <button type="button" class="btn btn-neon-azul  mb-3 textogeneral neon-azul" onclick="prepararCambioContrasena()">
                                Cambiar Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edicion contraseña -->

    <div class="modal fade modal-oscuro text-white" id="usuarioContrasenaModal" tabindex="-1" aria-labelledby="usuarioContrasenaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title textogeneral neon-cielo" id="editarUsuarioModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="php/cambiar-contrasena-usuario.php" method="post">
                        <div class="mb-3">
                            <label for="nueva_contrasena" class="form-label textogeneral">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmar_contrasena" class="form-label textogeneral">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>

                            <?php
                            if (isset($_SESSION['error_message'])) {
                                if ($_SESSION['error_message'] == "Cambios guardados correctamente") {
                                    echo "<div class='textogeneral neon-verde text-center my-2'>";
                                } else {
                                    echo "<div class='textogeneral neon-rojo text-center my-2'>";
                                }
                                echo $_SESSION['error_message'];
                                unset($_SESSION['error_message']);
                                echo "</div>";
                            }
                            ?>
                        </div>
                        <!-- Campo oculto para almacenar el id_usuario -->
                        <input type="hidden" id="id_usuario_cambio" name="id_cambioUsuario" value="">
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-neon-verde mb-3 textogeneral neon-verde">Cambiar Contraseña</button>
                            <button type="button" class="btn btn-neon-rojo mb-3 textogeneral neon-rojo" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!---Modal Edicion Mi Usuario----->
    <div class="modal fade modal-oscuro text-white" id="miusuarioeditar" tabindex="-1" aria-labelledby="miusuarioeditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title textogeneral neon-cielo" id="miusuarioeditarLabel">Editar Mi Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="php/miusuario.php" method="post">
                        <div class="mb-3">
                            <label for="nombre_editar" class="form-label textogeneral">Nombre</label>
                            <input type="text" class="form-control" id="nombre_editar" name="nombre_editar" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido_editar" class="form-label textogeneral">Apellido</label>
                            <input type="text" class="form-control" id="apellido_editar" name="apellido_editar" value="<?php echo isset($_SESSION['apellido']) ? $_SESSION['apellido'] : ''; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono_editar" class="form-label textogeneral">Teléfono</label>
                            <input type="text" class="form-control" id="telefono_editar" name="telefono_editar" value="<?php echo isset($_SESSION['telefono']) ? $_SESSION['telefono'] : ''; ?>" required>
                        </div>
                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?php $_SESSION['id_usuario']; ?>">

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-neon-verde  textogeneral neon-verde">Guardar Cambios</button>
                            <button type="button" class="btn btn-neon-azul textogeneral neon-azul" data-bs-toggle="modal" data-bs-target="#cambiarContrasenaModal">
                                Cambiar Contraseña
                            </button>
                        </div>
                    </form>

                </div>
                <hr>
                <p class="text-center textogeneral neon-rojo">¡Atención! Esta acción eliminará permanentemente tu cuenta.</p>
                <div class="d-flex justify-content-center align-items-center">

                    <a href="#" class="btn btn-neon-rojo mb-3 neon-rojo textogeneral" data-bs-toggle="modal" data-bs-target="#confirmarMiEliminarUsuario">Eliminar Cuenta</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal de cambio de contrasena -->
    <div class="modal fade modal-oscuro text-white" id="cambiarContrasenaModal" tabindex="-1" aria-labelledby="cambiarContrasenaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title textogeneral neon-cielo" id="cambiarContrasenaModalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="php/cambiar-contrasena.php" method="post">
                        <div class="mb-3">

                            <label for="contrasena_actual" class="form-label textogeneral">Contraseña Actual</label>
                            <input type="password" class="form-control textogeneral" id="contrasena_actual" name="contrasena_actual" required>
                        </div>
                        <div class="mb-3">
                            <label for="nueva_contrasena" class="form-label textogeneral">Nueva Contraseña</label>
                            <input type="password" class="form-control textogeneral" id="nueva_contrasena" name="nueva_contrasena" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmar_contrasena" class="form-label textogeneral">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control textogeneral" id="confirmar_contrasena" name="confirmar_contrasena" required>

                            <div class="textogeneral neon-rojo text-center my-2">
                                <?php

                                if (isset($_SESSION['error_message'])) {
                                    echo $_SESSION['error_message'];
                                    unset($_SESSION['error_message']);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-neon-verde mb-3 textogeneral neon-verde">Cambiar Contraseña</button>
                            <button type="button" class="btn btn-neon-rojo mb-3 textogeneral neon-rojo" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Eliminacion de mi usuario -->
    <div class="modal fade modal-oscuro text-white" id="confirmarMiEliminarUsuario" tabindex="-1" aria-labelledby="confirmarMiEliminarUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarMiEliminarUsuarioLabel">Confirmar Eliminación de Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center textogeneral neon-rojo">
                    ¿Estás seguro de que quieres eliminar tu cuenta? Esta acción será irreversible.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-neon-verde textogeneral" data-bs-dismiss="modal">Cancelar</button>
                    <a href="php/miusuario.php?del=1" class="btn btn-neon-rojo textogeneral">Eliminar Cuenta</a>
                </div>
            </div>
        </div>
    </div>


    <!-- ----Modal de confirmacion de eliminacion de usuario---- -->

    <div class="modal fade modal-oscuro text-white" id="confirmarEliminacion" tabindex="-1" aria-labelledby="confirmarEliminacionLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title textogeneral neon-cielo" id="confirmarEliminacionLabel">Confirmar Eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center textogeneral neon-rojo">
                    ¿Estás seguro de que desea eliminar este usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-neon-verde textogeneral" data-bs-dismiss="modal">Cancelar</button>
                    <form action="php/eliminar-usuario.php" method="post">
                        <input type="hidden" name="eliminar_registro" value="eliminar_registro">
                        <input type="hidden" id="id_usuario_eliminar" name="id_usuario" value="">
                        <button type="submit" class="btn btn-neon-rojo textogeneral">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script type="text/javascript" charset="utf8" src=js/usuarios.js></script>
    <script>
        var openModal = <?php echo json_encode(isset($_GET['modal']) && $_GET['modal'] === 'true'); ?>;
        if (openModal) {
            $('#cambiarContrasenaModal').modal('show');
        }

        var openModal2 = <?php echo json_encode(isset($_GET['modal2']) && $_GET['modal2'] === 'true'); ?>;
        if (openModal2) {
            prepararCambioContrasena();
        }
    </script>
</body>

</html>
<?php
require_once('php/accesso-3.php');
require_once('php/connectdb.php');

$userId = $_SESSION['id_usuario']; // Reemplaza esto con el ID de usuario adecuado
$sql = "SELECT r.id_reservaciones, r.fecha_hora, r.personas, u.nombre, u.apellido
        FROM reserva r 
        INNER JOIN usuario_reserva ur ON r.id_reservaciones = ur.id_reservaciones 
        INNER JOIN usuario u ON u.id_usuario = ur.id_usuario
        WHERE ur.id_usuario = $userId
        ORDER BY r.fecha_hora DESC"; // Ordenar por fecha_hora de mayor a menor
$result = $conexion->query($sql);
$conexion->close();

$_SESSION['pagina'] = "reservaciones"
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
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link rel="stylesheet" href="css/flatpickr.min.css">
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
                                echo "<form method='post' action='recepcion.php'>
                                      <button type='submit' class='btn btn-neon-azul textogeneral neon-azul'>Recepcion</button>
                                      </form>";
                            }
                            if (isset($_SESSION['permisos']) && $_SESSION['permisos'] == 1) {
                                echo "<form method='post' action='usuarios.php'>
                                <button type='submit' class='btn btn-neon-amarillo textogeneral neon-amarillo'>Usuarios</button>
                                </form>";
                            }
                            ?>
                        </div>

                        <div class="text-center">
                            <img src="img/logo.webp" style="width: 185px;" alt="logo">
                            <h4 class="mt-1 mb-5 pb-1 textogeneral neon-rojo">LevelUp Lounge</h4>
                        </div>
                        <p class="textogeneral text-center neon-cielo">Historial de Reservas</p>

                        <button type="button" class="btn btn-neon-verde mb-3 textogeneral neon-verde" data-bs-toggle="modal" data-bs-target="#reservaModal">
                            Crear Nueva Reserva
                        </button>


                        <div class="table-responsive">

                            <table id="tabla_reservas">
                                <thead>
                                    <tr>
                                        <th class='textogeneral'>ID Reserva</th>
                                        <th class='textogeneral'>Nombre</th>
                                        <th class='textogeneral'>Fecha y Hora</th>
                                        <th class='textogeneral'>Personas</th>
                                        <th class='textogeneral'>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td class='textogeneral align-middle'>" . $row['id_reservaciones'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>" . $row['nombre'] . ' ' . $row['apellido'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>" . $row['fecha_hora'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>" . $row['personas'] . "</td>";
                                        echo "<td class='textogeneral align-middle'>";
                                        echo "<button type='button' class='btn btn-neon-rojo textogeneral mx-3' data-bs-toggle='modal' data-bs-target='#EliminacionModal2' data-reserva-id='" . $row['id_reservaciones'] . "'>Eliminar</button>";
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
        </div>
    </section>


    <!-- Modal reserva -->
    <div class="modal fade modal-oscuro text-white" id="reservaModal" tabindex="-1" aria-labelledby="reservaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title textogeneral neon-cielo" id="reservaModalLabel">Crear Nueva Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="php/guardar-reserva.php" method="post">
                        <div class="mb-3">
                            <label for="fecha_hora" class="form-label textogeneral">Fecha y Hora</label>
                            <input type="text" class="form-control" id="fecha_hora" name="fecha_hora" required>
                        </div>
                        <div class="mb-3">
                            <label for="personas" class="form-label textogeneral">Número de Personas (Máximo 12)</label>
                            <input type="number" class="form-control" id="personas" name="personas" required min="1" max="12">
                        </div>
                        <button type="submit" class="btn btn-neon-verde mb-3 textogeneral neon-verde">Guardar Reserva</button>
                    </form>
                    <p class="textogeneral text-white text-center neon-rojo">Maximo de reservas hasta 12 personas</p>
                </div>
            </div>
        </div>
    </div>


    <!---Modal Edicion Usuario----->
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

                    <a class="btn btn-neon-rojo mb-3 neon-rojo textogeneral" data-bs-toggle="modal" data-bs-target="#confirmarMiEliminarUsuario">Eliminar Cuenta</a>
                </div>
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
                            <input type="password" class="form-control" id="contrasena_actual" name="contrasena_actual" required>
                        </div>
                        <div class="mb-3">
                            <label for="nueva_contrasena" class="form-label textogeneral">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="nueva_contrasena" name="nueva_contrasena" required>
                        </div>
                        <div class="mb-3">
                            <label for="confirmar_contrasena" class="form-label textogeneral">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" id="confirmar_contrasena" name="confirmar_contrasena" required>

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
                    <h5 class="modal-title textogeneral neon-cielo" id="confirmarMiEliminarUsuarioLabel">Confirmar Eliminación de Usuario</h5>
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


    <!-- Modal de eliminacion de reserva -->

    <div class='modal fade modal-oscuro text-white' id='EliminacionModal2' tabindex='-1' aria-labelledby='EliminacionLabel2' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title textogeneral neon-cielo' id='EliminacionLabel2'>Confirmar Eliminación</h5>
                </div>
                <div class='modal-body text-center textogeneral textogeneral neon-rojo'>
                    ¿Estás seguro de que quieres eliminar esta reserva?
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-neon-verde textogeneral' data-bs-dismiss='modal'>Cancelar</button>
                    <form action="php/eliminar-reserva.php" method="post" id="eliminarReservaForm">
                        <input type="hidden" name="id_reserva" id="id_reserva_eliminar" value="">
                        <button type="submit" class="btn btn-neon-rojo textogeneral">Eliminar Reserva</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <script src="js/bootstrap.bundle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.11.5/sorting/datetime-moment.js"></script>

    <script>
        flatpickr("#fecha_hora", {
            enableTime: true,
            dateFormat: "d/m/Y H:i",
            minDate: "today",
            maxDate: new Date().fp_incr(70),
            minTime: "20:00",
            maxTime: "04:00",
            disableMobile: "false",
            time_24hr: true,
            defaultDate: [new Date().fp_incr(1) , "20:00"]
        });


        $(document).ready(function() {

            $.fn.dataTable.moment('DD/MM/YYYY HH:mm'); // Especifica el formato de fecha y hora

            $('#tabla_reservas').DataTable({
                paging: true,
                pageLength: 6,
                lengthChange: false,
                columnDefs: [{
                    orderable: false,
                    targets: 4
                }],
                order: [[3, 'asc']],
                language: {
                    "decimal": "",
                    "emptyTable": "<p class= 'textogeneral text-center texto-table'>No hay información",
                    "info": "<p class= 'textogeneral texto-table'>Mostrando _START_ a _END_ de _TOTAL_ Entradas</p>",
                    "infoEmpty": "<p class= 'textogeneral texto-table'>Mostrando 0 to 0 of 0 Entradas</p>",
                    "infoFiltered": "<p class= 'textogeneral texto-table'>(Filtrado de _MAX_ total entradas)</p>",
                    "infoPostFix": "",
                    "thousands": "<p class= 'textogeneral texto-table'></p>,",
                    "lengthMenu": "<p class= 'textogeneral texto-table'>Mostrar _MENU_ Entradas</p>",
                    "loadingRecords": "<p class= 'textogeneral text-center texto-table'>Cargando...</p>",
                    "processing": "<p class= 'textogeneral text-center texto-table'>Procesando...</p>",
                    "search": "<p class= 'textogeneral text-center texto-table'>Buscar</p>",
                    "zeroRecords": "<p class= 'textogeneral texto-table'>Sin resultados encontrados</p>",
                    "paginate": {
                        "first": "<p class= 'textogeneral texto-table'>Primero</p>",
                        "last": "<p class= 'textogeneral texto-table'>Ultimo</p>",
                        "next": "<p class= 'textogeneral texto-table'>Siguiente</p>",
                        "previous": "<p class= 'textogeneral texto-table'>Anterior</p>"
                    }
                }
            });


            var openModal = <?php echo json_encode(isset($_GET['modal']) && $_GET['modal'] === 'true'); ?>;
            if (openModal) {
                $('#cambiarContrasenaModal').modal('show');
            }
        });

        $('#EliminacionModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var reservaId = button.data('reserva-id');

            var modal = $(this);
            modal.find('#id_reserva_eliminar').val(reservaId);

            modal.find('.btn-neon-rojo').on('click', function() {
                var formData = {
                    id_reserva: reservaId
                };

                $.ajax({
                    type: 'POST',
                    url: 'php/eliminar-reserva.php',
                    data: formData,
                    success: function(response) {
                        $('#EliminacionModal2').modal('hide');
                        window.location.href = 'reservaciones.php';


                    },
                    error: function(error) {
                        window.location.href = 'reservaciones.php?error=1';

                    }
                });
                return false;
            });
        });
    </script>

</body>

</html>
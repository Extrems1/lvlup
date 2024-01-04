$(document).ready(function() {
    var editarModal = new bootstrap.Modal(document.getElementById('editarUsuarioModal'));

    var tabla = $('#tabla_usuarios').DataTable({
        paging: true,
        pageLength: 6,
        lengthChange: false,
        columnDefs: [{
            orderable: false,
            targets: 6
        }],
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


    function abrirModalEdicion(usuarioId, nombre, apellido, correo, permisos, telefono) {
        var hiddenInput = document.getElementById("id_usuario");
        var nombreInput = document.getElementById("nombre_editar");
        var apellidoInput = document.getElementById("apellido_editar");
        var correoInput = document.getElementById("correo_editar");
        var permisosInput = document.getElementById("permisos_editar");
        var telefonoInput = document.getElementById("telefono_editar");

        hiddenInput.value = usuarioId;
        nombreInput.value = nombre;
        apellidoInput.value = apellido;
        correoInput.value = correo;
        permisosInput.value = permisos;
        telefonoInput.value = telefono;

        editarModal.show();
    }

    $("[data-bs-target='#editarUsuarioModal']").on('click', function() {
        var usuarioId = $(this).data('usuario-id');
        var nombre = $(this).closest('tr').find('td:eq(1)').text();
        var apellido = $(this).closest('tr').find('td:eq(2)').text();
        var correo = $(this).closest('tr').find('td:eq(3)').text();
        var permisos = $(this).closest('tr').find('td:eq(4)').text();
        var telefono = $(this).closest('tr').find('td:eq(5)').text();

        abrirModalEdicion(usuarioId, nombre, apellido, correo, permisos, telefono);
    });

    tabla.on('draw.dt', function() {
        $("[data-bs-target='#editarUsuarioModal']").on('click', function() {
            var usuarioId = $(this).data('usuario-id');
            var nombre = $(this).closest('tr').find('td:eq(1)').text();
            var apellido = $(this).closest('tr').find('td:eq(2)').text();
            var correo = $(this).closest('tr').find('td:eq(3)').text();
            var permisos = $(this).closest('tr').find('td:eq(4)').text();
            var telefono = $(this).closest('tr').find('td:eq(5)').text();

            abrirModalEdicion(usuarioId, nombre, apellido, correo, permisos, telefono);
        });
    });

    $('#confirmarEliminacion').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var usuarioId = button.data('usuario-id');

        var modal = $(this);
        modal.find('#id_usuario_eliminar').val(usuarioId);

        modal.find('.btn-neon-rojo').on('click', function() {
            window.location.href = 'php/eliminar-usuario.php';
        });
    });
});

function prepararCambioContrasena() {

    var idUsuario = document.getElementById('id_usuario').value;

    document.getElementById('id_usuario_cambio').value = idUsuario;
    $('#editarUsuarioModal').modal('hide');
    $('#usuarioContrasenaModal').modal('show');
}
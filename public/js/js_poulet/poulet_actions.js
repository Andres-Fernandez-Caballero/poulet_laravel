$(document).ready(function () {
    bsCustomFileInput.init()
});

//metodo para incrustar la ruta para eliminar una receta
$(document).ready(function () {
    $('#modalConfirmDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var form = button.data('form');
        var mensaje = button.data('msj');

        $(this).find('form').attr('action',form);
        $(this).find('p').text(mensaje);
    })
});

$(document).ready(function () {
    $('#modalCambiarRol').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var form = button.data('form');
        var rol = button.data('rol');
        var busqueda = "option[value=" + rol + "]"

        $(this).find('form').attr('action',form);
        $(this).find(busqueda).attr('selected', 'selected');

    })
});

$(document).ready(function () {
    $('#modalCambiarEstado').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var form = button.data('form');
        var estado = button.data('estado');
        var busqueda = "option[value=" + estado + "]";

        $(this).find('form').attr('action',form);
        $(this).find(busqueda).attr('selected', 'selected');

    })
});

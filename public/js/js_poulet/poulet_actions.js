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

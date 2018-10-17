$(document).ready(function () {
    var path = 'http://localhost/access_motos/';

    $('#nome').blur(function () {
        $.get(path + 'ajax_usuarios/verNome', {nome: $('#nome').val()},
                function (data) {
                    if (data) {
                        $('#textoNome').html(data);
                        $('#nome').focus();
                    } else {
                        $('#textoNome').html('');
                    }
                });
    });
});

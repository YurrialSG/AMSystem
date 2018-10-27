$(document).ready(function () {
    var path = 'http://localhost/revenda_manha_admin/';

    $('#marca').change(function () {
        $.get(path + 'ajax3/verMarca', {marca: $('#marca').val()},
                function (data) {
                    if (data) {
                        $('#validaMarca').html('OK');
                        $('#cidadeMarca').val(data);
                    } else {
                        $('#validaMarca').html('Não foi encontrada a cidade.');
                    }
                });
    });
});
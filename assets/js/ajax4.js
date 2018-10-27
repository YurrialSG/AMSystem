$(document).ready(function () {
    var path = 'http://localhost/revenda_manha_admin/';
    
    $('#nome').blur(function () {
        $.get(path + 'ajax4/verMarca', {marca: $('#nome').val()},
                function (data) {
                    if (data) {
                        $('#validaNome').html(data);
                        $('#nome').focus();
                    } else {
                        $('#validaNome').html('');
                    }
                });
    });
    
});
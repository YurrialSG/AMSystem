$(document).ready(function () {
    var path = 'http://localhost/revenda_manha_admin/';

    $('#nome').blur(function () {
//        alert('Olá');
//        $('#email').val('ana@gmail.com');
//        alert('Olá ' + $('#nome').val());
//        $.get(path + 'ajax2/ola', function (data, status) {
//            alert('Data: ' + data + ' Status: ' + status);
//        });
        $.get(path + 'ajax2/verNome', {nome: $('#nome').val()},
                function (data) {
                    if (data) {
                        $('#validaNome').html(data);
                        $('#nome').focus();
                    } else {
                        $('#validaNome').html('');
                    }
                });
    });

    $('#email').blur(function () {
        $.get(path + 'ajax2/verEmail', {email: $('#email').val()},
                function (data) {
                    if (data) {
                        $('#validaEmail').html(data);
                    } else {
                        $('#validaEmail').html('');
                    }
                });
    });

    $('#cep').blur(function () {
        $.ajax({
            url: 'http://cep.republicavirtual.com.br/web_cep.php?cep=' + $('#cep').val() + '&formato=json',
            dataType: 'json',
            success: function (data) {
                $('#endereco').val(data.tipo_logradouro + ' ' + data.logradouro);
                $("#cidade").val(data.cidade);
                $("#bairro").val(data.bairro);
                $("#estado").val(data.uf);

                $("#numero").focus();
            }
        });
    });

});
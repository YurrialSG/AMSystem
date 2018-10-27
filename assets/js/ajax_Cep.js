$(document).ready(function () {
    /* executa a requisiçao quando o compo CEP perder o foco */

    /*blur: sera realizada a funçao quando o 'cep' perder o foco*/
    $("#cep").blur(function () {
        /*configuracao de requisiçao do AJAX*/
        $.ajax({
            url: 'http://localhost/AMSystem/ajax/buscaCep',
//            url: 'ajax/buscaCep',
            type: 'POST',
            data: 'cep=' + $("#cep").val(),
            dataType: 'json',
            success: function (data) {
                if (data.sucesso == 1) {
                    $("#logradouro").val(data.rua);
                    $("#bairro").val(data.bairro);
                    $("#cidade").val(data.cidade);
                    $("#estado").val(data.estado);

                    $("#numero").focus();
                }
            }
        });
        return false;
    });
});



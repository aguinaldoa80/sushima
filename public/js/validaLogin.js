$(document).ready(function () {
    validateForm();
});

function validateForm() {
    $('#btnLogin').on('click touchstart', function () {
        var form = document.getElementById('formLogin');
        $.ajax({
            type: 'POST',
            url: '/validalogin',
            data: {
                acao: 'login',
                login: form.name.value,
                senha: form.senha.value
            },
            success: function (data) {

            },
            beforeSend: function () {

            },
            complete: function () {

            },
            error: function (evento, request, settings) {
                alert(settings);
            }
        }).done(function (data) {
            if (data.toString() == 'errologin') {
                $("#errologin").addClass("has-error");
                $('#retorno').html("E-mail ou senha incorreto");

                console.log(data.toString());
            } else {
                $("#errologin").removeClass("has-error");
                $('#retorno').html("");
                window.location.assign(data.toString());
            }
        });
    });
}
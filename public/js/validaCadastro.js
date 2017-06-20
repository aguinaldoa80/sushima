$(document).ready(function () {

    submitForm();
    makeMask();
    clearErrorsOnLostFocus();
//    $('.selectpicker').selectpicker();

//     $('#telefone').mask('(000) 0 0000-0000', {clearIfNotMatch: true});

});
var makeMask = function () {
    $('#nome').mask('S', {
        'translation': {S: {pattern: /[a-zA-Zà-úÀ-Ú ]/, recursive: true, maxlength: true}
        }
        , onKeyPress: function (value, event) {
            event.currentTarget.value = value.toUpperCase();
            if (event.currentTarget.value.length >= 10) {
                $("#verifynome").removeClass("has-error");
                $("#erronome").html("");
//                 $("#verifynome").addClass("has-success");
            }
//            $("#verifynome").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw'></i><span class='sr-only'>Loading...</span>");
        }
    });
    $("#documento").mask('000.000.000-00', {clearIfNotMatch: true});
    makeDocumento;
    $('#cidade').mask('S', {
        'translation': {S: {pattern: /[a-zA-Zà-úÀ-Ú ]/, recursive: true, maxlength: true}
        }
        , onKeyPress: function (value, event) {
            event.currentTarget.value = value.toUpperCase();
            if (event.currentTarget.value.length >= 10) {
                $("#verifycidade").removeClass("has-error");
                $("#errocidade").html("");
            }
//            $("#verifynome").html("<i class='fa fa-spinner fa-spin fa-2x fa-fw'></i><span class='sr-only'>Loading...</span>");
        }
    });
    $('#cep').mask('00.000-000', {clearIfNotMatch: true});
    $('#telefone').mask('(000) 0 0000-0000', {clearIfNotMatch: true});
};
var makeDocumento = $("#selectDocumento").on('click touchstart', function () {
    $("#documento").val("");
    if ($(this).val() == 'cpf') {
        $("#documento").mask('000.000.000-00', {clearIfNotMatch: true});
    } else {
        $("#documento").mask('00.000.000/0000-00', {clearIfNotMatch: true});
    }
});
var submitForm = function () {
    $('#btnCadastrar').on('click touchstart', function (e) {
        e.preventDefault();
        var nome = $("#nome").val().trim();
        var email = $("#email").val().trim();
        var selectDocumento = $("#selectDocumento");
        var documento = $("#documento").val().trim();
        var endereco = $("#endereco").val().trim();
        var cidade = $("#cidade").val().trim();
        var estado = $("#idestados").val();
        var cep = $("#cep").val();
        var telefone = $("#telefone").val();
        var senha = $("#senha").val().trim();
        var resenha = $("#resenha").val().trim();
        $.ajax({
            type: "POST",
            url: "/manageusers",
            data: {
                option: "insertUser",
                nome: nome,
                email: email,
                documento: documento,
                endereco: endereco,
                cidade: cidade,
                estado: estado,
                cep: cep,
                telefone: telefone,
                senha: senha,
                resenha: resenha
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
        }).done(function (info) {
            if (info) {
                var jinfo = JSON.parse(info);
                validateForm(jinfo);
                if (jinfo.goTo) {
                    window.location.assign(jinfo.goTo);
                }
            }
        });
    });
}

var clearErrorsOnLostFocus = function () {
    $("#documento1").blur(function () {
        if (validaDocumento($("#documento").val())) {
            $("#verifydocumento").removeClass("has-error");
            $("#errodocumento").html("");
//            $("#load").html("<i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i><span class=''>Loading...</span>");
//            $("#load2").addClass("fa-check fa-2x"); 
        } else {
//            $("#load2").removeClass("fa-check fa-2x"); 
            $("#verifydocumento").addClass("has-error");
            $("#errodocumento").html("Documento inválido");
            $("#documento").focus();
        }
//        $("#load").html("");
    });
    $("#cep").blur(function () {
        if ($("#cep").val().trim().length >= 8) {
            $("#verifycep").removeClass("has-error");
            $("#errocep").html("");
        } else {
        }
    });
    $("#endereco").blur(function () {
        if ($("#endereco").val().trim().length >= 10 && $("#endereco").val().trim().length <= 100) {
            $("#verifyendereco").removeClass("has-error");
            $("#erroendereco").html("");
        } else {
        }
    });
}
function validateForm(msg) {

    if (!msg.nome) {
        $("#verifynome").removeClass("has-error");
        $("#erronome").html("");
    } else {
        $("#verifynome").addClass("has-error");
        $("#erronome").html(msg.nome.toString());
        $("#nome").focus();
        return;
    }
    if (!msg.email) {
        $("#verifyemail").removeClass("has-error");
        $("#erroemail").html("");
    } else {
        $("#verifyemail").addClass("has-error");
        $("#erroemail").html(msg.email.toString());
        $("#email").focus();
        return;
    }
    if (!msg.documento) {
        $("#verifydocumento").removeClass("has-error");
        $("#errodocumento").html("");
    } else {
        $("#verifydocumento").addClass("has-error");
        $("#errodocumento").html(msg.documento);
        $("#documento").focus();
        return;
    }
    if (!msg.endereco) {
        $("#verifyendereco").removeClass("has-error");
        $("#erroendereco").html("");
    } else {
        $("#verifyendereco").addClass("has-error");
        $("#erroendereco").html(msg.endereco);
        $("#endereco").focus();
        return;
    }
    if (!msg.cidade) {
        $("#verifycidade").removeClass("has-error");
        $("#errocidade").html("");
    } else {
        $("#verifycidade").addClass("has-error");
        $("#errocidade").html(msg.cidade);
        $("#cidade").focus();
        return;
    }
    if (!msg.estado) {
        $("#verifyestado").removeClass("has-error");
        $("#erroestado").html("");
    } else {
        $("#verifyestado").addClass("has-error");
        $("#erroestado").html(msg.estado);
        $("#idestados").focus();
        return;
    }
    if (!msg.cep) {
        $("#verifycep").removeClass("has-error");
        $("#errocep").html("");
    } else {
        $("#verifycep").addClass("has-error");
        $("#errocep").html(msg.cep);
        $("#cep").focus();
        return;
    }
    if (!msg.telefone) {
        $("#verifytelefone").removeClass("has-error");
        $("#errotelefone").html("");
    } else {
        $("#verifytelefone").addClass("has-error");
        $("#errotelefone").html(msg.telefone);
        $("#telefone").focus();
        return;
    }
    if (!msg.senha) {
        $("#verifysenha").removeClass("has-error");
        $("#errosenha").html("");
    } else {
        $("#verifysenha").addClass("has-error");
        $("#errosenha").html(msg.senha);
        $("#senha").focus();
        return;
    }
}

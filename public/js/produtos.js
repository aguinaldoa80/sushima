$('#preco').mask('0.000,00', {reverse: true});
//        $("#marca").mask('A#',{placeholder: "__/__/____"});
$("#produto").keyup(function () {
    var valor = $("#produto").val().replace(/[^a-zA-Z 0-9 /-]+/g, '');
    $("#produto").val(valor);
});
$("#descricao").keyup(function () {
    var valor = $("#descricao").val().replace(/[^a-zA-Z 0-9 /-]+/g, '');
    $("#descricao").val(valor);
});
$("#btnRemoveImagem").on('click touchstart', function () {
    $("#imagemproduto").attr("src","");
});
function readUrlFromImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imagemproduto')
                    .attr('src', e.target.result)
                    .width(200)
                    .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
    console.log($("#path").val());
}

$('#btnCadastrar').on('click touchstart', function (e) {
    e.preventDefault();
    var ident = $("#id").val();
    var prod = $("#produto").val();
    var desc = $("#descricao").val();
    var valor = $("#preco").val();
    var foto = $("#imagemproduto").attr("src");
    $.ajax({
        type: 'POST',
        url: '/admin/manageProdutos',
        data: {
            option: 'saveProduto',
            produto: prod,
            descricao: desc,
            preco: valor,
            imagem: foto,
            id: ident
        },
        success: function (data) {
//           console.log(data);
        }
    }).done(function (info) {
        if (info) {
            var jinfo = JSON.parse(info);
            showMessage(jinfo);
            if (jinfo.goTo) {
                window.location.assign(jinfo.goTo);
            }
        }
    });

});

function showMessage(msg) {

    if (!msg.produto) {
        $("#verifyProduto").removeClass("has-error");
        $("#erroproduto").html("");
    } else {
        $("#verifyProduto").addClass("has-error");
        $("#erroproduto").html(msg.produto.toString());
        $("#produto").focus();
        return;
    }
    if (!msg.preco) {
        $("#verifyPreco").removeClass("has-error");
        $("#erropreco").html("");
    } else {
        $("#verifyPreco").addClass("has-error");
        $("#erropreco").html(msg.preco.toString());
        $("#preco").focus();
        return;
    }
    if (!msg.imagem) {
        $("#verifyImagem").removeClass("has-error");
        $("#erroimagem").html("");
    } else {
        $("#verifyImagem").addClass("has-error");
        $("#erroimagem").html(msg.imagem.toString());
        $("#path").focus();
        return;
    }
    if (msg.resposta == 'sucesso') {
        $(".sucesso").html("<strong>Sucesso! Produto inserido com sucesso.</strong> ").css({"color": '#379911'});
        $(".sucesso").fadeOut(5000, function () {
            $(this).html("");
            $(this).fadeIn(3000);
        });
        limpaTexto();
        return;
    }
    if (msg.naoinseriu) {
        $(".sucesso").html("<strong>Erro!</strong> Contate o administrador do sistema.").css({"color": '#ddb11d'});
        $(".sucesso").fadeOut(5000, function () {
            $(this).html("");
            $(this).fadeIn(3000);
        });
        return;
    }

}
function limpaTexto() {
    $("#id").val("");
    $("#produto").val("");
    $("#descricao").val("");
    $("#preco").val("");
    $("#imagemproduto").attr("src", "");
    $("#produto").focus();
}

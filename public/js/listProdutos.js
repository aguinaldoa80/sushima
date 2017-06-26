$(document).ready(function () {
    refreshTable();
});

function refreshTable() {


    $.ajax({
        type: 'POST',
        url: '/admin/manageProdutos',
        data: {
            option: "buscaProdutos",
        },
        success: function (data) {
            var inf = JSON.parse(data);
            if (inf) {
                fillTable(inf);
            }
//            console.log(inf);
        }
    }).done(function (info) {
        if (info) {
            var jinfo = JSON.parse(info);
            showMessage(jinfo);
        }
    });

}
function fillTable(row) {
    for (var i in row) {
        var status;
        if(row[i].ativo == '1'){
            status = "<i class='fa fa-2x fa-check' style='color: green;'></i>";
        }else{
            status = "<i class='fa fa-2x fa-close' style='color: red;'></i>";
        }
        $("#conteudo").append("<tr><td style='width: 90px'><img class='img img-resopnsive'"+
         " style='height: 72px; width: 72px' src='"+row[i].imagem+"'</img></td><td style='vertical-align: middle;'>"+row[i].produto+
         "</td><td style='vertical-align: middle;'>"+row[i].descricao+"</td><td style='vertical-align: middle;'>"+row[i].preco+"</td><td style='vertical-align: middle;' class='text-center'>"+status+"</td><td style='vertical-align: middle;'>"+
         "<a id='btnEdit' class='btn btn-primary fa fa-pencil' href='/admin/produtos/"+row[i].id+"'>"+
        "</a> <button id='btnRemove' class='btn btn-danger fa fa-trash'></button></td></tr>");
    }
}
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
    $("#produto").val("");
    $("#descricao").val("");
    $("#preco").val("");
    $("#imagemproduto").attr("src", "");
    $("#produto").focus();
}

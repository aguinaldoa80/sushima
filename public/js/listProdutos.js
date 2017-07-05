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
$("#pesquisa").on('keyup', function (e) {
    if (e.keyCode === 27 || e.keyCode === 13){
        $("#pesquisa").val("");
        refreshTable();
    } 
        
})
function search(texto) {
    if (texto.length < 1) {
        return;
    }
    var str = "'%" + texto.toUpperCase() + "%'";
    $.ajax({
        type: 'POST',
        url: '/admin/manageProdutos',
        data: {
            option: "buscaProdutosByTexto",
            palavra: str
        },
        success: function (data) {
            try {
                var inf = JSON.parse(data);
//            console.log(inf);
                if (inf) {
                    fillTable(inf);
                }
            } catch (err) {
                alert("Nenhum registro encontrado com o texto " + texto);
                $("#pesquisa").val("");
                refreshTable();
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
    $("#conteudo").html("");
    for (var i in row) {
        var status;
        var classEnable;
        if (row[i].ativo == '1') {
            status = "<i class='fa fa-2x fa-check' style='color: green;'></i>";
            classEnable = 'btn btn-danger fa fa-trash';
        } else {
            status = "<i class='fa fa-2x fa-close' style='color: red;'></i>";
            classEnable = 'btn btn-success fa fa-check';
        }
        if (row[i].descricao == null) {
            row[i].descricao = "";
        }
        if (row[i].imagem == null) {
            row[i].imagem = "";
        }
        $("#conteudo").append("<tr><td style='width: 90px'><img class='img img-resopnsive'" +
                " style='height: 72px; width: 72px' src='" + row[i].imagem + "'</img></td><td style='vertical-align: middle;'>" + row[i].produto +
                "</td><td style='vertical-align: middle;'>" + row[i].descricao + "</td><td style='vertical-align: middle;'>" + row[i].preco + "</td><td style='vertical-align: middle;' class='text-center'>" + status + "</td><td style='vertical-align: middle;'>" +
                "<a id='btnEdit' class='btn btn-primary fa fa-pencil' href='/admin/produtos/" + row[i].id + "'>" +
                "</a> <button id='btnRemove' onclick='enableProduto(" + row[i].id + "," + row[i].ativo + ")' class='" + classEnable + "'></button></td></tr>");
        if (row.length > 0) {
            $("#detalhes").html("Total de: " + row.length + " registro(s).");
        } else {
            $("#detalhes").html("Nenhum registor encontrado.");
        }
    }
}

function enableProduto(id, ativo) {
    $.ajax({
        type: 'POST',
        url: '/admin/manageProdutos',
        data: {
            option: 'enableProduto',
            id: id,
            ativo: ativo
        },
        success: function (data) {
            refreshTable();
        },
        beforeSend: function () {

        },
        complete: function () {

        },
        error: function (evento, request, settings) {
            alert(settings);
        }
    }).done(function (data) {

    });
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

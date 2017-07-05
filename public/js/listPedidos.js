$(document).ready(function () {
    refreshTable();
    setInterval(function () {
        refreshTable();
    }, 5000);
    
});
var totPedidos = 0;
function playAlert(){
    var audio = new Audio('/sons/Buzina_001.mp3');
    audio.play();
}

function refreshTable() {
    $.ajax({
        type: 'POST',
        url: '/admin/managePedidos',
        data: {
            option: "buscaPedidos",
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
            //showMessage(jinfo);
        }
    });

}
$("#pesquisa").on('keyup', function (e) {
    if (e.keyCode === 27 || e.keyCode === 13) {
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
function getSize(table) {
    var x = 0;
    for (var i in table) {
        x = x + 1;
    }
    return x;
}

function fillTable(row) {
    if (getSize(row) === totPedidos) {
        console.log("é igual");
        return;
    }
    playAlert();
    console.log("não é igual");
    totPedidos = getSize(row);
    $("#conteudo").html("");
    var totalGeral = 0.00;
    for (var i in row) {
        var total = 0.00;
        $("#conteudo").append("<tr><td colspan='5' class='text-center label-success fa-lg'><strong>" + row[i][0].nome + " End: " + row[i][0].endereco + " Tel: " + row[i][0].telefone + " E-Mail: " + row[i][0].email + " Forma de pagamento: " + row[i][0].formapgto + " Data/Hora: " + row[i][0].create_at + "</strong></td></tr>");
        for (var j in row[i][1]) {
            var subtotal = row[i][1][j].qtde * row[i][1][j].preco;
            $("#conteudo").append("<tr><td>" + row[i][1][j].produtoid + "</td><td>" + row[i][1][j].produto + "</td><td>" + row[i][1][j].qtde + "</td><td>R$ " + row[i][1][j].preco + "</td><td>R$ " + subtotal + "</td></tr>");
            total += subtotal;
            totalGeral += total;
        }
        $("#conteudo").append("<tr><td colspan='5' class='text-right label-default fa-lg'><strong>Total R$ " + total + "</strong></td></tr>");
        $("#conteudo").append("<tr><td colspan='5'><br> </td></tr>");
        if (row.length > 0) {
            $("#detalhes").html("Total de: " + row.length + " registro(s)." + "<span style='float:right'><strong class='fa-lg label label-primary'> Total Geral: R$ " + totalGeral + "</strong></span>");
        } else {
            $("#detalhes").html("Nenhum registro encontrado.");
        }
    }
}

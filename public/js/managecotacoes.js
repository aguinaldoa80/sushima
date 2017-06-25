$(document).ready(function () {
    $("#qtde").mask('000.000', {reverse: true});
//        $("#marca").mask('A#',{placeholder: "__/__/____"});
    $("#marca").keyup(function () {
        var valor = $("#marca").val().replace(/[^a-zA-Z 0-9]+/g, '');
        $("#marca").val(valor);
    });
    $("#produto").keyup(function () {
        var valor = $("#produto").val().replace(/[^a-zA-Z 0-9 /-]+/g, '');
        $("#produto").val(valor);
    });
    $("#codbarra").mask('0#',{maxlength: true});
//    $("#codbarra").keyup(function () {
//        var valor = $("#codbarra").val().replace(/[^ 0-9 ]+/g, '');
//        $("#codbarra").val(valor);
//    });
    $("#btnCadastrar").on('click touchstart', function () {
        showFormCadastro();
    });
    $("#btnCancelar").on('click touchstart', function () {
        showFormTable();
    });
});
function showFormCadastro() {
    $("#quadro1").slideDown("slow");
    $("#quadro2").slideUp("slow");
}
function showFormTable() {
    $("#quadro2").slideDown("slow");
    $("#quadro1").slideUp("slow");
}
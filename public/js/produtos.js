$('#preco').mask('0.000,00', {reverse: true});
//        $("#marca").mask('A#',{placeholder: "__/__/____"});
$("#produto").keyup(function () {
    var valor = $("#produto").val().replace(/[^a-zA-Z 0-9 /-]+/g, '');
    $("#produto").val(valor);
});
$("#descricao").keyup(function () {
    var valor = $("#descricao").val().replace(/[^a-zA-Z 0-9 /- ()]+/g, '');
    $("#descricao").val(valor);
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
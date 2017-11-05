var $prepararFrases = $("#prepararFrases");

$prepararFrases.on("click", prepararFrases);

function prepararFrases() {
    var $campoIngles = $("#campoIngles");
    var $campoPortugues = $("#campoPortugues");

    var textoIngles = $campoIngles.val();
    var textoPortugues = $campoPortugues.val();

    var arrFrasesIngles = separaFrases(textoIngles);
    var arrFrasesPortugues = separaFrases(textoPortugues);



    var $frasesIngles = $("#frasesIngles");
    $frasesIngles.val("");

    if (arrFrasesIngles.length > 0) {
        for (var i = 0; i < arrFrasesIngles.length; i++) {
            $frasesIngles.val($frasesIngles.val() + arrFrasesIngles[i] + "\n\n");
        }
    }

    var $frasesPortugues = $("#frasesPortugues");
    $frasesPortugues.val("");

    if (arrFrasesPortugues.length > 0) {
        for (var i = 0; i < arrFrasesPortugues.length; i++) {
            $frasesPortugues.val($frasesPortugues.val() + arrFrasesPortugues[i] + "\n\n");
        }
    }
}

function separaFrases(texto) {
    var arrTexto = [];
    var arrTextoSemQuebraLinha = separaFrasesPor("\n", texto);
    arrTextoSemQuebraLinha.forEach(function(textoSemQuebraLinha){
        var arrTextoSemPonto = separaFrasesPor(".", textoSemQuebraLinha);
        arrTextoSemPonto.forEach(function(textoSemPonto){
            var arrTextoSemVirgula = separaFrasesPor(",", textoSemPonto);
            arrTextoSemVirgula.forEach(function(textoSemVirgula){
                var arrTextoSemPontoVirgula = separaFrasesPor(";", textoSemVirgula);
                arrTexto = arrTexto.concat(arrTextoSemPontoVirgula);
            });
        });
    });
    return arrTexto;
}

function separaFrasesPor(split, texto) {
    var arrTexto = [];
    var spTexto = texto.split(split);
    for (var i = 0; i < spTexto.length; i++) {
        spTexto[i] = spTexto[i].trim().toLowerCase();
        if (spTexto[i].length > 0)
            arrTexto.push(spTexto[i]);
    }
    return arrTexto;
}

$("#campoIngles").on('wheel', function(event) {
    $("#campoPortugues").scrollTop($("#campoIngles").scrollTop() + 100);
});

$("#campoPortugues").on('wheel', function(event) {
    $("#campoIngles").scrollTop($("#campoPortugues").scrollTop() + 100);
});

$("#frasesIngles").on('wheel', function(event) {
    $("#frasesPortugues").scrollTop($("#frasesIngles").scrollTop() + 100);
});

$("#frasesPortugues").on('wheel', function(event) {
    $("#frasesIngles").scrollTop($("#frasesPortugues").scrollTop() + 100);
});

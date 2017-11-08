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

        textoSemQuebraLinha = textoSemQuebraLinha.replace('.', '[ponto].');

        var arrTextoSemPonto = separaFrasesPor(".", textoSemQuebraLinha);

            arrTextoSemPonto.forEach(function(textoSemPonto, i){
                arrTextoSemPonto[i] = textoSemPonto.replace('[ponto]', '.');
            });

        arrTextoSemPonto.forEach(function(textoSemPonto){

            textoSemPonto = textoSemPonto.replace(',', '[virgula],');

            var arrTextoSemVirgula = separaFrasesPor(",", textoSemPonto);

                arrTextoSemVirgula.forEach(function(textoSemVirgula, i){
                    arrTextoSemVirgula[i] = textoSemVirgula.replace('[virgula]', ',');
                });

            arrTextoSemVirgula.forEach(function(textoSemVirgula){

                textoSemVirgula = textoSemVirgula.replace(';', '[pontovirgula];');

                var arrTextoSemPontoVirgula = separaFrasesPor(";", textoSemVirgula);

                    arrTextoSemPontoVirgula.forEach(function(textoSemPontoVirgula, i){
                        arrTextoSemPontoVirgula[i] = textoSemPontoVirgula.replace('[pontovirgula]', ';');
                    });

                arrTextoSemPontoVirgula.forEach(function(textoSemPontoVirgula){

                    textoSemPontoVirgula = textoSemPontoVirgula.replace('?', '[interrogacao]?');

                    var arrTextoSemInterrogacao = separaFrasesPor("?", textoSemPontoVirgula);

                        arrTextoSemInterrogacao.forEach(function(textoSemInterrogacao, i){
                            arrTextoSemInterrogacao[i] = textoSemInterrogacao.replace('[interrogacao]', '?');
                        });

                    arrTexto = arrTexto.concat(arrTextoSemInterrogacao);
                });
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

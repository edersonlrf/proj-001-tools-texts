function prepararFrases() {
    var $campoIngles = $("#campoIngles");
    var $campoPortugues = $("#campoPortugues");

    var textoIngles = $campoIngles.val();
    var textoPortugues = $campoPortugues.val();

    var arrFrasesIngles = separarFrases(textoIngles);
    var arrFrasesPortugues = separarFrases(textoPortugues);

    var $frasesIngles = $("#frasesIngles");
    $frasesIngles.val("");

    if (arrFrasesIngles.length > 0) {
        for (var i = 0; i < arrFrasesIngles.length; i++) {
            $frasesIngles.val(
                $frasesIngles.val()
                + arrFrasesIngles[i]
                + "\n\n"
            );
        }
    }

    var $frasesPortugues = $("#frasesPortugues");
    $frasesPortugues.val("");

    if (arrFrasesPortugues.length > 0) {
        for (var i = 0; i < arrFrasesPortugues.length; i++) {
            $frasesPortugues.val(
                $frasesPortugues.val()
                + arrFrasesPortugues[i]
                + "\n\n"
            );
        }
    }
}

function separarFrases(texto) {
    var arrTexto = [];

    var arrTextoSemQuebraLinha = separarFrasesPor("\n", texto);

    arrTextoSemQuebraLinha.forEach(function(textoSemQuebraLinha){

        textoSemQuebraLinha = textoSemQuebraLinha.replace('.', '.[ponto]');

        var arrTextoSemPonto = separarFrasesPor('[ponto]', textoSemQuebraLinha);

            /*arrTextoSemPonto.forEach(function(textoSemPonto, i){
                arrTextoSemPonto[i] = textoSemPonto.replace('[ponto]', '.');
            });*/

        arrTextoSemPonto.forEach(function(textoSemPonto){

            textoSemPonto = textoSemPonto.replace(',', ',[virgula]');

            var arrTextoSemVirgula = separarFrasesPor('[virgula]', textoSemPonto);

                /*arrTextoSemVirgula.forEach(function(textoSemVirgula, i){
                    arrTextoSemVirgula[i] = textoSemVirgula.replace('[virgula]', ',');
                });*/

            arrTextoSemVirgula.forEach(function(textoSemVirgula){

                textoSemVirgula = textoSemVirgula.replace(';', ';[pontovirgula]');

                var arrTextoSemPontoVirgula = separarFrasesPor('[pontovirgula]', textoSemVirgula);

                    /*arrTextoSemPontoVirgula.forEach(function(textoSemPontoVirgula, i){
                        arrTextoSemPontoVirgula[i] = textoSemPontoVirgula.replace('[pontovirgula]', ';');
                    });*/

                arrTextoSemPontoVirgula.forEach(function(textoSemPontoVirgula){

                    textoSemPontoVirgula = textoSemPontoVirgula.replace('?', '?[interrogacao]');

                    var arrTextoSemInterrogacao = separarFrasesPor('[interrogacao]', textoSemPontoVirgula);

                        /*arrTextoSemInterrogacao.forEach(function(textoSemInterrogacao, i){
                            arrTextoSemInterrogacao[i] = textoSemInterrogacao.replace('[interrogacao]', '?');
                        });*/

                    arrTexto = arrTexto.concat(arrTextoSemInterrogacao);
                });
            });
        });
    });

    return arrTexto;
}

function separarFrasesPor(split, texto) {
    var arrTexto = [];
    var spTexto = texto.split(split);
    for (var i = 0; i < spTexto.length; i++) {
        // spTexto[i] = spTexto[i].trim().toLowerCase();
        spTexto[i] = spTexto[i].trim();
        if (spTexto[i].length > 0)
            arrTexto.push(spTexto[i]);
    }
    return arrTexto;
}

$("#prepararFrases").on('click', prepararFrases);

$("#campoIngles").on('wheel', function(event) {
    setTimeout(function(){$("#campoPortugues").scrollTop((parseInt($("#campoIngles").scrollTop())));},500);
});

$("#campoPortugues").on('wheel', function(event) {
    setTimeout(function(){$("#campoIngles").scrollTop((parseInt($("#campoPortugues").scrollTop())));},500);
});

$("#frasesIngles").on('wheel', function(event) {
    setTimeout(function(){$("#frasesPortugues").scrollTop((parseInt($("#frasesIngles").scrollTop())));},500);
});

$("#frasesPortugues").on('wheel', function(event) {
    setTimeout(function(){$("#frasesIngles").scrollTop((parseInt($("#frasesPortugues").scrollTop())));},500);
});

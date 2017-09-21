var $preparaFrases = $("#preparaFrases");

$preparaFrases.on("click", preparaFrases);

function preparaFrases() {
    var $campoIngles = $("#campoIngles");
    var $campoPortugues = $("#campoPortugues");

    var textoIngles = $campoIngles.val();
    var textoPortugues = $campoPortugues.val();

    var $frases = $("#frases");
    $frases.html("");

    arrFrasesIngles = separaFrases(textoIngles);
    arrFrasesPortugues = separaFrases(textoPortugues);

    for (var i = 0; i < arrFrasesIngles.length || i < arrFrasesPortugues.length; i++) {
        $frases.append(montaRow(arrFrasesIngles[i], arrFrasesPortugues[i]));
    }
}

function separaFrases(texto) {
    var arrTexto = []
    arrTextoSemQuebraLinha = separaFrasesPorQuebraLinha(texto);
    arrTextoSemQuebraLinha.forEach(function(textoSemQuebraLinha){
        arrTextoSemPonto = separaFrasesPorPonto(textoSemQuebraLinha);
        arrTextoSemPonto.forEach(function(textoSemPonto){
            arrTextoSemVirgula = separaFrasesPorVirgula(textoSemPonto);
            arrTexto = arrTexto.concat(arrTextoSemVirgula);
        });
    });
    return arrTexto;
}

function separaFrasesPorQuebraLinha(texto) {
    arrTexto = texto.split("\n");
    for (var i = 0; i < arrTexto.length; i++) {
        arrTexto[i] = arrTexto[i].trim().toLowerCase();
        if (arrTexto[i].length == 0)
            arrTexto.splice(i);
    }
    return arrTexto;
}

function separaFrasesPorPonto(texto) {
    arrTexto = texto.split(".");
    for(var i = 0; i < arrTexto.length; i++) {
        arrTexto[i] = arrTexto[i].trim().toLowerCase();
        if (arrTexto[i].length == 0)
            arrTexto.splice(i);
    };
    return arrTexto;
}

function separaFrasesPorVirgula(texto) {
    arrTexto = texto.split(",");
    for(var i = 0; i < arrTexto.length; i++) {
        arrTexto[i] = arrTexto[i].trim().toLowerCase();
        if (arrTexto[i].length == 0)
            arrTexto.splice(i);
    };
    return arrTexto;
}

function montaCard(conteudo) {
    var divCard = $("<div>").addClass("card");
    var divCardContent = $("<div>").addClass("card-content").html(conteudo);
    divCard.append(divCardContent);
    return divCard;
}

function montaRow(fraseIngles, frasePortugues) {
    var divRow = $("<div>").addClass("row");
    var divColIngles = $("<div>").addClass("col s6").append(montaCard(fraseIngles));
    var divColPortugues = $("<div>").addClass("col s6").append(montaCard(frasePortugues));
    divRow.append(divColIngles);
    divRow.append(divColPortugues);
    return divRow;
}
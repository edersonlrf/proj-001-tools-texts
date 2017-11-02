var $preparaFrases = $("#preparaFrases");

$preparaFrases.on("click", preparaFrases);

function preparaFrases() {
    var $frases = $("#frases");
    $frases.val("");

    var $campoIngles = $("#campoIngles");
    var $campoPortugues = $("#campoPortugues");

    var textoIngles = $campoIngles.val();
    var textoPortugues = $campoPortugues.val();

    var $frasesPreparadas = $("#frasesPreparadas");
    $frasesPreparadas.html("");

    var arrFrasesIngles = separaFrases(textoIngles);
    var arrFrasesPortugues = separaFrases(textoPortugues);

    if(arrFrasesIngles.length > 0 && arrFrasesPortugues.length > 0)
        for (var i = 0; i < arrFrasesIngles.length || i < arrFrasesPortugues.length; i++) {
            $frasesPreparadas.append(montaRow(arrFrasesIngles[i], arrFrasesPortugues[i]));
        }
}

function separaFrases(texto) {
    var arrTexto = []
    var arrTextoSemQuebraLinha = separaFrasesPor("\n", texto);
    arrTextoSemQuebraLinha.forEach(function(textoSemQuebraLinha){
        var arrTextoSemPonto = separaFrasesPor(".", textoSemQuebraLinha);
        arrTextoSemPonto.forEach(function(textoSemPonto){
            var arrTextoSemVirgula = separaFrasesPor(",", textoSemPonto);
            arrTexto = arrTexto.concat(arrTextoSemVirgula);
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
String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

function prepararFrases() {
    var separadores = $("#separadores").val();
    separadores = separadores.split(' ');

    var $campoIngles = $("#campoIngles");
    var $campoPortugues = $("#campoPortugues");

    var textoIngles = $campoIngles.val();
    var textoPortugues = $campoPortugues.val();

    textoIngles = textoIngles.replaceAll('\n', '');
    textoPortugues = textoPortugues.replaceAll('\n', '');

    if (separadores.length > 0) {
        for (var i = 0; i < separadores.length; i++) {
            textoIngles = textoIngles.replaceAll(
                separadores[i] + ' ',
                separadores[i]
            );
            textoIngles = textoIngles.replaceAll(
                separadores[i],
                separadores[i]+'\n\n'
            );
            textoPortugues = textoPortugues.replaceAll(
                separadores[i] + ' ',
                separadores[i]
            );
            textoPortugues = textoPortugues.replaceAll(
                separadores[i],
                separadores[i]+'\n\n'
            );
        }
    }

    var $frasesIngles = $("#frasesIngles");
    var $frasesPortugues = $("#frasesPortugues");

    $frasesIngles.val(textoIngles);
    $frasesPortugues.val(textoPortugues);
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
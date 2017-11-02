var $exportarFrases = $("#exportarFrases");

$exportarFrases.on("click", exportarFrases);

function exportarFrases() {
    var $campoIngles = $("#campoIngles");
    var $campoPortugues = $("#campoPortugues");

    var textoIngles = $campoIngles.val();
    var textoPortugues = $campoPortugues.val();

    var $frases = $("#frases");
    $frases.val("");

    arrFrasesIngles = separaFrases(textoIngles);
    arrFrasesPortugues = separaFrases(textoPortugues);

    strFrases = "";

    var i = 0;
    while (i < arrFrasesIngles.length || i < arrFrasesPortugues.length) {
        strFrases += (arrFrasesIngles[i]) ? arrFrasesIngles[i] : "                    ";
        strFrases += "|";
        strFrases += (arrFrasesPortugues[i]) ? arrFrasesPortugues[i] : "                    ";
        strFrases += (i < arrFrasesIngles.length-1 || i < arrFrasesPortugues.length-1) ? "\n" : "";
        i++;
    }

    $frases.val(strFrases).focus().attr("rows", i).trigger("keyup");
}
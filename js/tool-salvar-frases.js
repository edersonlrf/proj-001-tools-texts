var $salvarFrases = $("#salvarFrases");
var $limparFrases = $("#limparFrases");

$salvarFrases.on("click", salvarFrases);
$limparFrases.on("click", limparFrases);

function salvarFrases() {
    var $inputIngles = $("#inputIngles");
    var $inputPortugues = $("#inputPortugues");

    var textoIngles = $inputIngles.val();
    var textoPortugues = $inputPortugues.val();

    var $frasesDicio = $("#frasesDicio");
    var frasesDicioValue = $frasesDicio.val();

    var frases = "";
    textoIngles = preparaFrases(textoIngles);
    textoPortugues = preparaFrases(textoPortugues);

    frases += (textoIngles) ? textoIngles : "                    ";
    frases += "|";
    frases += (textoPortugues) ? textoPortugues : "                    ";
    frases += "\n";

    salvarFrasesLocalStorage(frases);

    $frasesDicio.val(frasesDicioValue+frases).focus().attr("rows", ($frasesDicio.attr("rows")+1)).trigger("keyup");

    $inputIngles.val("");
    $inputPortugues.val("");
}

function preparaFrases(texto) {
    texto = texto.trim().toLowerCase();
    return texto;
}

function limparFrases() {
    $("#frasesDicio").val("");
    localStorage.removeItem("frases");
}

function salvarFrasesLocalStorage(frase) {
    var frases_storage = localStorage.getItem("frases");
    localStorage.setItem("frases", frases_storage+frase);
}

$(function() {
    $("#frasesDicio").val(localStorage.getItem("frases"));
});
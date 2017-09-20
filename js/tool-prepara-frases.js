var $preparaFrases = $("#preparaFrases");

$preparaFrases.on("click", preparaFrases());

function preparaFrases() {
    alert()
    var $campoIngles = $("#campoIngles");
    var $campoPortugues = $("#campoPortugues");

    var textoIngles = $campoIngles.val();
    var textoPortugues = $campoPortugues.val();

    console.log(textoIngles,textoPortugues);
}
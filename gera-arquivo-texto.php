<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$id = $_POST['id'];

$textoDAO = new TextoDAO($conexao);

$texto = $textoDAO->buscaTexto($id);

$numeroTexto = h_text_number($texto->getNumero());
$nomeArquivo = $numeroTexto . '.txt';

if (file_exists('texts/'.$nomeArquivo)) {
    unlink('texts/'.$nomeArquivo);
}

$frasesIngles = $_POST['frasesIngles'];
$frasesPortugues = $_POST['frasesPortugues'];

$texto->setAnkiIngles(trim($frasesIngles));
$texto->setAnkiPortugues(trim($frasesPortugues));

$textoDAO->alteraTexto($texto);

$arrFrasesIngles = explode("\n", $frasesIngles);
$arrFrasesPortugues = explode("\n", $frasesPortugues);

$file = fopen('texts/'.$nomeArquivo, 'a');

for ($i=0; $i < count($arrFrasesIngles) || $i < count($arrFrasesPortugues); $i++) {
    if ((strlen(trim($arrFrasesIngles[$i])) > 1) || (strlen(trim($arrFrasesPortugues[$i])) > 1)) {
        $text = trim($arrFrasesIngles[$i]) . "|" . trim($arrFrasesPortugues[$i]) . "\n";

        fwrite($file, $text);
    }
}

fclose($file);

?>

<a href="download-texto.php?texto=<?= $numeroTexto; ?>" class="btn btn-primary">Download</a>

<hr>

<table class="table">
    <?php for ($i=0; $i < count($arrFrasesIngles) || $i < count($arrFrasesPortugues); $i++) : ?>
        <?php if ((strlen(trim($arrFrasesIngles[$i])) > 1) || (strlen(trim($arrFrasesPortugues[$i])) > 1)) : ?>
            <tr>
                <td width="50%"><?php echo trim($arrFrasesIngles[$i]); ?></td>
                <td width="50%"><?php echo trim($arrFrasesPortugues[$i]); ?></td>
            </tr>
        <?php endif ?>
    <?php endfor; ?>
</table>

<?php require_once "rodape.php";?>
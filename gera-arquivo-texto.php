<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$id = $_POST['id'];

$textoDAO = new TextoDAO($conexao);

$texto = $textoDAO->buscaTexto($id);

$nomeArquivo = str_pad($texto->getNumero(), 3, '0', STR_PAD_LEFT) . '.txt';

if (file_exists('docs/'.$nomeArquivo)) {
    unlink('docs/'.$nomeArquivo);
}

$frasesIngles = $_POST['frasesIngles'];
$frasesPortugues = $_POST['frasesPortugues'];

$arrFrasesIngles = explode("\n", $frasesIngles);
$arrFrasesPortugues = explode("\n", $frasesPortugues);

$file = fopen('docs/'.$nomeArquivo, 'a');

for ($i=0; $i < count($arrFrasesIngles) || $i < count($arrFrasesPortugues); $i++) {
    if ((strlen(trim($arrFrasesIngles[$i])) > 1) || (strlen(trim($arrFrasesPortugues[$i])) > 1)) {
        $text = trim($arrFrasesIngles[$i]) . "|" . trim($arrFrasesPortugues[$i]) . "\n";

        fwrite($file, $text);
    }
}

fclose($file);

?>

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

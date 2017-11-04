<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$id = $_GET['id'];

$textoDAO = new TextoDAO($conexao);

$texto = $textoDAO->buscaTexto($id);

echo "<pre>";
// print_r($texto->getIngles());
echo "</pre>";

$nomeArquivo = str_pad($texto->getNumero(), 3, '0', STR_PAD_LEFT) . '-A';

?>



<?php

// Composer.
require 'vendor/autoload.php';

use PhpOffice\PhpWord\Style\Paragraph;
use PhpOffice\PhpWord\Style\Font;

// Cria um novo documento.
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Adiciona uma pagina.
$section = $phpWord->addSection(
    array(
        'marginLeft'   => 566,//725, // 200 - 0,35
        'marginRight'  => 566,//725, // x - 1,27
        'marginTop'    => 566,//725,
        'marginBottom' => 566,//725, // 1,28
    )
);

$arrTextoIngles = explode("\n", trim($texto->getIngles()));

$fonte = array(
    'font' => 'Calibri',
    'size' => 10,
    'bgColor' => 'CCCCCC',
);

$paragrafo = array(
    'space' => array(
        'before' => 0,//120
        'after' => 0,//120
        'line' => 480,//259,// 276 -> 1,15 = 1,08
    ),
);

foreach ($arrTextoIngles as $key => $value) {
    if ($key == 0) {
        $fonte['bold'] = true;
        $paragrafo['alignment'] = \PhpOffice\PhpWord\SimpleType\Jc::CENTER;
    } else {
        $fonte['bold'] = false;
        $paragrafo['alignment'] = \PhpOffice\PhpWord\SimpleType\Jc::BOTH;
    }

    if (strlen(trim($value)) > 0) {
        $section->addText(
            trim($value),
            $fonte,
            $paragrafo
        );
    }
}

// Salva o arquivo.
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('docs/' . $nomeArquivo . '.docx');

?>



<?php
if (file_exists('docs/' . $nomeArquivo . '.docx')) {
    ?>
    <p class="text-success">
        Arquivo gerado com sucesso!
    </p>
<?php
} else {
    ?>
    <p class="text-error">
        Erro ao gerar arquivo!
    </p>
<?php
}
?>

<?php require_once "rodape.php";?>

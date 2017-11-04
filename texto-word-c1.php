<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$id = $_GET['id'];

$textoDAO = new TextoDAO($conexao);

$texto = $textoDAO->buscaTexto($id);

$nomeArquivo = str_pad($texto->getNumero(), 3, '0', STR_PAD_LEFT) . '-C1';

if (file_exists('docs/' . $nomeArquivo . '.docx')) {
    unlink('docs/' . $nomeArquivo . '.docx');
}

// Composer.
require 'vendor/autoload.php';

// Cria um novo documento.
$phpWord = new \PhpOffice\PhpWord\PhpWord();

// Adiciona uma pagina.
$section = $phpWord->addSection(
    array(
        'marginLeft'   => 566,
        'marginRight'  => 566,
        'marginTop'    => 566,
        'marginBottom' => 566,
    )
);

$arrTextoIngles = explode("\n", trim($texto->getIngles()));

$fonte = array(
    'name' => 'Verdana',
    'size' => 10,
);

$paragrafo = array(
    'space' => array(
        'before' => 0,
        'after'  => 0,
        'line'   => 259,
    ),
);

foreach ($arrTextoIngles as $key => $value) {
    if ($key == 0) {
        $fonte['bold']          = true;
        $paragrafo['alignment'] = \PhpOffice\PhpWord\SimpleType\Jc::CENTER;
        $numero                 = str_pad($texto->getNumero(), 3, '0', STR_PAD_LEFT) . ' ';
    } else {
        $fonte['bold']          = false;
        $paragrafo['alignment'] = \PhpOffice\PhpWord\SimpleType\Jc::BOTH;
        $numero                 = '';
    }

    if (strlen(trim($value)) > 0) {
        $section->addText(
            $numero . trim($value),
            $fonte,
            $paragrafo
        );
    }
}

// Salva o arquivo.
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('docs/' . $nomeArquivo . '.docx');

if (file_exists('docs/' . $nomeArquivo . '.docx')) {
?>
    <p class="text-success">
        Arquivo gerado com sucesso!
    </p>
    <script type="text/javascript">
        window.close();
    </script>
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

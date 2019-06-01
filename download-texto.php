<?php

$texto = $_GET['texto'] ?? false;

if ( ! $texto) {
    header("location: index.php");
    die();
}

$nomeArquivo = $texto . '.txt';
$arquivo = 'texts/' . $nomeArquivo;

ob_clean();

// Configuramos os headers que serão enviados para o browser.
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename="'.$nomeArquivo.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($arquivo));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');

// Envia o arquivo para o cliente.
readfile($arquivo);

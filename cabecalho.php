<?php
// Usando funcao implicita, ou função anônimas e tmb chamadas de closures.
spl_autoload_register(function ($nomeDaClasse) {
    require_once ("class/" . $nomeDaClasse . ".php");
});

// Visualiza todos os erros, exceto os avisos.
error_reporting(E_ALL ^ E_NOTICE);

require_once "mostra-alerta.php";

require_once "conecta.php";

require_once "helpers.php";
?>
<html lang="pt-br">
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tools Texts</title>

    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container my-container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Tools Texts</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="texto-lista.php">Lista Texto</a></li>
                    <li><a href="texto-formulario.php">Adiciona Texto</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.mairovergara.com/category/aprendendo-ingles-com-videos/" target="_blank">www.mairovergara.com.br</a></li>
                    <li><a href="https://ankiweb.net/about" target="_blank">www.ankiweb.net</a></li>
                    <li><a href="https://www.youtube.com/playlist?list=PLYvATpO3He8NO2FZIvC6kHBYAjgC1jpgj" target="_blank">www.youtube.com/playlist</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container my-container">

        <div class="my-principal">

            <?php mostraAlerta("success");?>
            <?php mostraAlerta("danger");?>

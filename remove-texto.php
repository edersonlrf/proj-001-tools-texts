<?php

require_once "logica-usuario.php";

verificaUsuario();

require_once "conecta.php";
require_once "class/TextoDAO.php";

$id = $_POST['id'];

$textoDAO = new TextoDAO($conexao);

$textoDAO->removeTexto($id);

$_SESSION["success"] = "Texto removido com sucesso.";

// Pagina que o browser deve redirecionar.
header("Location: texto-lista.php");

// Uso indicado apos o redirecionamento para evitar vazar dados criticos.
die();

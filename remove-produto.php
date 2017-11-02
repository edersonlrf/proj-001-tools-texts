<?php

require_once("logica-usuario.php");

verificaUsuario();

require_once("conecta.php");
require_once("class/produtoDAO.php");

$id = $_POST['id'];

$produtoDAO = new produtoDAO($conexao);

$produtoDAO->removeProduto($id);

$_SESSION["success"] = "Produto removido com sucesso.";

// Pagina que o browser deve redirecionar.
header("Location: produto-lista.php");

// Uso indicado apos o redirecionamento para evitar vazar dados criticos.
die();

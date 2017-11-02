<?php

require_once("cabecalho.php");

require_once("logica-usuario.php");

verificaUsuario();

$id = $_GET['id'];

$textoDAO = new TextoDAO($conexao);

$texto = $textoDAO->buscaTexto($id);

// $categoriaDAO = new CategoriaDAO($conexao);

// $categorias = $categoriaDAO->listaCategorias();

// $selecao_usado = $texto->isUsado() ? "checked='checked'" : "";
// $texto->setUsado($selecao_usado);

?>

<h1>Alterando texto</h1>

<form action="altera-texto.php" method="post">
    <input type="hidden" name="id" value="<?=$texto->getId()?>" />
    <table class="table">
        <?php require_once("texto-formulario-base.php"); ?>
        <tr>
            <td colspan="2">
                <input type="submit" value="Alterar" class="btn btn-primary" />
            </td>
        </tr>
    </table>
</form>

<?php require_once("rodape.php"); ?>
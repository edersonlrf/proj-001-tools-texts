<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$id = $_GET['id'];

$textoDAO = new TextoDAO($conexao);

$texto = $textoDAO->buscaTexto($id);

?>

<h1>Alterando texto</h1>

<form action="altera-texto.php" method="post">
    <input type="hidden" name="id" value="<?php echo $texto->getId();?>" />
    <table class="table">
        <?php require_once "texto-formulario-base.php";?>
        <tr>
            <td colspan="2">
                <input type="submit" value="Alterar" class="btn btn-primary" />
            </td>
        </tr>
    </table>
</form>

<?php require_once "rodape.php";?>
<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$id = $_GET['id'];

$textoDAO = new TextoDAO($conexao);

$texto = $textoDAO->buscaTexto($id);

?>

<h1>Preparando frases</h1>

<form action="altera-texto.php" method="post">
    <input type="hidden" name="id" value="<?php echo $texto->getId();?>" />
    <input type="hidden" name="numero" value="<?php echo $texto->getNumero();?>" />
    <input type="hidden" name="titulo" value="<?php echo $texto->getTitulo();?>" />
    <input type="hidden" name="link" value="<?php echo $texto->getLink();?>" />
    <input type="hidden" name="youtube" value="<?php echo $texto->getYoutube();?>" />
    <input type="hidden" name="status" value="<?php echo $texto->getStatus();?>" />
    <table class="table">
        <tr>
            <td>
                <?php echo $texto; ?>
            </td>
            <td align="right">
                <input type="submit" value="Salvar" class="btn btn-primary" />
            </td>
        </tr>
        <tr>
            <td width="50%">Inglês: <textarea name="ingles" class="form-control" rows="20"><?php echo $texto->getIngles();?></textarea></td>
            <td width="50%">Português: <textarea name="portugues" class="form-control" rows="20"><?php echo $texto->getPortugues();?></textarea></td>
        </tr>
    </table>
</form>

<a class="btn btn-success" id="btnGerarFrases">Gerar Frases</a>

<?php require_once "rodape.php";?>
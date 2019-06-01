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
            <td width="50%">
                Inglês:
                <textarea id="campoIngles" name='ingles' class="form-control"
                    rows="20"><?php echo trim($texto->getIngles()); ?></textarea>
            </td>
            <td width="50%">
                Português:
                <textarea id="campoPortugues" name='portugues' class="form-control"
                    rows="20"><?php echo trim($texto->getPortugues()); ?></textarea>
            </td>
        </tr>
    </table>
    <input type="hidden" name="anki_ingles" value="<?php echo $texto->getAnkiIngles();?>" />
    <input type="hidden" name="anki_portugues" value="<?php echo $texto->getAnkiPortugues();?>" />
</form>

<hr>

<div class="input-group">
    <span class="input-group-addon" id="basic-addon1">Separadores</span>
    <input type="text" class="form-control" value=". ? )" id="separadores">
    <span class="input-group-btn">
        <button class="btn btn-success" type="button" id="prepararFrases">Preparar Frases</button>
    </span>
</div>

<hr>

<form action="gera-arquivo-texto.php" method="post">
    <input type="hidden" name="id" value="<?php echo $texto->getId();?>" />
    <table id="frasesPreparadas" class="table">
        <tr>
            <td width="50%">
                Inglês:
                <textarea id="frasesIngles" name="frasesIngles" class="form-control"
                    rows="20"><?php echo trim($texto->getAnkiIngles()); ?></textarea>
            </td>
            <td width="50%">
                Português:
                <textarea id="frasesPortugues" name="frasesPortugues" class="form-control"
                    rows="20"><?php echo trim($texto->getAnkiPortugues()); ?></textarea>
            </td>
        </tr>
    </table>
    <hr>
    <button class="btn btn-primary">Gerar Arquivo</button>
</form>

<hr>

<?php require_once "rodape.php"; ?>
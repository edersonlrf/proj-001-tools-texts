<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$textoDAO = new TextoDAO($conexao);

$textos = $textoDAO->listaTextos();

?>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Numero</th>
            <th>Titulo</th>
            <th>Inglês</th>
            <th>Português</th>
            <th>Links</th>
            <th width="200px" class="text-right">Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($textos as $texto): ?>
        <tr <?php echo ($texto->getStatus() == 'ok') ? 'style="background-color: lightgray;"' : ''; ?>>
            <td><?php echo $texto->getNumero(); ?></td>
            <td><?php echo $texto->getTitulo(); ?></td>
            <td><?php echo h_cut_text($texto->getIngles(), 150); ?></td>
            <td><?php echo h_cut_text($texto->getPortugues(), 150); ?></td>
            <td>
                <a class="link" href="<?php echo ($texto->getLink()) ? $texto->getLink() : '#'; ?>" target="_blank">Link</a>
                <br><br>
                <a class="link" href="<?php echo ($texto->getYoutube()) ? $texto->getYoutube() : '#'; ?>" target="_blank">Youtube</a>
            </td>
            <td class="text-right">
                <a class="btn btn-warning" href="texto-altera-formulario.php?id=<?php echo $texto->getId(); ?>">Alterar</a>
                <form action="remove-texto.php" method="post" class="my-btn-inline">
                    <input type="hidden" name="id" value="<?php echo $texto->getId(); ?>" />
                    <button class="btn btn-danger">Remover</button>
                </form>
                <hr>
                <a class="btn btn-primary" href="preparar-frases.php?id=<?php echo $texto->getId(); ?>">Anki</a>
                <?php if (file_exists(h_text_file($texto->getNumero()))) : ?>
                    <a class="btn btn-default" href="download-texto.php?texto=<?php echo h_text_number($texto->getNumero()); ?>">Download</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php
endforeach;
?>
    </tbody>
</table>

<?php require_once "rodape.php";?>
<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

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
            <th>Ações</th>
            <th>Word</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($textos as $texto): ?>
        <tr <?php echo ($texto->getStatus() == 'ok') ? 'style="background-color: lightgray;"' : ''; ?>>
            <td><?php echo $texto->getNumero(); ?></td>
            <td><?php echo $texto->getTitulo(); ?></td>
            <td><?php echo substr($texto->getIngles(), 0, 150) . '...'; ?></td>
            <td><?php echo substr($texto->getPortugues(), 0, 150) . '...'; ?></td>
            <td>
                <a class="link" href="<?php echo ($texto->getLink()) ? $texto->getLink() : '#'; ?>" target="_blank">Link</a>
                <br><br>
                <a class="link" href="<?php echo ($texto->getYoutube()) ? $texto->getYoutube() : '#'; ?>" target="_blank">Youtube</a>
            </td>
            <td>
                <a class="btn btn-warning" href="preparar-frases.php?id=<?php echo $texto->getId(); ?>">Anki</a>
                <!-- <a class="btn btn-warning" href="#" disabled>Anki</a> -->
                <br><br>
                <a class="btn btn-primary" href="texto-altera-formulario.php?id=<?php echo $texto->getId(); ?>">Alterar</a>
                <br><br>
                <form action="remove-texto.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $texto->getId(); ?>" />
                    <button class="btn btn-danger">Remover</button>
                </form>
            </td>
            <td>
                <!-- <a class="btn btn-success" href="texto-word-a.php?id=<?php echo $texto->getId(); ?>" target="_blank">A&nbsp;&nbsp;</a> -->
                <a class="btn btn-success" href="#" disabled>A&nbsp;&nbsp;</a>
                <a class="btn btn-success" href="texto-word-b1.php?id=<?php echo $texto->getId(); ?>" target="_blank">B1</a>
                <a class="btn btn-success" href="texto-word-b2.php?id=<?php echo $texto->getId(); ?>" target="_blank">B2</a>
                <!-- <a class="btn btn-success" href="texto-word-c1.php?id=<?php echo $texto->getId(); ?>" target="_blank">C1</a> -->
                <a class="btn btn-success" href="#" disabled>C1</a>
                <a class="btn btn-success" href="texto-word-c2.php?id=<?php echo $texto->getId(); ?>" target="_blank">C2</a>
            </td>
        </tr>
    <?php
endforeach;
?>
    </tbody>
</table>

<?php require_once "rodape.php";?>
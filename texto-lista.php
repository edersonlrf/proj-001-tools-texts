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
            <th>Ação 1</th>
            <th>Ação 2</th>
            <th width="7%">Ação 3</th>
        </tr>
    </thead>
    <tbody>
    <?php
foreach ($textos as $texto):
?>
        <tr>
            <td><?php echo $texto->getNumero(); ?></td>
            <td><?php echo $texto->getTitulo(); ?></td>
            <td><?php echo substr($texto->getIngles(), 0, 150) . '...'; ?></td>
            <td><?php echo substr($texto->getPortugues(), 0, 150) . '...'; ?></td>
            <td><a class="btn btn-primary" href="texto-altera-formulario.php?id=<?php echo $texto->getId(); ?>">Alterar</a></td>
            <td>
                <!-- Não remover com link, pois o GET server somente para pegar dados, e tmb pq se o robo do Google acessar esta pagina, ele vai apagar tudo. -->
                <!-- <a href="remove-texto.php?id=< ?= $texto['id'] ? >" class="text-danger">remover</a> -->
                <form action="remove-texto.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $texto->getId(); ?>" />
                    <button class="btn btn-danger">Remover</button>
                </form>
            </td>
            <td>
                <a class="btn btn-success" href="texto-word-a.php?id=<?php echo $texto->getId(); ?>" target="_blank">A</a>
                <a class="btn btn-success" href="texto-word-b1.php?id=<?php echo $texto->getId(); ?>" target="_blank">B1</a>
                <a class="btn btn-success" href="texto-word-b2.php?id=<?php echo $texto->getId(); ?>" target="_blank">B2</a>
                <a class="btn btn-success" href="texto-word-c1.php?id=<?php echo $texto->getId(); ?>" target="_blank">C1</a>
                <a class="btn btn-success" href="texto-word-c2.php?id=<?php echo $texto->getId(); ?>" target="_blank">C2</a>
            </td>
        </tr>
    <?php
endforeach;
?>
    </tbody>
</table>

<?php require_once "rodape.php";?>
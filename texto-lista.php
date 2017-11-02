<?php

require_once("cabecalho.php");

require_once("logica-usuario.php");

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
            <!-- <th>Descrição</th> -->
            <!-- <th>Categoria</th> -->
            <!-- <th>ISBN</th> -->
            <th>Ação 1</th>
            <th>Ação 2</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($textos as $texto) :
    ?>
        <tr>
            <td><?= $texto->getNumero() ?></td>
            <td><?= $texto->getTitulo() ?></td>
            <td><?= $texto->getIngles() ?></td>
            <td><?= $texto->getPortugues(); ?></td>
            <!-- <td>< ?= substr($texto->getDescricao(), 0, 40) ?></td> -->
            <!-- <td>< ?= $texto->getCategoria()->getNome() ?></td> -->
            <!-- <td>
                < ?php
                    if ($texto->temIsbn()) {
                        echo "ISBN: ".$texto->getIsbn();
                    }
                ?>
            </td> -->
            <td><a class="btn btn-primary" href="texto-altera-formulario.php?id=<?=$texto->getId()?>">Alterar</a></td>
            <td>
                <!-- Não remover com link, pois o GET server somente para pegar dados, e tmb pq se o robo do Google acessar esta pagina, ele vai apagar tudo. -->
                <!-- <a href="remove-texto.php?id=< ?= $texto['id'] ? >" class="text-danger">remover</a> -->
                <form action="remove-texto.php" method="post">
                    <input type="hidden" name="id" value="<?=$texto->getId()?>" />
                    <button class="btn btn-danger">Remover</button>
                </form>
            </td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>

<?php require_once("rodape.php"); ?>
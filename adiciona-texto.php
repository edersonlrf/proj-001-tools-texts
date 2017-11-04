<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$factory = new TextoFactory();
$texto   = $factory->criaPor($_POST);
$texto->atualizaBaseadoEm($_POST);

$textoDAO = new TextoDAO($conexao);

if ($textoDAO->insereTexto($texto)) {
    ?>
    <p class="text-success">
        Texto <?php echo $texto->getNumero(); ?> - <?php echo $texto->getTitulo(); ?> adicionado com sucesso!
    </p>
<?php
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">
        O texto <?php echo $texto->getNumero(); ?> não foi adicionado: <?php echo $msg; ?>
    </p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente a conexao.
mysqli_close($conexao);

require_once "rodape.php";

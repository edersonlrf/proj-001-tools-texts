<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

$texto_id = $_POST['id'];

$factory = new TextoFactory();
$texto   = $factory->criaPor($_POST);
$texto->atualizaBaseadoEm($_POST);

$texto->setId($texto_id);

$textoDAO = new TextoDAO($conexao);

if ($textoDAO->alteraTexto($texto)) {
    ?>
    <p class="text-success">
        Texto <?php echo $texto->getNumero(); ?> - <?php echo $texto->getTitulo(); ?> alterado com sucesso!
    </p>
<?php
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">
        O texto <?php echo $texto->getNumero(); ?> não foi alterado: <?php echo $msg; ?>
    </p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente a conexao.
mysqli_close($conexao);

require_once "rodape.php";

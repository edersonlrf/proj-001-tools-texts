<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

verificaUsuario();

// $tipoProduto = $_POST['tipoProduto'];
$texto_id = $_POST['id'];
// $categoria_id = $_POST['categoria_id'];

$factory = new TextoFactory();
$texto   = $factory->criaPor($_POST);
$texto->atualizaBaseadoEm($_POST);

$texto->setId($texto_id);
// $texto->getCategoria()->setId($categoria_id);

// if(array_key_exists("usado", $_POST)) {
// $texto->setUsado("1");
// } else {
// $texto->setUsado("0");
// }

$textoDAO = new TextoDAO($conexao);

if ($textoDAO->alteraTexto($texto)) {
    ?>
    <p class="text-success">
        Texto <?php echo $texto->getNumero();?> - <?php echo $texto->getTitulo();?> alterado com sucesso!
    </p>
<?php
} else {
    $msg = mysqli_error($conexao);
    ?>
    <p class="text-danger">
        O texto <?php echo $texto->getNumero();?> não foi alterado: <?php echo $msg;?>
    </p>
<?php
}

// Nao e necessario, o PHP fecha automaticamente a conexao.
mysqli_close($conexao);

require_once "rodape.php";

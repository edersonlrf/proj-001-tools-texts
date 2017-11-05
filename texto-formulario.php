<?php

require_once "cabecalho.php";

require_once "logica-usuario.php";

require_once "class/Texto.php";

verificaUsuario();

$texto = new Texto("", "", "", "", "", "", "");

?>

<h1>Formulário de cadastro</h1>

<form action="adiciona-texto.php" method="post">

    <table class="table">
        <?php require_once "texto-formulario-base.php";?>
        <tr>
            <td colspan="2">
                <input type="submit" value="Cadastrar" class="btn btn-primary" />
            </td>
        </tr>
    </table>
</form>

<?php require_once "rodape.php";?>
<tr>
    <td>Numero</td>
    <td><input type="number" name="numero" value="<?=$texto->getNumero()?>" class="form-control" required="required"/></td>
</tr>
<tr>
    <td>Titulo</td>
    <td><input type="text" name="titulo" value="<?=$texto->getTitulo()?>" class="form-control" required="required"/></td>
</tr>
<tr>
    <td>Inglês</td>
    <td><textarea name="ingles" class="form-control"><?=$texto->getIngles()?></textarea></td>
</tr>
<tr>
    <td>Português</td>
    <td><textarea name="portugues" class="form-control"><?=$texto->getPortugues()?></textarea></td>
</tr>
<?php
// $usado = $texto->isUsado() ? "checked='checked'" : "";
?>
<!-- <tr>
    <td></td>
    <td><input type="checkbox" name="usado" < ?=$usado?> value="true"> Usado
</tr> -->
<!-- <tr>
    <td>Categoria</td>
    <td>
        <select name="categoria_id" class="form-control">
        < ?php foreach($categorias as $categoria) :
            $essaEhACategoria = $texto->getCategoria()->getId() == $categoria->getId();
            $selecao = $essaEhACategoria ? "selected='selected'" : "";
        ?>
            <option value="< ?=$categoria->getId()?>" < ?=$selecao?>>
                < ?=$categoria->getNumero()?>
            </option>
        < ?php endforeach; ?>
        </select>
    </td>
</tr> -->

<!-- <tr>
    <td>Tipo do produto</td>
    <td>
        <select name="tipoProduto" class="form-control">
            <optgroup label="Livros">
                < ?php
                $tipos = array("Livro Fisico", "Ebook");
                foreach($tipos as $tipo) :
                    $tipoSemEspaco = str_replace(' ', '', $tipo);
                    $esseEhOTipo = get_class($texto) == $tipoSemEspaco;
                    $selecaoTipo = $esseEhOTipo ? "selected='selected'" : "";
                ?>
                    <option value="< ?=$tipoSemEspaco?>" < ?=$selecaoTipo?>>
                        < ?=$tipo?>
                    </option>
                < ?php endforeach; ?>
            </optgroup>
        </select>
    </td>
</tr> -->

<!-- <tr>
    <td>ISBN (caso seja um Livro)</td>
    <td>
        <input type="text" name="isbn" class="form-control"
            value="< ?php if ($texto->temIsbn()) { echo $texto->getIsbn(); } ?>" >
    </td>
</tr> -->

<!-- <tr>
    <td>WaterMark (caso seja um Ebook)</td>
    <td>
        <input type="text" class="form-control" name="waterMark"
            value="< ?php if ($texto->temWaterMark()) { echo $texto->getWaterMark(); } ?>" />
    </td>
</tr>
<tr>
    <td>Taxa de Impressão (caso seja um Livro Físico)</td>
    <td>
        <input type="text" class="form-control" name="taxaImpressao"
            value="< ?php if ($texto->temTaxaImpressao()) { echo $texto->getTaxaImpressao(); } ?>" />
    </td>
</tr> -->
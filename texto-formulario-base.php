<tr>
    <td>Numero: <input type="number" name="numero" value="<?php echo $texto->getNumero();?>" class="form-control" required="required"/></td>
    <td>Titulo: <input type="text" name="titulo" value="<?php echo $texto->getTitulo();?>" class="form-control" required="required"/></td>
</tr>
<tr>
    <td>Link: <input type="text" name="link" value="<?php echo $texto->getLink();?>" class="form-control" required="required"/></td>
    <td>Youtube: <input type="text" name="youtube" value="<?php echo $texto->getYoutube();?>" class="form-control" required="required"/></td>
</tr>
<tr>
    <td>Inglês: <textarea name="ingles" class="form-control" rows="20"><?php echo $texto->getIngles();?></textarea></td>
    <td>Português: <textarea name="portugues" class="form-control" rows="20"><?php echo $texto->getPortugues();?></textarea></td>
</tr>
<tr>
    <td colspan="2">
        Status: <input type="text" name="status" value="<?php echo $texto->getStatus();?>" class="form-control"/>
    </td>
</tr>
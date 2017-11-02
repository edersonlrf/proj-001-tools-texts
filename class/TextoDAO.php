<?php

class textoDAO
{

    /**
     * @var mixed
     */
    private $conexao;

    /**
     * @param $conexao
     */
    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    /**
     * @return mixed
     */
    public function listaTextos()
    {
        $textos = array();

        $resultado = mysqli_query(
            $this->conexao,
            "SELECT t.* FROM textos AS t"
        );

        while ($texto_array = mysqli_fetch_assoc($resultado)) {
            // $tipoProduto = $texto_array['tipoProduto'];
            $texto_id = $texto_array['id'];
            // $categoria_nome = $texto_array['categoria_nome'];

            $factory = new TextoFactory();
            // $texto = $factory->criaPor($tipoProduto, $texto_array);
            $texto = $factory->criaPor($texto_array);
            $texto->atualizaBaseadoEm($texto_array);

            $texto->setId($texto_id);
            // $texto->getCategoria()->setNome($categoria_nome);

            // Funcao inseri no final do array.
            array_push($textos, $texto);
        }

        return $textos;
    }

    /**
     * @param Texto $texto
     */
    public function insereTexto(Texto $texto)
    {
        // $isbn = "";
        // if ($texto->temIsbn()) {
        //     $isbn = $texto->getIsbn();
        // }

        // $waterMark = "";
        // if($texto->temWaterMark()) {
        //     $waterMark = $texto->getWaterMark();
        // }

        // $taxaImpressao = "";
        // if($texto->temTaxaImpressao()) {
        //     $taxaImpressao = $texto->getTaxaImpressao();
        // }

        // $tipoProduto = get_class($texto);
        // Escapar caracteres especiais.
        // $texto->setNome(mysqli_real_escape_string($this->conexao, $texto->getNome()));
        // $texto->setPreco(mysqli_real_escape_string($this->conexao, $texto->getPreco()));
        // $texto->setDescricao(mysqli_real_escape_string($this->conexao, $texto->getDescricao()));
        // $texto->getCategoria()->setId(mysqli_real_escape_string($this->conexao, $texto->getCategoria()->getId()));
        // $texto->setUsado(mysqli_real_escape_string($this->conexao, $texto->isUsado()));

        // Interpolar string e variavel usando o { }.
        $query = "
        INSERT INTO textos (numero, titulo, ingles, portugues)
        VALUES (
            '{$texto->getNumero()}',
            '{$texto->getTitulo()}',
            '{$texto->getIngles()}',
            '{$texto->getPortugues()}'
        )";

        // echo $query;

        $resultadoDaInsercao = mysqli_query($this->conexao, $query);

        return $resultadoDaInsercao;
    }

    /**
     * @param Texto $texto
     */
    public function alteraTexto(Texto $texto)
    {
        // $isbn = "";
        // if ($texto->temIsbn()) {
        //     $isbn = $texto->getIsbn();
        // }

        // $waterMark = "";
        // if($texto->temWaterMark()) {
        //     $waterMark = $texto->getWaterMark();
        // }

        // $taxaImpressao = "";
        // if($texto->temTaxaImpressao()) {
        //     $taxaImpressao = $texto->getTaxaImpressao();
        // }

        // $tipoProduto = get_class($texto);
        // Escapar caracteres especiais.
        // $texto->setId(mysqli_real_escape_string($this->conexao, $texto->getId()));
        // $texto->setNome(mysqli_real_escape_string($this->conexao, $texto->getNome()));
        // $texto->setPreco(mysqli_real_escape_string($this->conexao, $texto->getPreco()));
        // $texto->setDescricao(mysqli_real_escape_string($this->conexao, $texto->getDescricao()));
        // $texto->getCategoria()->setId(mysqli_real_escape_string($this->conexao, $texto->getCategoria()->getId()));
        // $texto->setUsado(mysqli_real_escape_string($this->conexao, $texto->isUsado()));

        $query = "
        UPDATE textos SET
            numero = '{$texto->getNumero()}',
            titulo = '{$texto->getTitulo()}',
            ingles = '{$texto->getIngles()}',
            portugues = '{$texto->getPortugues()}'
            WHERE id = '{$texto->getId()}'";

        return mysqli_query($this->conexao, $query);
    }

    /**
     * @param $id
     */
    public function removeTexto($id)
    {
        // Escapar caracteres especiais.
        $id = mysqli_real_escape_string($this->conexao, $id);

        $query = "DELETE FROM textos WHERE id = {$id}";

        return mysqli_query($this->conexao, $query);
    }

    /**
     * @param $id
     */
    public function buscaTexto($id)
    {
        // Escapar caracteres especiais.
        $id = mysqli_real_escape_string($this->conexao, $id);

        $query = "SELECT * FROM textos WHERE id = {$id}";

        $resultado = mysqli_query($this->conexao, $query);

        $texto_buscado = mysqli_fetch_assoc($resultado);

        // $tipoProduto = $texto_buscado['tipoProduto'];
        $texto_id = $texto_buscado['id'];
        // $categoria_id = $texto_buscado['categoria_id'];

        $factory = new TextoFactory();
        // $texto = $factory->criaPor($tipoProduto, $texto_buscado);
        $texto = $factory->criaPor($texto_buscado);
        $texto->atualizaBaseadoEm($texto_buscado);

        $texto->setId($texto_id);
        // $texto->getCategoria()->setId($categoria_id);

        return $texto;
    }
}

// class/produtoDAO.php

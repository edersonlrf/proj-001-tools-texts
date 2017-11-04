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
            $texto_id = $texto_array['id'];

            $factory = new TextoFactory();
            $texto   = $factory->criaPor($texto_array);
            $texto->atualizaBaseadoEm($texto_array);

            $texto->setId($texto_id);

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
        // Interpolar string e variavel usando o { }.
        $query = "
        INSERT INTO textos (numero, titulo, link, youtube, ingles, portugues, status)
        VALUES (
            '{$texto->getNumero()}',
            '{$texto->getTitulo()}',
            '{$texto->getLink()}',
            '{$texto->getYoutube()}',
            '{$texto->getIngles()}',
            '{$texto->getPortugues()}',
            '{$texto->getStatus()}'
        )";

        $resultadoDaInsercao = mysqli_query($this->conexao, $query);

        return $resultadoDaInsercao;
    }

    /**
     * @param Texto $texto
     */
    public function alteraTexto(Texto $texto)
    {
        $query = "
        UPDATE textos SET
            numero = '{$texto->getNumero()}',
            titulo = '{$texto->getTitulo()}',
            link = '{$texto->getLink()}',
            youtube = '{$texto->getYoutube()}',
            ingles = '{$texto->getIngles()}',
            portugues = '{$texto->getPortugues()}',
            status = '{$texto->getStatus()}'
            WHERE id = '{$texto->getId()}'
        ";

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

        $texto_id = $texto_buscado['id'];

        $factory = new TextoFactory();
        $texto   = $factory->criaPor($texto_buscado);
        $texto->atualizaBaseadoEm($texto_buscado);

        $texto->setId($texto_id);

        return $texto;
    }
}

// class/produtoDAO.php

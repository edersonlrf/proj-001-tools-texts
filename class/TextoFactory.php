<?php

class TextoFactory
{

    // private $classes = array("Ebook", "LivroFisico");

    // public function criaPor($tipoProduto, $params) {
    /**
     * @param $params
     */
    public function criaPor($params)
    {

        $numero = $params['numero'];
        $titulo = $params['titulo'];
        $ingles = $params['ingles'];
        // $categoria = new Categoria();
        $portugues = $params['portugues'];

        // if (in_array($tipoProduto, $this->classes)) {
        //     return new $tipoProduto($numero, $titulo, $ingles, $categoria, $portugues);
        // }

        return new Texto($numero, $titulo, $ingles, $portugues);
    }

}

// class/TextoFactory.php

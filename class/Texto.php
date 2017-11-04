<?php

class Texto
{
    /**
     * @var mixed
     */
    private $id;
    /**
     * @var mixed
     */
    private $numero;
    /**
     * @var mixed
     */
    private $titulo;
    /**
     * @var mixed
     */
    private $link;
    /**
     * @var mixed
     */
    private $youtube;
    /**
     * @var mixed
     */
    private $ingles;
    /**
     * @var mixed
     */
    private $portugues;

    /**
     * @param $numero
     * @param $titulo
     * @param $ingles
     * @param $portugues
     */
    public function __construct($numero, $titulo, $link, $youtube, $ingles, $portugues)
    {
        $this->numero    = $numero;
        $this->titulo    = $titulo;
        $this->link    = $link;
        $this->youtube    = $youtube;
        $this->ingles    = $ingles;
        $this->portugues = $portugues;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    // public function setNumero($numero) {
    //     $this->numero = $numero;
    // }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    // public function setTitulo($titulo) {
    //     $this->titulo = $titulo;
    // }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    // public function setLink($link) {
    //     $this->link = $link;
    // }

    /**
     * @return mixed
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    // public function setYoutube($youtube) {
    //     $this->youtube = $youtube;
    // }

    /**
     * @return mixed
     */
    public function getIngles()
    {
        return $this->ingles;
    }

    // public function setIngles($ingles) {
    //     $this->ingles = $ingles;
    // }

    /**
     * @return mixed
     */
    public function getPortugues()
    {
        return $this->portugues;
    }

    // public function setPortugues($portugues) {
    //     $this->portugues = $portugues;
    // }

    // Todas as classe filhas precisam implementar este metodo.
    // abstract function atualizaBaseadoEm($params);
    public function atualizaBaseadoEm($params)
    {
        // ...
    }

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->numero . " - " . $this->titulo;
    }

    public function __destruct()
    {
        echo "<script>console.log('class/Texto.php Destruindo o texto " . $this->getNumero() . "')</script>";
    }
}

// arquivo class/Texto.php

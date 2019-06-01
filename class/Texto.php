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
     * @var mixed
     */
    private $anki_ingles;
    /**
     * @var mixed
     */
    private $anki_portugues;
    /**
     * @var mixed
     */
    private $status;

    /**
     * @param $numero
     * @param $titulo
     * @param $link
     * @param $youtube
     * @param $ingles
     * @param $portugues
     * @param $anki_ingles
     * @param $anki_portugues
     * @param $status
     */
    public function __construct($numero, $titulo, $link, $youtube, $ingles, $portugues, $anki_ingles, $anki_portugues, $status)
    {
        $this->numero         = $numero;
        $this->titulo         = $titulo;
        $this->link           = $link;
        $this->youtube        = $youtube;
        $this->ingles         = $ingles;
        $this->portugues      = $portugues;
        $this->anki_ingles    = $anki_ingles;
        $this->anki_portugues = $anki_portugues;
        $this->status         = $status;
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

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return mixed
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * @return mixed
     */
    public function getIngles()
    {
        return $this->ingles;
    }

    /**
     * @return mixed
     */
    public function getPortugues()
    {
        return $this->portugues;
    }

    /**
     * @return mixed
     */
    public function getAnkiIngles()
    {
        return $this->anki_ingles;
    }

    public function setAnkiIngles($anki_ingles) {
        $this->anki_ingles = $anki_ingles;
    }

    /**
     * @return mixed
     */
    public function getAnkiPortugues()
    {
        return $this->anki_portugues;
    }

    public function setAnkiPortugues($anki_portugues) {
        $this->anki_portugues = $anki_portugues;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Todas as classe filhas precisam implementar este metodo.
     * @param $params
     */
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

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
    public function __construct($numero, $titulo, $ingles, $portugues)
    {
        $this->numero    = $numero;
        $this->titulo    = $titulo;
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

    // public function isUsado() {
    //     return $this->usado;
    // }

    // public function setUsado($usado) {
    //     $this->usado = $usado;
    // }

    // public function temIsbn() {
    //     return $this instanceof Livro;
    // }

    // public function calculaImposto() {
    //     return $this->titulo * 0.195;
    // }

    /**
     * @param float $valor 0.1 é o percentual padrão.
     */
    // public function precoComDesconto($valor = 0.1) {
    //     if ($valor > 0 && $valor <= 0.5)
    //         return $this->titulo - ($this->titulo * $valor);
    //     else
    //         return $this->titulo;
    // }

    // public function temTaxaImpressao() {
    //     return $this instanceof LivroFisico;
    // }

    // public function temWaterMark() {
    //     return $this instanceof Ebook;
    // }

    // Todas as classe filhas precisam implementar este metodo.
    // abstract function atualizaBaseadoEm($params);
    public function atualizaBaseadoEm($params){}

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

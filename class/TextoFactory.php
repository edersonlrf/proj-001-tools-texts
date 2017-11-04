<?php

class TextoFactory
{
    /**
     * @param $params
     */
    public function criaPor($params)
    {
        $numero    = $params['numero'];
        $titulo    = $params['titulo'];
        $link      = $params['link'];
        $youtube   = $params['youtube'];
        $ingles    = $params['ingles'];
        $portugues = $params['portugues'];
        $status    = $params['status'];

        return new Texto($numero, $titulo, $link, $youtube, $ingles, $portugues, $status);
    }
}

// class/TextoFactory.php

<?php

class TextoFactory
{
    /**
     * @param $params
     */
    public function criaPor($params)
    {
        $numero         = $params['numero'];
        $titulo         = $params['titulo'];
        $link           = $params['link'];
        $youtube        = $params['youtube'];
        $ingles         = $params['ingles'];
        $portugues      = $params['portugues'];
        $anki_ingles    = $params['anki_ingles'];
        $anki_portugues = $params['anki_portugues'];
        $status         = $params['status'];

        return new Texto($numero, $titulo, $link, $youtube, $ingles, $portugues, $anki_ingles, $anki_portugues, $status);
    }
}

// class/TextoFactory.php

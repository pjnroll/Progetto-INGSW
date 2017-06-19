<?php

class Tipo
{
    private $Nome;
    private $DatiContenuti;
    private $Posizione;

    public function __get($var) {
        return $this->$var;
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }
}
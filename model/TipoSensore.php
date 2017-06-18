<?php

class TipoSensore
{
    private $nome;
    private $datiContenuti;
    private $posizione;

    public function __get($var) {
        return $this->$var;
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }
}
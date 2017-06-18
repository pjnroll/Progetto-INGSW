<?php

class Sito
{
    private $ID;
    private $IDCliente;
    private $Nome;
    private $Grandezza;
    private $Localita;

    public function __get($var) {
        return $this->$var;
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }

}
<?php

class Sensore
{
    private $ID;
    private $Marca;
    private $Tipo;
    private $IDsito;

    public function __get($var) {
        return $this->$var;
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }
}
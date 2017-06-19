<?php

class Sensore
{
    private $ID;
    private $Marca;
    private $Tipo;
    private $IDsito;

    public function __get($var) {
        switch($var) {
            case "ID":
                return $this->$ID;
                break;
            case "Marca":
                return $this->$Marca;
                break;
            case "Tipo":
                return $this->$Tipo;
                break;
            case "IDSito":
                return $this->$IDSito;
                break;
            default:
                return $this->$var;
                break;
        }
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }
}
<?php

class Tipo
{
    private $Nome;
    private $DatiContenuti;
    private $Posizione;

    public function __get($var) {
        switch($var) {
            case "Nome":
                return $this->$Nome;
                break;
            case "DatiContenuti":
                return $this->$DatiContenuti;
                break;
            case "Posizione":
                return $this->$Posizione;
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
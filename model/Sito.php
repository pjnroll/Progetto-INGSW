<?php

class Sito
{
    private $ID;
    private $IDCliente;
    private $Nome;
    private $Grandezza;
    private $Localita;

    public function __get($var) {
        switch($var) {
            case "ID":
                return $this->ID;
                break;
            case "IDCliente":
                return $this->IDCliente;
                break;
            case "Nome":
                return $this->Nome;
                break;
            case "Localita":
                return $this->Localita;
                break;
            case "Grandezza":
                return $this->Grandezza;
                break;
            default:
                return $this->$var;
                break;
        }
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }

    public function riempi($datiSito) {
        // Per ogni indice che corrisponde al nome degli attributi dell'oggetto Sito, inserisco i relativi valori.
        foreach ($datiSito as $key => $value) {
            $this->__set($key, $value);
        }
    }
}
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

    public function riempi($datiSito) {
        // Per ogni indice che corrisponde al nome degli attributi dell'oggetto Sito, inserisco i relativi valori.
        foreach ($datiSito as $key => $value) {
            $this->__set($key, $value);
        }
    }
}
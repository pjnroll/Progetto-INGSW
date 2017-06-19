<?php
class Utente {
    private $ID = 0;
    private $Nome;
    private $Cognome;
    private $LuogoDiNascita;
    private $DataDiNascita;
    private $Sesso;
    private $Residenza;
    private $NumeroDiTelefono;
    private $CodiceFiscale;
    private $Email;
    private $Password;
    private $isAdmin;

    public function __get($var) {
        return $this->$var;
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }

    // Dato un array contenente i dati del cliente, riempie gli attributi dell'oggetto
    public function riempi($datiUtente) {
        // Per ogni indice che corrisponde al nome degli attributi dell'oggetto Utente, inserisco i relativi valori.
        foreach ($datiUtente as $key => $value) {
            $this->__set($key, $value);
        }
    }
}
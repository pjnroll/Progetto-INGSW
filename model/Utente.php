<?php
session_start();
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
// @TODO: eliminare isAdmin come metodo, basta fare _get(isAdmin)!

    public function __get($var) {
        return $this->$var;
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }

    public function riempi($datiUtente) {
        // Per ogni indice che corrisponde al nome degli attributi dell'oggetto Utente, inserisco i relativi valori.

        foreach ($datiUtente as $key => $value) {
            $this->__set($key, $value);
        }
    }

    public function isLogged() {
        if(isset($_SESSION["USER"]) AND $_SESSION["USER"]["id"] > 0) return true;
        else return false;
    }

    public function isAdmin() {
        if ($this->isAdmin == 1 ) return true;
        else return false;
    }
}
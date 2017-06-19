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
        if ($var = "ID")
            return $this->$ID;
        if ($var = "Nome")
            return $this->$Nome;
        if ($var = "Cognome")
            return $this->$Cognome;
        if ($var = "LuogoDiNascita")
            return $this->$LuogoDiNascita;
        if ($var = "Sesso")
            return $this->$Sesso;
        if ($var = "Residenza")
            return $this->$Residenza;
        if ($var = "NumeroDiTelefono")
            return $this->$NumeroDiTelefono;
        if ($var = "CodiceFiscale")
            return $this->$CodiceFiscale;
        if ($var = "Email")
            return $this->$Email;
        if ($var = "Password")
            return $this->$Password;
        if ($var = "isAdmin")
            return $this->$isAdmin;

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
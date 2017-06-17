<?php
class Utente {
    private $ID = 0;
    private $nome;
    private $cognome;
    private $luogoDiNascita;
    private $dataDiNascita;
    private $sesso;
    private $residenza;
    private $numeroDiTelefono;
    private $codiceFiscale;
    private $email;
    private $password;
    private $isAdmin;

    private $DB;
    private $ref_table;

    public function __construct($DB, $id_user = false){
        $this->DB = $DB;
        $this->ref_table = "Utente";

        $this->riempi($id_user);
    }

    public function __get($var) {
        return $this->$var;
    }

    public function __set($var, $val) {
        $this->$var = $val;
    }

    public function riempi($datiUtente) {

        // Scorro l'oggetto che consiste nella riga del db, e per ogni relativa colonna (che corrisponde al nome
        // degli attributi dell'oggetto Utente, inserisco i relativi valori.

        foreach ($datiUtente as $key => $value) {
            $this->$key = $value;
            $_SESSION["UTENTE"][$key] = $value;
        }
    }

    public function isLogged() {
        if(isset($_SESSION["USER"]) AND $_SESSION["USER"]["id"] > 0) return true;
        else return false;
    }

    public function isAdmin() {
        if (isset($this->isAdmin) AND $this->isAdmin == 1) return true;
        else return false;
    }
}
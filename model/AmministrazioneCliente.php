<?php


class AmministrazioneCliente {
    private $db;
    private $utente;

    function __construct($DB) {
        $this->db = $DB;
    }

    public function aggiungiCliente($utente) {
        if ($this->validaEmailPassword($utente->__get(Email), $utente->__get(Password))) {
            $query = "INSERT INTO utente (Nome,Cognome,Email,DataNascita,Sesso,Residenza,LuogoNascita,NumeroTelefono,Codicefiscale,Password,isAdmin) VALUES (:Nome,:Cognome,:Email,:DataNascita,:Sesso,:Residenza,:LuogoNascita,:NumeroTelefono,:Codicefiscale,:Password, 0)";

            $param = array();
            foreach($utente as $key => $value) {
                if ($key != 'ID')
                    $param[':'.$key] = $utente->_get($key);
            }
            $this->db->query($query, $param);
        }
    }

    public function modificaCliente($utente) {
        if ($this->validaEmailPassword($utente->__get(Email), $utente->__get(Password))) {
            $query = "UPDATE utente (Nome,Cognome,Email,DataNascita,Sesso,Residenza,LuogoNascita,NumeroTelefono,Codicefiscale,Password) VALUES (:Nome,:Cognome,:Email,:DataNascita,:Sesso,:Residenza,:LuogoNascita,:NumeroTelefono,:Codicefiscale,:Password) WHERE ID = :ID";

            $param = array();
            foreach($utente as $key => $value) {
                $param[$key] = $utente->_get($key);
            }
            $this->db->query($query, $param);
        }
    }
    public function eliminaCliente($id) {
        $query = "DELETE FROM utente WHERE ID = :ID";
        $param = array();
        $param[':ID'] = $id;
    }
    public function trovaClienti($chiave = "", $tipoCriterio = "") {
        $query = "SELECT * FROM utente WHERE isAdmin = 0";
        if ($chiave != "" && $tipoCriterio != "") {
            if ($tipoCriterio == 0) {
                $query += " AND Nome = :chiave";
                $param[':chiave'] = $chiave;
            }
            if ($tipoCriterio == 1) {
                $query += " AND ID = :ID";
                $param[':ID'] = $chiave;
            }
        }
        $result = $this->db->query($query, $param);

        // Se la query ha dato risultati
        if (isset($result)) {
            $utenti_trovati = array();

            // Scorro ciascuna riga, creando un oggetto utente e aggiungendolo ad un array di restituzione
            foreach($result as $result) {
                $u = new Utente();
                $u->riempi($result);
                array_push($utenti_trovati, $u);
            }
        }
        else {
            $u = new Utente();
            array_push($utenti_trovati, $u);
        }
    return $utenti_trovati;
    }

    private function validaEmailPassword($email, $password) {
        if(preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email) && (len($password) > 6)) return true;
        else return false;
    }
}
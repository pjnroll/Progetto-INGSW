<?php

class AmministrazioneSito {
    private $db;

    function __construct($db){
        $this->$db = $db;
    }
    public function aggiungiSito($sito) {
        $param = array();
        $param[':IDCliente'] = $sito->__get("IDCliente");
        $param[':Nome'] = $sito->__get("Nome");
        $param[':Grandezza'] = $sito->__get("Grandezza");
        $param[':Localita'] = $sito->__get("Localita");
        $query = "INSERT INTO sito (IDCliente, Nome, Grandezza, Localita) VALUES (:IDCliente, :Nome, :Grandezza, :Localita)";
        $this->db->query($query, $param);
    }
    public function modificaSito($sito) {
        $param = array();
        $param[':IDCliente'] = $sito->__get("IDCliente");
        $param[':Nome'] = $sito->__get("Nome");
        $param[':Grandezza'] = $sito->__get("Grandezza");
        $param[':Localita'] = $sito->__get("Localita");
        $query = 'UPDATE sito (Nome, Grandezza, Localita) VALUES (:Nome, :Grandezza, :Localita)';
        $this->db->query($query, $param);
    }
    public function eliminaSito($sito) {
        $param = array();
        $param[':ID'] = $sito->__get("ID");
        $query = "DELETE * FROM sito WHERE ID = :ID";
        $this->db->query($query, $param);

    }
    public function trovaSito($chiave, $tipoCriterio) {
        if (!isset($tipoCriterio) OR $tipoCriterio == 0) {
            $query = "SELECT * FROM sito WHERE IDCliente = :chiave";
            $param = array();
            $param['IDCliente'] = $chiave;
            $this->db->query($query, $param);
        }

    }

}
<?php

class AmministrazioneSito
{
    private $db;

    function __construct($DB)
    {
        $this->db = $DB;
    }

    public function aggiungiSito($sito)
    {
        $param = array();
        $param[':IDCliente'] = $sito->__get('IDCliente');
        $param[':Nome'] = $sito->__get('Nome');
        $param[':Grandezza'] = $sito->__get('Grandezza');
        $param[':Localita'] = $sito->__get('Localita');
        $query = 'INSERT INTO sito (IDCliente, Nome, Grandezza, Localita) VALUES (:IDCliente, :Nome, :Grandezza, :Localita)';
        $result = $this->db->query($query, $param);
        var_dump($result);
    }

    public function modificaSito($sito)
    {
        $param = array();
        $param[':IDCliente'] = $sito->__get('IDCliente');
        $param[':Nome'] = $sito->__get('Nome');
        $param[':Grandezza'] = $sito->__get('Grandezza');
        $param[':Localita'] = $sito->__get('Localita');
        $query = 'UPDATE sito (Nome, Grandezza, Localita) VALUES (:Nome, :Grandezza, :Localita)';
        $this->db->query($query, $param);
    }

    public function eliminaSito($sito)
    {
        $param = array();
        $param[':ID'] = $sito->__get('ID');
        $query = 'DELETE * FROM sito WHERE ID = :ID';
        $this->db->query($query, $param);

    }

    public function trovaSito($chiave = "", $tipoCriterio = "")
    {
        if (!isset($tipoCriterio) OR $tipoCriterio == 0) {
            $query = 'SELECT * FROM sito WHERE IDCliente = :chiave';
            $param = array();
            $param[':chiave'] = $chiave;
            $result = $this->db->query($query, $param);
        }

        // Se la query ha dato risultati
        $siti_trovati = array();

        if (isset($result)) {
            // Scorro ciascuna riga, creando un oggetto sito e aggiungendolo ad un array di restituzione
            foreach ($result as $result) {
                $s = new Sito();
                $s->riempi($result);
                array_push($siti_trovati, $s);
            }
        } else {
            $s = new Sito();
            array_push($siti_trovati, $s);
        }
        return $siti_trovati;
    }
}
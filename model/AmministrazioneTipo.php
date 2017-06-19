<?php

class AmministrazioneTipo
{


    private $db;

    function __construct($DB)
    {
        $this->db = $DB;
    }

    public function aggiungiTipo($tipo)
    {
        $param = array();
        $param[':Nome'] = $tipo->__get('Nome');
        $param[':DatiContenuti'] = $tipo->__get('DatiContenuti');
        $param[':Posizione'] = $tipo->__get('Posizione');
        $query = 'INSERT INTO tiposensore (Nome, DatiContenuti, Posizione) VALUES (:Nome, :DatiContenuti, :Posizione)';
        $result = $this->db->query($query, $param);
        var_dump($result);
    }

    public function modificaTipo($tipo)
    {
        $param = array();
        $param[':Nome'] = $tipo->__get('Nome');
        $param[':DatiContenuti'] = $tipo->__get('DatiContenuti');
        $param[':Posizione'] = $tipo->__get('Posizione');
        $query = 'Update tiposensore (DatiContenuti, Posizione) VALUES (:DatiContenuti, :Posizione) WHERE Nome = :Nome';
        $this->db->query($query, $param);
    }

    public function eliminaTipo($tipo)
    {
        $param = array();
        $param[':Nome'] = $tipo->__get('Nome');
        $query = 'DELETE * FROM tiposensore WHERE ID = :ID';
        $this->db->query($query, $param);

    }

    public function getTipo($chiave = "")
    {
        if (!isset($tipoCriterio)) {
            $query = 'SELECT * FROM tiposensore';
            $param[':chiave'] = $chiave;
            $param = array();
            $result = $this->db->query($query, $param);
        }

        // Se la query ha dato risultati
        $tipi_tipi = array();

        if (isset($result)) {
            // Scorro ciascuna riga, creando un oggetto sito e aggiungendolo ad un array di restituzione
            foreach ($result as $result) {
                $s = new Tipo();
                $s->riempi($result);
                array_push($tipi_tipi, $s);
            }
        } else {
            $s = new Tipo();
            array_push($tipi_tipi, $s);
        }
        return $tipi_tipi;
    }

}
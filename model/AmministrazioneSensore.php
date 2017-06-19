<?php
class AmministrazioneSensore
{
    private $db;

    function __construct($DB)
    {
        $this->db = $DB;
    }

    public function aggiungiSensore($sensore)
    {
        $param = array();
        $param[':ID'] = $sensore->__get('ID');
        $param[':Marca'] = $sensore->__get('Marca');
        $param[':Tipo'] = $sensore->__get('Tipo');
        $param[':IDSito'] = $sensore->__get('IDSito');
        $query = 'INSERT INTO sensore (ID, Marca, Tipo, IDSito) VALUES (:ID, :Marca, :Tipo, :IDSito)';
        $result = $this->db->query($query, $param);
        var_dump($result);
    }

    public function modificaSensore($sensore)
    {
        $param = array();
        $param[':ID'] = $sensore->__get('ID');
        $param[':Marca'] = $sensore->__get('Marca');
        $param[':Tipo'] = $sensore->__get('Tipo');
        $param[':IDSito'] = $sensore->__get('IDSito');
        $query = 'UPDATE sensore (Marca, Tipo, IDSito) VALUES (:Marca, :Tipo, :IDSito) WHERE ID = :ID';
        $this->db->query($query, $param);
    }

    public function eliminaSensore($sensore)
    {
        $param = array();
        $param[':ID'] = $sensore->__get('ID');
        $query = 'DELETE * FROM sito WHERE ID = :ID';
        $this->db->query($query, $param);

    }

    public function trovaSensore($chiave = "", $tipoCriterio = "")
    {
        if (!isset($tipoCriterio) OR $tipoCriterio == 0) {
            $query = 'SELECT * FROM sensore WHERE ID = :chiave';
            $param = array();
            $param[':chiave'] = $chiave;
            $result = $this->db->query($query, $param);
        }

        // Se la query ha dato risultati
        $sensori_trovati = array();
        if (isset($result)) {
            // Scorro ciascuna riga, creando un oggetto sito e aggiungendolo ad un array di restituzione
            foreach ($result as $result) {
                $s = new Sensore();
                $s->riempi($result);
                array_push($sensori_trovati, $s);
            }
        } else {
            $s = new Sensore();
            array_push($sensori_trovati, $s);
        }
        return $sensori_trovati;
    }
}
<?php
    class ManagerDB {
        private $_db;
        static $_instance;

        public static function getInstance() {
            if (!(self::$_instance instanceof self)) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        // Metodo per gestire le query, a cui viene passata la query parametrizzata e le variabili da inserire nei param
        public function query($sql, $varset = "") {
            $statement = $this->_db->prepare($sql);
            // Esegue query
            $statement->execute($varset);
            // Restituisce il risultato sotto-forma di oggetto
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function __construct($server = "", $username = "", $password = "", $db = "") {
            // Se son stati passi come parametri i dati del db, li uso per connettermi
            if ($server != "" && $username != "" && $username != "" && password != "" && $db != "") {
                $this->_db = new PDO('mysql:host='.$server.'; dbname='.$db, $username, $password);
            }
            else {
                // Altrimenti procedo di default con quelli locali.
                $this->_db = new PDO('mysql:host=127.0.0.1;dbname=iot', 'root', '');
            }

            $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        }
    }
?>
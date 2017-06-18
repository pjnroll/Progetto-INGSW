<?php
    class Login {
        //@TODO: ELIMINARE dai diagrammi la presenza di Utente nel Login e verificare
        private $db;

        function __construct($DB) {
            $this->db = $DB;
        }

        function verifica($emailAddress, $password_) {
            $password = md5($password_);

            // Preparo ed eseguo la query
            $parametri = array();
            $parametri[':emailAddress'] = $emailAddress;
            $parametri[':password'] = $password;
            $result = $this->db->query("SELECT * FROM Utente WHERE Email = :emailAddress AND Password = :password", $parametri);
            if (isset($result[0]) && ($result[0]["ID"] > 0))
                return $result[0];
            else return false;
        }

        function redireziona($param) {
            ob_start();
            // Se l'utente è amministratore
            if ($param == 1)
                header('Location: /index.php?action=pannelloamministratore');
            // Se è un cliente
            else if ($param == 0)
                header('Location: /index.php?action=areaclienti');
            //Se non è proprio loggato
            else if ($param == -1)
                header('Location: /index.php?action=loginfailed');
            ob_end_flush();
        }
    }
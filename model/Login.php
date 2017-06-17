<?php
    session_start();
    class Login {
        private $utente;
        private $db;

        function __construct($DB, $Utente) {
            $this->db = $DB;
            $this->utente = $Utente;
        }

        function verifica($emailAddress, $password) {
            $password = sha1(password);

            // Preparo ed eseguo la query
            $this->db->prepare("SELECT * FROM Utente WHERE Email = :emailAddress AND Password = :password");
            $this->db->bindParam(':emailAddress', $emailAddress);
            $this->db->bindParam(':password', $password);
            $this->db->execute();

            $result = $this->db->fetch(PDO::FETCH_OBJ);

            // Se non è stato trovato
            if ($result) {
                $this->utente->riempi($result);
            }
        }

        function redireziona() {
            ob_start();
            if (isset($_SESSION["UTENTE"])) {

                // Se l'utente è amministratore o meno
                if ($this->utente->isAdmin())
                    header('Location: pannelloamministratore.php');
                else
                    header('Location: areaclienti.php');
            }
            // Se non è proprio loggato
            header('Location: index.php?login=failed');
            ob_end_flush();
            die();
        }

        function logout() {
            session_destroy();
            $this->redireziona();
        }


    }
?>
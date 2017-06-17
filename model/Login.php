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
            // ESEGUIRE QUERY 'SELECT * FROM Utente WHERE Email = $emailAddress AND Password = $password
            // Nel caso in cui esiste riempie $_SESSION["UTENTE"] dei relativi dati
        }

        function redireziona() {
            ob_start();
            if (isset($_SESSION["UTENTE"])) {

                // Se l'utente è amministratore
                if ($_SESSION["UTENTE"]["isAdmin"] == 1)
                    header('Location: pannelloamministratore.php');
                // Se non lo è
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
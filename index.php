<?php
session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');
date_default_timezone_set('Europe/Rome');

// Pagina index della piattaforma. Verifica inizialmente se l'user è loggato, in caso negativo lo forza a loggarsi,
// altrimenti a seconda del suo ruolo mostra l'area clienti o il pannello di amministrazione.
?>


<html>
	<head>
		<title>IoT</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
-->
        <!-- jquery -->
        <script src="css/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="css/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
	
	<body>
    <div class="container">

        <?php
        // Selettore delle pagine da importare
        // Nel caso in cui l'utente è loggato, può accedere alle varie pagine
        if (isset($_SESSION["UTENTE"])) {
            switch ($_GET['action']) {
                case "areaclienti" :
                    include 'pagine/areaclienti.php';
                    break;
                case "pannelloamministratore" :
                    include 'pagine/pannelloamministratore.php';
                    break;
                // Se non viene esplicitamente chiesta la pagina, viene mostrata la pagina principale relativa
                default:
                    if ($_SESSION["UTENTE"]["isAdmin"] == "0")
                        include 'pagine/areaclienti.php';
                    else
                        include 'pagine/pannelloamministratore.php';
            }
        }
        // Altrimenti se non è loggato, accedi al login o nel caso in cui è stato già tentato, accedi alla pagina con errore
        else {
            if (isset($_GET['action']) && $_GET['action'] == 'loginfailed') {
                include $_SERVER["DOCUMENT_ROOT"] . '/pagine/login.php';
            }
            else
                include $_SERVER["DOCUMENT_ROOT"].'/pagine/login.php';
        }
         ?>
    </div>
    </body>
</html>

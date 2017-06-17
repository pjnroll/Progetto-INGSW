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
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<script src="js/lib/jquery.js"></script>
		<script src="js/lib/bootstrap.min.js"></script>
        <script src="js/standard.js"></script>
    </head>
	
	<body>
    <div class="container">

        <?php
        if (isset($_SESSION["UTENTE"])) {
            switch ($_GET['action']) {
                case "areaclienti" :
                    include("pagine/areaclienti.php");
                    break;
                case "pannelloamministratore" :
                    include("pagine/pannelloamministratore.php");
                    break;
                default:
                    if ($_SESSION["UTENTE"]["isAdmin"] == "0")
                        include("pagine/areaclienti.php");
                    else include("pagine/pannelloamministratore.php");
            }
        } else {
            include("pagine/login.php");
        }
         ?>
    </div>
    </body>
</html>

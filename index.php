<?php
session_start();
require_once 'model/ManagerDB.php';
require_once 'model/Login.php';
require_once 'model/Utente.php';

$db = Database::getInstance();
$utente = Utente();
$login = Login($db, $utente);

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
		<div id = "maindiv">
		</div>
	</body>
</html>

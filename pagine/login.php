<?php
    // Quando la pagina login viene chiamata da index, non avrà alcun parametro 'action'.
    // Quando l'utente farà l'azione di login inviando i suoi dati, verrà notificato il tutto a questa stessa pagina
    // e in questo punto specifico utilizziamo i metodi della classe Login

    require_once $_SERVER['DOCUMENT_ROOT'].'/model/ManagerDB.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Login.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/model/Utente.php';

    $db = ManagerDB::getInstance();
    $utente = new Utente($db);
    if($_GET['action'] == 'verificaLogin') {
        $login = new Login($db, $utente);
        $login->verifica($_POST['login-mail'], $_POST['login-password']);
    }

?>
<div class="row"><br></div>
<div id="loginDIV" class="row col-md-4 col-lg-4 col-xs-12 col-sm-6 col-lg-offset-4" style="border: 1px dotted black">
    <div class="row">
        <div style="text-align:center;" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <h1 class="titlefont" style="color:Black;">Benvenuto nella piattaforma IoT</h1>
            <h4 style="color:black; font-weight:300;">Identificati per accedere alle funzionalità.</h4>
        </div>
    </div>
    <div class="row">
        <div  style="margin-top:0px;" class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
            <br/>
            <form method="POST" action="pagine/login.php?action=verificaLogin" >
                <span id="msg"></span>
                <div class="form-group">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <input class="form-control" type="text" id="login-mail" placeholder="E-mail">
                    </div>
                </div>
                <br /><br />
                <div class="form-group">
                    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                        <input class="form-control" type="password" id="login-password" placeholder="Password">
                    </div>
                </div>
                <br />
                <div id="errore" class="form-group" style="display:none; text-align:center;" role="alert">
                    <span class="text-danger" id="login-response"></span>
                </div>
                <br />

                <div class="form-group">
                    <center>
                        <input type="submit" id="submit-login-user" class="btn btn-success btn-lg" test="Login">
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
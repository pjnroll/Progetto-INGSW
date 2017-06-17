<?php
    session_start();
    if ($_SESSION["UTENTE"]["isAdmin"] == 0) {
        echo "Non hai i privilegi per accedere a questa pagina.";
    }
    ?>
<div class = "form-group col-md-12" style = "left : 4%;">
    <ul id="profilo" class="list-group">
        <li class="list-group-item">
            <h3 style="color:darkred; margin-top:1%">Pannello d'amministrazione</h3>
            <small>Gestisci i tuoi clienti, i loro siti e i relativi sensori.</small>
            <br>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tab_pannello">
                <li role="presentation" class="active">
                    <a href="#clienti" aria-controls="clienti" role="tab" data-toggle="tab">Clienti</a>
                </li>
                <li role="presentation" class="active">
                    <button class="btn btn-danger" style="margin-top:5px">Logout</button>
                </li>
            </ul>
        </li>
        <li class="list-group-item col-md-12 col-lg-12" style="border-top:none;">
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- clienti -->
                <div role="tabpanel" class="tab-pane active" id="clienti">
                    <table class="table table-striped table-condensed table-hover" style="background-color:white">
                        <thead>
                        <tr>
                            <th>Nominativo</th>
                            <th>Residenza</th>
                            <th>Luogo di nascita</th>
                            <th>Data di nascita</th>
                            <th>Sesso</th>
                            <th>Numero di telefono</th>
                            <th>Codice fiscale</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr><td>Gabriele Pisciotta</td>
                            <td>Via Cappelluti</td>
                            <td>Bari</td>
                            <td>03-05-1996</td>
                            <td>M</td>
                            <td>3391358710</td>
                            <td>PSCGRL96E03A662Q</td>
                            <td>g.pisciotta1@studenti.uniba.it</td></tr>
                        <?php
                        /*$rs = mysql_query("SELECT nome, cognome, data_iscrizione, indirizzo, numero_civico as civico, comune, COUNT(ordine.id) as pezzi_acquistati
                            FROM utenti LEFT JOIN ordine
                            ON utenti.id = ordine.IDutente
                            WHERE isadmin = 0
                            GROUP BY utenti.id") or die(mysql_error());
                        while ($var = mysql_fetch_array($rs)) {
                            echo "<tr>";
                            echo "<td>" . $var['nome'] . " " . $var['cognome'] . "</td>";
                            echo "<td>" . $var['indirizzo'] . ", " . $var['civico'] . " <span style='float:right; padding-right:20px;'>" . $var['comune'] . "</span></td>";
                            echo "<td>" . $var['data_iscrizione'] . "</td>";
                            echo "<td><center>" . $var['pezzi_acquistati'] . "</center></td>";
                        }*/
                        ?>
                        </tbody>
                    </table>
                </div>
                <!-- End clienti -->

</div>
</li>
</ul>
</div>

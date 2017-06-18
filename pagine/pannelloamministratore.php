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
                    <button style='margin-top:3px' type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal_cliente"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Aggiungi</button>
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
                        <tr><td><button class="btn">Gabriele Pisciotta</button></td>
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


<!-- Modal -->
<div class="modal fade" id="modal_cliente" tabindex="-1" role="dialog" aria-labelledby="modal_cliente" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Aggiungi cliente</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method = "post">
                    <div class="form-group" id="div_nome">
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nome" placeholder="">
                        </div>
                    </div>
                    <div class="form-group" id="div_descrizione">
                        <label for="descrizione" class="col-sm-2 control-label">Cognome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="cognome" placeholder=""></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_luogonascita">
                        <label for="quantita" class="col-sm-2 control-label">Luogo di nascita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="luogodinascita" placeholder="Bari"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_datadinascita">
                        <label for="quantita" class="col-sm-2 control-label">Data di nascita</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="quantita" placeholder="03/05/1996"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_residenza">
                        <label for="quantita" class="col-sm-2 control-label">Residenza</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="residenza" placeholder="Bari"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_sesso">
                        <label for="data" class="col-sm-2 control-label">Sesso</label>
                        <div class="col-sm-4">
                            <select id="sesso">
                                <option id="M">M</option>
                                <option id="F">F</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" id="div_numeroditelefono">
                        <label for="quantita" class="col-sm-2 control-label">Numero di telefono</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="numeroditelefono" placeholder="3391358719"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_codicefiscale">
                        <label for="quantita" class="col-sm-2 control-label">Codice fiscale</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="codicefiscale" placeholder="PSCGRL39A03A662Q"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_email">
                        <label for="quantita" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="admin@info.it"></input>
                        </div>
                    </div>
                    <div class="form-group" id="div_password">
                        <label for="quantita" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" placeholder=""></input>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                <button id="btnAdd" type="button" class="btn btn-primary">Aggiungi</button>
            </div>
        </div>
    </div>
</div>

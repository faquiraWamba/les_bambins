<div class="containerOrange">
    <h1>Gestion du centre</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Facture&action=showFacture"><button class="onglet active">Facture</button></a>
            <a href="index.php?controller=Reunion&action=showReunion"><button class="onglet">Réunion</button></a>
            <a href="index.php?controller=Questionnaire&action=showQuestionnaire"><button class="onglet">Questionnaire</button></a>
            <a href="index.php?controller=Animateur&action=showAffectation"><button class="onglet">Affectation animateur</button></a>
        </div>
        
    <div class="form-content-RP">
        
        <div class="tab-content-GA" style="display: block">
            <p class="form-title-RP">Consulter les factures d'un enfant</p>
            <form method="post">
                <div class="register-data-form RP">

                <div class="register-tab-form-item register-tab-holiday-item">
                    <input type="text" id="searchInput" class="input-text-RP" onkeyup="searchChildren()" placeholder="Rechercher un enfant">
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <input type="hidden" class="input-text-RP" id="selectedChildId" name="id_enfant">
                </div>
                <div id="searchResults" class="input-text-RP" ></div>
                </div>
            </form>   
        <button onclick="fetchBills()">Voir les factures</button>

        <table class="table-RP" id="billsTable" border="1" style="display:none;">
            <tr>
                <th>Numéro Facture</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Statut</th>
                <th>Icon</th>
            </tr>
            <tbody id="billsBody"></tbody>
        </table> 
            </table>
            <div>
                <p class="form-title-RP">Factures non payés</p>
                <button type="submit">Envoyer un rappel</button>
            </div>
            <table class="table-RP">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de facturation</th>
                    <th>Montant</th>
                    <th>Etat</th>
                    <th>Facture</th>
                </tr>
                <?php if($bills){
                        foreach($bills as $bill){?>
                            
                    
                <tr>
                <?php 
                    require_once '/xampp/htdocs/les_bambins/app/models/Child.php';
                    $modelenfant = new Child;
                    $enfant=$modelenfant->getChild($bill['id_enfant']);
                     $bill['date_facture'] ?>
                    <td><?= $enfant['nom_enfant'] ?? 'NONE' ?></td>
                    <td><?= $enfant['prenom_enfant'] ?? 'NONE' ?></td>
                    <td><?= $bill['date_facture'] ?? 'NONE' ?></td>
                    <td><?= $bill['montant']  ?? 'NONE' ?></td>
                    <td>Non Payé</td>
                    <td>icon</td>
                </tr>

                <?php    }
                    } ?>
            </table>
        </div>
    </div>
    </div>
</div>

<div class="containerOrange">
    <h1>Gestion du centre</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Facture&action=showFacture"><button class="onglet active">Facture</button></a>
            <a href="index.php?controller=Reunion&action=showReunion"><button class="onglet">Réunion</button></a>
            <a href="index.php?controller=Questionnaire&action=showQuestionnaire"><button class="onglet">Questionnaire</button></a>
        </div>

    <div class="form-content-RP">
        <!--Facture-->
        <div class="tab-content-GA" style="display: block">
            <p class="form-title-RP">Consulter les factures</p>
        <form method="post">
            <div class="register-data-form RP">
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nom_enfant">Nom de l'enfant</label>
                    <input class="input-text-RP" list="liste_nom_enfant">
                    <datalist id="liste_nom_enfant">
                        <option value="Edge">
                        <option value="Firefox">
                    </datalist>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="prenom_enfant">Prénom de l'enfant</label>
                    <input class="input-text-RP" list="liste_prenom_enfant">
                    <datalist id="liste_prenom_enfant">
                        <option value="Edge">
                        <option value="Firefox">
                    </datalist>
                </div>
            </div>
        </form>
            <table class="table-RP">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de facturation</th>
                    <th>Montant</th>
                    <th>Etat</th>
                    <th>Facture</th>
                </tr>
                <tr>
                    <td>Hun</td>
                    <td>Laura</td>
                    <td>13/06/1026</td>
                    <td>77</td>
                    <td>Payé</td>
                    <td>icon</td>
                </tr>
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
                <tr>
                    <td>Hun</td>
                    <td>Laura</td>
                    <td>13/06/1026</td>
                    <td>77</td>
                    <td>Payé</td>
                    <td>icon</td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</div>

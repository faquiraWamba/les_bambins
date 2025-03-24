<div class="containerOrange">
    <h1>Gestion du centre</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Facture&action=showFacture"><button class="onglet">Facture</button></a>
            <a href="index.php?controller=Reunion&action=showReunion"><button class="onglet active">Réunion</button></a>
            <a href="index.php?controller=Questionnaire&action=showQuestionnaire"><button class="onglet">Questionnaire</button></a>
        </div>

        <div class="form-content-RP">
            <!--Réunion-->
            <div class="tab-content-GA">
                <p class="form-title-RP">Création réunion</p>
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_reunion">Nom de la réunion <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="nom_reunion" id="nom_reunion" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_reunion">Date <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date_reunion" id="date_reunion" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="heure_reunion">Heure de la réunion <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="heure_reunion" id="heure_reunion" value="" required>
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <button  type="submit">Créer la réunion</button>
                    </div>
                </form>
                <p class="form-title-RP">Historique des réunions</p>
                <table class="table-RP">
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Etat</th>
                    </tr>
                    <tr>
                        <td>Parent prof</td>
                        <td>13/06/2025</td>
                        <td>19h</td>
                        <td>à venir</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
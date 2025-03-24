<div class="containerOrange">
    <h1>Gestion du centre</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Facture&action=showFacture"><button class="onglet">Facture</button></a>
            <a href="index.php?controller=Reunion&action=showReunion"><button class="onglet">Réunion</button></a>
            <a href="index.php?controller=Questionnaire&action=showQuestionnaire"><button class="onglet active">Questionnaire</button></a>
        </div>

        <div class="form-content-RP">
            <!--Questionnaire-->
            <div class="tab-content-GA">
                <p class="form-title-RP">Consulter les résultats du questionnaire</p>
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_activite">Nom de l'activité</label>
                            <input class="input-text-RP" list="liste_activite">
                            <datalist id="liste_activite">
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                </form>
                <table class="table-RP">
                    <tr>
                        <th> </th>
                        <th>Qualité de l'activité</th>
                        <th>Qualité de l'animateur</th>
                        <th>Qualité de l'oraganisation</th>
                    </tr>
                    <tr>
                        <td class="tableQuest">Note moyenne</td>
                        <td>13/06/2025</td>
                        <td>19h</td>
                        <td>à venir</td>
                    </tr>
                    <tr>
                        <td class="tableQuest">Note maximale</td>
                        <td>13/06/2025</td>
                        <td>19h</td>
                        <td>à venir</td>
                    </tr>
                    <tr>
                        <td class="tableQuest">Note minimale</td>
                        <td>13/06/2025</td>
                        <td>19h</td>
                        <td>à venir</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
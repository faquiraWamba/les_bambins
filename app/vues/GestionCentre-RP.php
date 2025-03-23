<div class="containerOrange">
    <div class="form_GA">
    <div class="onglet-RP">
        <button class="onglet active" onclick="openTab(0)">Facture</button>
        <button class="onglet" onclick="openTab(1)">Réunion</button>
        <button class="onglet" onclick="openTab(2)">Questionnaire</button>
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


<div class="containerOrange">
    <h1>Gestion du centre</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Facture&action=showFacture"><button class="onglet">Facture</button></a>
            <a href="index.php?controller=Reunion&action=showReunion"><button class="onglet">Réunion</button></a>
            <a href="index.php?controller=Questionnaire&action=showQuestionnaire"><button class="onglet">Questionnaire</button></a>
            <a href="index.php?controller=Animateur&action=showAffectation"><button class="onglet  active">Affectation animateur</button></a>
        </div>

        <div class="form-content-RP">

            <div class="tab-content-GA" style="display: block">
                <p class="form-title-RP">Affecter un animateur à une activité</p>
                <form method="post">
                    <div class="register-data-form RP">

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_activite">Nom de l'activité</label>
                            <input class="input-text-RP" list="liste_activite">
                            <datalist id="liste_activite">
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_activite">Nom de l'animateur</label>
                            <input class="input-text-RP" list="liste_activite">
                            <datalist id="liste_activite">
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>

                    </div>
                </form>
                <button onclick="fetchBills()">Affecter</button>
            </div>
        </div>
    </div>
</div>

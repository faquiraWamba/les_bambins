<div class="containerOrange">
    <h1>Gestion des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=ChildMonitoringPresence&action=showFicheAppel"><button class="onglet">Fiche d'appel</button></a>
            <a href="index.php?controller=Activity&action=showRapportActivite"><button class="onglet active">Rapport d'activité</button></a>
            <a href="index.php?controller=Animateur&action=showActiviteAnim"><button class="onglet">Mes activités</button></a>
        </div>

        <div class="form-content-RP">

            <div class="tab-content-GA">
                <p class="form-title-RP">Faire l'appel</p>
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_activite">Nom de l'activité <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_activite">
                            <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                        <!--JSP si il est obligé de mettre la date ou si ça la prend automatiquement-->
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date">Date <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date" id="date" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="rapport_activite">Description<span class="obligate">*</span></label>
                            <textarea class="input-text-RP preActivite" name="rapport_activite" id="rapport_activite" required></textarea>
                        </div>
                    </div>
                    <!--aussi enregistrer le nom de l'animateur qui fait le rapport-->
                    <div class="register-tab-for-btn">
                        <button  type="submit">Enregistrer le rapport d'activité</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
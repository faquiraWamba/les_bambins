<div class="containerOrange">
        <h1>Menu Inscription</h1>
    <a href="index.php?controller=Child&action=CreateChild"> <button type="button" class="button3">Inscrire un enfant au centre</button></a>
        <div class="form_GA">
            <div class="onglet-RP">
                <a href="index.php?controller=RegActivity&action=CreateRegActivity"><button class="onglet active">Inscription activités</button></a>
                <a href="index.php?controller=RegActivity&action=ModifyRegActivity"><button class="onglet">Modifier inscription activités</button></a>
                <a href="index.php?controller=RegCentre&action=ModifyReg"><button class="onglet">Modifier inscription au centre</button></a>
                <a href="index.php?controller=RegCentre&action=ValidReg"><button class="onglet">Valider inscription centre</button></a>
                <a href="index.php?controller=Child_Group&action=CreateGroup"><button class="onglet">Groupe enfant</button></a>
                <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
            </div>
            <div class="form-content-RP">
                <div class="tab-content-GA" style="display: block">
                    <p class="form-title-RP">Inscrire un enfant à une activité</p>
                    <form method='post' action="index.php?controller=Activity&action=CreateActivity">
                        <div class="register-data-form RP">
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <label for="nom_enfant">Nom de l'enfant <span class="obligate">*</span></label>
                                <input type="text" class="input-text-RP" name="nom_enfant" id="nom_enfant" value="" required>
                            </div>
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <label for="prenom_enfant">Prénom de l'enfant <span class="obligate">*</span></label>
                                <input type="number" class="input-text-RP" name="prenom_enfant" id="prenom_enfant" value="" required min=3 max=12>
                            </div>
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <label for="groupe_enfant">Groupe de l'enfant <span class="obligate">*</span></label>
                                <input class="input-text-RP" list="liste_groupe">
                                <datalist id="liste_groupe"><!-- je sais pas comment on reprend de la database-->
                                    <option value="Edge">
                                    <option value="Firefox">
                                </datalist>
                            </div>
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <label for="nom_activite">Groupe de l'enfant <span class="obligate">*</span></label>
                                <input class="input-text-RP" list="liste_activite">
                                <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                                    <option value="Edge">
                                    <option value="Firefox">
                                </datalist>
                            </div>
                        <div class="register-tab-for-btn">
                            <button  type="submit">Créer l'activité</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<div class="containerOrange">
    <h1>Gestion des activités</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=ConsultActivity"><button class="onglet"">Consulter activités</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet">Créer une activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyActivity"><button class="onglet">Modifier une activité</button></a>
            <a href="index.php?controller=Activity&action=ConsultParcours"><button class="onglet">Consulter parcours activité</button></a>
            <a href="index.php?controller=Activity&action=CreateParcours"><button class="onglet active">Créer un parcours activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyParcours"><button class="onglet">Modifier un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Créer parcours activité-->
            <div class="tab-content-GA">
                <p class="form-title-RP">Créer un parcours d'activité</p>
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_parcours">Nom du parcours d'activité <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="nom_parcours" id="nom_parcours" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="liste_activite">Liste des activités <span class="obligate">*</span></label>
                            <input list="liste_activite" class="input-text-RP">
                            <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_deb_parcours">A partir du <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date_deb_parcours" id="date_deb_parcours" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_fin_parcours">Jusqu'au<span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date_fin_parcours" id="date_fin_parcours" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="Tarif_parcours">Tarif<span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="Tarif_parcours" id="Tarif_parcours" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nb_place_parcours">Nombre de places <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="nb_place_parcours" id="nb_place_parcours" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="niveau_parcours">Niveau<span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="niveau_parcours" id="niveau_parcours" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prerequis_parcours">Prérequis<span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP preActivite" name="prerequis_parcours" id="prerequis_parcours">
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="description_parcours">Description<span class="obligate">*</span></label>
                            <textarea type="text" class="input-text-RP descActivite" name="description_parcours" id="description_parcours"></textarea>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="image_parcours">Image d'illustration<span class="obligate">*</span></label>
                            <input type="file" name="image_parcours" id="image_parcours" value="">
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <!-- bouton pour soumettre--><button  type="submit">Créer l'activité</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
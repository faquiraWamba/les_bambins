<div class="containerOrange">
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=ConsultActivity"><button class="onglet"">Consulter activités</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet">Créer une activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyActivity"><button class="onglet active">Modifier une activité</button></a>
            <a href="index.php?controller=Activity&action=ConsultActivity"><button class="onglet">Consulter parcours activité</button></a>
            <a href="index.php?controller=Activity&action=CreateParcours_Activity"><button class="onglet">Créer un parcours activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyParcours_Activity"><button class="onglet">Modifier un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Modifier activité-->
            <div class="tab-content-GA">
                <p class="form-title-RP">Modifier une activité</p>
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
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="tranche_age">Tranche d'âge <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="tranche_age" id="tranche_age" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="type_activite">Type d'activité <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="type_activite" id="type_activite" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="Tarif_activite">Tarif<span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="Tarif_activite" id="Tarif_activite" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nb_place">Nombre de places <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="nb_place" id="nb_place" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="niveau">Niveau<span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="niveau" id="niveau" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prerequis">Prérequis<span class="obligate">*</span></label>
                            <textarea class="input-text-RP preActivite" name="description_activite" id="description_activite"> </textarea>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="description_activite">Description<span class="obligate">*</span></label>
                            <textarea class="input-text-RP descActivite" name="description_activite" id="description_activite"> </textarea>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="image_activite">Image d'illustration<span class="obligate">*</span></label>
                            <input type="file" name="image_activite" id="image_activite" value="">
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <button  type="submit">Modifier l'activité</button>
                        <button  type="submit" class="button2">Supprimer l'activité</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
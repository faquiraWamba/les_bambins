<div class="containerOrange">
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=ConsultActivity"><button class="onglet"">Consulter activités</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet active">Créer une activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyActivity"><button class="onglet">Modifier une activité</button></a>
            <a href="index.php?controller=Activity&action=ConsultActivity"><button class="onglet">Consulter parcours activité</button></a>
            <a href="index.php?controller=Activity&action=CreateParcours_Activity"><button class="onglet">Créer un parcours activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyParcours_Activity"><button class="onglet">Modifier un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Créer activité-->
            <div class="tab-content-GA">
                <form method='post' action="index.php?controller=Activity&action=CreateActivity">
                    <p class="form-title-RP">Créer une activité</p>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_activite">Nom de l'activité <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="nom_activite" id="nom_activite" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="age_min_activite">Age min <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="age_min_activite" id="age_min_activite" value="" required min=3 max=12>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="age_max_activite">Age max <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="age_max_activite" id="age_max_activite" value="" required min=3 max=12>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="type_activite">Type d'activité <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="type_activite" id="type_activite" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="tarif_activite">Tarif<span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="tarif_activite" id="tarif_activite" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nb_places">Nombre de places <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="nb_places" id="nb_places" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="niveau_activite">Niveau<span class="obligate">*</span></label>
                            <select name="niveau_activite" class="input-text-RP" id="niveau_activite" required>
                                <option value="tous niveaux">Tous niveaux</option>
                                <option value="debutant">Débutant</option>
                                <option value="intermediaire">Intermédiaire</option>
                                <option value="avancé">Avancé</option>
                            </select>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prerequis">Prérequis<span class="obligate">*</span></label>
                            <textarea class="input-text-RP preActivite" name="prerequis" id="prerequis" required> </textarea>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="description_activite">Description<span class="obligate">*</span></label>
                            <textarea class="input-text-RP descActivite" name="description_activite" id="description_activite" required> </textarea>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="image_activite">Image d'illustration<span class="obligate">*</span></label>
                            <input type="file" name="image_activite" id="image_activite" value="" required>
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <button  type="submit">Créer l'activité</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="containerOrange">
    <div class="form_GA">
    <div class="onglet-RP">
        <a href="index.php?controller=Activity&action=ConsultActivity"><button class="onglet active"">Consulter activités</button></a>
        <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet">Créer une activité</button></a>
        <a href="index.php?controller=Activity&action=ModifyActivity"><button class="onglet">Modifier une activité</button></a>
        <a href="index.php?controller=Activity&action=ConsultActivity"><button class="onglet">Consulter parcours activité</button></a>
        <a href="index.php?controller=Activity&action=CreateParcours_Activity"><button class="onglet">Créer un parcours activité</button></a>
        <a href="index.php?controller=Activity&action=ModifyParcours_Activity"><button class="onglet">Modifier un parcours activité</button></a>
    </div>
<div class="form-content-RP">
    <!--Consulter activité-->
    <div class="tab-content-GA" style="display: block">
        <h1>reprendre activité</h1>
    </div>
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
    <!--Consulter parcours activité-->
    <div class="tab-content-GA">
        <!-- creprendre fatou-->
    </div>
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
    <!--Modifier parcours activité-->
    <div class="tab-content-GA">
        <p class="form-title-RP">Modifier un parcours d'activité</p>
        <form method='post'>
            <div class="register-data-form RP">
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nom_parcours">Nom du parcours d'activité <span class="obligate">*</span></label>
                    <input list="liste_parcours" class="input-text-RP">
                    <datalist id="liste_parcours"><!-- je sais pas comment on reprend de la database-->
                        <option value="Edge">
                        <option value="Firefox">
                    </datalist>
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
                <!-- bouton pour soumettre--><button  type="submit">Modifier l'activité</button>
                <button  type="submit">Supprimer l'activité</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<div class="containerOrange">
    <h1>Gestion des activités</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=showActivitiesRP"><button class="onglet">Consulter activités</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet">Créer une activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyActivity"><button class="onglet">Modifier une activité</button></a>
            <a href="index.php?controller=Parcours&action=ConsultParcours"><button class="onglet">Consulter parcours activité</button></a>
            <a href="index.php?controller=Parcours&action=CreateParcours"><button class="onglet active">Créer un parcours activité</button></a>
            <a href="index.php?controller=Parcours&action=ModifyParcours"><button class="onglet">Modifier un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Créer parcours activité-->
            <div class="tab-content-GA">
                <p class="form-title-RP">Créer un parcours d'activité</p>
                <form method='post' action="index.php?controller=Parcours&action=CreateParcours">
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="titre_parcours">Nom du parcours d'activité <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="titre_parcours" id="titre_parcours" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="activities">Liste des activités <span class="obligate">*</span></label>
                            <div class="selected-options" id="selectedOptions"></div>
                            <select id="choix" class="input-text-RP" name="activities[]" multiple required>
                                <?php if($activities) {
                                foreach ($activities as $activity){?>
                                <option value="<?= $activity['id_activite']?>"><?= $activity['nom_activite']?></option>
                                <?php }}?>
                            </select>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_debut_parcours">A partir du <span class="obligate">*</span></label>
                            <input type="date" class="input-text-RP" name="date_debut_parcours" id="date_debut_parcours" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_fin_parcours">Jusqu'au<span class="obligate">*</span></label>
                            <input type="date" class="input-text-RP" name="date_fin_parcours" id="date_fin_parcours" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prix_parcours">Tarif<span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="prix_parcours" id="prix_parcours" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nb_places_parcours">Nombre de places <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="nb_places_parcours" id="nb_places_parcours" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="description_parcours">Description<span class="obligate">*</span></label>
                            <textarea type="text" class="input-text-RP descActivite" name="description_parcours" id="description_parcours" required></textarea>
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <!-- bouton pour soumettre--><button  type="submit">Créer parcours</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
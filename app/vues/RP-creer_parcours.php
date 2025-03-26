<div class="containerOrange">
    <h1>Gestion des activités</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=showActivitiesRP"><button class="onglet">Consulter activités</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet">Créer une activité</button></a>
            <a href="index.php?controller=Parcours&action=ConsultParcours"><button class="onglet">Consulter parcours activité</button></a>
            <a href="index.php?controller=Parcours&action=CreateParcours"><button class="onglet active">Créer un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Créer parcours activité-->
            <div class="tab-content-GA">
                
                <?php if(isset($parcours)){?>
                    <p class="form-title-RP">Modifier parcours d'activité</p>
                    <form method='post' action="index.php?controller=Parcours&action=ModifyParcours&id=<?= $parcours["id_parcours"] ?>">
                        <?php }else{?>
                    <p class="form-title-RP">Créer un parcours d'activité</p>
                            <form method='post' action="index.php?controller=Parcours&action=CreateParcours">
                        <?php }?>

                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="titre_parcours">Nom du parcours d'activité <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="titre_parcours" id="titre_parcours" 
                            value="<?= isset($_POST['titre_parcours']) ? htmlspecialchars($_POST['titre_parcours']) : (isset($parcours) ? $parcours["titre_parcours"] : "") ?>" 
                            required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="activities">Liste des activités <span class="obligate">*</span></label>
                            <div class="selected-options" id="selectedOptions"></div>
                            <?php
                            $selectedValues = isset($_POST['activities']) ? $_POST['activities'] : (isset($parcours['activities']) ? $parcours['activities'] : []);
                            ?>

                            <select id="choix" class="input-text-RP" name="activities[]" multiple required 
                                    data-selected='<?= json_encode($selectedValues) ?>'>
                                <?php if (!empty($activities)) { 
                                    foreach ($activities as $activite) {
                                        $selected = in_array($activite['id_activite'], $selectedValues) ? 'selected' : ''; 
                                ?>
                                    <option value="<?= htmlspecialchars($activite['id_activite']) ?>" <?= $selected ?>>
                                        <?= htmlspecialchars($activite['nom_activite']) ?>
                                    </option>
                                <?php }} ?>
                            </select>


                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_debut_parcours">A partir du <span class="obligate">*</span></label>
                            <input type="date" class="input-text-RP" name="date_debut_parcours" id="date_debut_parcours" 
                            value="<?= isset($_POST['date_debut_parcours']) ? htmlspecialchars($_POST['date_debut_parcours']) : (isset($parcours) ? $parcours["date_debut_parcours"] : "") ?>"  
                            required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_fin_parcours">Jusqu'au<span class="obligate">*</span></label>
                            <input type="date" class="input-text-RP" name="date_fin_parcours" id="date_fin_parcours" 
                            value="<?= isset($_POST['date_fin_parcours']) ? htmlspecialchars($_POST['date_fin_parcours']) : (isset($parcours) ? $parcours["date_fin_parcours"] : "") ?>" 
                            required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prix_parcours">Tarif<span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="prix_parcours" id="prix_parcours" 
                            value="<?= isset($_POST['prix_parcours']) ? htmlspecialchars($_POST['prix_parcours']) : (isset($parcours) ? $parcours["prix_parcours"] : "") ?>" 
                            required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nb_places_parcours">Nombre de places <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="nb_places_parcours" id="nb_places_parcours" 
                            value="<?= isset($_POST['nb_places_parcours']) ? htmlspecialchars($_POST['nb_places_parcours']) : (isset($parcours) ? $parcours["nb_places_parcours"] : "") ?>" 
                            required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="description_parcours">Description<span class="obligate">*</span></label>
                            <textarea type="text" class="input-text-RP descActivite" name="description_parcours" id="description_parcours" required>
                            <?= isset($_POST['description_parcours']) ? htmlspecialchars($_POST['description_parcours']) : (isset($parcours) ? htmlspecialchars($parcours["description_parcours"]) : "") ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <!-- bouton pour soumettre--><button  type="submit">
                        <?php if(isset($parcours)){?>
                                Modifier le parcours
                            <?php }else{?>
                                Créer parcours
                            <?php }?>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="containerOrange">
    <h1>Gestion des activités</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=showActivitiesRP"><button class="onglet">Consulter activités</button></a>
            <a href="index.php?controller=Parcours&action=ConsultParcours"><button class="onglet">Consulter parcours activité</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet active">Créer une activité</button></a>
            <a href="index.php?controller=Parcours&action=CreateParcours"><button class="onglet">Créer un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Créer activité-->
            <div class="tab-content-GA">
                <?php if(isset($activity)){?>
                    <form method='post' action="index.php?controller=Activity&action=ModifyActivity&id=<?= $activity["id_activite"] ?>" enctype="multipart/form-data">
                        <p class="form-title-RP">Modifier  activité</p>
                        
                    <?php }else{?>
                            <form method='post' action="index.php?controller=Activity&action=CreateActivity" enctype="multipart/form-data">
                    <p class="form-title-RP">Créer une activité</p>
                        
                            <?php }?>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_activite">Nom de l'activité <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="nom_activite" id="nom_activite" value="<?= isset($_POST['nom_activite']) ? htmlspecialchars($_POST['nom_activite']) : (isset($activity) ? $activity['nom_activite'] : '') ?>" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="age_min_activite">Age min <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="age_min_activite" id="age_min_activite" 
                                value="<?= isset($_POST['age_min_activite']) ? htmlspecialchars($_POST['age_min_activite']) : (isset($activity) ? $activity["age_min_activite"] : "") ?>" 
                                required min="3" max="12">
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="age_max_activite">Age max <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="age_max_activite" id="age_max_activite" 
                                value="<?= isset($_POST['age_max_activite']) ? htmlspecialchars($_POST['age_max_activite']) : (isset($activity) ? $activity["age_max_activite"] : "") ?>" 
                                required min="3" max="12">
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="type_activite">Type d'activité <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="type_activite" id="type_activite" 
                                value="<?= isset($_POST['type_activite']) ? htmlspecialchars($_POST['type_activite']) : (isset($activity) ? $activity["type_activite"] : "") ?>" 
                                required>
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="tarif_activite">Tarif<span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="tarif_activite" id="tarif_activite" 
                                value="<?= isset($_POST['tarif_activite']) ? htmlspecialchars($_POST['tarif_activite']) : (isset($activity) ? $activity["tarif_activite"] : "") ?>" 
                                required>
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nb_places">Nombre de places <span class="obligate">*</span></label>
                            <input type="number" class="input-text-RP" name="nb_places" id="nb_places" 
                                value="<?= isset($_POST['nb_places']) ? htmlspecialchars($_POST['nb_places']) : (isset($activity) ? $activity["nb_places"] : "") ?>" 
                                required>
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="niveau_activite">Niveau<span class="obligate">*</span></label>
                            <select name="niveau_activite" class="input-text-RP" id="niveau_activite" required>
                                <?php
                                $niveau_selected = isset($_POST['niveau_activite']) ? $_POST['niveau_activite'] : (isset($activity) ? $activity["niveau_activite"] : "");
                                ?>
                                <option value="" <?= $niveau_selected == "" ? "selected" : "" ?>>Sélectionner un niveau</option>
                                <option value="tous niveaux" <?= $niveau_selected == "tous niveaux" ? "selected" : "" ?>>Tous niveaux</option>
                                <option value="debutant" <?= $niveau_selected == "debutant" ? "selected" : "" ?>>Débutant</option>
                                <option value="intermediaire" <?= $niveau_selected == "intermediaire" ? "selected" : "" ?>>Intermédiaire</option>
                                <option value="avancé" <?= $niveau_selected == "avancé" ? "selected" : "" ?>>Avancé</option>
                            </select>
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prerequis">Prérequis<span class="obligate">*</span></label>
                            <textarea class="input-text-RP preActivite" name="prerequis" id="prerequis" required><?= isset($_POST['prerequis']) ? htmlspecialchars($_POST['prerequis']) : (isset($activity) ? htmlspecialchars($activity["prerequis"]) : "") ?></textarea>
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="description_activite">Description<span class="obligate">*</span></label>
                            <textarea class="input-text-RP descActivite" name="description_activite" id="description_activite" required maxlength="500"><?= isset($_POST['description_activite']) ? htmlspecialchars($_POST['description_activite']) : (isset($activity) ? htmlspecialchars($activity["description_activite"]) : "") ?></textarea>
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="image_activite">Image d'illustration<span class="obligate">*</span></label>
                            <?php if(isset($activity)){?>
                                <input type="file" name="image_activite" id="image_activite" accept="image/png, image/jpeg, image/jpg, image/gif"  onchange="newPreviewImage(event)">
                                <img id="newImagePreview" src="<?= $activity["img_activite"]?>" alt="Aperçu de l'image" style=" width: 200px; margin-top: 10px;">
                            <?php }else{?>
                                <input type="file" name="image_activite" id="image_activite" accept="image/png, image/jpeg, image/jpg, image/gif" required onchange="previewImage(event)">
                            <?php }?>
                            <img id="imagePreview" src="#" alt="Aperçu de l'image" style="display: none; width: 200px; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        
                        <button  type="submit">
                            <?php if(isset($activity)){?>
                                Modifier l'activité
                            <?php }else{?>
                                Créer l'activité
                            <?php }?>
                    </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="container register-container">

    <h1>
        Inscription du bambin
    </h1>
    <div class="register-tab-container">
        <div class="register-tab-title">
            <p class="register-tab-title-item active-section" id="section-title1">Informations du parent</p>
            <p class="register-tab-title-item" id="section-title2">Informations de l'enfant</p>
            <p class="register-tab-title-item" id="section-title3">Accueil au centre</p>
            <p class="register-tab-title-item" id="section-title4">créneaux d'inscription</p>
        </div>
            
        <form onsubmit="return validateForm();" action="index.php?controller=Parent&action=CreateParent"  method="post" class="register-tab-form">
            <p id="form-error"></p>
            <div class="form-group" id="section1" class="">
                <p class="form-title">Informations Parent</p>
                <div class="register-data-form">
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="nom_parent">Nom du parent <span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="nom_parent" id="nom_parent" value="<?php /* $parent && $parent["nom_parent"]*/?>" required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="prenom_parent">Prénom du parent <span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="prenom_parent" id="prenom_parent" value="" required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="sexe_parent">Sexe<span class="obligate" >*</span></label>
                            <select name="sexe_parent" class="input-text" id="sexe_parent" required>
                                <option value=""></option>
                                <option value="féminin">Femme</option>
                                <option value="masculin">Homme</option>
                            </select>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="email_parent">Email<span class="obligate">*</span></label>
                        <input type="email" class="input-text" name="email_parent" id="email_parent" value=""required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="telephone_parent">Telephone<span class="obligate">*</span></label>
                        <input type="number" class="input-text" name="telephone_parent" id="telephone_parent" value=""required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="rue_parent">Adresse<span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="rue_parent" id="rue_parent" value="" >
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="complement_parent">complément d'adresse</label>
                        <input type="text" class="input-text" name="complement_parent" id="complement_parent" value="">
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="ville_parent">Ville<span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="ville_parent" id="ville_parent" value=""required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="code_postal_parent">Code Postal<span class="obligate">*</span></label>
                        <input type="number" class="input-text" name="code_postal_parent" id="code_postal_parent" value=""required>
                    </div>
                    
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="pays_parent">Pays<span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="pays_parent" id="pays_parent" value=""required>
                    </div>
                    <div class="connexion-link">
                        <span>Vous avez déja un compte?</span>
                        <a href="index.php?controller=Auth&action=login">Connectez vous</a>
                    </div>
                </div>
                <div class="register-tab-for-btn">
                    
                    <button  type="button" id="suivant-btn" onclick="nextSection(event, 1)">Suivant</button>
                </div>
            </div>

            <!-- Informations de l'enfant -->
            <div class="form_group inactive"  id="section2" >

                <div class="register-tab-info"  >
                    <p class="form-title">Informations Enfant</p>
                    <div class="register-data-form">
                        <input type="hidden" name="id_parent" value="PR2190">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_enfant">Nom de l'enfant<span class="obligate">*</span></label>
                            <input type="text" class="input-text" name="nom_enfant" id="nom_enfant" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prenom_enfant">Prénom de l'enfant<span class="obligate">*</span></label>
                            <input type="text" class="input-text" name="prenom_enfant" id="prenom_enfant" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="sexe_enfant">Sexe de l'enfant<span class="obligate">*</span></label>
                            <select name="sexe_enfant" class="input-text" id="" required>
                                <option value="" ></option>
                                <option value="feminin">Fille</option>
                                <option value="masculin">Garçon</option>
                            </select>
                        </div>
                    
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_naissance">Date de naissance<span class="obligate">*</span></label>
                            <input type="date" class="input-text" name="date_naissance" id="date_naissance" value="" required>
                        </div>
                    </div>
                </div>
                <div class="register-tab-info">
                    <p class="form-title">Situation familiale <span class="obligate">*</span></p>
                    <div>
                        <input type="radio" name="type_famille" id="monoparentale" value="monoparentale" required>
                        <label for="monoparentale">Famille monoparentale</label>
                    </div>
                    <div>
                        <input type="radio" name="type_famille" id="nombreuse" value="nombreuse" required>
                        <label for="nombreuse">Famille nombreuse (plus de 5 enfants)</label>
                    </div>
                    <div>
                        <input type="radio" name="type_famille" id="unique" value="unique" required>
                        <label for="unique">Enfant unique</label>
                    </div>
                    <div>
                        <input type="radio" name="type_famille" id="simple" value="simple" required>
                        <label for="simple">Aucun des éléments cités au-dessus</label>
                    </div>
                </div> 
                
                <div class="register-tab-info">
                    <p class="form-title">Dossier médical</p>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <input type="file" class="input-file" name="nom" id="nom" value="" placeholder="cliquez ici pour déposez le dossier médical" required>
                    </div>
                </div>
                <div class="register-tab-info">
                    <p class="form-title">Centre d'intérêt de l'enfant <span class="obligate">*</span></p>
                    <div class="form-interest">


                    <?php  
                        require_once ROOT_PATH . 'app/models/Competence.php';

                        $competence = new Competence();
                        $competences = $competence->GetCompetences();

                        if ($competences) {
                            foreach ($competences as $comp) { ?>
                                <div>
                                    <input type="checkbox" name="competence[]" id="<?= htmlspecialchars($comp["nom_competence"]); ?>" value="<?= htmlspecialchars($comp["id_competence"]); ?>">
                                    <label for="<?= htmlspecialchars($comp["nom_competence"]); ?>"><?= htmlspecialchars($comp["nom_competence"]); ?></label>
                                </div>
                            <?php }
                        } 
                    ?>
            
                    </div>
                    <div class="register-tab-for-btn">
                        <button  type="button" onclick="previousSection(2)">Précédent</button>
                        <button  type="button" onclick="nextSection(2)">Suivant</button>
                    </div>
                </div>
            </div>
            <?php /* } */?>
            <?php  /*if(!$creneau){*/?>
            <div class="form_group inactive"  id="section3" >
                <p class="form-title">Inscription au centre <span class="obligate">*</span></p>
                <input type="hidden" name="enfant_id" value="<?= $enfant?>">
                <div>
                    <input type="checkbox" name="creneau[]" id="creneau" value="périscolaire">
                    <label for="périscolaire">Périscolaire hors mercredi</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau[]" id="vacances" value="">
                    <label for="vacances">Vacances scolaires</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau[]" id="quantine" value="">
                    <label for="quantine">Quantine</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau[]" id="mercredi" value="">
                    <label for="mercredi">Mercredi</label>
                </div>
                <div class="register-tab-for-btn ">
                    <button  type="button" onclick="previousSection(2)">Précédent</button>
                    <button  type="button" onclick="nextSection(2)">Suivant</button>
                </div>
    
            </div>
            <?php /*  } else{*/?>
            <div class="form_group inactive"  id="section4" >
            
                <div class="inscription-group-container inactive" id="section4">
                    <p class="form-title">Les jours d'inscriptions</p>
                    <div class="inscription-group-days-container">
                        <?php $jours=['lundi','mardi','mercredi','jeudi','vendredi'];
                            foreach($jours as $jour){
                        ?>
                                <div class="inscription-group-day-item">
                                    <p class="inscription-group-item-title"><?= $jour ?></p>
                                    <div class="inscripton-days">
                                    
                                        <div>
                                            <input type="checkbox" name="matin" id="matin" value="">
                                            <label for="matin">Matin</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="apres-midi" id="apres-midi" value="">
                                            <label for="apres-midi">Après-midi</label>
                                        </div>
                                        <div >
                                            <input type="checkbox" name="soir" id="soir" value="">
                                            <label for="soir">Soir</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" name="repas" id="repas" value="">
                                            <label for="repas">Repas</label>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                        
                    </div>
                    
                </div>
                <div class="inscription-group-holiday-container" id="holiday">
                    <p class="form-title">Inscription durant les vacances scolaires</p>
                    <div class="inscription-group-item">
                        <div>
                            <input type="checkbox" name="" id="" value="">
                            <label for="">Les vacances de la toussaint</label>
                        </div>
                        <div>
                            <input type="checkbox" name="" id="" value="">
                            <label for="">Les vacances de Noel</label>
                        </div>
                        <div >
                            <input type="checkbox" name="" id="" value="">
                            <label for="">Les vacances d'hiver</label>
                        </div>
                        <div>
                            <input type="checkbox" name="" id="" value="">
                            <label for="">Les vacances de printemps</label>
                        </div>
                        <div>
                            <input type="checkbox" name="" id="" value="">
                            <label for="">Les vacances d'été</label>
                        </div>

                    </div>
                    
                </div>
                <div class="register-tab-for-btn ">
                    <button onclick="previousSection(4)" type="button">Précédent</button>
                    <button  type="submit">Valider l'inscripton</button>
                </div>
            </div>
        </form> 
            <?php /*}*/?>
            
            
    </div>
    
</div>

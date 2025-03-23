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
            
        <form onsubmit="return nextSection(event, 4);" action="index.php?controller=Child&action=CreateChild"  method="post" class="register-tab-form" id="createChildscarsh">
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
                </div>
                <p class="connexion-link">
                    Vous avez déja un compte?
                    <a href="index.php?controller=Auth&action=login">Connectez vous</a>
                </p>
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
                        <p id="date-message" class="inactive">Le centre n'accepte que les enfants de 3 à 12 ans.</p>

                    </div>
                </div>
                <div class="register-tab-info">
                    <p class="form-title">Situation familiale <span class="obligate">*</span></p>
                    <p id="radio-message" class="inactive">Veuillez sélectionner votre type de famille.</p>
                    <div >
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
                
                <!-- <div class="register-tab-info">
                    <p class="form-title">Dossier médical</p>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <input type="file" class="input-file" name="nom" id="nom" value="" placeholder="cliquez ici pour déposez le dossier médical" required>
                    </div>
                </div> -->
                <div class="register-tab-info">
                    <p class="form-title ">Centre d'intérêt de l'enfant <span class="obligate">*</span></p>
                    <p id="error-message" class="inactive">Veuillez sélectionner au moins une compétence.</p>

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
                        <button  type="button" onclick="nextSection(event,2)">Suivant</button>
                    </div>
                </div>
            </div>
            <div class="form_group inactive"  id="section3" >
                <p id="slot-message" class="inactive">Veuillez sélectionner au moins un créneau.</p>
                <p class="form-title">Inscription au centre <span class="obligate">*</span></p>
                <div>
                    <input type="checkbox" name="creneau[]" id="périscolaire" value="periscolaire">
                    <label for="périscolaire">Périscolaire hors mercredi</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau[]" id="vacances" value="vacances">
                    <label for="vacances">Vacances scolaires</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau[]" id="quantine" value="quantine">
                    <label for="quantine">Quantine</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau[]" id="mercredi" value="mercredi">
                    <label for="mercredi">Mercredi</label>
                </div>
                <!-- <div class="allergies inactive">
                    <p  class="form-title">Des Allergies à Signaler ??</p>
                            
                    <?php 
                        // $allergies=["fruits à coque et arachides","produits laitiers","gluten","oeufs","poissons et fruits de mer","soja et légumineuses","sésame"];
                        // foreach($allergies as $allergie){?>
                    
                        <div>
                            <input type="checkbox" name="allergies[]" id="" value="">
                            <label for=""></label>
                        </div>
                    <?php ?>
                </div> -->
                <div class="register-tab-for-btn ">
                    <button  type="button" onclick="previousSection(3)">Précédent</button>
                    <button  type="button" onclick="nextSection(event, 3)">Suivant</button>

                </div>
    
            </div>
            

            <div class="form_group inactive"  id="section4" >
                <p class="form-title">Les Créneaux d'inscriptions</p>
                <div class="inscription-group-container inactive" id="slot_periscolaire">
                    <p class="form-title">Les jours d'inscriptions</p>
                    <p id="slot-days-message-periscolaire" class="inactive">Veuillez choisir au moins un créneau pour le périscolaire</p>
                    <div class="inscription-group-day-container">
                        <?php $jours=['lundi','mardi','mercredi','jeudi','vendredi'];
                            foreach($jours as $jour){
                        ?>
                            <div class="inscription-group-day-item">
                                <p  class="inscription-group-item-title"><?=$jour?></p>
                                <div class="inscripton-days">
                                
                                    <div>
                                        <input type="checkbox" name=<?="periode_periscolaire[$jour][]" ?> id="matin" value="matin"class="slot_day">
                                        <label for="matin">Matin</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name=<?="periode_periscolaire[$jour][]" ?> id="apres-midi" value="apres-midi"class="slot_day">
                                        <label for="apres-midi">Après-midi</label>
                                    </div>
                                    <div >
                                        <input type="checkbox" name=<?="periode_periscolaire[$jour][]" ?> id="soir" value="soir" class="slot_day">
                                        <label for="soir">Soir</label>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="inscription-group-container inactive" id="slot_quantine">
                
                    <p class="form-title">Jours de Quantine</p>
                    <p id="slot-days-message-quantine" class="inactive">Veuillez choisir au moins un créneau pour la quantine</p>
                    <div class="inscripton-days">
                        <div>
                            <input type="checkbox" name="periode_quantine[]" id="lundi" value="lundi" class="slot_day">
                            <label for="lundi">Lundi</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_quantine[]" id="mardi" value="mardi" class="slot_day">
                            <label for="mardi">Mardi</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_quantine[]" id="mercredi" value="mercredi" class="slot_day">
                            <label for="mercredi">Mercredi</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_quantine[]" id="jeudi" value="jeudi" class="slot_day">
                            <label for="jeudi">Jeudi</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_quantine[]" id="vendredi" value="vendredi" class="slot_day">
                            <label for="vendredi">Vendredi</label>
                        </div>
                    </div>
                </div>
                <div class="inscription-group-container inactive" id="slot_mercredi">
                    
                    <p class="form-title">Période du Mercredi</p>
                    <p id="slot-days-message-mercredi" class="inactive">Veuillez choisir au moins un créneau pour le mercredi</p>
                    <div class="inscripton-days">
                        <div>
                            <input type="checkbox" name="periode_mercredi[]" id="matin" value="matin" class="slot_day">
                            <label for="matin">Matin</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_mercredi[]" id="apres-midi" value="apres-midi" class="slot_day">
                            <label for="apres-midi">Après-midi</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_mercredi[]" id="journée" value="journée" class="slot_day">
                            <label for="matin">Journée</label>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="inscription-group-holiday-container inactive" id="slot_holiday">
                    <p class="form-title">Inscription durant les vacances scolaires</p>
                    <p id="slot-days-message-holiday" class="inactive">Veuillez choisir au moins un créneau de vacances</p>
                    <div class="inscription-group-item">
                        <div>
                            <input type="checkbox" name="periode_vacances[]" id="automne" value="automne" class="slot_day">
                            <label for="">Les vacances d'automne (toussaint)</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_vacances[]" id="noel" value="noel" class="slot_day">
                            <label for="">Les vacances de Noël</label>
                        </div>
                        <div >
                            <input type="checkbox" name="periode_vacances[]" id="hiver" value="hiver" class="slot_day">
                            <label for="">Les vacances d'hiver</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_vacances[]" id="printemps" value="printemps" class="slot_day">
                            <label for="">Les vacances de printemps (Pâques)</label>
                        </div>
                        <div>
                            <input type="checkbox" name="periode_vacances[]" id="été" value="été" class="slot_day">
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

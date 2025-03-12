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
            

        <div class="register-tab-form">
            <form action="index.php?controller=Parent&action=CreateParent" method='post'  id="section1" class=" ">
                <p class="form-title">Informations Parent</p>
                <div class="register-data-form">
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="nom_parent">Nom du parent <span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="nom_parent" id="nom_parent" value="" required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="prenom_parent">Prénom du parent <span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="prenom_parent" id="prenom_parent" value="" required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="sexe_parent">Sexe<span class="obligate">*</span></label>
                            <select name="sexe_parent" class="input-text" id="" required>
                                <option value="feminin">Femme</option>
                                <option value="masculin">Homme</option>
                            </select>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="email">Email<span class="obligate">*</span></label>
                        <input type="email" class="input-text" name="email" id="email" value=""required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="telephone">Telephone<span class="obligate">*</span></label>
                        <input type="number" class="input-text" name="telephone" id="telephone" value=""required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="rue">Adresse<span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="rue" id="rue" value="" requiredd>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="complement">complément d'adresse</label>
                        <input type="text" class="input-text" name="complement" id="complement" value=""required>
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="ville">Ville<span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="ville" id="ville" value="">
                    </div>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="code_postal_parent">Code Postal<span class="obligate">*</span></label>
                        <input type="number" class="input-text" name="code_postal_parent" id="code_postal_parent" value="">
                    </div>
                    
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="pays">Pays<span class="obligate">*</span></label>
                        <input type="text" class="input-text" name="pays" id="pays" value="">
                    </div>
                    <div class="connexion-link">
                        <span>Vous avez déja un compte?</span>
                        <a href="index.php?controller=Auth&action=login">Connectez vous</a>
                    </div>
                </div>
                <div class="register-tab-for-btn">
                    <button  type="submit" onclick="nextSection(1)">Suivant</button>
                </div>
            </form>
            <form action='index.php?controller=Child&action=CreateChild' method='post'  id="section2" class="inactive">
                <div class="register-tab-info">
                    <p class="form-title">Informations Enfant</p>
                    <div class="register-data-form">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_enfant">Nom de l'enfant<span class="obligate">*</span></label>
                            <input type="text" class="input-text" name="nom_enfant" id="nom_enfant" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prenom_enfant">Prénom de l'enfant<span class="obligate">*</span></label>
                            <input type="text" class="input-text" name="prenom_enfant" id="prenom_enfant" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prenom">Sexe de l'enfant<span class="obligate">*</span></label>
                            <select name="" class="input-text" id="">
                                <option value="feminin">Fille</option>
                                <option value="masculin">Garçon</option>
                            </select>
                        </div>
                    
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="birthday">Date de naissance<span class="obligate">*</span></label>
                            <input type="date" class="input-text" name="birthday" id="birthday" value="">
                        </div>
                    </div>
                </div>
                <div class="register-tab-info">
                    <p class="form-title">Situation familiale <span class="obligate">*</span></p>
                    <div>
                        <input type="radio" name="monoparentale" id="monoparentale" value="">
                        <label for="monoparentale">Famille monoparentale</label>
                    </div>
                    <div>
                        <input type="radio" name="nombreuse" id="nombreuse" value="">
                        <label for="nombreuse">Famille nombreuse (plus de 5 enfants)</label>
                    </div>
                    <div>
                        <input type="radio" name="unique" id="unique" value="">
                        <label for="unique">Enfant unique</label>
                    </div>
                    <div>
                        <input type="radio" name="none" id="none" value="">
                        <label for="none">Aucun des éléments cités au-dessus</label>
                    </div>
                </div>
                
                <div class="register-tab-info">
                    <p class="form-title">Dossier médical</p>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <input type="file" class="input-file" name="nom" id="nom" value="" placeholder="cliquez ici pour déposez le dossier médical">
                    </div>
                </div>
                <div class="register-tab-info">
                    <p class="form-title">Centre d'intérêt de l'enfant <span class="obligate">*</span></p>
                    <div class="form-interest">


                    <?php  if (isset($competences)){
                            foreach($competences as $competence) {;?>
                                <div >
                                    <input type="checkbox" name="<?php $competence["nom_competence"]?>" id="<?php $competence["nom_competence"]?>" value="<?php $competence["nom_competence"]?>">
                                    <label for="<?php $competence["nom_competence"]?>"><?php echo $competence["nom_competence"]?></label>
                                </div>
                            <?php  }
                        } ?>
            
                    </div>
                </div>
                <div class="register-tab-for-btn">
                    <button onclick="previousSection(2)" type="button">Précédent</button>
                    <button onclick="nextSection(2)" type="button">Suivant</button>
                </div>
               
            </form>
            <form action='#' method='post'  id="section3" class=" inactive">
                <p class="form-title">Inscription au centre <span class="obligate">*</span></p>
                <div>
                    <input type="checkbox" name="creneau" id="creneau" value="">
                    <label for="creneau">Périscolaire hors mercredi</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau" id="creneau" value="">
                    <label for="creneau">Vacances scolaires</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau" id="creneau" value="">
                    <label for="creneau">Quantine</label>
                </div>
                <div>
                    <input type="checkbox" name="creneau" id="creneau" value="">
                    <label for="creneau">Mercredi</label>
                </div>
                <div class="register-tab-for-btn ">
                    <button onclick="previousSection(3)" type="button">Précédent</button>
                    <button onclick="nextSection(3)" type="button">Suivant</button>
                </div>
                
            </form>
            <form class=" inactive " id="section4" action='#' method='post'>
                <div class="inscription-group-container">
                    <p class="form-title">Les jours d'inscriptions</p>
                    <div class="inscription-group-days-container">
                        <?php $jours=['lundi','mardi','mercredi','jeudi','vendredi'];
                            foreach($jours as $jour){
                        ?>
                                <div class="inscription-group-day-item">
                                    <p class="inscription-group-item-title"><?php echo $jour ?></p>
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
                    <button action="" type="submit">Valider l'inscripton</button>
                </div>
                
            </form>
            
            
        </div>
            
            
    </div>
    
</div>

<div class="containerOrange">
    <h1>Menu Inscription</h1>
    <a href="index.php?controller=Reg&action=CreateReg"><button class="button3" >Inscrire un enfant au centre</button></a>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=RegActivity&action=CreateRegActivity"><button class="onglet">Inscription activités</button></a>
            <a href="index.php?controller=RegActivity&action=ModifyRegActivity"><button class="onglet">Modifier inscription activités</button></a>
            <a href="index.php?controller=RegCentre&action=ModifyReg"><button class="onglet active">Modifier inscription au centre</button></a>
            <a href="index.php?controller=RegCentre&action=ValidReg"><button class="onglet">Valider inscription centre</button></a>
            <a href="index.php?controller=Child_Group&action=CreateGroup"><button class="onglet">Groupe enfant</button></a>
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
        </div>
        <div class="form-content-RP">
            <div class="tab-content-GA" style="display: block">
                <p class="form-title-RP">Modification des inscriptions aux activités</p>
                <form method='post' action="index.php?controller=RegActivity&action=CreateActivity">
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_enfant">Nom de l'enfant <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_enfant">
                            <datalist id="liste_enfant"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="prenom_enfant">Prénom de l'enfant <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_enfant">
                            <datalist id="liste_enfant"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_naissance">Date de naissance<span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date_naissance" id="date_naissance" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="sexe">Sexe<span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="sexe" id="sexe" value=""required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="groupe_enfant">Prénom de l'enfant <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_groupe">
                            <datalist id="liste_groupe"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                        <p class="form-title">Les jours d'inscriptions</p>
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
                        <div class="register-tab-for-btn">
                            <button  type="submit">Enregistrer les modificationss</button>
                            <button  type="submit" class="button2">Supprimer l'inscription</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
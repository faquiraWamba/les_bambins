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
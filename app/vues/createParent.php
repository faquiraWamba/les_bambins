<form onsubmit="return validateForm();" action="index.php?controller=Parent&action=CreateParent"  method="post" id="section1" class="">
    <p id="form-error"></p>
    <p class="form-title">Informations Parent</p>
    <div class="register-data-form">
        <div class="register-tab-form-item register-tab-holiday-item">
            <label for="nom_parent">Nom du parent <span class="obligate">*</span></label>
            <input type="text" class="input-text" name="nom_parent" id="nom_parent" value="<?php $parent && $parent["nom_parent"]?>" required>
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
        <button  type="submit">Suivant</button>
    </div>
</form>
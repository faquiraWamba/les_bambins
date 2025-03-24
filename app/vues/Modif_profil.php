<div class="containerOrange">
    <div class="containbox">
        <form method='post'>
            <div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nom_administrateur" class="InfoModif">Nom<span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP InfoModif" name="nom_administrateur" id="nom_administrateur" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="prenom_administrateur" class="InfoModif">Prénom<span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP InfoModif" name="prenom_administrateur" id="prenom_administrateur" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="mail_administrateur" class="InfoModif">Adresse Mail<span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP InfoModif" name="mail_administrateur" id="mail_administrateur" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="tel_administrateur" class="InfoModif">Numéro de téléphone<span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP InfoModif" name="tel_administrateur" id="tel_administrateur" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="adresse_administrateur" class="InfoModif">Adresse<span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP InfoModif" name="adresse_administrateur" id="adresse_administrateur" value="" required>
                </div>
            </div>
            <div class="register-tab-for-btn">
                <a href="index.php?controller=User&action=ModifyProfil"><button  type="submit">Enregistrer les changements</button></a><!--pour que ça ramène à la page profile en même temps-->
            </div>
        </form>
    </div>
</div>
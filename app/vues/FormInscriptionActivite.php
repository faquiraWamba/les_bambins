<div class="containerOrange">
    <h1>Inscrire mon enfant à une activité</h1>
    <div class="containbox">
        <form method='post' action="index.php?controller=Activity&action=CreateActivity">
            <div class="register-data-form RP">

                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nom_enfant">Nom de l'enfant <span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP" name="nom_enfant" id="nom_enfant" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="activite">Nom de l'activité <span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP" name="activite" id="activite" value="" required min=3 max=12>
                </div>
                <div class="register-tab-for-btn">
                    <button  type="submit">Inscrire</button>
                </div>
            </div>
        </form>
    </div>

</div>
<form action='#' method='post'  id="section3" class=" inactive">
    <p class="form-title">Inscription au centre <span class="obligate">*</span></p>
    <input type="hidden" name="enfant_id" value="<?= $enfant?>">
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
        <button type="submit">Suivant</button>
    </div>
    
</form>
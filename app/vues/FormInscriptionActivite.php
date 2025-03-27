<div class="containerOrange">
    <h1>Inscrire mon enfant à l'activité : <?= $activity['nom_activite'] ?></h1>
    <div class="containbox">
        <form method='post' action="index.php?controller=RegActivity&action=CreateRegActivity">
            <div class="register-data-form RP">

                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="id_enfant">Nom de l'enfant <span class="obligate">*</span></label>
                    <select class="input-text-RP" name="id_enfant" id="id_enfant" required>
                        <?php if (isset($children)) {
                            foreach ($children as $child) { ?>
                                <option value="<?= $child['id_enfant'] ?>"><?= $child['nom_enfant'] ?> <?= $child['prenom_enfant'] ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="activite">Nom de l'activité <span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP" name="activite" id="activite" value="<?= $activity['nom_activite'] ?>" readonly>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="date_debut_activite">Date de début <span class="obligate">*</span></label>
                    <input type="date" class="input-text-RP" name="date_debut_activite" id="date_debut_activite" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="date_fin_activite">Date de fin <span class="obligate">*</span></label>
                    <input type="date" class="input-text-RP" name="date_fin_activite" id="date_fin_activite" required>
                </div>
                <!-- <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="rabais">Rabais (%)</label>
                    <input type="number" class="input-text-RP" name="rabais" id="rabais" min="0" max="100">
                </div> -->
                <input type="hidden" name="id_activite" value="<?= $activity['id_activite'] ?>">
                <div class="register-tab-for-btn">
                    <button type="submit">Inscrire</button>
                </div>
            </div>
        </form>
    </div>
</div>

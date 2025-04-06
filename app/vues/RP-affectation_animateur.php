<div class="containerOrange">
    <h1>Gestion du centre</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Facture&action=showFacture"><button class="onglet">Facture</button></a>
            <a href="index.php?controller=Reunion&action=showReunion"><button class="onglet">Réunion</button></a>
            <a href="index.php?controller=Questionnaire&action=showQuestionnaire"><button class="onglet">Questionnaire</button></a>
            <a href="index.php?controller=ActivityAnimator&action=showAffectation"><button class="onglet active">Affectation animateur</button></a>
        </div>

        <div class="form-content-RP">
            <div class="tab-content-GA">
                <p class="form-title-RP">Affecter un animateur à une activité</p>
                <form method="post" action="index.php?controller=ActivityAnimator&action=assignAnimator">
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="id_activite">Nom de l'activité</label>
                            <select class="input-text-RP" name="id_activite" id="id_activite" required>
                                <option value="">Choisissez une activité</option>
                                <?php foreach ($activities as $activity) { ?>
                                    <option value="<?= htmlspecialchars($activity['id_activite']) ?>">
                                        <?= htmlspecialchars($activity['nom_activite']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="id_animateur">Nom de l'animateur</label>
                            <select class="input-text-RP" name="id_animateur" id="id_animateur" required>
                                <option value="">Choisissez un animateur</option>
                                <?php foreach ($animators as $animator) { ?>
                                    <option value="<?= htmlspecialchars($animator['id_animateur']) ?>">
                                        <?= htmlspecialchars($animator['nom_personnel'] . ' ' . $animator['prenom_personnel']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <button type="submit">Affecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

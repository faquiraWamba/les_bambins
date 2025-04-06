<div class="containerOrange">
    <h1>Inscrire mon enfant au parcours : <?= htmlspecialchars($parcours['titre_parcours'] ?? 'Parcours inconnu') ?></h1>
    <div class="containbox">
        <form method="post" action="index.php?controller=RegParcours&action=inscrireEnfantParcours">
            <div class="register-data-form RP">
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="id_enfant">Nom de l'enfant <span class="obligate">*</span></label>
                    <select class="input-text-RP" name="id_enfant" id="id_enfant" required>
                        <?php if (isset($children)) {
                            foreach ($children as $child) { ?>
                                <option value="<?= htmlspecialchars($child['id_enfant']) ?>"><?= htmlspecialchars($child['nom_enfant']) ?> <?= htmlspecialchars($child['prenom_enfant']) ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="parcours">Nom du parcours <span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP" name="parcours" id="parcours" value="<?= htmlspecialchars($parcours['titre_parcours'] ?? '') ?>" readonly>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="prix_parcours">Prix du parcours</label>
                    <input type="text" class="input-text-RP" name="prix_parcours" id="prix_parcours" value="<?= htmlspecialchars($parcours['prix_parcours'] ?? '') ?> €" readonly>
                </div>
                <input type="hidden" name="id_parcours" value="<?= htmlspecialchars($parcours['id_parcours'] ?? '') ?>">
                <div class="register-tab-for-btn">
                    <button type="submit">Inscrire</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="containerOrange">
    <h1>Suivi des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet active">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet">Suivi pédagogique</button></a>
            <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet">Suivi des présences</button></a>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur" || $_SESSION['role'] == "parent")) { ?>
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoringM"><button class="onglet">Suivi médical</button></a>
            <?php } ?>
        </div>

        <div class="form-content-RP">
            <div class="tab-content-GA">
                <?php if (isset($_SESSION['role'])) {
                    if (($_SESSION['role'] == "parent")) { ?>

                        <table class="table-RP">
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Groupe</th>
                            </tr>
                            <?php if (isset($enfantsInscrits) && !empty($enfantsInscrits)) {
                                foreach ($enfantsInscrits as $enfant) { ?>
                                    <tr>
                                        <td><a href="index.php?controller=Child&action=showProfilEnfant&id=<?= $enfant['id_enfant'] ?>" class="lien"><?= $enfant['nom_enfant'] ?></a></td>
                                        <td><?= $enfant['prenom_enfant'] ?></td>
                                        <td><?= $enfant['date_naissance'] ?></td>
                                        <td><?= $enfant['numero_groupe'] ?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="4">Aucun enfant inscrit trouvé.</td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php } }?>
                <?php if (isset($_SESSION['role'])) {
                    if (($_SESSION['role'] == "animateur") || ($_SESSION['role'] == "administrateur") || ($_SESSION['role'] == "accompagnateur")) { ?>


                        <p class="form-title-RP">Enregistrement d'un nouveau suivi comportemental</p>

                <form method="post" action="index.php?controller=ChildMonitoringComportement&action=addComportement" onsubmit="return validateFormSuivi()">
                    <div class="register-data-form RP">
                        <!-- Input de recherche -->
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <input type="text" id="searchInput" class="input-text-RP" onkeyup="searchChildren()" placeholder="Rechercher un enfant">
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <input type="hidden" class="input-text-RP" id="selectedChildId" name="id_enfant">
                        </div>
                        <div id="searchResults" class="input-text-RP"></div>
                    </div>

                        <div class="register-data-form RP">
                                <div class="register-tab-form-item register-tab-holiday-item">
                                    <label for="type">Type <span class="obligate">*</span></label>
                                    <select class="input-text-RP" name="type" required>
                                        <option value="">Choisissez un type</option>
                                        <option value="Positif">Positif</option>
                                        <option value="Négatif">Négatif</option>
                                    </select>
                                </div>
                                <div class="register-tab-form-item register-tab-holiday-item">
                                    <label for="description_comportemental">Description <span class="obligate">*</span></label>
                                    <textarea type="text" class="input-text-RP descActivite" name="description_comportemental" id="description_comportemental" required></textarea>
                                </div>
                                <div class="register-tab-for-btn">
                                    <button type="submit">Enregistrer un suivi comportemental</button>
                                </div>
                            </div>

                </form>
                <?php } } ?>
                <p class="form-title-RP">Historique du suivi comportemental</p>
                <table class="table-RP">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody id="historyTableBody">
                        <?php if (isset($historique) && !empty($historique)) {
                            foreach ($historique as $suivi) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($suivi['created_at']) ?></td>
                                    <td><?= htmlspecialchars($suivi['type_comportement']) ?></td>
                                    <td><?= htmlspecialchars($suivi['description_comportement']) ?></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="3">Sélectionnez un enfant pour afficher son historique.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
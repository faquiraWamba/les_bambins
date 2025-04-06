<div class="containerOrange">
    <h1>Suivi des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet">Suivi pédagogique</button></a>
            <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet">Suivi des présence</button></a>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur" || $_SESSION['role'] == "parent")) { ?>
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoring"><button class="onglet active">Suivi médical</button></a>
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


                <form method='post'>
                    <div class="register-data-form RP">
                        <!-- Input de recherche -->
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <input type="text" id="searchInput" class="input-text-RP" onkeyup="searchChildren()" placeholder="Rechercher un enfant">
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <input type="hidden" class="input-text-RP" id="selectedChildId" name="id_enfant">
                        </div>
                        <div id="searchResults" class="input-text-RP" ></div>
                    </div>
                </form>
                    <p class="form-title-RP">Personne à contacter en cas d'urgence</p>
                <div>
                    <h3>Numéro de téléphone :</h3>
                    <p><?php echo htmlspecialchars($telephone_parent); ?></p>
                </div>

                <p class="form-title-RP">Enregistrer un suivi médical</p>
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date">Date <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date" id="date" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="Descriptif">Type <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_type">
                            <datalist id="liste_type">
                                <option value="Incident">
                                <option value="Succès">
                                <option value="Spécifique">
                            </datalist>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="description_comportemental">Description<span class="obligate">*</span></label>
                            <textarea type="text" class="input-text-RP descActivite" name="description_comportemental" id="description_comportemental" required></textarea>
                        </div>
                        <div class="register-tab-for-btn">
                            <button  type="submit">Enregistrer un suivi médical</button>
                        </div>
                    </div>
                </form>
                <?php } }?>
                <p class="form-title-RP">Historique du Suivi Médical</p>
                <table class="table-RP">
                    <tr>
                        <th>Date</th>
                        <th>Type de suivi</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td>Parent prof</td>
                        <td>13/06/2025</td>
                        <td>19h</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
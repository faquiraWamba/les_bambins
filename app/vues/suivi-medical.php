<div class="containerOrange">
    <h1>Suivi médical</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet">Suivi pédagogique</button></a>
            <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet">Suivi des présences</button></a>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur" || $_SESSION['role'] == "parent")) { ?>
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoringM"><button class="onglet active">Suivi médical</button></a>
            <?php } ?>
        </div>

        <div class="form-content-RP">
            <div class="tab-content-GA">
                <p class="form-title-RP">Rechercher un enfant</p>
                <form method="post" action="index.php?controller=ChildMonitoringMed&action=addMedicalRecord" onsubmit="return validateFormSuivi()">
                    <div class="register-data-form RP">
                         <!-- Input de recherche -->
                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "parent") { ?>
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <input type="text" id="searchParentInput" class="input-text-RP" onkeyup="searchParentChildren()" placeholder="Rechercher un enfant">
                            </div>
                        <?php } else { ?>
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <input type="text" id="searchInput" class="input-text-RP" onkeyup="searchChildren()" placeholder="Rechercher un enfant">
                            </div>
                        <?php } ?>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <input type="hidden" class="input-text-RP" id="selectedChildId" name="id_enfant">
                        </div>
                        <div id="searchResults" class="input-text-RP"></div>
                    </div>

                    <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "animateur" || $_SESSION['role'] == "administrateur" || $_SESSION['role'] == "accompagnateur")) { ?>
                        <p class="form-title-RP">Enregistrement d'un nouveau suivi médical</p>
                        <div class="register-data-form RP">
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <label for="type">Type <span class="obligate">*</span></label>
                                <input class="input-text-RP" list="liste_type" name="type_suivi" required>
                                <datalist id="liste_type">
                                    <option value="Prise de traitement">
                                    <option value="Incident">
                                </datalist>
                            </div>
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <label for="description">Description <span class="obligate">*</span></label>
                                <textarea class="input-text-RP descActivite" name="description_suivi" id="description" required></textarea>
                            </div>
                            <div class="register-tab-for-btn">
                                <button type="submit">Enregistrer un suivi médical</button>
                            </div>
                        </div>
                    <?php } ?>
                </form>

                <p class="form-title-RP">Historique du suivi médical</p>
                <table class="table-RP">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody id="historyTableBodyMedical">
                        <?php if (isset($historique) && !empty($historique)) {
                            foreach ($historique as $suivi) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($suivi['date']) ?></td>
                                    <td><?= htmlspecialchars($suivi['type']) ?></td>
                                    <td><?= htmlspecialchars($suivi['description']) ?></td>
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
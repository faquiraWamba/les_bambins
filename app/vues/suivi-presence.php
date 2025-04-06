<div class="containerOrange">
    <h1>Suivi des présences</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet">Suivi pédagogique</button></a>
            <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet active">Suivi des présences</button></a>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur" || $_SESSION['role'] == "parent")) { ?>
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoringM"><button class="onglet">Suivi médical</button></a>
            <?php } ?>
        </div>

        <div class="form-content-RP">
            <div class="tab-content-GA">
                <form method="get" action="index.php">
                    <input type="hidden" name="controller" value="ChildMonitoringPresence">
                    <input type="hidden" name="action" value="showChildMonitoringPresence">
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
                </form>

                <p class="form-title-RP">Historique des présences</p>
                <table class="table-RP">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Activité</th>
                            <th>Présence</th>
                            <th>Projet réalisé</th>
                        </tr>
                    </thead>
                    <tbody id="historyTableBodyPresence">
                        <?php if (isset($historique) && !empty($historique)) { ?>
                            <?php foreach ($historique as $presence) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($presence['date_presence']) ?></td>
                                    <td><?= htmlspecialchars($presence['nom_activite']) ?></td>
                                    <td><?= htmlspecialchars($presence['etat_presence_activite']) ?></td>
                                    <td><?= htmlspecialchars($presence['projet_realise'] ?? 'Aucun projet') ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="4">Sélectionnez un enfant pour afficher son historique.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
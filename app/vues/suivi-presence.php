<div class="containerOrange">
    <h1>Suivi des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet">Suivi pédagogique</button></a>
                <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet active">Suivi des présence</button></a>
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
                <?php }} ?>
                <?php if (isset($_SESSION['role'])) {
                    if (($_SESSION['role'] == "parent")) { ?>
                        <p class="form-title-RP">Notifier d'une abscence</p>
                        <form>
                            <div class="register-data-form RP">
                                <div class="register-tab-form-item register-tab-holiday-item">
                                    <label for="Date_abs">Date <span class="obligate">*</span></label>
                                    <input type="Date" class="input-text-RP" name="Date_abs" id="Date_abs" value=" " required>
                                </div>

                                <div class="register-tab-form-item register-tab-holiday-item">
                                    <label for="justif">Justification <span class="obligate">*</span></label>
                                    <textarea type="number" class="input-text-RP" name="justif" id="justif"  value="" required min="3" max="12"></textarea>
                                </div>
                                <button  type="submit">Enregistrer l'absence</button>
                            </div>
                        </form>
                    <?php }} ?>
                <p class="form-title-RP">Historique des présences</p>
                <table class="table-RP">
                    <tr>
                        <th>Date abscence</th>
                        <th>Justification</th><!-- on doit rajouter un champ à la BDD je crois :( -->
                        <th>Nombre total d'absence</th>
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
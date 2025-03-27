<div class="containerOrange">
    <h1>Suivi des enfants</h1>
    <?php if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "administrateur") { ?>
            <a href="index.php?controller=Child&action=CreateChild"> <button type="button" class="button3">Inscrire un enfant au centre</button></a>
        <?php }} ?>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet active">Informations enfants</button></a>
            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet">Suivi pédagogique</button></a>
            <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet">Suivi des présence</button></a>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur" || $_SESSION['role'] == "parent")) { ?>
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoringM"><button class="onglet">Suivi médical</button></a>
            <?php } ?>
        </div>

        <div class="form-content-RP">
            <div class="tab-content-GA" style="display: block">
                <?php if (isset($_SESSION['role'])) {
                if (($_SESSION['role'] == "animateur") || ($_SESSION['role'] == "administrateur")) { ?>
                <p class="form-title-RP">Enfants inscrits au centres</p>
                <?php } } ?>
    <form method='post' action="index.php?controller=Child&action=searchChild">
        <div class="register-data-form RP">
            <div class="register-tab-form-item register-tab-holiday-item">
                <label for="nom_enfant">Nom de l'enfant </label>
                <input class="input-text-RP" id="nom_enfant" name="nom_enfant" list="liste_enfants">
                <datalist id="liste_enfants">
                    <!-- Les options seront ajoutées dynamiquement via JavaScript -->
                </datalist>
            </div>
        </div>
    </form>
    <table class="table-RP">
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Groupe</th>
        </tr>
        <?php if (!empty($enfantsInscrits)) {
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
        </div>
        </div>
</div>

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
                <?php } }?>
    <form method='post'>
        <div class="register-data-form RP">
            <div class="register-tab-form-item register-tab-holiday-item">
                <label for="nom_enfant">Nom de l'enfant </label>
                <input class="input-text-RP" list="liste_enfants">
                <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                    <option value="Edge">
                    <option value="Firefox">
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
        <tr>
            <td><a href="index.php?controller=Child&action=showProfilEnfant" class="lien">13/06/1026</a></td>
            <td>77</td>
            <td>Payé</td>
            <td>icon</td>
        </tr>
    </table>
        </div>
        </div>
</div>

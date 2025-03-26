<div class="containerOrange">
    <h1>Suivi des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet active">Suivi pédagogique</button></a>
            <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet">Suivi des présence</button></a>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur" || $_SESSION['role'] == "parent")) { ?>
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoringM"><button class="onglet">Suivi médical</button></a>
            <?php } ?>
        </div>

        <div class="form-content-RP">
            <div class="tab-content-GA">

                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_enfant">Nom de l'enfant</label>
                            <input class="input-text-RP" list="liste_enfant">
                            <datalist id="liste_enfant"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                    </div>
                </form>
                <?php if (isset($_SESSION['role'])) {
                    if (($_SESSION['role'] == "animateur") || ($_SESSION['role'] == "administrateur") || ($_SESSION['role'] == "accompagnateur")) { ?>
                <p class="form-title-RP">Enregistrement d'un nouveau suivi pédagogique</p>
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date">Date <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date" id="date" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="Descriptif">Type <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_type">
                            <datalist id="liste_type"><!-- je sais pas comment on reprend de la database-->
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
                            <button  type="submit">Enregistrer un suivi pédagogique</button>
                        </div>
                    </div>
                </form>
                <?php } }?>
                <p class="form-title-RP">Historique du suivi pédagogique</p>
                <table class="table-RP">
                    <tr>
                        <th>Date</th>
                        <th>Type de suivi</th>
                        <th>Description</th>
                        <th>Suprrimer</th>
                    </tr>
                    <tr>
                        <td>Parent prof</td>
                        <td>13/06/2025</td>
                        <td>19h</td>
                        <td>Icon</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
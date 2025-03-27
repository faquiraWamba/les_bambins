<div class="containerOrange">
    <h1>Suivi des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
        <script src="public/JS/calendar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/dialog-polyfill@0.5.4/dist/dialog-polyfill.min.js"></script>



        <script src="https://cdn.jsdelivr.net/npm/dialog-polyfill@0.5.4/dist/dialog-polyfill.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dialog-polyfill@0.5.4/dist/dialog-polyfill.min.css">

            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet">Suivi pédagogique</button></a>
            <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet">Suivi des présence</button></a>
<<<<<<< HEAD
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur")) { ?>
=======
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur" || $_SESSION['role'] == "parent")) { ?>
>>>>>>> c3e33eee985ebc19a6d7ae9b61b3b44632d73f73
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoringM"><button class="onglet active">Suivi médical</button></a>
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
                <p class="form-title-RP">Personne à contacter en cas d'urgence</p>
                <div>
                    <h3>Nom du parent :</h3>
                    <p>numéro de tel</p>
                </div>
                <?php if (isset($_SESSION['role'])) {
                if (($_SESSION['role'] == "animateur") || ($_SESSION['role'] == "administrateur")) { ?>
                <p class="form-title-RP">Fiche médicale</p><!--je pense qu'il faut ue new table-->
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <!-- <label for="date">Date <span class="obligate">*</span></label>
                            
                        <input type="text" class="input-text-RP" name="date" id="date" value="" required> -->
                        <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="date">Date <span class="obligate">*</span></label>
    <div class="input-container">
        <input type="text" class="input-text-RP" name="date" readonly id="selectedDate" required>
        <span class="calendar-icon" onclick="openCalendar()">📅</span>
    </div>
</div>

<!-- Dialog pour afficher le calendrier -->
<dialog id="calendarDialog">
    <h3>Choisissez une date</h3>
    <div id="month-year"></div>
    <div class="calendar"></div>
    <button onclick="closeCalendar()">Fermer</button>
</dialog>


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
                            <button  type="submit">Enregistrer un suivi médical</button>
                        </div>
                    </div>
                </form>
                <?php }} ?>
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
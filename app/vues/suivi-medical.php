<div class="containerOrange">
    <h1>Suivi des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="onglet">Suivi Comportemental</button></a>
            <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="onglet">Suivi pédagogique</button></a>
            <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="onglet">Suivi des présence</button></a>
            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur")) { ?>
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoring"><button class="onglet active">Suivi médical</button></a>
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
                        </div><!--
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_reunion">Date <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date_reunion" id="date_reunion" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="heure_reunion">Heure de la réunion <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="heure_reunion" id="heure_reunion" value="" required>
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <button  type="submit">Créer la réunion</button>
                    </div>-->
                    </div>
                </form>
                <p class="form-title-RP">Personne à contacter en cas d'urgence</p>
                <div>
                    <h3>Numéro de téléphone :</h3>
                    <p><?php echo htmlspecialchars($telephone_parent); ?></p>
                </div>
                <p class="form-title-RP">Fiche médical</p><!--je pense qu'il faut ue new table-->
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
                            <button  type="submit">Enregistrer un suivi comportemental</button>
                        </div>
                    </div>
                </form>
                <p class="form-title-RP">Historique du Suivi Comportemental</p>
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
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
            <p class="form-title-RP">Enregistrement d'un nouveau suivi pédagogique</p>

            <form method="post" action="index.php?controller=ChildMonitoringPedagogique&action=addProfil" onsubmit="return validateFormSuivi()">
        
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
                <?php if (isset($_SESSION['role'])) {
                    if (($_SESSION['role'] == "animateur") || ($_SESSION['role'] == "administrateur") || ($_SESSION['role'] == "accompagnateur")) { ?>
                    
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="Descriptif">Type <span class="obligate">*</span></label>
                            <select class="input-text-RP"  name="type_profil" required>
                            <option value="">Choisissez type</option>
                                <option value="Incident">Incident</option>
                                <option value="Succès">Succès</option>
                                <option value="Spécifique">Spécifique</option>
                        </select>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="description_profil">Description<span class="obligate">*</span></label>
                            <textarea type="text" class="input-text-RP descActivite" name="description_profil" id="description_profil" required></textarea>
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
                    </tr>
                    <tbody id="historyTableBody">
                        <tr>
                            <td colspan="3">Sélectionnez un enfant pour afficher son historique.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="containerOrange">
    <h1>Fiche d'appel</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=ChildMonitoringPresence&action=showFicheAppel"><button class="onglet active">Fiche d'appel</button></a>
            <a href="index.php?controller=Activity&action=showRapportActivite"><button class="onglet">Rapport d'activité</button></a>
            <a href="index.php?controller=Animateur&action=showActiviteAnim"><button class="onglet">Mes activités</button></a>
        </div>

        <div class="form-content-RP">
            <div class="tab-content-GA">
                <p class="form-title-RP">Faire l'appel Du <?= date('Y-m-d') ?></p></p>
                <!-- Sélection de l'activité -->
                <form method="get" action="index.php">
                    <input type="hidden" name="controller" value="ChildMonitoringPresence">
                    <input type="hidden" name="action" value="showFicheAppel">
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="id_activite">Nom de l'activité <span class="obligate">*</span></label>
                            <select class="input-text-RP" name="id_activite" id="id_activite" required>
                                <option value="">Choisissez une activité</option>
                                <?php foreach ($activities as $activity) { ?>
                                    <option value="<?= htmlspecialchars($activity['id_activite']) ?>" <?= isset($id_activite) && $id_activite == $activity['id_activite'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($activity['nom_activite']) ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="register-tab-for-btn">
                            <button type="submit">Afficher les enfants</button>
                        </div>
                    </div>
                </form>

                <?php if (isset($id_activite)) { ?>
                    <p class="form-title-RP">Activité sélectionnée : <?= htmlspecialchars($activityName ?? 'Nom inconnu') ?></p>
                <?php } ?>

                <?php if (isset($presences)) { ?>
                    <!-- Affichage des présences existantes -->
                    <p class="form-title-RP">Appel déjà réalisé pour l'activité</p>
                    <table class="table-RP">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Présence</th>
                                <th>Projet réalisé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($presences as $presence) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($presence['nom_enfant']) ?></td>
                                    <td><?= htmlspecialchars($presence['prenom_enfant']) ?></td>
                                    <td><?= htmlspecialchars($presence['etat_presence_activite']) ?></td>
                                    <td><?= htmlspecialchars($presence['projet_realise']) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else if (isset($children) && !empty($children)) { ?>
                    <!-- Formulaire pour enregistrer les présences -->
                    <form method="post" action="index.php?controller=ChildMonitoringPresence&action=saveFicheAppel">
                        <input type="hidden" name="id_activite" value="<?= htmlspecialchars($id_activite) ?>">
                        <div class="register-data-form RP">
                            <div class="register-tab-form-item register-tab-holiday-item">
                                <label for="projet_realise">Projet réalisé <span class="obligate">*</span></label>
                                <textarea class="input-text-RP" name="projet_realise" id="projet_realise" required></textarea>
                            </div>
                        </div>
                        <table class="table-RP">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Présent</th>
                                    <th>Absent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($children as $child) { ?>
                                    <tr>
                                        <td><?= htmlspecialchars($child['nom_enfant']) ?></td>
                                        <td><?= htmlspecialchars($child['prenom_enfant']) ?></td>
                                        <td><input type="radio" name="presences[<?= $child['id_inscription_activite'] ?>]" value="présent" required></td>
                                        <td><input type="radio" name="presences[<?= $child['id_inscription_activite'] ?>]" value="absent" required></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="register-tab-for-btn">
                            <button type="submit">Enregistrer l'appel</button>
                        </div>
                    </form>
                <?php } else if (isset($id_activite)) { ?>
                    <p>Aucun enfant n'est inscrit à cette activité.</p>
                <?php } else { ?>
                    <p>Sélectionnez une activité pour afficher les enfants inscrits.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
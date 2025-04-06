<div class="containerOrange">
    <h1>Gestion des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=ChildMonitoringPresence&action=showFicheAppel"><button class="onglet">Fiche d'appel</button></a>
            <a href="index.php?controller=Activity&action=showRapportActivite"><button class="onglet">Rapport d'activité</button></a>
            <a href="index.php?controller=Animateur&action=showActiviteAnim"><button class="onglet active">Mes activités</button></a>
        </div>

        <div class="form-content-RP">
            <div class="tab-content-GA">
                <p class="form-title-RP">Mes activités</p>
                <?php if (isset($activities) && !empty($activities)) { ?>
                    <table class="table-RP">
                        <thead>
                            <tr>
                                <th>Nom de l'activité</th>
                                <th>Type</th>
                                <th>Niveau</th>
                                <th>Tranche d'âge</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($activities as $activity) { ?>
                                <tr>
                                    <td><?= htmlspecialchars($activity['nom_activite']) ?></td>
                                    <td><?= htmlspecialchars($activity['type_activite']) ?></td>
                                    <td><?= htmlspecialchars($activity['niveau_activite']) ?></td>
                                    <td><?= htmlspecialchars($activity['age_min_activite']) ?> - <?= htmlspecialchars($activity['age_max_activite']) ?> ans</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p>Aucune activité assignée pour le moment.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
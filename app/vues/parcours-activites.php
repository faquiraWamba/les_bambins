<div class="container2">

    <?php if (!$_SESSION['auth']) { ?>
        <h2>Nos parcours d'activités</h2>
    <?php } ?>

    <?php if (isset($allParcours)) {
        $activitiy = new Activity_Parcours;
        foreach ($allParcours as $parcours) {
            $activities = $activitiy->GetAllActiviteParcours($parcours['id_parcours']);
    ?>
        <div class="activity">
            <div class="description">
                <h3><?= htmlspecialchars($parcours['titre_parcours']) ?></h3>
                <p><?= htmlspecialchars($parcours['description_parcours']) ?></p>
                <h3>Composé de :</h3>
                <div class="activities-inline">
                    <?php if (!empty($activities)) {
                        foreach ($activities as $activity) { ?>
                            <div class="activity-item-small">
                                <img src="<?= htmlspecialchars($activity['img_activite'] ?? 'default.jpg') ?>" alt="<?= htmlspecialchars($activity['nom_activite']) ?>" class="activity-img-small">
                                <p><?= htmlspecialchars($activity['nom_activite']) ?></p>
                            </div>
                        <?php }
                    } else { ?>
                        <p>Aucune activité trouvée pour ce parcours.</p>
                    <?php } ?>
                </div>
            </div>

            <div>
                <h3>Période</h3>
                <p><strong>Début :</strong> <?= htmlspecialchars($parcours['date_debut_parcours']) ?><br>
                   <strong>Fin :</strong> <?= htmlspecialchars($parcours['date_fin_parcours']) ?></p>
                <?php if (isset($_SESSION['user_id'])) { // Afficher les prix uniquement si l'utilisateur est connecté ?>
                    <h3>Prix</h3>
                    <p><?= htmlspecialchars($parcours['prix_parcours']) ?> €</p>
                <?php } ?>
            </div>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "parent") { ?>
                <div class="btnActivite">
                    <a href="index.php?controller=RegParcours&action=inscrireEnfantParcours&id_parcours=<?= htmlspecialchars($parcours['id_parcours']) ?>">
                        <button type="button">Inscrire votre enfant</button>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php }
    } ?>

</div>

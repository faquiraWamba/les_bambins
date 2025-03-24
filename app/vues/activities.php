<div class="container2">
    <h2>Nos activités</h2>

    <?php if(isset($activities)){
        foreach($activities as $activity) {
    ?>
    <div class="activity">
        <img src="<?= htmlspecialchars($activity['img_activite']) ?>" alt="Atelier Peinture" class="activity-img">
        <div class="description">
            <h3><?= htmlspecialchars($activity['nom_activite']) ?> - <?= htmlspecialchars($activity['niveau_activite']) ?></h3>
            <p><?= htmlspecialchars($activity['description_activite']) ?></p>
            <h3>Prérequis</h3>
            <p><?= htmlspecialchars($activity['prerequis']) ?></p>
        </div>
        <div>
            <h3>Horaire</h3>
            <p>Lundi - 16h</p>
            <h3>Tranche d'âge</h3>
            <p><?= htmlspecialchars($activity['age_min_activite']) ?> - <?= htmlspecialchars($activity['age_max_activite']) ?> ans</p>
        </div>
    
        <?php if (isset($_SESSION['role'])){
            if($_SESSION['role'] == "administrateur") {?>
            <div class="cta">
                <a href="index.php?controller=Activity&action=ShowActivity&id=<?= htmlspecialchars($activity['id_activite']) ?>"> <button type="button">Modifier</button></a>
                <a href="index.php?controller=Activity&action=DeleteActivity&id=<?= htmlspecialchars($activity['id_activite']) ?>"> <button type="button">Supprimer</button></a>
            </div>
        <?php }}?>
    </div>
    <?php }}?>

    <?php if (!$_SESSION['auth']) {?>
        <div class="cta">
            <h3>Intéressé? Inscrivez votre enfant</h3>
            <a href="index.php?controller=Child&action=CreateChild"> <button type="button">Inscrire mon enfant</button></a>
        </div>
    <?php }?>
        
    
</div>

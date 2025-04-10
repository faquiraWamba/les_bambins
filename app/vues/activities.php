<div class="container2">
<?php if (!isset($_SESSION['user_id'])) {?>
    <h2>Nos activités</h2>
    <?php }?>

    <?php if(isset($activities)){
        $i=0;
        foreach($activities as $activity) {
        $i++;
    ?>
    <div class="activity">
        <?php if($i%2==0){?>
            <img src="<?= htmlspecialchars($activity['img_activite']) ?>" alt="Atelier Peinture" class="activity-img">
        <?php }?>
        <div class="description">
            <h3><?= htmlspecialchars($activity['nom_activite']) ?> - <?= htmlspecialchars($activity['niveau_activite']) ?></h3>
            <p><?= htmlspecialchars($activity['description_activite']) ?></p>
            <h3>Prérequis</h3>
                <p><?= htmlspecialchars($activity['prerequis']) ?></p>
        </div>
        <?php if($i%2!=0){?>
            <img src="<?= htmlspecialchars($activity['img_activite']) ?>" alt="Atelier Peinture" class="activity-img">
        <?php }?>
        <div>
            <h3>Tranche d'âge</h3>
            <p><?= htmlspecialchars($activity['age_min_activite'])?> - <?= htmlspecialchars($activity['age_max_activite']) ?> ans</p>
        </div>
        <?php if (isset($_SESSION['role'])){
            if($_SESSION['role'] == "administrateur") {?>
            <div class="btnActivite">
                <a href="index.php?controller=Activity&action=ShowActivity&id=<?= htmlspecialchars($activity['id_activite']) ?>"> 
                    <button type="button">Modifier</button>
                </a>
                <a href="index.php?controller=Activity&action=DeleteActivity&id=<?= htmlspecialchars($activity['id_activite']) ?>"> 
                    <button  type="button">Supprimer</button>
                </a>
            </div>
        <?php }}?>
        <?php if (isset($_SESSION['role'])){
            if($_SESSION['role'] == "parent") {?>
                <div class="btnActivite">
                    <a href="index.php?controller=RegActivity&action=inscrireEnfant&id_activite=<?= $activity['id_activite']?>"><button type="button">Inscrire un enfant</button></a>
                </div>
            <?php }}?>
    </div>
    <?php }}?>
    <?php if (!isset($_SESSION['user_id'])) {?>
        <div class="cta">
            <h3>Intéressé? Inscrivez votre enfant</h3>
            <a href="index.php?controller=Child&action=CreateChild"> <button type="button">Inscrire mon enfant</button></a>
        </div>
    <?php }?>
        </div>


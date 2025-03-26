<div class="container2">

    <?php if (!$_SESSION['auth']) {?>
        <h2>Nos parcours d'activités</h2>
    <?php }?>

    <?php if(isset($allParcours)){
        $i=0;
        $activitiy = new Activity_Parcours;
        foreach($allParcours as $parcours) {
        $i++;
        $activities= $activitiy->GetAllActiviteParcours($parcours['id_parcours']);
            
    ?>
    <div class="activity">
        <img src="public/images/img-peinture.jpg" alt="Atelier Peinture" class="activity-img">
        <div class="description">
            <h3><?= $parcours['titre_parcours']?></h3>
            <p><?= $parcours['description_parcours']?></p>
            <h3>Composé de </h3>
            <ul>
                <?php if(isset($activities)){

                    foreach($activities as $activity) {?>
                    <li><?= $activity['nom_activite'] ?></li>
                <?php }}?>

            </ul>
        </div>
        
        <div>
            <h3>Période</h3>
            <p>Lundi - 16h</p>
            <h3>Tranche d'âge</h3>
            <p>8 - 10 ans</p>
        </div>
        <!-- <?php if ($_GET['action'] == 'ConsultParcours') : ?>
            <div>
                <a href="index.php?controller=Parcours&action=ModifyParcours"><button class="button3">Modifier</button></a>
            </div>
        <?php endif; ?> -->

        <?php if (isset($_SESSION['role'])){
            if($_SESSION['role'] == "administrateur") {?>
            <div class="btnActivite">
                <a href="index.php?controller=Parcours&action=ShowAParcours&id=<?= htmlspecialchars($parcours['id_parcours']) ?>"> <button type="button">Modifier</button></a>
                <a href="index.php?controller=Parcours&action=DeleteParcours&id=<?= htmlspecialchars($parcours['id_parcours']) ?>"> <button  type="button">Supprimer</button></a>
            </div>
        <?php }}?>
        <?php if (isset($_SESSION['role'])){
            if($_SESSION['role'] == "parent") {?>
                <div class="btnActivite">
                    <button type="button">S'inscrire</button>
                </div>
            <?php }}?>
    </div>
<?php }} ?>
    
</div>

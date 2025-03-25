<div class="containerOrange">
    <h1>Gestion des activités</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=showActivitiesRP"><button class="onglet active">Consulter activités</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet">Créer une activité</button></a>
            <a href="index.php?controller=Parcours&action=ConsultParcours"><button class="onglet">Consulter parcours activité</button></a>
            <a href="index.php?controller=Parcours&action=CreateParcours"><button class="onglet">Créer un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Consulter activité-->
            <div class="tab-content-GA" style="display: block">
                <?php include_once '/xampp/htdocs/les_bambins/app/vues/activities.php' ?>
            </div>
            
        </div>
    </div>
</div>

<div class="containerOrange">
    <h1>Gestion des activités</h1>
    <a href="index.php?controller=User&action=ShowProfilRP"><button class="onglet active"">Consulter activités</button></a>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=showActivitiesRP"><button class="onglet active">Consulter activités</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet">Créer une activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyActivity"><button class="onglet">Modifier une activité</button></a>
            <a href="index.php?controller=Activity&action=ConsultParcours"><button class="onglet">Consulter parcours activité</button></a>
            <a href="index.php?controller=Activity&action=CreateParcours"><button class="onglet">Créer un parcours activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyParcours"><button class="onglet">Modifier un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Consulter activité-->
            <div class="tab-content-GA" style="display: block">
                <h1>Activités du centre</h1>
                <?php include_once '/xampp/htdocs/les_bambins/app/vues/activities.php' ?>
            </div>
            
        </div>
    </div>
</div>

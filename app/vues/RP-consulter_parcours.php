<div class="containerOrange">
    <h1>Gestion des activités</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Activity&action=showActivitiesRP"><button class="onglet">Consulter activités</button></a>
            <a href="index.php?controller=Activity&action=CreateActivity"><button class="onglet">Créer une activité</button></a>
            <a href="index.php?controller=Activity&action=ModifyActivity"><button class="onglet">Modifier une activité</button></a>
            <a href="index.php?controller=Parcours&action=ConsultParcours"><button class="onglet active">Consulter parcours activité</button></a>
            <a href="index.php?controller=Parcours&action=CreateParcours"><button class="onglet">Créer un parcours activité</button></a>
            <a href="index.php?controller=Parcours&action=ModifyParcours"><button class="onglet">Modifier un parcours activité</button></a>
        </div>
        <div class="form-content-RP">
            <!--Consulter parcours activité-->
            <div class="tab-content-GA">
                <div class="tab-content-GA" style="display: block">
                    <?php
                    ob_start();
                    include 'parcours-activites.php';
                    $page = ob_get_clean();

                    // Supprime le bloc CTA avec une regex
                    $page = preg_replace('/<div class="cta">.*?<\/div>/s', '', $page);

                    echo $page;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
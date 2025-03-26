<div class="containerOrange">
    <h1>Bienvenue dans votre espace "nom"</h1>

    <div class="Intrahome">
        <?php if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "administrateur") { ?>
        <div class="module_home">
            <h2>Gestion du centre</h2>
            <a href="index.php?controller=Facture&action=showFacture"><button class="bar Orange">Suivi des factures</button></a>
            <a href="index.php?controller=Reunion&action=showReunion"><button class="bar">Suivi des réunion</button></a>
            <a href="index.php?controller=Questionnaire&action=showQuestionnaire"><button class="bar">Résultat des questionnaires de satisfaction</button></a>
        </div><?php }} ?>

        <?php if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "animateur") { ?>
                <div class="module_home">
                    <h2>Vie au centre</h2>
                    <a href="index.php?controller=EDT&action=showEDTAnim"><button class="bar Orange">Emploi du temps</button></a>
                    <a href="index.php?controller=Menu&action=showMenu"><button class="bar">Menu</button></a>
                </div><?php }} ?>

        <?php if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "administrateur" || $_SESSION['role'] == "animateur") { ?>
        <div class="module_home">
            <h2>Suivi des enfants</h2>
            <div class="semi">
                <a href="index.php?controller=ChildMonitoringPedagogique&action=showChildMonitoringP"><button class="bar">Suivi Pédagogique</button></a>
                <a href="index.php?controller=ChildMonitoringComportement&action=showChildMonitoringC"><button class="bar">Suivi des Comportemental</button></a>
                <a href="index.php?controller=ChildMonitoringPresence&action=showChildMonitoringPresence"><button class="bar">Suivi des présences</button></a>
                <a href="index.php?controller=ChildMonitoringMed&action=showChildMonitoringM"><button class="bar">Suivi médical</button></a>
            </div>
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="bar Orange">Informations sur les enfants</button></a>
        </div><?php } }?>

        <?php if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "administrateur") { ?>
        <div class="module_home">
            <h2>Gestion des activités</h2>
            <div class="semi">
                <a href="index.php?controller=Activity&action=CreateActivity"><button class="bar">Créer une activité</button></a>
                <a href="index.php?controller=Parcours&action=CreateParcours"><button class="bar">Créer parcours d'activité</button></a>
            </div>
            <a href="index.php?controller=Activity&action=showActivitiesRP"><button class="bar Orange">Consulter les activités</button></a>
            <a href="index.php?controller=Parcours&action=ConsultParcours"><button class="bar">Consulter les parcours d'activités</button></a>
        </div>

        <div class="module_home">
            <h2>Inscriptions des enfants</h2>
            <a href="index.php?controller=Child&action=CreateChild"><button class="bar Orange">Inscrire un enfant au centre</button></a>
            <div class="semi">
                <a href="index.php?controller=RegActivity&action=CreateRegActivity"><button class="bar">Inscription activité</button></a>
                <a href="index.php?controller=Child_Group&action=CreateGroup"><button class="bar">Groupes d'enfants</button></a>
            </div>
            <a href="index.php?controller=RegCentre&action=ValidReg"><button class="bar">Valider les demandes d'inscriptions</button></a>
        </div>
        <?php } }?>
        <?php if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == "parent") { ?>
                <div class="module_home">
                    <h2>Vie au centre</h2>
                    <a href="index.php?controller=Facture&action=showFactureParent"><button class="bar Orange">Accès au facture</button></a>
                    <a href="index.php?controller=ParentQuestionnaire&action=showParentQuestionnaire"><button class="bar">Questionnaire de satisfaction</button></a>
                    <a href="index.php?controller=Menu&action=showMenu"><button class="bar">Menu</button></a>
                </div>

                <div class="module_home">
                    <h2>Suivi du bambin</h2>
                    <a href="index.php?controller=Child&action=showInfoEnfants"><button class="bar">Suivi de votre enfant</button></a>
                    <a href="index.php?controller=Activity&action=showActivitiesRP"><button class="bar">Inscription à une activité</button></a>
                    <a href="index.php?controller=EDT&action=showEDTParent"><button class="bar Orange">Emploi du temps</button></a>
                </div>
                        <?php }} ?>
    </div>

</div>
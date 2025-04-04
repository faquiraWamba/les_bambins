<header class="header-container">
    <div class="logo">
        <a href="index.php?controller=Home&action=index"><img src="/../les_bambins/public/images/LOGO.png" alt="LOGO"/></a>
    </div>
    <nav class="header-element">
        <ul>
            <li><a href="index.php?controller=Menu&action=showMenu">Menu</a></li>

            <?php if (isset($_SESSION['role'])) {?>
                <li><a href="index.php?controller=Child&action=showInfoEnfants">Suivi des enfants</li>
                <li><a href="index.php?controller=Activity&action=showActivitiesRP">Activités</a></li>
                <?php if ($_SESSION['role'] == "administrateur") { ?>
                    <li><a href="index.php?controller=Facture&action=ShowFacture">Gestion Centre</a></li>
                    <li><a href="index.php?controller=RegActivity&action=CreateRegActivity">Gestion Inscription</a></li>
                <?php } else { if ($_SESSION['role'] == "animateur") { ?>
                    <li><a href="index.php?controller=ChildMonitoringPresence&action=showFicheAppel">Gestion des enfants</a></li>
                    <li><a href="index.php?controller=EDT&action=showEDTAnim">EDT</a></li>
                <?php } else { if ($_SESSION['role'] == "parent") { ?>

            <?php } } } }
            else{?>
                <li><a href="index.php?controller=Activity&action=showActivities">Activités</a></li>

            <?php }?>

            <li><a href="index.php?controller=FAQ&action=showFAQ">FAQ</a></li>
            <?php if (!isset($_SESSION['user_id'])) { ?>
            <li><a href="index.php?controller=Tarif&action=showTarifs">Tarifs</a></li>
            <?php } ?>
            <?php if (isset($_SESSION['user_id'])) { ?>
                <li>
                    <a href="index.php?controller=User&action=ShowProfilRP" >
                        <i class="fa fa-user" aria-hidden="true"style="color: #ffffff;"></i>
                    </a>
                </li>
                <li><a href="index.php?controller=Auth&action=logout">Deconnexion</a></li>
            <?php } else { ?>
                <li><a href="index.php?controller=Auth&action=login">Connexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>


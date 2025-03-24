
<header class="header-container">
    <div class="logo">
        <img src="/../les_bambins/public/images/LOGO.png" alt="LOGO"/>
    </div>
    <nav class="header-element">
        <ul>
            <li><a href="index.php?controller=Home&action=index">Acceuil</a></li>
            <li><a href="index.php?controller=Menu&action=showMenu">Menu</a></li>

            <?php if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == "administrateur") { ?>
                    <li><a href="index.php?controller=Activity&action=CreateActivity">Activités</a></li>
                    <li><a href="index.php?controller=Facture&action=ShowFacture">Gestion Centre</a></li>
                <?php } else { ?>
                    <li><a href="index.php?controller=Activity&action=showActivities">Activités</a></li>
                <?php }
            } else { ?>
                <li><a href="index.php?controller=Activity&action=showActivities">Activités</a></li>
                <li><a href="index.php?controller=Tarif&action=showTarifs">Tarifs</a></li>
            <?php } ?>

            <li><a href="index.php?controller=FAQ&action=showFAQ">FAQ</a></li>
            <li><a href="index.php?controller=#">A propos de nous</a></li>

            <?php if ($_SESSION['auth']) { ?>
                <li><a href="index.php?controller=Auth">PP</a></li>
                <li><a href="index.php?controller=Auth&action=logout">Deconnexion</a></li>
            <?php } else { ?>
                <li><a href="index.php?controller=Auth&action=login">Connexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>


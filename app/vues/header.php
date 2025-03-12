
<header class="header-container">
        <div class="logo">
            <img src="/../les_bambins/public/images/LOGO.png" alt="LOGO"/>
        </div>
        <nav class="header-element">
            <ul>
                
                <li><a href="index.php?controller=Home&action=index">Acceuil</a></li>
                <li><a href="index.php?controller=#">Activités</a></li>
                <li><a href="index.php?controller=#">Tarifs</a></li>
                <li><a href="index.php?controller=#">Menu</a></li>
                <li><a href="index.php?controller=#">FAQ</a></li>           
                <li><a href="index.php?controller=#">A propos de nous</a></li>           
                
                <?php if($_SESSION['auth']){?>
                    <li><a href="index.php?controller=Auth&action=logout">Deconnexion</a></li> 
                <?php }else{?>
                    <li><a href="index.php?controller=Auth&action=login">Connexion</a></li> 
                <?php } ?>          
            </ul>
        </nav>
</header>
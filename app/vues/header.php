
<header class="header-container">
        <div class="logo">
            <img src="/../les_bambins/public/images/LOGO.png" alt="LOGO"/>
        </div>
        <nav class="header-element">
            <ul>
                
                <li><a href="index.php?controller=Home&action=index">Acceuil</a></li>
                <li><a href="index.php?controller=Menu&action=showMenu">Menu</a></li>
                <?php
                    if(isset($_SESSION['role'])){ 
                        if($_SESSION['role']=="administrateur"){
                    ?>
                        <li><a href="index.php?controller=Activity&action=CreateActivity">Activités</a></li>
                        <li><a href="index.php?controller=Gestion&action=ShowGestion">Gestion Centre</a></li>
                    <?php }}
                    else{ ?>
                        <li><a href="index.php?controller=Activity&action=showActivities">Activités</a></li>
                    <?php }?>
                    
                
                <?php if(isset($_SESSION['role'])){
                    /*Pages pour les membres du personnel connectés*/
                        
                    if($_SESSION['role']=="administrateur" || $_SESSION['role']=="animateur" ){?>
                        <li><a href="index.php?controller=#">EDT</a></li>
                        <li><a href="index.php?controller=#">Suivi des enfants</a></li> 

                    <!--Pages pour les parents connectés -->

                    <?php }else if($_SESSION['role']=="parent"){?>
                        <li><a href="index.php?controller=#">paiement</a></li> 
                   <?php  } ?>   
                <?php } ?> 
                <?php if(!$_SESSION['auth']){?>
                <li><a href="index.php?controller=Tarif&action=showTarifs">Tarifs</a></li>
                <li><a href="index.php?controller=#">FAQ</a></li>           
                <li><a href="index.php?controller=#">A propos de nous</a></li>           
                
                <?php } ?>          
                <?php if($_SESSION['auth']){?>
                    <li><a href="index.php?controller=Auth">PP</a></li> 
                    <li><a href="index.php?controller=Auth&action=logout">Deconnexion</a></li> 
                <?php }else{?>
                    <li><a href="index.php?controller=Auth&action=login">Connexion</a></li> 
                <?php } ?>          
            </ul>
        </nav>
</header>
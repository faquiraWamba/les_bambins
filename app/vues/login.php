<h1 class="luckiest-guy" id="connexion">Connexion</h1>
<form class=login_form action="index.php?controller=Auth&action=login" method="post" >
    <fieldset>
        <label for="email" class="connexion">Email</label>
        <input type="text" id="id" class="connexion" name="email" placeholder="Entrez votre identifiant" required>
        <label for="password" class="connexion">Mot de passe</label>
        <input type="password" id="mdp" class="connexion" name="password" placeholder="Entrer votre Mot de passe" required><br>
        <input type="checkbox" id="enregistrer" class="connexion"/>
        <label for="enregistrer" class="checkbox">Se souvenir de moi</label>
        <button type="submit" class="bouton">Connexion</button>
        <a href="index.php?controller=Auth&action=register">Pas encore de compte?</a>
    </fieldset>
</form>

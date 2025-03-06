<?php if (isset($error)): ?>
        <div style="color: red;">
            <?= $error ?>
        </div>
<?php endif; ?>
<h1 class="luckiest-guy" id="connexion">Connexion</h1>
<form action="index.php?controller=Auth&action=login" method="post" >
    <fieldset>
        <label for="email" class="connexion">Identifiant</label>
        <input type="text" id="id" class="connexion" name="email" placeholder="Entrez votre identifiant">
        <label for="password" class="connexion">Mot de passe</label>
        <input type="password" id="mdp" class="connexion" name="password" placeholder="Entrer votre Mot de passe"><br>
        <input type="checkbox" id="enregistrer" class="connexion"/>
        <label for="enregistrer" class="checkbox">Se souvenir de moi</label>
        <button type="submit" class="bouton">Connexion</button>
        <a href="index.php?controller=Auth&action=register">Pas encore de compte?</a>
    </fieldset>
</form>

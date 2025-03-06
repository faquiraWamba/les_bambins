<?php if (isset($error)): ?>
        <div style="color: red;">
            <?= $error ?>
        </div>
<?php endif; ?>

<form action="index.php?controller=Auth&action=register" method="post" 
style="display: flex; flex-direction:column; align-items:center; margin:5em; height:350px; border:solid 1px; ">
    <input type="email" name="email" id="" required>
    <input type="password" name="password" id="" required>
    <button type="submit" class="button">Enregistrer</button>
<p>Déja un compte? <a href="index.php?controller=Auth&action=login"><em><u>Connexion</u></em></a></p>

</form>

<div class="containerOrange">
    <h1>Votre Profil</h1>
    <div class="containbox">
        <p class="form-title-RP">Profil</p>
        <div class="profil">
            <div class="profil info">
                <?php if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == "parent") { ?>
                <h3>Nom :</h3>
                <p><?= $parent["nom_parent"] ?? " "?></p>
                <h3>Prénom :</h3>
                <p><?= $parent["prenom_parent"] ?? " "?></p>
                <h3>Adresse mail :</h3>
                <p><?= $parent["email"] ?? " "?></p>
                <h3>Numéro de téléphone :</h3>
                <p><?= $parent["telephone_parent"] ?? " "?></p>
                <h3>Adresse :</h3>
                <p><?= $parent["rue_parent"]." ".$parent["ville_parent"]." ".$parent["code_postal_parent"] ?? " "?></p>
                <?php }} ?>
                <?php if (isset($_SESSION['role'])) {
                    if (($_SESSION['role'] == "animateur") || ($_SESSION['role'] == "administrateur")) { ?>
                        <h3>Nom :</h3>
                        <p><?= $personnel["nom_personnel"] ?? " "?></p>
                        <h3>Prénom :</h3>
                        <p><?= $personnel["prenom_personnel"] ?? " "?></p>
                        <h3>Adresse mail :</h3>
                        <p><?= $personnel["email"] ?? " "?></p>
                        <h3>Numéro de téléphone :</h3>
                        <p><?= $personnel["telephone_personnel"] ?? " "?></p>
                        <h3>Adresse :</h3>
                        <p><?= $personnel["rue_personnel"]." ".$personnel["ville_personnel"]." ".$personnel["code_postal_personnel"] ?? " "?></p>
                    <?php }} ?>
            </div>
            <div class="icon">
                <i class="fa-solid fa-user fa-10x" id="icon"></i>
            </div>
        </div>
        <div>
            <a href="index.php?controller=User&action=ModifyProfil"><button id="modifProfil">Modifier le profil</button></a>
        </div>
        <?php if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "parent") { ?>
            <p class="form-title-RP">Facturation</p>
            <!--modifier ref bouton quand fini-->
            <a href="index.php?controller=Paiement&action=Payer"><button id="modifProfil">Paiement des factures</button></a>
            <table class="table-RP">
                <tr>
                    <th>Date</th>
                    <th>Somme</th>
                    <th>Etat</th>
                    <th>Facture</th>
                </tr>
                <tr>
                    <td>13/06/1026</td>
                    <td>77</td>
                    <td>Payé</td>
                    <td>
                        <a href="index.php?controller=FactureController&action=download&id=<?= $facture['id_facture'] ?>">
                            <i class="fa-solid fa-file-arrow-down icon"></i>
                        </a>
                    </td>
                </tr>
            </table>
        <p class="form-title-RP">Contact d'urgence</p>
        <form method='post'>
            <div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="contactUrgence">Ajouter un contact d'urgence<span class="obligate">*</span></label>
                    <input type="text" class="input-text-RP" name="contactUrgence" id="ContactUrgence" value="" required>
                </div>
            </div>
            <div class="register-tab-for-btn">
                <a href="index.php?controller=User&action=ModifyProfil"><button  type="submit">Enregistrer les changements</button></a><!--pour que ça ramène à la page profile en même temps-->
            </div>
        <?php }} ?>
    </div>

</div>

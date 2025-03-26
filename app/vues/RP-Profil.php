<div class="containerOrange">
    <h1>Espace de "nom"</h1>
    <div class="containbox">
        <p class="form-title-RP">Profil</p>
        <div class="profil">
            <div class="profil info">
                <h3>Nom :</h3>
                <p>"nom"</p>
                <h3>Prénom :</h3>
                <p>"prénom"</p>
                <h3>Adresse mail :</h3>
                <p>"mail"</p>
                <h3>Numéro de téléphone :</h3>
                <p>"tel"</p>
                <h3>Adresse :</h3>
                <p>"adresse"</p>
            </div>
            <div>
                <p>Mettre la PP</p>
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
                            <i class="fa-solid fa-file-arrow-down"></i>
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

<div class="containerOrange"><!-- faudrait pouvoir passer à un autre validation aprés en avoir valider une-->
    <div class="containbox">
        <p class="form-title-RP">Informations enfants</p>
        <div class="profil info">
            <h3>Nom : </h3>
            <p><?= $enfant['nom_enfant'] ?? '_' ?></p>
            <h3>Prénom :</h3>
            <p><?= $enfant['prenom_enfant'] ?? '_' ?></p>
            <h3>Date de naissance :</h3>
            <p><?= $enfant['date_naissance'] ?? '_' ?></p>
            
            <?php require_once ROOT_PATH.'app/core/calculateFunction.php';
                $age = calculateAge($enfant['date_naissance'])?>
            <h3>Âge :</h3>
            <p><?= $age.' ans'?></p><h3>Sexe :</h3>
            <p><?= $enfant['sexe_enfant'] ?? '_' ?></p>
            
            <h3>Régime alimentaire :</h3>
            <p><?= $enfant['type_repas'] ?? '_' ?></p>
            <h3>Situation familiale :</h3>
            <p><?= $enfant['type_famille'] ?? '_' ?></p>
        </div>
        <p class="form-title-RP">Créneaux D'inscription</p>
         
        <h3>Périscolaire</h3>

        <table class="table-RP">
    <tr>
        <th> </th>
        <th>Lundi</th>
        <th>Mardi</th>
        <th>Mercredi</th>
        <th>Jeudi</th>
        <th>Vendredi</th>
    </tr>

    <!-- Matin -->
    <tr>
        <td class="tableQuest">Matin</td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'matin' && ($creneau['jour'] == 'lundi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X'; // Met une croix si le créneau correspond
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'matin' && ($creneau['jour'] == 'mardi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X'; // Met une croix si le créneau correspond
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'matin' && ($creneau['jour'] == 'mercredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X'; // Met une croix si le créneau correspond
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'matin' && ($creneau['jour'] == 'jeudi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X'; // Met une croix si le créneau correspond
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'matin' && ($creneau['jour'] == 'vendredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X'; // Met une croix si le créneau correspond
                }
            }
            ?>
        </td>
    </tr>

    <!-- Après-midi -->
    <tr>
        <td class="tableQuest">Après-midi</td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'apres-midi' && ($creneau['jour'] == 'lundi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'apres-midi' && ($creneau['jour'] == 'mardi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'apres-midi' && ($creneau['jour'] == 'mercredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'apres-midi' && ($creneau['jour'] == 'jeudi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'apres-midi' && ($creneau['jour'] == 'vendredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
    </tr>

    <!-- Soir -->
    <tr>
        <td class="tableQuest">Soir</td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'soir' && ($creneau['jour'] == 'lundi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'soir' && ($creneau['jour'] == 'mardi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'soir' && ($creneau['jour'] == 'mercredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'soir' && ($creneau['jour'] == 'jeudi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'soir' && ($creneau['jour'] == 'vendredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
    </tr>

    <!-- Journée -->
    <tr>
        <td class="tableQuest">Journée</td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'journee' && ($creneau['jour'] == 'lundi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'journee' && ($creneau['jour'] == 'mardi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'journee' && ($creneau['jour'] == 'mercredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'journee' && ($creneau['jour'] == 'jeudi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'journee' && ($creneau['jour'] == 'vendredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
    </tr>

    <!-- Repas -->
    <tr>
        <td class="tableQuest">Repas</td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'repas' && ($creneau['jour'] == 'lundi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'repas' && ($creneau['jour'] == 'mardi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'repas' && ($creneau['jour'] == 'mercredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'repas' && ($creneau['jour'] == 'jeudi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
        <td>
            <?php
            foreach($creneaux as $creneau) {
                if ($creneau['periode'] == 'repas' && ($creneau['jour'] == 'vendredi' || $creneau['jour'] == 'tous les jours')) {
                    echo 'X';
                }
            }
            ?>
        </td>
    </tr>
</table>

        <p class="form-title-RP">Information du parents</p>
        <div class="profil info">
            <h3>Nom :</h3>
            <p><?= $parent['nom_parent'] ?? '_' ?></p>
            <h3>Prénom :</h3>
            <p><?= $parent['prenom_parent'] ?? '_' ?></p>
            <h3>Adresse mail :</h3>
            <p><?= $parent['email'] ?? '_' ?></p>
            <h3>Numéro de téléphone :</h3>
            <p><?= $parent['telephone_parent'] ?? '_' ?></p>
            <h3>Adresse :</h3>
            <p><?= $parent['rue_parent'].', '.$parent['ville_parent'].', '. $parent['pays_parent'] ?? '_' ?></p>
        </div>
        <div class="register-tab-for-btn">id_enfant_creneau
        <a href="index.php?controller=Activity&action=ShowActivity&id=<?= htmlspecialchars($activity['id_activite']) ?>"> <button type="button">Valider l'inscription</button></a>

            <button  type="button">Valider l'inscription</button>
            <button  type="button" class="button2">Rejeter l'inscription</button>
        </div>

        <!--info ajoutés à la page profil enfant-->
        <?php if (isset($profilEnfant) && $profilEnfant === true): ?>
            <p class="form-title-RP">Informations enfants</p>
            <h3>Inscription activité</h3>
            <table class="table-RP">
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Etat</th>
                    <th>Annuler inscription</th>
                </tr>
                <tr>
                    <td>13/06/1026</td>
                    <td>77</td>
                    <td>file attente</td>
                    <td>icon</td>
                </tr>
            </table>
            <h3>Inscription parcours activité</h3>
            <table class="table-RP">
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Etat</th>
                    <th>Annuler inscription</th>
                </tr>
                <tr>
                    <td>13/06/1026</td>
                    <td>77</td>
                    <td>file attente</td>
                    <td>icon</td>
                </tr>
            </table>
            <p class="form-title-RP">Fiche médicale</p><!--ça sera bien de mettre le dossier médical mais jsp comment on fait-->
        <h3> </h3>
            <h3>Allergie</h3>
            <table class="table-RP">
                <tr>
                    <td>13/06/1026</td>
                    <td>77</td>
                    <td>file attente</td>
                    <td>icon</td>
                </tr>
            </table>

        <?php endif; ?>
    </div>
</div>


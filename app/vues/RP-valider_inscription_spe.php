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
                if ($creneau['periode'] == 'matin' && ($creneau['jour'] == 'Mercredi' || $creneau['jour'] == 'tous les jours')) {
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
                if ($creneau['periode'] == 'apres-midi' && ($creneau['jour'] == 'Mercredi' || $creneau['jour'] == 'tous les jours')) {
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
                if ($creneau['periode'] == 'soir' && ($creneau['jour'] == 'Mercredi' || $creneau['jour'] == 'tous les jours')) {
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
                if ($creneau['periode'] == 'journee' && ($creneau['jour'] == 'Mercredi' || $creneau['jour'] == 'tous les jours')) {
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
                if ($creneau['periode'] == 'repas' && ($creneau['jour'] == 'Mercredi' || $creneau['jour'] == 'tous les jours')) {
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
        <div class="register-tab-for-btn">
        <a href="index.php?controller=Slot&action=validateChildSlots&id=<?= htmlspecialchars($enfant['id_enfant']) ?>"> <button type="button">Valider l'inscription</button></a>
        <a href="index.php?controller=Slot&action=refuseChildSlots&id=<?= htmlspecialchars($enfant['id_enfant']) ?>"> <button  type="button" class="button2">Rejeter l'inscription</button></a>

        </div>

        <!--info ajoutés à la page profil enfant-->
                <p class="form-title-RP">Informations inscription activité</p>
                <h3>Inscription activité</h3>
            <table class="table-RP">
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Etat</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Action</th>
                </tr>
                <?php if (isset($activities) && !empty($activities)): ?>
                <?php foreach ($activities as $activite): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($activite['nom_activite']); ?></td>
                        <td><?php echo htmlspecialchars($activite['type_activite']); ?></td>
                        <td>
                            <?php 
                            if ($activite['etat_file_attente'] === 'out') {
                                echo '<span style="color: green;">Inscrit</span>';
                            } elseif ($activite['etat_file_attente'] === 'in') {
                                echo '<span style="color: red;">En attente</span>';
                            } else {
                                echo htmlspecialchars($activite['etat_file_attente']);
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($activite['date_debut_activite'] ?? 'Non spécifiée'); ?></td>
                        <td><?php echo htmlspecialchars($activite['date_fin_activite'] ?? 'Non spécifiée'); ?></td>
                        <td>
                            <?php if ($activite['etat_file_attente'] === 'in'): ?>
                                <a href="index.php?controller=ChildActivity&action=cancelActivity&id_activite=<?php echo $activite['id_activite']; ?>&id_enfant=<?php echo htmlspecialchars($enfant['id_enfant']); ?>">
                                    Annuler
                                </a>
                            <?php else: ?>
                                <span>Aucune action disponible</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucune activité trouvée</td>
                    </tr>
                <?php endif; ?>
            </table>

        <!-- Pour le parcours -->
        

        <h3>Inscription parcours activité</h3>
        <table class="table-RP">
            <tr>
                <th>Nom</th>
                <th>Etat</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Action</th>
            </tr>
            <?php if (!empty($parcours) && is_array($parcours)): ?>
                <?php foreach ($parcours as $parcour): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($parcour['titre_parcours']); ?></td>
                        <td>
                            <?php 
                            $dateDebut = new DateTime($parcour['date_debut_parcours']);
                            $dateFin = new DateTime($parcour['date_fin_parcours']);
                            $aujourdhui = new DateTime();

                            if ($aujourdhui < $dateDebut) {
                                echo '<span style="color: blue;">À venir</span>';
                            } elseif ($aujourdhui >= $dateDebut && $aujourdhui <= $dateFin) {
                                echo '<span style="color: green;">En cours</span>';
                            } else {
                                echo '<span style="color: gray;">Terminé</span>';
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($parcour['date_debut_parcours'] ?? 'Non spécifiée'); ?></td>
                        <td><?php echo htmlspecialchars($parcour['date_fin_parcours'] ?? 'Non spécifiée'); ?></td>
                        <td>
                            <?php if ($aujourdhui < $dateDebut): ?>
                                <a href="index.php?controller=ChildParcours&action=cancelParcours&id_parcours=<?php echo $parcour['id_parcours']; ?>&id_enfant=<?php echo htmlspecialchars($enfant['id_enfant']); ?>">
                                    Annuler
                                </a>
                            <?php else: ?>
                                <span>__</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucun parcours trouvé</td>
                </tr>
            <?php endif; ?>
        </table>

        <p class="form-title-RP">Fiche médicale</p>
        <a href="fichier_medical.pdf" download><button>Télécharger le fichier médical</button></a>
    </div>
</div>

<?php if (isset($_GET['msg'])): ?>
    <p class="message"><?= htmlspecialchars($_GET['msg']); ?></p>
<?php endif; ?>
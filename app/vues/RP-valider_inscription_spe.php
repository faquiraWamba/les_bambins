<div class="containerOrange"><!-- faudrait pouvoir passer à un autre validation aprés en avoir valider une-->
    <div class="containbox">
        <p class="form-title-RP">Informations enfants</p>
        <div class="profil info">
            <h3>Nom :</h3>
            <p>"nom"</p>
            <h3>Prénom :</h3>
            <p>"prénom"</p>
            <h3>Date de naissance :</h3>
            <p>"date"</p>
            <h3>Sexe :</h3>
            <p>"sexe"</p>
            <h3>Adresse :</h3>
            <p>"adresse"</p>
            <h3>Régime alimentaire :</h3>
            <p>"reg"</p>
            <h3>Situation familiale :</h3>
            <p>"situation"</p>
        </div>
        <p class="form-title-RP">Jours d'inscriptions</p>
        <table class="table-RP">
            <tr>
                <th> </th>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
            </tr>
            <tr>
                <td class="tableQuest">Matin</td>
                <td>13/06/2025</td>
                <td>19h</td>
                <td>à venir</td>
                <td>19h</td>
                <td>à venir</td>
            </tr>
            <tr>
                <td class="tableQuest">Après-midi</td>
                <td>13/06/2025</td>
                <td>19h</td>
                <td>à venir</td>
                <td>19h</td>
                <td>à venir</td>
            </tr>
            <tr>
                <td class="tableQuest">Journée</td>
                <td>13/06/2025</td>
                <td>19h</td>
                <td>à venir</td>
                <td>19h</td>
                <td>à venir</td>
            </tr>
            <tr>
                <td class="tableQuest">Repas</td>
                <td>13/06/2025</td>
                <td>19h</td>
                <td>à venir</td>
                <td>19h</td>
                <td>à venir</td>
            </tr>
        </table>
        <p class="form-title-RP">Information du parents</p>
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
        <div class="register-tab-for-btn">
            <button  type="submit">Valider l'inscription</button>
            <button  type="submit" class="button2">Rejeter l'inscription</button>
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


<div class="containerOrange">
    <h1>Gestion des enfants</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=ChildMonitoringPresence&action=showFicheAppel"><button class="onglet active">Fiche d'appel</button></a>
            <a href="index.php?controller=Activity&action=showRapportActivite"><button class="onglet">Rapport d'activité</button></a>
            <a href="index.php?controller=Animateur&action=showActiviteAnim"><button class="onglet">Mes activités</button></a>
        </div>

        <div class="form-content-RP">

            <div class="tab-content-GA">
                <p class="form-title-RP">Faire l'appel</p>
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_activite">Nom de l'activité <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_activite">
                            <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                        <!--JSP si il est obligé de mettre la date ou si ça la prend automatiquement-->
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date">Date <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="date" id="date" value="" required>
                        </div>
                        <table class="table-RP">
                            <tr>
                                <th>Groupe</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Absent</th>
                                <th>Justification</th>
                                <th>Nombre d'absence</th>
                            </tr>
                            <tr>
                                <td>Parent</td>
                                <td>ici</td>
                                <td> </td>
                                <td><input type="checkbox"></td>
                                <td class="caseJustif"><label for="date"> </label> <input type="text" class="justif" name="justif" id="justif" value="" required></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div class="register-tab-for-btn">
                        <button  type="submit">Enregistrer l'appel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
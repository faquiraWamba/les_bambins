<div class="containerOrange">
    <h1>Menu Inscription</h1>
    <a href="index.php?controller=Child&action=CreateChild"> <button type="button" class="button3">Inscrire un enfant au centre</button></a>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=RegActivity&action=CreateRegActivity"><button class="onglet">Inscription activités</button></a>
            <a href="index.php?controller=RegActivity&action=ModifyRegActivity"><button class="onglet active">Modifier inscription activités</button></a>
            <a href="index.php?controller=RegCentre&action=ModifyReg"><button class="onglet">Modifier inscription au centre</button></a>
            <a href="index.php?controller=RegCentre&action=ValidReg"><button class="onglet">Valider inscription centre</button></a>
            <a href="index.php?controller=Child_Group&action=CreateGroup"><button class="onglet">Groupe enfant</button></a>
        </div>
        <div class="form-content-RP">
            <div class="tab-content-GA" style="display: block">
                <p class="form-title-RP">Inscrire un enfant à une activité</p>
                <form method='post' action="index.php?controller=Regactivity&action=CreateActivity">
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_activite">Nom de l'activité <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_activite">
                            <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_enfant">Nom de l'enfant <span class="obligate">*</span></label>
                            <input class="input-text-RP" list="liste_enfant">
                            <datalist id="liste_enfant"><!-- je sais pas comment on reprend de la database-->
                                <option value="Edge">
                                <option value="Firefox">
                            </datalist>
                        </div>
                </form>
                <table class="table-RP">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Groupe</th>
                        <th>Supprimer inscription</th>
                    </tr>
                    <tr>
                        <td>13/06/1026</td>
                        <td>77</td>
                        <td>Payé</td>
                        <td>icon</td><!--mettre un bouton qui supprime-->
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
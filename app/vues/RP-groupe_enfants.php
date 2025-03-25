<div class="containerOrange">
    <h1>Menu Inscription</h1>
    <a href="index.php?controller=Reg&action=CreateReg"><button class="button3" >Inscrire un enfant au centre</button></a>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=RegActivity&action=CreateRegActivity"><button class="onglet">Inscription activités</button></a>
            <a href="index.php?controller=RegActivity&action=ModifyRegActivity"><button class="onglet">Modifier inscription activités</button></a>
            <a href="index.php?controller=RegCentre&action=ModifyReg"><button class="onglet">Modifier inscription au centre</button></a>
            <a href="index.php?controller=RegCentre&action=ValidReg"><button class="onglet">Valider inscription centre</button></a>
            <a href="index.php?controller=Child_Group&action=CreateGroup"><button class="onglet active">Groupe enfant</button></a>
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
        </div>
        <div class="form-content-RP">
            <div class="tab-content-GA" style="display: block">
                <p class="form-title-RP">Création de groupe d'enfant</p>
                <form method='post'>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_groupe">Nom du groupe <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="nom_groupe" id="nom_groupe" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nombre_groupe">Nombre de place <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="nombre_groupe" id="nombre_groupe" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="ageMin">Age Minimum <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="ageMin" id="ageMin" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="ageMax">Age maximum <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="ageMax" id="ageMax" value="" required>
                        </div>
                        <div class="register-tab-for-btn">
                            <button  type="submit">Créer l'activité</button>
                        </div>
                </form>
                <p class="form-title-RP">Enfant sans groupe</p>
                <div class="profil info">
                    <h3>Nombre d'enfant sans groupe :</h3>
                    <p>3</p>
                </div>
                <table class="table-RP">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Groupe</th>
                        <th>Affecter à un groupe</th>
                    </tr>
                    <tr>
                        <td>13/06/1026</td>
                        <td>77</td>
                        <td>Payé</td>
                        <td>
                            <form id="affectationGroupForm">
                                <div>
                                    <label for="nom_groupe"></label>
                                    <input list="liste_groupe" id="affectationGroup">
                                    <datalist id="liste_groupe"><!-- je sais pas comment on reprend de la database-->
                                        <option value="Edge">
                                        <option value="Firefox">
                                    </datalist>
                                </div>
                                <div>
                                    <button  type="submit" id="affectationGroupButton">Valider</button>
                                </div>
                            </form>
                        </td><!--bouton qui affecte à un groupe-->
                    </tr>
                </table>
                <p class="form-title-RP">Consultation de groupe d'enfant</p>
                <form>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="nom_groupe">Nom du groupe</label>
                        <input class="input-text-RP" list="liste_groupe">
                        <datalist id="liste_groupe"><!-- je sais pas comment on reprend de la database-->
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
                        <th>Affecter à un groupe</th>
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
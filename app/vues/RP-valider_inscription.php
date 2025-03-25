<div class="containerOrange">
    <h1>Menu Inscription</h1>

    <a href="index.php?controller=Child&action=CreateChild"> <button type="button" class="button3">Inscrire un enfant au centre</button></a>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=RegActivity&action=CreateRegActivity"><button class="onglet">Inscription activités</button></a>
            <a href="index.php?controller=RegActivity&action=ModifyRegActivity"><button class="onglet">Modifier inscription activités</button></a>
            <a href="index.php?controller=RegCentre&action=ModifyReg"><button class="onglet">Modifier inscription au centre</button></a>
            <a href="index.php?controller=RegCentre&action=ValidReg"><button class="onglet active">Valider inscription centre</button></a>
            <a href="index.php?controller=Child_Group&action=CreateGroup"><button class="onglet">Groupe enfant</button></a>
            <a href="index.php?controller=Child&action=showInfoEnfants"><button class="onglet">Informations enfants</button></a>
        </div>
        <div class="form-content-RP">
            <div class="tab-content-GA" style="display: block">
                <p class="form-title-RP">Enfants aux inscriptions non validées</p>
                <table class="table-RP">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Groupe</th>
                    </tr>
                    <tr>
                        <td><a href="index.php?controller=Child&action=ShowInfoInscription" class="lien">13/06/1026</a></td>
                        <td>77</td>
                        <td>Payé</td>
                        <td>icon</td>
                    </tr>
                </table>
    </div>
</div>
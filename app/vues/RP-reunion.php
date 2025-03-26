<div class="containerOrange">
    <h1>Gestion du centre</h1>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=Facture&action=showFacture"><button class="onglet">Facture</button></a>
            <a href="index.php?controller=Reunion&action=showReunion"><button class="onglet active">Réunion</button></a>
            <a href="index.php?controller=Questionnaire&action=showQuestionnaire"><button class="onglet">Questionnaire</button></a>
        </div>

        <div class="form-content-RP">
            <!--Réunion-->
            <div class="tab-content-GA">
            <?php if(isset($reunion)){?>
                    <form method='post' action="index.php?controller=Reunion&action=ModifyReunion&id=<?= $reunion["id_reunion"] ?>">
                        <p class="form-title-RP">Modification réunion</p>
                        
                    <?php }else{?>
                            <form method='post' action="index.php?controller=Reunion&action=createReunion">
                    <p class="form-title-RP">Création réunion</p>
                        
                            <?php }?>
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nom_reunion">Nom de la réunion <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="nom_reunion" id="nom_reunion" 
                            value="<?= isset($_POST['nom_reunion']) ? htmlspecialchars($_POST['nom_reunion']) : (isset($reunion) ? $reunion["nom_reunion"] : "") ?>" 
                            required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="date_reunion">Date <span class="obligate">*</span></label>
                            <input type="date" class="input-text-RP" name="date_reunion" id="date_reunion" 
                            value="<?= isset($_POST['date_reunion']) ? htmlspecialchars($_POST['date_reunion']) : (isset($reunion) ? $reunion["date_reunion"] : "") ?>" 
                            required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="heure_reunion">Heure de la réunion <span class="obligate">*</span></label>
                            <input type="time" class="input-text-RP" name="heure_reunion" id="heure_reunion" 
                            value="<?= isset($_POST['heure_reunion']) ? htmlspecialchars($_POST['heure_reunion']) : (isset($reunion) ? $reunion["heure_reunion"] : "") ?>" 
                            required>
                        </div>
                    </div>
                    <div class="register-tab-for-btn">
                        <button  type="submit">
                        <?php if(isset($reunion)){?>
                                Modifier la réunion
                            <?php }else{?>
                                Créer la réunion
                            <?php }?>
                        </button>
                    </div>
                </form>
                <p class="form-title-RP">Historique des réunions</p>
                <table class="table-RP">
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Etat</th>
                        <th>Actions</th>
                    </tr>
                    <?php if(isset($reunions)){
                        foreach ($reunions as $reunion){?>
                        <tr>
                        <td><?= $reunion['nom_reunion']?></td>
                        <td><?= $reunion['date_reunion']?></td>
                        <td><?= $reunion['heure_reunion']?></td>
                        <td><?= $reunion['etat_reunion']?></td>
                        <td>
                            <a href="index.php?controller=Reunion&action=getReunion&id=<?= $reunion["id_reunion"] ?>">M</a> 
                            <a href="index.php?controller=Reunion&action=cancelReunion&id=<?= $reunion["id_reunion"] ?>">A</a> 
                            <a href="index.php?controller=Reunion&action=deleteReunion&id=<?= $reunion["id_reunion"] ?>">S</a> 
                        </td>
                    </tr>
                   <?php }}?>
                    
                </table>
            </div>
        </div>
    </div>
</div>
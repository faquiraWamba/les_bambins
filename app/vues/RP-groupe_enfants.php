<div class="containerOrange">
    <h1>Menu Inscription</h1>
    <a href="index.php?controller=Child&action=CreateChild"> <button type="button" class="button3">Inscrire un enfant au centre</button></a>
    <div class="form_GA">
        <div class="onglet-RP">
            <a href="index.php?controller=RegActivity&action=CreateRegActivity"><button class="onglet">Inscription activités</button></a>
            <a href="index.php?controller=RegActivity&action=ModifyRegActivity"><button class="onglet">Modifier inscription activités</button></a>
            <a href="index.php?controller=RegCentre&action=ModifyReg"><button class="onglet">Modifier inscription au centre</button></a>
            <a href="index.php?controller=RegCentre&action=ValidReg"><button class="onglet">Valider inscription centre</button></a>
            <a href="index.php?controller=Child_Group&action=CreateGroup"><button class="onglet active">Groupe enfant</button></a>
        </div>
        <div class="form-content-RP">
            <div class="tab-content-GA" style="display: block">
                <p class="form-title-RP">Création de groupe d'enfant</p>
                <form method='post' action="index.php?controller=Child_Group&action=CreateGroup">
                    <div class="register-data-form RP">
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="nb_enfant">Nombre de place <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="nb_enfant" id="nb_enfant" value="" required>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="age_min_groupe">Age Minimum <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="age_min_groupe" id="age_min_groupe" value="" required min=3>
                        </div>
                        <div class="register-tab-form-item register-tab-holiday-item">
                            <label for="age_max_groupe">Age maximum <span class="obligate">*</span></label>
                            <input type="text" class="input-text-RP" name="age_max_groupe" id="age_max_groupe" value="" required max=12>
                        </div>
                        <div class="register-tab-for-btn">
                            <button  type="submit">Créer le groupe</button>
                        </div>
                    </div>
                </form>
                <p class="form-title-RP">Enfant sans groupe</p>
                <div class="profil info">
                    <h3>Nombre d'enfant sans groupe :</h3>
                    <p>3</p>
                </div>
                <table class="table-RP">
                    <tr>
                        <th>Numerom</th>
                        <th>Prénom</th>
                        <th>Affecter à un groupe</th>
                    </tr>
                    <?php if($childsNogroup){
                        foreach($childsNogroup as $childNogroup){?>
                        <tr>
                        <td><?=$childNogroup['nom_enfant']?></td>
                        <td><?=$childNogroup['prenom_enfant']?></td>
                      
                        <td>
                            <form id="affectationGroupForm" action="index.php?controller=Child_Group&action=updateGroup" method="post">
                                <div>
                                    <input type="hidden" name="nom_enfant" value="<?=$childNogroup['id_enfant']?>">
                                    <label for="nom_groupe"></label>
                                    <select id="liste_groupe" name='numero_groupe' required>
                                        <option value="">groupe</option>
                                        <?php if($groups){
                                            foreach($groups as $group){?>    
                                            <option value="<?= $group['numero_groupe']?>"><?= $group['numero_groupe']?></option>
                                            <?php  }
                                        }?>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" id="affectationGroupButton">Valider</button>
                                </div>
                            </form>
                        </td>
                        </tr>
                        <?php  }
                    }?>
                </table>

                <!-- Enfants par groupe -->
                <p class="form-title-RP">Consultation de groupe d'enfant</p>
                <form>
                    <div class="register-tab-form-item register-tab-holiday-item">
                        <label for="nom_groupe">Nom du groupe</label>
                        <select id="liste_groupe" name='numero_groupe' required><!-- je sais pas comment on reprend de la database-->
                            <option value="">groupe</option>
                            <?php if($groups){
                                foreach($groups as $group){?>    
                                <option value=<?= $group['numero_groupe']?>><?= $group['numero_groupe']?></option>
                                <?php  }
                            }?>
                        </select>
                        <button type="submit">Rechercher</button>
                    </div>
                </form>
                <table class="table-RP">
                    <tr>
                        <th>Numgroupe</th>
                        <th>Places restantes</th>
                        <th>Places occupé</th>
                        <th>Age Min</th>
                        <th>Age max</th>
                        <th>voir</th>
                    </tr>
                    <?php if($groups){
                        foreach($groups as $group){?>
                        <tr>
                        <td><?=$group['numero_groupe']?></td>
                        <td><?=$group['nb_enfant']?></td>
                        <td><?=$group['nb_enfant']?></td>
                        <td><?=$group['age_min_groupe']?></td>
                        <td><?=$group['age_max_groupe']?></td>
                        <td><form method="POST" action="index.php?controller=GroupController&action=deleteGroup" class="delete-form">
                                <input type="hidden" name="id_groupe" value="<?= $group['id_groupe'] ?>">
                                <button type="submit" class="delete-btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form></td>
                    </tr>
                      <?php  }
                    }?>
                </table>

                <!-- Liste des groupes -->
                <p class="form-title-RP">Consultation des groupes</p>
                <table class="table-RP">
                    <tr>
                        <th>Numgroupe</th>
                        <th>Places restantes</th>
                        <th>Places occupé</th>
                        <th>Age Min</th>
                        <th>Age max</th>
                        <th>Supprimer</th>
                    </tr>
                    <?php if($groups){
                        foreach($groups as $group){?>
                        <tr>
                        <td><?=$group['numero_groupe']?></td>
                        <td><?=$group['nb_enfant']?></td>
                        <td><?=$group['nb_enfant']?></td>
                        <td><?=$group['age_min_groupe']?></td>
                        <td><?=$group['age_max_groupe']?></td>
                        <td><form method="POST" action="index.php?controller=GroupController&action=deleteGroup" class="delete-form">
                                <input type="hidden" name="id_groupe" value="<?= $group['id_groupe'] ?>">
                                <button type="submit" class="delete-btn">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form></td>
                    </tr>
                      <?php  }
                    }?>
                </table>
            </div>
        </div>
    </div>
</div>
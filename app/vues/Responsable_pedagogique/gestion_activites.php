<div class="container_gestion_activite">
    <div class="gestion_activite_container">
        <div class="onglet_active" data-anim="1">Consulter activités</div>
        <div class="onglet" data-anim="2">Créer une activité</div>
        <div class="onglet" data-anim="3">Modifier une activité</div>
        <div class="onglet" data-anim="4">Consulter parcours activité</div>
        <div class="onglet" data-anim="5">Créer un parcours activité</div>
        <div class="onglet" data-anim="6">Modifier un parcours activité</div>
    </div>

    <div class="contenu activeContenu" data-anim="1">
        <!-- creprendre fatou-->
    </div>

    <div class="contenu activeContenu" data-anim="2">
        <form method='post'  id="section1" class=" "><!--action="index.php?controller=Parent&action=CreateParent"-->
            <p class="form-title">Créer une activité</p>
            <div class="register-data-form">
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nom_activite">Nom de l'activité <span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="nom_activite" id="nom_activite" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="tranche_age">Tranche d'âge <span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="tranche_age" id="tranche_age" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="type_activite">Type d'activité <span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="type_activite" id="type_activite" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="Tarif_activite">Tarif<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="Tarif_activite" id="Tarif_activite" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nb_place">Nombre de places <span class="obligate">*</span></label>
                    <input type="number" class="input-text" name="nb_place" id="nb_place" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="niveau">Niveau<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="niveau" id="niveau" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="prerequis">Prérequis<span class="obligate">*</span></label>
                    <textarea class="input-text" name="description_activite" id="description_activite" value="" rows="5" cols="100"> </textarea>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="description_activite">Description<span class="obligate">*</span></label>
                    <textarea class="input-text" name="description_activite" id="description_activite" value="" rows="10" cols="100"> </textarea>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="image_activite">Image d'illustration<span class="obligate">*</span></label>
                    <input type="file" class="input-text" name="image_activite" id="image_activite" value="">
                </div>
            </div>
            <div class="register-tab-for-btn">
                <!-- bouton pour soumettre--><button  type="submit">Créer l'activité</button>
            </div>
        </form>
    </div>

    <div class="contenu activeContenu" data-anim="3">
        <p class="form-title">Modifier une activité</p>
        <form method='post'  id="section1" class=" "><!--action="index.php?controller=Parent&action=CreateParent"-->
            <p class="form-title">Modifier une activité</p>
            <div class="register-data-form">
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nom_activite">Nom de l'activité <span class="obligate">*</span></label>
                    <input list="liste_activite">
                    <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                        <option value="Edge">
                        <option value="Firefox">
                    </datalist>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="tranche_age">Tranche d'âge <span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="tranche_age" id="tranche_age" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="type_activite">Type d'activité <span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="type_activite" id="type_activite" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="Tarif_activite">Tarif<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="Tarif_activite" id="Tarif_activite" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nb_place">Nombre de places <span class="obligate">*</span></label>
                    <input type="number" class="input-text" name="nb_place" id="nb_place" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="niveau">Niveau<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="niveau" id="niveau" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="prerequis">Prérequis<span class="obligate">*</span></label>
                    <textarea class="input-text" name="description_activite" id="description_activite" value="" rows="5" cols="100"> </textarea>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="description_activite">Description<span class="obligate">*</span></label>
                    <textarea class="input-text" name="description_activite" id="description_activite" value="" rows="10" cols="100"> </textarea>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="image_activite">Image d'illustration<span class="obligate">*</span></label>
                    <input type="file" class="input-text" name="image_activite" id="image_activite" value="">
                </div>
            </div>
            <div class="register-tab-for-btn">
                <!-- bouton pour soumettre--><button  type="submit">Modifier l'activité</button>
                <button  type="submit">Supprimer l'activité</button>
            </div>
        </form>
    </div>

    <div class="contenu activeContenu" data-anim="4">
        <!-- creprendre fatou-->
    </div>

    <div class="contenu activeContenu" data-anim="5">
        <p class="form-title">Créer un parcours d'activité</p>
        <form method='post'  id="section1" class=" "><!--action="index.php?controller=Parent&action=CreateParent"-->
            <p class="form-title">Créer une activité</p>
            <div class="register-data-form">
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nom_parcours">Nom du parcours d'activité <span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="nom_parcours" id="nom_parcours" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="liste_activite">Liste des activités <span class="obligate">*</span></label>
                    <input list="liste_activite">
                    <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                        <option value="Edge">
                        <option value="Firefox">
                    </datalist>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="date_deb_parcours">A partir du <span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="date_deb_parcours" id="date_deb_parcours" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="date_fin_parcours">Jusqu'au<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="date_fin_parcours" id="date_fin_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="Tarif_parcours">Tarif<span class="obligate">*</span></label>
                    <input type="number" class="input-text" name="Tarif_parcours" id="Tarif_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nb_place_parcours">Nombre de places <span class="obligate">*</span></label>
                    <input type="number" class="input-text" name="nb_place_parcours" id="nb_place_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="niveau_parcours">Niveau<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="niveau_parcours" id="niveau_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="prerequis_parcours">Prérequis<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="prerequis_parcours" id="prerequis_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="description_parcours">Description<span class="obligate">*</span></label>
                    <textarea type="text" class="input-text" name="description_parcours" id="description_parcours" value=""></textarea>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="image_parcours">Image d'illustration<span class="obligate">*</span></label>
                    <input type="file" class="input-text" name="image_parcours" id="image_parcours" value="">
                </div>
            </div>
            <div class="register-tab-for-btn">
                <!-- bouton pour soumettre--><button  type="submit">Créer l'activité</button>
            </div>
        </form>

    </div>

    <div class="contenu activeContenu" data-anim="6">
        <p class="form-title">Modifier un parcours d'activité</p>
        <form method='post'  id="section1" class=" "><!--action="index.php?controller=Parent&action=CreateParent"-->
            <p class="form-title">Créer une activité</p>
            <div class="register-data-form">
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nom_parcours">Nom du parcours d'activité <span class="obligate">*</span></label>
                    <input list="liste_parcours">
                    <datalist id="liste_parcours"><!-- je sais pas comment on reprend de la database-->
                        <option value="Edge">
                        <option value="Firefox">
                    </datalist>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="liste_activite">Liste des activités <span class="obligate">*</span></label>
                    <input list="liste_activite">
                    <datalist id="liste_activite"><!-- je sais pas comment on reprend de la database-->
                        <option value="Edge">
                        <option value="Firefox">
                    </datalist>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="date_deb_parcours">A partir du <span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="date_deb_parcours" id="date_deb_parcours" value="" required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="date_fin_parcours">Jusqu'au<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="date_fin_parcours" id="date_fin_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="Tarif_parcours">Tarif<span class="obligate">*</span></label>
                    <input type="number" class="input-text" name="Tarif_parcours" id="Tarif_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="nb_place_parcours">Nombre de places <span class="obligate">*</span></label>
                    <input type="number" class="input-text" name="nb_place_parcours" id="nb_place_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="niveau_parcours">Niveau<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="niveau_parcours" id="niveau_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="prerequis_parcours">Prérequis<span class="obligate">*</span></label>
                    <input type="text" class="input-text" name="prerequis_parcours" id="prerequis_parcours" value=""required>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="description_parcours">Description<span class="obligate">*</span></label>
                    <textarea type="text" class="input-text" name="description_parcours" id="description_parcours" value=""></textarea>
                </div>
                <div class="register-tab-form-item register-tab-holiday-item">
                    <label for="image_parcours">Image d'illustration<span class="obligate">*</span></label>
                    <input type="file" class="input-text" name="image_parcours" id="image_parcours" value="">
                </div>
            </div>
            <div class="register-tab-for-btn">
                <!-- bouton pour soumettre--><button  type="submit">Modifier l'activité</button>
                <button  type="submit">Supprimer l'activité</button>
            </div>
        </form>
    </div>


</div>

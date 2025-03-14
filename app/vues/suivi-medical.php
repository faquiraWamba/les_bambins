<?php include 'header.php'; ?>
<div class="register-container">
    <h1>
        Suivi des enfants
    </h1>
    <div class="register-tab-container">

        <div class="register-tab-form">

            <div class="historique">

                <label for="nom">Nom de l'enfant :</label>
                <select id="nom">
                    <option>Exau M</option>
                </select>
                <div class="histo">
                    <p>Personnes à contact en cas d'urgence</p>
                </div>
                <div>
                    <p>Eunice : 06 20 90 24 04</p>
                    <p>
                    <p>Eunice : 06 20 90 24 04</p>
                    </p>
                    <p>
                    <p>Eunice : 06 20 90 24 04</p>
                    </p>
                </div>
                <div class="histo">
                    <p>Fiche médical</p>
                </div>

                <div class="somebody">
                    <label for="allergie">Allergie</label>
                </div>


                <div class="somebody">
                    <table class="allergie">

                        <tr>
                            <td>JeashKDHn</td>
                            <td>dfgngsdgle</td>
                            <td>dfgngsdgle</td>
                        </tr>

                    </table>
                    <div class="clearfix"></div> <!-- Empêche le chevauchement -->

                    <label for="traitement">Traitement en cours</label>

                </div>

                <!-- table traitement en cours -->
            </div>
            <form action='#' method='post' id="section1" class="register-tab-form-container ">
                <table>
                    <thead>
                        <tr>
                            <th>Nom du médicament</th>
                            <th>Posologie</th>
                            <th>Heure administration</th>
                            <th>Fréquence</th>
                            <th>Durée</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Doliprane</td>
                            <td>1comprimé matin, midi, soir</td>
                            <td>8h, 12, 18h</td>
                            <td>Curabitur pretium tincidunt lacus </td>
                            <td>Pendant 3 semaines</td>
                        </tr>

                    </tbody>
                </table>
            </form>
            <div class="somebody">
                <label for="restriction">Restriction</label>
            </div>
            <div>
                <p>t is a long established fact that a reader will be distracted by the
                    readable content of a page when looking at its layout. The point of
                    using Lorem Ipsum is that it has. </p> </br>

                <p>it look like readable English. Many desktop publishing packages and
                    web page editors now use Lorem Ipsum as their default model text, and
                    a search for 'lorem ipsum' will uncover many web sites still in their
                    infancy. Various versions have evolved over the years, sometimes by
                    accident, sometimes on purpose (injected humour and the like).</p>
            </div>

            <div class="histo">
                <p>Suivi des traitements</p>
            </div>

            <div class="somebody">
                <label for="enregistrer">Enregistrer une prise de traitement <a href="#">📧</a></label>
            </div>
            <div class="form-group">
                <label for="nom">Nom du médicament :</label>
                <input type="nom" id="nom" name="nom">
            </div>

            <div class="register-tab-for-btn">
                <button onclick="nextSection(1)" type="button">Enrégistrer une prise de traiment </button>
            </div>

            <div class="somebody">
                <label for="historique">Historiquede traitement</label>
            </div>
            <form action="">
                <table>
                    <thead>
                        <tr>
                            <th>Nom du médicament</th>
                            <th>Jour d'administration</th>
                            <th>Heure administration</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Doliprane</td>
                            <td>02/03/22</td>
                            <td>8h</td>

                        </tr>
                        <tr>
                            <td>Doliprane</td>
                            <td>02/03/22</td>
                            <td>8h</td>

                        </tr>

                    </tbody>
                </table>

                <div class="register-tab-for-btn">
                    <button onclick="nextSection(1)" type="button">Supprimer </button>
                    <button onclick="nextSection(1)" type="button">Modifier </button>
                </div>
            </form>

            <div class="histo">
                <p>incident médicaux</p>
            </div>

            <form action="">
                <div class="somebody">
                    <label for="historique">Formulaire d'incident medical</label>
                </div>


                <div class="form-group">
                    <label for="nature">Nature de l'incident :</label>
                    <input type="nature" id="nature" name="nature"> </br>
                </div>
                <div class="description">

                    <p>Description</p>
                </div>

                <div class="nouveau-div">

                </div>

                <div class="form-group">
                    <label for="soins">Soins administrés :</label>
                    <input type="text" id="soins" name="soins">
                    </br>
                </div>
                <div class="register-tab-for-btn">
                    <button onclick="nextSection(1)" type="button">Enregistrer </button>

                </div>

            </form>
            <div class="somebody">
                <label for="historique">Historique d'incidents médicaux</label>
            </div>
            <form action="">

            </form>

<!-- Historique du traiment -->


            <form action="">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Lieu</th>
                            <th>Description</th>
                            <th>Soins administrés</th>
                            <th>Personne administrante</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>02/03/22</td>
                            <td>8h</td>
                            <td>La cour</td>
                            <td>gfedhjsklhgfdsdfcghjkertjkmjhgfdsghjkjhgfdsqsuieryuoiouytry</td>
                            <td>gfedhjsklhgfdsdfcghjkertjkmjhgfdsghjkjhgfdsqsuieryuoiouytry</td>
                            <td>Xau</td>

                        </tr>
                        <tr>
                        <td>02/03/22</td>
                            <td>8h</td>
                            <td>La cour</td>
                            <td>gfedhjsklhgfdsdfcghjkertjkmjhgfdsghjkjhgfdsqsuieryuoiouytry</td>
                            <td>gfedhjsklhgfdsdfcghjkertjkmjhgfdsghjkjhgfdsqsuieryuoiouytry</td>
                            <td>Xau</td>

                        </tr>

                    </tbody>
                </table>

                <div class="register-tab-for-btn">
                    <button onclick="nextSection(1)" type="button">Supprimer </button>
                    <button onclick="nextSection(1)" type="button">Modifier </button>
                </div>
            </form>
          
            <!-- <div class="empty-space"></div> -->


        </div>
        <div class="menu">
        <a href="suivi-presence.php">
                <div class="menu-item active">Suivi des présences</div>
            </a>

            <a href="suivi-medical.php">
                <div class="menu-item active">Suivi médical</div>
            </a>
            <a href="suivi-comportement.php">
                <div class="menu-item active">Suivi comportemental</div>
            </a>
            <a href="suivi-pedagogique.php">
                <div class="menu-item active">Suivi pédagogique</div>
            </a>
    </div>

</div>

</div>
<?php include('footer.php'); ?>
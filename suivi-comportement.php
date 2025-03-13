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
                    <p>Enregistremetn d'un nouvel évenement</p>
                </div>

                <!-- <div class="form-group">
                    <label for="date">Date :</label>
                    <select id="date">
                        <option>13.02.25</option>
                    </select>
                </div> -->

                <!-- <label for="type">Type de suivi :</label>
                <select id="type">
                    <option>Succès</option>
                </select> -->

                <!-- <div class="description">

                    <p>Descriptif</p>
                </div> -->

                <!-- <div class="nouveau-div">

                </div> -->

                <!-- <div class="action">

                    <p>Action prise</p>
                </div>
                <div class="nouveau-div">

                </div> -->




                <div class="form-container">
                    <label for="date">Date</label>
                    <input type="date" id="date">

                    <label for="type-suivi">Type de suivi</label>
                    <select id="type-suivi">
                        <option>Succès</option>
                    </select>

                    <label for="description">Descriptif</label>
                    <textarea id="description"></textarea>

                    <label for="action">Action prise</label>
                    <textarea id="action"></textarea>
                </div>

            </div>





            <div class="register-tab-for-btn">
                <button onclick="nextSection(1)" type="button">Enregistrer </button>

            </div>

            </form>

            <div class="histo">
                <p>incident médicaux</p>
            </div>

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

</div>
<?php include('footer.php'); ?>
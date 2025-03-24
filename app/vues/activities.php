<div class="container2">
    <h2>Nos activités</h2>

    <div class="activity">
        <img src="public/images/img-peinture.jpg" alt="Atelier Peinture" class="activity-img">
        <div class="description">
            <h3>Atelier Peinture - Niveau</h3>
            <p>Développez la créativité de votre enfant à travers des activités artistiques où il pourra exprimer son
                imagination avec des pinceaux et des couleurs. Hac ita persuasione reducti intra moenia bellatores
                obseratis undique portarum aditibus, propugnaculis insistebant et pinnis, congesta undique saxa telaque
                habentes in promptu, ut si quis se proripuisset interius, multitudine missilium sterneretur et
                lapidum.Hac ita persuasione reducti intra moenia bellatores obseratis undique portarum aditibus,
                propugnaculis insistebant et pinnis, congesta undique saxa telaque habentes in promptu, ut si quis se
                </p>
            <h3>Prérequis</h3>
                <p>apidum.Hac ita persuasione reducti intra moenia bellatores obseratis undique portarum aditibus,
                    propugnaculis insistebant et pinnis, congesta undique saxa telaque habentes in promptu, ut si quis se
                    proripuisset interius, multitudine missilium sterneretur et lapidum.Hac ita persuasione reducti intra
                    moenia bellatores obseratis undique portarum aditibus, propugnaculis insistebant et pinnis, congesta
                    undique saxa telaque habentes </p>
        </div>
        <div>
                <h3>Horaire</h3>
                <p>Lundi - 16h</p>
                <h3>Tranche d'âge</h3>
                <p>8 - 10 ans</p>
            </div>
        <?php if ($_GET['action'] == 'ConsultActivity') : ?>
            <!-- Ajout d'un nouvel élément spécifique uniquement dans la page ConsultActivity -->
            <div>
                <a href="index.php?controller=Activity&action=ModifyActivity">
                    <button class="button3">Modifier</button>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div class="activity">
        <div class="description">
            <h3>Atelier Guitare - Niveau</h3>
            <p>Apprenez à jouer de la guitare dans une ambiance ludique et motivante. Un programme adapté aux débutants
                comme aux plus expérimentés. Hac ita persuasione reducti intra moenia bellatores obseratis undique
                portarum aditibus, propugnaculis insistebant et pinnis, congesta undique saxa telaque habentes in
                promptu, ut si quis se proripuisset interius, multitudine missilium sterneretur et lapidum.Hac ita
                persuasione reducti intra moenia bellatores obseratis undique portarum aditibus, propugnaculis
                inaditibus, propugnaculis insistebant et pinnis, congesta undique
                saxa telaque habentes in promptu, ut si quis se proripuisset interius, multitudine missilium sterneretur
                et lapidum.</p>
            <h3>Prérequis</h3>
                <p>apidum.Hac ita persuasione reducti intra moenia bellatores obseratis undique portarum aditibus,
                    propugnaculis insistebant et pinnis, congesta undique saxa telaque habentes in promptu, ut si quis se
                    proripuisset interius, multitudine missilium sterneretur et lapidum.Hac ita persuasione reducti intra
                    moenia bellatores obseratis undique portarum aditibus, propugnaculis insistebant et pinnis, congesta
                    undique saxa telaque habentes </p>
        </div>
        <img src="public/images/img-guitare.jpg" alt="Cours de Guitare" class="activity-img">
        <?php if ($_GET['action'] == 'ConsultActivity') : ?>
        <!-- Ajout d'un nouvel élément spécifique uniquement dans la page ConsultActivity -->
        <div>
            <a href="index.php?controller=Activity&action=ModifyActivity">
                <button class="button3">Modifier</button>
            </a>
        </div>
        <?php endif; ?>
            <div>
                <h3>Horaire</h3>
                <p>Lundi - 16h</p>
                <h3>Tranche d'âge</h3>
                <p>8 - 10 ans</p>
            </div>
    </div>

    <div class="activity">
        <img src="public/images/img-chant.jpg" alt="Atelier Chant" class="activity-img">
        <div class="description">
            <h3>Atelier Chant- Niveau</h3>
            <p>Encouragez votre enfant à explorer sa voix et à développer sa confiance en lui à travers le chant et la
                musique en groupe. Hac ita persuasione reducti intra moenia bellatores obseratis undique portarum
                aditibus, propugnaculis insistebant et pinnis, congesta undique saxa telaque habentes in promptu, ut si
                quis se proripuisset interius, multitudine missilium sterneretur et lapidum.Hac ita persuasione reducti
                intra moenia bellat pinnis, congesta undique saxa telaque habentes in
                promptu, ut si quis se proripuisset interius, multitudine missilium sterneretur et lapidum.</p>
            <h3>Prérequis</h3>
                <p>apidum.Hac ita persuasione reducti intra moenia bellatores obseratis undique portarum aditibus,
                    propugnaculis insistebant et pinnis, congesta undique saxa telaque habentes in promptu, ut si quis se
                    proripuisset interius, multitudine missilium sterneretur et lapidum.Hac ita persuasione reducti intra
                    moenia bellatores obseratis undique portarum aditibus, propugnaculis insistebant et pinnis, congesta
                    undique saxa telaque habentes </p>
        </div>
            <div>
                <h3>Horaire</h3>
                <p>Lundi - 16h</p>
                <h3>Tranche d'âge</h3>
                <p>8 - 10 ans</p>
            </div>
        <?php if ($_GET['action'] == 'ConsultActivity') : ?>
            <!-- Ajout d'un nouvel élément spécifique uniquement dans la page ConsultActivity -->
            <div>
                <a href="index.php?controller=Activity&action=ModifyActivity">
                    <button class="button3">Modifier</button>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div class="cta">
        <h3>Intéressé? Inscrivez votre enfant</h3>
        <a href="index.php?controller=Child&action=CreateChild">
            <button type="button">Inscrire mon enfant</button>
        </a>
    </div>
</div>

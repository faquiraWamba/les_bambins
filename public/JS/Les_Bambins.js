document.querySelectorAll(".boutons_FAQ").forEach(button => {
    button.addEventListener("click", function () {
        let content = this.nextElementSibling;

        if (content && content.classList.contains("bouton_et_text_FAQ")) {
            content.classList.toggle("cache");
        }
    });
});



// Sélection de tous les boutons de question (bouton_2_FAQ)
const questionButtons = document.querySelectorAll(".bouton_2_FAQ");

// Ajout d'un écouteur d'événement sur chaque bouton de question
questionButtons.forEach(button => {
    button.addEventListener("click", () => {
        // Trouver le paragraphe suivant qui contient la réponse
        const answer = button.nextElementSibling;

        // Vérifier si c'est bien un élément avec la classe "reponse_q"
        if (answer && answer.classList.contains("reponse_q")) {
            answer.classList.toggle("cache2");
        }
    });
});


//<div id="FAQ">
//         <div class="sections_FAQ">
//             <button class="boutons_FAQ">INFORMATIONS GÉNÉRALES</button>
//             <p class="text_FAQ">Dans un village perdu au cœur des montagnes, un mystérieux voyageur arriva un soir d’hiver. Personne ne connaissait son nom, ni la raison de sa venue. Il portait un long manteau noir, usé par le temps, et une sacoche en cuir dont personne ne voyait le contenu. Les habitants, méfiants, observaient de loin, se murmurant des suppositions. Était-ce un marchand ? Un fugitif ? Un conteur ? Le vieil aubergiste, curieux, l’invita à sa table. L’étranger accepta d’un simple hochement de tête et s’installa près du feu. Après un long silence, il se mit à parler. Son récit captivait l’assemblée : il venait d’un royaume lointain, où les forêts étaient dorées et les rivières chantaient des mélodies oubliées. Il évoqua une quête inachevée, une clé qui ouvrait un portail vers l’inconnu. Les villageois, d’abord sceptiques, se laissèrent emporter par son histoire. Lorsqu’il se leva pour partir au matin, il laissa derrière lui un petit coffret scellé. À l’intérieur, un parchemin portait ces mots : "Suivez les étoiles, le chemin vous trouvera." Ce soir-là, sous le ciel étoilé, le village n’était plus tout à fait le même.</p>
//         </div>
//         <div class="sections_FAQ">
//             <button class="boutons_FAQ">INFORMATIONS GÉNÉRALES</button>
//             <p class="text_FAQ">Dans un village perdu au cœur des montagnes, un mystérieux voyageur arriva un soir d’hiver. Personne ne connaissait son nom, ni la raison de sa venue. Il portait un long manteau noir, usé par le temps, et une sacoche en cuir dont personne ne voyait le contenu. Les habitants, méfiants, observaient de loin, se murmurant des suppositions. Était-ce un marchand ? Un fugitif ? Un conteur ? Le vieil aubergiste, curieux, l’invita à sa table. L’étranger accepta d’un simple hochement de tête et s’installa près du feu. Après un long silence, il se mit à parler. Son récit captivait l’assemblée : il venait d’un royaume lointain, où les forêts étaient dorées et les rivières chantaient des mélodies oubliées. Il évoqua une quête inachevée, une clé qui ouvrait un portail vers l’inconnu. Les villageois, d’abord sceptiques, se laissèrent emporter par son histoire. Lorsqu’il se leva pour partir au matin, il laissa derrière lui un petit coffret scellé. À l’intérieur, un parchemin portait ces mots : "Suivez les étoiles, le chemin vous trouvera." Ce soir-là, sous le ciel étoilé, le village n’était plus tout à fait le même.</p>
//         </div>
//     </div>
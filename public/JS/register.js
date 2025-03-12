function validateAndSubmitForm(event, section=null) {
    event.preventDefault(); // Empêche l'envoi par défaut du formulaire

    let isValid = true;
    let form = document.getElementById("section2");

    let fields = [
        { id: "nom_enfant", errorId: "nom_enfant_error" },
        { id: "prenom_enfant", errorId: "prenom_enfant_error" },
        { id: "sexe", errorId: "sexe_error" },
        { id: "birthday", errorId: "birthday_error" }
    ];

    // Vérifier les champs requis
    fields.forEach(field => {
        let input = document.getElementById(field.id);
        let errorSpan = document.getElementById(field.errorId);

        if (input.value.trim() === "") {
            input.classList.add("inputError");
            errorSpan.textContent = "Ce champ est requis.";
            isValid = false;
        } else {
            errorSpan.textContent = "";
        }
    });

    if (!isValid) return false; // Arrêter si validation échoue

    let submitButton = document.getElementById("submitButton");
    submitButton.disabled = true; // Désactiver le bouton

    // Création d'un objet FormData pour envoyer les données
    let formData = new FormData(form);

    fetch("index.php?controller=Child&action=CreateChild", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            saveFormData(); // Sauvegarder les données en localStorage
            nextSection(section); // Passer à la section suivante
        } else {
            alert("Erreur : " + data.message);
        }
    })
    .catch(error => {
        alert("Erreur serveur, veuillez réessayer.");
    })
    .finally(() => {
        submitButton.disabled = false; // Réactiver le bouton après la requête
    });

    return false; // Empêcher la soumission classique du formulaire
}

// Sauvegarde des données du formulaire dans le localStorage
function saveFormData() {
    let formData = {
        nom_enfant: document.getElementById("nom_enfant").value,
        prenom_enfant: document.getElementById("prenom_enfant").value,
        sexe: document.getElementById("sexe").value,
        birthday: document.getElementById("birthday").value,
    };
    localStorage.setItem("formData", JSON.stringify(formData));
}

// Charger les données sauvegardées après un rafraîchissement
function loadFormData() {
    let savedData = localStorage.getItem("formData");
    if (savedData) {
        savedData = JSON.parse(savedData);
        document.getElementById("nom_enfant").value = savedData.nom_enfant || "";
        document.getElementById("prenom_enfant").value = savedData.prenom_enfant || "";
        document.getElementById("sexe").value = savedData.sexe || "";
        document.getElementById("birthday").value = savedData.birthday || "";
    }
}

// Ne pas revenir à la première section après rafraîchissement
document.addEventListener("DOMContentLoaded", function () {
    loadFormData();

    let currentSection = localStorage.getItem("currentSection");
    if (currentSection) {
        document.getElementById("section" + currentSection).classList.remove("inactive");
        document.getElementById("section1").classList.add("inactive");
    }
});

// Fonction pour gérer les sections
function nextSection(current) {
    let currentSection = document.getElementById("section" + current);
    let nextIndex = current + 1;
    let nextSection = document.getElementById("section" + nextIndex);

    if (nextSection) {
        document.getElementById("section-title" + current).classList.remove("active-section");
        document.getElementById("section-title" + nextIndex).classList.add("active-section");

        currentSection.classList.add("inactive");
        nextSection.classList.remove("inactive");

        localStorage.setItem("currentSection", nextIndex); // Sauvegarder la section actuelle

        window.scrollTo({ top: 0, behavior: "smooth" });
    }
}

// function previousSection(current) {
//     let currentSection = document.getElementById("section" + current);
//     let prevIndex = current - 1;
//     let prevSection = document.getElementById("section" + prevIndex);

//     if (prevSection) {
//         currentSection.classList.add("inactive");
//         prevSection.classList.remove("inactive");

//         localStorage.setItem("currentSection", prevIndex);
//     }
// }

// function nextSection(current){
//     // Sélectionner la section actuelle et la section suivante
//     const currentSection = document.getElementById("section"+current);
//     const nextIndex = current + 1;
//     const nextSection = document.getElementById("section"+nextIndex);
    
//     // Si la section suivante existe
//     if(nextSection) {
//         // Gérer les titres de sections (ajouter et supprimer la classe active)
//         document.getElementById("section-title"+current).classList.remove("active-section");
//         document.getElementById("section-title"+nextIndex).classList.add("active-section");
        
//         // Gérer l'affichage des sections (ajouter et supprimer la classe inactive)
//         currentSection.classList.add("inactive");
//         nextSection.classList.remove("inactive");

//         window.scrollTo({ top: 0, behavior: "smooth" });
//     }
// };

// function previousSection(current){
//     // Sélectionner la section actuelle et la section suivante
//     const currentSection = document.getElementById("section"+current);
//     const previousIndex = current - 1;
//     const previousSection = document.getElementById("section"+previousIndex);
  
//     // Si la section suivante existe
//     if(previousSection) {
//         // Gérer les titres de sections (ajouter et supprimer la classe active)
//         document.getElementById("section-title"+current).classList.remove("active-section");
//         document.getElementById("section-title"+previousIndex).classList.add("active-section");
        
//         // Gérer l'affichage des sections (ajouter et supprimer la classe inactive)
//         currentSection.classList.add("inactive");
//         previousSection.classList.remove("inactive");
//         window.scrollTo({ top: 0, behavior: "smooth" });
//     }else{
//         alert("error");
//     }
// }

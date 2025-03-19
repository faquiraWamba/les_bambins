function validateForm(event, section) {
    event.preventDefault(); // Empêche l'envoi par défaut du formulaire

    let isValid = true;
    let form = document.getElementById("section" + section); 
    let inputsDiv = form.getElementsByClassName("register-tab-form-item");
    // alert("inputs: " + inputsDiv.length); 
    
    let errorSpan = document.getElementById("form-error");
    
    // Vérifier les champs requis
    Array.from(inputsDiv).forEach(field => {  // Convertir HTMLCollection en tableau
        if (field.getElementsByClassName("obligate").length > 0) { 
            let inputs = field.querySelectorAll("input");
            let selects = field.querySelectorAll("select");
            inputs.forEach(input => { // Parcourir tous les inputs
                if (input.value.trim() === "") {
                    input.classList.add("input-error"); // Ajouter une classe d'erreur
                    isValid = false;
                }else{
                    if(input.classList.contains("input-error")){
                        input.classList.remove("input-error"); // Ajouter une classe d'erreur
                    }
                }
            });
            selects.forEach(select => { // Parcourir tous les inputs
                if (select.value.trim() === "") {
                    select.classList.add("input-error"); // Ajouter une classe d'erreur
                    isValid = false;
                }else{
                    if(select.classList.contains("input-error")){
                        select.classList.remove("input-error"); // Ajouter une classe d'erreur
                    }
                }
            });
        }
    });

    if (!isValid) {
        errorSpan.textContent = "Les champs marqués avec un * sont obligatoires";
    } 
    return isValid;
}


function nextSection(event, current){
    //
    let isValid = validateForm(event,current)
    
    if(isValid==true){
        //Vérification de l'email
        if(current==1){
            document.getElementById("email_parent").addEventListener("blur", function () {
                let email = this.value;
            
                if (email) {
                console.log(email);
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "app/vues/verifier_email.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            let response = JSON.parse(xhr.responseText);
                            if (response.exists) {
                                alert("Cet email est déjà utilisé !");
                            }
                        }
                    };
            
                    xhr.send("email=" + encodeURIComponent(email));
                }
            });
            // let btn =document.getElementById("suivant-btn");
            // btn.add
            document.getElementById("suivant-btn").addEventListener("click", function () {
                let emailField = document.getElementById("email_parent");
                let email = emailField.value;
                console.log(email);
                if (email) {
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "app/vues/verifier_email.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            console.log("Réponse du serveur : ", xhr.responseText); // Affiche la réponse avant le JSON.parse()
                    
                            if (xhr.status === 200) {
                                try {
                                    let response = JSON.parse(xhr.responseText);
                                    console.log("Objet JSON parsé : ", response);
                    
                                    if (response.exists) {
                                        alert("Cet email est déjà utilisé !");
                                    } else {
                                        const currentSection = document.getElementById("section"+current);
                                        const nextIndex = current + 1;
                                        const nextSection = document.getElementById("section"+nextIndex);
                                        
                                        // Si la section suivante existe
                                        if(nextSection) {
                                            // Gérer les titres de sections (ajouter et supprimer la classe active)
                                            document.getElementById("section-title"+current).classList.remove("active-section");
                                            document.getElementById("section-title"+nextIndex).classList.add("active-section");
                                            
                                            // Gérer l'affichage des sections (ajouter et supprimer la classe inactive)
                                            currentSection.classList.add("inactive");
                                            nextSection.classList.remove("inactive");

                                            window.scrollTo({ top: 0, behavior: "smooth" });
                                        }
                                    }
                                } catch (e) {
                                    console.error("Erreur lors du parsing JSON :", e, xhr.responseText);
                                }
                            } else {
                                console.error("Erreur HTTP :", xhr.status);
                            }
                        }
                    };
                    
            
                    xhr.send("email=" + encodeURIComponent(email));
                } else {
                    alert("Veuillez entrer un email valide.");
                }
            });
        }
        else{
            const currentSection = document.getElementById("section"+current);
            const nextIndex = current + 1;
            const nextSection = document.getElementById("section"+nextIndex);
            
            // Si la section suivante existe
            if(nextSection) {
                // Gérer les titres de sections (ajouter et supprimer la classe active)
                document.getElementById("section-title"+current).classList.remove("active-section");
                document.getElementById("section-title"+nextIndex).classList.add("active-section");
                
                // Gérer l'affichage des sections (ajouter et supprimer la classe inactive)
                currentSection.classList.add("inactive");
                nextSection.classList.remove("inactive");

                window.scrollTo({ top: 0, behavior: "smooth" });
            }
        }
        
    }
    // Sélectionner la section actuelle et la section suivante
    
};

function previousSection(current){
    // Sélectionner la section actuelle et la section suivante
    const currentSection = document.getElementById("section"+current);
    const previousIndex = current - 1;
    const previousSection = document.getElementById("section"+previousIndex);
  
    // Si la section suivante existe
    if(previousSection) {
        // Gérer les titres de sections (ajouter et supprimer la classe active)
        document.getElementById("section-title"+current).classList.remove("active-section");
        document.getElementById("section-title"+previousIndex).classList.add("active-section");
        
        // Gérer l'affichage des sections (ajouter et supprimer la classe inactive)
        currentSection.classList.add("inactive");
        previousSection.classList.remove("inactive");
        window.scrollTo({ top: 0, behavior: "smooth" });
    }else{
        alert("error");
    }
}

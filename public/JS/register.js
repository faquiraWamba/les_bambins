function validateForm(event, section) {
    event.preventDefault();// Empêche l'envoi par défaut du formulaire

    let isValid = true;
    let form = document.getElementById("section" + section); 
    let inputsDiv = form.getElementsByClassName("register-tab-form-item");
    let mainForm = document.getElementById("createChildscarsh");
    
    let errorSpan = document.getElementById("form-error");
    
    // Vérifier les champs requis
    Array.from(inputsDiv).forEach(field => {  // Convertir HTMLCollection en tableau
        if (field.getElementsByClassName("obligate").length > 0) { 
            let inputs = field.querySelectorAll("input");
            let selects = field.querySelectorAll("select");
            inputs.forEach(input => { // Parcourir tous les inputs
                if (input.value.trim() === "") {
                    input.classList.add("input-error"); // Ajouter une classe d'erreur
                    window.scrollTo(errorSpan);
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
    let checkboxes = document.querySelectorAll('input[name="competence[]"]:checked');
    let slots = document.querySelectorAll('input[name="creneau[]"]:checked');
    let radio = document.querySelector('input[name="type_famille"]:checked');
    let errorMessage = document.getElementById("error-message");
    let radioMessage = document.getElementById("radio-message");
    let slotMessage = document.getElementById("slot-message");
    let periscolaire = document.getElementById("slot_periscolaire");
    let quantine = document.getElementById("slot_quantine");
    let mercredi = document.getElementById("slot_mercredi");
    let vacances = document.getElementById("slot_holiday");
    if(section==2){
        let dateNaiss=document.getElementById("date_naissance").value;
        console.log(dateNaiss);
        if(dateNaiss){
            dateNaiss = new Date(dateNaiss); // Convertir l'entrée en objet Date
            let today = new Date(); // Date actuelle
            let diffTime = today - dateNaiss; // Différence en millisecondes
            let age = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 365.25)); 
            let dateMessage=document.getElementById("date-message");
            if(age<3 || age>12){
                isValid=false;
                if(dateMessage.classList.contains("inactive")){
                    dateMessage.classList.remove("inactive"); 
                }
            } else {
                if(!dateMessage.classList.contains("inactive")){
                dateMessage.classList.add("inactive"); 
                }
            }
        }
        if (checkboxes.length === 0) {
            isValid=false;
            if(errorMessage.classList.contains("inactive")){
                errorMessage.classList.remove("inactive"); 
            }
        } else {
            if(!errorMessage.classList.contains("inactive")){
            errorMessage.classList.add("inactive"); 
            }
        }
        if(radio){
            if(!radioMessage.classList.contains("inactive")){
                radioMessage.classList.add("inactive"); 
            }
        }else{
            isValid=false;
            if(radioMessage.classList.contains("inactive")){
                radioMessage.classList.remove("inactive"); 
            }
        }
    }
    if(section==3){
        if (slots.length === 0) {
            isValid=false;
            if(slotMessage.classList.contains("inactive")){
                slotMessage.classList.remove("inactive"); 
            }
        } 
        else {
            if(!slotMessage.classList.contains("inactive")){
                slotMessage.classList.add("inactive"); 
            }
            slots.forEach(slot => { // Parcourir tous les inputs
                if (slot.value==="periscolaire" ){
                    let periscolaire = document.getElementById("slot_periscolaire");
                    if(periscolaire.classList.contains("inactive")){
                        periscolaire.classList.remove("inactive"); 
                    }
                
                }

                if (slot.value==="vacances" ){
                    let holiday = document.getElementById("slot_holiday");
                    if(holiday.classList.contains("inactive")){
                        holiday.classList.remove("inactive"); 
                    }
                }

                if (slot.value==="quantine" ){
                    let quantine = document.getElementById("slot_quantine");
                    if(quantine.classList.contains("inactive")){
                        quantine.classList.remove("inactive"); 
                    }
                }

                if (slot.value=="mercredi" ){
                    let mercredi = document.getElementById("slot_mercredi");
                    if(mercredi.classList.contains("inactive")){
                        mercredi.classList.remove("inactive"); 
                    }
                
                }
                
            });
        }
    }
    if(section==4){
        if(!vacances.classList.contains("inactive")){
            console.log("Les vacances");
            let slotDays = vacances.querySelectorAll('input[name="periode_vacances[]"]:checked');
            console.log("les choix",slotDays.length);
            let slotDaysMessage = document.getElementById("slot-days-message-holiday")
            if (slotDays.length<1){
                isValid=false;
                if(slotDaysMessage.classList.contains("inactive")){
                    slotDaysMessage.classList.remove("inactive");
                } 
            }else{
                if(!slotDaysMessage.classList.contains("inactive")){
                    slotDaysMessage.classList.add("inactive");
                } 
            }
        }
        if(!quantine.classList.contains("inactive")){
            console.log("La quantine");
            let slotDays = quantine.querySelectorAll('input[name="periode_quantine[]"]:checked');
            let slotDaysMessage = document.getElementById("slot-days-message-quantine");
            if (slotDays.length<1){
                isValid=false;
                if(slotDaysMessage.classList.contains("inactive")){
                    slotDaysMessage.classList.remove("inactive");
                } 
            }else{
                if(!slotDaysMessage.classList.contains("inactive")){
                    slotDaysMessage.classList.add("inactive");
                } 
            }
        }
        if(!periscolaire.classList.contains("inactive")){
            console.log("Le periscolaire");
            let slotDays = document.querySelectorAll('input[name^="periode_periscolaire"][name$="\\[\\]"]:checked');
            let slotDaysMessage = document.getElementById("slot-days-message-periscolaire");
            if (slotDays.length<1){
                isValid=false;
                if(slotDaysMessage.classList.contains("inactive")){
                    slotDaysMessage.classList.remove("inactive");
                } 
            }else{
                if(!slotDaysMessage.classList.contains("inactive")){
                    slotDaysMessage.classList.add("inactive");
                } 
            }
        }
        if(!mercredi.classList.contains("inactive")){
            console.log("Les mercredis");
            let slotDays = mercredi.querySelectorAll('input[name="periode_mercredi[]"]:checked');
            let slotDaysMessage = document.getElementById("slot-days-message-mercredi");
            if (slotDays.length<1){
                isValid=false;
                if(slotDaysMessage.classList.contains("inactive")){
                    slotDaysMessage.classList.remove("inactive");
                } 
            }else{
                if(!slotDaysMessage.classList.contains("inactive")){
                    slotDaysMessage.classList.add("inactive");
                } 
            }
        }
        if (isValid) {
            console.log("Formulaire validé, envoi...");
            document.getElementById("createChildscarsh").submit();  // Forcer la soumission
        }

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
            document.getElementById("suivant-btn").addEventListener("click", function () {
                let emailField = document.getElementById("email_parent");
                let email = emailField.value;
                if (email) {
                    let xhr = new XMLHttpRequest();
                    xhr.open("POST", "app/vues/verifier_email.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            console.log("Réponse du serveur : ", xhr.responseText); 
                    
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

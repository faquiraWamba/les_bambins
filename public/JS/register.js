function nextSection(current){
    // Sélectionner la section actuelle et la section suivante
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



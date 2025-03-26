function searchChildren() {
    const query = document.getElementById('searchInput').value;

    if (query.trim() !== '') {
        fetch('/les_bambins/app/core/search_child.php?query=' + query)
            .then(response => response.json())
            .then(data => {
                const resultsContainer = document.getElementById('searchResults');
                resultsContainer.innerHTML = ''; // Vide les résultats précédents

                if (data.length > 0) {
                    data.forEach(child => {
                        const div = document.createElement('div');
                        div.classList.add('search-item');
                        div.textContent = child.nom_enfant;  // Affiche le nom_enfant de l'enfant

                        // Lorsqu'un enfant est sélectionné, met à jour l'input caché et la recherche
                        div.onclick = function() {
                            document.getElementById('selectedChildId').value = child.id_enfant;
                            document.getElementById('searchInput').value = child.nom_enfant; // Optionnel : met à jour l'input de recherche
                            resultsContainer.innerHTML = ''; // Vide les résultats de recherche après sélection
                        };

                        resultsContainer.appendChild(div);
                    });
                } else {
                    resultsContainer.innerHTML = '<div>Aucun enfant trouvé</div>';
                }
            })
            .catch(error => {
                console.error('Erreur lors de la recherche:', error);
            });
    } else {
        // Si la recherche est vide, vide les résultats
        document.getElementById('searchResults').innerHTML = '';
    }
}
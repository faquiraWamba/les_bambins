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
                        div.textContent = child.nom_enfant;

                        // Lorsqu'un enfant est sélectionné, met à jour l'input caché et la recherche
                        div.onclick = function () {
                            document.getElementById('selectedChildId').value = child.id_enfant;
                            document.getElementById('searchInput').value = child.nom_enfant; // Met à jour l'input de recherche
                            resultsContainer.innerHTML = ''; // Vide les résultats après sélection

                            // Charger l'historique de l'enfant
                            fetchChildHistory(child.id_enfant);
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

function validateFormSuivi() {
    const selectedChildId = document.getElementById('selectedChildId').value;

    if (!selectedChildId) {
        alert('Veuillez sélectionner un enfant avant de soumettre le formulaire.');
        return false; 
    }

    return true; 
}

function fetchChildHistory(id_enfant) {
    fetch('index.php?controller=ChildMonitoringPedagogique&action=getChildHistory&id_enfant=' + id_enfant)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById('historyTableBody');
            tableBody.innerHTML = ''; // Vide les lignes précédentes

            if (data.length > 0) {
                data.forEach(profil => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${profil.created_at}</td>
                        <td>${profil.type_profil}</td>
                        <td>${profil.description_profil}</td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                tableBody.innerHTML = '<tr><td colspan="4">Aucun suivi pédagogique trouvé.</td></tr>';
            }
        })
        .catch(error => {
            console.error('Erreur lors du chargement de l\'historique :', error);
        });
}


<h2>Rechercher un Enfant</h2>

<!-- Input de recherche -->
<input type="text" id="searchInput" onkeyup="searchChildren()" placeholder="Rechercher un enfant">

<input type="hidden" id="selectedChildId" name="id_enfant">
<div id="searchResults"></div>

<!-- Bouton pour récupérer les factures -->
<button onclick="fetchBills()">Voir les factures</button>

<h3>Factures de l'Enfant</h3>
<table id="billsTable" border="1" style="display:none;">
    <tr>
        <th>Numéro Facture</th>
        <th>Montant</th>
        <th>Date</th>
        <th>Statut</th>
    </tr>
    <tbody id="billsBody"></tbody>
</table>

<script>
// Fonction AJAX pour chercher les enfants en fonction des lettres tapées
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



// Fonction pour récupérer et afficher les factures de l'enfant sélectionné
function fetchBills() {
    let childId = document.getElementById("selectedChildId").value;
    if (!childId) {
        alert("Veuillez sélectionner un enfant.");
        return;
    }

    fetch("/les_bambins/app/core/get_child_bills.php?id_enfant=" + childId)
        .then(response => response.json())
        .then(data => {
            let billsTable = document.getElementById("billsTable");
            let tbody = document.getElementById("billsBody");

            tbody.innerHTML = "";
            data.forEach(bill => {
                let row = `<tr>
                    <td>${bill.numero_facture}</td>
                    <td>${bill.montant}€</td>
                    <td>${bill.date_facture}</td>
                    <td>${bill.paye ? "Payée" : "Non Payée"}</td>
                    <td>${"icon"}</td>
                </tr>`;
                tbody.innerHTML += row;
            });

            billsTable.style.display = data.length > 0 ? "table" : "none";
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des factures:', error);
        });
}

</script>

<style>
    #searchResults {
        border: 1px solid #ccc;
        max-height: 200px;
        overflow-y: auto;
    }
    .search-item {
        padding: 5px;
        cursor: pointer;
    }
    .search-item:hover {
        background-color: #f0f0f0;
    }
</style>

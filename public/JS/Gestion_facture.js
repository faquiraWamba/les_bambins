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
                </tr>`;
                tbody.innerHTML += row;
            });

            billsTable.style.display = data.length > 0 ? "table" : "none";
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des factures:', error);
        });
}
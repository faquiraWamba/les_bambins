// Fonction pour ouvrir le calendrier
function openCalendar() {
    const calendarDialog = document.getElementById('calendarDialog');
    calendarDialog.showModal(); // Affiche le calendrier
    generateCalendar(new Date().getFullYear(), new Date().getMonth()); // Génère le calendrier pour le mois courant
}

// Fonction pour fermer le calendrier
function closeCalendar() {
    const calendarDialog = document.getElementById('calendarDialog');
    calendarDialog.close(); // Ferme le calendrier
}

// Fonction pour générer le calendrier (affichage du mois et des jours)
function generateCalendar(year, month) {
    const calendarContainer = document.querySelector('.calendar');
    const monthYearDisplay = document.getElementById('month-year');
    calendarContainer.innerHTML = ''; // Réinitialise le contenu du calendrier

    // Mois et année à afficher
    const monthNames = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    monthYearDisplay.textContent = `${monthNames[month]} ${year}`;

    // Calculer le premier jour du mois et le nombre de jours dans le mois
    const firstDay = new Date(year, month, 1).getDay(); // Jour de la semaine du 1er jour du mois
    const daysInMonth = new Date(year, month + 1, 0).getDate(); // Nombre de jours dans le mois

    // Ajouter les jours du mois au calendrier
    let day = 1;
    for (let i = 0; i < 6; i++) { // 6 lignes pour les jours
        const row = document.createElement('div');
        row.classList.add('calendar-row');

        for (let j = 0; j < 7; j++) { // 7 jours dans une semaine
            const cell = document.createElement('div');
            cell.classList.add('calendar-day');

            // Si c'est un jour valide du mois, afficher le jour
            if (i === 0 && j < firstDay) {
                // Premier jour du mois, mais la case est vide jusqu'à ce que le mois commence
                row.appendChild(cell);
            } else if (day <= daysInMonth) {
                cell.textContent = day;
                row.appendChild(cell);

                // Ajouter un gestionnaire d'événement pour sélectionner une date
                cell.addEventListener('click', function() {
                    selectDate(day, month, year);  // Appel la fonction pour sélectionner la date
                });

                day++;
            }
        }
        calendarContainer.appendChild(row);
    }
}

// Fonction pour sélectionner la date
function selectDate(day, month, year) {
    const selectedDateInput = document.getElementById('selectedDate');
    selectedDateInput.value = `${day}/${month + 1}/${year}`; // Formater la date comme "jour/mois/année"

    // Fermer le calendrier après la sélection de la date
    closeCalendar();
}

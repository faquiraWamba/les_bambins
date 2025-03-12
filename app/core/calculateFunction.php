<?php
    function calculateAge($birthdate) {
        $birthdate = new DateTime($birthdate);
        $current_date = new DateTime(); // Date actuelle
        $age = $birthdate->diff($current_date)->y; // Différence en années
        return $age;
    }
?>
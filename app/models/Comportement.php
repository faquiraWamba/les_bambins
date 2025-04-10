<?php

class ChildMonitoringComportementModel {
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    // Méthode pour enregistrer un suivi comportemental
    public function enregistrerSuiviComportement($id_enfant, $date, $type, $description_comportemental) {
        // Préparation de la requête SQL pour insérer un suivi comportemental
        $query = "INSERT INTO comportement (id_enfant, date, type, description_comportemental) 
                  VALUES (:id_enfant, :date, :type, :description_comportemental)";

        // Vérification si $this->db est bien initialisé
        if ($this->db) {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_enfant', $id_enfant);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':description_comportemental', $description_comportemental);

            if ($stmt->execute()) {
                return true;
            }
        } else {
            throw new Exception('La connexion à la base de données a échoué.');
        }

        return false;
    }

    // Méthode pour obtenir les suivis comportementaux d'un enfant
    public function getSuivisComportementaux($id_enfant) {
        $query = "SELECT * FROM comportement WHERE id_enfant = :id_enfant";

        // Vérification si $this->db est bien initialisé
        if ($this->db) {
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_enfant', $id_enfant);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            throw new Exception('La connexion à la base de données a échoué.');
        }
    }
}
?>

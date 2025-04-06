<?php

require_once ROOT_PATH . 'app/core/Generator.php';
class Facture {
    private $db;

    public function __construct() {
        $this->db = connect_to_db();
    }
    public function getFactureById($id) {
        $query = "SELECT f.id_facture, f.date_facture, f.montant, e.nom_enfant
                  FROM factures f
                  JOIN enfants e ON f.id_enfant = e.id_enfant
                  WHERE f.id_facture = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getFactureByMonth($id_enfant) {
        $query = "SELECT * FROM FACTURE 
                  WHERE id_enfant = :id_enfant 
                  AND MONTH(date_facture) = MONTH(CURRENT_DATE()) 
                  AND YEAR(date_facture) = YEAR(CURRENT_DATE())";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id_enfant' => $id_enfant]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    // Vérifie si une facture existe pour l'enfant
    public function getFactureByEnfant($id_enfant) {
        $query = "SELECT * FROM FACTURE WHERE id_enfant = :id_enfant";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id_enfant' => $id_enfant]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Création d'une facture
    public function createFacture($id_enfant, $montant) {
        $query = "INSERT INTO FACTURE (numero_facture, montant, date_facture, id_enfant)
                    VALUES (:numero_facture, :montant, NOW(), :id_enfant)";

        $stmt = $this->db->prepare($query);
        $numero_facture = generateUniqueID('FAC'); // Génère un numéro de facture unique

        try {
            $stmt->execute([
                ':numero_facture' => $numero_facture,
                ':montant' => $montant,
                ':id_enfant' => $id_enfant
            ]);
            return true;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }

    // Mise à jour d'une facture existante
    public function updateFacture($id_enfant, $montant) {
        $query = "UPDATE FACTURE 
        SET montant = montant + :montant, updated_at = NOW() 
        WHERE id_enfant = :id_enfant";
        
        $stmt = $this->db->prepare($query);

        try {
            $stmt->execute([
                ':montant' => $montant,
                ':id_enfant' => $id_enfant
            ]);
            return true;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }

    public function deduireMontant($id_enfant, $montant) {
        try {
            $query = "UPDATE FACTURE SET montant = montant - :montant WHERE id_enfant = :id_enfant";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':montant' => $montant, ':id_enfant' => $id_enfant]);
        } catch (PDOException $e) {
            error_log("Erreur lors de la mise à jour de la facture : " . $e->getMessage());
            throw new Exception("Impossible de mettre à jour la facture.");
        }
    }
 
    public function getUnpaidBills() {
        $query = "SELECT * FROM FACTURE f
                  WHERE NOT EXISTS (
                      SELECT 1 FROM PAIEMENT p WHERE p.numero_facture = f.numero_facture
                  )";
        $stmt = $this->db->prepare($query);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }

  
    public function getBillsByChild($id_enfant) {
        $query = "SELECT * FROM FACTURE WHERE id_enfant = :id_enfant";
        $stmt = $this->db->prepare($query);
        try{
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
}
    

?>
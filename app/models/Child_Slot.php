<?php
require_once '/xampp/htdocs/les_bambins/config/config.php';
require_once ROOT_PATH.'app/models/Bill.php';


Class Child_Slot{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateChildSlot($id_enfant,$id_creneau,$jour,$periode){
        $query = "INSERT INTO ENFANT_CRENEAU (id_enfant,id_creneau,jour,periode) VALUES (:id_enfant,:id_creneau,:jour,:periode)";

        $stmt =$this->db->prepare($query);
        try{
            $stmt->execute([
                ':id_enfant'=>$id_enfant,
                ':id_creneau'=>$id_creneau,
                'jour'=>$jour,
                'periode'=>$periode
            ]);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function GetAllSlotAttente($id_enfant){
        $query = "SELECT *
        FROM  ENFANT_CRENEAU EC INNER JOIN creneau e ON e.id_creneau=EC.id_creneau
        WHERE EC.id_enfant like :id_enfant AND Ec.Etat = 'attente'";
        $stmt = $this->db->prepare($query);

        try{
            $stmt->execute([':id_enfant'=>$id_enfant]);
            $parcours = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $parcours;
        }
        catch(Exception $e){
                var_dump($e->getMessage());
                
        }  
    }

    public function validateSlot($id_enfant) {
        $this->db->beginTransaction(); // Démarre une transaction
    
        try {
            // Récupérer les créneaux uniques à valider avec leur montant
            $query = "SELECT DISTINCT e.id_creneau, e.tarif_creneau
                      FROM ENFANT_CRENEAU EC
                      INNER JOIN CRENEAU e ON e.id_creneau = EC.id_creneau
                      WHERE EC.id_enfant = :id_enfant AND EC.Etat = 'attente'";
    
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id_enfant' => $id_enfant]);
            $creneaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (!$creneaux) {
                $this->db->rollBack();
                return false;
            }
    
            // Calculer le total à ajouter à la facture
            $total_montant = array_sum(array_column($creneaux, 'tarif_creneau'));
    
            // Mettre à jour les créneaux en attente vers 'validé'
            $queryUpdate = "UPDATE ENFANT_CRENEAU SET Etat = 'validé' WHERE id_enfant = :id_enfant AND Etat = 'attente'";
            $stmtUpdate = $this->db->prepare($queryUpdate);
            $stmtUpdate->execute([':id_enfant' => $id_enfant]);
    
            // Vérifier si une facture existe pour ce mois
            $factureModel = new Facture($this->db);
            $factureExistante = $factureModel->getFactureByMonth($id_enfant);
    
            if ($factureExistante) {
                // Si une facture du mois existe, on met à jour le montant
                $factureModel->updateFacture($id_enfant, $total_montant);
            } else {
                // Sinon, on crée une nouvelle facture
                $factureModel->createFacture($id_enfant, $total_montant);
            }
    
            $this->db->commit(); // Valider la transaction
            return true;
        } catch (Exception $e) {
            $this->db->rollBack(); // Annuler la transaction en cas d'erreur
            var_dump($e->getMessage());
            return false;
        }
    }
    


    public function refuseSlot($id_enfant) {
        $query = "UPDATE ENFANT_CRENEAU 
                  SET Etat = 'refusé' 
                  WHERE id_enfant = :id_enfant AND Etat = 'attente'";
    
        $stmt = $this->db->prepare($query);
    
        try {
            $stmt->execute([':id_enfant' => $id_enfant]);
            return $stmt->rowCount() > 0; // Retourne true si au moins un créneau a été mis à jour
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
    

}
?>
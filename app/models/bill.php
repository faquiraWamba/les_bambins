
 <?php
require_once '/xampp/htdocs/les_bambins/config/config.php';

Class Slot{
    private $db;

    function __construct()
    {
        $this->db = connect_to_db();
    }

    public function CreateBill($numero_facture,$montant,$date_facture,$id_enfant){
        $query = "INSERT INTO Facture (numero_facture,montant,date_facture,id_enfant) 
        VALUES (:numero_facture,:montant,:date_facture,:id_enfant)";

        $stmt=$this->db->prepare($query);

        try{
            $stmt->execute([
                ':numero_facture'=>$numero_facture,
                ':montant'=>$montant,
                ':date_facture'=>$date_facture,
                ':id_enfant'=>$id_enfant
            ]);
        }
        catch(Exception $e){
            $e->getMessage();
        }
        
    }
}
?>
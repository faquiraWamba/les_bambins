<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/Child_Llot.php';
require_once ROOT_PATH.'app/models/Slot.php';

class SlotController extends Controller{
  
    public function validateChildSlots() {
        if ($_GET['id']) {
            $id_enfant = $_GET['id'];

            if (empty($id_enfant)) {
                $error = "ID enfant manquant";
                return $this->view('slots', ['error' => $error]);
            }

            $slot = new Child_Slot();
            $regCentre = new RegCentreController();
            $child = new ChildController();
            $updated = $slot->validateSlot($id_enfant);

            if ($updated) {
                $success = "Tous les créneaux en attente ont été validés";
                $regCentre->ValidReg($success);
            } else {
                $error = "Aucun créneau en attente trouvé ou mise à jour échouée";
                $child->showInfoInscription($error);
            }
        }

        $regCentre->ValidReg();

    }

    public function refuseChildSlots() {
        if ($_GET['id']) {
            $id_enfant = $_GET['id'];

            if (empty($id_enfant)) {
                $error = "ID enfant manquant";
                return $this->view('slots', ['error' => $error]);
            }

            $slot = new Child_Slot();
            $regCentre = new RegCentreController();
            $child = new ChildController();
            $updated = $slot->refuseSlot($id_enfant);

            if ($updated) {
                $success = "Tous les créneaux en attente ont été refusés";
                $regCentre->ValidReg($success);
            } else {
                $error = "Aucun créneau en attente trouvé ou mise à jour échouée";
                $child->showInfoInscription($error);
            }
        }

        $regCentre->ValidReg();

    }
}
?>
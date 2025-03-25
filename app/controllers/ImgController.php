<?php
class ImgController {

    // Fonction pour gérer l'upload de l'image
    public function uploadImage($imageFile) {
        $target_dir = "public/images/images_activites/";
        $imageFileType = strtolower(pathinfo($imageFile["name"], PATHINFO_EXTENSION));

        // Vérifier si le fichier est bien une image
        $check = getimagesize($imageFile["tmp_name"]);
        if ($check === false) {
            return ['error' => "Le fichier n'est pas une image."];
        }

        // Vérifier la taille de l'image (max 2MB)
        if ($imageFile["size"] > 2 * 1024 * 1024) {
            return ['error' => "Fichier trop volumineux (max 2MB)."];
        }

        // Vérifier les formats acceptés
        $formats_acceptes = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $formats_acceptes)) {
            return ['error' => "Formats acceptés : JPG, JPEG, PNG, GIF."];
        }

        // Générer un nom unique pour l'image
        $newImageName = uniqid("img_", true) . "." . $imageFileType;
        $target_file = $target_dir . $newImageName;

        // Déplacer l'image dans le dossier
        if (move_uploaded_file($imageFile["tmp_name"], $target_file)) {
            return ['success' => $target_file];
        } else {
            return ['error' => "Erreur lors du téléchargement de l'image."];
        }
    }
}
?>
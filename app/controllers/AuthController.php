<?php
require_once ROOT_PATH.'app/core/Controller.php';
require_once ROOT_PATH.'app/models/User.php';
require_once ROOT_PATH.'app/models/Parent.php';
require_once ROOT_PATH.'app/models/Personnel.php';

class AuthController extends Controller {
    
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = trim($_POST['password']);
            $userModel = new User();
            $parentModel = new Tutor();
            $personnelModel = new Personnel();
            
            $user = $userModel->login($email, $password);
            if ($user) {
                $parent = $parentModel->getParentByUserId($user['user_id']);
                $personnel = $personnelModel->getPersonnelByUserId($user['user_id']);

                if ($parent) {
                    $_SESSION['role'] = 'parent';
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['parent_id'] = $parent['id_parent']; // Stocker l'ID du parent dans la session
                } else if ($personnel) {
                    $_SESSION['role'] = $personnel['role_personnel'];
                    $_SESSION['user_id'] = $user['user_id'];
                }
                header('Location: index.php?controller=Home');
                exit();
            } else {
                // Si l'utilisateur n'existe pas
                $error = "email ou mot de passe incorrect";
                $this->view('login', ['error' => $error]);
            }
        }
        $this->view('login');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new User();
            
            $user = $userModel->register($email, $password);
            
            if ($user) {
                $error = "Votre compte a été créé";
                $this->view('login', ['success' => $error]);
            } else {
                // Si l'utilisateur n'est pas créé
                $error = "échec lors de la création";
                $this->view('regis', ['error' => $error]);
            }
        }
        $this->view('regis');
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?controller=Home');
        exit();
    }

    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            // ID de l'utilisateur à modifier
            $password = $_POST['password']; // Nouveau mot de passe
    
            // Vérifier si l'ID et le mot de passe sont fournis
            if (empty($id) || empty($password)) {
                $error = "ID ou mot de passe manquant";
                return $this->view('login', ['error' => $error]);
            }
    
            // Instancier le modèle
            $userModel = new User();
    
            // Mettre à jour le mot de passe
            $user = $userModel->updatePassword($id, $password);
    
            if ($user) {
                $success = "Mot de passe mis à jour avec succès";
                return $this->view('profile', ['success' => $success]);
            } else {
                $error = "Échec de la mise à jour du mot de passe";
                return $this->view('login', ['error' => $error]);
            }
        }
    
        // Si la requête n'est pas POST, afficher la page de mise à jour
        $this->view('update');
    }
}
?>
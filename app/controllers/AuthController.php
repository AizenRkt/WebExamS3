<?php

namespace app\controllers;

use app\models\Client;
use Flight;
use PDO;

class AuthController {

    public function __construct() {
    }

    public function adminLog() {
        Flight::render('backOffice/loginBack');
    }

    public function log() {
        Flight::render('template/loginFront');
    }

    public function sign() {
        Flight::render('template/signinFront');
    }

    public function authAdmin() {
        $user = $_POST['user'];
        $pwd = $_POST['pwd'];
    
        if (empty($user) || empty($pwd)) {
            $mssg = "Nom d'utilisateur ou mot de passe manquant.";
            Flight::redirect('/log?mssg=' . urlencode($mssg));
            return;
        }
    
        if ($pwd == "admin") {
            Flight::redirect('/habitationList');
        } else {
            $mssg = "Nom d'utilisateur ou mot de passe incorrect.";
            Flight::redirect('adminLog/?mssg=' . urlencode($mssg));
        }
    }

    public function authVerif() {
        $email = trim($_POST['email'] ?? '');
        $pwd = trim($_POST['pwd'] ?? '');
    
        if (empty($email) || empty($pwd)) {
            $mssg = "Veuillez entrer votre email et votre mot de passe.";
            Flight::redirect('/?mssg=' . urlencode($mssg));
            return;
        }
    
        $user = Client::getByMail($email);
    
        if (!$user) {
            $mssg = "Aucun utilisateur trouvé avec cet email.";
            Flight::redirect('/?mssg=' . urlencode($mssg));
            return;
        }
    
        if ($user['mdp'] == $pwd) {
            $_SESSION['user_id'] = $user['idClient'];
            Flight::redirect('/acceuil');
        } else {
            $mssg = "Nom d'utilisateur ou mot de passe incorrect.";
            Flight::redirect('/?mssg=' . urlencode($mssg));
        }
    }
    
    public function authInscription() {
        $nom = $_POST['nom'] ?? '';
        $email = $_POST['mail'] ?? '';
        $telephone = $_POST['tel'] ?? '';
        $mdp = $_POST['pwd'] ?? '';
    
        if (empty($nom) || empty($email) || empty($telephone) || empty($mdp)) {
            $mssg = "Tous les champs doivent être remplis.";
            Flight::redirect('/sign?mssg=' . urlencode($mssg));
            return;
        }
        
        $db = Flight::db();
    
        $checkEmailQuery = "SELECT COUNT(*) as count FROM clientAirbnb WHERE email = :email";
        $stmt = $db->prepare($checkEmailQuery);
        $stmt->execute([':email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result['count'] > 0) {
            $mssg = "Cet email est déjà utilisé !";
            Flight::redirect('/sign?mssg=' . urlencode($mssg));
            return;
        }

        $userId = Client::insert($nom, $email, $telephone, $mdp);
    
        if ($userId) {
            $userId = $db->lastInsertId();
            $_SESSION['user_id'] = $userId;
            Flight::redirect('/acceuil');
        } else {
            $mssg = "Un problème est survenu lors de l'inscription.";
            Flight::redirect('/sign?mssg=' . urlencode($mssg));
        }
    }
    
}

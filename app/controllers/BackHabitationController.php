<?php

namespace app\controllers;

use app\models\Habitation;
use app\helpers\Helpers;

use Flight;
use PDO;

class BackHabitationController {

    public function __construct() {
    }

    public function habitationList() {
        $habitations = Habitation::getAll();
        
        foreach ($habitations as &$hb) {
            $hb['nomType'] = Habitation::getTypeById($hb['idTypeHabitation']);
        }
    
        Flight::render('backOffice/habitationList', ['habitations' => $habitations]);
    }
    
    public function habitationAjout() {
        $types = Habitation::getAllType();
        Flight::render('backOffice/habitationAjout', ['types' => $types]);
    }

    function uploadPhotos($files) {
        $uploadedPaths = [];
        $base = Flight::base();
        $uploadDir = __DIR__ . "/../../public/assets/img/upload/";
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'avif'];
    
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        } else {
            echo __DIR__;
        }
    
        foreach ($files['tmp_name'] as $key => $tmpName) {
            $fileName = basename($files['name'][$key]);
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            //$filePath = $uploadDir . uniqid() . '.' . $fileExtension;
            $timestamp = time();
            $filePath = $uploadDir . $timestamp . "_". $fileName;
    
            if (in_array(strtolower($fileExtension), $allowedExtensions)) {
                if (move_uploaded_file($tmpName, $filePath)) {
                    $uploadedPaths[] = $timestamp . "_". $fileName;
                } else {
                    return ['error' => "Erreur lors de l'upload du fichier: " . $fileName];
                }
            } else {
                return ['error' => "Extension de fichier non autorisée: " . $fileExtension];
            }
        }
    
        return $uploadedPaths;
    }
    
    function insertPhotos($uploadedPaths, $idHabitation) {
        $db = Flight::db();
    
        foreach ($uploadedPaths as $photoPath) {
            $sql = "INSERT INTO imgHabitationAirbnb (idHabitation, titre) VALUES (:idHabitation, :titre)";
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':idHabitation' => $idHabitation,
                ':titre' => $photoPath,
            ]);
        }
    
        return true;
    }

    public function tHabitationAjout() {
        $nom = $_POST['nom'];
        $type = $_POST['idType'];
        $loyer = $_POST['loyer'];
        $quartier = $_POST['quartier'];
        $description = $_POST['description'];
    
        $idHabitation = Habitation::insert($type, $loyer, $quartier, $description, $nom); 
    
        if (isset($_FILES['photos']) && !empty($_FILES['photos']['name'][0])) {
            $uploadedPaths = BackHabitationController::uploadPhotos($_FILES['photos']);
            
            if (isset($uploadedPaths['error'])) {
                Flight::redirect('/habitationAjout?error=' . $uploadedPaths['error']);
            }
            
            BackHabitationController::insertPhotos($uploadedPaths, $idHabitation);
        }
    
        Flight::redirect('/habitationList');
    }
    
    public function habitationDel() {
        $id = $_GET['id'];
        Habitation::delete($id);
        Flight::redirect('/habitationList');
    }

    public function habitationModif() {
        $habitation = Habitation::getById($_GET['id']);
        $habitation['nomType'] = Habitation::getTypeById($habitation['idTypeHabitation']);
        $types = Habitation::getAllType();
        $photos = Habitation::getPhoto($_GET['id']);
        Flight::render('backOffice/habitationModif', ['habitation' => $habitation ,'types' => $types, 'photos' => $photos]);
    }

    public function tHabitationModif() {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $type = $_POST['idType'];
        $loyer = $_POST['loyer'];
        $quartier = $_POST['quartier'];
        $description = $_POST['description'];

        Habitation::update($id ,$type, $loyer, $quartier, $description, $nom);
        
        if (isset($_FILES['photos']) && !empty($_FILES['photos']['name'][0])) {
            $uploadedPaths = BackHabitationController::uploadPhotos($_FILES['photos']);
            if (isset($uploadedPaths['error'])) {
                Flight::redirect('/habitationModif?id='. $id . '&error=' . $uploadedPaths['error']);
            }
            
            BackHabitationController::insertPhotos($uploadedPaths, $id);
        }
        
        Flight::redirect('/habitationList'); 
    }
    
    public function photoDel() {
        $id = $_GET['id'];
        $idH = $_GET['idHabitation'];
        Habitation::deletePhotoById($id);
        Flight::redirect('/habitationModif?id='.$idH); 
    }

    public function habitationPhotoModif() {
        $idHabitation = $_GET['idHabitation'];
        $id = $_GET['id'];

        $photo = Habitation::getPhotoById($id);
        Flight::render('backOffice/habitationPhotoModif', ['idHabitation' => $idHabitation, 'photo' => $photo]);
    }

    public function tModifPhoto() {

    }
}

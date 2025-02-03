<?php

namespace app\models;

use Flight;
use PDO;

class Animal {

    public function __construct() {
    }

    // Insérer un nouvel animal
    public static function insert($idEspece, $poids_actuel) {
        $db = Flight::db();
        $sql = "INSERT INTO Animal (idEspece, poids_actuel) 
                VALUES (:idEspece, :poids_actuel)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':idEspece' => $idEspece,
            ':poids_actuel' => $poids_actuel,
        ]);
        return $db->lastInsertId();
    }    

    // Récupérer tous les animaux
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM Animal";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un animal par son ID
    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM Animal WHERE idAnimal = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un animal
    public static function update($idAnimal, $idEspece, $poids_actuel) {
        $db = Flight::db();
        $sql = "UPDATE Animal 
                SET idEspece = :idEspece, poids_actuel = :poids_actuel
                WHERE idAnimal = :idAnimal";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':idEspece' => $idEspece,
            ':poids_actuel' => $poids_actuel,
            ':idAnimal' => $idAnimal,
        ]);
    }    

    // Filtrer par Espece
    public static function getAllByEspeceId($idEspece) {
        $db = Flight::db();
        $sql = "SELECT * FROM Animal WHERE idEspece = :idEspece";
        $stmt = $db->prepare($sql);
        $stmt->execute([':idEspece' => $idEspece]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Supprimer un animal
    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM Animal WHERE idAnimal = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // Avoir les photos d'un animal
    public static function getPhotos($idAnimal) {
        $db = Flight::db();
        $sql = "SELECT ia.titre AS img, ia.idImage 
                FROM Animal a 
                JOIN ImageAnimal ia ON a.idAnimal = ia.idAnimal 
                WHERE a.idAnimal = :idAnimal";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([':idAnimal' => $idAnimal]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

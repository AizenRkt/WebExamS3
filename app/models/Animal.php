<?php

namespace app\models;

use Flight;
use PDO;

class Animal {

    public function __construct() {
    }

    // Insérer un nouvel animal
    public static function insert($idTypeAnimal, $nom, $poids) {
        $db = Flight::db();
        $sql = "INSERT INTO animal (idEspece, poids_actuel) VALUES (:idEspece, :poids_actuel)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':idTypeAnimal' => $idTypeAnimal,
            ':nom' => $nom,
            ':poids' => $poids,
        ]);
        return $db->lastInsertId();
    }

    // Récupérer tous les animaux
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM animal";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un animal par son ID
    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM animal WHERE idAnimal = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un animal
    public static function update($idAnimal, $idTypeAnimal, $nom, $poids) {
        $db = Flight::db();
        $sql = "UPDATE animal 
                SET idTypeAnimal = :idTypeAnimal, nom = :nom, poids = :poids
                WHERE idAnimal = :idAnimal";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':idTypeAnimal' => $idTypeAnimal,
            ':nom' => $nom,
            ':poids' => $poids,
            ':idAnimal' => $idAnimal,
        ]);
    }

    // Supprimer un animal
    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM animal WHERE idAnimal = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public static function getPhotos($idAnimal) {
        $db = Flight::db();
        $sql = "SELECT ia.titre AS img, ia.idImage 
                FROM animal a 
                JOIN ImageAnimal ia ON a.idAnimal = ia.idAnimal 
                WHERE a.idAnimal = :idAnimal";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([':idAnimal' => $idAnimal]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllByTypeAnimalId($idEspece) {
        $db = Flight::db();
        $sql = "SELECT * FROM animal WHERE idTypeAnimal = :idEspece";
        $stmt = $db->prepare($sql);
        $stmt->execute([':idEspece' => $idEspece]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

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
        $sql = "INSERT INTO animal (idTypeAnimal, nom, poids) VALUES (:idTypeAnimal, :nom, :poids)";
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

    public static function getPrixActuelAnimal($idAnimal) {
        $db = Flight::db();
        $sql = "SELECT a.poids, t.prix_vente_kg 
                FROM animal a 
                JOIN typeAnimal t ON a.idTypeAnimal = t.idTypeAnimal
                WHERE a.idAnimal = :idAnimal";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([':idAnimal' => $idAnimal]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return $result['poids'] * $result['prix_vente_kg'];
        }
        return 0; // Retourne 0 si l'animal n'existe pas
    }
    
    public static function getAnimalsNonVendu() {
        $db = Flight::db();
        $sql = "SELECT a.*
                FROM animal a
                LEFT JOIN transactions t ON a.idAnimal = t.idAnimal AND t.idTypeTransaction = 2
                WHERE t.idAnimal IS NULL";
        
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}

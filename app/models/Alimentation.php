<?php

namespace app\models;

use Flight;
use PDO;

class Alimentation {

    public function __construct() {}

    // Insérer une nouvelle alimentation (nourrissage d'un animal)
    public static function insert($idAnimal, $idAliment) {
        $date_nourrissage = Simulation::getDateSimulee();
        $db = Flight::db();
        $sql = "INSERT INTO alimentation (idAnimal, idAliment, date_nourrissage) 
                VALUES (:idAnimal, :idAliment, :date_nourrissage)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':idAnimal' => $idAnimal,
            ':idAliment' => $idAliment,
            ':date_nourrissage' => $date_nourrissage
        ]);
        return $db->lastInsertId();
    }

    // Récupérer toutes les alimentations
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT a.*, ani.nom AS nom_animal, al.nom AS nom_aliment 
                FROM alimentation a
                JOIN animal ani ON a.idAnimal = ani.idAnimal
                JOIN aliment al ON a.idAliment = al.idAliment";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les alimentations d'un animal spécifique
    public static function getByAnimal($idAnimal) {
        $db = Flight::db();
        $sql = "SELECT a.*, al.nom AS nom_aliment
                FROM alimentation a
                JOIN aliment al ON a.idAliment = al.idAliment
                WHERE a.idAnimal = :idAnimal";
        $stmt = $db->prepare($sql);
        $stmt->execute([':idAnimal' => $idAnimal]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mettre à jour une alimentation (si besoin de modifier la date ou l'aliment)
    public static function update($idAlimentation, $idAnimal, $idAliment, $date_nourrissage) {
        $db = Flight::db();
        $sql = "UPDATE alimentation SET idAnimal = :idAnimal, idAliment = :idAliment, 
                date_nourrissage = :date_nourrissage WHERE idAlimentation = :idAlimentation";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':idAnimal' => $idAnimal,
            ':idAliment' => $idAliment,
            ':date_nourrissage' => $date_nourrissage,
            ':idAlimentation' => $idAlimentation
        ]);
    }

    // Supprimer une alimentation
    public static function delete($idAlimentation) {
        $db = Flight::db();
        $sql = "DELETE FROM alimentation WHERE idAlimentation = :idAlimentation";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':idAlimentation' => $idAlimentation]);
    }
}

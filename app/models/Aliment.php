<?php

namespace app\models;

use Flight;
use PDO;

class Aliment {

    public function __construct() {}

    // Insérer un nouvel aliment
    public static function insert($nom, $gain_poids, $prix) {
        $db = Flight::db();
        $sql = "INSERT INTO aliment (nom, gain_poids, prix) VALUES (:nom, :gain_poids, :prix)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':gain_poids' => $gain_poids,
            ':prix' => $prix
        ]);
        return $db->lastInsertId();
    }

    // Récupérer tous les aliments
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM aliment";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un aliment par ID
    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM aliment WHERE idAliment = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un aliment
    public static function update($id, $nom, $gain_poids, $prix) {
        $db = Flight::db();
        $sql = "UPDATE aliment SET nom = :nom, gain_poids = :gain_poids, prix = :prix WHERE idAliment = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':nom' => $nom,
            ':gain_poids' => $gain_poids,
            ':prix' => $prix,
            ':id' => $id
        ]);
    }

    // Supprimer un aliment
    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM aliment WHERE idAliment = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}

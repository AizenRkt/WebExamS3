<?php

namespace app\models;

use Flight;
use PDO;

class Espece {

    public function __construct() {
    }

    public static function insert($nomEspece, $prix_vente) {
        $db = Flight::db();
        $sql = "INSERT INTO Espece (nomEspece, prix_vente) VALUES (:nomEspece, :prix_vente)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nomEspece' => $nomEspece,
            ':prix_vente' => $prix_vente,
        ]);
        return $db->lastInsertId();
    }    

    public static function getAllEspece() {
        $db = Flight::db();
        $sql = "SELECT * FROM Espece";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM Espece WHERE idEspece = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($idEspece, $nomEspece, $prix_vente) {
        $db = Flight::db();
        $sql = "UPDATE Espece SET nomEspece = :nomEspece, prix_vente = :prix_vente WHERE idEspece = :idEspece";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':nomEspece' => $nomEspece,
            ':prix_vente' => $prix_vente,
            ':idEspece' => $idEspece,
        ]);
    }    

    // Delete a client
    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM Espece WHERE idEspece = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
<?php

namespace app\models;

use Flight;
use PDO;

class Espece {

    public function __construct() {
    }

    public static function insert($nomEspece, $poids_min_vente, $prix_vente_kg, $poids_max, $nb_jour_sans_manger, $perte_poids_jour) {
        $db = Flight::db();
        $sql = "INSERT INTO Espece (nomEspece, poids_min_vente, prix_vente_kg, poids_max, nb_jour_sans_manger, perte_poids_jour) 
                VALUES (:nomEspece, :poids_min_vente, :prix_vente_kg, :poids_max, :nb_jour_sans_manger, :perte_poids_jour)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nomEspece' => $nomEspece,
            ':poids_min_vente' => $poids_min_vente,
            ':prix_vente_kg' => $prix_vente_kg,
            ':poids_max' => $poids_max,
            ':nb_jour_sans_manger' => $nb_jour_sans_manger,
            ':perte_poids_jour' => $perte_poids_jour
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

    public static function update($idEspece, $nomEspece, $poids_min_vente, $prix_vente_kg, $poids_max, $nb_jour_sans_manger, $perte_poids_jour) {
        $db = Flight::db();
        $sql = "UPDATE Espece SET nomEspece = :nomEspece, poids_min_vente = :poids_min_vente, prix_vente_kg = :prix_vente_kg, 
                poids_max = :poids_max, nb_jour_sans_manger = :nb_jour_sans_manger, perte_poids_jour = :perte_poids_jour 
                WHERE idEspece = :idEspece";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':nomEspece' => $nomEspece,
            ':poids_min_vente' => $poids_min_vente,
            ':prix_vente_kg' => $prix_vente_kg,
            ':poids_max' => $poids_max,
            ':nb_jour_sans_manger' => $nb_jour_sans_manger,
            ':perte_poids_jour' => $perte_poids_jour,
            ':idEspece' => $idEspece
        ]);
    }    

    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM Espece WHERE idEspece = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}

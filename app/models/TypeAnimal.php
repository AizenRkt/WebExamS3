<?php

namespace app\models;

use Flight;
use PDO;

class TypeAnimal {

    public function __construct() {
    }

    // Insérer un nouveau type d'animal
    public static function insert($espece, $poids_minimal_vente, $prix_vente_kg, $poids_max, $jours_sans_manger, $perte_poids_jour,$quota_journalier) {
        $db = Flight::db();
        $sql = "INSERT INTO typeAnimal (espece, poids_minimal_vente, prix_vente_kg, poids_max, jours_sans_manger, perte_poids_jour,quota_journalier) 
                VALUES (:espece, :poids_minimal_vente, :prix_vente_kg, :poids_max, :jours_sans_manger, :perte_poids_jour,:quota_journalier)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':espece' => $espece,
            ':poids_minimal_vente' => $poids_minimal_vente,
            ':prix_vente_kg' => $prix_vente_kg,
            ':poids_max' => $poids_max,
            ':jours_sans_manger' => $jours_sans_manger,
            ':perte_poids_jour' => $perte_poids_jour,
            ':quota_journalier' => $quota_journalier,
        ]);
        return $db->lastInsertId();
    }

    // Récupérer tous les types d'animaux
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM typeAnimal";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un type d'animal par son ID
    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM typeAnimal WHERE idTypeAnimal = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un type d'animal
    public static function update($idTypeAnimal, $espece, $poids_minimal_vente, $prix_vente_kg, $poids_max, $jours_sans_manger, $perte_poids_jour,$quota_journalier) {
        $db = Flight::db();
        $sql = "UPDATE typeAnimal 
                SET espece = :espece, poids_minimal_vente = :poids_minimal_vente, prix_vente_kg = :prix_vente_kg, 
                    poids_max = :poids_max, jours_sans_manger = :jours_sans_manger, perte_poids_jour = :perte_poids_jour, quota_journalier = :quota_journalier
                WHERE idTypeAnimal = :idTypeAnimal";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':espece' => $espece,
            ':poids_minimal_vente' => $poids_minimal_vente,
            ':prix_vente_kg' => $prix_vente_kg,
            ':poids_max' => $poids_max,
            ':jours_sans_manger' => $jours_sans_manger,
            ':perte_poids_jour' => $perte_poids_jour,
            ':quota_journalier' => $quota_journalier,
            ':idTypeAnimal' => $idTypeAnimal,
        ]);
    }

    // Supprimer un type d'animal
    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM typeAnimal WHERE idTypeAnimal = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}

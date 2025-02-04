<?php

namespace app\models;

use Flight;
use PDO;

class Capital {

    public function __construct() {
    }

    // 🔹 Insérer un nouveau montant dans la table capital
    public static function insert($montant) {
        $db = Flight::db();
        $sql = "INSERT INTO capital (montant) VALUES (:montant)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':montant' => $montant
        ]);
        return $db->lastInsertId(); // Retourner l'ID de l'insertion
    }

    // 🔹 Récupérer tous les enregistrements de capital
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM capital";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Supprimer un enregistrement de la table capital
    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM capital WHERE idCapital = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // 🔹 Récupérer le total du capital stocké dans la table
    public static function getTotalCapital() {
        $db = Flight::db();
        $sql = "SELECT SUM(montant) AS total FROM capital";
        $stmt = $db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    }

    // 🔹 Ajouter un montant au capital d'un utilisateur spécifique
    public static function ajouterCapital($montant) {
        $db = Flight::db();
        $sql = "UPDATE capital SET montant = montant + :montant";
        
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':montant' => $montant
        ]);
    }

    public static function retirerCapital($montant) {
        $db = Flight::db();
        $sql = "UPDATE capital SET montant = montant - :montant";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':montant' => $montant
        ]);
    }

    public static function insertQuery($query) {
        $db = Flight::db();
        $db->exec($query);
    }
    
    public static function resetDatabaseExceptOneTable($excludeTable) {
        $db = Flight::db();
        
        $sql = "SHOW TABLES";
        $tables = $db->query($sql)->fetchAll(PDO::FETCH_COLUMN);
        
        $db->exec("SET foreign_key_checks = 0");
        
        foreach ($tables as $table) {
            if ($table != $excludeTable) {
                $db->exec("DELETE FROM $table");
                
                $db->exec("ALTER TABLE $table AUTO_INCREMENT = 1");
            }
        }
        
        $db->exec("SET foreign_key_checks = 1");
    
        $sql = "INSERT INTO simulationDate (date_simulee) VALUES ('2025-02-03')";
        Capital::insertQuery($sql);
        
        $sql = "INSERT INTO typeTransaction (titre) VALUES ('Achat')";
        Capital::insertQuery($sql);
        
        $sql = "INSERT INTO typeTransaction (titre) VALUES ('Vente')";
        Capital::insertQuery($sql);
        
        return "Base de données réinitialisée sauf la table '$excludeTable'.";
    }
    

}

<?php

namespace app\models;

use Flight;
use PDO;

class Transaction {

    public function __construct() {
    }

    // 🔹 Insérer une nouvelle transaction (achat ou vente)
    public static function insert($idTypeTransaction, $idAnimal, $montant) {
        $db = Flight::db();
        $sql = "INSERT INTO transactions (idTypeTransaction, idAnimal, montant, date_transaction) 
                VALUES (:idTypeTransaction, :idAnimal, :montant, CURDATE())";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':idTypeTransaction' => $idTypeTransaction,
            ':idAnimal' => $idAnimal,
            ':montant' => $montant
        ]);
        return $db->lastInsertId(); // Retourne l'ID de la transaction insérée
    }

    // 🔹 Récupérer toutes les transactions
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT t.*, tt.titre, a.nom AS animal_nom 
                FROM transactions t
                JOIN typeTransaction tt ON t.idTypeTransaction = tt.idTypeTransaction
                JOIN animal a ON t.idAnimal = a.idAnimal
                ORDER BY t.date_transaction DESC";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Récupérer une transaction par son ID
    public static function getById($idTransaction) {
        $db = Flight::db();
        $sql = "SELECT * FROM transactions WHERE idTransaction = :idTransaction";
        $stmt = $db->prepare($sql);
        $stmt->execute([':idTransaction' => $idTransaction]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 Supprimer une transaction
    public static function delete($idTransaction) {
        $db = Flight::db();
        $sql = "DELETE FROM transactions WHERE idTransaction = :idTransaction";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':idTransaction' => $idTransaction]);
    }
}

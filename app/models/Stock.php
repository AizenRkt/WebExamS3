<?php

namespace app\models;

use Flight;
use PDO;

class Stock {

    public function __construct() {}

    public static function insert($idAliment, $quantite) {
        $db = Flight::db();
        $dateAjout = date('Y-m-d'); // Date du jour

        $sqlCheck = "SELECT idStock, quantite_stock FROM stock WHERE idAliment = :idAliment";
        $stmtCheck = $db->prepare($sqlCheck);
        $stmtCheck->execute([':idAliment' => $idAliment]);
        $stock = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($stock) {
            $sqlUpdate = "UPDATE stock SET quantite_stock = quantite_stock + :quantite, date_ajout = :dateAjout WHERE idStock = :idStock";
            $stmtUpdate = $db->prepare($sqlUpdate);
            return $stmtUpdate->execute([
                ':quantite' => $quantite,
                ':dateAjout' => $dateAjout,
                ':idStock' => $stock['idStock']
            ]);
        } else {
            $sqlInsert = "INSERT INTO stock (idAliment, quantite_stock, date_ajout) VALUES (:idAliment, :quantite, :dateAjout)";
            $stmtInsert = $db->prepare($sqlInsert);
            return $stmtInsert->execute([
                ':idAliment' => $idAliment,
                ':quantite' => $quantite,
                ':dateAjout' => $dateAjout
            ]);
        }
    }

    // Récupérer le stock actuel
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT s.idStock, a.nom, s.quantite_stock, s.date_ajout 
                FROM stock s 
                JOIN aliment a ON s.idAliment = a.idAliment";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}

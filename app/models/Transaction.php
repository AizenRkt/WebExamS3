<?php

namespace app\models;

use Flight;
use PDO;

class Reservation {

    public function __construct() {
    }

    public static function insert($idUser, $idHabitation, $dateDebut, $dateFin) {
        $db = Flight::db();
        $sql = "INSERT INTO reservationAirbnb (idClient, idHabitation, dateDebut, dateFin) 
                VALUES (:idUser, :idHabitation, :dateDebut, :dateFin)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':idUser' => $idUser,
            ':idHabitation' => $idHabitation,
            ':dateDebut' => $dateDebut,
            ':dateFin' => $dateFin,
        ]);
        return $db->lastInsertId();
    }

    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM reservationAirbnb";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM reservationAirbnb WHERE idReservation = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $dateDebut, $dateFin) {
        $db = Flight::db();
        $sql = "UPDATE reservationAirbnb SET dateDebut = :dateDebut, dateFin = :dateFin WHERE idReservation = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':dateDebut' => $dateDebut,
            ':dateFin' => $dateFin,
        ]);
    }

    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM reservationAirbnb WHERE idReservation = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public static function estLouer($idHabitation, $dateDebut, $dateFin) {
        $db = Flight::db();
        $sql = "SELECT COUNT(*) FROM reservationAirbnb 
                WHERE idHabitation = :idHabitation 
                AND ((dateDebut BETWEEN :dateDebut AND :dateFin) 
                     OR (dateFin BETWEEN :dateDebut AND :dateFin) 
                     OR (:dateDebut BETWEEN dateDebut AND dateFin) 
                     OR (:dateFin BETWEEN dateDebut AND dateFin))";
    
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':idHabitation' => $idHabitation,
            ':dateDebut' => $dateDebut,
            ':dateFin' => $dateFin
        ]);
    
        $count = $stmt->fetchColumn();
    
        return $count > 0;
    }
    
}

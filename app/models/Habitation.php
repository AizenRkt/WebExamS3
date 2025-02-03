<?php

namespace app\models;

use Flight;
use PDO;

class Habitation {

    public function __construct() {

    }

    public static function insert($idTypeHabitation, $loyer, $quartier, $description, $nom) {
        $db = Flight::db();
        $sql = "INSERT INTO habitationAirbnb (idTypeHabitation, loyer, quartier, description, nom) 
                VALUES (:idTypeHabitation, :loyer, :quartier, :description, :nom)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':idTypeHabitation' => $idTypeHabitation,
            ':loyer' => $loyer,
            ':quartier' => $quartier,
            ':description' => $description,
            ':nom' => $nom,
        ]);
        return $db->lastInsertId();
    }

    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM habitationAirbnb";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM habitationAirbnb WHERE idHabitation = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $idTypeHabitation, $loyer, $quartier, $description, $nom) {
        $db = Flight::db();
        $sql = "UPDATE habitationAirbnb SET idTypeHabitation = :idTypeHabitation, loyer = :loyer, 
                quartier = :quartier, description = :description, nom = :nom WHERE idHabitation = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':idTypeHabitation' => $idTypeHabitation,
            ':loyer' => $loyer,
            ':quartier' => $quartier,
            ':description' => $description,
            ':nom' => $nom,
        ]);
    }

    public static function delete($id) {
        $db = Flight::db();

        $sqlReservations = "DELETE FROM reservationAirbnb WHERE idHabitation = :id";
        $stmtReservations = $db->prepare($sqlReservations);
        $stmtReservations->execute([':id' => $id]);    

        $sqlPhotos = "DELETE FROM imgHabitationAirbnb WHERE idHabitation = :id";
        $stmtPhotos = $db->prepare($sqlPhotos);
        $stmtPhotos->execute([':id' => $id]);

        $sql = "DELETE FROM habitationAirbnb WHERE idHabitation = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public static function getTypeById($idType) {
        $db = Flight::db();
        $sql = "SELECT nom FROM typeAirbnb WHERE idType = :idType";
        $stmt = $db->prepare($sql);
        $stmt->execute([':idType' => $idType]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['nom'] ?? null;
    }

    public static function getAllType() {
        $db = Flight::db();
        $sql = "SELECT * FROM typeAirbnb";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getMaxId() {
        $db = Flight::db();
        $sql = "SELECT MAX(idHabitation) AS max_id FROM habitationAirbnb";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['max_id'] ?? null;
    }
    
    public static function getAllByTypeId($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM habitationAirbnb WHERE idTypeHabitation = $id";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function recherche($idTypeHabitation, $minLoyer, $maxLoyer, $quartier, $description) {
        $db = Flight::db();
        $sql = "SELECT * FROM habitationAirbnb WHERE 1=1";
        $params = [];
    
        if ($idTypeHabitation !== null) {
            $sql .= " AND idTypeHabitation = :idTypeHabitation";
            $params[':idTypeHabitation'] = $idTypeHabitation;
        }
    
        if ($minLoyer !== null) {
            $sql .= " AND loyer >= :minLoyer";
            $params[':minLoyer'] = $minLoyer;
        }
    
        if ($maxLoyer !== null) {
            $sql .= " AND loyer <= :maxLoyer";
            $params[':maxLoyer'] = $maxLoyer;
        }
    
        if ($quartier !== null) {
            $sql .= " AND quartier LIKE :quartier";
            $params[':quartier'] = '%' . $quartier . '%';
        }
    
        if ($description !== null) {
            $sql .= " AND description LIKE :descri";
            $params[':descri'] = '%' . $description . '%';
        }

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPhoto($id) {
        $db = Flight::db();
        $sql = "SELECT iha.titre as img, iha.idImg FROM habitationAirbnb ha JOIN imgHabitationAirbnb iha ON ha.idHabitation = iha.idHabitation WHERE ha.idHabitation = $id";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deletePhotoById($id) {
        $db = Flight::db();
        $sql = "DELETE FROM imgHabitationAirbnb WHERE idImg = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
    
    public static function getPhotoById($idPhoto) {
        $db = Flight::db();
        $sql = "SELECT * FROM imgHabitationAirbnb WHERE idImg = $idPhoto";
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
}

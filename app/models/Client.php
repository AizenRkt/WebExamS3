<?php

namespace app\models;

use Flight;
use PDO;

class Client {

    public function __construct() {
    }

    public static function insert($nom, $email, $telephone, $mdp) {
        $db = Flight::db();
        $sql = "INSERT INTO clientAirbnb (nom, email, telephone, mdp) VALUES (:nom, :email, :telephone, :mdp)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':email' => $email,
            ':telephone' => $telephone,
            ':mdp' => password_hash($mdp, PASSWORD_DEFAULT),
        ]);
        return $db->lastInsertId();
    }

    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM clientAirbnb";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM clientAirbnb WHERE idClient = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByMail($mail) {
        $db = Flight::db();
        $sql = "SELECT * FROM clientAirbnb WHERE email = :mail";
        $stmt = $db->prepare($sql);
        $stmt->execute([':mail' => $mail]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $nom, $email, $telephone, $mdp = null) {
        $db = Flight::db();
        $sql = "UPDATE clientAirbnb SET nom = :nom, email = :email, telephone = :telephone";
        
        if ($mdp) {
            $sql .= ", mdp = :mdp";
        }

        $sql .= " WHERE idClient = :id";

        $stmt = $db->prepare($sql);

        $params = [
            ':nom' => $nom,
            ':email' => $email,
            ':telephone' => $telephone,
            ':id' => $id,
        ];

        if ($mdp) {
            $params[':mdp'] = password_hash($mdp, PASSWORD_DEFAULT);
        }

        return $stmt->execute($params);
    }

    // Delete a client
    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM clientAirbnb WHERE idClient = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
<?php

namespace app\models;

use app\models\DateTime;

use Flight;
use PDO;

class Animal {

    public function __construct() {
    }

    // Insérer un nouvel animal
    public static function insert($idTypeAnimal, $nom, $poids) {
        $db = Flight::db();
        $sql = "INSERT INTO animal (idTypeAnimal, nom, poids) VALUES (:idTypeAnimal, :nom, :poids)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':idTypeAnimal' => $idTypeAnimal,
            ':nom' => $nom,
            ':poids' => $poids,
        ]);
        return $db->lastInsertId();
    }    

    // Récupérer tous les animaux
    public static function getAll() {
        $db = Flight::db();
        $sql = "SELECT * FROM animal";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un animal par son ID
    public static function getById($id) {
        $db = Flight::db();
        $sql = "SELECT * FROM animal WHERE idAnimal = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un animal
    public static function update($idAnimal, $idTypeAnimal, $nom, $poids) {
        $db = Flight::db();
        $sql = "UPDATE animal 
                SET idTypeAnimal = :idTypeAnimal, nom = :nom, poids = :poids
                WHERE idAnimal = :idAnimal";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            ':idTypeAnimal' => $idTypeAnimal,
            ':nom' => $nom,
            ':poids' => $poids,
            ':idAnimal' => $idAnimal,
        ]);
    }

    // Supprimer un animal
    public static function delete($id) {
        $db = Flight::db();
        $sql = "DELETE FROM animal WHERE idAnimal = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public static function getPhotos($idAnimal) {
        $db = Flight::db();
        $sql = "SELECT ia.titre AS img, ia.idImage 
                FROM animal a 
                JOIN ImageAnimal ia ON a.idAnimal = ia.idAnimal 
                WHERE a.idAnimal = :idAnimal";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([':idAnimal' => $idAnimal]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllByTypeAnimalId($idEspece) {
        $db = Flight::db();
        $sql = "SELECT * FROM animal WHERE idTypeAnimal = :idEspece";
        $stmt = $db->prepare($sql);
        $stmt->execute([':idEspece' => $idEspece]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPrixActuelAnimal($idAnimal) {
        $db = Flight::db();
        $sql = "SELECT a.poids, t.prix_vente_kg 
                FROM animal a 
                JOIN typeAnimal t ON a.idTypeAnimal = t.idTypeAnimal
                WHERE a.idAnimal = :idAnimal";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([':idAnimal' => $idAnimal]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return $result['poids'] * $result['prix_vente_kg'];
        }
        return 0;
    }
    
    public static function getAnimalsNonVendu() {
        $db = Flight::db();
        $sql = "SELECT a.*
                FROM animal a
                LEFT JOIN transactions t ON a.idAnimal = t.idAnimal AND t.idTypeTransaction = 2
                WHERE t.idAnimal IS NULL";
        
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getAnimalType($id) {
        $db = Flight::db();
        $sql = "SELECT ta.espece as espece
                FROM animal a
                JOIN typeAnimal ta ON a.idTypeAnimal = ta.idTypeAnimal
                WHERE a.idAnimal = $id";
        
        return $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    public static function getMesAnimaux() {
        $db = Flight::db();
        $sql = "SELECT a.*, ta.espece, ta.poids_minimal_vente, ta.prix_vente_kg, ta.poids_max, 
                       ta.quota_journalier, ta.jours_sans_manger, ta.perte_poids_jour
                FROM animal a
                JOIN typeAnimal ta ON a.idTypeAnimal = ta.idTypeAnimal
                LEFT JOIN transactions t ON a.idAnimal = t.idAnimal AND t.idTypeTransaction = 2
                WHERE t.idAnimal IS NULL";
    
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAlimentForAnimal($idTypeAnimal) {
        $db = Flight::db();
    
        $sql = "SELECT idAliment, nom, gain_poids, prix FROM aliment WHERE idTypeAnimal = :idTypeAnimal LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->execute([':idTypeAnimal' => $idTypeAnimal]);
        $aliment = $stmt->fetch();
    
        if ($aliment) {
            return $aliment;
        } else {
            return null; 
        }
    }
    
    // public static function prevision($dateCible) {
    //     $db = Flight::db();
    
    //     // Récupérer la date simulée actuelle
    //     $sql = "SELECT date_simulee FROM simulationDate ORDER BY idSimulation DESC LIMIT 1";
    //     $dateActuelle = $db->query($sql)->fetchColumn();
    
    //     if (!$dateActuelle || $dateCible <= $dateActuelle) {
    //         return "La date cible doit être supérieure à la date simulée actuelle.";
    //     }
    
    //     $animaux = Animal::getMesAnimaux();
        
    //     $dateCourante = strtotime($dateActuelle);
    //     $dateLimite = strtotime($dateCible);

    //     while ($dateCourante < $dateLimite) {
    //         foreach ($animaux as &$animal) {
    //             $joursSansManger = 0;
    
    //             // Vérifier le stock disponible
    //             $sql = "SELECT SUM(quantite_stock) FROM stock WHERE idAliment IN (SELECT idAliment FROM aliment WHERE idTypeAnimal = :idTypeAnimal)";
    //             $stmt = $db->prepare($sql);
    //             $stmt->execute([':idTypeAnimal' => $animal['idTypeAnimal']]);
    //             $stockTotal = $stmt->fetchColumn();
    
    //             if ($stockTotal >= $animal['quota_journalier']) {
    //                 $aliment = Animal::getAlimentForAnimal($animal['idTypeAnimal']);
    
    //                 if ($aliment) {
    //                     // Nourrir l'animal et ajuster son poids en fonction du gain de poids
    //                     $gainPoids = $aliment['gain_poids'];
    //                     $animal['poids'] += ($animal['quota_journalier'] * $gainPoids / 100);
    
    //                     // Réduire le stock de l'aliment
    //                     $sql = "UPDATE stock SET quantite_stock = quantite_stock - :quantite WHERE idAliment = :idAliment LIMIT 1";
    //                     $stmt = $db->prepare($sql);
    //                     $stmt->execute([':quantite' => $animal['quota_journalier'], ':idAliment' => $aliment['idAliment']]);
    //                 }
    //             } else {
    //                 // L'animal ne mange pas
    //                 $joursSansManger++;
    //                 $pertePoids = $animal['poids'] * ($animal['perte_poids_jour'] / 100);
    //                 $animal['poids'] -= $pertePoids;
                
    //                 // Vérifier s'il meurt
    //                 if ($joursSansManger >= $animal['jours_sans_manger']) {
    //                     // Enregistrer l'animal mort
    //                     $sql = "INSERT INTO mort (idAnimal, nom, poids_final, date_mort) VALUES (:idAnimal, :nom, :poids, :date)";
    //                     $stmt = $db->prepare($sql);
    //                     $stmt->execute([
    //                         ':idAnimal' => $animal['idAnimal'],
    //                         ':nom' => $animal['nom'],
    //                         ':poids' => $animal['poids'],
    //                         ':date' => $dateCourante->format('Y-m-d')
    //                     ]);
    //                     continue;
    //                 }
    //             }
    
    //             // Mise à jour du poids de l'animal
    //             $sql = "UPDATE animal SET poids = :poids WHERE idAnimal = :idAnimal";
    //             $stmt = $db->prepare($sql);
    //             $stmt->execute([':poids' => $animal['poids'], ':idAnimal' => $animal['idAnimal']]);
    //         }
    
    //         // Incrémenter la date
    //         $dateCourante->modify('+1 day');
    //     }
    
    //     return "Prévisions calculées jusqu'au $dateCible.";
    // }
    
    public static function prevision($dateCible) {
        $db = Flight::db();
        
        // Récupérer la date simulée actuelle
        $sql = "SELECT date_simulee FROM simulationDate ORDER BY idSimulation DESC LIMIT 1";
        $dateActuelle = $db->query($sql)->fetchColumn();
        
        if (!$dateActuelle || strtotime($dateCible) <= strtotime($dateActuelle)) {
            return "La date cible doit être supérieure à la date simulée actuelle.";
        }
        
        $animaux = Animal::getMesAnimaux();
        
        $dateActuelleTimestamp = strtotime($dateActuelle);
        $dateCibleTimestamp = strtotime($dateCible);
        
        $diffDays = ($dateCibleTimestamp - $dateActuelleTimestamp) / (60 * 60 * 24);
        
        foreach ($animaux as &$animal) {
            $animal['joursSansManger'] = 0;
        }
        
        for ($i = 0; $i < $diffDays; $i++) {
            foreach ($animaux as &$animal) {    
                $sql = "SELECT SUM(quantite_stock) FROM stock WHERE idAliment IN (SELECT idAliment FROM aliment WHERE idTypeAnimal = :idTypeAnimal)";
                $stmt = $db->prepare($sql);
                $stmt->execute([':idTypeAnimal' => $animal['idTypeAnimal']]);
                $stockTotal = $stmt->fetchColumn();
        
                if ($stockTotal >= $animal['quota_journalier']) {
                    $aliment = Animal::getAlimentForAnimal($animal['idTypeAnimal']);
        
                    if ($aliment) {
                        $gainPoids = $aliment['gain_poids'];
                        $animal['poids'] += ($animal['quota_journalier'] * $gainPoids / 100);        

                        $sql = "UPDATE stock SET quantite_stock = quantite_stock - :quantite WHERE idAliment = :idAliment LIMIT 1";
                        $stmt = $db->prepare($sql);
                        $stmt->execute([':quantite' => $animal['quota_journalier'], ':idAliment' => $aliment['idAliment']]);
                    }
    
                } else {
                    $animal['joursSansManger']++;
                    $pertePoids = $animal['poids'] * ($animal['perte_poids_jour'] / 100);
                    $animal['poids'] -= $pertePoids;

                    if ($animal['joursSansManger'] >= $animal['jours_sans_manger']) {
                        echo "il est mort";
                        $animal['status'] = "mort"; 
                        continue;
                    }
                }
    
                $sql = "UPDATE animal SET poids = :poids WHERE idAnimal = :idAnimal";
                $stmt = $db->prepare($sql);
                $stmt->execute([':poids' => $animal['poids'], ':idAnimal' => $animal['idAnimal']]);
            }
        }
    
        return "Prévisions calculées jusqu'au $dateCible.";
    }
    
    
}

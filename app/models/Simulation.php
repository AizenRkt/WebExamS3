<?php

namespace app\models;

use Flight;
use PDO;

class Simulation {

    public static function avancerJour() {
        $db = Flight::db();

        // Récupérer la date actuelle
        $sql = "SELECT date_simulee FROM simulationDate ORDER BY idSimulation DESC LIMIT 1";
        $stmt = $db->query($sql);
        $date_actuelle = $stmt->fetchColumn();

        // Avancer d'un jour
        $nouvelle_date = date('Y-m-d', strtotime($date_actuelle . ' +1 day'));

        // Mettre à jour la date simulée
        $sql_update = "UPDATE simulationDate SET date_simulee = :nouvelle_date WHERE idSimulation = 1";
        $stmt_update = $db->prepare($sql_update);
        $stmt_update->execute([':nouvelle_date' => $nouvelle_date]);

        return $nouvelle_date;
    }

    public static function getDateSimulee() {
        $db = Flight::db();
        $sql = "SELECT date_simulee FROM simulationDate ORDER BY idSimulation DESC LIMIT 1";
        return $db->query($sql)->fetchColumn();
    }
}

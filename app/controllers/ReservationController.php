<?php

namespace app\controllers;


use app\models\Reservation;

use Flight;

class ReservationController {

    public function __construct() {
    }

    public function treservation() {
        $debut = $_GET['debut'] ?? null;
        $fin = $_GET['fin'] ?? null;
        $id = $_GET['id'] ?? null;
    
        if (!$debut || !$fin || !$id) {
            $mssg = "Les dates de début et de fin, ainsi que l'ID de l'habitation, sont nécessaires.";
            Flight::redirect('/habitationDetail?id=' . $id . '&mssg=' . urlencode($mssg));
            return;
        }
    
        if (!strtotime($debut) || !strtotime($fin)) {
            $mssg = "Les dates de début et de fin doivent être au format valide (YYYY-MM-DD).";
            Flight::redirect('/habitationDetail?id=' . $id . '&mssg=' . urlencode($mssg));
            return;
        }
    
        if ($debut > $fin) {
            $mssg = "La date de début ne peut pas être après la date de fin.";
            Flight::redirect('/habitationDetail?id=' . $id . '&mssg=' . urlencode($mssg));
            return;
        }
    
        if (Reservation::estLouer($id, $debut, $fin)) {
            $mssg = "Cette habitation a déjà été réservée pour cette période.";
            Flight::redirect('/habitationDetail?id=' . $id . '&mssg=' . urlencode($mssg));
            return;
        }
    
        $insertSuccess = Reservation::insert($_SESSION['user_id'], $id, $debut, $fin);
    
        if ($insertSuccess) {
            Flight::redirect('/habitationDetail?id=' . $id . '&success=Reservation+effectuée+avec+succès');
        } else {
            $mssg = "Une erreur est survenue lors de la réservation. Veuillez réessayer.";
            Flight::redirect('/habitationDetail?id=' . $id . '&mssg=' . urlencode($mssg));
        }
    }
    
    
}

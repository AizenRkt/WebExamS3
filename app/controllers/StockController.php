<?php

namespace app\controllers;

use app\models\Animal;
use app\models\Aliment;
use app\models\Capital;
use app\models\Stock;

use Flight;
use PDO;

class StockController {

    public function __construct() {
    }

    public function insertStock() {
        
        $aliments = Aliment::getAll();
        Flight::render('AchatAliment',['aliments' => $aliments]);
    }

    public function stockerAliments() {
        if (!isset($_POST['nom']) || !isset($_POST['quantite'])) {
            Flight::redirect('/stock?error=missing_data'); // Redirection avec un message d'erreur
            return;
        }
    
        $idAliment = $_POST['nom']; // Correspond à idAliment
        $quantite = $_POST['quantite'];
        $aliment = Aliment::getById($idAliment);
        $prix_unitaire = $aliment['prix'];
        $montant = $prix_unitaire * $quantite;

        if (empty($idAliment) || empty($quantite) || $quantite <= 0) {
            Flight::redirect('/achatAliment?error=invalid_data'); // Redirection en cas de données invalides
            return;
        }

        if($montant > Capital::getTotalCapital()){
            Flight::redirect('/achatAliment?error=capital insuffisant'); 
            return;
        }
    
        $result = Stock::insert($idAliment, $quantite);
        Capital::retirerCapital($montant);

        Flight::redirect('/achatAliment?success=added'); // Redirection avec un message de succès
    }
    

}

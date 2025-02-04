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
        if (!isset($_GET['idAliment']) || !isset($_GET['quantite'])) {
            Flight::redirect('/stock?error=missing_data');
            return;
        }
    
        $idAliment = $_GET['idAliment'];
        $quantite = $_GET['quantite'];
        $aliment = Aliment::getById($idAliment);
        
        $prix_unitaire = $aliment['prix'];
        $montant = $prix_unitaire * $quantite;

        if (empty($idAliment) || empty($quantite) || $quantite <= 0) {
            Flight::redirect('/achatAliment?error=invalid_data');
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

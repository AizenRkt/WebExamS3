<?php

namespace app\controllers;

use app\models\TypeAnimal;

use Flight;
use PDO;

class TypeAnimalController {

    public function __construct() {
    }

    public function TypeAnimalInsert() {
        Flight::render('TypeAnimalInsert');
    }

    public function TypeAnimalList() {
        $types = TypeAnimal::getAll();
        Flight::render('TypeAnimalList', ['types' => $types]);        
    }

    public static function TypeAnimalUpdate() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($_POST['data'] as $id => $values) {
                if (strpos($id, 'new_') === 0) {
                    $newId = TypeAnimal::insert(
                        $values['espece'],
                        $values['poids_minimal_vente'],
                        $values['prix_vente_kg'],
                        $values['poids_max'],
                        $values['jours_sans_manger'],
                        $values['perte_poids_jour'],
                        $values['quota_journalier']
                    );
                } else {
                    TypeAnimal::update(
                        $id,
                        $values['espece'],
                        $values['poids_minimal_vente'],
                        $values['prix_vente_kg'],
                        $values['poids_max'],
                        $values['jours_sans_manger'],
                        $values['perte_poids_jour'],
                        $values['quota_journalier']
                    );
                }
            }
        }
        Flight::redirect('/TypeAnimalList');
    }
}

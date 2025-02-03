<?php

namespace app\controllers;

use app\models\TypeAnimal;
use Flight;

class TypeAnimalController {

    // Afficher la liste des types d'animaux
    public static function index() {
        $types = TypeAnimal::getAll();
        Flight::render('typeAnimal', ['types' => $types]);
    }

    // Mettre à jour les données (appelé via POST)
    public static function update() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($_POST['data'] as $id => $values) {
                if (strpos($id, 'new_') === 0) {
                    // Si l'ID est temporaire (new_xxxx), on insère un nouveau typeAnimal
                    $newId = TypeAnimal::insert(
                        $values['espece'],
                        $values['poids_minimal_vente'],
                        $values['prix_vente_kg'],
                        $values['poids_max'],
                        $values['jours_sans_manger'],
                        $values['perte_poids_jour']
                    );
                } else {
                    // Sinon, on met à jour l'existant
                    TypeAnimal::update(
                        $id,
                        $values['espece'],
                        $values['poids_minimal_vente'],
                        $values['prix_vente_kg'],
                        $values['poids_max'],
                        $values['jours_sans_manger'],
                        $values['perte_poids_jour']
                    );
                }
            }
        }
        Flight::redirect('/type-animal');
    }
    
    
}


<?php

namespace app\controllers;

use app\models\Animal;
use app\models\TypeAnimal;

use Flight;

class Controller {

    public function __construct() {
    }

    public function acceuil() {
        $types = TypeAnimal::getAllTypeAnimal();    
        $animals = Animal::getAll();    
    
        if (isset($_GET['idType'])) {
            $idType = $_GET['idType'];
            $animals = Animal::getAllByTypeAnimalId($idType);
        }
    
        // if (isset($_GET['descri'])) {
        //     $descri = $_GET['descri'];
        //     $animals = Animal::recherche(null, null, null, null, $descri);
        // }

        foreach ($animals as &$hb) {
            $photos = Animal::getPhotos($hb['idAnimal']);            
            if (!empty($photos)) {
                $hb['imgPrincipale'] = $photos[0];
            } else {
                $hb['imgPrincipale'] = ['img' => 'default.jpg'];
            }
        }
        
        Flight::render('acceuil', ['animals' => $animals, 'types' => $types]);
    }
    

    public function logout() {
        session_destroy();
        Flight::redirect('/');
    }
    
}

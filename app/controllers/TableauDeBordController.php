<?php

namespace app\controllers;

use app\models\Animal;
use app\models\Simulation;
use app\models\Capital;

use Flight;
use PDO;

class TableauDeBordController {

    public function __construct() {
    }

    public function tableauBord() {
        $capital = Capital::getTotalCapital();
        $dateSimule = Simulation::getDateSimulee();
        $animals = Animal::getAnimalsNonVendu();
        foreach ($animals as &$x) {
            $x['espece'] = Animal::getAnimalType($x['idAnimal'])['espece'];
            $x['status'] = "à vous";
            $x['photoProfil'] = Animal::getPhotos($x['idAnimal'])[0]['img'];
        }

        $nbAnimal = count($animals);
        Flight::render('TableauDeBord',['dateNow' => $dateSimule,'capital' => $capital,'nb_animals' => $nbAnimal, 'animaux' => $animals]);
    }

    public function prevision() {
        $dateCible = $_GET['date'];
        $prevision = Animal::prevision($dateCible);
    }

}

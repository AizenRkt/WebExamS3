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
        $animals = Animal::getAll();
        $nbAnimal = count($animals);

        Flight::render('TableauDeBord',['dateNow' => $dateSimule,'capital' => $capital,'nb_animals' => $nbAnimal]);
    }

}

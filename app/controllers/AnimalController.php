<?php

namespace app\controllers;

use app\models\Animal;
use app\models\TypeAnimal;
use Flight;
use PDO;

class AnimalController {

    public function __construct() {
    }

    public function AnimalAchat() {
        $types = TypeAnimal::getAll();
        Flight::render('AnimalAchat', ['types' => $types]);
    }

    public function AnimalVente() {
        $mesAnimaux = Animal::getAll();
        Flight::render('AnimalVente', ['animaux' => $mesAnimaux]);
    }
}

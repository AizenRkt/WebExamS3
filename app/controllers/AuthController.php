<?php

namespace app\controllers;

use app\models\Capital;
use app\models\Client;
use Flight;
use PDO;

class AuthController {

    public function __construct() {
    }

    public function log() {
        Flight::render('template/loginFront');
    }
    
    public function connexion() {
        $capital = $_POST['capital'];
        Capital::insert($capital);

        Flight::redirect('/tableauDeBord');
    }
}

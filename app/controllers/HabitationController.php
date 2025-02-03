<?php

namespace app\controllers;

use app\models\Habitation;

use Flight;

class HabitationController {

    public function __construct() {
    }

    public function habitationDetail() {
        $habitation = Habitation::getById($_GET['id']);        
        $habitation['nomType'] = Habitation::getTypeById($habitation['idTypeHabitation']);        

        $photos = Habitation::getPhoto($_GET['id']);        
        if (empty($photos)) {
            $photos = array_fill(0, 5, ['img' => 'default.jpg']);
        }
    
        Flight::render('habitationDetail', ['habitation' => $habitation, 'photos' => $photos]);
    }
    
    
}

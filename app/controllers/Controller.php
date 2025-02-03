<?php

namespace app\controllers;

use app\models\Habitation;

use Flight;

class Controller {

    public function __construct() {
    }

    public function acceuil() {
        $types = Habitation::getAllType();    
        $habitations = Habitation::getAll();    
    
        if (isset($_GET['idType'])) {
            $idType = $_GET['idType'];
            $habitations = Habitation::getAllByTypeId($idType);
        }
    
        if (isset($_GET['descri'])) {
            $descri = $_GET['descri'];
            $habitations = Habitation::recherche(null, null, null, null, $descri);
        }

        foreach ($habitations as &$hb) {
            $photos = Habitation::getPhoto($hb['idHabitation']);            
            if (!empty($photos)) {
                $hb['imgPrincipale'] = $photos[0];
            } else {
                $hb['imgPrincipale'] = ['img' => 'default.jpg'];
            }
        }
        
        Flight::render('acceuil', ['habitations' => $habitations, 'types' => $types]);
    }
    

    public function logout() {
        session_destroy();
        Flight::redirect('/');
    }
    
}

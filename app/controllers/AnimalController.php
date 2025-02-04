<?php

namespace app\controllers;

use app\models\Animal;
use app\models\Aliment;
use app\models\TypeAnimal;
use app\models\Transaction;
use app\models\Capital;
use app\models\Simulation;

use Flight;
use PDO;

class AnimalController {

    public function __construct() {
    }

    public function AnimalAchat() {
        $types = TypeAnimal::getAll();
        Flight::render('AnimalAchat', ['types' => $types]);
    }

    public function AddAnimal() {
        if (!empty($_POST['idTypeAnimal']) && !empty($_POST['nom']) && !empty($_POST['poids'])) {
            $idTypeAnimal = $_POST['idTypeAnimal'];
            $nom = $_POST['nom'];
            $poids = $_POST['poids'];

            $id = Animal::insert($idTypeAnimal, $nom, $poids);
            if($id != null){
                $espece = TypeAnimal::getById($idTypeAnimal);
                $prixKg = $espece['prix_vente_kg'];
                $montant = $poids * $prixKg;

                $trans = Transaction::insert(1,$id,$montant);
                Capital::retirerCapital($montant);

                Flight::redirect('/animalAchat?success=New animal added');
            }else{
                Flight::redirect('/animalAchat?error=inexpected error');
            }

        } else {
            Flight::redirect('/animalAchat?error=missing_fields');
        }
    }
    
    public function AnimalVente() {
        $mesAnimaux = Animal::getAnimalsNonVendu();
        Flight::render('AnimalVente', ['animaux' => $mesAnimaux]);
    }

    public function VendreAnimal() {
        $idAnimal = $_GET['idAnimal'];
        $montant = Animal::getPrixActuelAnimal($idAnimal);

        if ($montant > 0) {
            $idTransaction = Transaction::insert(2, $idAnimal, $montant);
            Capital::ajouterCapital($montant);

            Flight::redirect('/animalVente?success=Animal vendu !');
        } else {
            Flight::redirect('/animalVente?error=error !');
        }
        
    }

    public function AnimalNourrissage() {
        $mesAnimaux = Animal::getAnimalsNonVendu();
        $mesAliments = Aliment::getAll();
        $dateSimule = Simulation::getDateSimulee();
        foreach ($mesAnimaux as &$x) {
            $x['espece'] = Animal::getAnimalType($x['idAnimal'])['espece'];
        }
        Flight::render('AnimalNourrissage', ['animaux' => $mesAnimaux,'dateNow' => $dateSimule,'aliments' => $mesAliments]);
    }
    

    public function tAnimalNourrissage() {
        if (!empty($_POST['idAnimal']) && !empty($_POST['idAliment'])) {
            $idAnimal = $_POST['idAnimal'];
            $idAliment = $_POST['idAliment'];
            
            try {
                $idInsertion = Alimentation::insert($idAnimal, $idAliment);
    
                if ($idInsertion) {
                    Flight::redirect('/animalNourrissage?success=Votre animal a été nourri');
                } else {
                    Flight::redirect('/animalNourrissage?error=Erreur lors de l enregistrement');
                }
            } catch (Exception $e) {
                Flight::redirect('/animalNourrissage?error=Exception: ' . urlencode($e->getMessage()));
            }
            
        } else {
            Flight::redirect('/animalNourrissage?error=Champs obligatoires manquants');
        }
    }    
    
}

<?php

//importation de controller
use app\controllers\AuthController;
use app\controllers\Controller;
use app\controllers\TypeAnimalController;
use app\controllers\AnimalController;
use app\controllers\TableauDeBordController;
use app\controllers\StockController;
//importation de model

//importation lié flight
use flight\Engine;
use flight\net\Router;

//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$Auth = new AuthController();
$router->get('/adminLog', [ $Auth, 'adminLog' ]);
$router->post('/t-adminLog', [ $Auth, 'authAdmin' ]);

$router->get('/', [ $Auth, 'log' ]);
$router->post('/t-connexion', [ $Auth, 'authVerif' ]);
$router->get('/sign', [ $Auth, 'sign' ]);
$router->post('/t-inscription', [ $Auth, 'authInscription' ]);

$controller = new Controller();
$router->get('/acceuil', [ $controller, 'acceuil' ]);
$router->get('/logout', [ $controller, 'logout' ]);
$router->get('/marketplace', [ $controller, 'marketplace' ]);
$router->get('/avancer-jour', [ $controller, 'avancerJour' ]);

$typeAnimalController = new TypeAnimalController();
$router->get('/typeAnimalInsert', [ $typeAnimalController, 'typeAnimalInsert' ]);
$router->get('/typeAnimalList', [ $typeAnimalController, 'typeAnimalList' ]);
$router->post('/typeAnimalUpdate', [ $typeAnimalController, 'typeAnimalUpdate' ]);

$AnimalController = new AnimalController();
$router->get('/animalAchat', [ $AnimalController, 'AnimalAchat' ]);
$router->get('/animalVente', [ $AnimalController, 'AnimalVente' ]);
$router->post('/t-AnimalAchat', [ $AnimalController, 'AddAnimal' ]);
$router->get('/t-AnimalVente', [ $AnimalController, 'VendreAnimal' ]);
$router->get('/animalNourrissage', [ $AnimalController, 'AnimalNourrissage' ]);
$router->post('/t-AnimalNourrissage', [ $AnimalController, 'tAnimalNourrissage' ]);

$tableauController = new TableauDeBordController();
$router->get('/tableauDeBord', [ $tableauController, 'tableauBord' ]);

$StockController = new StockController();
$router->get('/achatAliment', [ $StockController, 'insertStock' ]);
$router->post('/stock-aliment', [ $StockController, 'stockerAliments' ]);


// $router->get('/', \app\controllers\WelcomeController::class.'->home'); 

// $router->get('/hello-world/@name', function($name) {
// 	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
// });

// $router->group('/api', function() use ($router, $app) {
// 	$Api_Example_Controller = new ApiExampleController($app);
// 	$router->get('/users', [ $Api_Example_Controller, 'getUsers' ]);
// 	$router->get('/users/@id:[0-9]', [ $Api_Example_Controller, 'getUser' ]);
// 	$router->post('/users/@id:[0-9]', [ $Api_Example_Controller, 'updateUser' ]);
// });
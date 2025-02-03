<?php

use flight\Engine;
use flight\database\PdoWrapper;
use flight\debug\database\PdoQueryCapture;
use Tracy\Debugger;
use app\models\ProductModel;

use app\models\User;

/** 
 * @var array $config This comes from the returned array at the bottom of the config.php file
 * @var Engine $app
 */

// uncomment the following line for MySQL
// $dsn = 'mysql:host=' . 'localhost' . ';dbname=' . 'coolname' . ';charset=utf8mb4';
$dsn = 'mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'] . ';charset=utf8mb4';

// uncomment the following line for SQLite
// $dsn = 'sqlite:' . $config['database']['file_path'];

// Uncomment the below lines if you want to add a Flight::db() service
// In development, you'll want the class that captures the queries for you. In production, not so much.
 $pdoClass = Debugger::$showBar === true ? PdoQueryCapture::class : PdoWrapper::class;
 //$app->register('db', $pdoClass, [ $dsn, $config['database']['user'] ?? null, '' ?? null ]);
 $app->register('db', $pdoClass, [ $dsn, $config['database']['user'] ?? null, $config['database']['password'] ?? null ]);

// Got google oauth stuff? You could register that here
// $app->register('google_oauth', Google_Client::class, [ $config['google_oauth'] ]);

// Redis? This is where you'd set that up
// $app->register('redis', Redis::class, [ $config['redis']['host'], $config['redis']['port'] ]);

// Flight::map('productModel', function () {
//     return new ProductModel(Flight::db());
// });

//url de base pour tout les chemins
Flight::map('base', function() {
    $base = Flight::get('flight.base_url');
    return $base;
});

//mappage des templates
Flight::map('menuAdmin', function () {
    Flight::render('backOffice/menuBack');
});

Flight::map('menuUser', function () {
    Flight::render('template/menuFront');
});

Flight::map('menuAuth', function () {
    Flight::render('template/menuAuth');
});

Flight::map('footerAdmin', function () {
    Flight::render('backOffice/footerBack');
});

Flight::map('footerUser', function () {
    Flight::render('template/footerFront');
});


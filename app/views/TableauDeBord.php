<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="shortcut icon" href="<?= Flight::base() ?>/public/assets/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/assets/compiled/css/custom-patrick.css">
    <style>
        .dashboard-box {
            width: 30%;
            height: 200px;
            display: inline-block;
            margin: 10px;
            background-color: #f4f4f4;
            border: 2px solid #ddd;
            border-radius: 10px;
            text-align: center;
            vertical-align: top;
            padding: 20px;
        }
        .dashboard-box h4 {
            font-size: 24px;
            margin-bottom: 15px;
        }
        .date-filter-form {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div id="app">
        <?= Flight::menuAdmin() ?>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            <div class="d-flex justify-content-between align-items-center p-3">
                <h1>Tableau de Bord</h1>
            </div>

            <!-- <div class="d-flex justify-content-between align-items-center p-3" style="float:right;">
                <form action="<?= Flight::base() ?>/avancer-jour" method="get">
                    <button type="submit" class="btn btn-warning">Avancer d’un jour</button>
                </form>
            </div> -->

            <!-- Tableau de bord avec trois div -->
            <div class="d-flex justify-content-between">
                <div class="dashboard-box" id="capitalBox">
                    <h4>Capital</h4>
                    <p id="capital"><?= $capital ?></p>
                </div>
                <div class="dashboard-box" id="animalCountBox">
                    <h4>Nombre d'animaux</h4>
                    <p id="animalCount"><?= $nb_animals ?></p>
                </div>
                <div class="dashboard-box" id="otherInfoBox">
                    <h4>Current date</h4>
                    <p id="otherInfo"><?= $dateNow ?></p>
                </div>
            </div>

            <!-- Formulaire de filtrage par date -->
            <div class="date-filter-form">
                <form id="dateFilterForm" action="#" method="GET">
                    <input type="date" id="dateInput" name="date" value="<?= date('Y-m-d') ?>" />
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script AJAX pour mettre à jour le tableau de bord sans recharger la page -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        
    </script>

</body>
<script src="<?= Flight::base() ?>/public/assets/assets/static/js/components/dark.js"></script>
<script src="<?= Flight::base() ?>/public/assets/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= Flight::base() ?>/public/assets/assets/compiled/js/app.js"></script>
</html>

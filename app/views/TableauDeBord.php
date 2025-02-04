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
        #animalPhoto {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>

    <div id="app">
        <?= Flight::menuAdmin() ?>

        <div id="main">
            <div class="page-heading">
                <h3>tableau de bord</h3>
            </div> 
            <div class="page-content"> 
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">date de début</h6>
                                                <h6 class="font-extrabold mb-0"><?= $dateNow ?></h6>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card"> 
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">animaux</h6>
                                                <h6 class="font-extrabold mb-0"><?= $nb_animals ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">status</h6>
                                                <h6 class="font-extrabold mb-0">fermier</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">capital</h6>
                                                <h6 class="font-extrabold mb-0"><?= $capital ?> ar</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>vos animaux</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>photo</th>  
                                                        <th>nom</th>
                                                        <th>type de l'animal</th>
                                                        <th>poids</th>
                                                        <th>status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($animaux as $x) { ?>
                                                    <tr>
                                                        <td><img id="animalPhoto" src="<?= Flight::base() ?>/public/img/upload/<?= $x['photoProfil'] ?>" alt="un animal"></td>
                                                        <td><?= $x['nom'] ?></td>
                                                        <td><?= $x['espece'] ?></td>
                                                        <td><?= $x['poids'] ?></td>
                                                        <td><?= $x['status'] ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="<?= Flight::base() ?>/public/assets/assets/compiled/jpg/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">Patrick / Sedera / Jaona</h5>
                                        <h6 class="text-muted mb-0">@3658 / @3343 / @3253</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>situation de la ferme</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="px-4">
                                <form id="dateFilterForm" action="<?= Flight::base() ?>/prevision" method="get">
                                    <input type="date" id="dateInput" name="date" value="<?= date('Y-m-d') ?>" />
                                    <button class='btn btn-block btn-xl btn-outline-primary font-bold mt-3'>filtrer par date</button>
                                </form>                            
                                </div>
                            </div>
                        </div> 
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
<script src="<?= Flight::base() ?>/public/assets/assets/static/js/components/dark.js"></script>
<script src="<?= Flight::base() ?>/public/assets/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= Flight::base() ?>/public/assets/assets/compiled/js/app.js"></script>
<script>
    // Fonction pour appeler l'API de prévision via AJAX
    function updatePrevision(date) {
        $.ajax({
            url: '/prevision', 
            type: 'GET',
            data: { date: date },  
            success: function(response) {
                let animals = JSON.parse(response);

                let tableBody = $("#animalTable tbody");
                tableBody.empty(); 

                animals.forEach(function(animal) {
                    tableBody.append(`
                        <tr>
                            <td><img id="animalPhoto" src="/public/img/upload/${animal.photoProfil}" alt="un animal"></td>
                            <td>${animal.idAnimal}</td>
                            <td>${animal.nom}</td>
                            <td>${animal.espece}</td>
                            <td>${animal.poids}</td>
                        </tr>
                    `);
                });
            },
            error: function() {
                alert("Une erreur est survenue lors de l'actualisation des données.");
            }
        });
    }

    $(document).ready(function() {
        $("#updatePrevisionButton").on('click', function() {
            let dateCible = $("#dateInput").val(); 
            updatePrevision(dateCible);
        });
    });
</script>
</html>

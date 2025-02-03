<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/css/acceuil.css">
    <link rel="icon" href="<?= Flight::base() ?>/public/assets/img/icon.png" type="image/png">
</head>
<body>
    <!-- Navigation fixe -->
    <?= Flight::menuUser(); ?>

    <!-- Contenu principal -->
    <main class="container-fluid">
        <!-- Filtres -->
        <div class="filters-row">
            <div class="scroll-container">
                <a href="<?= Flight::base() ?>/acceuil"><button class="filter-btn">all</button></a>
                <?php foreach ($types as $x) { ?>
                    <a href="<?= Flight::base() ?>/acceuil?idType=<?= $x['idEspece'] ?>"><button class="filter-btn"><?= $x['nomEspece'] ?></button></a>
                <?php } ?>
            </div>
        </div>

        <!-- Grille de logements -->
        <div class="row listings-grid">
            <?php foreach ($animals as $x) { ?>
            <a href="<?= Flight::base() ?>/habitationDetail?id=<?= $x['idAnimal'] ?>">
                <div class="col-md-2 col-sm-4">
                    <div class="listing-card">
                        <img src="<?= Flight::base() ?>/public/assets/img/upload/<?= $x['imgPrincipale']['img'] ?>" alt="Logement" class="img-responsive">
                        <div class="listing-info">
                            <h3><?= $x['idAnimal'] ?></h3>
                            <p><?= $x['idEspece'] ?></p>
                            <p class="price"><?= $x['loyer'] ?>$ par nuit</p>
                        </div>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </main>

    <!-- Footer -->
    <?= Flight::footerUser(); ?>

    <script src="<?= Flight::base() ?>/public/assets/bootstrap/js/jquery.min.js"></script>
    <script src="<?= Flight::base() ?>/public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show');

            document.addEventListener('click', function(event) {
                const isClickInside = event.target.closest('.profile-container');
                const dropdown = document.getElementById('profileDropdown');
                
                if (!isClickInside && dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            });
        }
    </script>
</body>
</html>
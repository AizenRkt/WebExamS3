<link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/css/acceuil.css">

<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div id="navbar" class="collapse navbar-collapse">
                <a href="<?= Flight::base() ?>/" class="navbar-brand logo">
                    <img src="<?= Flight::base() ?>/public/assets/img/airbnb.png" alt="logo" class="logo-img">
                </a>

                <div class="profile-container navbar-right">
                    <button class="profile-button" onclick="toggleDropdown()">
                            <i style="color: #717171;" class="glyphicon glyphicon-align-justify"></i>
                        <div class="avatar">
                            <i style="color: white;" class="glyphicon glyphicon-user"></i>
                        </div>
                    </button>
                    <div class="profile-dropdown" id="profileDropdown">
                        <a href="<?= Flight::base() ?>/" class="profile-dropdown-item">connexion</a>
                        <a href="<?= Flight::base() ?>/sign" class="profile-dropdown-item">inscription</a>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <script src="<?= Flight::base() ?>/public/assets/bootstrap/js/jquery.min.js"></script>
    <script src="<?= Flight::base() ?>/public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show');

            // Fermer le dropdown si on clique en dehors
            document.addEventListener('click', function(event) {
                const isClickInside = event.target.closest('.profile-container');
                const dropdown = document.getElementById('profileDropdown');
                
                if (!isClickInside && dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            });
        }
    </script>
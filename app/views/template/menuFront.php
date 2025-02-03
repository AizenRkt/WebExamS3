<link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/css/acceuil.css">

<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div id="navbar" class="collapse navbar-collapse">
                <a href="<?= Flight::base() ?>/acceuil" class="navbar-brand logo">
                    <img src="<?= Flight::base() ?>/public/assets/img/airbnb.png" alt="logo" class="logo-img">
                </a>

                <form action="<?= Flight::base() ?>/acceuil" method="get">
                <div class="search-bar navbar-form navbar-left">
                    <div class="search-item">
                        <input type="text" name="descri" class="search-input" placeholder="Rechercher">
                    </div>
                    <button class="search-button">
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
                </form>

                <u class="nav navbar-nav">
                    <li><a href="<?= Flight::base() ?>/acceuil">Home</a></li>
                    <li><a href="#">Marketplace</a></li>
                    <li><a href="#">Dashboard</a></li>
                </u>

                <div class="profile-container navbar-right">
                    <button class="profile-button" onclick="toggleDropdown()">
                            <i style="color: #717171;" class="glyphicon glyphicon-align-justify"></i>
                        <div class="avatar">
                            <i style="color: white;" class="glyphicon glyphicon-user"></i>
                        </div>
                    </button>
                    <div class="profile-dropdown" id="profileDropdown">
                        <a href="#" class="profile-dropdown-item">Favoris</a>
                        <div class="profile-dropdown-divider"></div>
                        <a href="#" class="profile-dropdown-item">Gérer mon compte</a>
                        <div class="profile-dropdown-divider"></div>
                        <a href="<?= Flight::base() ?>/logout" class="profile-dropdown-item">Déconnexion</a>
                    </div>
                </div>

            </div>
        </div>
    </nav>
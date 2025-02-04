<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="index.html"><img style="width: 250px; height: auto;" src="<?= Flight::base() ?>/public/assets/img/airbnb.png" alt="Logo" srcset=""></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <li class="sidebar-item">
                    <a href="<?= Flight::base() ?>/tableauDeBord" class='sidebar-link'>
                        <i class="bi bi-graph-up"></i>
                        <span>tableau de bord</span>
                    </a>
                </li>  

                <li class="sidebar-title">Marketplace</li>
                <li class="sidebar-item">
                    <a href="<?= Flight::base() ?>/animalAchat" class='sidebar-link'>
                        <i class="bi bi-cart-plus"></i>
                        <span>Achat d'animaux</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?= Flight::base() ?>/animalVente" class='sidebar-link'>
                        <i class="bi bi-cash-coin"></i>
                        <span>Vente d'animaux</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?= Flight::base() ?>/achatAliment" class='sidebar-link'>
                        <i class="bi bi-basket"></i>
                        <span>Achat d'aliment</span>
                    </a>
                </li>

                <li class="sidebar-title">CRUD</li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-list-columns-reverse"></i>
                        <span>Type animal</span>
                    </a>
                    
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="<?= Flight::base() ?>/typeAnimalInsert" class="submenu-link">
                                <i class="bi bi-plus-circle"></i> Insert
                            </a>
                        </li>
                        
                        <li class="submenu-item">
                            <a href="<?= Flight::base() ?>/typeAnimalList" class="submenu-link">
                                <i class="bi bi-pencil-square"></i> Liste / Modif / Delete
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-list-columns-reverse"></i>
                        <span>Aliment</span>
                    </a>
                    
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="layout-vertical-1-column.html" class="submenu-link">
                                <i class="bi bi-plus-circle"></i> Insert
                            </a>
                        </li>
                        
                        <li class="submenu-item">
                            <a href="layout-vertical-1-column.html" class="submenu-link">
                                <i class="bi bi-pencil-square"></i> Liste / Modif / Delete
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Utilitaires</li>

                <li class="sidebar-item">
                    <a href="<?= Flight::base() ?>/resetData" class='sidebar-link'>
                        <i class="bi bi-arrow-counterclockwise"></i>
                        <span>Réinitialiser les données de l'application</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="<?= Flight::base() ?>/logout" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>

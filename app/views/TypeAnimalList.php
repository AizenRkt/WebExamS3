<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>titre</title>
    <link rel="shortcut icon" href="<?= Flight::base() ?>/public/assets/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC" type="image/png">
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/assets/compiled/css/app.css">
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/assets/compiled/css/custom-patrick.css">
</head>
<body>

    <div id="app">
        <!-- importe la sidebar (menu ici) -->
        <?= Flight::menuAdmin() ?>

        <!-- dans le main on mettra le contenu de la page -->
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
                
            <div class="page-heading">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">liste des types d'animaux</h4>
                        </div>
                        <div class="row" id="table-bordered">
                            <div class="col-12">
                                    <div class="card-content">
                                        <!-- table bordered -->
                                        <div class="table-responsive">
                                            <table class="table table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Espece</th>
                                                        <th>Poids minimal vente</th>
                                                        <th>Prix de vente kg</th>
                                                        <th>Poids maximal</th>
                                                        <th>nb jour sans manger</th>
                                                        <th>% perte de poids</th>
                                                    </tr>
                                                </thead>

                                                <form method="post" action="<?= Flight::base() ?>/typeAnimalUpdate" onsubmit="return validateAndSubmit(this);">
                                                    <tbody>
                                                        <?php foreach ($types as $animal) { ?>
                                                        <tr>
                                                            <td><input class="form-control" type="text" name="data[<?= $animal['idTypeAnimal'] ?>][espece]" value="<?= $animal['espece'] ?>"></td>
                                                            <td><input class="form-control" type="number" step="0.01" name="data[<?= $animal['idTypeAnimal'] ?>][poids_minimal_vente]" value="<?= $animal['poids_minimal_vente'] ?>"></td>
                                                            <td><input class="form-control" type="number" step="0.01" name="data[<?= $animal['idTypeAnimal'] ?>][prix_vente_kg]" value="<?= $animal['prix_vente_kg'] ?>"></td>
                                                            <td><input class="form-control" type="number" step="0.01" name="data[<?= $animal['idTypeAnimal'] ?>][poids_max]" value="<?= $animal['poids_max'] ?>"></td>
                                                            <td><input class="form-control" type="number" name="data[<?= $animal['idTypeAnimal'] ?>][jours_sans_manger]" value="<?= $animal['jours_sans_manger'] ?>"></td>
                                                            <td><input class="form-control" type="text" name="data[<?= $animal['idTypeAnimal'] ?>][perte_poids_jour]" value="<?= $animal['perte_poids_jour'] ?>"></td>
                                                        </tr>
                                                        <?php } ?>
                                                        <tr>
                                                            <td class="button">
                                                                <button class="btn btn-primary">valider des changements</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </form>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- importe la footer ici -->
            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer> -->
        </div>
    </div>
       
</body>
    <script src="<?= Flight::base() ?>/public/assets/assets/static/js/components/dark.js"></script>
    <script src="<?= Flight::base() ?>/public/assets/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= Flight::base() ?>/public/assets/assets/compiled/js/app.js"></script>
    <script>
        function NewTypeAnimal() {
            let table = document.getElementById("typeAnimalTable");      
            let newRow = table.insertRow(-1); 
            
            // ID aléatoire temporaire pour les nouveaux éléments (peut être remplacé par l'ID réel après l'ajout en base)
            let tempId = "new_" + Math.floor(Math.random() * 10000); 

            newRow.innerHTML = `
                <td><input type="text" name="data[${tempId}][espece]" value=""></td>
                <td><input type="number" name="data[${tempId}][poids_minimal_vente]" value="0"></td>
                <td><input type="number" name="data[${tempId}][prix_vente_kg]" value="0"></td>
                <td><input type="number" name="data[${tempId}][poids_max]" value="0"></td>
                <td><input type="number" name="data[${tempId}][jours_sans_manger]" value="0"></td>
                <td><input type="number" name="data[${tempId}][perte_poids_jour]" value="0"></td>
                <td><button type="button" class="btn btn-danger btn-sm" onclick="removeRow(this)">X</button></td>
            `;
        }

        function removeRow(button) {
            let row = button.closest("tr");
            row.remove();
        }

        function validateAndSubmit(form) {
            let inputs = form.querySelectorAll("input[type='text'], input[type='number']");
            for (let input of inputs) {
                if (input.value.trim() === "") {
                    alert("Tous les champs doivent être remplis.");
                    return false;
                }
            }
            form.submit();
        }

    </script>
</html>
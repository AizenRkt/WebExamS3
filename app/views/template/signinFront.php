<!Doctype html>
<html lang="en">
  <head>
  	<title>Inscription</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/css/style.css">
	<link rel="stylesheet" href="<?= Flight::base() ?>/public/assets/bootstrap/css/bootstrap.min.css">
	<link rel="icon" href="<?= Flight::base() ?>/public/assets/img/icon.png" type="image/png">
    <script src="<?= Flight::base() ?>/public/assets/bootstrap/js/jquery.min.js"></script>
    <script src="<?= Flight::base() ?>/public/assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?= Flight::menuAuth(); ?>

    <div id="first">
        <div class="col-md-12" id="menu">
            <div class="col-md-8" id="mssg" style="height: 100%;">
                <h4 style="font-weight: 700; font-size: 19px; margin-left: 10px; padding-top: 5px;">Bienvenue sur AnimalConnect</h4>
            </div>
        </div>
        <div id="formulaire">
            <h4 id="logSi" style="font-size: 15px;">vous avez déjà un compte, <a href="<?= Flight::base() ?>/" style="color: #85B172;">identification</a></h4>

            <form action="<?= Flight::base() ?>/t-inscription" method="post">
				<div class="ensemble">
					<span class="glyphicon glyphicon-envelope iconForm"></span>
					<div class="inputbox">
						<input type="text" name="nom" class="form-control" required>
						<span>nom</span>
					</div>    
                </div>

                <div class="ensemble">
					<span class="glyphicon glyphicon-envelope iconForm"></span>
					<div class="inputbox">
						<input type="text" name="mail" class="form-control" required>
						<span>email</span>
					</div>    
                </div>

                <div class="ensemble">
					<span class="glyphicon glyphicon-lock iconForm"></span>
					<div class="inputbox">
					<input type="password" name="tel" class="form-control" required>
						<span>téléphone</span>
					</div>
                </div>

				<div class="ensemble">
					<span class="glyphicon glyphicon-lock iconForm"></span>
					<div class="inputbox">
					<input type="password" name="pwd" class="form-control" required>
						<span>mot de passe</span>
					</div>
                </div>

                <div class="ensemble">
					<div class="inputbox">
					<input type="submit" value="valider">
					</div>
                </div>
            </form>
        </div>
    </div>
</body>
	<script>
        function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
        }
        const message = getQueryParam('mssg');
        if (message) {
            Swal.fire({
                icon: 'error',
                title: 'erreur',
                text: message,
            });
        }

	</script>
</html>
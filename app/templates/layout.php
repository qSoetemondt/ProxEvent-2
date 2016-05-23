<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<!-- === STYLESHEETS CSS === -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Appel de la CSS reset -->
	<!-- <link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css')?>"> -->

	<!-- Appel des CSS de datepicker -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/default.css')?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/default.date.css')?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/default.time.css')?>">

	<!-- Appel à notre CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/demo.css')?>">
	
	<!-- === SCRIPTS JS === -->
	<!-- Appel script (vendor) Modernizr -->
	<script src="<?= $this->assetUrl('js/vendor/modernizr-2.8.3.min.js') ?>"></script>

</head>
<body>
<div class="meny">
	<ul class="nav navbar-nav">
							<li><a href="<?= $this->url('home')?>">Accueil</a></li>  
				  			<?php if(!isset($_SESSION['user'])){?>
					  		<li><a href="<?= $this->url('inscription')?>">Inscription</a></li>
	            	  		<li><a href="<?= $this->url('login')?>">Login</a></li>
				 	 		<?php }else{ ?>
					 			<li><a href="<?= $this->url('logout')?>">Déconnexion</a></li>
					 			<li><a href="<?= $this->url('addEvent')?>">Ajout Evénement</a></li>
					 		<?php } ?>         
	          			</ul>
</div>
	<div class="meny-arrow"></div>
	<div class="contents">
		<header>
			<h1><?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>		
	</div>




	<!-- Appel à jQuery -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	
	<!-- Appel JS bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	
	<!-- Chargement de l'API Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGNXG4UdnErAn4jfJ2lgwZ0OEGbT-6lws"></script>

	<!-- Appel à bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- Appel des scripts -->
	<?= $this->section('scripts') ?>
	<script src="<?= $this->assetUrl('js/meny.js')?>"></script>
<script>
	var meny = Meny.create({
	menuElement: document.querySelector( '.meny' ),
	contentsElement: document.querySelector( '.contents' ),
// [optional] alignement du menu (top/right/bottom/left)
	position: Meny.getQuery().p || 'bottom',
// [optional] hauteur du menu (pour la position top ou bottom)
	height: 200,
// [optional] largeur du menu (pour la position left ou right)
	width: 260,
// [optional] distance de d�clenchement du menu par rapport au menu
	threshold: 40,
// [optional] utilisation des mouvement de la souris pour l'ouverture ou la fermeture
	mouse: true,
// [optional] utilisation de l'approche
	touch: true
	});

	if( Meny.getQuery().u && Meny.getQuery().u.match( /^http/gi ) ) {
		var contents = document.querySelector( '.contents' );
		contents.style.padding = '0px';
		contents.innerHTML = '<div class="cover"></div><iframe src="'+ Meny.getQuery().u +'" style="width: 100%; height: 100%; border: 0; position: absolute;"></iframe>';
	}
</script>

</body>
</html>



<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<!-- === STYLESHEETS CSS === -->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Appel de la CSS reset -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css')?>">

	<!-- Appel des CSS de datepicker -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/default.css')?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/default.date.css')?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/default.time.css')?>">

	<!-- Appel à notre CSS -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	
	<!-- === SCRIPTS JS === -->
	<!-- Appel script (vendor) Modernizr -->
	<script src="<?= $this->assetUrl('js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>
<body>


		<header>
			<h1><?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>
		
		<!-- Footer menu -->

    	<footer>
	    	<nav class="navbar navbar-default navbar-fixed-bottom">
	      		<div class="container">
	        		<div class="navbar-header">
	          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            			<span class="sr-only">Toggle navigation</span>
	            			<span class="icon-bar"></span>
	            			<span class="icon-bar"></span>
	            			<span class="icon-bar"></span>
	          			</button>
	          			<a class="navbar-brand" href="<?= $this->url('home')?>">ProxEvent</a>
	        		</div>
	        		<div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
	          			<ul class="nav navbar-nav">
							  
				  			<?php if(!isset($_SESSION['user'])){?>
					  		<li><a href="<?= $this->url('inscription')?>">Inscription</a></li>
	            	  		<li><a href="<?= $this->url('login')?>">Login</a></li>
				 	 		<?php }else{ ?>
					 			<li><a href="<?= $this->url('logout')?>">Déconnexion</a></li>
					 			<li><a href="<?= $this->url('addEvent')?>">Ajout Evénement</a></li>
					 		<?php } ?>         
	          			</ul>
	        		</div>
	      		</div>
	    	</nav>
    	</footer>


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

</body>
</html>



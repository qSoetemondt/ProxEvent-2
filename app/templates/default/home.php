<?php $this->layout('layout', ['title' => 'PROXEveNT']) ?>

<?php $this->start('main_content') ?>

<nav class="navbar navbar-default navbar-fixed-top">
  	<div class="container-fluid">	
		 <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header ">
	      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
	      	</button>
	    </div>

	     <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		
		<!-- checkbox de tri des évènements par catégorie(s) -->
			<ul id="triCategorieId" class="nav navbar-nav">
			</ul>
		</div>
	</div>
</nav>

	

	<!-- Appel Google map -->
	<div id="mapOk"></div>
	<!-- zone d'erreur -->
	<div id="mapError"></div>

<?php $this->stop('main_content') ?>


<?php $this->start('footer') ?>

<?php $this->stop('footer') ?>


<?php $this->start('scripts') ?>

	<script src="<?= $this->assetUrl('js/main.js') ?>"></script>

<?php $this->stop('scripts') ?>

<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
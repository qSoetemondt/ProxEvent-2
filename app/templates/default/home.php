<?php $this->layout('layout', ['title' => 'PROXEveNT']) ?>

<?php $this->start('main_content') ?>

	<!-- checkbox de tri des évènements par catégorie(s) -->
	<div id="triCategorieId">
		
	</div>

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
<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

	<input type="checkbox" id="inpCheckSoireeId"><label for="inpCheckSoireeId">Soirée</label>
	<input type="checkbox" id="inpCheckConcertId"><label for="inpCheckConcertId">Concert</label>
	<input type="checkbox" id="inpCheckExpoId"><label for="inpCheckExpoId">Expo</label>
	<input type="checkbox" id="inpCheckSportId"><label for="inpCheckSportId">Sport</label>
	<input type="checkbox" id="inpCheckForumId"><label for="inpCheckForumId">Forum</label>
	<input type="checkbox" id="inpCheckSalonId"><label for="inpCheckSalonId">Salon</label>
	<input type="checkbox" id="inpCheckPerformingId"><label for="inpCheckPerformingId">Performing</label>
	<input type="checkbox" id="inpCheckFestivalId"><label for="inpCheckFestivalId">Festival</label>

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
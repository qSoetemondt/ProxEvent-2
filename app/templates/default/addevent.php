<?php $this->layout('layout', ['title' => 'proxEvent']) ?>

<?php $this->start('main_content') ?>

	<!-- Formulaire simplifié d'ajout d'événement -->
	<h1>Ajout d'événement</h1>

	<form id="formEventId" class="form-horizontal" action="#" method="POST">

		<!-- Bouton de choix d'un form complet ou non -->
		<button type="button" class="btn btn-primary" id="btnOptId" name="btnOpt">Plus d'options</button>

		<!-- Div de rangement des catégories -->
		<div class="form-group" id="rangeCategId">
		</div>

		<!-- Caractère payant ou non : -->
		<div class="form-group">
			<label for="selGratuitId" class="col-sm-2 control-label">Entrée</label>
			<div class="col-sm-10">
				<select id="selGratuitId" class="form-control" name="selGratuit" class="form-control">
					<option>Gratuit</option>
					<option>Payant</option>			
				</select>
			</div>
		</div>

		<!-- implémentation des champs facultatifs -->
		<div id="facultatifForm">
			<!-- Champ Titre -->
			<div class="form-group">
    			<label for="inputTitreId" class="col-sm-2 control-label">Titre</label>
    			<div class="col-sm-10">
      				<input type="text" class="form-control" name="titre" id="inputTitreId" placeholder="Titre de l'événement">
    			</div>
  			</div>

  			<div class="form-group">
    			<label for="inputDebutId" class="col-sm-2 control-label">Début</label>
				<div class="col-sm-5">
  					<input type="text" class="datepicker form-control" name="dateDebut" id="inputDateDebutId">
  				</div>
				<div class="col-sm-5">
  					<input type="time" class="timepicker form-control" name="timeDebut" id="inputTimeDebutId">
  				</div>
  			</div>

 			<div class="form-group">
    			<label for="inputFinId" class="col-sm-2 control-label">Fin</label>
				<div class="col-sm-5">
  					<input type="text" class="datepicker form-control" name="dateFin" id="inputDateFinId">
  				</div>
				<div class="col-sm-5">
  					<input type="time" class="timepicker form-control" name="timeFin" id="inputTimeFinId">
  				</div>
  			</div>
		</div>	<!-- Fin de facultatifForm -->
		
		<button type="submit" class="btn btn-primary" name="btn">Valider</button>

	</form>
	</div>


<?php $this->stop('main_content') ?>



<?php $this->start('scripts') ?>

	<!-- Scripts de date et time picker -->
	<script src="<?= $this->assetUrl('js/picker.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/picker.date.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/picker.time.js') ?>"></script>

	<!-- Chargement du scripts js d'ajout de formulaire dynamique-->
	<script src="<?= $this->assetUrl('js/form.js') ?>"></script>

<?php $this->stop('scripts') ?>
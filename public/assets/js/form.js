$(document).ready(function() {
	
	// Appel AJAX sur les catégories :
	$.ajax({
		url: '/api/categories',
		type: 'GET',
		dataType: 'json',
		// data: {param1: 'value1'},
	})
	.done(function(json) {
		console.log(json);

		// Remplissage du form avec des checkboxes pour chaque catégorie principale :
		$form = $('#rangeCategId');
		$compteur = 0;
		
		// création de la première div de classe row
		// pour les boutons radios catégories
		$divRow = $('<div class="row">');
		
		$(json).each(function(index, el) 
		{
			if ($(json)[index]['parent_id'] == 0) 
			{
				if($compteur == 3)
				{
					console.log("création div row");
					// création d'une nouvelle div de classe radio
					$divRadio = $('<div class="row">');
					// remise du compteur à zéro
					$compteur = 0;
				}		

				// Gestion des icones des catégories parent :
				$id_categorie = $(json)[index]['id'];

				switch ($id_categorie) {
					case "1":
						$spanIcon = $('<span class="glyphicon glyphicon-glass">');
						break;
					case "2":
						$spanIcon = $('<span class="glyphicon glyphicon-music">');
						break;
					case "3":
						$spanIcon = $('<span class="glyphicon glyphicon-camera">');
						break;
					case "4":
						$spanIcon = $('<span class="glyphicon glyphicon-heart-empty">');
						break;
					case "5":
						$spanIcon = $('<span class="glyphicon glyphicon-globe">');
						break;
					case "6":
						$spanIcon = $('<span class="glyphicon glyphicon-hand-right">');
						break;
					case "7":
						$spanIcon = $('<span class="glyphicon glyphicon-fire">');
						break;
					case "8":
						$spanIcon = $('<span class="glyphicon glyphicon-cd">');
						break;
					default:
						// statements_def
						break;
				}

				// Création du label
				$label = $('<label class="radio-inline">');
				// création de l'input de type radio
				$input = $('<input type="radio" name="radCategorie">');

				// console.log('libelle : ');
				$libelle = $(json)[index]['libelle'];
				console.log($libelle);
				console.log(typeof($libelle));

				// Remplissage des balises :
				$label.append($spanIcon);
					// on cache le bouton radio pour ne voir que le glyphicon
				$label.append($input.hide());
				$label.append($libelle);

				// Création d'un élément de ligne
				$elementRow = $('<div class="col-xs-4">');
				$elementRow.append($label);

				$divRow.append($elementRow);
				$form.append($divRow);

				// Incrémentation du compteur de catégories parent
				// afin de les afficher 3 par 3
				$compteur++;
			}
		});

	})
	.fail(function(error) {
		console.log(error);
	})
	.always(function() {
		console.log("complete");
	});
	
	// Gestion des datepickers (avec pickadate):
	var $date_debut = $('#inputDateDebutId').pickadate({
		format: 'dd/mm/yyyy',
		formatSubmit: 'yyyy-mm-dd',
		min: new Date(),
	});
	var $time_debut = $('#inputTimeDebutId').pickatime({
		formatLabel: '<b>HH</b>:i',
		formatSubmit: 'HH:i',
	});

	var $date_fin = $('#inputDateFinId').pickadate({
		format: 'dd/mm/yyyy',
		formatSubmit: 'yyyy-mm-dd',
		min: new Date(),
	});
	var $time_fin = $('#inputTimeFinId').pickatime({
		formatLabel: '<b>HH</b>:i',
		formatSubmit: 'HH:i',
	});

	// Gestion du choix d'un formulaire de création d'événement
	// simplifié ou complet : au clic sur un bouton, on toggle 
	// le form complet ou non. Par défaut, form simplifié.
	$optionnel = $('#facultatifForm');
	$optionnel.hide();

	$btnOpt = $('#btnOptId');

	$(function () {
		$('#btnOptId').click(function(event) {
			$('#btnOptId').text(function (i, text) {
				return text === "Plus d'options" ? "Moins d'options" : "Plus d'options";
			});
			$optionnel.toggle(250);
		});
	});

});
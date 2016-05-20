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
					//console.log("création div row");
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
				$input = $('<input type="radio" name="radCategorie" value="'+$id_categorie+'">');

				// console.log('libelle : ');
				$libelle = $(json)[index]['libelle'];
				//console.log($libelle);
				//console.log(typeof($libelle));

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
	

	// Gestion des limites calendaires
	// var $input = $('#inputDateDebutId').pickadate();

	// Gestion des datepickers (avec pickadate):
	var $date_debut = $('#inputDateDebutId').pickadate({
		format: 'dd/mm/yyyy',
		formatSubmit: 'yyyy-mm-dd',
	});
	// Affectation de la date limite inférieure de début
	pickerDateDebut = $date_debut.pickadate('picker');
	pickerDateDebut.set('min', true);


	// Récupération de la date saisie dans date_debut
		pickerDateDebut.on({
			close: function(){
				pickerDateDebut.set('select', new Date());
				date_fin_min = pickerDateDebut.get('value');
			}
		})

	var $time_debut = $('#inputTimeDebutId').pickatime({
		formatLabel: '<b>HH</b>:i',
		formatSubmit: 'HH:i',
		format: 'HH:i',
	});
	// Affectation de l'heure limite inférieure de début par rapport à NOW
	pickerTimeDebut = $time_debut.pickatime('picker');
	pickerTimeDebut.set('min', true);

	// Récupération de l'heure saisie dans time_debut
		pickerTimeDebut.on({
			close: function(){
				time_fin_min = pickerTimeDebut.get('value');
			}
		})


	var $date_fin = $('#inputDateFinId').pickadate({
		format: 'dd/mm/yyyy',
		formatSubmit: 'yyyy-mm-dd',
	});
	// Limitation de la date de fin inférieure en fonction de la date de début
	pickerDateFin = $date_fin.pickadate('picker');

		pickerDateFin.on({
			open: function(){
				pickerDateFin.set('min', date_fin_min);
			}
		})

	var $time_fin = $('#inputTimeFinId').pickatime({
		formatLabel: '<b>HH</b>:i',
		formatSubmit: 'HH:i',
		format: 'HH:i',
	});
	// Affectation de la limite inférieure de la time_fin en fonction de la time_début rentré par l'utilisateur si date_debut == date_fin
	pickerTimeFin = $time_fin.pickatime('picker');

		pickerTimeFin.on({
			open: function(){
				if(pickerDateFin.get() == pickerDateDebut.get())
				{
					pickerTimeFin.set('min', time_fin_min);
				}
			}
		})

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
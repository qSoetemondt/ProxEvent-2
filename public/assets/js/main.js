/*==============================
	Logique de géolocalisation
  ==============================*/

$(document).ready(function() {

	/*
		Récupération des références sur les objets
	*/
	var $zoneError = $('#mapError'); // ciblage pour la zone des erreurs
	var $zoneMap = $('#mapOk'); // ciblage de la zone de la carte

	/*
		État initial des objets
	*/
	$zoneMap.show(); // afficher la zone de la carte
	$zoneError.hide();

	/*
		Initialise une carte selon l'API Google
	*/
	var initGoogleMap = function(latitude, longitude) {
		
		// TODO latitude et longitude seront fournies
		// par l'API HTML5 Geolocation
		var localCoords = {
			lat: latitude,
			lng: longitude
		};
		
		// Objet carte Google dans la div correspondante
		var map = new google.maps.Map($zoneMap[0], {
			zoom: 15,
			center: localCoords,
			disableDefaultUI : true, // masque l'interface par défaut de Google
			mapTypeId: google.maps.MapTypeId.ROADMAP // affichage graphique par défaut
		});

		// marqueur des coordonnées locales
		var markerDefault = new google.maps.Marker({
			position: localCoords,
			map: map,
			draggable: false,	// le marqueur n'est pas déplaçable
			title: 'Position actuelle'
		});
		
		
		
		
		// ************************************************
		// Chargement des événements ciblés, par appel AJAX
		$.ajax({
			url: '/api/events',
			type: 'GET',
			dataType: 'json',
			// data: {param1: 'value1'},
		})
		.done(function(json) {
			console.log(json);
			
			$(json).each(function(index, el) {
				$latitude = $(json)[index]['latitude'];
				$longitude = $(json)[index]['longitude'];

				$titreEvent = $(json)[index]['titre'];
				if($(json)[index]['payant'] == 0){ $payant = "Gratuit"}else{ $payant = "Payant"};
				if($(json)[index]['description'] != ""){$description = $(json)[index]['description']}else{$description = "Aucune description"};
				var $eventCoords = {
					lat: $latitude,//48.837799072265625,
					lng: $longitude//2.3342411518096924
				};

				// marqueur des coordonnées locales pour chaque event
				var marker = new google.maps.Marker({
					position: $eventCoords,
					map: map,
					draggable: false,	// le marqueur n'est pas déplaçable
					title: $titreEvent					
				});
				// Infobulle
	
				var contenuInfoBulle =	"<div class='infobulle'>"+
										"<h3>Titre : "+$(json)[index]['titre']+ "</h3><br>" +
										"<h4>Type d'évenement : " + $(json)[index]['libelle'] + "</h4><br>"+
										"<p>Adresse : "+$(json)[index]['adresse'] + "</p><br>" +
										"<p>Payant : "+ $payant + "</p><br>"+
										"<p>Description : " + $description + "</p><br>" +
										"<p>Heure de début : " + $(json)[index]['date_debut'] + "</p><br>" +
										"<p>Heure de fin : " + $(json)[index]['date_fin'] + "</p><br>" +
										"<p>Fiabilité : " + $(json)[index]['plus_un'] + 
										"<form method='POST' action=''><input type='hidden' name='plusun' value='"+$(json)[index]['id']+"'><button type='submit' name='submit' style='margin-left:5px'><span class='glyphicon glyphicon-thumbs-up'></span></button></form></p><br>" +									
										"</div>";
				
										
				var infoBulle = new google.maps.InfoWindow( {
					content: contenuInfoBulle,
					shadowStyle: 1,
         			padding: 0,
          			backgroundColor: 'rgb(57,57,57)',
          			borderRadius: 4,
          			arrowSize: 10,
          			borderWidth: 1,
          			borderColor: '#2c2c2c',
          			disableAutoPan: true,
          			hideCloseButton: true,
          			arrowPosition: 30,
					
					} )

				google.maps.event.addListener(marker, 'click', function() {
				infoBulle.open(map, marker);
					});
			});
		})
		.fail(function(error) {
			console.log(error);
		})
		.always(function() {
			console.log("complete");
		});
	};

	/*
		Initialise une carte (alternative) selon l'API Google
	*/
	// var initOpenStreetMap = function(latitude, longitude) {
	// }

	/*
		Affiche la carte centrée sur la position de l'utilisateur
	*/
	// Détecte le support de la géolocalisation dans le navigateur
	if (Modernizr.geolocation) {
		console.info('Géolocalisation disponible.');

		// utilise le service fourni par le navigateur
		navigator.geolocation.watchPosition(
			// initialise la Google Map avec les coordonnées locales
			function(position) {
				// récupère les coordonnées
				initGoogleMap( position.coords.latitude, position.coords.longitude );
			},
			// Gère les erreurs
			function(error) {
				$zoneMap.hide();
				$zoneError.show(); // affiche la zone des erreurs

				switch(error.code) {
					
					case error.PERMISSION_DENIED:
						$zoneError.text('problèmes de droit.');
						break;

					case error.POSITION_UNAVAILABLE:
						$zoneError.text('coordonnées indisponibles.');
						break;

					case error.TIMEOUT:
						$zoneError.text('Temps d\'attente trop élevé');
						break;

					case error.UNKNOWN_ERROR:
					default:
						console.log('Erreur inconnue.');
						break;
				}
			}
		);
	}
	// Alerte : le navigateur ne gère pas la géolocalisation
	else {
		error();
	}

	




})
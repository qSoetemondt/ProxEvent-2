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
		
		// latitude et longitude fournies
		// par l'API HTML5 Geolocation du navigateur
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
				console.log($latitude);
				$longitude = $(json)[index]['longitude'];
				$titreEvent = $(json)[index]['titre'];
				$categorieEvent = $(json)[index]['categorie_id'];

				var $eventCoords = {
					lat: $latitude,//48.837799072265625,
					lng: $longitude//2.3342411518096924
				};

				var icons = {
					'1': 'icomoon-glass.png',
					'2': 'icomoon-music.png',
					'3': 'icomoon-camera.png',
					'4': 'icomoon-heart.png',
					'5': 'icomoon-earth.png',
					'6': 'icomoon-point-right.png',
					'7': 'icomoon-fire.png',
					'8': 'linecons-vynil.png',
				};

				// marqueur des coordonnées locales pour chaque event
				var marker = new google.maps.Marker({
					position: $eventCoords,
					map: map,
					draggable: false,	// le marqueur n'est pas déplaçable
					title: $titreEvent,
					icon: '/assets/img/'+icons[$categorieEvent] // icône de marqueur personnalisée
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
				// TODO : supprimer ces tests
				// récupère les coordonnées
				// var messageLatitude = 'Latitude = ' + position.coords.latitude;
				// var messageLongitude = 'Longitude = ' + position.coords.longitude;
				// console.log( position );
				// console.log( messageLatitude );
				// console.log( messageLongitude );

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
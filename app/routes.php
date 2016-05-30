<?php

	$w_routes = array(

		['GET|POST', '/', 'Default#home', 'home'],
		// Route user
		['GET|POST','/inscription', 'User#inscription', 'inscription'],
		['GET|POST','/login', 'User#login', 'login'],
		['GET|POST','/logout', 'User#logout', 'logout'],
		['GET|POST', '/oublie', 'User#oublie', 'oublie'],
		['GET|POST', '/reinit/[:id]/[:token]', 'User#reinit', 'reinit'],

		// route vers le fichier json des catégories
		['GET|POST', '/api/categories', 'Api#categories', 'apiCategories'],

		// route vers le fichier json des événements
		['GET', '/api/events', 'Api#apiEvent', 'apiEvent'],

		// Route vers le form d'ajout d'événement
		['GET|POST', '/addevent', 'Event#insertNewEvent', 'addEvent'],

		//Route vers une sous catégorie en fonction d'une catégorie parent
		['GET|POST', '/api/subcategories/[:id]', 'Api#subCategories', 'apiSubCategories'],

		// Route vers l'API d'ajout d'événement :
		// Pour les paramètres : mettre des "," pour les latitudes et les longitudes, et non pas des "." Voir API Controller pour voir les paramètres obligatoires
		['GET|POST', '/api/addevent/[:id_user]/[:titre]/[:adresse]/[:latitude]/[:longitude]/[:categorie_id]/[:date_debut]/[:date_fin]/[:payant]/[:description]', 'API#insertNewEvent', 'ApiAddEvent']


	);
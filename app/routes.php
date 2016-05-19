<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],		
		['GET|POST','/inscription', 'User#inscription', 'inscription'],
		['GET|POST','/login', 'User#login', 'login'],
		['GET|POST','/logout', 'User#logout', 'logout'],
		// Route vers le form d'ajout d'événement
		['GET|POST', '/addevent', 'Default#addEvent', 'addEvent'],
		// route vers le fichier json des catégories
		['GET|POST', '/api/categories', 'Api#categories', 'apiCategories'],
		// route vers le fichier json des événements
		['GET', '/api/events', 'Api#apiEvent', 'apiEvent'],
		['GET|POST','/oublie', 'User#oublie', 'oublie'],

	);
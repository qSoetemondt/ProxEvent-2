<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],		
		['GET|POST','/inscription', 'User#inscription', 'inscription'],
		['GET|POST','/login', 'User#login', 'login'],
		['GET|POST','/logout', 'User#logout', 'logout'],
		// Route vers le form d'ajout d'événement
		['GET|POST', '/addevent', 'Event#insertNewEvent', 'addEvent'],
		// route vers le fichier json
		['GET|POST', '/api/categories', 'Api#categories', 'apiCategories'],
		['GET|POST','/oublie', 'User#oublie', 'oublie'],
		


	);
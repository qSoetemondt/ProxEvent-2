<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		// Route vers le form d'ajout d'événement
		['GET|POST', '/addevent', 'Default#addEvent', 'addEvent'],
		// route vers le fichier json
		['GET|POST', '/api/categories', 'Api#categories', 'apiCategories'],
	);
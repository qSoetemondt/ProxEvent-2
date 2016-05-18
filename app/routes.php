<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET', '/test', 'Default#test', 'test'],
		['GET|POST','/inscription', 'Default#inscription', 'inscription'],
		['GET|POST','/login', 'Default#login', 'login'],
		['GET|POST','/addEvent', 'Default#addEvent', 'addEvent'],
	);
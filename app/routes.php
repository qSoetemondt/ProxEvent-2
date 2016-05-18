<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'],
		['GET', '/test', 'Default#test', 'test'],
		['GET|POST','/inscription', 'User#inscription', 'inscription'],
		['GET|POST','/login', 'Default#login', 'login'],
		['GET|POST','/addevent', 'Default#addevent', 'addEvent'],
	);
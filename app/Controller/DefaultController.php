<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/** Page d'accueil par défaut */
	public function home()
	{
		$this->show('default/home');
	}

	public function addEvent(){
		// Redirection vers la page de formulaire
		$this->show('default/addevent');
	}

	
}
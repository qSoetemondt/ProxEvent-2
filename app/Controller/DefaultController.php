<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\EventManager;
use \W\Manager\UserManager;
use \W\Security\AuthentificationManager;


class DefaultController extends Controller
{

	/** Page d'accueil par défaut */
	public function home()
	{
		if(isset($_SESSION['user'])){
			if(isset($_POST['submit'])){
				$m = new EventManager();
				$m->plusUnEvent();
			}
		}
		
		$this->show('default/home');
	}


	public function addEvent(){
		// Redirection vers la page de formulaire
		$this->show('default/addevent');
	}
	
}


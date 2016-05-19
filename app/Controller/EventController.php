<?php

namespace Controller;

use \W\Controller\Controller;

class EventController extends Controller
{
	// Fonction pour récupérer les temps limites 
	// d'affichage d'events
	public function get_time_limit(){
		// Définition de $time_debut :
		$time_debut = strtotime("+2hour");
		$time_debut = date("Y-m-d H:i:s", $time_debut);

		$time_fin = strtotime("+1hour");
		$time_fin = date("Y-m-d H:i:s", $time_fin);

		$time_limite = [$time_debut, $time_fin];

		return $time_limite;
	}

}
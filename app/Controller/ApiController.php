<?php

namespace Controller;

use \W\Controller\Controller;

class ApiController extends Controller
{

	public function categories(){
		$m = new \Manager\CategorieManager();
		// Récupération de toute les catégories :
		$categories = $m->findAll($orderBy = "id", $orderDir = "ASC", $limit = null, $offset = null);

		// création du fichier json :
		$liste_categories = json_encode($categories);
		echo $liste_categories;
	}

	public function subCategories($id_categorie_parent){
		$m = new \Manager\CategorieManager();
		// Récupération des sous catégories d'une catégorie parent
		$subCategories = $m->get_sub_categories($id_categorie_parent);
		$liste_sub_categories = json_encode($subCategories);
		echo $liste_sub_categories;
	}


	// Fonction qui récupère les events ciblés et les encode en json
	public function apiEvent(){
		 $m = new \Manager\EventManager();
		 $events = $m->getEvents();
		 $liste_events = json_encode($events, JSON_NUMERIC_CHECK);
		 echo $liste_events; 
	}


}
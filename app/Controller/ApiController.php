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

}
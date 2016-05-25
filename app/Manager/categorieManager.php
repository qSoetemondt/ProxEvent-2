<?php

namespace Manager;


class CategorieManager extends \W\Manager\Manager {

	// Fonction de récupération des sous catégories en fonction d'une catégorie parent :
	public function get_sub_categories($id_categorie_parent){
		$sql = "SELECT * FROM categories WHERE parent_id = :parent_id";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(":parent_id", $id_categorie_parent);
		$stmt->execute();

		return $stmt->fetchAll();
	}

}
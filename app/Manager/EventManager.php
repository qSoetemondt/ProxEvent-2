<?php

namespace Manager;


class EventManager extends \W\Manager\Manager
{

	public function getEvents(){
		// Si événement pas commencé : on affiche les événements qui
		// commencent dans moins de 2h

		// Si événement commencé : on affiche les événements qui
		// ne sont pas terminés

		// Si événement terminé : on ne l'affiche pas

		$time_limite_debut = strtotime("+2 hours");
		$time_limite_debut = date("Y-m-d H:i:s", $time_limite_debut);

		$current = date("Y-m-d H:i:s", time());

		$sql = "SELECT e.*, c.libelle, c.parent_id FROM events as e, categories AS c WHERE ((date_debut >= :now AND date_debut <= :now_plus_2h) OR (date_debut<=:now AND date_fin >=:now)) AND e.categorie_id = c.id";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(":now", $current);
		$stmt->bindValue(":now_plus_2h", $time_limite_debut);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	public function plusUnEvent(){
			$ok = "ok";
			$id = $_POST['plusun'];
			$sql = "SELECT plus_un FROM events WHERE id = :id";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$valeur = $stmt->fetch();

			$valeurplusun = ($valeur['plus_un'] + 1);

			$sql = "UPDATE events SET plus_un = :plus_un WHERE id = :id";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindValue(":id", $id);
			$stmt->bindValue(":plus_un", $valeurplusun);
			$stmt->execute();
			return $ok;
	}


}

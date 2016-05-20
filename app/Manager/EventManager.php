<?php

namespace Manager;


class EventManager extends \W\Manager\Manager {

	public function getEvents(){
		// Si événement pas commencé : on affiche les événements qui 
		// commencent dans moins de 2h

		// Si événement commencé : on affiche les événements qui
		// ne sont pas terminés

		// Si événement terminé : on ne l'affiche pas

		$time_limite_debut = strtotime("+2 hours");
		$time_limite_debut = date("Y-m-d H:i:s", $time_limite_debut);

		$current = date("Y-m-d H:i:s", time());

		$sql = "SELECT * FROM events WHERE date_debut <= :now_plus_2h OR (date_debut<=:now AND date_fin >=:now)";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(":now", $current);
		$stmt->bindValue(":now_plus_2h", $time_limite_debut);
		$stmt->execute();

		return $stmt->fetchAll();
	}



}
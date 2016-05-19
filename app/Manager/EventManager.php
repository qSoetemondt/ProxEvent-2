<?php

namespace Manager;


class EventManager extends \W\Manager\Manager {

	// Récupération des événements dont la date de début est entre maintenant et dans 2H
	// et dont la date de fin est supérieure à maintenant +1H
	public function getEvents($time_limite){
		
		$time_limite_debut = $time_limite[0];
		$time_limite_fin = $time_limite[1];
		$current = date("Y-m-d H:i:s", time());

		$sql = "SELECT * FROM events WHERE (date_debut >= :now AND date_debut <= :date_debut) OR date_fin >=:date_fin";

		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(":now", $current);
		$stmt->bindValue(":date_debut", $time_limite_debut);
		$stmt->bindValue(":date_fin", $time_limite_fin);
		$stmt->execute();

		return $stmt->fetchAll();
	}



}
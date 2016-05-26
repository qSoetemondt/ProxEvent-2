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
		if(isset($_SESSION['user'])){
			$time_limite_debut = strtotime("+2 hours");
			$time_limite_debut = date("Y-m-d H:i:s", $time_limite_debut);

			$current = date("Y-m-d H:i:s", time());
		
			$sql = "SELECT e.*, c.libelle, v.user_id, v.event_id FROM events as e, categories AS c WHERE ((date_debut >= :now AND date_debut <= :now_plus_2h) OR (date_debut<=:now AND date_fin >=:now)) AND e.categorie_id = c.id";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindValue(":now", $current);
			$stmt->bindValue(":now_plus_2h", $time_limite_debut);
			$stmt->execute();
			return $stmt->fetchAll();
			
		}else{
			$time_limite_debut = strtotime("+2 hours");
			$time_limite_debut = date("Y-m-d H:i:s", $time_limite_debut);

			$current = date("Y-m-d H:i:s", time());
		
			$sql = "SELECT e.*, c.libelle FROM events as e, categories AS c WHERE ((date_debut >= :now AND date_debut <= :now_plus_2h) OR (date_debut<=:now AND date_fin >=:now)) AND e.categorie_id = c.id";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindValue(":now", $current);
			$stmt->bindValue(":now_plus_2h", $time_limite_debut);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
	}
	
	public function getVoteUser(){
		$sql = "SELECT * FROM vote_user WHERE user_id = :id";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindValue(":id", $_SESSION['user']['id']);
		$stmt->execute();
		$voteuser = $stmt->fetchAll();
		$_SESSION['user']['vote'] = $voteuser;
		
		
	}

	public function plusUnEvent(){
			
			$id = $_POST['plusun'];
			$sql = "SELECT plus_un FROM events WHERE id = :id";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindValue(':id', $id);
			$stmt->execute();
			$valeur = $stmt->fetch();

			$valeurplusun = ($valeur['plus_un'] + 1);
			
			$sql = "SELECT * FROM vote_user WHERE user_id = :id";
			$stmt = $this->dbh->prepare($sql);
			$stmt->bindValue(":id", $_SESSION['user']['id']);
			$stmt->execute();
			$voteuser = $stmt->fetchAll();
			$_SESSION['user']['vote'] = $voteuser;
			for($i = 0; $i<count($voteuser); $i++){
				if($_SESSION['user']['vote'][$i]['event_id'] != $id){
					
					$sql = "INSERT INTO vote_user (event_id, user_id) VALUES (:event_id, :user_id)";
					$stmt = $this->dbh->prepare($sql);
					$stmt->bindValue(":event_id", $id);
					$stmt->bindValue(":user_id", $_SESSION['user']['id']);
					$stmt->execute();
					
					$sql = "UPDATE events SET plus_un = :plus_un WHERE id = :id";
					$stmt = $this->dbh->prepare($sql);
					$stmt->bindValue(":id", $id);
					$stmt->bindValue(":plus_un", $valeurplusun);
					$stmt->execute();
				}
					
			}
				
	}
			
	
				
}


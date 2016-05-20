<?php
//|| empty($_POST['dateFin']) || empty($_POST['timeFin'])
//$date_fin = date('Y-m-d H:i:s', strtotime('+2 hours'));
namespace Controller;

use \W\Controller\Controller;

class EventController extends Controller
{

	public function insertNewEvent()
	{
		
		if(isset($_POST['btn']))
		{	// Validation des champs dates et heures relatifs au début de l'évènement
			if(empty($_POST['dateDebut_submit']))
			{
				$date_debut = date('Y-m-d',time());
				if (empty($_POST['timeDebut_submit'])) {
				// en cas de champ vide, on attribue à ce champ l'heure ou la date actuelle
					$time_debut = date('H:i:s',time());
				}
				else
				{
					$time_debut = $_POST['timeDebut_submit'];
				}
			}
			else
			{
				$date_debut = $_POST['dateDebut_submit'];
				if (empty($_POST['timeDebut_submit'])) {
				// en cas de champ vide, on attribue à ce champ l'heure ou la date actuelle
					$time_debut = date('H:i:s',time());
				}
				else
				{
					$time_debut = $_POST['timeDebut_submit'];
				}
			}

			$full_date_debut = $date_debut . " " . $time_debut;

			// fin de l'évènement
			if(empty($_POST['dateFin_submit']))
			{
				$date_fin = date('Y-m-d',time());
				if (empty($_POST['timeFin_submit'])) {
				// en cas de champ vide, on attribue à ce champ l'heure ou la date actuelle
					$time_fin = date('H:i:s',strtotime('+2 hours'));
				}
				else
				{
					$time_fin = $_POST['timeFin_submit'];
				}
			}
			else
			{
				$date_fin = $_POST['dateFin_submit'];
				if (empty($_POST['timeFin_submit'])) {
				// en cas de champ vide, on attribue à ce champ l'heure ou la date actuelle + 2 heures
					$time_fin = date('H:i:s',strtotime('+2 hours'));
				}
				else
				{
					$time_fin = $_POST['timeFin_submit'];
				}
			}

			$full_date_fin = $date_fin . " " . $time_fin;

			// tableau associatif  de données relatives à l'évènement à insérer en BDD				
			$data = [
					 'id' => NULL,
					 'user_id' => NULL,
					 'titre' => $_POST['titre'],
					 'adresse' => NULL,
					 'latitude' => NULL,
					 'longitude' => NULL,
					 'categorie_id' => $_POST['radCategorie'],
					 'date_debut' => $full_date_debut,
					 'date_fin' => $full_date_fin,
					 'payant' => $_POST['selGratuit'],
					 'plus_un' => NULL,
					];

			$m = new \Manager\EventManager;
			$m->setTable('events');
			$m->insert($data, true);
		}

		if(isset($m))
		{
			$this->redirectToRoute('home');
		}
		else
		{
			$this->show('default/addevent');
		}
		
	}
	
	// public function addEvent(){
	// 	// Redirection vers la page de formulaire
	// 	$this->show('default/addevent');
	// }
}
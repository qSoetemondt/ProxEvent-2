<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}
	
	public function test()
	{
		$this->show('default/test');
	}
	public function inscription()
	{
		$this->show('default/inscription');
	}
}
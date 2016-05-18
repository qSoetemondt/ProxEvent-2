<?php

namespace Controller;


use \W\Controller\Controller;
use \Manager\PostManager;
use \W\Manager\UserManager;
use \W\Security\AuthentificationManager;

class UserController extends Controller
{
    
    public function inscription(){
        $errors = [];
        if(isset($_POST['submit'])){
            if($_POST['myForm']['login'] == ""){
                $errors[] = "erreur 1";
            }elseif(preg_match('/[a-zA-Z0-9]{3,20}/' , $_POST['myForm']['login']) == false){
                $errors[] = "erreur 2";
            }elseif($_POST['myForm']['mdp'] == ""){
                $errors[] = "erreur 3";
            }elseif(preg_match('/[a-zA-Z0-9]{5,32}/',$_POST['myForm']['mdp']) == false){
                $errors[] = "erreur 4";
            }elseif($_POST['myForm']['email'] == ""){
                $errors[] = "erreur 5";
            }elseif(preg_match('/^(([a-zA-Z]|[0-9])|([-]|[_]|[.]))+[@](([a-zA-Z0-9])|([-])){2,63}[.](([a-zA-Z0-9]){2,63})+$/', $_POST['myForm']['email']) == false){
                $errors[] = "erreur 6";
            }
         if(!$errors){
            $manager = new UserManager();
			$manager->insert($_POST['myForm']);
			$this->redirectToRoute('home');
		}else{
            var_dump($errors);
        }
		
	}
   $this->show('default/inscription');
   }
}
        
    
    
    
    
    

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
            if($_POST['myForm']['username'] == ""){
                $errors['login'] = "Le champ login est vide";
            }elseif(preg_match('/[a-zA-Z0-9]{3,20}/' , $_POST['myForm']['username']) == false){
                $errors['login'] = "Le champ login ne respecte pas les conditions (3-20 caractère)";
            }elseif($_POST['myForm']['password'] == ""){
                $errors['mdp'] = "Le champ mot de passe est vide";
            }elseif(preg_match('/[a-zA-Z0-9]{5,32}/',$_POST['myForm']['password']) == false){
                $errors['mdp'] = "Le champ mot de passe ne respecte pas les conditions (5 à 32 caractère alphanumérique)";
            }elseif($_POST['myForm']['email'] == ""){
                $errors['email'] = "Le champ email est vide";
            }elseif(preg_match('/^(([a-zA-Z]|[0-9])|([-]|[_]|[.]))+[@](([a-zA-Z0-9])|([-])){2,63}[.](([a-zA-Z0-9]){2,63})+$/', $_POST['myForm']['email']) == false){
                $errors['email'] = "Merci de rentrer une adresse valide (exemple@exemple.com)";
            }
         if(!$errors){
            $email = $_POST['myForm']['email'];
            $username = $_POST['myForm']['username'];
            $manager = new UserManager();
            $mail = $manager->emailExists($email);
            $user = $manager->usernameExists($username);
                if($mail == false && $user == false){
                    $_POST['myForm']['password'] = password_hash($_POST['myForm']['password'], PASSWORD_DEFAULT);
			        $manager->insert($_POST['myForm']);
			        $this->redirectToRoute('login');
                    }else{
                    $exist = "Login ou email déjà existant";
                    echo $exist;
                    }
		}else{
            
        }
		  
        }
    $this->show('default/inscription',['errors' => $errors]);
    }
    
    	public function login() 
	{
        $errors = [];
		if(isset($_POST['connexion'])) {
			$auth = new AuthentificationManager();
			$userManager = new UserManager();
			if($auth->isValidLoginInfo($_POST['myForm']['username'], $_POST['myForm']['password'])) {
				$user = $userManager->getUserByUsernameOrEmail($_POST['myForm']['username']);
				$auth->logUserIn($user);
				$this->redirectToRoute('home');
			}else{
                $errors['user'] = "Le nom de compte ou le mot de passe sont faux";
            }
		}
		$this->show('default/login',['errors' => $errors]);
	}
    
    public function logout()
    {
        $auth = new AuthentificationManager();
        $auth->logUserOut();
        $this->redirectToRoute('home');
    }
}
        
    
    
    
    
    

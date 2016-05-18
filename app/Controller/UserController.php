<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{
    
    public function inscription(){
        $errors = [];
        if(isset($_POST['submit'])){
            if($_POST['pseudo'] == ""){
                $errors[] = "erreur 1";
            }elseif(preg_match('/{3,20}/',$_POST['pseudo']) == false){
                $error +=1;
            }elseif($_POST['password'] == ""){
                $error +=1;
            }elseif(preg_match('/{5,32}/',$_POST['password']) == false){
                $error +=1;
            }elseif($_POST['email'] == ""){
                $error +=1;
            }elseif(preg_match('/^(([a-zA-Z]|[0-9])|([-]|[_]|[.]))+[@](([a-zA-Z0-9])|([-])){2,63}[.](([a-zA-Z0-9]){2,63})+$/', $_POST['email']) == false){
                $error +=1;
            }
         if(!$errors){
             $manager = new UserManager;
             $manager->insert($_POST[])
         }
        }
        
    }
    
    
    
    
}
<?php

namespace App\Controller;

use App\Model\AdoptantManager;
use App\Controller\AbstractController;  

class AdoptantController extends AbstractController 
{       
    public $adoptant;
    public $errors = [];
    
    // public function __construct()
    //     {
    //         parent::__construct();
            
    //     } 

    public function verification(){
        $this->adoptant = array_map('trim', $_POST);
    }

//Formulaire ajout d'adoptant

    public function addAdoptant()
        {   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $this->verification();

            if (empty($this->errors)){

                $adoptantManager = new AdoptantManager();
                $adoptantManager->addAdoptant($this->adoptant);
                // session_start();
                // $_SESSION['flashmessage']="Merci pour l'adoption.";
                // header('Location:/');
                $_SESSION = array();
                if (isset($_COOKIE[session_name()]))
                {
                    setcookie(session_name(),'',time()-4200, '/');
                }
    
                session_destroy();
                header('Location: /private/connexion');

            }

            return $this->twig->render("Home/listechats.html.twig", ["errors" => $this->errors]);

           }

            return $this->twig->render("");

            if ($_SERVER["REQUEST_METHOD"] === 'POST') {
                $adoptant = array_map("trim", $_POST);
                
            if($adoptant['prenom'] == ""){
                $errors['prenom'] = "Merci d'indiquer un prénom.";
                if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["name"]) === 0)
                $adoptant = '<p class="errText">Name must be from letters, dashes, spaces and must not start with dash</p>';
            }

            if($adoptant['nom'] == ""){
                $errors['nom'] = "Merci d'indiquer un nom.";
            }
        
            if($adoptant['adresse'] == ""){
                $errors['adresse'] = "Merci d'indiquer une adresse.";
            }

            if($adoptant['telephone'] == ""){
                $errors['telephone'] = "Merci d'indiquer un numéro de téléphone.";
            }

            if($adoptant['Code_postal'] == ""){
                $errors['Code_postal'] = "Merci d'indiquer un code postal.";
            }

            if($adoptant['ville'] == ""){
                $errors['ville'] = "Merci d'indiquer une ville.";
            }

            if($adoptant['email'] == ""){
                $errors['email'] = "Merci d'indiquer une adresse mail.";
            }
            if(preg_match("/^[a-zA-Z]w+(.w+)*@w+(.[0-9a-zA-Z]+)*.[a-zA-Z]{2,4}$/", $_POST["email"]) === 0)
            $errors = '<p class="errText">Email must comply with this mask: chars(.chars)@chars(.chars).chars(2-4)</p>';
        
            if (empty($errors)) {
                $this->model->addAdoptant($adoptant);
            }
        }
            require __DIR__ . '/../views/charFormAdopt.html';
        }
        
}
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
    
                // session_destroy();
                header('Location: /private/connexion');

            }

            return $this->twig->render("Home/listechats.html.twig", ["errors" => $this->errors]);
           }
        }}
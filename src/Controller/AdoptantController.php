<?php

namespace App\Controller;

use App\Model\AdoptantManager;
use App\Controller\AbstractController;  

class AdoptantController extends AbstractController 
{       
    public $adoptant;
    public $errors = [];
    
    public function verification(){
        $this->adoptant = array_map('trim', $_POST);
    }

//Formulaire ajout d'adoptant
    public function addAdoptant()
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verification();

            if (empty($this->errors))
            { 
                $adoptantManager = new AdoptantManager();
                $idadoptant = $adoptantManager->addAdoptant($this->adoptant);
                $idadoptant = $adoptantManager->linkadoptant($idadoptant,$_POST['chat_id']);
                return $this->twig->render("Home/listechats.html.twig");
                // session_start();
                // $_SESSION['flashmessage']="Merci pour l'adoption.";
                // header('Location:/');
            }
       }
    }


<?php

namespace App\Controller\Private;

use App\Model\Private\ConnexionManager;
use App\Controller\AbstractController;

class ConnexionController extends AbstractController

//Creation de la session
{

     public function verification()
    {
    }
    
    public function connexion()
    {              
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        // {
        //     if(!empty($_POST['nom']) && !empty($_POST['mdp']));
        //     {
        //         $_POST['nom'] = trim($_POST['nom']);
        //         $_POST['mdp'] = trim($_POST['mdp']);
        //     }
        // }
        // return false; 
               
        $manager = new ConnexionManager;
        $resultat = $manager->compare();

            if($resultat){
                session_start();
                $_SESSION ["login"] = $_POST['nom'];
                header ('location: /private/chats');
            }else {
                $error = "identifians incorrects";
                return $this->twig->render ("Private/connexion.html.twig" ,['error'=>$error]);            
            } 
    }
    
    public function logout()
    {
        session_start();
        
            $_SESSION = array();
            if (isset($_COOKIE[session_name()]))
            {
                setcookie(session_name(),'',time()-4200, '/');
            }

            session_destroy();

            header('Location: /private/connexion'); 
    }
}



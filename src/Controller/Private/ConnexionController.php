<?php

namespace App\Controller\Private;

use App\Model\Private\ConnexionManager;
use App\Controller\AbstractController;

class ConnexionController extends AbstractController

//Creation de la session
{

    public function connexion()
    {              
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            if(!empty($_POST['nom']) && !empty($_POST['mdp']));
            {
                $nom = trim($_POST['nom']);
                $mdp = trim($_POST['mdp']);

                $manager = new ConnexionManager;
                $resultat = $manager->compare($nom, $mdp);
                
                if($resultat){
                    session_start();
                    $_SESSION ["login"] = $_POST['nom'];
                    header ('location: /private/chats');
                    session_destroy();
                }else {
                    $error = "Identifiants incorrects";
                } 
            }
        }

        return $this->twig->render ("Private/connexion.html.twig" ,['error'=>$error]);            
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



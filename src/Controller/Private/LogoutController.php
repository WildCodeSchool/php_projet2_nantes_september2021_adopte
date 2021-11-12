<?php

namespace App\Controller\Private;

use App\Model\Private\LogoutManager;
use App\Controller\AbstractController;

class LogoutController extends AbstractController
{
    
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

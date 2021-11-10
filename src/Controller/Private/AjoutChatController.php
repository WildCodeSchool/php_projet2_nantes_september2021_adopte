<?php

namespace App\Controller\Private;

use App\Model\Private\ChatManager;
use App\Controller\AbstractController;

class AjoutController extends AbstractController
{
    
    public function ajout()
    {
        return $this->twig->render("Private/ajoutChat.html.twig");
    }
}
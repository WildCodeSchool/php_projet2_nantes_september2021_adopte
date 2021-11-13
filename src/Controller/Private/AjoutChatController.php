<?php

namespace App\Controller\Private;

use App\Model\Private\ChatManager;
use App\Controller\AbstractController;

session_start();
if(!isset($_SESSION['login'])){
    header ('location: /private/connexion');
}       

class AjoutChatController extends AbstractController
{
    
    public function ajout()
    {
        return $this->twig->render("Private/ajoutChat.html.twig");
    }

    public function fiche()
    {
        return $this->twig->render("Private/ficheChat.html.twig");
    }
}
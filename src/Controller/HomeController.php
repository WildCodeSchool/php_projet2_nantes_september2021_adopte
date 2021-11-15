<?php

namespace App\Controller;

use App\Model\HomeManager;
use App\Controller\AbstractController;

class HomeController extends AbstractController
{
//Affichage des pages
    public function index()
    {
        return $this->twig->render('Home/index.html.twig');
    }

    public function ficheChat()
    {
        return $this->twig->render('/Home/chat.html.twig');
    }

    public function listechats()
    {
        return $this->twig->render('Home/listechats.html.twig');
    }

    public function histoire()
    {
        return $this->twig->render('Home/histoire.html.twig');
    }


    public function chatadoptOK()
    {
        return $this->twig->render('Home/chatadoptOK.html.twig');
    }

    public function chatformadopt()
    {
        return $this->twig->render('Home/chatFormAdopt.html.twig');
    }


}

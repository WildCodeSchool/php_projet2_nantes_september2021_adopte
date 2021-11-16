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
        return $this->twig->render('/Home/chat.html.twig',);
    }

    public function listechats()
    {
        $chatManager = new HomeManager();
        $chats = $chatManager->selectAll();
        return $this->twig->render('Home/listechats.html.twig', ['chats' => $chats]);
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
        return $this->twig->render('Home/chatformadopt.html.twig');
    }

}

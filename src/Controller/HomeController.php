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

    public function ficheChat(int $id)
    {
        $chatManager = new HomeManager();
        $chats = $chatManager->selectOneById($id);
        return $this->twig->render('Home/chat.html.twig',['chat' => $chats]);
    }

    public function listeChats()
    {
        $chatManager = new HomeManager();
        $chats = $chatManager->selectAll();
        return $this->twig->render('Home/listechats.html.twig', ['chats' => $chats]);
    }

    public function histoire()
    {
        return $this->twig->render('Home/histoire.html.twig');
    }

}

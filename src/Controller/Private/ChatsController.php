<?php

namespace App\Controller\Private;

use App\Model\Private\ChatManager;
use App\Controller\AbstractController;   

class ChatsController extends AbstractController{ 

    public function index()
    {
        $chatManager = new ChatManager();
        $chats = $chatManager->selectAll();
        return $this->twig->render("Private/chats.html.twig", ['chats' => $chats] );
    }

    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $item = array_map('trim', $_POST);
    
            // TODO validations (length, format...)
    
            // if validation is ok, insert and redirection
            
            $chatManager = new ChatManager();
            $id = $chatManager->insert($item);
            header('Location:/items/show?id=' . $id);
        }
    
        return $this->twig->render("Private/ajoutChat.html.twig");
    }

    public function edit(int $id)
    {
            // TODO: traiter les infos

        $chatManager = new ChatManager();
        $chat = $chatManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            $item = array_map('trim', $_POST);

            $chatManager->update($chat);
            header('Location: /items/show?id=' . $id);
        }

        return $this->twig->render("Private/edit.html.twig", ['chat' => $chat]);
    }

     public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) trim($_POST['id']);

            $chatManager = new ChatManager();
            $chatManager->delete($id);

            header('Location:chats');
        }
    }
}
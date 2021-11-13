<?php

namespace App\Controller\Private;

use App\Model\Private\ChatManager;
use App\Controller\AbstractController;   

class ChatsController extends AbstractController{ 

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
        $chatManager = new ChatManager();
        $chat = $chatManager -> selectOneById($id);   

        return $this->twig->render("Private/Chats/edit.html.twig", ['chat' => $chat]);
    }

    
}
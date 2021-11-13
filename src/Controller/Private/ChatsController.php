<?php

namespace App\Controller\Private;

use App\Model\Private\ChatManager;
use App\Controller\AbstractController;   

class ChatsController extends AbstractController
{
    public function edit(int $id)
    {
        $chatManager = new ChatManager();
        $chat = $chatManager -> selectOneById($id);   

        return $this->twig->render("Private/Chats/edit.html.twig", ['chat' => $chat]);
    }
}
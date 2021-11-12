<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;
use App\Model\ChatManager;
use App\Controller\AbstractController;

class ChatController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function chat()
    {
        $chatManager = new ChatManager();

        $chat = $chatManager->selectAll();

        return $this->twig->render('Home/chat.html.twig', [
            'chat' => $chat
        ]);
    }
}

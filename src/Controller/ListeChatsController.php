<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\ChatAdoptManager;

class ChatAdoptController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function listechats()
    {
        return $this->twig->render('Home/listechats.html.twig');
    }

    public function chats()
    {
        $chatAdoptManager = new ChatAdoptManager();

        $chatAdoptManager = $chatAdoptManager->inster();

        return $this->twig->render('Home/chats.html.twig', ['chats' => $chats]);
    }

}
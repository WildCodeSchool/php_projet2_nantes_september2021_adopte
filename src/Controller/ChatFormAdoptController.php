<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;
use App\Model\ChatFormAdoptManager;

class ChatFormAdoptController extends AbstractController
{ 
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function chatformadopt()
    {
        return $this->twig->render('Home/chatFormAdopt.html.twig');
    }
}

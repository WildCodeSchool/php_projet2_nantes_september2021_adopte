<?php

/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;
use App\Model\AdoptantManager;

class AdoptantController extends AbstractController
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
        $adoptantManager = new AdoptantManager();
        $adoptant = $adoptantManager -> selectOneById($adoptant);   

        return $this->twig->render('Home/chatFormAdopt.html.twig');
    }

    public function add(): void
        {
        
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $adoptant = array_map("trim", $_POST); //nettoyage
            
            if($adoptant['prenom'] == ""){
                $errors['prenom'] = "Le nom de la recette ne peut pas être vide.";
            }

            if($adoptant['nom'] == ""){
                $errors['nom'] = "La description ne peut pas être vide.";
            }
        
            if($adoptant['adresse'] == ""){
                $errors['adresse'] = "La description ne peut pas être vide.";
            }

            if($adoptant['telephone'] == ""){
                $errors['telephone'] = "La description ne peut pas être vide.";
            }

            if($adoptant['Code_postal'] == ""){
                $errors['Code_postal'] = "La description ne peut pas être vide.";
            }

            if($adoptant['ville'] == ""){
                $errors['ville'] = "La description ne peut pas être vide.";
            }

            if($adoptant['email'] == ""){
                $errors['email'] = "La description ne peut pas être vide.";
            }
        
            if (empty($errors)) {
                $this->model->saveRecipe($adoptant);
            }
        }
            require __DIR__ . '/../views/charFormAdopt.html';
        }
    }
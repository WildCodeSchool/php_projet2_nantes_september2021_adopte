<?php

namespace App\Controller;

use App\Model\ChatManager;
use App\Controller\AbstractController;

class HomeController extends AbstractController
{
//Affichage des pages
    public function index()
    {
        return $this->twig->render('Home/index.html.twig');
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

//Formulaire ajout d'adoptant
    public function addAdoptant(): void
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

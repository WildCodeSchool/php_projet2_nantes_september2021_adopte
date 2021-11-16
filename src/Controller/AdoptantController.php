<?php

namespace App\Controller;

use App\Model\AdoptantManager;
use App\Controller\AbstractController;

class AdoptantController extends AbstractController
{

//Formulaire ajout d'adoptant
    public function addAdoptant(): void
        {

            if ($_SERVER["REQUEST_METHOD"] === 'POST') {
                $adoptant = array_map("trim", $_POST); //nettoyage espaces vide
            
            if($adoptant['prenom'] == ""){
                $errors['prenom'] = "Merci d'indiquer un prénom.";
            }

            if($adoptant['nom'] == ""){
                $errors['nom'] = "Merci d'indiquer un nom.";
            }
        
            if($adoptant['adresse'] == ""){
                $errors['adresse'] = "Merci d'indiquer une adresse.";
            }

            if($adoptant['telephone'] == ""){
                $errors['telephone'] = "Merci d'indiquer un numéro de téléphone.";
            }

            if($adoptant['Code_postal'] == ""){
                $errors['Code_postal'] = "Merci d'indiquer un code postal.";
            }

            if($adoptant['ville'] == ""){
                $errors['ville'] = "Merci d'indiquer une ville.";
            }

            if($adoptant['email'] == ""){
                $errors['email'] = "Merci d'indiquer une adresse mail.";
            }
        
            if (empty($errors)) {
                $this->model->addAdoptant($adoptant);
            }
        }
            require __DIR__ . '/../views/charFormAdopt.html';
        }
}
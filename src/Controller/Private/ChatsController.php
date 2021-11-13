<?php

namespace App\Controller\Private;

use App\Model\Private\ChatManager;
use App\Controller\AbstractController;   

class ChatsController extends AbstractController{ 

    public $chat;
    public $errors = [];
    
    public function verification(){
        $this->chats = array_map('trim', $_POST);
    }

    public function uploadPhoto(){

        //chemin vers le dossier sur le serveur qui reçois les photos
        $uploadDir = "/assets/images/Cat";

        //Recupère ext du fichier
        $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

        //Ext authorisées
        $authorizedExtensions = ['jpg', 'jpeg', 'png'];

        //Taille max de la photo
        $maxFileSize = 2000000;

        if( (!in_array($extension, $authorizedExtensions))){
            $this->errors[] = 'Veuillez sélectionner un fichier au bon format (jpeg, jpg ou png)';

        //Renomage du fichier
        $uploadPhoto = $uploadDir . basename($_FILES['photo']['name']);

        if (isset ($_FILES['photo']['tmp_name']) && filesize($_FILES['photo']['tmp_name']) > $maxFileSize)
            $this->errors["photo"] = "L'image ne doit pas dépasser 2M";
        } else {

            //cryptage nom photo
            $uploadPhoto = uniqid('photo', true) . '.' . $extension;
             //chemin fichier pour la bdd
            move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPhoto);
        }

    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data

            $this->verification();

            if (empty($this->errors)){

                $this->uploadPhoto();
                $chatManager = new ChatManager();
                $chatManager->insert($this->chat);
                header('Location:/private/ajout');
            }

        return $this->twig->render("Private/ajoutChat.html.twig", ["errores" => $this->errors, 'action'=> "/private/add"]);

        }

        return $this->twig->render("Private/ajoutChat.html.twig");
    }

}

//     public function edit(int $id)
//     {
//         $chatManager = new ChatManager();
//         $chat = $chatManager -> selectOneById($id);   

//         return $this->twig->render("Private/Chats/edit.html.twig", ['chat' => $chat]);
//     }
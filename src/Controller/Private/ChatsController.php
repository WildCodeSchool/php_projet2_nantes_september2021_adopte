<?php

namespace App\Controller\Private;

use App\Model\Private\ChatManager;
use App\Controller\AbstractController;   

session_start();
if(!isset($_SESSION['login'])){
    header ('location: /private/connexion');
}      

class ChatsController extends AbstractController{ 

    public $chat;
    public $errors = [];
    
    public function verification(){
        $this->chat = array_map('trim', $_POST);
        //a faire
    }

    public function uploadPhoto(){

        $uploadDir = 'assets/images/Cat/';
        $extension = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $authorizedExtensions = ['jpg', 'jpeg', 'png'];
        $maxFileSize = 2000000;

        if (!in_array($extension, $authorizedExtensions)){
            $this->errors[] = 'Veuillez sélectionner un fichier au bon format (jpeg, jpg ou png)';
            return;
        }

        if (isset ($_FILES['photo']['tmp_name']) && filesize($_FILES['photo']['tmp_name']) > $maxFileSize){
            $this->errors["photo"] = "L'image ne doit pas dépasser 2M";
            return;
        }
        $uploadPhoto = $uploadDir . uniqid('photo', true) . '.' . $extension;
        move_uploaded_file($_FILES['photo']['tmp_name'], dirname(__DIR__) . '/../../public/' . $uploadPhoto);
        $this->chat['photo'] = $uploadPhoto;       
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->verification();

            if (empty($this->errors)){

                $this->uploadPhoto();
                $chatManager = new ChatManager();
                $chatManager->insert($this->chat);
                header('Location:/private/chats/add');
            }

        return $this->twig->render("Private/add.html.twig", ["errors" => $this->errors]);

        }

        return $this->twig->render("Private/add.html.twig");
    }

    public function index()
    {
        $chatManager = new ChatManager();
        $chats = $chatManager->selectAll();
        return $this->twig->render("Private/chats.html.twig", ['chats' => $chats] );
    }

    // public function edit(int $id)
    // {
    //     $chatManager = new ChatManager();
    //     $chat = $chatManager->selectOneById($id);
           
    //     return $this->twig->render("Private/edit.html.twig", ['chat' => $chat]);
    // }

    public function edit(int $id): string
    {
        $chatManager = new ChatManager();
        $chat = $chatManager->selectOneById($id);


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->verification();
            $this->uploadPhoto();
            // clean $_POST data
            $chat = array_merge($chat, $this->chat);

            // TODO validations (length, format...)

            // if validation is ok, update and redirection
            $chatManager->update($chat);
            header('Location:chats');
        }

        return $this->twig->render('Private/edit.html.twig', [
            'chat' => $chat,
        ]);
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

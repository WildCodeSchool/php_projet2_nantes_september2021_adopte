<?php

namespace App\Controller\Private;

use App\Model\Private\ChatManager;
use App\Controller\AbstractController;        

class ChatsController extends AbstractController
{
    public $chat;
    public $errors = [];

    public function __construct()
    {
        parent::__construct();
        session_start();
        if(!isset($_SESSION['login'])){
            header ('location: /private/connexion');
        }
    } 

    public function verification(){
        $this->chat = array_map('trim', $_POST);
    }
    // {
    //     $errnom = "";
    //     $errage = "";
    //     $errrace = "";
    //     $errcouleur = "";
    //     $errsexe = "";
    //     $errphoto = "";
    //     $errdate = "";
    //     $errvaccin = "";
    //     $errsterilise = "";
    //     $errcompatibilite = "";
    //     $errpresentation = "";

    //     if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    //         // 
            
    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["nom"]) === 0)
    //             $errName ="Merci d'indiquer un prénom.";

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["age"]) === 0)
    //             $errage = "Merci d'indiquer un age.";
        
    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["race"]) === 0)
    //             $errrace= "Merci d'indiquer une race.";
    //         }

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["couleur"]) === 0)
    //             $errcouleur = "Merci d'indiquer une couleur.";
    //         }

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["sexe"]) === 0)
    //             $errsexe = "Merci d'indiquer un sexe.";
    //         }

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["photo"]) === 0)
    //         $errphoto = "Merci d'ajouter une photo.";
    //     }

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["arrival"]) === 0)
    //             $errdate = "Merci d'indiquer une date d'arrivée.";
    //         }

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["vaccin"]) === 0)
    //             $ervaccin = "Merci d'indiquer si le chat est à jour dans ses vaccins.";
    //         }

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["sterilisation"]) === 0)
    //             $ersterilise = "Merci d'indiquer si le chat est stérilisé.";
    //         }

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["compatibilite"]) === 0)
    //             $errcompatibilite = "Merci d'indiquer si le chat accepte la présence d'autres animaux.";
    //         }

    //         if(preg_match("/^[A-Z][a-zA-Z -]+$/", $_POST["presentation"]) === 0)
    //             $errpresentation = "Merci d'écrire une petite présentation du chat.";
    //         }
        
    //         if (empty($errors)) {
    //             $this->model->add($chat);
    //         }
    //     }
    // }

    public function uploadPhoto(){

        $uploadDir = '/assets/images/Cat/';
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


    public function edit(int $id): string
    {
        $chatManager = new ChatManager();
        $chat = $chatManager->selectOneById($id);
        
        // if( $chats['vaccin'] == oui  )
        
        // var_dump( $chat); die;
        
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

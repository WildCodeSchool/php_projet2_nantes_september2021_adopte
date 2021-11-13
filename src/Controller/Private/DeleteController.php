<?php

namespace App\Controller\Private;

use App\Model\Private\DeleteManager;
use App\Controller\AbstractController;

class DeleteController extends AbstractController
{
    public function delete(int $id)

    {
            $deleteManager = new DeleteManager;

            $deleteManager->delete();
            header('Location:/chats');
    }  


} 
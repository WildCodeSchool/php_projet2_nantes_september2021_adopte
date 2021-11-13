<?php


namespace App\Model;
use App\Model\AbstractManager;

class DeleteModele extends AbstractManager
{
    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            if(!empty($_POST['id']))
            {
                $_POST['id'] = trim($_POST['id']);

                $statement = $this->pdo->prepare("DELETE FROM chats WHERE id=:id");
                $statement->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
                $statement->execute();
            }
        }
        return false;
    }
}
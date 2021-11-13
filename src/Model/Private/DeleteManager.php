<?php


namespace App\Model\Private;
use App\Model\AbstractManager;

class DeleteModele extends AbstractManager
{
    public function delete(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            if(!empty($_POST['id']))
            {
                $id = trim($_POST['id']);

                $statement = $this->pdo->prepare("DELETE FROM chats WHERE id=:id");
                $statement->bindValue(':id', $id, \PDO::PARAM_INT);
                $statement->execute();
            }
        }
        return false;
    }
}
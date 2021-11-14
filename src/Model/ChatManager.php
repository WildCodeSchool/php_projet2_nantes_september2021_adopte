<?php

namespace App\Model;
use App\Controller\AbstractController;

class ChatManager extends AbstractManager
{
    const TABLE='chats';

    public function addAdoptant(array $id): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $item['name'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
    

}
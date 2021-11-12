<?php

namespace App\Model;
use App\Controller\AbstractController;

class ChatManager extends AbstractManager
{
    public function selectAll(string $orderBy = '', string $direction = 'ASC'): array
    {
        $query = 'SELECT * FROM chats' . static::TABLE;
        

        return $this->pdo->query($query)->fetchAll();
    }

}
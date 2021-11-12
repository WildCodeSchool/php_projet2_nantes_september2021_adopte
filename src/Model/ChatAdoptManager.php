<?php

namespace App\Model;
use App\Controller\AbstractController;

class ChatAdoptManager extends AbstractManager
{
    /**
     * Insert new item in database
     */

    public function insertCat(array $item): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue('title', $item['title'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

}

/*
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

}*/
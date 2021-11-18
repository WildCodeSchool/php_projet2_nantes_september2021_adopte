<?php
namespace App\Model;

class HomeManager extends AbstractManager 
{
    public const TABLE = 'chats';

    public function selectAllHomePage(): array
    {
        $query="SELECT * FROM " . self::TABLE . " ORDER BY RAND() LIMIT 6";

        return $this->pdo->query($query)->fetchAll();
    }

    
}

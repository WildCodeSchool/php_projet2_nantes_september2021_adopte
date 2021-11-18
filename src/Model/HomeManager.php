<?php
namespace App\Model;

class HomeManager extends AbstractManager 
{
    public const TABLE = 'chats';
  
    // public function updateadoptant_id()
    // {
    //     $query = lier table chats et table adoptant
    // }


    public function selectAllByAdoptant() 
    {   
        $query = 'SELECT * FROM ' . static::TABLE . ' WHERE adoptant_id IS NULL' ;

        return $this->pdo->query($query)->fetchAll();
    }

    public function selectAllHomePage(): array
    {
        $query="SELECT * FROM " . self::TABLE . " ORDER BY RAND() LIMIT 6";

        return $this->pdo->query($query)->fetchAll();
    }


}

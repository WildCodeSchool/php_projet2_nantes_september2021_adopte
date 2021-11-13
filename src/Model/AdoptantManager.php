<?php

namespace App\Model;
use App\Controller\AbstractController;

class AdoptantManager extends AbstractManager
{
    /**
     * Insert new item in database
     */

    public function addAdoptant(array $id): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`) VALUES (:name)");
        $statement->bindValue('name', $item['name'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

}

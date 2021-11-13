<?php


namespace App\Model\Private;
use App\Model\AbstractManager;

class ChatManager extends AbstractManager
{
    public const TABLE = 'chats';

    function save($adoptant): void
    {
    $query = "INSERT INTO adoptant(prenom, nom) VALUES (:prenom, :nom)";
    $newRecipe = $this->connection->prepare($query);
    $newRecipe->bindValue(':prenom', $adoptant['prenom'], PDO::PARAM_STR);
    $newRecipe->bindValue(':nom', $recipe['nom'], PDO::PARAM_STR);

    $newRecipe->execute();
    }



    // /**
    //  * Insert new item in database
    //  */
    // public function insert(array $item): int
    // {
    //     $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
    //     $statement->bindValue('title', $item['title'], \PDO::PARAM_STR);

    //     $statement->execute();
    //     return (int)$this->pdo->lastInsertId();
    // }

    // /**
    //  * Update item in database
    //  */
    // public function update(array $item): bool
    // {
    //     $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET `title` = :title WHERE id=:id");
    //     $statement->bindValue('id', $item['id'], \PDO::PARAM_INT);
    //     $statement->bindValue('title', $item['title'], \PDO::PARAM_STR);

    //     return $statement->execute();
    // }
}

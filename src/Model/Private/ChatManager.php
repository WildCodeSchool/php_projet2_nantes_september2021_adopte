<?php

namespace App\Model\Private;
use App\Model\AbstractManager;

class ChatManager extends AbstractManager
{
    public const TABLE = 'chats';
    /**
     * Insert new item in database
     */
    public function insert(array $item): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`) VALUES (:title)");
        $statement->bindValue(':nom', $item['nom'], \PDO::PARAM_STR);
        $statement->bindValue(':age', $item['age'], \PDO::PARAM_INT);
        $statement->bindValue(':race', $item['race'], \PDO::PARAM_STR);
        $statement->bindValue(':couleur', $item['couleur'], \PDO::PARAM_STR);
        $statement->bindValue(':sexe', $item['sexe'], \PDO::PARAM_STR);
        $statement->bindValue(':photo', $item['photo'], \PDO::PARAM_STR);
        $statement->bindValue(':date_arrivee', $item['date_arrivee'], \PDO::PARAM_DATE);
        $statement->bindValue(':vaccin', $item['vaccin'], \PDO::PARAM_BOOL);
        $statement->bindValue(':sterilise', $item['sterilise'], \PDO::PARAM_BOOL);
        $statement->bindValue(':compatibilite_autre_animaux', $item['compatibilite_autre_animaux'], \PDO::PARAM_BOOL);
        $statement->bindValue(':presentation', $item['presentation'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }


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

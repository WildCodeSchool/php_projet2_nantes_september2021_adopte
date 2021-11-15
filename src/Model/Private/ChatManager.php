<?php

namespace App\Model\Private;
use App\Model\AbstractManager;
use App\Controller\Privat\ChatsController;

class ChatManager extends AbstractManager
{
    public const TABLE = 'chats';

    public function insert(array $chat)
    {   
                $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (nom, age, race, couleur, sexe, photo, date_arrivee, vaccin, sterilise, compatibilite_autre_animaux, presentation) VALUES (:nom, :age, :race, :couleur, :sexe, :photo, :date_arrivee, :vaccin, :sterilise, :compatibilite_autre_animaux, :presentation)");
                $statement->bindValue(':nom', $chat['nom'], \PDO::PARAM_STR);
                $statement->bindValue(':age', $chat['age'], \PDO::PARAM_INT);
                $statement->bindValue(':race', $chat['race'], \PDO::PARAM_STR);
                $statement->bindValue(':couleur', $chat['couleur'], \PDO::PARAM_STR);
                $statement->bindValue(':sexe', $chat['sexe'], \PDO::PARAM_STR);
                $statement->bindValue(':photo', $chat['photo'], \PDO::PARAM_STR);
                $statement->bindValue(':date_arrivee', $chat['arrival'], \PDO::PARAM_STR);
                $statement->bindValue(':vaccin', $chat['vaccin'], \PDO::PARAM_BOOL);
                $statement->bindValue(':sterilise', $chat['sterilisation'], \PDO::PARAM_BOOL);
                $statement->bindValue(':compatibilite_autre_animaux', $chat['compatibilite'], \PDO::PARAM_BOOL);
                $statement->bindValue(':presentation', $chat['presentation'], \PDO::PARAM_STR);
                
                $statement->execute();

                return (int)$this->pdo->lastInsertId();
    }   
 

    /**
     * Update item in database
     */
    public function update(array $_chat): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET 'nom' = :nom WHERE id=:id");
        $statement->bindValue(':nom', $_chat['nom'], \PDO::PARAM_STR);
        $statement->bindValue(':age', $_chat['age'], \PDO::PARAM_INT);
        $statement->bindValue(':race', $_chat['race'], \PDO::PARAM_STR);
        $statement->bindValue(':couleur', $_chat['couleur'], \PDO::PARAM_STR);
        $statement->bindValue(':sexe', $_chat['sexe'], \PDO::PARAM_STR);
        $statement->bindValue(':photo', $_chat['photo'], \PDO::PARAM_STR);
        $statement->bindValue(':date_arrivee', $_chat['date_arrivee'], \PDO::PARAM_DATE);
        $statement->bindValue(':vaccin', $_chat['vaccin'], \PDO::PARAM_BOOL);
        $statement->bindValue(':sterilise', $_chat['sterilise'], \PDO::PARAM_BOOL);
        $statement->bindValue(':compatibilite_autre_animaux', $_chat['compatibilite_autre_animaux'], \PDO::PARAM_BOOL);
        $statement->bindValue(':presentation', $_chat['presentation'], \PDO::PARAM_S);

        return $statement->execute();
    }
}

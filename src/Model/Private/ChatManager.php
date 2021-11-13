<?php

namespace App\Model\Private;
use App\Model\AbstractManager;

class ChatManager extends AbstractManager
{
    public const TABLE = 'chats';
    /**
     * Insert new item in database
     */
    public function insert()
    {   
        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if(!empty($_POST['nom']));
            {
                $_POST['nom'] = trim($_POST['nom']);
                // $_POST['mdp'] = trim($_POST['mdp']); 

                $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " ('nom','age','race','couleur','sexe','photo','date_arrivee','vaccin','sterilise','compatibilite_autre_animaux','presentation') VALUES (:nom, :age, :race, :couleur, :sexe, :photo, :date_arrivee, :vaccin, :sterilise, :compatibilite_autre_animaux, :presentation)");
                $statement->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
                $statement->bindValue(':age', $_POST['age'], \PDO::PARAM_INT);
                $statement->bindValue(':race', $_POST['race'], \PDO::PARAM_STR);
                $statement->bindValue(':couleur', $_POST['couleur'], \PDO::PARAM_STR);
                $statement->bindValue(':sexe', $_POST['sexe'], \PDO::PARAM_STR);
                $statement->bindValue(':photo', $_POST['photo'], \PDO::PARAM_STR);
                $statement->bindValue(':date_arrivee', $_POST['date_arrivee'], \PDO::PARAM_DATE);
                $statement->bindValue(':vaccin', $_POST['vaccin'], \PDO::PARAM_BOOL);
                $statement->bindValue(':sterilise', $_POST['sterilise'], \PDO::PARAM_BOOL);
                $statement->bindValue(':compatibilite_autre_animaux', $_POST['compatibilite_autre_animaux'], \PDO::PARAM_BOOL);
                $statement->bindValue(':presentation', $_POST['presentation'], \PDO::PARAM_STR);
                
                $statement->execute();
                return (int)$this->pdo->lastInsertId();
    
            } 
         }  
    }  
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

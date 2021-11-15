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

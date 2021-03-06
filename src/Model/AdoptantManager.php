<?php

namespace App\Model;
use App\Controller\AbstractController;
use App\Controller\AdoptantController;

class AdoptantManager extends AbstractManager
{   public const TABLE = 'adoptant';

    public function addAdoptant(array $adoptant)
    {

        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (prenom, nom, adresse, telephone, Code_postal, ville, email) VALUES (:prenom, :nom, :adresse, :telephone, :Code_postal, :ville, :email)");
        $statement->bindValue(':prenom', $adoptant['prenom'], \PDO::PARAM_STR);
        $statement->bindValue(':nom', $adoptant['nom'], \PDO::PARAM_STR);
        $statement->bindValue(':adresse', $adoptant['adresse'], \PDO::PARAM_STR);
        $statement->bindValue(':telephone', $adoptant['telephone'], \PDO::PARAM_INT);
        $statement->bindValue(':Code_postal', $adoptant['Code_postal'], \PDO::PARAM_STR);
        $statement->bindValue(':ville', $adoptant['ville'], \PDO::PARAM_STR);
        $statement->bindValue(':email', $adoptant['email'], \PDO::PARAM_STR);
        $statement->execute();
        return $this->pdo->lastInsertId();
    }

    public function linkadoptant(int $adoptant_id, int $chat_id)
    {
        $statement = $this->pdo->prepare("UPDATE chats SET adoptant_id=:adoptant_id WHERE id = :chat_id"); 
        $statement->bindValue(':adoptant_id', $adoptant_id, \PDO::PARAM_INT);
        $statement->bindValue(':chat_id', $chat_id, \PDO::PARAM_INT);
        $statement->execute();
    }
}
<?php

namespace App\Model;
use App\Controller\AbstractController;

class AdoptantManager extends AbstractManager
{
    public function addAdoptant(array $id): int
    {
        //insérer un nouvel adoptant 

        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (prenom, nom, adresse, telephone, Code_postal, ville, email) VALUES (:prenom, :nom, :adresse, :telephone, :Code_postal, :ville, :email)");
        $statement->bindValue('prenom', $item['prenom'], \PDO::PARAM_STR);
        $statement->bindValue('nom', $item['nom'], \PDO::PARAM_STR);
        $statement->bindValue('adresse', $item['adresse'], \PDO::PARAM_STR);
        $statement->bindValue('telephone', $item['telephone'], \PDO::PARAM_STR);
        $statement->bindValue('Code_postal', $item['Code_postal'], \PDO::PARAM_STR);
        $statement->bindValue('ville', $item['ville'], \PDO::PARAM_STR);
        $statement->bindValue('email', $item['email'], \PDO::PARAM_STR);
        $statement->execute();

    }
    

}
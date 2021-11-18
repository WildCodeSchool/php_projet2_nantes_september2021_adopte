<?php

namespace App\Model\Private;
use App\Model\AbstractManager;

// on compare le nom et le mdp rentrés par l'utilisateur avec ceux en BDD
class ConnexionManager extends AbstractManager
{
    public function compare($nom, $mdp)
    {
        $statement = $this->pdo->prepare('SELECT nom, mdp FROM admin_connexion WHERE nom = :nom');
        $statement->bindValue(':nom', $nom, \PDO::PARAM_STR);
        $statement->execute();
    
        $resultat = $statement->fetch(); 

        return ($resultat && password_verify($mdp, $resultat['mdp']));
           
    } 
}
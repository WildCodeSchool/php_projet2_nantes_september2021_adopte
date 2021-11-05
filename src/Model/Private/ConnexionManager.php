<?php

namespace App\Model\Private;
use App\Model\AbstractManager;

// on compare le nom et le mdp rentrés par l'utilisateur avec ceux en BDD
class ConnexionManager extends AbstractManager
{
    public function compare()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            if(!empty($_POST['nom']) && !empty($_POST['mdp']))
            {
                $statement = $this->pdo->prepare('SELECT nom, mdp FROM connexion WHERE nom = :nom AND mdp = :mdp');
                $statement->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
                $statement->bindValue(':mdp', password_verify($_POST['mdp'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
                $statement->execute();
                $resultat = $statement->fetch();   
                return $resultat;                 
            }
        }
        return false;
    } 
}
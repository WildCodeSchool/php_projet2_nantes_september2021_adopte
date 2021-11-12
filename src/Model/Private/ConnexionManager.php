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
            if(!empty($_POST['nom']) && !empty($_POST['mdp']));
            {
                $_POST['nom'] = trim($_POST['nom']);
                $_POST['mdp'] = trim($_POST['mdp']);

                $statement = $this->pdo->prepare('SELECT nom, mdp FROM connexion WHERE nom = :nom');
                $statement->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
                $statement->execute();
                $resultat = $statement->fetch(); 
                if ($resultat && password_verify( $_POST['mdp'],$resultat['mdp'])){
                    return true;
                }              
            }
        }
        return false;
    } 
}
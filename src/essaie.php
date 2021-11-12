<?php

//on se connecte a la base
require_once "config/config.php";

// allez chercher les chats dans la bdd
$sql = "SELECT * FROM 'Chats' ";

// on execute la requete
$requete = $db->query($sql);

//on recupere les données
$chats = $requete->fetchAll();

//definition du titre
$titre = "Liste des chats";


//pour chaque chat on affiche le contenue de la bdd
?>
<section>
<?php foreach ($chats as $chat): ?>
    
        <article>
            
            <h1><?= $chat["nom"]?></h1>
            <div><?= $chat["photo"]?></div>
            <p><?= $chat["age"]?></p>
            <p><?= $chat["race"]?></p>
            <p><?= $chat["couleur"]?></p>
            <p><?= $chat["sexe"]?></p>
            <p><?= $chat["date_arrivee"]?></p>
            <p><?= $chat["vaccin"]?></p>
            <p><?= $chat["sterilise"]?></p>
            <p><?= $chat["compatibilite_autre_animaux"]?></p>
            <p><?= $chat["presentation"]?></p>
            
        </article>
    
<?php endforeach; ?>
</section>

{% for chat in chats %}

<tr>
    <td>{{ chat.nom}}</td>
    <td>{{ chat.photo}}</td>
    <td>{{ chat.age}}</td>
    <td>{{ chat.race}}</td>
    <td>{{ chat.couleur}}</td>
    <td>{{ chat.sexe}}</td>
    <td>{{ chat.date_arrivee}}</td>
    <td>{{ chat.vaccin}}</td>
    <td>{{ chat.sterilise}}</td>
    <td>{{ chat.compatibilite_autre_animaux}}</td>
    <td>{{ chat.presentation}}</td>
</tr>

{% endfor %}
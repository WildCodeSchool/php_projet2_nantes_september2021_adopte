<?php

return [

// partie admin 
    'private/connexion' => ['Private\\ConnexionController', 'connexion'],
    'private/logout' => ['Private\\ConnexionController', 'logout'],
    'private/chats' => ['Private\\ChatsController', 'index'],
    'private/chats/add' => ['Private\\ChatsController', 'add'],
    'private/edit' => ['Private\\ChatsController', 'edit', ['id']],
    'private/delete' => ['Private\\ChatsController', 'delete', ['id']],
    'private/chat/fiche' => ['Private\\ChatsController', 'show', ['id']],

//partie public
    '' => ['HomeController', 'index',],
    'histoire' => ['HomeController', 'histoire'],
    'listechats' => ['HomeController', 'listeChats'],
    'ficheChat' => ['HomeController', 'ficheChat', ['id']], 
    'chatadoptOK' => ['HomeController', 'chatadoptOK', ['id']],
    'chatformadopt' => ['AdoptantController', 'addAdoptant', ['id']],

];

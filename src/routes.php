<?php

return [

// partie admin 
    'private/connexion' => ['Private\\ConnexionController', 'connexion'],
    'private/logout' => ['Private\\ConnexionController', 'logout'],
    'private/chats' => ['Private\\ChatsController', 'index'],
    'private/chats/add' => ['Private\\ChatsController', 'add'],
    'private/edit' => ['Private\\ChatsController', 'edit', ['id']],
    'private/delete' => ['Private\\ChatsController', 'delete', ['id']],

//partie public
    '' => ['HomeController', 'index',],
    'histoire' => ['HomeController', 'histoire'],
    'listechats' => ['HomeController', 'listeChats'],
    'ficheChat' => ['HomeController', 'ficheChat', ['id']], 
    'addadoptant' => ['AdoptantController','addadoptant'],
    '' => ['HomeController', 'selectAllHomePage'],
];

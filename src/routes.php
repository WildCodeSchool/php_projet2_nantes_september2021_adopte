<?php

return [

// partie admin 
    'private/connexion' => ['Private\\ConnexionController', 'connexion'],
    'private/logout' => ['Private\\ConnexionController', 'logout'],
    'private/chats' => ['Private\\ChatsController', 'index'],
    'private/delete' => ['Private\\ChatsController', 'delete', ['id']],
    'private/edit' => ['Private\\ChatsController', 'edit', ['id']],
    'private/chats/add' => ['Private\\ChatsController', 'add'],

//partie public
    '' => ['HomeController', 'index',],
    'histoire' => ['HomeController', 'histoire'],
    'listechats' => ['HomeController', 'listechats'],
    'chat' => ['HomeController', 'chat'], 
    'chatadoptOK' => ['HomeController', 'chatadoptOK', ['id']],
    'chatformadopt' => ['HomeController', 'chatformadopt', ['id']],

];

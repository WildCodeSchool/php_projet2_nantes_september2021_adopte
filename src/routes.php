<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    // 'items' => ['ItemController', 'index',],s
    // 'items/edit' => ['ItemController', 'edit', ['id']],
    // 'items/show' => ['ItemController', 'show', ['id']],
    // 'items/add' => ['ItemController', 'add',],
    // 'items/delete' => ['ItemController', 'delete',],


// partie admin 
    'private/connexion' => ['Private\\ConnexionController', 'connexion'],
    'private/logout' => ['Private\\ConnexionController', 'logout'],
    'private/chats' => ['Private\\ListeChatController', 'listeChats'],
    'private/ajout' => ['Private\\AjoutChatController', 'ajout'],
    'private/delete' => ['Private\\DeleteController', 'delete'],
    'private/chats/edit' => ['Private\\ChatsController', 'edit', ['id']],
    'private/chats/add' => ['Private\\ChatsController', 'add',],
    'private/fiche'  => ['Private\\AjoutChatController', 'fiche'],

//partie public
    'histoire' => ['histoireController', 'histoire'],
    'listechats' => ['ListeChatsController', 'listechats'],
    'chat' => ['ChatController', 'chat'], 
    'chatadoptOK' => ['ChatAdoptOKController', 'chatadoptOK', ['id']],
    'chatformadopt' => ['AdoptantController', 'chatformadopt', ['id']],

];

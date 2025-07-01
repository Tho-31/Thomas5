<?php
include 'users.php';
include 'UserClass.php';

$headers = [
  '#' => '#', 
  'email' => 'Email', 
  'first_name' => 'Prénom',
  'last_name' => 'Nom',  
  'password' => 'Mot de passe',
    'age' => 'Age'
    
];

$u1 = new UserClass();
$u1->email = 'dj1963@orange.fr';
$u1->firstName = 'Denis';


$userList = [];
// foreach(users as $user) {
/*  À chaque itération Youzer vaut quelque chose comme : [
        'email' => 'dj1963@orange.fr',
        'first_name' => 'Denis',
        'last_name' => '<p>JARDIN</p>',
        'password' => 'jedi!30',
        'age' => '1963-05-06'
    ]
*/ 
// 
// 
// 
// 
//      $u = new UserClass()
//      $u->email = ???
// ...
// 
//      $userList[] = ???
// }
foreach($users as $user) {
    $u = new UserClass();
    $u->email = $user['email'];
    $userList[] = $u;
}




foreach($userList as $userObject) {
    /* @var $user UserClass */
    $userObject->information();
}


// au lieu d'utiliser une source sous forme de tableau PHP comme dans users.php
// on utilisera un fichier au format CSV 
// 
// fopen
// fgetcsv
// 
// exemple fichier format csv
/*
email;first_name;last_name;password;age
thomas@orange.fr;Thomas;VIDAL;zorro!30114;2004-08-31
dj1963@orange.fr;Denis;JARDIN;jedi!30';1963-05-06'
    ],
 * 
 */



<?php
require_once 'Chatroom.php';
require_once 'User.php';

$chatroom = new Chatroom();

$sasaki = new User('佐々木');
$suzuki = new User('鈴木');
$yoshida = new User('吉田');
$kawamura = new User('河村');
$tajima = new User('田島');

$chatroom->login($sasaki);
$chatroom->login($suzuki);
$chatroom->login($yoshida);
$chatroom->login($kawamura);
$chatroom->login($tajima);

$sasaki->sendMessage('鈴木', '来週の予定は?');
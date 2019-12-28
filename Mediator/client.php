<?php

use Mediator\Chatroom;
use Mediator\User;

require('../vendor/autoload.php');

$chatroom = new Chatroom();
$sasaki = new User('Sasaki');
$suzuki = new User('Suzuki');
$yoshida = new User('Yoshida');

$chatroom->login($sasaki);
$chatroom->login($suzuki);
$chatroom->login($yoshida);

$sasaki->sendMessage('Suzuki', 'Next week?');
$suzuki->sendMessage('Sasaki', 'Secret');
<?php
require_once "SimpleRemoteControl.php";
require_once "Light.php";
require_once "LightOnCommand.php";

$remote = new SimpleRemoteControl();
$light = new Light();
$lightOn = new LightOnCommand($light);

$remote->setCommand($lightOn);
$remote->buttonWasPressed();
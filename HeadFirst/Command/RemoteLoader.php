<?php
require_once "Light.php";
require_once "LightOnCommand.php";
require_once "LightOffCommand.php";
require_once "RemoteControl.php";

$remoteControl = new RemoteControl();

$livingRoomLight = new Light("リビングルーム");
$livingRoomLightOn = new LightOnCommand($livingRoomLight);
$livingRoomLightOff = new LightOffCommand($livingRoomLight);

$remoteControl->setCommand(0, $livingRoomLightOn, $livingRoomLightOff);

$remoteControl->onButtonWasPushed(0);
$remoteControl->offButtonWasPushed(0);
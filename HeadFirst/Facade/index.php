<?php
require_once 'Amplifier.php';
require_once 'CdPlayer.php';
require_once 'DvdPlayer.php';
require_once 'PopcornPopper.php';
require_once 'Projector.php';
require_once 'Screen.php';
require_once 'TheaterLights.php';
require_once 'Tuner.php';
require_once 'HomeTheaterFacade.php';

$amp = new Amplifier("Top-0-Line Amplifier");
$tuner = new Tuner("Top-0-Line AM/FM Tuner", $amp);
$dvd = new DvdPlayer("Top-0-Line DVD Player", $amp);
$cd = new CdPlayer("Top-0-Line CD Player", $amp);
$projector = new Projector("Top-0-Line Projector", $dvd);
$screen = new Screen("Theater Screen");
$lights = new TheaterLights("Theater Ceiling Lights");
$popper = new PopcornPopper("Popcorn Popper");

$homeTheater = new HomeTheaterFacade($amp, $tuner, $dvd, $cd, $projector, $screen, $lights, $popper);
$homeTheater->watchMovie("Raiders of the Lost Ark");
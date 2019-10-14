<?php

class DvdPlayer {
  private $description;
  private $currentTrack;
  private $amplifier;
  private $movie;

  public function __construct(String $description, Amplifier $amplifier) {
    $this->description = $description;
    $this->amplifier = $amplifier;
  }

  public function on() {
    echo $this->description . " on";
    echo "<br>";
  }

  public function off() {
    echo $this->description . " off";
    echo "<br>";
  }

  public function eject() {
    $this->movie = null;
    echo $this->description . " eject";
    echo "<br>";
  }

  public function play(String $movie) {
    $this->movie = $movie;
    $this->currentTrack = 0;
    echo $this->description . ' playing "' . $movie . '"';
    echo "<br>";
  }

  public function stop() {
    $this->currentTrack = 0;
    echo $this->description . ' stopped "' . $this->movie . '"';
    echo "<br>";
  }

  public function pause() {
    echo $this->description . ' paused "' . $this->movie . '"';
    echo "<br>";
  }

  public function setTwoChannelAudio() {
    echo $this->description . " set two channel audio";
    echo "<br>";
  }

  public function setSurroundAudio() {
    echo $this->description . " set surround audio";
    echo "<br>";
  }

  public function getDescription() {
    return $this->description;
  }
}
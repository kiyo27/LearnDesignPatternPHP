<?php

class CdPlayer {
  private $description;
  private $currentTrack;
  private $amplifier;
  private $title;

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
    $this->title = null;
    echo $this->description . " eject";
    echo "<br>";
  }

  public function play(Sting $title) {
    $this->title = $title;
    $this->currentTrack = 0;
    echo $this->description . ' playing "' . $title . '"';
    echo "<br>";
  }

  public function stop() {
    $this->currentTrack = 0;
    echo $this->description . ' paused "' . $this->title . '"';
  }

  public function getDescription() {
    return $this->description;
  }
}
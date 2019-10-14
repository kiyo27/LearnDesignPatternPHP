<?php

class Projector {
  private $description;
  private $dvdPlayer;

  public function __construct(String $description, DvdPlayer $dvdPlayer) {
    $this->description = $description;
    $this->dvdPlayer = $dvdPlayer;
  }

  public function on() {
    echo $this->description . " on";
    echo "<br>";
  }

  public function off() {
    echo $this->description . " off";
    echo "<br>";
  }

  public function wideScreenMode() {
    echo $this->description . " in widescreen mode (16x9 aspect ratio)";
    echo "<br>";
  }

  public function tvMode() {
    echo $this->description . " in tv mode (4x3 aspect ratio)";
    echo "<br>";
  }

  public function getDescription() {
    return $this->description;
  }
}
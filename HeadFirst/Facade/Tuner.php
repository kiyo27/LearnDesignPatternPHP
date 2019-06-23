<?php

class Tuner {
  private $description;
  private $amplifier;
  private $frequency;

  public function __construct(String $description, Amplifier $amplifier) {
    $this->description = $description;
  }

  public function on() {
    echo $this->description . " on";
    echo "<br>";
  }

  public function off() {
    echo $this->description . " off";
    echo "<br>";
  }

  public function setFrequency(float $frequency) {
    echo $this->description . " setting frequency to " . $frequency;
    $this->frequency = $frequency;
  }

  public function setAm() {
    echo $this->description . " setting AM mode";
    echo "<br>";
  }

  public function setFm() {
    echo $this->description . " setting FM mode";
    echo "<br>";
  }

  public function getDescription() {
    return $this->description;
  }
}
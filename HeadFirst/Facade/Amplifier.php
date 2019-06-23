<?php

class Amplifier {
  private $description;
  private $tuner;
  private $dvd;
  private $cd;

  public function __construct(String $description) {
    $this->description = $description;
  }

  public function on() {
    echo $this->description . " on.";
    echo "<br>";
  }

  public function off() {
    echo $this->description . " off.";
    echo "<br>";
  }

  public function setStereoSound() {
    echo $this->description . " stereo mode on.";
    echo "<br>";
  }

  public function setSurroundSound() {
    echo $this->description . " surround sound on (5 speakers, 1 subwoofer)";
    echo "<br>";
  }

  public function setVolume(int $level) {
    echo $this->description . " setting volume to " . $level;
    echo "<br>";
  }

  public function setTuner(Tuner $tuner) {
    echo $this->description . " setting tuner to " . $this->dvd->getDescription();
    echo "<br>";
    $this->tuner = $tuner;
  }

  public function setDvd(DvdPlayer $dvd) {
    $this->dvd = $dvd;
    echo $this->description . " setting DVD player to " . $this->dvd->getDescription();
    echo "<br>";
  }

  public function setCd(CdPlayer $cd) {
    echo $this->description . " setting CD player to " . $this->cd->getDescription();
    echo "<br>";
  }

  public function getDescription() {
    return $this->description;
  }
}
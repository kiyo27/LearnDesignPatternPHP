<?php

class TheaterLights {
  private $description;

  public function __construct(String $description) {
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

  public function dim(int $level) {
    echo $this->description . " dimming to " . $level . "%";
    echo "<br>";
  }

  public function getDescription() {
    return $this->description();
  }
}
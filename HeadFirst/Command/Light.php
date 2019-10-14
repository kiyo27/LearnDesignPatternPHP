<?php

/**
 * Receiver
 */
class Light {
  private $location;

  public function __construct(string $location) {
    $this->location = $location;
  }

  public function on() {
    echo $this->location . " Light is on.";
    echo "<br>";
  }

  public function off() {
    echo $this->location . " Light is off.";
    echo "<br>";
  }
}
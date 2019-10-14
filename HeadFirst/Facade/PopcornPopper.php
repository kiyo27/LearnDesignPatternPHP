<?php

class PopcornPopper {
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

  public function pop() {
    echo $this->description . " popping popcorn!";
    echo "<br>";
  }

  public function getDescription() {
    return $this->description;
  }
}
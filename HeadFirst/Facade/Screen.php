<?php

class Screen {
  private $description;

  public function __construct(String $description) {
    $this->description = $description;
  }

  public function up() {
    echo $this->description . " going up";
    echo "<br>";
  }

  public function down() {
    echo $this->description . " going down";
    echo "<br>";
  }

  public function getDescription() {
    return $this->description;
  }
}
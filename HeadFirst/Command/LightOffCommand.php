<?php
require_once "Command.php";

/**
 * Concrete Command
 */
class LightOffCommand implements Command {
  private $light;

  public function __construct(Light $light) {
    $this->light = $light;
  }

  public function execute() {
    $this->light->off();
  }

  public function undo() {
    $this->light->undo();
  }
}
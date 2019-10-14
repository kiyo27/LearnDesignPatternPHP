<?php
require_once "NoCommand.php";

/**
 * Invoker
 */
class RemoteControl {
  private $onCommands = array();
  private $offCommands = array();

  public function __construct() {
    $noCommand = new NoCommand();
    for ($i=0; $i < 7; $i++) {
      $this->onCommands[i] = $noCommand;
      $this->offCommands[i] = $noCommand;
    }
  }

  public function setCommand(int $slot, Command $onCommand, Command $offCommand) {
    $this->onCommands[$slot] = $onCommand;
    $this->offCommands[$slot] = $offCommand;
  }

  public function onButtonWasPushed(int $slot) {
    $this->onCommands[$slot]->execute();
  }

  public function offButtonWasPushed(int $slot) {
    $this->offCommands[$slot]->execute();
  }
}
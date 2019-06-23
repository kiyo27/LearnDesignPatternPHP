<?php
require_once "NoCommand.php";

/**
 * Invoker
 */
class RemoteControl {
  private $onCommands = array();
  private $offCommands = array();
  private $undoCommand;

  public function __construct() {
    $noCommand = new NoCommand();
    for ($i=0; $i < 7; $i++) {
      $this->onCommands[i] = $noCommand;
      $this->offCommands[i] = $noCommand;
    }
    $this->undoCommand = $noCommand;
  }

  public function setCommand(int $slot, Command $onCommand, Command $offCommand) {
    $this->onCommands[$slot] = $onCommand;
    $this->offCommands[$slot] = $offCommand;
  }

  public function onButtonWasPushed(int $slot) {
    $this->onCommands[$slot]->execute();
    $this->undoCommand = $this->onCommands[$slot];
  }

  public function offButtonWasPushed(int $slot) {
    $this->offCommands[$slot]->execute();
    $this->undoCommand = $this->offCommands[$slot];
  }

  public function undoButtonWasPushed() {
    $this->undoCommand->undo();
  }
}
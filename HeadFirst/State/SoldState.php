<?php
require_once 'State.php';

class SoldState implements State {
  private $gumballMachine;

  public function __construct(GumballMachine $gumballMachines) {
    $this->gumballMachine = $gumballMachine;
  }

  public function insertQuarter() {
    echo "Please wait, we're already giving you a gumball";
  }

  public function ejectQuarter() {
    echo "Sorry, you already turned the crank";
  }

  public function turnCrank() {
    echo "Turning twice doesn't get you anoter gumball";
  }

  public function dispense() {
    $this->gumballMachine->releaseBall();
    if ($this->gumballMachine->getCount() > 0) {
      $this->gumballMachine->setState($this->gumballMachine->getNoQuarterState());
    } else {
      echo "Oops, out of gumball";
      $this->gumballMachine->setState($this->gumballMachine->getSoldOutState());
    }
  }

  public function refill() {}

  public function toString() {
    return get_class($this);
  }
}
<?php

class GumBallMachine {
  private $soldOutState;
  private $noQuarterState;
  private $hasQuarterState;
  private $soldState;
  private $winnerState;
  private $state;
  private $count = 0;

  public function __construct(int $numberGumballs) {
    $this->soldOutState = new SoldOutState($this);
    $this->noQuarterState = new NoQuarterState($this);
    $this->hasQuarterState = new HasQuarterState($this);
    $this->soldState = new SoldState($this);
    $this->winnerState = new WinnerState($this);

    $this->state = $this->soldOutState;
    $this->count = $numberGumballs;
    if ($numberGumballs > 0) {
      $this->state = $this->noQuarterState;
    }
  }

  public function insertQuarter() {
    $this->state->insertQuarter();
  }

  public function ejectQuarter() {
    $this->state->ejectQuarter();
  }

  public function turnCrank() {
    $this->state->turnCrank();
    $this->state->dispense();
  }

  public function setState(State $state) {
    $this->state = $state;
  }

  public function releaseBall() {
    echo "A gumball comes rolling out the slot...";
    if ($this->count != 0) {
      $this->count = $this->count -1;
    }
  }

  public function getCount() {
    return $this->count;
  }

  public function refill(int $count) {
    $this->count = $count;
    echo "The gumball machine was just refilled; it's new count is: " . $this->count;
    $this->state->refill();
  }

  public function getState() {
    return $this->state;
  }

  public function getSoldOutState() {
    return $this->soldOutState;
  }

  public function getNoQuarterState() {
    return $this->noQuarterState;
  }

  public function getHasQuarterState() {
    return $this->hasQuarterState;
  }

  public function getSoldState() {
    return $this->soldState;
  }

  public function getWinnerState() {
    return $this->winnerState;
  }
}
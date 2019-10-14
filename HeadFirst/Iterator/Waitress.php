<?php

class Waitress {
  private $allMenus;

  public function __construct(MenuComponent $allMenus) {
    $this->allMenus = $allMenus;
  }

  public function printMenu() {
    $this->allMenus->print();
  }
}
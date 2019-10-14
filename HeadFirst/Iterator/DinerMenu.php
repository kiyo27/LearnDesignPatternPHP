<?php
require_once 'Menu.php';

class DinerMenu implements Menu {
  private $number;
  private $numberOfItems = 0;
  private $menuItems;

  public function __construct() {
    $this->menuItems = array();
  }

  public function addItems(String $name, String $description, Bool $vegetarian, float $price) {
    $menuItem = new MenuItem($name, $description, $vegetarian, $price);
    $this->menuItems[$this->numberOfItems] = $menuItem;
    $this->numberOfItems = $this->numberOfItems + 1;
  }

  public function createIterator() {
    return new DinerMenuIterator($this->menuItems);
  }
}
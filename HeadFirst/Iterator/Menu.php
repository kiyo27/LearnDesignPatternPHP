<?php

class Menu extends MenuComponent{
  private $menuComponents;
  private $name;
  private $description;

  public function __construct(String $name, String $description) {
    $this->name = $name;
    $this->description = $description;
  }

  public function add(MenuComponent $menuComponents) {
    $this->menuComponents[] = $menuComponents;
  }

  public function remove(MenuComponent $menuComponents) {

  }

  public function getChild(int $i) {
    return $this->menuComponents[$i];
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }

  public function print() {
    echo $this->getName() . "<br>";
    echo $this->getDescription() . "<br>";

    $iterator = $this->menuComponents->iterator();
    while ($iterator->hasNext()) {
      $menuComponent = $iterator->next();
      $menuComponent->print();
    }
  }
}
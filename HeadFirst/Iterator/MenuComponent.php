<?php

abstract class MenuComponent {
  public abstract function add(MenuComponent $menuComponent);

  public abstract function remove(MenuComponent $menuComponent);

  public abstract function getChild(int $i);

  public function getName() {
    throw new Exception('Method is not allowed.');
  }

  public function getDescription() {
    throw new Exception('Method is not allowed.');
  }

  public function getPrice() {
    throw new Exception('Method is not allowed.');
  }

  public function isVegitarian() {
    throw new Exception('Method is not allowed.');
  }

  public function print() {
    throw new Exception('Method is not allowed.');
  }

}
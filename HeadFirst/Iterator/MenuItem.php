<?php

class MenuItem extends MenuComponent{
  private $name;
  private $description;
  private $vegetarian;
  private $price;

  public function __construct(String $name, String $description, bool $vegetarian, float $price) {
    $this->name = $name;
    $this->description = $description;
    $this->vegetarian = $vegetarian;
    $this->price = $price;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription(){
    return $this->description;
  }

  public function getPrice() {
    return $this->price;
  }

  public function isVegetarian() {
    return $this->vegetarian;
  }

  public function print() {
    echo getName() . "<br>";
    echo getPrice() . "<br>";
    echo getDescription() . "<br>";
  }
}
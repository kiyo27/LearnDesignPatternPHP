<?php

interface Beverage {

  public function getDescription();

  public function cost();
}

abstract class CondimentDecorator implements Beverage {
  
  public abstract function getDescription();
  public abstract function cost();
}

class Espresso implements Beverage {
  private $description;

  public function __construct() {
    $this->description = "エスプレッソ";
  }

  public function getDescription() {
    return $this->description;
  }

  public function cost() {
    return 1.99;
  }
}

class HouseBlend implements Beverage {
  private $description;

  public function __construct() {
    $this->description = "ハウスブレンドコーヒー";
  }

  public function getDescription() {
    return $this->description;  
  }

  public function cost() {
    return .89;
  }
}

class Mocha extends CondimentDecorator {
  private $beverage;

  public function __construct(Beverage $beverage) {
    $this->beverage = $beverage;
  }

  public function getDescription() {
    return $this->beverage->getDescription() . "、モカ";
  }

  public function cost() {
    return .20 + $this->beverage->cost();
  }
}

$beverage = new Espresso();
echo $beverage->getDescription() . " $" . $beverage->cost();
echo "<br>";

$beverage2 = new HouseBlend();
$beverage2 = new Mocha($beverage2);
$beverage2 = new Mocha($beverage2);
echo $beverage2->getDescription() . " $" . $beverage2->cost();
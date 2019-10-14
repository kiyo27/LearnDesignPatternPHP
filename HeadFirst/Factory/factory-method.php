<?php

/**
 * Abstrct Creator
 */
abstract class PizzaStore {

  /**
   * anOperation()
   *
   * @param String $item
   * @return void
   */
  public function orderPizza(String $item) {

    $pizza = $this->createPizza($item);

    $pizza->prepare();
    $pizza->bake();
    $pizza->cut();
    $pizza->box();

    return $pizza;
  }

  /**
   * factoryMthod()
   *
   * @param String $item
   * @return void
   */
  public abstract function createPizza(String $item);
}

/**
 * Concrete Creator
 */
class NYPizzaStore extends PizzaStore {
  /**
   * factoryMethod()
   *
   * @param String $item
   * @return void
   */
  public function createPizza(String $item) {
    if ($item === "チーズ") {
      return new NYStyleCheesePizza();
    } else if ($item === "野菜") {
      return new NYStyleVeggiePizza();
    } else if ($item === "クラム") {
      return new NYStlyleClamPizza();
    } else if ($item === "ペパロニ") {
      return new NYStylePepperoniPizza();
    } else {
      return null;
    }
  }
}

/**
 * Abstract Product
 */
abstract class Pizza {
  protected $name;
  protected $dough;
  protected $sauce;
  protected $toppings = array();

  public function prepare() {
    echo $this->name . "を下処理";
    echo "<br>";
    echo "生地をこねる";
    echo "<br>";
    echo "トッピングを追加:";
    echo "<br>";
    foreach ($this->toppings as $topping) {
      echo $topping;
      echo "<br>";
    }
  }

  public function bake() {
    echo "350度で25分間焼く";
    echo "<br>";
  }

  public function cut() {
    echo "ピザを扇型に切る";
    echo "<br>";
  }

  public function box() {
    echo "PizzaStoreの正式な箱にピザを入れる";
    echo "<br>";
  }

  public function getName() {
    return $this->name;
  }
}

/**
 * Concrete Product
 */
class NYStyleCheesePizza extends Pizza {
  public function __construct() {
    $this->name = "ニューヨークスタイルのソース&チーズピザ";
    $this->dough = "薄いクラスト生地";
    $this->sauce = "マリナラソース";

    $this->toppings[] = "粉レッジャーノチーズ";
  }
}

$nyStore = new NYPizzaStore();
$pizza = $nyStore->orderPizza("チーズ");
$pizza->getName();
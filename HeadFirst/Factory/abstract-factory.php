<?php

/**
 * Abstract Factory
 */
interface PizzaIngredientFactory {
  public function createDough();
  public function createSauce();
  public function createCheese();
  public function createVeggies();
  public function createPepperoni();
  public function createClam();
}

/**
 * Concrete Factory
 */
class NYPizzaIngredientFactory implements PizzaIngredientFactory {
  public function createDough() {
    return new ThinCrustDough();
  }

  public function createSauce() {
    return new MarinaraSauce();
  }

  public function createCheese() {
    return new ReggianoCheese();
  }

  public function createVeggies() {
    $veggies = [ new Garlic(), new Onion(), new Mushroom(), new RedPepper() ];
    return $veggies;
  }

  public function createPepperoni() {
    return new SlicedPepperoni();
  }

  public function createClam() {
    return new FreshClams();
  }
}

/**
 * Abstract Product
 */
interface Cheese {
  public function topping();
}

/**
 * Concrete Product
 */
class ReggianoCheese implements Cheese {
  public function topping() {
    return "レッジャーノチーズ";
  }
}

/**
 * Client
 */
abstract class Pizza {
  protected $name;
  protected $dough;
  protected $sauce;
  protected $veggies;
  protected $cheese;
  protected $pepperoni;
  protected $clam;

  public abstract function prepare();

  public function bake() {
    echo "350度で25分間焼く";
    echo "<br>";
  }

  public function cut() {
    echo "ピザを扇形に切り分ける";
    echo "<br>";
  }

  public function box() {
    echo "PizzaStoreの正式な箱にピザを入れる";
    echo "<br>";
  }

  public function setName(String $name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  /**
   * Interfaceに対して実装
   *
   * @return void
   */
  public function toppings() {
    $toppings = array();
    if ($this->cheese !== null) {
      $toppings[] = $this->cheese->topping();
    } else if ($this->veggies !== null) {
      $toppings[] = $this->veggies->topping();
    }
  }
}

/**
 * Pizzaクラスを継承
 * prepare()内でインスタンスを生成
 */
class CheesePizza extends Pizza {
  protected $ingredientFactory;

  public function __construct(PizzaIngredientFactory $ingredientFactory) {
    $this->ingredientFactory = $ingredientFactory;
  }

  /**
   * Productのインスタンスを生成
   *
   * @return void
   */
  public function prepare() {
    echo $this->name . "を下処理";
    $this->dough = $this->ingredientFactory->createDough();
    $this->sauce = $this->ingredientFactory->createSauce();
    $this->cheese = $this->ingredientFactory->createCheese();
  }
}

/**
 * Pizzaクラスを継承
 */
class ClamPizza extends Pizza {
  protected $ingredientFactory;

  public function __construct(PizzaIngredientFactory $ingredientFactory) {
    $this->ingredientFactory = $ingredientFactory;
  }

  public function prepare() {
    echo $this->name . "を下処理";
    $this->dough = $this->ingredientFactory->createDough();
    $this->sauce = $this->ingredientFactory->createSauce();
    $this->cheese = $this->ingredientFactory->createCheese();
    $this->clam = $this->ingredientFactory->createClam();
  }
}

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
   * Client
   * factoryMthod()
   *
   * @param String $item
   * @return void
   */
  protected abstract function createPizza(String $item);
}

/**
 * Concret Creator
 */
class NYPizzaStore extends PizzaStore {
  protected function createPizza(String $item) {
    $pizza = null;
    $ingredientFactory = new NYPizzaIngredientFactory();

    if ($item === "チーズ") {
      $pizza = new CheesePizza($ingredientFactory);
      $pizza->setName("ニューヨークスタイルチーズピザ");
    } else if ($item === "野菜") {
      $pizza = new VeggiePizza($ingredientFactory);
      $pizza->setName("ニューヨークスタイル野菜ピザ");
    } else if ($item === "クラム") {
      $pizza = new ClamPizza($ingredientFactory);
      $pizza->setName("ニューヨークスタイルクラムピザ");
    } else if ($item === "ペパロニ") {
      $pizza = new PepperoniPizza($ingredientFactory);
      $pizza->setName("ニューヨークスタイルペパロニピザ");
    }

    return $pizza;
  }
}

$nyPizzaStore = new NYPizzaStore();
$nyPizzaStore->orderPizza("チーズ");
# Factory Method Pattern

> オブジェクトを生成するときのインタフェースだけを規定して、実際にどのクラスをインスタンス化するかはサブクラスが決めるようにする。FactoryMethodパターンは、インスタンス化をサブクラスに任せる。

![factory-method](./img/Factory_Method_UML_class_diagram.svg)

## 構成要素

### Productクラス

factoryMethodが生成するオブジェクトのインタフェースを定義する

### ConcreteProductクラス

Productクラスのインタフェースを実装する

### Creatorクラス

- Product型のオブジェクトを返すfactoryMethodを宣言する。また、あるConreteProductオブジェクトを返すようにfactoryMethodの実装をデフォルトで定義することもある。
- Productのオブジェクトを生成するためにfactoryMethodを呼び出す

### ConcreteCreatorクラス

ConcreteProductクラスのインスタンスを返すように、factoryMethodをオーバーライドする

## サンプル

```php

abstract class Product {
    abstract public function use();
}

/**
 * インスタンス化の手順を定義する。
 * スーパークラスではインスタンス化の手順だけをきめ、実際にどのクラスをインスタンス化するかはサブクラスに任せる
 */
abstract class Factory {
    public final function create($owner) {
        $p = $this->createProduct($owner);
        $this->registerProduct($p);
        return $p;
    }

    abstract protected function createProduct($owner);
    abstract protected function registerProduct(Product $product);
}

class IDCard extends Product {
    private $owner;

    public function __construct($owner) {
        echo $owner . "のカードを作ります";
        echo "<br>";
        $this->owner = $owner;
    }

    public function use() {
        echo $this->owner . "のカードを使います";
        echo "<br>";
    }

    public function getOwner() {
        return $this->owner;
    }
}

/**
 * IDCardクラスを生成するFactory
 **/
class IDCardFactory extends Factory {
    private $owners;

    protected function createProduct($owner) {
        return new IDCard($owner);
    }

    protected function registerProduct(Product $product) {
        $this->owners[] = $product->getOwner();
    }

    public function getOwners() {
        return $this->owners;
    }
}

$factory = new IDCardFactory();
$card1 = $factory->create("Tanaka");
$card2 = $factory->create("Sasaki");
$card1->use();
$card2->use();
```
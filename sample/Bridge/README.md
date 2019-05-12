# Bridge Pattern

> 抽出されたクラスとじっそを分離して、それらを独立に変更できるようにする。

![bridge-pattern](./img/Bridge_UML_class_diagram.svg)

## 構成要素

### Abstractionクラス

- 抽出されたクラスのインターフェースを定義する
- Implementro型のオブジェクトへの参照を保持する

### RefinedAbstractionクラス

Abstractionクラスで定義されたインターフェースを拡張する

### Implementorクラス

実装を行うクラスのインターフェースを定義する。このインターフェースはAbstractionクラスのインタフェースに正確に一致する必要はない。実際、この2つのインターフェースがまったく異なることもあり得る。典型的には、Implementorクラスのインターフェースはプリミティブなオペレーションのみを提供しており、Abstractionクラスのインタフェースは、これらのオペレーションを基にしてより高いレベルのオペレーションを定義する。

### ConcreteImplementorクラス

Implementorクラスのインタフェースを実装する。具体的な実装について定義する。

## サンプル

```php
/**
 * 機能のクラス階層
 */
class Display {
    private $impl;

    public function __construct($impl) {
        $this->impl = $impl;
    }

    public function open() {
        $this->impl->rawOpen();
    }

    public function print() {
        $this->impl->rawPrint();
    }

    public function close() {
        $this->impl->rawClose();
    }

    public final function display() {
        $this->open();
        $this->print();
        $this->close();
    }
}

/**
 * 機能のクラス階層
 */
class CountDisplay extends Display {
    public function __construct($impl) {
        parent::__construct($impl);
    }

    public function multiDisplay($times) {
        $this->open();
        for ($i=0; $i<$times; $i++) {
            $this->print();
        }
        $this->close();
    }
}

/**
 * 実装のクラス階層
 */
abstract class DisplayImpl {
    abstract public function rawOpen();
    abstract public function rawPrint();
    abstract public function rawClose();
}

/**
 * 実装のクラス階層
 */
class StringDisplayImpl extends DisplayImpl {
    private $string;
    private $width;

    public function __construct($string) {
        $this->string = $string;
        $this->width = strlen($this->string);
    }

    public function rawOpen() {
        $this->printLine();
    }

    public function rawPrint() {
        echo "|" . $this->string . "|";
        echo "<br>";
    }

    public function rawClose() {
        $this->printLine();
    }

    private function printLine() {
        echo "+";
        for ($i=0; $i<$this->width; $i++) {
            echo "-";
        }
        echo "+";
        echo "<br>";
    }
}

/**
 * 機能のクラス: Display
 * 実装のクラス: StringDisplayImpl
 */
$d1 = new Display(new StringDisplayImpl("Hello, Japan."));
$d1->display();

$d2 = new CountDisplay(new StringDisplayImpl("Hello, world."));
$d2->multiDisplay(3);
```

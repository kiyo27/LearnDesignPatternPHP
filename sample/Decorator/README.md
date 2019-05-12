# Decorator Pattern

> オブジェクトに責任を動的に追加する。Decoratorパターンは、サブクラス化よりも柔軟な機能拡張方法を提供する。

![decorator-pattern](./img/Decorator_UML_class_diagram.svg)


## 構成要素

### Componentクラス

責任を動的に追加できるようになっているオブジェクトのためのインターフェースを定義する。

### ConcreteComponentクラス

責任を追加できるようになっているオブジェクトを定義する

### Decoratorクラス

componentまたはdecoratorへの参照を保持し、またComponentクラスのインタフェースと一致したインターフェースを定義する。

### ConcreteDecoratorクラス

componentに責任を追加するオブジェクトを定義する

## サンプル

```php
abstract class Display {
    abstract public function getColumns();

    abstract public function getRows();

    abstract public function getRowText($row);
    
    public final function show() {
        for ($i=0; $i<$this->getRows(); $i++) {
            echo $this->getRowText($i);
            echo "<br>";
        }
    }
}

class StringDisplay extends Display {
    private $string;

    public function __construct($string) {
        $this->string = $string;
    }

    public function getColumns() {
        return strlen($this->string);
    }

    public function getRows() {
        return 1;
    }

    public function getRowText($row) {
        if ($row == 0) {
            return $this->string;
        } else {
            return null;
        }
    }
}

abstract class Border extends Display {
    protected $display;

    protected function __construct(Display $display) {
        $this->display = $display;
    }
}

class SideBorder extends Border {
    private $borderChar;

    public function __construct(Display $display, $ch) {
        parent::__construct($display);
        $this->borderChar = $ch;
    }

    public function getColumns() {
        return 1 + $this->display->getColumns() + 1;
    }

    public function getRows() {
        return $this->display->getRows();
    }

    public function getRowText($row) {
        return $this->borderChar . $this->display->getRowText($row) . $this->borderChar;
    }
}

class FullBorder extends Border {
    public function __construct(Display $display) {
        parent::__construct($display);
    }

    public function getRows() {
        return 1 + $this->display->getRows() + 1;
    }

    public function getColumns() {
        return 1 + $this->display->getColumns() + 1;
    }

    public function getRowText($row) {
        if ($row == 0) {
            return "+" . $this->makeLine('-', $this->display->getColumns()) . "+";
        } else if ($row == $this->display->getRows() + 1) {
            return "+" . $this->makeLine('-', $this->display->getColumns()) . "+";
        } else { 
            return "|" . $this->display->getRowText($row - 1) . "|";
        }
    }

    private function makeLine($ch, $count) {
        $buf = "";
        for ($i=0; $i<$count; $i++) {
            $buf .= $ch;
        }
        return $buf;
    }
}

$b1 = new StringDisplay("Hello, world.");
$b2 = new SideBorder($b1, "#");
$b3 = new FullBorder($b2);

$b1->show();
echo "<br>";
$b2->show();
echo "<br>";
$b3->show();
```
# Adapter Pattern

> あるクラスのインターフェースを、クライアントが求めるほかのインターフェースへ変換する。Adapterパターンは、インターフェースに互換性がないクラス同士を組み合わせることができるようにする。

![adapter-pattern](./img/Adapter_using_inheritance_UML_class_diagram.svg)


## 協調関係

### Targetクラス

Clientが利用する、ドメインに特化したインタフェースを定義する。

### Clientクラス

Targetクラスのインタフェースに従ったオブジェクトと協力する。

### Adapteeクラス

適合させる必要のある既存のインターフェースを持つ。

### Adapterクラス

AdapteeクラスのインターフェースをTargetクラスのインターフェースに適合させる。

## 2種類のパターン

- クラスによるAdapterパターン（継承をつかったもの）
- インスタンスによるAdapterパターン（委譲をつかったもの）

## 継承を使ったサンプル

```php
/**
 * すでに提供されているインターフェース
 */
interface AbstractPrint {
    public function printWeak();
    public function printStrong();
}


/**
 * Adaptee
 */
class Banner {
    private $string;

    public function __construct($string) {
        $this->string = $string;
    }

    public function showWithParen() {
        echo "(" . $this->string . ")";
    }

    public function showWithAster() {
        echo "*" . $this->string . "*";
    }
}

/**
 * Adapter
 */
class PrintBanner extends Banner implements AbstractPrint {
    public function __construct($string) {
        parent::__construct($string);
    }

    public function printWeak() {
        $this->showWithParen();
    }

    public function printStrong() {
        $this->showWithAster();
    }
}

$p = new PrintBanner("Hello");
$p->printWeak();
echo "<br>";
$p->printStrong();
```

## 委譲を使ったサンプル

```php
/**
 * すでに提供されているインターフェース
 */
abstract class AbstractPrint {
    abstract public function printWeak();
    abstract public function printStrong();
}


/**
 * Adaptee
 */
class Banner {
    private $string;

    public function __construct($string) {
        $this->string = $string;
    }

    public function showWithParen() {
        echo "(" . $this->string . ")";
    }

    public function showWithAster() {
        echo "*" . $this->string . "*";
    }
}

/**
 * Adapter
 */
class PrintBanner extends AbstractPrint {
    private $banner;

    public function __construct($string) {
        $this->banner = new Banner($string);
    }

    public function printWeak() {
        $this->banner->showWithParen();
    }

    public function printStrong() {
        $this->banner->showWithAster();
    }
}

$p = new PrintBanner("Hello");
$p->printWeak();
echo "<br>";
$p->printStrong();
```
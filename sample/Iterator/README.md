# Iterator Pattern

オブジェクト、振る舞い

> 集約オブジェクトが基にある内部表現を公開せずに、その要素に順にアクセスする方法を提供する。

![iterator-pattern](./img/Iterator_UML_class_diagram.svg)

## 構成要素

### Iteratorクラス

要素にアクセスしたり走査したりするためのインターフェースを定義する

### ConcreteIteratorクラス

- Iteratorクラスで定義したインターフェースを実装する
- Aggregateオブジェクトの走査の際に、カレント要素を記録する

### Aggregateクラス

Iteratorオブジェクトを生成するためのインターフェースを定義する

### ConcreteAggregateクラス

Aggregateクラスで定義したインタフェースに対して、適切なConcreteIteratorクラスのインスタンスを生成して返すように実装する。

## サンプル

```php
/**
 * 要素にアクセスしたり走査するためのインターフェースを定義
 */
interface AbstractIterator {
    public function hasNext();
    public function next();
}

/**
 * Iteratorクラスで定義したインタフェースを実装
 * Aggregatorオブジェクトを走査する際にカレントを記録する
 */
class BookShelfIterator implements AbstractIterator {
    private $bookShelf;
    private $index;

    public function __construct(BookShelf $bookShelf) {
        $this->bookShelf = $bookShelf;
        $this->index = 0;
    }

    public function hasNext() {
        if ($this->index < $this->bookShelf->getLength()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * カレントの要素を取得してindexを次に進める
     */
    public function next() {
        $book = $this->bookShelf->getBookAt($this->index);
        $this->index++;
        return $book;
    }
}

/**
 * Iteratorオブジェクトを生成するためのインターフェースを定義する
 */
interface Aggregate {
    public function iterator();
}

/**
 * Aggregateクラスで定義したインタフェースに対して、適切なConcreteIteratorクラスのインスタンスを生成して返すように実装する。
 */
class BookShelf implements Aggregate {
    private $books;
    private $last;

    public function __construct() {
        $this->books = array();
        $this->last = 0;
    }

    public function getBookAt($index) {
        return $this->books[$index];
    }

    public function appendBook(Book $book) {
        $this->books[$this->last] = $book;
        $this->last++;
    }

    public function getLength() {
        return $this->last;
    }

    public function iterator() {
        return new BookShelfIterator($this);
    }
}

class Book {
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

$bookShelf = new BookShelf();
$bookShelf->appendBook(new Book("Design Pattern"));
$bookShelf->appendBook(new Book("Object-Oriented Programming"));
$bookShelf->appendBook(new Book("Gang of Four"));
$bookShelf->appendBook(new Book("The Art of Computer Programming"));

$it = $bookShelf->iterator();
while ($it->hasNext()) {
    $book = $it->next();
    echo $book->getName();
    echo '<br>';
}
```
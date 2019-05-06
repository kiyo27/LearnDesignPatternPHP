
# Strategy Pettern

オブジェクト、振る舞い

> アルゴリズムの集合を定義し、各アルゴリズムをカプセル化して、それらを交換可能にする。Strategyパターンを利用することで、アルゴリズムを、それを利用するクライアントからは独立に変更することができるようになる。

![strategy-pattern](./img/StrategyPatternClassDiagram.svg)

## 構成要素

### Strategyクラス

サポートするすべてのアルゴリズムに共通のインターフェースを宣言する。Contextクラスは、ConcreteStrategyクラスにより定義されるアルゴリズムを呼び出すためにこのインターフェースを利用する。

### ConcreteStrategyクラス

Strategyクラスのインターフェースを利用して、アルゴリズムを実装する

### Contextクラス

- ConcreteStrategyオブジェクトを備えている
- Strategyのオブジェクトに対する参照を保持する
- StrategyクラスがContextクラスのデータにアクセスするためのインターフェースを定義してもよい


## 協調関係

- アルゴリズムが呼び出されたときに、Contextオブジェクトはアルゴリズムに必要なデータをStrategyのオブジェクトに対して送るかもしれない。また、別の方法として、ContextオブジェクトはStrategyクラスのオペレーションの引数として自身を渡すこともできる。

- クライアントは通常、ConcreteStrategyオブジェクトを生成し、これをContextオブジェクトに渡す。その後、クライアントはContextオブジェクトだけとやりとりする。


## 実装

```php
<?php

/**
 * AbstractStrategyClassに相当
 */
abstract class AbstractStrategy {
    protected $context;

    public abstract function algorithmInterface(Context $context);
}


/**
 * ConcreteStrategyClassに相当
 */
class ConcreteStrategy extends AbstractStrategy {
     
    /**
     * スーパークラスの抽象メソッドを実装
     */
    public function algorithmInterface(Context $context) {
        $this->context = $context;
    }
}

/**
 * ConcreteStrategyClassに相当
 */
class AlterConcreteStrategy extends AbstractStrategy {
    /**
     * スーパークラスの抽象メソッドを実装
     */
    public function algorithmInterface(Context $context) {
        $this->context = $context;
    }
}

/**
 * Contextクラスに相当
 */
class Context {
    /**
     * Strategyオブジェクトへの参照を保持
     */
    private $strategy;

    public function __construct(AbstractStrategy $strategy) {
        $this->strategy = $strategy;
    }

    /**
     * Strategyクラスのメソッドを呼び出す
     */
    public function do() {
        $this->strategy->algorithmInterface($this);
    }
}

/**
 * クライアント
 */
// Strategyクラスを引数としてContetextオブジェクトを生成 
 $context = new Context(new ConcreteStrategy());
 // クライアントはContextオブジェクトだけとやりとりする
 $context->do();
```
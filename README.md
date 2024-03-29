# デザインパターン

## 生成に関するパターン

|パターン名|概要|
|-|-|
|[Abstract Factory](./AbstractFactory)|関連する一連のインスタンスを状況に応じて、適切に生成する方法を提供する。|
|[Builder](./Builder)|複合化されたインスタンスの生成過程を隠蔽する。|
|[Factory Method](./Factory)|実際に生成されるインスタンスに依存しない、インスタンスの生成方法を提供する。|
|[Prototype](./Prototype)|同様のインスタンスを生成するために、原型のインスタンスを複製する。|
|[Singleton](./Singleton)|あるクラスについて、インスタンスが単一であることを保証する。|

## 構造に関するパターン

|パターン名|概要|
|-|-|
|[Adapter](./Adapter)|元々関連性のない2つのクラスを接続するクラスを作る。|
|[Bridge](./Bridge)|クラスなどの実装と、呼び出し側の間の橋渡しをするクラスを用意し、実装を隠蔽する。|
|[Composite](./Composite)|再帰的な構造を表現する。|
|[Decorator](./Decorator)|あるインスタンスに対し、動的に付加機能を追加する。Filterとも呼ばれる。|
|[Facade](./Facade)|複数のサブシステムの窓口となる共通のインタフェースを提供する。|
|[Flyweight](./Flyweight)|多数のインスタンスを共有し、インスタンスの構築のための負荷を減らす。|
|[Proxy](./Proxy)|共通のインタフェースを持つインスタンスを内包し、利用者からのアクセスを代理する。Wrapperとも呼ばれる。|

## 振る舞いに関するパターン

|パターン名|概要|
|-|-|
|[Chain of Responsibility](./ChainOfResponsibility)|イベントの送受信を行う複数のオブジェクトを鎖状につなぎ、それらの間をイベントが渡されていくようにする。|
|[Command](./Command)|複数の異なる操作について、それぞれに対応するオブジェクトを用意し、オブジェクトを切り替えることで、操作の切り替えを実現する。|
|Interpreter|構文解析のために、文法規則を反映するクラス構造を作る。|
|[Iterator](./Iterator)|複数の要素を内包するオブジェクトのすべての要素に対して、順番にアクセスする方法を提供する。反復子。|
|[Mediator](./Mediator)|オブジェクト間の相互作用を仲介するオブジェクトを定義し、オブジェクト間の結合度を低くする。|
|[Memento](./Memento)|データ構造に対する一連の操作のそれぞれを記録しておき、以前の状態の復帰または操作の再現が行えるようにする。|
|[Observer](./Observer)|インスタンスの変化を他のインスタンスから監視できるようにする。Listenerとも呼ばれる。|
|[State](./State)|オブジェクトの状態を変化させることで、処理内容を変えられるようにする。|
|[Strategy](./Strategy)|データ構造に対して適用する一連のアルゴリズムをカプセル化し、アルゴリズムの切り替えを容易にする。|
|[Template Method](./TemplateMethod)|あるアルゴリズムの途中経過で必要な処理を抽象メソッドに委ね、その実装を変えることで処理内容を変えられるようにする。|
|[Visitor](./Visitor)|データ構造を保持するクラスと、それに対して処理を行うクラスを分離する。|

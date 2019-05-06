<?php

/**
 * AbstractFactoryクラス
 * 
 *  AbstractProductのオブジェクトを生成するオペレーションのインターフェースを宣言する
 */
interface AbstractFactory {
    public function createButton();
    public function createWindow();
}

/**
 * ConcreteFactoryDB
 * 
 *  ConcreteProductオブジェクトを生成するオペレーションを実装する
 */
class ConcreteFactoryWindows implements AbstractFactory {
    /**
     * インターフェースを実装
     */
    public function createButton() {
        return new ConcreteProductWindowsButton();
    }

    /**
     * インターフェースを実装
     */
    public function createWindow() {
        return new ConcreteProductWindowsWindow();
    }
}

/**
 * ConcreteFactoryMock
 * 
 *  ConcreteProductオブジェクトを生成するオペレーションを実装する
 */
class ConcreteFactoryMac implements AbstractFactory {
    /**
     * インターフェースを実装
     */
    public function createButton() {
        return new ConcreteProductMacButton();
    }

    /**
     * インターフェースを実装
     */
    public function createWindow() {
        return new ConcreteProductMacWindow();
    }
}

/**
 * AbstractProductクラス
 * 
 * 部品ごとにインターフェースを宣言する
 */

/**
 * AbstractProductクラスに相当
 * 
 * 部品: Button
 */
interface AbstractProductButton {
    public function press();
}

/**
 * AbstractProductクラスに相当
 * 
 * 部品: Window
 */
interface AbstractProductWindow {
    public function open();
}

/**
 * ConcreteProductクラス
 * 
 *  - 対応するConcreteFactoryオブジェクトで生成される部品オブジェクトを定義する
 *  - AbstractProductクラスのインターフェースを実装する
 */

/**
 * ConcreteProductクラスに相当
 * 
 * 対応するConcreteFactory: Windows
 */
class ConcreteProductWindowsButton implements AbstractProductButton {
    /**
     * インターフェースを実装
     */
    public function press() {
        echo 'Windows button is pressed.';
    }
}

/**
 * ConcreteProductクラスに相当
 * 
 * 対応するConcreteFactory: Windows
 */
class ConcreteProductWindowsWindow implements AbstractProductWindow {
    /**
     * インターフェースを実装
     */
    public function open() {
        echo 'Windows window open.';
    }
}

/**
 * ConcreteProductクラスに相当
 * 
 * 対応するConcreteFactory: Mac
 */
class ConcreteProductMacButton implements AbstractProductButton {
    /**
     * インターフェースを実装
     */
    public function press() {
        echo 'Mac button is pressed.';
    }
}

/**
 * ConcreteProductクラスに相当
 * 
 * 対応するConcreteFactory: Mac
 */
class ConcreteProductMacWindow implements AbstractProductWindow {
    /**
     * インターフェースを実装
     */
    public function open() {
        echo 'Mac window open.';
    }
}

/**
 * クライアント
 */

$factory = new ConcreteFactoryWindows();

$button = $factory->createButton();
$button->press();

echo "<br>";

$window = $factory->createWindow();
$window->open();

<?php

namespace Bridge;

/**
 * 実装のクラス
 * 抽象クラスで API を定義し実際の振る舞いは
 * サブクラスで実装する
 */
abstract class DisplayImpl
{
    public abstract function rawOpen();

    public abstract function rawPrint();

    public abstract function rawClose();
}

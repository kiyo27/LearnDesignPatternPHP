<?php
require_once 'Duck.php';

class MallardDuck implements Duck {
  public function quack() {
    echo "ガーガー";
  }

  public function fly() {
    echo "飛んでいます";
  }
}
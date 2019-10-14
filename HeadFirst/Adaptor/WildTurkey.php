<?php
require_once 'Turkey.php';

class WildTurkey implements Turkey {
  public function gobble() {
    echo "ゴロゴロ";
  }

  public function fly() {
    echo "短い距離を飛んでいます";
  }
}
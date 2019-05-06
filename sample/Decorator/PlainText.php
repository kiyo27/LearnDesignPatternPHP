<?php
require_once 'Text.php';

class PlainText implements Text {
  /**
   * インスタンスが保持する文字列
   */
  private $textString = null;

  /**
   * インスタンスが保持する文字列を返す
   */
  public function getText() {
    return $this->textString;
  }

  /**
   * インスタンスに文字列をセット
   */
  public function setText($str) {
    $this->textString = $str;
  }
}
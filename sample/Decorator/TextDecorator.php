<?php
require_once 'Text.php';

/**
 * Textクラスを装飾するDecorator
 */
abstract class TextDecorator implements Text {
  /**
   * Text型の変数
   */
  private $text;

  /**
   * インスタンスを生成する
   */
  public function __construct(Text $target) {
    $this->text = $target;
  }

  /**
   * インスタンスが保持する文字列を返す
   */
  public function getText() {
    return $this->text->getText();
  }

  /**
   * インスタンスに文字列をセットする
   */
  public function setText($str) {
    $this->text->setText($str);
  }
}
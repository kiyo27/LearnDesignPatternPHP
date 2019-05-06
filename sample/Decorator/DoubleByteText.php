<?php
require_once 'TextDecorator.php';

class DobleByteText extends TextDecorator {
  /**
   * インスタンスを生成する
   */
  public function __construct(Text $target) {
    parent::__construct($target);
  }

  /**
   * テキストを全角文字に変換して返す
   * 半角英字、数字、スペース、カタカナを全角に
   * 濁点付きの文字を一文字に変換する
   */
  public function getText() {
    $str = parent::getText();
    $str = mb_convert_kana($str, "RANSKV");
    return $str;
  }
}
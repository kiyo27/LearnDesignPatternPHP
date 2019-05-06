<?php
require_once 'TextDecorator.php';

class UpperCaseText extends TextDecorator {
  /**
   * インスタンスを生成する
   */
  public function __construct(Text $target) {
    parent::__construct($target);
  }

  /**
   * 半角小文字を半角大文字に変換して返す
   */
  public function getText() {
    $str = parent::getText();
    $str = strtoupper($str);
    return $str;
  }
}
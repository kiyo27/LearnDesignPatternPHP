<?php

class ShowFile {

  /**
   * 内容を表示するファイル名
   */
  private $filename;

  /**
   * コンストラクタ
   * @param string
   * @throws Exception
   */
  public function __construct($filename) {
    if (!is_readable($filename)) {
      throw new Exception('file "' . $filename . '" is not readable.');
    }
    $this->filename = $filename;
  }

  /**
   * プレーンテキストとして表示します
   */
  public function showPlain() {
    echo '<pre>';
    echo htmlspecialchars(file_get_contents($this->filename), ENT_QUOTES);
    echo '</pre>';
  }

  /**
   * キーワードをハイライト表示します
   */
  public function showHighlight() {
    highlight_file($this->filename);
  }
}

<?php
require_once 'Reader.php';

class CSVFileReader implements Reader {

  /**
   * 内容を表示するファイル名
   * @access private
   */
  private $filename;

  /**
   * データを扱うハンドラ名
   */
  private $handler;

  /**
   * コンストラクタ
   * @param string
   * @throws Exception
   */
  public function __construct($filename) {
    if (!is_readable($filename)) {
      throw new Exception('file [ ' . $filename . '] is not readable.');
    }
    $this->filename = $filename;
  }

  /**
   * 読み込みを行う
   */
  public function read() {
    $this->handler = fopen($this->filename, 'r');
  }

  /**
   * 文字コードの変換を行う
   */
  private function convert($str) {
    return mb_convert_encoding($str, mb_internal_encoding(), 'auto');
  }

  /**
   * 表示を行う
   */
  public function display() {
    $column = 0;
    $tmp = '';

    while ($data = fgetcsv($this->handler, 4096, ',')) {
      $num = count($data);
      for ($i = 0; $i < $num; $i++) {
        if ($i == 0) {
          if ($column != 0 && $data[$i] != $tmp) {
            echo '</ul>';
          }
          if ($data[$i] != $tmp) {
            $tmp = $this->convert($data[$i]);
            echo '<b>' . $tmp . '</b>';
            echo '<ul>';
          }
        } else {
          echo '<li>';
          echo $this->convert($data[$i]);
          echo '</li>';
        }
      }
      $column++;
    }
    echo '</ul>';
    fclose($this->handler);
  }
}

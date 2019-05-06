<?php
require_once 'DataSource.php';

/**
 * Implementorクラスで定義されている機能を実装する
 * ConcreateImplementorに相当する
 */
class FileDataSource implements DataSource {

  /**
   * ソース名
   */
  private $source_name;

  /**
   * ファイルハンドラ
   */
  private $handler;

  /**
   * コンストラクタ
   */
  function __construct($source_name) {
    $this->source_name = $source_name;
  }

  /**
   * データソースを開く
   * @throws Exception
   */
  function open() {
    if (!is_readable($this->source_name)) {
      throw new Exception('データソースが見つかりません');
    }
    $this->handler = fopen($this->source_name, 'r');
    if (!$this->handler) {
      throw new Exception('データソースのオープンに失敗しました。');
    }
  }

  /**
   * データソースからデータを取得する
   */
  function read() {
    $buffer = array();
    while (!feof($this->handler)) {
      $buffer[] = fgets($this->handler);
    }
    return join($buffer);
  }

  /**
   * データソースを閉じる
   */
  function close() {
    if (!is_null($this->handler)) {
      fclose($this->handler);
    }
  }
}

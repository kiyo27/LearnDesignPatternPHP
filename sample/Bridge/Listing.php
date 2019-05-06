<?php
require_once 'DataSource.php';

class Listing {
  private $data_source;

  /**
   * コンストラクタ
   */
  function __construct($data_source) {
    $this->data_source = $data_source;
  }

  /**
   * データソースを開く
   */
  function open() {
    $this->data_source->open();
  }

  /**
   * データスースからデータを取得する
   */
  function read() {
    return $this->data_source->read();
  }

  /**
   * データスースを閉じる
   */
  function close() {
    $this->data_source->close();
  }
}

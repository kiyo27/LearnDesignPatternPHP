<?php
require_once 'Listing.php';

/**
 * Listingクラスで提供されている機能を拡張する
 */
class ExtendedListing extends Listing {

  /**
   * コンストラクタ
   */
  function __construct($data_source) {
    parent::__construct($data_source);
  }

  /**
   * データを読み込む際データ中の特殊文字を変換する
   */
  function readWithEncode() {
    return htmlspecialchars($this->read(), ENT_QUOTES, mb_internal_encoding());
  }
}

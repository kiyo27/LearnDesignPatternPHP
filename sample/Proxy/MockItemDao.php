<?php
require_once 'ItemDao.php';
require_once 'Item.php';

class MockItemDao implements ItemDao {
  public function findById($item_id) {
    $item = new Item($item_id, 'ダミー商品');
    return $item;
  }
}
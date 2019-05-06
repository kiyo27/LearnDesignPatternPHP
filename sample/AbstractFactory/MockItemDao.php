<?php
require_once 'ItemDao.php';
require_once 'Item.php';

class mockItemDao implements ItemDao {
  public function findById($item_id) {
    $item = new Item('99', 'ダミー商品');
    return $item;
  }
}

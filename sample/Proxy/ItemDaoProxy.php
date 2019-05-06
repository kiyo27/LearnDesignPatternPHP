<?php
class ItemDaoProxy {
  private $cache;
  private $dao;

  public function __construct(ItemDao $dao) {
    $this->dao = $dao;
    $this->cache = array();  
  }

  public function findById($item_id) {
    if (array_key_exists($item_id, $this->cache)) {
      echo '<font color="#dd0000">Proxyで保持しているキャッシュからデータを返します</font><br>';
      return $this->cache[$item_id];
    }
    $this->cache[$item_id] = $this->dao->findById($item_id);
    return $this->cache[$item_id];
  }
}
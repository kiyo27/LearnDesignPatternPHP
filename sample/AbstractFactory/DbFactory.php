<?php
require_once 'DaoFactory.php';
require_once 'DbItemDao.php';
require_once 'DbOrderDao.php';

class DbFactory implements DaoFactory {
  public function createItemDao() {
    return new DbItemDao();
  }

  public function createOrderDao() {
    return new DbOrderDao($this->createItemDao());
  }
}

<?php
require_once 'ItemPrototype.php';

class DeepCopyItem extends ItemPrototype {
  protected function __clone() {
    $this->setDetail(clone $this->getDetail());
  }
}
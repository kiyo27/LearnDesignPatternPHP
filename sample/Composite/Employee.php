<?php
require_once 'OrganizationEntry.php';

class Employee extends OrganizationEntry {
  public function __construct($code, $name) {
    parent::__construct($code, $name);
  }

  /**
   * 子要素を追加する
   */
  public function add(OrganizationEntry $entry) {
    throw new Exception('method not allowed');
  }
}
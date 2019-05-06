<?php
require_once 'OrganizationEntry.php';

class Group extends OrganizationEntry {
  private $entries;

  public function __construct($code, $name) {
    parent::__construct($code, $name);
    $this->entries = array();
  }

  public function add(OrganizationEntry $entry) {
    array_push($this->entries, $entry);
  }

  public function getChildren() {
    return $this->entries;
  }
}
<?php
abstract class OrganizationEntry {
  private $code;
  private $name;

  public function __construct($code, $name) {
    $this->code = $code;
    $this->name = $name;
  }

  public function getCode() {
    return $this->code;
  }

  public function getName() {
    return $this->name;
  }

  /**
   * 子要素を追加する
   */
  public abstract function add(OrganizationEntry $entry);

  /**
   * 組織ツリーを表示する
   */
  public function dump() {
    echo $this->code . ":" . $this->name . "<br>\n";
  }
}
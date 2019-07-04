<?php
require_once 'Iteration.php';

class DinerMenuIterator implements Iteration {
  private $list;
  private $position;

  public function __construct(MenuItem $list) {
    $this->list[] = $list;
  }

  public function next() {
    $menuItem = $this->list[$this->position];
    $position = $position + 1;
    return $menuItem;
  }

  public function hasNext() {
    if ($this->position >= count($this->list) || $this->list[$this->position] === null) {
      return false;
    } else {
      return true;
    }
  }
}
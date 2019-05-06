<?php
class DataSnapshot {
  private $comment;

  protected function __construct($comment) {
    $this->comment = $comment;
  }

  protected function getComment() {
    return $this->comment;
  }
}
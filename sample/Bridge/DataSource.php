<?php
/**
 * Implementorに相当する
 */
interface DataSource {
  public function open();
  public function read();
  public function close();
}

<?php
require_once 'Reader.php';
require_once 'CSVFileReader.php';
require_once 'XMLFileReader.php';

class ReaderFactory {
  /**
   * Readerクラスのインスタンスを生成する
   */
  public function create($filename) {
    $reader = $this->createReader($filename);
    return $reader;
  }

  /**
   * Readerクラスのサブクラスを条件判定し生成する
   */
  private function createReader($filename) {
    $poscsv = stripos($filename, '.csv');
    $posxml = stripos($filename, ',xml');
    if ($poscsv !== false) {
      $r = new CSVFileReader($filename);
      return $r;
    } else if ($posxml !== false) {
      return new XMLFileReader($filename);
    } else die('This filename is not supported : ' . $filename);
  }

}

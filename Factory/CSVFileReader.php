<?php
namespace Factory;

use Exception;

class CSVFileReader implements Reader
{
    private $filename;

    private $handler;

    public function __construct($filename)
    {
        if (!is_readable($filename)) {
            throw new Exception('file [' . $filename . '] is not readable.');
        }
        $this->filename = $filename;
    }

    public function read()
    {
        $this->handler = fopen($this->filename, 'r');
    }

    private function convert($str)
    {
        return mb_convert_encoding($str, mb_internal_encoding() . 'auto');
    }

    public function display()
    {
        $column = 0;
        $tmp = '';

        while ($data = fgetcsv($this->handler, 4096, ',')) {
            $num = count($data);
            for ($i = 0; $i < $num; $i++) {
                if ($i == 0) {
                    if ($column != 0 && $data[$i] != $tmp) {
                        echo "\n";
                    }
                    if ($data[$i] != $tmp) {
                        $tmp = $this->convert($data[$i]);
                    }
                } else {
                    echo $this->convert($data[$i]);
                    echo "\n";
                }
            }
            $column++;
        }
        fclose($this->handler);
    }
}
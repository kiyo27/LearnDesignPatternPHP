<?php
namespace Factory;

use Exception;

class XMLFileReader implements Reader
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
        $this->handler = simplexml_load_file($this->filename);
    }

    private function convert($str)
    {
        return mb_convert_encoding($str, 'UTF-8', 'auto');
    }

    public function display()
    {
        foreach ($this->handler->artist as $artist) {
            echo $this->convert($artist['name']) . "\n";
            foreach ($artist->music as $music) {
                echo "  " .$this->convert($music['name']) . "\n";
            }
        }
    }
}
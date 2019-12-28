<?php

namespace Prototype;

class MessageBox implements Product
{
    private $decochar;

    public function __construct($decochar)
    {
        $this->decochar = $decochar;
    }

    public function use($s)
    {
        $length = strlen($s);
        for ($i = 0; $i < $length + 4; $i++) {
            echo $this->decochar;
        }
        echo "\n";
        echo $this->decochar . " " . $s . " " . $this->decochar . "\n";
        for ($i = 0; $i < $length + 4; $i++) {
            echo $this->decochar;
        }
        echo "\n";
    }

    public function createClone()
    {
        $p = null;
        $p = clone $this;
        return $p;
    }
}
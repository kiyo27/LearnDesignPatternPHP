<?php

namespace Prototype;

class UnderlinePen implements Product
{
    private $ulchar;

    public function __construct($ulchar)
    {
        $this->ulchar = $ulchar;
    }

    public function use($s)
    {
        $length = strlen($s);
        echo "¥" . $s . "¥" . "\n";
        echo " ";
        for ($i = 0; $i < $length; $i++) {
            echo $this->ulchar;
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
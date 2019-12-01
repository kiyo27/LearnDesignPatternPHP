<?php

namespace Display;

use Display\DisplayImpl;

/**
 * 実装のクラス
 */
class StringDisplayImpl extends DisplayImpl
{
    private $string;

    private $width;

    public function __construct($string)
    {
        $this->string = $string;
        $this->width = strlen($string);
    }

    public function rawOpen()
    {
        $this->printLine();
    }

    public function rawPrint()
    {
        echo "|" . $this->string . "|" . "\n";
    }

    public function rawClose()
    {
        $this->printLine();
    }

    private function printLine()
    {
        echo "+";
        for ($i = 0; $i < $this->width; $i++) {
            echo "-";
        }
        echo "+" . "\n";
    }
}
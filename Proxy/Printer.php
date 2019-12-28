<?php

namespace Proxy;

class Printer implements Printable
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        $this->heavyJob("重い作業を実施中");
    }

    public function setPrinterName($name)
    {
        $this->name = $name;
    }

    public function getPrinterName()
    {
        return $this->name;
    }

    public function print($string)
    {
        echo "===" . $this->name . "===" . "\n";
        echo $string . "\n";
    }

    private function heavyJob($msg)
    {
        echo $msg . "\n";
        for ($i = 0; $i < 5; $i++) {
            sleep(5);
            echo "\n";
        }
        echo "完了" . "\n";
    }

}
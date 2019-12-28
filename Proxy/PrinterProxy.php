<?php

namespace Proxy;

class PrinterProxy implements Printable
{
    private $name;

    private $real;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setPrinterName($name)
    {
        if (!is_null($this->real)) {
            $this->real->setPrinterName($name);
        }
        $this->name = $name;
    }

    public function getPrinterName()
    {
        return $this->name;
    }

    public function print($string)
    {
        $this->realize();
        $this->real->print($string);
    }

    private function realize()
    {
        if (is_null($this->real)) {
            $this->real = new Printer($this->name);
        }
    }
}
<?php

namespace Proxy;

interface Printable
{
    public function setPrinterName($string);

    public function getPrinterName();

    public function print($string);
}
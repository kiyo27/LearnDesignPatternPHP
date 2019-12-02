<?php

require("vendor/autoload.php");

use Proxy\PrinterProxy;

$p = new PrinterProxy("Alice");
echo "Current user is " . $p->getPrinterName() . "." . "\n";
$p->setPrinterName("Bob");
echo "Current user is " . $p->getPrinterName() . "." . "\n";
$p->print("Hello, world");